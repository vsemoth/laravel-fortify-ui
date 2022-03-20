<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Screenshot;
use App\Models\Category;
use Session;

class ScreenshotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $screenshots = Screenshot::orderBy('created_at', 'desc')->paginate(10);

        // Fetch Categories DB object
        $categories = Category::all();
        
        return view('manage.screenshots.index')->with('screenshots', $screenshots)->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Fetch Categories DB object
        $categories = Category::all();

        // Return Create Page Categories
        return view('manage.screenshots.create')->with('categories', $categories);
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
        /*$this->validate($request, [
            'cover_image' => 'Required|image'
        ]);*/

        // Handle file upload
        if ($request->hasFile('cover_image')) {
            # Get the filename with extension
            $filenameWithExt = $request->file('cover_image')->GetClientOriginalName();

            # Get FileName Only
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            # Get Extension Only
            $extension = $request->file('cover_image')->GetClientOriginalExtension();

            # Filename to Store
            $fileNameToStore = time() . '.jpg';// . $extension;

            # Upload the Image
            move_uploaded_file($request->file('cover_image'), 'storage/images/screenshots/' . $fileNameToStore);

        } else {
            # Set default file
            $fileNameToStore = 'noimage.jpg';
        }
        //dd($fileNameToStore);

        // Create new screenshot instance
        $screenshot = new Screenshot;

        $screenshot->cover_image = $fileNameToStore;

        $str = $screenshot->cover_image;

        $sep='-';
        
        $res = strtolower($str);
        $res = preg_replace('/[^[:alnum:]]/', ' ', $res);
        $res = preg_replace('/[[:space:]]+/', $sep, $res);
        $slug = trim($res, $sep);

        $screenshot->image_slug = $slug;

        $screenshot->category_id = $request->input('category_id');

        $screenshot->save();

        Session::flash('success', 'screenshot created successfully');

        return redirect()->route('screenshots.index')->with('success', 'screenshot created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $screenshot = Screenshot::find($id);
        // Return Show Page
        return view('manage.screenshots.show')->with('screenshot', $screenshot);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    // Fetch screenshot data from DB
        $screenshot = Screenshot::find($id);

        // Fetch Categories DB object
        $categories = Category::all();
        
        $screenshots = Screenshot::all();

    // Return edit view with data
        return view('manage.screenshots.edit')->with('categories', $categories)->with('screenshot', $screenshot)->with('screenshots', $screenshots);
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
            'cover_image' => 'Required|image',
            'category_id' => 'Required'
        ]);

        // Find screenshot in DB by ID
        $screenshot = Screenshot::find($id);

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
            $path = $request->file('cover_image')->storeAs('public/images/screenshots', $fileNameToStore);

                # Replace Feature Image
                $screenshot->cover_image = $fileNameToStore;

            $str = $screenshot->cover_image;

            $sep='-';
            
            $res = strtolower($str);
            $res = preg_replace('/[^[:alnum:]]/', ' ', $res);
            $res = preg_replace('/[[:space:]]+/', $sep, $res);
            $slug = trim($res, $sep);

            $screenshot->image_slug = $slug;

            $screenshot->category_id = $request->input('category_id');

            $screenshot->save();
        }

        return redirect()->route('screenshots.index')->with('success', 'screenshot updated successfully');
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
        $screenshot = Screenshot::find($id);

        //
        $screenshot->delete();

        //
        return redirect()->route('screenshots.index');
    }
}
