<?php

namespace Cfpt\Montres\Services;

use Cfpt\Montres\Models\Role;

class RoleService extends Service {
    public function isStaff(int $id) {
        $role = new Role($this->db);
        $role->find($id);
        return $role->name == 'staff' ? true : false;
    }
}