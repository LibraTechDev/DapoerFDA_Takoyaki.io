<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Product;

use App\Models\Cart;

use App\Models\Order;

use RealRashid\SweetAlert\Facades\Alert;

use Session;
use Stripe;

class HomeController extends Controller
{
    public function index()
    {
        $product=Product::paginate(3);
        return view('home.userpage', compact('product'));
    }
    
    public function about()
    {
        return view('home.about');
    }
    
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        
        if ($usertype == '1') {
            $total_product=product::all()->count();
            $total_order=order::all()->count();
            $total_customer=user::all()->count();
            $order=order::all();
            $total_revenue=0;
            foreach ($order as $order)
            {
                $total_revenue=$total_revenue+$order->prize;
            }
            $total_delivered=order::where('delivery_status','=','Delivered')->count();
            $total_processing=order::where('delivery_status','=','Processing')->count();
            return view('admin.home',compact('total_product', 'total_order', 'total_customer','total_revenue', 'total_processing', 'total_delivered', 'total_processing'));
        } else {
            $product = Product::paginate(10);
            return view('home.userpage', compact('product'));
        }
    }
    
    public function product_details($id)
    {
        $product=Product::find($id);
        return view('home.product_details', compact('product'));
    }
    
    public function add_cart(Request $request,$id)
    {
        if(Auth::id())
        {
            $user=Auth::user();
            $user_id=$user->id;
            $product=Product::find($id);
            $product_exist_id=Cart::where('product_id','=',$id)->where('user_id','=',$user_id)->get('id')->first();
            if($product_exist_id!=null)
            {
                $cart=Cart::find($product_exist_id)->first();
                $quantity=$cart->quantity;
                $cart->quantity=$quantity+$request->quantity;
                if($product->discount_prize!=null)
                {
                    $cart->prize=$product->discount_prize * $cart->quantity;
                }
                else
                {
                    $cart->prize=$product->prize * $cart->quantity;
                }
                $cart->save();
                Alert::success('Success', 'Produk Berhasil Ditambahkan Ke Cart');
                return redirect()->back();
            }
            else
            {
                $cart=new Cart;
                $cart->name=$user->name;
                $cart->email=$user->email;
                $cart->phone=$user->phone;
                $cart->user_id=$user->id;
                $cart->name=$user->name;

                $cart->product_title=$product->title;

                if($product->discount_prize!=null)
                {
                    $cart->prize=$product->discount_prize * $request->quantity;
                }
                else
                {
                    $cart->prize=$product->prize * $request->quantity;
                }

                $cart->image=$product->image;
                $cart->product_id=$product->id;
                $cart->quantity=$request->quantity;

                $cart->save();
                Alert::success('Success', 'Produk Berhasil Ditambahkan Ke Cart');
                return redirect()->back();
            }
            
        }
        else 
        {
            return redirect('login');
        }
        
        return view('home.add_cart', compact('product'));
    }

    public function add_voucher(Request $request, $id)
    {
        
        $cart = Cart::find($id);
        $voucher = $request->voucher;
        
        if ($voucher == "FDA123") {
            if ($cart->voucher == "Expired") {
                return redirect()->back()->with('pesan', 'Voucher Sudah Kadaluarsa :(');
            }
            $cart->prize = $cart->prize - $cart->prize * 0.1;
            $cart->voucher = "Expired";
            $cart->save();
            Alert::success('Success', 'Voucher Berhasil Ditambahkan');
            return redirect()->back();
            
        } else {
            Alert::warning('Info','Kode Tidak Valid');
            return redirect()->back();
        }
    }
    
    public function add_alamat(Request $request, $id)
    {
        $cart = Cart::find($id);
        $cart->address = $request->address;
        $cart->save();
        Alert::success('Success', 'Alamat Berhasil Ditambahkan');
        return redirect()->back();
    }

    public function add_email(Request $request )
    {
            if (auth()->check())
            {
                $user=Auth::user(); 
                if($user->subscribe != null)
                {
                    Alert::info('Info', 'Email Sudah Terdaftar Subscribe');
                    return redirect()->back();
                }
                $user->subscribe = $request->subscribe;
                $user->save();
                Alert::success('Success', 'Email Berhasil Ditambahkan');
                return redirect()->back();
            }
            else{
                return redirect('login');
            }

            
    }
    
    // public function add_testi()
    // {
    //     if(auth()->check())
    //     {
    //         $user=Auth::user(); 
    //         if($user->testi != null)
    //         {
    //             Alert::info('Info', 'Testimoni Sudah Terdaftar');
    //             return redirect()->back();
    //         }
    //         $user->testi = $request->testi;
    //         $user->save();
    //         Alert::success('Success', 'Testimoni Berhasil Ditambahkan');
    //         return redirect()->back();
    //     }
    //     else{
    //         return redirect('login');
    //     } 
    // }

    
    public function show_cart()
    {
       $id=Auth::user()->id;
       $cart=Cart::where('user_id','=',$id)->get();
        return view('home.show_cart', compact('cart'));
    }

    public function remove_cart($id)
    {
        $cart=Cart::find($id);
        $cart->delete();
        Alert::success('Success', 'Produk Telah Dihapus Dari Cart');
        return redirect()->back();
    }

    public function cash_order()
    {
        $user=Auth::user();   
        $user_id=$user->id;
        $cart=Cart::where('user_id','=',$user_id)->get();

        if ($cart->isEmpty()) {
            return redirect()->back()->with('pesan', 'Pesanan Gagal. Keranjang belanja kosong.');
        }

        foreach($cart as $cart)
        {
            $order = new Order;
            $order->name=$cart->name;
            $order->email=$cart->email;
            $order->phone=$cart->phone;
            $order->address=$cart->address;
            $order->user_id=$cart->user_id;
            $order->product_title=$cart->product_title;
            $order->prize=$cart->prize;
            $order->quantity=$cart->quantity;
            $order->image=$cart->image;
            $order->product_id=$cart->product_id;
            $order->address=$cart->address;
            $order->payment_status="Cash On Delivery";
            $order->delivery_status="Processing";
            $order->save();

            $cart_id=$cart->id;
            $items=cart::find($cart_id);
            $items->delete();        

        }
        Alert::success('Success', 'Produk Telah Dipesan');
        return redirect()->back();
    }

    public function stripe ($totalprize)
    {
        return view('home.stripe', compact('totalprize'));
        
    }
    
    public function stripePost(Request $request, $totalprize)
    {
        
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
            
                "amount" => $totalprize * 100 ,
                "currency" => "idr",
                "source" => $request->stripeToken,
                "description" => "Terima kasih atas pembayarannya." 
        ]);
      
        $user=Auth::user();   
        $user_id=$user->id;
        $cart=Cart::where('user_id','=',$user_id)->get();
        // return view('home.cash_order', compact('cart'));
        if ($cart->isEmpty()) {
            return redirect()->back()->with('pesan', 'Pesanan Gagal. Keranjang belanja kosong.');
        }
        foreach($cart as $cart)
        {
            $order = new Order;
            $order->name=$cart->name;
            $order->email=$cart->email;
            $order->phone=$cart->phone;
            $order->address=$cart->address;
            $order->user_id=$cart->user_id;
            $order->product_title=$cart->product_title;
            $order->prize=$cart->prize;
            $order->quantity=$cart->quantity;
            $order->image=$cart->image;
            $order->product_id=$cart->product_id;
            $order->payment_status="Paid";
            $order->delivery_status="Processing";

            $order->save();
            
            $cart_id=$cart->id;
            $items=cart::find($cart_id);
            $items->delete();        
            
        }
        Alert::success('Success', 'Produk Telah Dipesan');  
        return back();
    }
     
    public function show_order()
    {
        $user=Auth::user();   
        $user_id=$user->id;
        $order=Order::where('user_id','=',$user_id)->get();
        return view('home.show_order', compact('order'));
    }
    
    public function cancel_order($id)
    {
        $order=Order::find($id);
        $order->delivery_status="Canceled";
        $order->save();
        return redirect()->back()->with('message', 'Pesanan Berhasil Dibatalkan');
    }
}