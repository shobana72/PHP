<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use DB;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Foods;
use App\Models\foodchef;
use App\Models\cart;
use Illuminate\Routing\Controller as BaseController;
use Auth;
class HomeController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function web_index(){
        $data=foods::all();

        $data2=foodchef::all();

        return view('web.web-index',compact("data","data2"));
    }

 public function redirects() {
    // Fetch all foods and chefs
    $data = Foods::all();
    $data2 = foodchef::all();

    // Initialize count to 0
    $count = 0;

    // Check if the user is authenticated
    if (Auth::check()) {
        // Get the user ID and cart count for authenticated users
        $user_id = Auth::id();
        $count = Cart::where('user_id', $user_id)->count();
    }

    // Pass the data and cart count to the appropriate view
    if (Auth::user()->usertype == '1') {
        return view('index', compact('data', 'data2', 'count'));
    } else {
        return view('web.web-index', compact('data', 'data2', 'count'));
    }
}


    public function sigin(){
        return view('web.sigin');
    }

    public function store(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
            'message' => 'required|min:5'
        ]);

        return back()->with('success', 'from submitted successfully');
    }


    public function foods(){
        return view('web.foods');
    }

    public function foodchef(){
        return view('foodchef');
    }

    public function addcart(Request $request, $id){
        if(Auth::id()){

            $user_id=Auth::id();

            $food_id=$id;

            $quantity=$request->quantity;

            $cart=new cart;

            $cart->user_id=$user_id;
            $cart->food_id=$food_id;
            $cart->quantity=$quantity;
            $cart->save();


            return redirect()->back();
        }
        else{
            return redirect('/login');
        }
    }

    public function showcart(){
        return view('web.showcart');
    }

   
}