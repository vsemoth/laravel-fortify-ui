<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Session;

class ProductimageController extends Controller
{
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
            'product_image' => 'Required|image',
            /*'category_id' => 'Required'*/
        ]);

        // Find screenshot in DB by ID
        $product_image = Product::find($id);

        // Handle file upload
        if ($request->hasFile('product_image')) {
            # Get the filename with extension
            $filenameWithExt = $request->file('product_image')->GetClientOriginalName();

            # Get FileName Only
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            # Get Extension Only
            $extension = $request->file('product_image')->GetClientOriginalExtension();

            # Filename to Store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            # Upload the Image
            $path = $request->file('product_image')->storeAs(public_path('/img/product_images'), $fileNameToStore);

            # Replace Feature Image
            $product_image->product_image = $fileNameToStore;

            /*
                $str = $product_image->product_image;
                    $sep='-';
                        $res = strtolower($str);
                            $res = preg_replace('/[^[:alnum:]]/', ' ', $res);
                            $res = preg_replace('/[[:space:]]+/', $sep, $res);
                        $slug = trim($res, $sep);
                    $product_image->image_slug = $slug;
                $product_image->category_id = $request->input('category_id');
            */
            
            $product_image->save();
        }
        
        return back()->with('success', 'Product image updated successfully');
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
        $product = Product::find($id);

        //
        $product->delete();

        //
        return redirect()->route('products.index');
    }
}
