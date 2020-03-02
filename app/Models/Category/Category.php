<?php

namespace App\Models\Category;

use App\Models\Food\Food;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Category
 * @property integer $id
 * @property string $name
 * @property string $img
 * @property string $icon
 * @property string $description
 * @property int $oder
 * @property string $slug
 * @property integer $parent_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class Category extends Model
{
    use SoftDeletes;
    use Sluggable;

    const ATTR_ID          = 'id';
    const ATTR_NAME        = 'name';
    const ATTR_IMG         = 'img';
    const ATTR_ICON        = 'icon';
    const ATTR_DESCRIPTION = 'description';
    const ATTR_SLUG        = 'slug';
    const ATTR_ORDER       = 'order';
    const ATTR_PARENT_ID   = 'parent_id';
    const ATTR_CREATED_AT  = 'created_at';
    const ATTR_UPDATED_AT  = 'updated_at';

    const TABLE_NAME = 'categories';

    protected $fillable = [self::ATTR_NAME, self::ATTR_DESCRIPTION, self::ATTR_IMG, self::ATTR_ICON];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     *
     * @author Ibra Aushev <aushevibra@yandex.ru>
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getImgAttribute($value)
    {
        return !$value ? asset('admin_assets/img/no_image.png') : url('storage/' . $value);
    }

    public function getIconAttribute($value)
    {
        return url('storage/' . $value);
    }


    public function foods()
    {
        return $this->hasMany(Food::class);
    }

    public function scopeFilter($builder, $filters)
    {
        return $filters->apply($builder);
    }
}
