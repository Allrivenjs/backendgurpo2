<?php

namespace App\Http\Controllers\BlogSection\Creation_Controll;

use App\Enum\CodeEnum;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\DataCollection;
use App\Models\Tag;
use App\Traits\Apitraits;
use Illuminate\Http\Request;

class TagControler extends Controller
{
    use Apitraits;
    private $colors=[
        'red'=>'Color Red',
        'yellow' => 'Color Yellow',
        'green' => 'Color Green',
        'blue' => 'Color Blue',
        'indigo' => 'Color Indigo',
        'purple' => 'Color Purple',
        'pink' => 'Color Pink'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags= Tag::paginate(6);
        return $this->apiReturn([CategoryResource::collection($tags)->response()->getData(true)],CodeEnum::SUCCESS);
    }

    public function getAllTags()
    {
        $tags= Tag::all();;
        return $this->apiReturn([CategoryResource::collection($tags)],CodeEnum::SUCCESS);
    }

    public function searchTags($name){
        $tags=Tag::query()->where('name','LIKE','%'.$name.'%')->paginate(6);
        return $this->apiReturn([CategoryResource::collection($tags)->response()->getData(true)],CodeEnum::SUCCESS);
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
            'slug' => 'required|unique:tags',
            'color' => 'required',
        ]);
        $tags=Tag::create($request->all());
        return $this->apiReturn([$tags],CodeEnum::SUCCESS);
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
        $tag=Tag::query()->find($id);
        if (is_null($tag)) return $this->apiReturn([], CodeEnum::FAIL);
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:tags,slug,$tag->id",
            'color' => 'required',
        ]);
        $tag->update($request->all());
        return $this->apiReturn([$tag],CodeEnum::SUCCESS);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag=Tag::query()->find($id);
        if ($tag) {
            $tag->delete();
            return $this->apiReturn([], CodeEnum::SUCCESS);
        } else {
            return $this->apiReturn([], CodeEnum::FAIL);
        }
    }
}
