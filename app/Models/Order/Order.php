<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Order
 * @property integer id
 * @property integer cart_id
 * @property string $name
 * @property string $phone
 * @property string $address
 * @property string $home
 * @property string $floor
 * @property string $porch
 * @property string $time_delivery
 * @property string $date_delivery
 * @property string $organization
 * @property string $pay_type
 * @property integer $user_id
 * @property integer $total
 * @property string $comment
 * @property integer $status
 */
class Order extends Model
{
    use SoftDeletes;

    const TABLE_NAME = 'orders';

    const ATTR_ID            = 'id';
    const ATTR_CART_ID       = 'cart_id';
    const ATTR_NAME          = 'name';
    const ATTR_PHONE         = 'phone';
    const ATTR_ADDRESS       = 'address';
    const ATTR_HOME          = 'home';
    const ATTR_FLOOR         = 'floor';
    const ATTR_PORCH         = 'porch';
    const ATTR_TIME_DELIVERY = 'time_delivery';
    const ATTR_DATE_DELIVERY = 'date_delivery';
    const ATTR_ORGANIZATION  = 'organization';
    const ATTR_PAY_TYPE      = 'pay_type';
    const ATTR_USER_ID       = 'user_id';
    const ATTR_TOTAL         = 'total';
    const ATTR_COMMENT       = 'comment';
    const ATTR_STATUS        = 'status';

    const STATUS_NEW      = 0;
    const STATUS_ACCEPTED = 1;
    const STATUS_READY    = 2;
    const STATUS_DONE     = 3;


    const TYPE_CASH   = 0;
    const TYPE_ONLINE = 1;

    protected $fillable = [
        self::ATTR_ID,
        self::ATTR_CART_ID,
        self::ATTR_NAME,
        self::ATTR_USER_ID,
        self::ATTR_ADDRESS,
        self::ATTR_COMMENT,
        self::ATTR_DATE_DELIVERY,
        self::ATTR_FLOOR,
        self::ATTR_PHONE,
        self::ATTR_HOME,
        self::ATTR_PORCH,
        self::ATTR_TIME_DELIVERY,
        self::ATTR_ORGANIZATION,
        self::ATTR_PAY_TYPE,
        self::ATTR_TOTAL,
        self::ATTR_STATUS,
    ];

    protected $attributes = [
        self::ATTR_STATUS => self::STATUS_NEW,
    ];

    public function scopeFilter($builder, $filters)
    {
        return $filters->apply($builder);
    }

    public static function getStatusesVariants()
    {
        return [
            static::STATUS_NEW      => 'Новый',
            static::STATUS_ACCEPTED => 'Принят',
            static::STATUS_READY    => 'Готов',
            static::STATUS_DONE     => 'Выполнен',
        ];
    }


    public static function getTypesVariants()
    {
        return [
            static::TYPE_CASH   => 'Наличными',
            static::TYPE_ONLINE => 'Онлайн',
        ];
    }

    public function getFullAddressAttribute($value)
    {
        return implode(',', [$this->address]);
    }

}
