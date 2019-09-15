<?php

namespace App\Http\Controllers\Admin;

use App\Filters\FoodFilter;
use App\Http\Requests\Foods\FoodRequest;
use App\Models\Category\Category;
use App\Models\Food\Food;
use App\Models\Food\FoodProperty;
use App\Repositories\Food\FoodReadRepository;
use App\Services\Food\FoodService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FoodController extends Controller
{

    const TITLE = "Блюда";


    const ROUTE_INDEX   = 'food.index';
    const ROUTE_CREATE  = 'food.create';
    const ROUTE_SHOW    = 'food.show';
    const ROUTE_STORE   = 'food.store';
    const ROUTE_UPDATE  = 'food.update';
    const ROUTE_EDIT    = 'food.edit';
    const ROUTE_DESTROY = 'food.destroy';

    /**
     * @var FoodService
     */
    private $foodService;
    /**
     * @var FoodReadRepository
     */
    private $foodReadRepository;
    /**
     * @var Food
     */
    private $model;

    public function __construct(FoodService $foodService, FoodReadRepository $foodReadRepository, Food $model)
    {
        $this->foodService        = $foodService;
        $this->foodReadRepository = $foodReadRepository;
        $this->model              = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, FoodFilter $filter)
    {

        $foods = $this->foodReadRepository->get()->filter($filter)->paginate(15);
        return view('admin.food.index', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        $variants   = Food::getStatusVariants();

        return view('admin.food.create', compact('categories', 'variants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(FoodRequest $request)
    {
        $food = $this->foodService->save($request);

        return redirect()->route('food.show', $food->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $food = Food::findOrFail($id);

        return view("admin.food.show", ['model' => $food]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /**
         * @var Food $food
         */
        $food          = $this->model->findOrFail($id);
        $categories    = Category::get();
        $variants      = Food::getStatusVariants();
        $foodPropeties = $food->properties->toArray();

        return view('admin.food.edit', [
            'model'          => $food,
            'categories'     => $categories,
            'variants'       => $variants,
            'foodProperties' => $foodPropeties
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  FoodRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(FoodRequest $request, $id)
    {
        $this->foodService->edit($request, $id);

        return redirect()->route(static::ROUTE_SHOW, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = $this->model->findOrFail($id);

        if (!$model->delete()) {
            throw new \Exception("Не удалось удалить!");
        }

        return redirect()->route(static::ROUTE_INDEX);
    }
}
