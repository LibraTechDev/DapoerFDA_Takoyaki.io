<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;
use Notification;
use App\Notifications\SendEmailNotification;

class AdminController extends Controller
{
    public function category()
    {
        if (auth::id()) {
            $data=category::all();
            return view('admin.category', compact('data'));
           
        } 
        else{
            return redirect('login');
        }
        
    }
    
    public function add_category(Request $request)
    {
        $data= new category;
        $data-> category_name=$request->category;
        $data->save();
        Alert::success('Success', 'Category added successfully');
        return redirect()->back();
        
    }

    public function delete_category($id)
    {
        $data=category::find($id);
        $data->delete();
        Alert::success('Success', 'Category deleted successfully');
        return redirect()->back();
    }
    
    public function view_product()
    {
        if (auth::id()) {
            $category=category::all();
            return view('admin.product', compact('category')); 
        } 
        else {
            return redirect('login');
        }
        
    }

    public function add_product (Request $request)
    {
        $data= new product;
        $data-> title=$request->title;
        $data-> description=$request->description;
        $data-> category=$request->category;
        $data-> quantity=$request->quantity;
        $data-> prize=$request->prize;
        $data-> discount_prize=$request->discount_prize;
        
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product', $imagename);
        $data-> image=$imagename;
        
        $data->save();
        Alert::success('Success', 'Product added successfully');
        return redirect()->back();
    }
    
    public function show_product()
    {
        if (auth::id()){
            $data=product::all();   
            return view('admin.show_product', compact('data'));
        }
        else{
            return redirect('login');
        }
    }
    public function update_product($id)
    {
        $data=product::find($id);
        $category=category::all();
        return view('admin.update_product', compact('data','category'));
        
    }
    public function delete_product($id)
    {
        $data=product::find($id);
        $data->delete();
        Alert::success('Success', 'Product deleted successfully');
        return redirect()->back();
    }
    public function update_product_2(Request $request,$id)
    {
        $data=product::find($id);
        $data-> title=$request->title;
        $data-> description=$request->description;
        $data-> category=$request->category;
        $data-> quantity=$request->quantity;
        $data-> prize=$request->prize;
        $data-> discount_prize=$request->discount_prize;
        
        $image=$request->image;
        if($image)
        {
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product', $imagename);
        $data-> image=$imagename;
        }
        
        
        $data->save();
        return redirect()->back()->with('message', 'Product updated successfully');
    }


    public function view_user()
    {
        if (auth::id()) {
            $user=User::all();
            return view('admin.user', compact('user')); 
        } 
        else {
            return redirect('login');
        }
        
    }

    public function add_user (Request $request)
    {
        $data= new User;
        $data-> name=$request->nama;
        $data-> email=$request->email;
        $data-> phone=$request->phone;
        $data-> password=bcrypt($request->password);
        $data-> role=$request->role;
        if($request->role=='admin')
        {
            $data -> usertype = $request-> usertype = 1;
        }
        else
        {
            $data -> usertype = $request-> usertype = 0;
        }
       
        $data->save();
        Alert::success('Success', 'User added successfully');
        return redirect()->back();
    }
    
    public function show_user()
    {
       if (auth::id()){
            $user=User::all();   
            return view('admin.show_user', compact('user'));
        }
        else{
            return redirect('login');
        }
    }
    public function update_user($id)
    {
        $data=User::find($id);
        return view('admin.update_user', compact('data'));
        
    }
    public function delete_user($id)
    {
        $data=User::find($id);
        $data->delete();
        Alert::success('Success', 'User deleted successfully');
        return redirect()->back();
    }
    public function update_user_2(Request $request,$id)
    {
        $data=User::find($id);
        $data-> name=$request->nama;
        $data-> email=$request->email;
        $data-> phone=$request->phone;
        $data-> role=$request->role;
        if($request->role=='admin')
        {
            $data -> usertype = $request-> usertype = 1;
        }
        else
        {
            $data -> usertype = $request-> usertype = 0;
        }
        
        $image=$request->image;
        if($image)
        {
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('pp_user', $imagename);
        $data-> profile_photo_path=$imagename;
        }
        
        
        $data->save();
        Alert::success('Success', 'User Updated successfully');
        return redirect()->back();
    }

    public function search_user(Request $request)
    {
        $search_text = $request->search_user;
        $user = user::where('name', 'LIKE', "%$search_text%")->orWhere('phone', 'LIKE', "%$search_text%")->orWhere('email', 'LIKE', "%$search_text%")->GET();
        return view('admin.show_user', compact('user'));
    }

    public function order()
    {
        if (auth::id()) {
            $order = Order::all();
            return view('admin.order', compact('order'));
        } 
        else {
            return redirect('login');
        }
    }

    public function delivered($id)
    {
        $order = Order::find($id);
        $order->delivery_status = 'Delivered';
        $order->payment_status = 'Paid';
        $order->save();
        return redirect()->back()->with('message', 'Order delivered successfully');
    }

    public function print_pdf($id)
    {
        $order = Order::find($id);
        $pdf = PDF::loadview('admin.pdf', compact('order'));
        return $pdf->download('laporan-pembelian.pdf');
    }

    public function send_email($id)
    {
        $order = Order::find($id);
        
        return view('admin.email_info', compact('order'));
    }
    
    public function send_user_email(Request $request, $id)
    {
        $order = Order::find($id);
        $details = [
          'greeting'=>$request->greeting, 
          'firstline'=>$request->firstline, 
          'body'=>$request->body, 
          'button'=>$request->button, 
          'url'=>$request->url, 
          'lastline'=>$request->lastline, 
            
        ];

        Notification::send($order,new SendEmailNotification($details));
        return redirect()->back()->with('message', 'Email delivered successfully');
    }

    public function search_order(Request $request)
    {
        $search_text = $request->search_order;
        $order = order::where('name', 'LIKE', "%$search_text%")->orWhere('phone', 'LIKE', "%$search_text%")->orWhere('product_title', 'LIKE', "%$search_text%")->GET();
        return view('admin.order', compact('order'));
    }
}