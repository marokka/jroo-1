<?php
declare(strict_types=1);

namespace App\Models\Food\models;


use App\Models\Food\Food;
use App\Models\Food\FoodInfo;
use App\Models\Food\FoodProperty;

class FoodViewModel
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $slug;

    /**
     * @var integer
     */
    public $category_id;

    /**
     * @var integer
     */
    public $status;

    /**
     * @var string
     */
    public $img;

    /**
     * @var string
     */
    public $category;

    /**
     * @var FoodProperty[]
     */
    public $properties;

    /**
     * @var FoodInfo
     */

    public $foodInfo;


    public function __construct(Food $food)
    {
        $this->id          = $food->id;
        $this->name        = $food->name;
        $this->description = $food->description;
        $this->slug        = $food->slug;
        $this->category_id = $food->category_id;
        $this->status      = $food->status;
        $this->img         = $food->img;
        $this->category    = $food->categoryCache()['name'];

        foreach ($food->properties as $property) {
            $this->properties[] = new FoodPropertyItem($property);
        }


        $this->foodInfo = new FoodInfoItem($food->foodInfo);


    }
}
