<?php

namespace Cfpt\Montres\Services;

use Cfpt\Montres\Models\Version;

class VersionService extends Service {
    public function all() {
        $version = new Version($this->db);
        $versions = $version->all();

        return $versions;
    }

    public function find($id) {
        $version = new Version($this->db);
        $version = $version->find($id);
        
        return $version;
    }
}