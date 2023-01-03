<?php

namespace App\Arch\Domain\Iterators\Builder;

trait MatterTrait {

    protected function builderCreate(array $args): array {
        return [
            'area_id' => $args['area_id'],
            'abbreviation' => $args['abbreviation'],
            'name' => $args['name'],
            'created_by' => 1605408,
        ];
    }
}
