<?php

use App\Post;
use App\User;
use App\Country;
use App\Photo;
use App\Tag;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/post/{id}','PostController@index');

// Route::resource('/post','PostController');

Route::get('/contact','PostController@contact');

Route::get('/post/{id}/{coba}','PostController@show_view');

// Route::get('post/{id}/{jagoan}', function($id, $jagoan){
//     return "testing ". $id."".$jagoan;
// });

Route::get('admin/post', array('as' => 'admin.home' , function(){
    $url = route('admin.home');

    return "testing ". $url;
}));

Route::get('/insert','PostController@add_post');

Route::get('/read',function(){
    $selected = DB::select('select title, content from posts where id=?',[1]);
    return var_dump($selected);
});

Route::get('/update',function(){

    DB::update('update posts set title = ?, content = ? where id=?',['Edited','Edited juga',1]);

});

Route::get('/delete',function(){

    $deleted = DB::delete('delete from posts where id=?',['1']);

    return $deleted;
});

//EQUALENT

Route::get('/find/{id}',function($id){

    // $posts = Post::all();

    // foreach ($posts as $post){
    //     return $post->title;
    // }
    $posts = Post::find($id);
    return $posts;
});

Route::get('/finding',function(){

    $posts=Post::where('id',2)->orderBy('id','asc')->get();

    return $posts;

});

Route::get('/findwhere',function(){
    // $test = Post::findOrFail(1);
    // return $test;

    $test = Post::where('users_count','>',50)->firstOrFail();
    return $test;

});

Route::get('/inserting',function(){

    $post = new Post;

    $post->title = "aneh tapo nyata";
    $post->content = "tak tung tang tak tung tang";

    $post->save();

});

Route::get('/updating',function(){

    $post = Post::find(4);

    $post->title = "aneh tapo nyata 4";
    $post->content = "tak tung tang tak tung tang";

    $post->save();

});

Route::get('create',function(){

    Post::create(['title'=>"Title baru gan",'content'=>"content baru gan"]);

});

Route::get('/updatebaru',function(){

    Post::where('id',2)->where('is_admin',0)->update(['title'=>'title baru lagi dan lagi','content'=>'content baru lagi dan lagi']);

});

Route::get('/deletebaru',function(){

    // Post::where('id',3)->where('is_admin',0)->delete();
    // $post = Post::find(5);
    // $post->delete();
    Post::destroy(4);

});

Route::get('/softdelete',function(){

    Post::find(7)->delete();

});

Route::get('/see',function(){

    // $post = Post::find(6);

    // return $post;

    $post = Post::withTrashed()->where('id',6)->get();

    return $post;

});

Route::get('/restore', function () {
    
    Post::withTrashed()->where('is_admin',0)->restore();
});

Route::get('/forcedelete', function () {
    Post::where('deleted_at','!=',NULL)->forceDelete();
});

//Relation Laravel

Route::get('/hasone', function () {
    $user = User::find(1)->post->title;

    return $user;
});

Route::get('/inversehasone', function () {
    
    return Post::find(1)->user->name;
});

Route::get('/hasmany', function () {
    
    $users = User::find(1)->post;

    foreach ($users as $user) {
        echo $user;
    }
});

Route::get('/manytomany', function () {

    $users = User::find(1)->roles()->orderBy('id','desc')->get();

    foreach ($users as $user) {
        echo $user;
    }
    
});

Route::get('/pivot', function () {
    
    $users = User::find(1);

    foreach ($users->roles as $user) {
        echo $user->pivot;
    }
});

Route::get('/country', function () {

    // $countries = Country::find(1)->posts;

    // foreach ($countries as $country) {
    //     echo $country->title;
    // }

    $countries = Country::find(1)->users;

    foreach ($countries as $country) {
        echo $country->name;
    }
    
});

//POLYMORPHIC RELATIONS

Route::get('/user/photo', function () {
    
    $users = User::find(1);

    foreach ($users->photos as $user) {
        echo $user;
    }

});

Route::get('/post/photo', function () {
    
    $posts = Post::find(1);

    foreach ($posts->photos as $post) {
        echo $post;
    }

});

Route::get('/photo', function () {
    
    $photo = Photo::find(1);

    return $photo->imagable;

});

//POLYMORP MANY TO MANY

Route::get('/tag', function () {
    
    $tags = Post::find(3);
    
    foreach ($tags->tags as $tag) {
        echo $tag;
    }

});

Route::get('/taggable', function () {

    // $tags = Tag::find(3)->posts;
    $tags = Tag::with('videos', 'posts')->get();

    foreach ($tags as $tag) {
        echo $tag ."<br><br>";
    }
    
});

//FORM VALIDATION

Route::resource('/posts', 'PostController');
// Route::group(['middleware' => 'web'], function () {

//     Route::resource('/posts', 'PostController');
// });