<?php

namespace App\Http\Controllers;

use Stripe;

use Session;

use App\Models\Cart;

use App\Models\User;

use App\Models\Order;

use App\Models\Reply;

use App\Models\Comment;

use App\Models\Product;

use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{


    public function redirect()
    {
        $usertype = Auth::user()->usertype;

        if($usertype == '1')
        {

            $total_product = product::all()->count() ;

            $total_order = order::all()->count() ;

            $total_user = user::all()->count() ;

            $order = order::all();

            $total_revenue = 0;

            foreach($order as $orders)

            {
                $total_revenue = $total_revenue + $orders->price;
            }

            $total_delivered = order::where('delivery_status', '=', 'Delivered')->get()->count();

            $total_processing = order::where('delivery_status', '=', 'processing....')->get()->count();

            // endforeach

            // $total_product = product::all()->count() ;

            return view('admin.index', compact('total_product', 'total_order', 'total_user', 'total_revenue', 'total_delivered', 'total_processing'));
        }
        if($usertype == '2')
        {

            $total_product = product::all()->count();

            $total_order = order::all()->count() ;

            $total_user = user::all()->count() ;

            $order = order::all();

            $total_revenue = 0;

            foreach($order as $orders)

            {
                $total_revenue = $total_revenue + $orders->price;
            }

            $total_delivered = order::where('delivery_status', '=', 'Delivered')->get()->count();

            $total_processing = order::where('delivery_status', '=', 'processing....')->get()->count();

            // endforeach

            // $total_product = product::all()->count() ;

            return view('seller.index', compact('total_product', 'total_order', 'total_user', 'total_revenue', 'total_delivered', 'total_processing'));

        }
        else
        {
            // $product = product::paginate(6);
            $product = Product::orderBy('category')->inRandomOrder()->get()->take(12);

            $lproduct = Product::orderBy('created_at','DESC')->get()->take(6);

            $rproduct = Product::orderBy('title')->get()->take(12);

            $tproduct = Product::orderBy('price')->get()->take(12);

            $category = Category::all();

            $comment = comment::orderby('id', 'desc')->get();

            $reply = reply::all();

            return view('user.index',compact('product', 'comment', 'reply', 'lproduct', 'tproduct', 'rproduct', 'category'));

            // return view('user.index');
        }
    }



    public function index()
    {
        // $product = product::paginate(6);
        $product = Product::orderBy('slug')->inRandomOrder()->get()->take(12);

        $lproduct = Product::orderBy('created_at','DESC')->get()->take(12);

        $rproduct = Product::orderBy('title')->get()->take(12);

        $tproduct = Product::orderBy('price')->get()->take(12);

        $comment = comment::orderby('id', 'desc')->get();

        $reply = reply::all();

        $category = Category::all();


        return view('user.index',compact('product', 'comment', 'reply', 'lproduct', 'rproduct', 'tproduct', 'category'));
    }




    public function product_details($slug)
    {
        $product = product::find($slug);

        $lproduct = Product::orderBy('created_at','DESC')->get()->take(12);

        $rproduct = Product::orderBy('title')->get()->take(12);

        $tproduct = Product::orderBy('price')->get()->take(12);


        return view('user.product_details', compact('product', 'lproduct', 'tproduct', 'rproduct'));
    }

    public function shop()
    {
        return view('user.shop');
    }

    public function add_cart(Request $request, $id)
    {
        if(Auth::id())
        {
            $user = Auth::user();
            // dd($user);

            $product = Product::find($id);

            // $lproduct = Product::orderBy('created_at','DESC')->get()->take(6);

            $cart= new cart;

            $cart->name = $user->name;

            $cart->email = $user->email;

            $cart->phone = $user->phone;

            $cart->address = $user->address;

            $cart->user_id = $user->id;

            $cart->product_title = $product->title;

            if($product->discount_price != null)
            {

             $cart->price = $product->discount_price * $request->quantity;

            }
            else
            {
                $cart->price->$product->price * $request->quantity;
            }


            $cart->image = $product->image;

            $cart->product_id = $product->id;

            $cart->quantity = $request->quantity;

            $cart->save();

            return redirect()->back()->with('message', 'Check your cart, New product have been successfully added');


        }
        else
        {
            return redirect('login');
        }
    }

    public function show_cart()
    {
        if(Auth::id())
        {
            $id = Auth::user()->id;

            $cart= Cart::where('user_id','=',$id)->get();

            return view('user.show_cart', compact('cart'));
        }
        else
        {
            return redirect('login');
        }

    }

    public function remove_cart($id)
    {
        $cart=Cart::find($id);

        $cart->delete();


        return redirect()->back();
    }


    public function checkout()
    {
        $id = Auth::user()->id;

         $cart= Cart::where('user_id','=',$id)->get();

        return view('user.checkout', compact('cart'));
    }

    public function cash_order()
    {
        // the below code is use to get login detail from a particular user that login

         $user = Auth::user();

         // the below code is use to get user_id

         $userid = $user->id;

        //  dd($userid);

        // the below code is to check if the user data exist or not and if it exist, it will send it to the foreach loop

        $data= Cart::where('user_id', '=', $userid)->get();

        // We use foreach loop because we want to upload multiple Data
        foreach($data as $datas)
        {
            $order = new Order;
        // the first name after the order is coming from the order Table in database,

        // while the name after the data is coming from the cart page
            $order->name = $datas->name;

            $order->email = $datas->email;

            $order->phone = $datas->phone;

            $order->address = $datas->address;

            $order->user_id = $datas->user_id;

            $order->product_title = $datas->product_title;

            $order->price = $datas->price;

            $order->quantity = $datas->quantity;

            $order->image = $datas->image;

            $order->product_id = $datas->product_id;

            $order->payment_status = 'cash on delivery';

            $order->delivery_status = 'processing....';

            $order->save();

            // the three below lines of code is use to access
            // ID from cart and delete it after clicking on cash on delivery

            $cart_id = $datas->id;

            $cart = Cart::find($cart_id);

            $cart->delete();


        }

            return redirect()->back()->with('message','We have recieved your order, we will connect with you soon');
    }


    public function stripe($totalprice)
    {
        return view('user.stripe', compact('totalprice'));
    }



    public function stripePost(Request $request, $totalprice)
    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for payment."
        ]);

          // the below code is use to get login detail from a particular user that login

          $user = Auth::user();

          // the below code is use to get user_id

          $userid = $user->id;

         //  dd($userid);

         // the below code is to check if the user data exist or not and if it exist, it will send it to the foreach loop

         $data= Cart::where('user_id', '=', $userid)->get();

         // We use foreach loop because we want to upload multiple Data
         foreach($data as $datas)
         {
             $order = new Order;
         // the first name after the order is coming from the order Table in database,
         // while the name after the data is coming from the cart page
             $order->name = $datas->name;

             $order->email = $datas->email;

             $order->phone = $datas->phone;

             $order->address = $datas->address;

             $order->user_id = $datas->user_id;

             $order->product_title = $datas->product_title;

             $order->price = $datas->price;

             $order->quantity = $datas->quantity;

             $order->image = $datas->image;

             $order->product_id = $datas->product_id;

             $order->payment_status = 'Paid';

             $order->delivery_status = 'processing....';

             $order->save();

             // the three below lines of code is use to access
             // ID from cart and delete it after clicking on cash on delivery

             $cart_id = $datas->id;

             $cart = Cart::find($cart_id);

             $cart->delete();


         }

        Session::flash('success', 'Payment successful!');

        return back();
    }



    public function show_order()
    {
        // return view('show_order');

        if(Auth::id())
        {

            $user = Auth::user();

            $userid = $user->id;

            $order = order::where('user_id', '=', $userid)->get();

             return view('user.order', compact('order'));

        }
        else
        {
            return redirect('login');
        }


    }



    public function cancel_order($id)
    {
        $order = order::find($id);

        $order->delivery_status = "You cancel this order";

        $order->save();

        return redirect()->back();
    }


    public function add_comment(Request $request)
    {
        if(Auth::id())
        {
            $comment = new Comment;

            $comment->name = Auth::user()->name;

            $comment->user_id = Auth::user()->id;

            $comment->comment = $request->comment;

            $comment->save();

            return redirect()->back();
        }
        else
        {
            return redirect('login');
        }
    }



    public function add_reply(Request $request)
    {
        if(Auth::id())

        {
            $reply = new reply;

            $reply->name = Auth::user()->name;

            $reply->user_id = Auth::user()->id;

            $reply->comment_id = $request->commentId;

            $reply->reply = $request->reply;

            $reply->save();

            return redirect()->back();
        }
        else
        {
            return redirect('login');
        }

    }


    public function product_search(Request $request)
    {
        $search_text = $request->search;

        $product = product::where('title', 'LIKE', "%$search_text%")->orWhere('category', 'LIKE', "$search_text")->get()->take(12);

        $lproduct = product::where('title', 'LIKE', "%$search_text%")->orWhere('category', 'LIKE', "$search_text")->get()->take(12);

        $rproduct = product::where('title', 'LIKE', "%$search_text%")->orWhere('category', 'LIKE', "$search_text")->get()->take(12);

        $tproduct = product::where('title', 'LIKE', "%$search_text%")->orWhere('category', 'LIKE', "$search_text")->get()->take(12);

        $comment = comment::orderby('id', 'desc')->get();

        $category = product::where('category_name', 'LIKE', "%$search_text%");

        $reply = reply::all();

        return view('user.index', compact('product', 'comment', 'reply', 'lproduct', 'tproduct', 'rproduct', 'category'));
    }
}
