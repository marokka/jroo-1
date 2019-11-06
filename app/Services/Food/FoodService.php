<?php

declare(strict_types=1);

namespace App\Services\Food;

use App\Http\Requests\Foods\FoodRequest;
use App\Models\Food\Food;
use App\Models\Food\FoodInfo;
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
        $food->mitm_id   = 0;
        $food->mitm_name = "";
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


        if ($request->post('FoodInfo')) {
            $foodInfo = FoodInfo::find($food->id) ?? new FoodInfo();
            $foodInfo->fill($request->post('FoodInfo'));
            $foodInfo->food_id = $food->id;
            $foodInfo->save();

        }


        $food->recomend()->sync($request->post('recomendID'));

        if ($request->file('imgs')) {

            foreach ($request->file('imgs') as $file) {
                $fileModel = new Image();
                $fileModel->image = $file->store('foods', 'public');
                $fileModel->model = $fileModel::MODEL_FOOD;
                $fileModel->model_id = $food->id;
                $fileModel->save();
            }
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

        /**
         * @var Food $model
         */
        $model = Food::findOrFail($id);
        $model->fill($request->all([
            Food::ATTR_NAME,
            Food::ATTR_CATEGORY_ID,
            Food::ATTR_STATUS,
            Food::ATTR_DESCRIPTION
        ]));

        $model->mitm_id   = 0;
        $model->mitm_name = "";

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

        if ($request->post('FoodInfo')) {
            $foodInfo = FoodInfo::find($model->id) ?? new FoodInfo();
            $foodInfo->fill($request->post('FoodInfo'));
            $foodInfo->food_id = $model->id;
            $foodInfo->save();

        }

        $model->recomend()->sync($request->post('recomendID'));


        return $model;

    }

}
