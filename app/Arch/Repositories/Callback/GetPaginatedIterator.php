<?php

namespace App\Arch\Repositories\Callback;

use Illuminate\Pagination\AbstractPaginator;

interface GetPaginatedIterator {

    public function setPaginated() : AbstractPaginator;

}
