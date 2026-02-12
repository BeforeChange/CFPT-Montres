<?php

namespace Cfpt\Montres\Services;

use Cfpt\Montres\Models\Brand;

class BrandService extends Service {
    public function all() {
        $brand = new Brand($this->db);
        $brands = $brand->all();

        return $brands;
    }

    public function find($id){
        $brand = new Brand($this->db);
        $brand = $brand->find($id);

        return $brand;
    }
}