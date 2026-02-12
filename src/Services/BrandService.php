<?php

namespace Cfpt\Montres\Services;

use Cfpt\Montres\Models\Brand;

class BrandService extends Service {
    public function all() {
        $brand = new Brand($this->db);
        $brands = $brand->all();

        return $brands;
    }
}