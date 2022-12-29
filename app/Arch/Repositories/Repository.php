<?php

namespace App\Arch\Repositories;

use App\Arch\Constants\Constants;
use App\Arch\Repositories\Callback\GetPaginatedIterator;

abstract class Repository {

    protected GetPaginatedIterator $paginated;

    protected function requiredPagination(GetPaginatedIterator $class) {
        $this->paginated = $class;
    }

    public function getPaginated() : array {
        $pages = collect($this->paginated->setPaginated() -> toArray());

        return [
            Constants::KEY_DATA => $pages -> pull(Constants::KEY_DATA, []),
            Constants::KEY_PAGINATION  => $pages
        ];
    }

}
