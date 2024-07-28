<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $posts=Post::all();
        return  Inertia::render('Posts/Index',['posts'=>$posts]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  Inertia::render('Posts/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostStoreRequest $request)
    {
        // dd('hi');
        $validatedData = $request->validated();
        $path = $request->file('image')->store('images', 'public');
        Post::create([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'image' => $path,
            'user_id' => auth()->user()->id
        ]);

        return to_route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
    
        $post=Post::with('user','comments')->find($post->id);
        
        return  Inertia::render('Posts/Show',['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        
        $post=Post::with('user','comments') ->find($post->id);
        return  Inertia::render('Posts/Edit',['post'=>$post]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
            if(auth()->user()->id != $post->user_id){
                return abort(403);
            }
            $validatedData = $request->validated();
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('images', 'public');
                $post->update([
                    'title' => $validatedData['title'],
                    'content' => $validatedData['content'],
                    'image' => $path
                ]);
            } 
            $post->update([
                'title' => $validatedData['title'],
                'content' => $validatedData['content'],
                
            ]);
            return to_route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {   
        if(auth()->user()->role == 'admin'){
            $post->delete();    
            return to_route('dashboard.posts');

        }else if(auth()->user()->id != $post->user_id ){
            return abort(403);
        }
        $post->delete();    
        return to_route('posts.index');
    }
}
