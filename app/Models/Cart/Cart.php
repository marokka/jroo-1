<?php

namespace App\Models\Cart;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property double $total
 * @property integer $user_id
 * @property string $session
 * @property integer $coupon_id
 */
class Cart extends Model
{
    const SESSION_KEY = '_token';

    const ATTR_ID        = 'id';
    const ATTR_TOTAL     = 'total';
    const ATTR_USER_ID   = 'user_id';
    const ATTR_SESSION   = 'session';
    const ATTR_COUPON_ID = 'coupon_id';

    const TABLE_NAME = 'carts';


    public function properties()
    {
        return $this->hasMany(CartProperty::class);
    }

}
