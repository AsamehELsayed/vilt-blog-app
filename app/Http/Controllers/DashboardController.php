<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
class DashboardController extends Controller
{
    public function Users() {
        $users = User::paginate(10);
        return Inertia::render('Dashboard/Users' , ['users' => $users]);
    }
    public function Posts(){
        $posts = Post::with('user')->paginate(10);
        return Inertia::render('Dashboard/Posts', ['posts' => $posts]);
    }
    public function Comments()
    {
        $comments=Comment::with('user','post')->paginate(10);
        return  Inertia::render('Dashboard/Comments',['comments'=>$comments]);
    }

}