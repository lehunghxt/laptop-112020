<?php

namespace App\Http\Controllers;

use App\Category;
use App\Config;
use App\Order;
use App\OrderDetail;
use App\Product;
use App\ProductConfig;
use App\User;
use App\UserInfo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;
use Symfony\Component\Process\Process;

class IndexController extends Controller
{
    public function index(){
        $categories = Category::with('indexProducts')->get();// lấy dữ liệu cho tab
        $products = Product::take(4)->orderBy('created_at', 'DESC')->get(); // lấy ra lap mới nhất
        $proEachCate = Category::with('indexProducts')->get(); // lấy ra lap mỗi cate khác với cate
        $productRecomment = Product::all()->random(6);
        $productRecomment = (object) array_chunk($productRecomment->toArray(), 3); // lấy ra lap khác với lap mới nhất
        return view('user.index')->with(compact('products', 'categories', 'productRecomment', 'proEachCate'));
    }
    public function productDetail($proSlug){
        $categories = Category::get();
        $product = Product::where('pro_slug', $proSlug)->first();
        if(empty($product)){
            abort(404);
        }
        $product_config = ProductConfig::join('config_details', 'product_configs.config_details_id', '=', 'config_details.id')
                                ->join('configs', 'configs.id', 'config_details.config_id')
                                ->where('pro_id',$product->id)
                                ->get();
        if(empty($product)){
            abort(404);
        }
        $productRecomment = Product::all()->where('id', '!=', $product->id)->random(6);
        $productRecomment = (object) array_chunk($productRecomment->toArray(), 3);
        $meta_title = $product->pro_name;
        return view('user.prodcut_detail')->with(compact('product', 'product_config', 'categories', 'productRecomment', 'meta_title'));
    }
    public function cateDetail($cateSlug){
        $categories = Category::get();
        $cateDetail = Category::where('cate_slug', $cateSlug)->first();
        if(empty($cateDetail)){
            abort(404);
        }
        $proInCate = $cateDetail->products()->paginate(9);
        $productRecomment = Product::all()->random(6);
        $productRecomment = (object) array_chunk($productRecomment->toArray(), 3);
        $meta_title = $cateDetail->cate_name;
        return view('user.cate_detail')->with(compact('cateDetail', 'categories', 'productRecomment', 'proInCate', 'meta_title'));
    }
    public function addCart(Request $request){
        if ($request->session()->has('cart')) {
            $oldCart = $request->session()->get('cart');
            $cartdata = $oldCart;
            $pro_code = $request->pro_code;
            if (array_key_exists ( $pro_code , $cartdata )) {
                $cartdata[$pro_code]['pro_qty'] += 1;
            } else {
                $cartdata[$pro_code]['pro_id'] = $request->pro_id;
                $cartdata[$pro_code]['pro_qty'] = 1;
            }
        } else {
            $cartdata[$request->pro_code]['pro_id']   = $request->pro_id;
            $cartdata[$request->pro_code]['pro_qty']   = 1;
        }
        session()->put('cart' , $cartdata);
        // return redirect()->back()->with('flash_message_success', 'Đã thêm sản phẩm vào giỏ hàng !');
        return "done";
    }

    public function getCart(){
        $carts = session()->get('cart');
        if(empty($carts)) return redirect('/')->with('flash_message_error', 'Chưa có sản phẩm nào giỏ hàng !');
        $products = Product::whereIn('pro_code', array_keys($carts))->get();
        return view('user.cart')->with(compact('products', 'carts'));
    }
    public function deleteItemCart(Request $request){
        $carts = session()->get('cart');
        if(array_key_exists($request->pro_code, $carts)){
            unset($carts[$request->pro_code]);
            session()->put('cart' , $carts);
            if(empty(session()->get('cart'))){
                return redirect('/')->with('flash_message_success', 'Không còn sản phẩm nào trong giỏ hàng !');
            }
            return redirect()->back()->with('flash_message_success', 'Đã xóa sản phẩm khỏi giỏ hàng !');
        }
        return redirect()->back()->with('flash_message_error', 'Đã có lỗi xãy ra !');
    }
    public function userInfo(){
        $user_infos = UserInfo::where('user_id', Auth::guard('customer')->user()->id)->get();
        $order_user = Order::with('orderDetail')->where('user_id', Auth::guard('customer')->user()->id)->get();
        return view('user.user_info.list_user_info')->with(compact('user_infos', 'order_user'));
    }
    public function formAddUserInfo(){
        return view('user.user_info.add_user_info');
    }
    public function addUserInfo(Request $request){
        $request->validate([
            'address' => 'required|min:4|max:255',
            'phone'   => 'required|min:10|max:11|regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/',
        ], [
            'address.required' => 'Vui lòng nhập địa chỉ của bạn !',
            'address.min'      => 'Địa chỉ không hợp lệ !',
            'address.max'      => 'Địa chỉ không hợp lệ !',
            'phone.required'   => 'Vui lòng nhập số điện của bạn !',
            'phone.min'        => 'Số điện thoại không hợp lệ !',
            'phone.max'        => 'Số điện thoại không hợp lệ !',
            'phone.regex'      => 'Số điện thoại không hợp lệ 1 !',
        ]);
        $user_info = new UserInfo;
        $user_info->user_id = Auth::guard('customer')->user()->id;
        $user_info->address = $request->address;
        $user_info->phone   = $request->phone;
        $user_info->save();
        return redirect('user-info')->with('flash_message_success', 'Đã thêm một địa chỉ !');
    }
    public function formEditUserInfo($id){
        $user_info = UserInfo::findOrFail($id);
        return view('user.user_info.edit_user_info')->with(compact('user_info'));
    }
    public function editUserInfo(Request $request, $id){
        $check = UserInfo::findOrFail($id);
        $request->validate([
            'address'    => 'required|unique:user_infos,address,'.$id,
            'phone'     => 'required|min:10|max:11|regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/|unique:user_infos,phone,'.$id,
        ], [
            'address.required' => 'Vui lòng nhập địa chỉ của bạn !',
            'address.unique'   => 'Địa chỉ này đã tồn tại !',
            'phone.required'   => 'Vui lòng nhập số điện của bạn !',
            'phone.min'        => 'Số điện thoại không hợp lệ !',
            'phone.max'        => 'Số điện thoại không hợp lệ !',
            'phone.regex'      => 'Số điện thoại không hợp lệ 1 !',
            'phone.unique'     => 'Số điện thoại này đã tồn tại !',
        ]);
        return redirect('user-info')->with('flash_message_success', 'Đã cập nhập địa chỉ !');
    }
    public function deleteUserInfo(Request $request){
        $check = UserInfo::findOrFail($request->id);
        $user_info = UserInfo::where(['id'=>$request->id, 'user_id' => Auth::guard('customer')->user()->id])->first();
        $countUserInfo = UserInfo::where(['user_id' => Auth::guard('customer')->user()->id])->count();
        if($countUserInfo == 1){
            return redirect('user-info')->with('flash_message_error', 'Tài khoản của bạn phải có ít nhất một địa chỉ để mua hàng !');
        }
        $user_info->delete();
        return redirect('user-info')->with('flash_message_success', 'Đã xóa một địa chỉ !');
    }
    public function formCheckout(){
        $carts = session()->get('cart');
        if(empty($carts)) return redirect()->back()->with('flash_message_error', 'Chưa có sản phẩm nào giỏ hàng !');
        $products = Product::whereIn('pro_code', array_keys($carts))->get();
        $user_infos = UserInfo::where('user_id', Auth::guard('customer')->user()->id)->get();
        return view('user.checkout')->with(compact('products', 'carts', 'user_infos'));
    }
    public function checkOut(Request $request){
        $request->validate([
            'user_info_id' => 'required|exists:user_infos,id',
            'order_note'   => 'required|max:255',
        ], [
            'user_info_id.required' => 'Vui lòng chọn một địa chỉ giao hàng !',
            'user_info_id.exists'   => 'Đã có lối xãy ra, vui lòng thử lại !',
            'order_note.required'   => 'Vui lòng ghi chú đơn hàng !',
            'order_note.max'        => 'Ghi chú quá dài !',
        ]);
        $carts = session()->get('cart');
        $products = Product::whereIn('pro_code', array_keys($carts))->get();
        $total = 0;
        foreach ($products as $pro) {
            $price = (array_key_exists($pro->pro_code, $carts))?$pro->pro_price*$carts[$pro->pro_code]['pro_qty']:0;
            $total += $price;
        }
        $order = new Order;
        $order->order_code   = generateRandomString(10);
        $order->user_id      = Auth::guard('customer')->user()->id;
        $order->user_info_id = $request->user_info_id;
        $order->order_note   = $request->order_note;
        $order->total_price  = $total;
        $order->order_status = 'new';
        $order->save();
        foreach ($products as $pro) {
            $arrData[] = [
                'name' => $pro->pro_name,
                'price' => $pro->pro_price,
                'qty' => (array_key_exists($pro->pro_code, $carts))?$carts[$pro->pro_code]['pro_qty']:0,
                'order_id' => $order->id,
                'created_at' => Carbon::now()
            ];
        }
        OrderDetail::insert($arrData);
        session()->forget('cart');
        return redirect('/')->with('flash_message_success', 'Mua hàng thành công, chúng tôi sẽ liên lạc cho bạn sớm nhất !');
    }
    public function search(Request $request){
        $request->validate([
            's'      => 'required|string',
        ], [
            's.required'  => 'Nhập sản tên sản phẩm cần tìm kiếm !',
            's.string'    => 'Không hợp lệ !',
        ]);
        $pro_name = $request->s;
        $countPro = Product::where('pro_name', 'LIKE', '%'.$pro_name.'%')->count();
        if($countPro == 0){
            return redirect('/')->with('flash_message_error', 'Sản phẩm bạn tìm không tồn tại !');
        }
        $products = Product::where('pro_name', 'LIKE', '%'.$pro_name.'%')->paginate(8);
        $proEachCate = Category::with('indexProducts')->get(); // lấy ra lap mỗi cate khác với cate
        $categories = Category::with('indexProducts')->get();
        $productRecomment = Product::all()->random(6);
        $productRecomment = (object) array_chunk($productRecomment->toArray(), 3); // lấy ra lap khác với lap mới nhất
        return view('user.search_result')->with(compact('proEachCate', 'productRecomment', 'categories', 'products', 'pro_name'));
    }
}
