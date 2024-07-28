<?php
use App\Models\Post;
use App\Http\Controllers\PostController;
use App\Models\User;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $posts=Post::all();
    return Inertia::render('Posts/Index',['posts'=>$posts]);
});


Route::middleware(['auth'])->group(function () {

    Route::resource('posts', PostController::class);
    Route::resource('comments', CommentController::class);
});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', function () {
        $users = User::all();
        return Inertia::render('Dashboard/Users' , ['users' => $users]);
    })->name('dashboard');

 Route::post('/users/{id}/ban', function ($id)   {
    $user = User::findOrFail($id);
    if ($user->is_banned == 1) {
        $user->is_banned = 0;
    }else{

        $user->is_banned = 1;
    }
    $user->save();

    return to_route('dashboard');
})->name('users.ban');;
});

Route::get('allposts', function ($id) {



    return Inertia::render('Posts/Index');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
