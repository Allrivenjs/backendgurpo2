<?php

namespace App\Http\Controllers\BlogSection\Creation_Controll;

use App\Enum\CodeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostsResource;
use App\Models\Post;
use App\Traits\Apitraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    use Apitraits;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::query()->with(['image','tags','category'])
            ->where('status', 2)
            ->orderByDesc('id')
            ->paginate(9);

        return $this->apiReturn([PostsResource::collection($posts)->response()->getData(true)], CodeEnum::SUCCESS);

    }

    public function getOnePost($post){

        $post= Post::query()
            ->where('slug', $post)
            ->orWhere('id', $post)
            ->first();


        if (is_null($post)){
            return $this->apiReturn(['message'=>'No existe publicacion'], CodeEnum::FAIL);
        }
        $similares = Post::query()->where('category_id', $post->category_id)
            ->where('status',2)
            ->where('id','!=',$post->id)
            ->latest('id')
            ->take(4)->get();
        return $this->apiReturn([new PostsResource($post), 'similares' => PostsResource::collection($similares)], CodeEnum::SUCCESS);
    }


    public function getPosts(){
        $posts = Post::query()->with(['image','tags','category'])
            ->orderByDesc('id')
            ->paginate(10);

        return $this->apiReturn([PostsResource::collection($posts)->response()->getData(true)], CodeEnum::SUCCESS);

    }

    public function searchPosts($name){
        $posts=Post::query()->with(['image','tags','category'])
            ->where('name','LIKE','%'.$name.'%')
            ->orwhereHas('tags', function ($query) use ($name){
                $query->where('name','LIKE','%'.$name.'%');
            })
            ->orWhereHas('category',function ($query) use ($name){
                $query->where('name','LIKE','%'.$name.'%');
            })->paginate(6);
        return $this->apiReturn([PostsResource::collection($posts)->response()->getData(true)], CodeEnum::SUCCESS);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = Post::create([
            'name'=>$request->name,
            'slug'=>$request->slug,
            'status'=>$request->status,
            'category_id'=>$request->category_id,
            'extract'=>$request->extract,
            'body'=>$request->body,
            'user_id'=> Auth::id()
        ]);
        if (is_null($post)) return $this->apiReturn([], CodeEnum::FAIL);
        if ($request->file('image')) {
            $url = Storage::put('posts', $request->file('image'));
            $post->image()->create([
                'url' =>'storage/' . $url,
            ]);
        }
        if ($request->tags) {
            $post->tags()->attach(json_decode($request->tags));
        }
        return $this->apiReturn([], CodeEnum::SUCCESS);
    }



    public function storeImagePost(Request $request){
        $validate =$request->validate([
            'imagen'=>'required'
        ]);
        if ($request->file('imagen')) {
            $url = Storage::put('posts', $request->file('imagen'));
            return $this->apiReturn(['storage/'.$url], CodeEnum::SUCCESS);
        }
        return $this->apiReturn([],CodeEnum::FAIL);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post=Post::query()->find($id);
        if (is_null($post)) return $this->apiReturn(["No existe un post con ese id"], CodeEnum::FAIL);
        $post->update([
            'name'=>$request->name,
            'slug'=>$request->slug,
            'status'=>$request->status,
            'category_id'=>$request->category_id,
            'extract'=>$request->extract,
            'body'=>$request->body,
            'user_id'=> Auth::id()
        ]);

        if ($request->file('image')){
            $url=Storage::put('posts', $request->file('image'));
            if (!is_null($post->image)) {
                Storage::delete($post->image->url);
                $post->image()->update([
                    'url' =>'storage/' . $url,
                ]);
            }else{
                $post->image()->create([
                    'url' =>'storage/' . $url,
                ]);
            }
        }
        if($request->tags){
            $post->tags()->sync(json_decode($request->tags));
        }
        return $this->apiReturn([$post], CodeEnum::SUCCESS);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::query()->find($id);
        if ($post) {
            $post->delete();
            return $this->apiReturn([], CodeEnum::SUCCESS);
        } else {
            return $this->apiReturn([], CodeEnum::FAIL);
        }
    }
}
