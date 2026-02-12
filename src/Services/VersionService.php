<?php

namespace Cfpt\Montres\Services;

use Cfpt\Montres\Models\Version;

class VersionService extends Service {
    public function all() {
        $version = new Version($this->db);
        $versions = $version->all();

        return $versions;
    }
}