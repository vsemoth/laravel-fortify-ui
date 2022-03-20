<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kidsparty;
use App\Models\Category;
use Session;

class KidspartiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kidsparties = Kidsparty::orderBy('updated_at', 'desc')->paginate(10);
        return view('admin.kidsparties.index')->with('kidsparties', $kidsparties);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Fetch select id from DB (Categories)
        $categories = Category::all();
        // Return Create Page with select data
        return view('admin.kidsparties.create')->with('categories', $categories);
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
            'blog_title' => 'required|unique:kidsparties,title',
            'blog_content' => 'required',
            'category_id' => 'required'
        ]);

        // Create new kidsparties instance
        $kidsparties = new Kidsparty;

        $kidsparties->blog_title = $request->input('blog_title');

        $kidsparties->blog_content = $request->input('blog_content');

        $kidsparties->category_id = $request->category_id;

        $str = $kidsparties->blog_title;

        $sep='-';
        
        $res = strtolower($str);
        $res = preg_replace('/[^[:alnum:]]/', ' ', $res);
        $res = preg_replace('/[[:space:]]+/', $sep, $res);
        $slug = trim($res, $sep);

        $kidsparties->blog_slug = $slug;

        $kidsparties->save();

        Session::flash('success', 'kidsparties post created successfully');

        return redirect()->route('kidsparties.index')->with('success', 'kidsparties post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kidsparties = Kidsparty::find($id);
        // Return Show Page
        return view('admin.kidsparties.show')->with('kidsparties', $kidsparties);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    // Fetch kidsparties data from DB
        $kidsparty = Kidsparty::find($id);
        $kidsparties = Kidsparty::all();
        // Fetch select id from DB (Categories)
        $categories = Category::all();
    // Check correct user authentication
    /*if (Auth::user()->id != $kidsparties->user_id) {
        # Redirect user to kidsparties Index route
        return redirect('/kidsparties')->with('error', 'Unauthorized Access!');
    }*/

    // Return edit view with data
        return view('admin.kidsparties.edit')->with('kidsparties', $kidsparties)->with('kidsparty', $kidsparty)->with('categories', $categories);
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
            'blog_title' => 'required|unique:kidsparties,title',
            'blog_content' => 'required',
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

        // Find kidsparties in DB by ID
        $kidsparties = Kidsparty::find($id);

        $kidsparties->page_id = $request->page_id;

        $kidsparties->blog_title = $request->input('blog_title');

        $kidsparties->blog_content = $request->input('blog_content');

        $kidsparties->category_id = $request->category_id;

        /* $kidsparties->drop = $request->drop; */

        $str = $kidsparties->blog_title;

        $sep='-';
        
        $res = strtolower($str);
        $res = preg_replace('/[^[:alnum:]]/', ' ', $res);
        $res = preg_replace('/[[:space:]]+/', $sep, $res);
        $slug = trim($res, $sep);
        

        $kidsparties->blog_slug = $slug;

        if ($request->hasFile('cover_image')) {
            # Replace Feature Image
            $kidsparties->cover_image = $fileNameToStore;
        }

        $kidsparties->save();

        return redirect('admin/kidsparties')->with('success', 'kidsparties post updated successfully');
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
        $kidsparties = Kidsparty::find($id);

        //
        $kidsparties->delete();

        //
        return redirect()->route('kidsparties.index');
    }
}
