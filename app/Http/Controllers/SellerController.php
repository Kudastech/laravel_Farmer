<?php

namespace App\Http\Controllers;

use PDF;

use App\Models\Order;

use App\Models\Product;

use App\Models\Category;

use Illuminate\Http\Request;

// use Barryvdh\DomPDF\PDF as DomPDFPDF;

// use Notification;

// use App\Notifications\SendEmailNotification;

use Illuminate\Support\Str;

class SellerController extends Controller
{


    public function index()
    {

        return view('seller.index');

    }


    // public function view_category()
    // {
    //     return view('admin.category');
    // }

    // this function allow to show all category in the admin page

    // public function show_category()
    // {
    //     return view('seller.category');
    // }

    //This function in this admincontroller is use to add new category

    // public function add_category(Request $request)
    // {
    //     $data = new category;

    //     $data->category_name = $request->category;

    //     $data->slug = Str::slug($request->slug);

    //     $data->save();

    //     return redirect()->back()->with('message', 'Category Added Successfully');
    // }


    // public function edit_category($id)
    // {
    //     $category = Category::find($id);

    //     return view('admin.edit_category', compact('category'));
    // }

    // public function edit_category_confirm(Request $request, $id)
    // {
    //     $category = category::find($id);

    //     $category->category_name = $request->category;

    //     $category->slug = Str::slug($request->slug);

    //     $category->save();

    //     return redirect()->back()->with('message', 'Category Updated Successfully');
    // }

    //This function in this admincontroller is use to view all category

    // public function all_category()
    // {
    //     $data = category::all();

    //     return view('admin.view_category', compact('data'));
    // }

    //This function in this admincontroller is use to view all category

    // public function delete_category($id)
    // {
    //     $data = Category::find($id);

    //     $data->delete();

    //     return redirect()->back()->with('message','Category Delete Successfully');


    // }

        public function view_product()

    {

        $category =category::all();

        return view('seller.product', compact('category'));

    }

    public function add_product(Request $request)
    {
        $product = new product;

        $product->title = $request->title;

        $product->slug = Str::slug($request->slug);

        $product->description = $request->description;

        $product->price = $request->price;

        $product->quantity = $request->quantity;

        $product->discount_price = $request->dis_price;

        $product->category = $request->category;

        $image= $request->image;

        $imagename = time().'.'.$image->getClientOriginalExtension();

        $request->image->move('product', $imagename);

        $product->image = $imagename;

        $product->save();

        return redirect()->back()->with('message','Product Added Successfully');
    }

    public function show_product()
    {
        $product = Product::all();

        return view('seller.show_product', compact('product'));

    }


    public function delete_product($id)
    {
        $product = Product::find($id);

        $product->delete();

        return redirect()->back()->with('message', 'Product Deleted Successfully');
    }


    public function update_product($id)

    {
        $product = Product::find($id);

        $category = Category::all();

        return view('seller.update_product', compact('product','category'));
    }

    public function update_product_confirm(Request $request, $id)
    {
        $product = Product::find($id);

        $product->title = $request->title;

        $product->slug = Str::slug($request->slug);

        $product->description = $request->description;

        $product->price = $request->price;

        $product->quantity = $request->quantity;

        $product->discount_price = $request->dis_price;

        $product->category = $request->category;

        $image = $request->image;

        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('product', $imagename);

            $product->image = $imagename;

        }

        $product->save();

        return redirect()->back()->with('message', 'Product Updated Successfully');
    }


    // public function order()
    // {

    //     $order = Order::all();

    //     return view('admin.order', compact('order'));
    // }

    // public function delivered($id)
    // {
    //     $order = order::find($id);

    //     $order->payment_status = "Paid";

    //     $order->delivery_status = "Delivered";

    //     $order->save();

    //     return redirect()->back();
    // }

    // public function print_pdf($id)
    // {
    //     $order = order::find($id);

    //     $pdf = PDF::loadview('admin.pdf', compact('order'));

    //     return $pdf->download('Order_details.pdf');
    // }

    // public function send_email($id)
    // {
    //     $order = order::find($id);
    //     return view('admin.email_info', compact('order'));
    // }

    // public function send_user_email(Request $request, $id)
    // {
    //     $order = order::find($id);

    //     $details = [
    //                 'greeting'=> $request->greeting,

    //                 'firstline'=> $request->firstline,

    //                 'body'=> $request->body,

    //                 'button'=> $request->button,

    //                 'url'=> $request->url,

    //                 'lastline'=> $request->lastline,



    //     ];

    //     Notification::send($order, new SendEmailNotification($details) );

    //     return redirect()->back();
    // }

    // public function searchdata(Request $request)
    // {
    //     $searchText = $request->search;

    //     $order = order::where('name', 'LIKE', "%$searchText%")->orwhere('phone', 'LIKE', "%$searchText%")->orwhere('product_title', 'LIKE', "%$searchText%")->get();

    //     return view('admin.order', compact('order'));
    // }
 }
