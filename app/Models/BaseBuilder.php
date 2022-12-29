<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class BaseBuilder {

    protected Builder $builder;

    private function __construct(Builder $builder) {
        $this -> builder = $builder;
    }

    public static function of(Model $model){
        return new BaseBuilder($model ->newQuery());
    }

    public static function with(Builder $builder){
        return new BaseBuilder($builder);
    }

    public function baseQuery(array $relations = [], int $id = null) : BaseBuilder {
        $this -> builder -> with($relations);

        if (isset($id)) {
            $this -> builder -> where('id', $id) -> take(1);
        }

        return $this;
    }

    public function isActive(bool $isActive = true) : BaseBuilder {
        $this -> builder -> where('active', $isActive);
        return $this;
    }

    public function orderById(bool $isOrderDesc = false) : BaseBuilder {
        $this -> builder -> orderBy('id', $isOrderDesc ? 'desc' : 'asc');
        return $this;
    }

    public function reloadRelations(array $relations) : Model {
        return $this -> builder -> getModel() -> load($relations);
    }

    public function getBuilder() : Builder {
        return $this->builder;
    }

    public function toArray(bool $requireFirst = false) : array {
        if ($requireFirst) {
            $result = $this -> builder -> first();
            return isset($result) ? $result -> toArray() : [];
        }

        return $this->builder->get()->toArray();
    }

}
