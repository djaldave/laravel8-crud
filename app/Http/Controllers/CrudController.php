<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    //
    public function index(){
        $index  = Post::all();
        return view("posts.index", compact("index"));
    }

    public function create(){
        return view("posts.create");
    }

    public function store(Request $request){
        $request->validate([
            'title'=> 'required|max:255',
            'description'=> 'required|max:255',
            'price'=> 'required|max:255'
        ]);
        $post = new Post([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
        ]);
        $post->save();
        return redirect('/index')->with('success', 'Post added successfully!');
    }

    public function show($id){
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    public function edit($id){
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'title'=> 'required|max:255',
            'description'=> 'required|max:255',
            'price'=> 'required|max:255|numeric'
        ]);
        $post = Post::find($id);
        $post->title = $request->get('title');
        $post->description = $request->get('description');
        $post->price = $request->get('price');
        $post->save();
        return redirect('/index')->with('success', 'Post edited successfully!');
    }
    public function destroy($id){
        $post = Post::find($id);
        $post->delete();
        return redirect('/index')->with('success', 'Post deleted!');
    }
}
