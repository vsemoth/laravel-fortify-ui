<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id','desc')->paginate(10);
        // Return user index
        return view('manage.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return Create View
        return view('manage.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate Store Request
        $this->validate($request, [
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'user_name' => 'required|max:255',
            'email' => 'required|email|unique:users'
        ]);

        if (Request::has('password') && !empty($request->password)) {
            # Set manual password
            $password = trim($request->password);
        } else {
            # Generate random password
            $length = 10;
            $keyspace = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
            $str = '';
            $max = mb_strlen($keyspace, '8bit') - 1;
            for ($i=0; $i < $length; $i++) { 
                $str .= $keyspace[random_int(0, $max)];
            }
            return $str;
        }
        

        $user = new User;

        $user->name = $request->input('name');

        $user->name = $request->input('last_name');

        $user->name = $request->input('user_name');

        $user->name = $request->input('email');

        $user->password = Hash::make($password);

        
        if ($user->save()) {
            # Redirect
            return redirect()->route('users.show',$user->id);
        } else {
            Session::flash('error', 'A problem occurred while creating this user');
            return redirect()->route('users.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get user data from database
        $user = User::findOrFail($id);

        // Get Order Data from DB
        $orders = Auth::user()->orders;
        $orders->transform(function ($order, $key)
        {
            $order->cart = unserialize($order->cart);
            return $order;
        });

        // Return view with data
        return view('manage.users.show', ['orders' => $orders])->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Get user data from database
        $user = User::findOrFail($id);

        // Return view with data
        return view('manage.users.edit')->with('user', $user);
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
        // Validate Store Request
        // dd($request);
        if (!$request->assign) {
            $this->validate($request, [
                'name' => 'required|max:255',
                'email' => 'required|email|unique:users,email,'.$id
            ]);
            $user = User::findOrFail($id);

            $user->name = $request->input('name');

            $user->email = $request->input('email');

            if ($request->password && !empty($request->password)) {
                # Set manual password
                $password = trim($request->password);
            } else {
                # Generate random password
                $length = 10;
                $keyspace = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
                $str = '';
                $max = mb_strlen($keyspace, '8bit') - 1;
                for ($i=0; $i < $length; $i++) { 
                    $str .= $keyspace[random_int(0, $max)];
                }
                $password = $str;
            }

            $user->password = bcrypt($password);

            $user->save();
            
            return redirect()->route('users.show',$user->id);
        } else {

            $user = User::findOrFail($id);

            $user->admin = $request->assign;

            $user->save();
            
            return back();

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
    }
}
