<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Filters\FoodFilter;
use App\Models\Category\Category;
use App\Models\Food\Food;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Food\FoodReadRepository;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * @var FoodReadRepository
     */
    private $foodReadRepository;
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * FoodController constructor.
     * @param FoodReadRepository $foodReadRepository
     */
    public function __construct(FoodReadRepository $foodReadRepository, CategoryRepository $categoryRepository)
    {
        $this->foodReadRepository = $foodReadRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function byCategorySlug(string $slug, FoodFilter $filter)
    {
        $category = $this->categoryRepository->findBySlug($slug);
        $foods    =
            $this->foodReadRepository
                ->get()->filter($filter)
                ->where(Food::ATTR_CATEGORY_ID, $category->id)
                ->paginate(15);

        $breadcumb = $category->name;

        return view('food.index', ['model' => $foods, 'category' => $category, 'breadcumb' => $breadcumb]);
    }

    public function bySearch(FoodFilter $filter)
    {
        $foods = $this->foodReadRepository->get()->filter($filter)->paginate(9);

        return view('food.index', ['model' => $foods, 'breadcumb' => "Поиск"]);
    }

    public function byId(Request $request, $id)
    {
        $model = $this->foodReadRepository->byId($id);
        return $request->get('show') ? view('food.api.quicview', compact('model')) : $model;
    }


}
