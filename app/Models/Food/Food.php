<?php

namespace App\Models\Food;

use App\Models\Category\Category;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

/**
 * Class Food
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $slug
 * @property integer $category_id
 * @property integer $status
 * @property string $img
 * @property string $mitm_id
 */
class Food extends Model
{
    use Sluggable;

    const ATTR_ID          = 'id';
    const ATTR_NAME        = 'name';
    const ATTR_DESCRIPTION = 'description';
    const ATTR_SLUG        = 'slug';
    const ATTR_CATEGORY_ID = 'category_id';
    const ATTR_STATUS      = 'status';
    const ATTR_IMG         = 'img';
    const ATTR_MITM_ID     = 'mitm_id';

    const STATUS_ACTIVE   = 1;
    const STATUS_INACTIVE = 0;

    const TABLE_NAME = "foods";

    protected $with = ['properties'];

    protected $fillable = [
        self::ATTR_NAME,
        self::ATTR_DESCRIPTION,
        self::ATTR_CATEGORY_ID,
        self::ATTR_STATUS,
        self::ATTR_IMG];

    public static function getStatusVariants()
    {
        return [
            static::STATUS_ACTIVE   => 'Активен',
            static::STATUS_INACTIVE => 'Неактивен',
        ];
    }


    /**
     * Опции блюда
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function properties()
    {
        return $this->hasMany(FoodProperty::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function property()
    {
        return $this->hasOne(FoodProperty::class);
    }

    public function propertyCache()
    {
        return Cache::remember(__CLASS__ . __METHOD__ . $this->id, 5000, function () {
            return $this->property()->first();
        });
    }

    /**
     * Категория блюда
     *
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function categoryCache()
    {
        return Cache::remember($this->id . "-category", 5000, function () {
            return $this->category()->first();
        });
    }


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function scopeFilter($builder, $filters)
    {
        return $filters->apply($builder);
    }

    public function getImgAttribute($value)
    {
        return !$value ? asset('admin_assets/img/no_image.png') : url('storage/' . $value);
    }

    public function getDescriptionAttribute($value)
    {
        return true === empty($value) ? "Не заполнено" : $value;
    }

    public function getStatusAttribute($value)
    {
        return static::getStatusVariants()[$value];
    }


    public function foodInfo()
    {
        return $this->hasOne(FoodInfo::class, 'food_id', 'id');
    }
}
