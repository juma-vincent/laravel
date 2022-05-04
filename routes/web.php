<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\ProductController; // importing  controller 
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return "Hello Juma";//view('welcome');
// });

// Route::get('/', function () {
//     return "Hello Juma";//view('welcome');
// });

// Route::get("/about", function(){
//     return "<h1>About Page</h1>";
// });


// Route::get('/products',[ProductController::class, 'products']);
// Route::get('/contact', [ProductController::class, 'contact']);

// Route::get('/my_product', [ProductController::class, 'prod']);
// Route::resource('user', UserController::class);

// Route::get('/contact', [ProductController::class, 'contact']); 


// -------------------------------
// DATABASE RAW SQL QUERIES
// -------------------------------


// INSERT
// -------------------------------

// Route::get('/insert', function(){
//     DB::insert('insert into posts(title, content) values(?, ?)',["Laravel", "Intro to Laravel."]);
// });


// READ
// -------------------------------

// Route::get('/read', function(){
//     $posts = DB::select('select * from posts where id=?', [1]);
    
//     foreach($posts as $post){
//         return " Post title is $post->title, Content is : $post->content";
//     }

// });

// UPDATE
// -------------------------------

// Route::get('/update', function(){
//     $updatedPosts = DB::update('update posts set title="Updated Title" where id=?', [1]);
//     return $updatedPosts;
// });

// DELETE
// -------------------------------
// Route::get('/delete', function(){
//     $deleted = DB::delete('delete from posts where id=?', [1]);
//     return $deleted;
// });



// -------------------------------
// ELOQUENT/ORM
// -------------------------------
use App\Models\Post;
use App\Models\User;

// READING ALL DATA
// -------------------------------
// Route::get('/read', function(){
//     $posts = Post::all();      

//     foreach($posts as $post){
//         echo $post->title;
//     }
// });

// FINDING WITH ID
// --------------------------
// Route::get('/find', function(){
//     $post = Post::find(2);
//     return $post;
// });

// FINDING WITH WHERE CONDITION
// --------------------------
// Route::get('/findwhere', function(){
//     $posts = Post::where('id', 2)->orderBy('id', 'desc')->take(1)->get();
//     return $posts;

// });

// FINDING OR FAIL
// --------------------------
// Route::get('/findorfail', function(){
//     $post = Post::findOrFail(1);
//     return $post;
// });

//OTHER ORM QUERIES
// Post::where('users_count', '<', 50)->firstOrFail();



// INSERTING AND SAVING DATA WITH ORM
// --------------------------
// Route::get('/insertdata', function(){
//     $post = new Post;

//     $post->title="Ruby On Rails";
//     $post->content = "A Framework for Ruby";

//     $post->save();

// });



//ALTERNATIVE TO INSERTING DATA(MassAssignmentException) -IS GOOD WITH FORMS
// --------------------------
// Route::get('/create', function(){
//     Post::create(["title"=>"ASP.NET", "content"=>"A Framework for C#"]);
// });
//Go to Post model and add: protected $fillable = ['title', 'content'];


//UPDATING DATA
// --------------------------

    // 1.Updating by Using find()
    // Route::get('/updatebyfind', function(){
    //     $post = Post::find(3);
    //     $post->content = "Node is a Javascript runtime.";
    //     $post->save();
    // });

    // 2.Another way of updating data
    // Route::get('/update', function(){
    //     Post::where('id', 3)->where('is_featured', 0)->update(['content'=>'Node is a JS runtime.']);
    // });


//DELETING DATA
// --------------------------
    // 1.Using delete() method
    // Route::get('/delete', function(){
    //     $post = Post::find(8)->delete();
    //     return "The deleted post is: $post";
    // });

    Route::get('/insertdata', function(){
            $post = new Post;
        
            $post->title="React JS";
            $post->content = "A Javscript Library";
        
            $post->save();
        
        });

    // 2.Using destroy() method
    // Route::get('/delete2', function(){
    //     Post::destroy(11);
    // });
    // if you want to delete multiple, use Post::destroy([3,4,10]);
    //you can also use Post::where('is_featured', 0)->delete();


//SOFT DELETING AND TRASHING
// --------------------------

// We'll have to import SoftDelete for the ModelClass, example Post model like below:
    // use Illuminate\Database\Eloquent\SoftDeletes;

//inside the Post class, add the below code:
    // use SoftDeletes;
    // protected $dates = ['deleted_at'];

//Then make the below migration:
    // php artisan make:migration add_deleted_at_colum_to_posts_table --table="posts"

//Inside the above migration, on the up method, inside Schema::table's callback, add below code:
    // $table->softDeletes();
// In case you'd want to rollback, add the code below to Schema::table's callback on down() method   
    // $table->dropSoftDeletes();
//Then migrate the changes

// Route::get('/softdelete', function(){
//     Post::find(1)->delete();
// });

// After implementing sofDelete, when we use the delete() method on data, it wont appear througth all() method and also
//  it wont get deleted immediately. Instead it is added to trash and a timestamp will be added to the deleted_at column.
//  We will have toretrieve it in a special manner then delete it permanently because we can't get that data with the normal
//  query commands.


//RETRIEVING DELETED TRASHED RECORDS
// Route::get('/readsoftdeleted', function(){
//     $posts = Post::onlyTrashed()->where('is_featured', 0)->get();
//     return $posts;
// });

//RESTORING TRASHED RECORDS
// Route::get('/restore', function(){
//    Post::withTrashed()->restore(); // retrieving all posts including trashhed after restoring trashed
// });

//DELETING A RECORD PERMANENTLY
// Route::get('/forcedelete', function(){
//     Post::onlyTrashed()->where('id', 6)->forceDelete();
    
// });


// ONE TO ONE RELATIONSHIP
Route::get('/user/{id}/post', function($id){
    echo User::find($id)->post;
});