<?php

namespace Cfpt\Montres\Models;

use Cfpt\Montres\Models\Model;

class Watch extends Model {
    public ?string $name;
    public ?string $image;
    public ?int $id_version;
    public ?int $price;
    public ?string $short_description;
    public ?string $long_description;

    protected function table(): string {
        return strtolower((new \ReflectionClass($this))->getShortName()) . 'es';
    }
}