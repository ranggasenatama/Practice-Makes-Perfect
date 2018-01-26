<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::all();

        return view('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->get('title');
        // return $request->title;
        // return $request->all();

        $this->validate($request,[
            'title'=>'required|max:20|unique:posts',
            'content'=>'required'
        ]);

        Post::create($request->all());

        return redirect('/posts');

        // $input = $request->all();

        // $input['title'] = $request->title;

        // Post::create($request->all());

        // $save = new Post($request->all());

        // $save->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $post = Post::findOrFail($id);

        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('post.edit',compact('post'));
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
        $post = Post::findOrFail($id);

        $post->update($request->all());
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->forceDelete();

        return redirect('/posts');
    }

    public function contact()
    {
        $people = ['Rangga', 'ganteng', 'sangat'];

        return view('content',compact('people'));
    }

    public function show_view($id,$coba)
    {
        // return view('post')->with('id',$id);
        return view('post',compact('id','coba'));
    }

    public function add_post()
    {
        DB::insert('insert into posts(title,content) values(?,?)',['Mantap gan','Ini kontentnya']);
    }
}
