<?php

namespace App\Arch\Repositories\Callback;

interface UpdateIterator {

    public function updateById(array $attributes, int $id) : array;

    public function deleteById(int $id) : bool;

}
