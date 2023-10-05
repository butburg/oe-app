<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // this one will protect the controller for logins and redirect to login page
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$posts = Post::orderBy('created_at','desc')->take(2)->get();
        $posts = Post::orderBy('created_at', 'desc')->cursorPaginate(2);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $post = Post::find(1);
        return view('posts.create')->with('posts', $post);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            // check its an image format and the size below 2MB
            'cover_image' => 'image|nullable|max:1999'
        ]);


        // handle File Upload
        if ($request->hasFile('cover_image')) {
            // get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // get jsut filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // filename to store
            $filenameToStore = $filename . '_' . time() . '.' . $extension;
            // upload the image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $filenameToStore);
            // note: created a simlink with sail artisan storage:link so the not accessible storage is linked to the public storage
        } else {
            $filenameToStore = 'noimage.jpg';
        }

        // create Post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $filenameToStore;
        $post->save();

        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);

        // check if user is owner and can edit
        if (auth()->user()->id !== $post->user_id) {
            return redirect('posts')->with('error', 'Unauthorized Page');
        }

        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        $post = Post::find($id);


        // handle File Upload
        if ($request->hasFile('cover_image')) {
            // get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // get jsut filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // filename to store
            $filenameToStore = $filename . '_' . time() . '.' . $extension;
            // upload the image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $filenameToStore);
            // note: created a simlink with sail artisan storage:link so the not accessible storage is linked to the public storage
        }

        if ($request->hasFile('cover_image')) {
            if ($post->cover_image != 'noimage.jpg') {
                Storage::delete('public/cover_images/' . $post->cover_image);
            }
            $post->cover_image = $filenameToStore;
        }

        // update Post
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if ($request->hasFile('cover_image')) {
            $post->cover_image = $filenameToStore;
        }
        $post->save();

        return redirect('/posts')->with('success', 'Post updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);

        // check if user is owner and can delete
        if (auth()->user()->id !== $post->user_id) {
            return redirect('posts')->with('error', 'Unauthorized Page');
        }

        if ($post->cover_image != 'noimage.jpg') {
            // delete the image
            Storage::delete('public/cover_images/' . $post->cover_image);
        }

        $post->delete();
        return redirect('/posts')->with('success', 'Post removed');
    }
}
