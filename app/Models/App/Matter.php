<?php

namespace App\Models\App;

use App\Models\BaseBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Pagination\AbstractPaginator;

class Matter extends Model {

    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;
    protected $table = 'CatalogMatter';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'area_id',
        'code',
        'abbreviation',
        'name',
        'active',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_by',
    ];

    /**
     * Metodo base
     * @param array $relations
     * @param int|null $id
     * @return Builder
     */
    private static function base(array $relations = [], int $id = null) : Builder {
        return BaseBuilder::of(self::getModel()) -> baseQuery($relations, $id) -> isActive() -> getBuilder();
    }

    public static function get(int $id = null) : array {
        $builder = BaseBuilder::with(self::base([], $id));

        if (isset($id)) {
            return $builder -> toArray(true);
        }

        return $builder -> toArray();
    }

    public static function getPaginated() : AbstractPaginator {
        return self::base() -> paginate() -> withQueryString();
    }

    public static function new(array $attributes): ?array {
        return Matter::firstOrCreate($attributes)?->toArray();
    }

}
