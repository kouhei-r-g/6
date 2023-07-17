<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
    
        return view('posts.index', compact('posts'));
    }
    
    
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'body' => 'required|max:255',
        ]);

        if($validated->fails()) {
            return redirect()->route('posts.index')->withErrors($validated)->withInput();
        }

        $post = new Post;
        $post->body = $request->input('body');
        $post->user_id = Auth::id();
        // 他の必要なプロパティの設定...

        $post->save();

        return redirect()->route('posts.index')->with('success', 'つぶやきが投稿されました。');
    }
    

    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->route('posts.index')->with('success', 'つぶやきが削除されました。');
    }
    
}
