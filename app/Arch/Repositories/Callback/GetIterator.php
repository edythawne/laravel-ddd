<?php

namespace App\Arch\Repositories\Callback;

interface GetIterator {

    public function get(int $id) : array;

    public function getAll() : array;

}
