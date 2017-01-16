<?php

namespace App\Http\Controllers;

use App\Post;
use App\Like;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class PostController extends Controller
{
    public function getIndex(Store $session) 
    {
        $posts = Post::orderBy('title', 'desc')->paginate(3);
        return view('blog.index', ['posts' => $posts]);
    }

    public function getAdminIndex(Store $session)
    {
        $posts = Post::all();
        return view('admin.index', ['posts' => $posts]);
    }

    public function getPost($id)
    {
        $post = Post::where('id', $id)->with('likes')->first();
        return view('blog.post', ['post' => $post]);
    }

    public function getAdminCreate()
    {
        $tags = Tag::all();
        return view('admin.create', ['tags'=>$tags]);
    }

    public function postAdminCreate(Store $session, Request $request)
    {
        $this->validate($request, [
            'title' => 'required | min:10',
            'content' => 'required | min:20'
        ]);
        $post = new Post([
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ]);
        $post->save();
        $post->tags()->attach($request->input('tags') === null ? [] : $request->input('tags'));

        return redirect()->route('admin.index')
                    ->with('status', 'Post created - ' . $request->input('title'));
    }

    public function getAdminEdit(Store $session, $id)
    {
        $post = Post::find($id);
        $tags = Tag::all();        
        return view('admin.edit', ['post' => $post, 'postId'=> $id, 'tags'=>$tags]);
    }

    public function postAdminUpdate(Store $session, Request $request)
    {
        $this->validate($request, [
            'title' => 'required | min:10',
            'content' => 'required | min:20'
        ]);
        $post = Post::find($request->input('postId'));
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();
        // $post->tags()->detach();
        // $post->tags()->attach($request->input('tags') === null ? [] : $request);
        $post->tags()->sync($request->input('tags') === null ? [] : $request->input('tags'));
        return redirect()->route('admin.index')
                    ->with('status', 'Post updated - ' . $request->input('title'));
    }

    public function postAdminDelete(Store $session, $id)
    {
        $post = Post::find($id);
        $post->likes()->delete();        
        $post->tags()->detach();
        $post->delete();
        return redirect()->route('admin.index')
                    ->with('status', 'Post deleted successfully !');
    }

    public function getLikePost($id) {
        $post = Post::where('id', $id)->first();
        $like = new Like();
        $post->likes()->save($like);
        return redirect()->back();
        // return view('blog.post', ['post' => $post]);
    }
}