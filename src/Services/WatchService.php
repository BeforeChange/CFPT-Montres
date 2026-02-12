<?php

namespace Cfpt\Montres\Services;

use Cfpt\Montres\Models\Watch;

class WatchService extends Service {
    public function add(array $properties) {
        $watch = new Watch($this->db)->fill($properties);
        $result = $watch->save();
    }

    public function all() {
        $watch = new Watch($this->db);
        $watches = $watch->all();

        return $watches;
    }
}