<?php

namespace App\Arch\Repositories\Callback;

interface CreateIterator {

    public function create(array $attributes) : array;

}
