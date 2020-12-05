<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard(){
        $customer = User::count();
        $orderPrice = (Order::count()==0) ? 0 : Order::sum('total_price');
        $order = Order::count();
        $product = Product::count();
        $newOrder = Order::where('order_status', 'new')->count();
        return view('admin.dashboard')->with(compact('customer', 'order', 'product', 'newOrder', 'orderPrice'));
    }

    public function listCustomer(){
        $users = User::withCount('carts')->orderby('id', 'desc')->paginate(12);
        return view('admin.customers.list_customer')->with(compact('users'));
    }
    public function changeStatus(Request $request, $id){
        $user = User::where('id', $id)->first();
        $status = ($user->status=='disable') ? 'active':'disable';
        User::where('id', $id)->update(['status'=> $status]);
        return redirect()->back()->with('flash_message_success', 'Đã thay đổi trạng thái - '.$user->name.' !');
    }
    public function listOrder(){
        $orders = Order::withCount('customer', 'orderDetail')->where('order_status', 'new')->get();
        return view('admin.orders.list_orders')->with(compact('orders'));
    }
    public function orderDetail($id){
        $order = Order::with('customer')->findOrFail($id);
        $order_detail = OrderDetail::where('order_id', $id)->get();
        return view('admin.orders.order_detail')->with(compact('order', 'order_detail'));
    }
    public function doneOrder(Request $request){
        $order = Order::findOrFail($request->order_id);
        Order::where('id', $request->order_id)->update(['order_status'=> 'done']);
        return redirect('admin/orders')->with('flash_message_success', 'Đã cập nhập trạng thái đơn hàng !');
    }

    public function listDelivered(){
        $orders = Order::withCount('customer', 'orderDetail')->where('order_status', 'done')->get();
        return view('admin.orders.list_orders')->with(compact('orders'));
    }

    public function adminLogout(Request $request){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}
