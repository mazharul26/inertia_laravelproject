<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\PostInfo;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostInfoController extends Controller
{
    //
    public function index()
    {
        $posts = PostResource::collection(PostInfo::paginate(10));

       // return $posts;
        return Inertia::render('Postinfo/Index', [
            'posts' => $posts
        ]);
    }


    public function create()
    {
      return Inertia::render('Postinfo/Create');
    }

    public function store(Request $request)
    {
        $user = PostInfo::create([
            'title' => $request->title,
            'url' => $request->url,
            'description' => $request->description,
            'post_date' => $request->post_date,

        ]);
        return to_route('post.index');
    }

    public function edit($id)
    {
        $post = PostInfo::find($id);
        //return  $post;
      return Inertia::render('Postinfo/Edit',['post'=>$post]);
    }

    public function update(Request $request,$id)
    {

        $postData = PostInfo::find($id);
        $postData->title = $request->title;
        $postData->url = $request->url;
        $postData->description = $request->description;
        $postData->post_date = $request->post_date;
        $postData->save();
        return to_route('post.index');
    }

    public function destroy($post_id)
    {
     // return $post_id;
       PostInfo::find($post_id)->delete();
        return to_route('post.index');
    }


}
