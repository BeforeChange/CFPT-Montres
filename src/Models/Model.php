<?php

namespace Cfpt\Montres\Models;

use Cfpt\Montres\Infrastructure\Database;

abstract class Model {
    public ?int $id = null;
    protected array $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function __construct(
        protected Database $db
    ) {}

    private array $table_exception =[
        'watch' => 'watches'
    ];

    protected function table(): string {
        $class_name = strtolower((new \ReflectionClass($this))->getShortName());
        if(isset($this->table_exception[$class_name]))
            $class_name = $this->table_exception[$class_name];
        return $class_name . 's';
    }

    public function fill(array $data) {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                if (isset($this->casts[$key])) {
                    switch ($this->casts[$key]) {
                        case 'datetime':
                            $value = new \DateTime($value);
                            break;
                    }
                }
                $this->$key = $value;
            }
        }
        return $this;
    }

    public function all(): array {
        $stmt = $this->db->query("SELECT * FROM " . $this->table());
        $data = $stmt->fetchAll();
        $data = array_map(fn($d) => (new static($this->db))->fill($d), $data);

        return $data;
    }

    public function save() {
        if($this->id) {
            return $this->update();
        } else {
            return $this->insert();
        }
    }

    protected function update() {
        if(!$this->id) {
            throw new \Exception("Cannot update a record without an ID.");
        }

        $table = $this->table();
        $props = get_object_vars($this);

        unset($props['id'], $props['db'], $props['casts'], $props['table_exception']);

        if (empty($props)) {
            throw new \Exception("No properties to update.");
        }

        foreach ($props as $key => &$value) {
            if (property_exists($this, $key)) {
                if (isset($this->casts[$key])) {
                    switch ($this->casts[$key]) {
                        case 'datetime':
                            $value = $value->format('Y-m-d H:i:s');
                            break;
                    }
                }
            }
        }

        $set = implode(', ', array_map(fn($k) => "$k = :$k", array_keys($props)));
    
        $sql = "UPDATE {$table} SET $set WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute(array_merge($props, ['id' => $this->id]));

        return $result;
    }

    protected function insert() {
        $table = $this->table();
        $props = get_object_vars($this);

        unset($props['id'], $props['db'], $props['casts'], $props['table_exception']);

        if (empty($props)) {
            throw new \Exception("No properties to insert.");
        }

        foreach ($props as $key => $value) {
            if (isset($this->casts[$key]) && $this->casts[$key] === 'datetime') {
                $props[$key] = $value instanceof \DateTime ? $value->format('Y-m-d H:i:s') : $value;
            }
        }

        $columns = implode(', ', array_keys($props));
        $placeholders = implode(', ', array_map(fn($k) => ":$k", array_keys($props)));

        $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$placeholders})";

        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute($props);

        $this->id = (int)$this->db->lastInsertId();

        return $result;
    }

    public function delete() {
        if(!$this->id) {
            throw new \Exception("Cannot delete a record without an ID.");
        }

        $table = $this->table();

        $sql = "DELETE FROM {$table} WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute(['id' => $this->id]);

        $this->id = null;

        return $result;
    }

    public function find(int $id): ?self {
        $table = $this->table();

        $sql = "SELECT * FROM {$table} WHERE id = :id LIMIT 1";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);

        $data = $stmt->fetch();
        $data = $this->fill($data);

        return $data ?: null;
    }
}