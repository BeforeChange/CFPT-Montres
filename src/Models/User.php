<?php

namespace Cfpt\Montres\Models;

class User extends Model {
    public ?string $last_name;
    public ?string $first_name;
    public ?string $email;
    public ?string $password_hash;
    public ?\DateTime $created_at;
    public ?int $id_role;

    protected array $casts = [
        'created_at' => 'datetime',
    ];

    public function findByEmail(string $email) {
        $table = $this->table();

        $sql = "SELECT * FROM {$table} WHERE email = :email LIMIT 1";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['email' => $email]);

        $data = $stmt->fetch();
        $data = $this->fill($data);

        return $data ?: null;
    }

    public function checkPassword(string $password) {
        return password_verify($password, $this->password_hash);
    }
}