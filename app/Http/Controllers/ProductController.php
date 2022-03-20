<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Mail\OrderPlaced;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('updated_at', 'desc')->get();
        return view('manage.products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return Create Page
        return view('manage.products.create');
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
            'item' => 'required',
            'brand' => 'required',
            'style' => 'required',
            'color' => 'required',
            'size' => 'required',
            'price' => 'required',
            'product_image' => 'required|image'
        ]);

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
            move_uploaded_file($request->file('product_image'), 'img/product_images/' . $fileNameToStore);

        } else {
            # Set default file
            $fileNameToStore = 'noimage.jpg';
        }

        // Create new Post instance
        $product = new Product;

        $product->item = $request->input('item');

        $product->brand = $request->input('brand');

        $product->style = $request->input('style');

        $product->color = $request->input('color');

        $product->size = $request->input('size');

        $product->price = $request->input('price');

        /*$str = $product->post_title;

        $sep='-';
        
        $res = strtolower($str);
        $res = preg_replace('/[^[:alnum:]]/', ' ', $res);
        $res = preg_replace('/[[:space:]]+/', $sep, $res);
        $slug = trim($res, $sep);

        $product->slug = $slug;*/

        //$post->page_id = $request->page_id;

        $product->product_image = $fileNameToStore;

        $product->save();

        Session::flash('success', 'Product created successfully');

        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        // Return Show Page
        return view('manage.products.show')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getAddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        // dd($request->session()->get('cart'));
        return back();
    }

    /**
     * get shopping cart specified in the resource directory.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getCart()
    {
        if (!Session::has('cart')) {
            return view('products.shoppingcart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return redirect()->route('products.shoppingcart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    /**
     * get checkout Route to initiate sale.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getCheckout()
    {
        if (!Session::has('cart')) {
            return redirect()->route('products.shoppingcart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
    # Generate random password
    $length = 10;
    $keyspace = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
    $str = '';
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i=0; $i < $length; $i++) { 
        $str .= $keyspace[random_int(0, $max)];
    }
        return view('manage.products.checkout', ['total' => $total, 'str' => $str]);
    }

    /**
     * get checkout Route to initiate sale.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postCheckout(Request $request)
    {
      if (!Session::has('cart')) {
            return redirect()->route('products.shoppingcart');
        }
        
        // Validate user input data
        $this->validate($request, [
            'name' => 'required|string',
            'last_name' => 'required|string',
            'addressline1' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip' => 'required|integer',
            'country' => 'required|string',
            'phone' => 'required|integer',
            'order_totalPrice' => 'required|integer'
        ]);

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        try {
            $order = new Order();
            $order->cart = serialize($cart);
            $order->name = $request->input('name');
            $order->last_name = $request->input('last_name');
            $order->billing_email = Auth::user()->email;
            $order->addressline1 = $request->input('addressline1');
            $order->addressline2 = $request->input('addressline2');
            $order->city = $request->input('city');
            $order->state = $request->input('state');
            $order->zip = $request->input('zip');
            $order->country = $request->input('country');
            $order->phone = $request->input('phone');
            $order->order_id = $request->input('order_id');
            $order->order_totalPrice = $request->input('order_totalPrice');

            Auth::user()->orders()->save($order);
                
            //return $order;

            Mail::send(new OrderPlaced($order));

            // Delete Cart from session
            $request->session()->put('cart', $cart);

            $request->session()->remove('cart', $cart);

            // Redirect to mail view
            // return redirect()->to('mailable');

        } catch (Exception $e) {

            return $e->message;
            
        }
/*  
        // dd($request);

        Auth::user()->detail->create($request->all());
        Details::create($request->all());
*/
        $request->session()->put('cart', $cart);
        //$request->session()->delete($cart);
        $request->session()->remove('cart', $cart);
        // $request->session()->forget($cart);
        return redirect()->route('blog.catalogue')->with('success', 'Successfully ordered products');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    // Fetch product data from DB
        $product = Product::find($id);
        $products = Product::all();
        // $pages = Page::all();
    // Check correct user authentication
    /*if (Auth::user()->id != $post->user_id) {
        # Redirect user to Post Index route
        return redirect('/posts')->with('error', 'Unauthorized Access!');
    }*/

    // Return edit view with data
        return view('manage.products.edit')->with('product', $product)->with('products', $products);
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
        // dd($request->product_image);
            $this->validate($request, [
            'item' => 'required|string',
            'brand' => 'required|string',
            'style' => 'required|string',
            'color' => 'required|string',
            'product_image' => 'image',
            // 'size' => 'required',
            'price' => 'required'
        ]);

        // Find Product in DB by ID
        $product = Product::find($id);

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
            /*if(move_uploaded_file($request->file('product_image'), 'img/product_images/' . $fileNameToStore)) {
                $product->product_image = $fileNameToStore;
            }*/

            # Upload the Image
            # $path = $request->file('product_images')->storeAs('images/product_images', $fileNameToStore);

            # Upload the Image
            move_uploaded_file($request->file('product_image'), 'img/product_images/' . $fileNameToStore);
            
            # Replace Feature Image
            $product->product_image = $fileNameToStore;

        $product->item = $request->input('item');

        $product->brand = $request->input('brand');

        $product->style = $request->input('style');

        $product->color = $request->input('color');
        
        if($request->input('size')){
            $product->size = $request->input('size');
        }

        $product->price = $request->input('price');

        /*$str = $product->post_title;

        $sep='-';
        
        $res = strtolower($str);
        $res = preg_replace('/[^[:alnum:]]/', ' ', $res);
        $res = preg_replace('/[[:space:]]+/', $sep, $res);
        $slug = trim($res, $sep);
        
        $product->slug = $slug;*/

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
        } else {

        $product->item = $request->input('item');

        $product->brand = $request->input('brand');

        $product->style = $request->input('style');

        $product->color = $request->input('color');
        
        if($request->input('size')){
            $product->size = $request->input('size');
        }

        $product->price = $request->input('price');

        /*$str = $product->post_title;

        $sep='-';
        
        $res = strtolower($str);
        $res = preg_replace('/[^[:alnum:]]/', ' ', $res);
        $res = preg_replace('/[[:space:]]+/', $sep, $res);
        $slug = trim($res, $sep);
        
        $product->slug = $slug;*/

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
        }
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
