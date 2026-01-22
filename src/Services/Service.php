<?php

namespace Cfpt\Montres\Services;

use Cfpt\Montres\Infrastructure\Database;

abstract class Service {
    protected Database $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }
}