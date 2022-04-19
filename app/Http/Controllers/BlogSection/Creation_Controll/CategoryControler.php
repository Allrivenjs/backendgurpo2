<?php

namespace App\Http\Controllers\BlogSection\Creation_Controll;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\DataCollection;
use App\Models\Category;
use App\Traits\Apitraits;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Enum\CodeEnum;

class CategoryControler extends Controller
{
    use Apitraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(6);
        return $this->apiReturn([CategoryResource::collection($categories)->response()->getData(true)],CodeEnum::SUCCESS);
    }

    public function allCategories()
    {
        $categories = Category::all();
        return $this->apiReturn([CategoryResource::collection($categories)],CodeEnum::SUCCESS);
    }

    public function searchCategory($name){
        $categories=Category::query()->where('name','LIKE','%'.$name.'%')->paginate(6);
        return $this->apiReturn([CategoryResource::collection($categories)->response()->getData(true)],CodeEnum::SUCCESS);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories'
        ]);
        $category = Category::create($request->all());
        return $this->apiReturn([$category], CodeEnum::SUCCESS);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::query()->find($id);
        if (is_null($category)) return $this->apiReturn([], CodeEnum::FAIL);
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:categories,slug,$category->id"
        ]);
        $category->update($request->all());
        return $this->apiReturn([$category],CodeEnum::SUCCESS);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::query()->findOrFail($id);
        if ($category) {
            $category->delete();
            return $this->apiReturn([], CodeEnum::SUCCESS);
        } else {
            return $this->apiReturn([], CodeEnum::FAIL);
        }
    }
}
