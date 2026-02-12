<?php

namespace Cfpt\Montres\Services;

use Cfpt\Montres\Models\Watch;

class WatchService extends Service {
    public function add(array $properties) {
        $watch = new Watch($this->db)->fill($properties);
        $result = $watch->save();
    }

    public function find($id) {
        $watch = new Watch($this->db);

        $watch = $watch->find($id);

        return $watch;
    }

    public function all(array $params = []): array {
    $sql = "SELECT w.*
            FROM watches w
            LEFT JOIN versions v ON w.id_version = v.id
            LEFT JOIN brands b ON v.id_brand = b.id
            LEFT JOIN watch_categories wc ON w.id = wc.id_watch
            LEFT JOIN categories c ON wc.id_category = c.id";

    $where = [];
    $bindings = [];

    // Filtre Marque
    if (!empty($params['brand'])) {
        $placeholders = [];
        foreach ($params['brand'] as $i => $brand) {
            $key = ":brand$i";
            $placeholders[] = $key;
            $bindings[$key] = $brand;
        }
        $where[] = "b.name IN (" . implode(",", $placeholders) . ")";
    }

    // Filtre Prix
    if (!empty($params['price_min'])) {
        $where[] = "w.price >= :price_min";
        $bindings[':price_min'] = $params['price_min'];
    }
    if (!empty($params['price_max'])) {
        $where[] = "w.price <= :price_max";
        $bindings[':price_max'] = $params['price_max'];
    }

    // Filtre Genre
    if (!empty($params['gender'])) {
        $where[] = "c.name = :gender";
        $bindings[':gender'] = $params['gender'];
    }

    // Filtre Mouvement (peut être plusieurs)
    if (!empty($params['movement'])) {
        $placeholders = [];
        foreach ($params['movement'] as $i => $mov) {
            $key = ":movement$i";
            $placeholders[] = $key;
            $bindings[$key] = $mov;
        }
        $where[] = "c.name IN (" . implode(",", $placeholders) . ")";
    }

    // Filtre Matière
    if (!empty($params['material'])) {
        $where[] = "c.name = :material";
        $bindings[':material'] = $params['material'];
    }

    // Filtre Étanchéité
    if (!empty($params['water_resistance'])) {
        $where[] = "c.name = :water_resistance";
        $bindings[':water_resistance'] = $params['water_resistance'];
    }

    if ($where) {
        $sql .= " WHERE " . implode(" AND ", $where);
    }

    // Eviter doublons si une montre a plusieurs catégories
    $sql .= " GROUP BY w.id";

    $stmt = $this->db->prepare($sql);
    foreach ($bindings as $key => $value) {
        $stmt->bindValue($key, $value);
    }

    $stmt->execute();
    return $stmt->fetchAll(\PDO::FETCH_OBJ);
}

}