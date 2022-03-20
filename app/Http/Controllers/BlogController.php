<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Screenshot;
use App\Models\Post;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Kidsparty;
use Storage;
use Session;

class BlogController extends Controller
{
    public function index()
    {
    	// Fetch slug data from database
    	$post = Post::find(1);

    	$json = Storage::disk('local')->get('mix-manifest.json');
        $json = json_decode($json, true);

    	// Return view with post object
    	return view('blog.single')->withPost($post)->withMix($json);
    }

    public function getShop($value='{slug}')
    {
        // Fetch slug data from database
        return "Yes, it's working!";
                // $products = Product::orderBy('updated_at', 'desc')->paginate(10);
    }

    public function getSingle($value='{slug}')
    {
        // Fetch slug data from database
        $post = Post::where('slug', '=', $value)->first();

        // Return view with post object
        if(!empty($post->slug)) {
            if($post->slug != 'the-ski-deck-in-ferndale') {
                $products = Product::orderBy('updated_at', 'desc')->paginate(10);

            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);

                if ($post->slug != 'shoppingcart') {
                return view('blog.single')->withPost($post)->withProducts($products);
                // } elseif ($post->slug == 'catalog') {
                // return view('blog.catalog')->withPost($post)->withProducts($products);
                } elseif ($post->slug == 'shoppingcart' || $post->slug == 'checkout') {
                return view('blog.single', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice])->with('post', $post);
                }

            } elseif($post->slug == 'the-ski-deck-in-ferndale') {

                return view('blog.home_landing')->withPost($post);

            } elseif($post->slug == 'catalog') {

                // $post1 = Post::all();
                // $products = Product::orderBy('updated_at', 'desc')->paginate(10);
                return "Working!";

            }

        }
        else {
            return view('blog.home_landing')->withPost($post);
        }
    }

    public function kidsparties()
    {
        // Fetch slug data from database
        return "Kids Parties!";
        $post = Post::find(3);
        dd($post);

        // Return view with post object
        return view('blog.parties')->withPost($post);
    }

    public function getTerms($value='{slug}')
    {
        // Fetch slug data from database
        $posts = Post::all();

        // Return view with post object
            return view('blog.terms')->withPosts($posts);
    }

    public function getKidsparties($value='{slug}')
    {
        // Fetch slug data from database
        $post = Post::where('slug', '=', $value)->first();

        // Return view with post object
        /*if($post->slug != 'the-ski-deck-in-ferndale') {*/
            return view('blog.parties')->withPost($post);
       /* }
        else {
            return view('blog.home_landing')->withPost($post);
        }*/
    }

    public function kids()
    {
        // Fetch slug data from database
        $kidsparties = Kidsparty::find(1);

        // Return view with post object
        return view('blog.parties')->withKidsparty($kidsparties);
    }

    public function getParties($value='{slug}')
    {
        // Fetch slug data from database
        $kidsparties = Kidsparty::where('slug', '=', $value)->first();

        // Return view with post object
        /*if($post->slug != 'the-ski-deck-in-ferndale') {*/
            return view('blog.parties')->withKidsparty($kidsparties);
       /* }
        else {
            return view('blog.home_landing')->withPost($post);
        }*/
    }

    public function getImage($value='{image_slug}')
    {
        // Fetch slug data from database
        $screenshot = Screenshot::where('image_slug', '=', $value)->first();

        // Return view with post object
        return view('blog.image')->withScreenshot($screenshot);
    }
}
