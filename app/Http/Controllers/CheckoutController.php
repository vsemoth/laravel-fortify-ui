<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use Session;

class CheckoutController extends Controller
{
    /**
     * Auth Construct
     */	
	function __construct()
	{
		# Apply Auth Guard to Checkout Route
		$this->middleware('auth');
	}

    /**
     * Checkout Route with Params
     */
	public function step1()
	{
		# CHeck if Session Facade contains Model
        if (Auth::check()) {
        	# Redirect authenticated user to shipping address page
        	return redirect()->route('checkout.shipping');
        }

        return redirect()->route('register');
	}

	public function shipping()
	{
		return view('manage.products.shippinginfo');
	}
}
