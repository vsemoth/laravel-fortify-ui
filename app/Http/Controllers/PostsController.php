<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('updated_at', 'desc')->paginate(10);
        return view('manage.posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return Create Page with select data
        return view('manage.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        $this->validate($request, [
            'post_title' => 'required|unique:posts,title',
            'post_content' => 'required',
            'category_id' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        // Handle file upload
        if ($request->hasFile('cover_image')) {
            # Get the filename with extension
            $filenameWithExt = $request->file('cover_image')->GetClientOriginalName();

            # Get FileName Only
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            # Get Extension Only
            $extension = $request->file('cover_image')->GetClientOriginalExtension();

            # Filename to Store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            # Upload the Image
            $path = $request->file('cover_image')->storeAs('public/images/cover_images', $fileNameToStore);

        } else {
            # Set default file
            $fileNameToStore = 'noimage.jpg';
        }

        // Create new Post instance
        $post = new Post;

        $post->post_title = $request->input('post_title');

        $post->post_content = $request->input('post_content');

        $post->category_id = $request->category_id;

        $str = $post->post_title;

        $sep='-';
        
        $res = strtolower($str);
        $res = preg_replace('/[^[:alnum:]]/', ' ', $res);
        $res = preg_replace('/[[:space:]]+/', $sep, $res);
        $slug = trim($res, $sep);

        $post->slug = rtrim($slug, '/');

        $post->cover_image = $fileNameToStore;

        $post->save();

        Session::flash('success', 'Post created successfully');

        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        // Return Show Page
        return view('manage.posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    // Fetch post data from DB
        $post = Post::find($id);
        $posts = Post::all();
        // Fetch select id from DB (Categories)
        $categories = Category::all();
    // Check correct user authentication
    /*if (Auth::user()->id != $post->user_id) {
        # Redirect user to Post Index route
        return redirect('/posts')->with('error', 'Unauthorized Access!');
    }*/

    // Return edit view with data
        return view('manage.posts.edit')->with('post', $post)->with('posts', $posts)->with('categories', $categories);
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
        // Validation
        $this->validate($request, [
            'post_title' => 'required',
            'post_content' => 'required',
            'category_id' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        // Handle file upload
        if ($request->hasFile('cover_image')) {
            # Get the filename with extension
            $filenameWithExt = $request->file('cover_image')->GetClientOriginalName();

            # Get FileName Only
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            # Get Extension Only
            $extension = $request->file('cover_image')->GetClientOriginalExtension();

            # Filename to Store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            # Upload the Image
            $path = $request->file('cover_image')->storeAs('public/images/cover_images', $fileNameToStore);
        }

        // Find Post in DB by ID
        $post = Post::find($id);

        $post->page_id = $request->page_id;

        $post->post_title = $request->input('post_title');

        $post->post_content = $request->input('post_content');

        $post->category_id = $request->category_id;

        $post->drop = $request->drop;

        $str = $post->post_title;

        $sep='-';
        
        $res = strtolower($str);
        $res = preg_replace('/[^[:alnum:]]/', ' ', $res);
        $res = preg_replace('/[[:space:]]+/', $sep, $res);
        $slug = trim($res, $sep);
        

        $post->slug = $slug;

        if ($request->hasFile('cover_image')) {
            # Replace Feature Image
            $post->cover_image = $fileNameToStore;
        }

        $post->save();

        return redirect('manage/posts')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);

        //
        $post->delete();

        //
        return redirect()->route('posts.index');
    }
}
