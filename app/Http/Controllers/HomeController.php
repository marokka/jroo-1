<?php

namespace App\Http\Controllers;

use App\Models\Category\Category;
use App\Models\Category\models\CategoryViewModel;
use App\Repositories\Category\CategoryRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * HomeController constructor.
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = $this->categoryRepository->builder()->orderBy(Category::ATTR_ORDER)->get();

        $categoriesWithFoods = [];

        foreach ($categories as $category) {
            $categoriesWithFoods[] = new CategoryViewModel($category);
        }


        return view('home', compact('categories', 'categoriesWithFoods'));
    }

    public function pay()
    {
        return view('static.pay');
    }

    public function delivery()
    {
        return view('static.delivery');
    }

    public function contact()
    {
        return view('static.contact');
    }

    public function bonus()
    {
        return view('static.bonus');
    }
}
