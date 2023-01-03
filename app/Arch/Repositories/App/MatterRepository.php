<?php

namespace App\Arch\Repositories\App;

use App\Arch\Repositories\Callback\CreateIterator;
use App\Arch\Repositories\Callback\GetIterator;
use App\Arch\Repositories\Callback\GetPaginatedIterator;
use App\Arch\Repositories\Repository;
use App\Models\App\Matter;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Support\Facades\DB;

class MatterRepository extends Repository implements GetIterator, GetPaginatedIterator, CreateIterator {

    public function __construct() {
        $this -> requiredPagination($this);
    }

    public function get(int $id) : array {
        return Matter::get($id);
    }

    public function getAll(): array {
        return Matter::get();
    }

    public function setPaginated(): AbstractPaginator {
        return Matter::getPaginated();
    }

    public function create(array $attributes): array {
        DB::beginTransaction();

        try {
            $matter = Matter::new($attributes);
            DB::commit();
            return $matter ?? [];
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
        }
    }

}
