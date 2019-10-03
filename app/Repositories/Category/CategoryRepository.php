<?php
/**
 * Created by PhpStorm.
 * User: aushev
 * Date: 02.09.2019
 * Time: 22:26
 */

namespace App\Repositories\Category;


use App\Models\Category\Category;
use App\Models\Food\Food;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CategoryRepository
{
    public function get()
    {
        return Cache::remember(__CLASS__ . __METHOD__, 5000, function () {
            return $categories = Category::get();
        });
    }

    public function findBySlug(string $slug): ?Category
    {
        $category = Category::where([Category::ATTR_SLUG => $slug])->first();

        if (null === $category) {
            throw new NotFoundHttpException("Данная категория не найдена");
        }

        return $category;
    }

    public function builder()
    {

        return Category::with('foods')
            ->leftJoin(
                Food::TABLE_NAME,
                Food::TABLE_NAME . '.' . Food::ATTR_CATEGORY_ID,
                '=',
                Category::TABLE_NAME . '.' . Category::ATTR_ID
            );

    }

    public function byId($id)
    {
        return Cache::remember(__CLASS__ . __METHOD__ . $id, 5000, function () use ($id) {
            return Category::find($id);
        });
    }
}
