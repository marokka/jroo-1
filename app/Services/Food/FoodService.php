<?php

declare(strict_types=1);

namespace App\Services\Food;

use App\Http\Requests\Foods\FoodRequest;
use App\Models\Food\Food;
use App\Models\Food\FoodProperty;

class FoodService
{
    public function save(FoodRequest $request): Food
    {


        $food = new Food();
        $food->fill($request->all(
            [
                Food::ATTR_NAME,
                Food::ATTR_DESCRIPTION,
                Food::ATTR_CATEGORY_ID,
                Food::ATTR_STATUS
            ]
        )
        );

        if ($request->file('img')) {
            $food->img = $request->file('img')->store('foods', 'public');
        }
        $food->save();

        // ==== Добавление вариаций

        foreach ($request->post('FoodProperty') as $key => $property) {
            $foodProperty = new FoodProperty();
            $foodProperty->fill($property);
            $foodProperty->sort    = $key;
            $foodProperty->food_id = $food->id;
            $foodProperty->save();
        }

        return $food;

    }

    /**
     * @param FoodRequest $request
     * @param $id
     * @return Food
     */
    public function edit(FoodRequest $request, $id): Food
    {
        $model = Food::findOrFail($id);
        $model->fill($request->all([
            Food::ATTR_NAME,
            Food::ATTR_CATEGORY_ID,
            Food::ATTR_STATUS,
            Food::ATTR_DESCRIPTION
        ]));

        if ($request->file('img')) {
            $model->img = $request->file('img')->store('foods', 'public');
        }
        $model->save();

        // ==== Обновление вариаций

        foreach ($request->post('FoodProperty') as $key => $property) {
            $foodProperty = FoodProperty::find($property['id']) ?? new FoodProperty();
            $foodProperty->fill($property);
            $foodProperty->food_id = $model->id;

            $foodProperty->save();
        }

        return $model;

    }

}
