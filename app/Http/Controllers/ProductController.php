<?php

namespace App\Http\Controllers;

use App\Category;
use App\Config;
use App\Product;
use App\ProductConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class ProductController extends Controller
{
    public function index(){
        $products = Product::with('productConfigDetail', 'category')->orderby('created_at', 'desc')->paginate(10);
        return view('admin.products.list_product')->with(compact('products'));
    }
    public function proInCate($cateSlug){
        $category = Category::where('cate_slug', $cateSlug)->first();
        if(empty($category)){
            abort(404);
        }
        $products = Product::where('cate_id', $category->id)->with('productConfigDetail', 'category')->orderby('created_at', 'desc')->paginate(10);
        return view('admin.products.list_product')->with(compact('products'));
    }
    public function showAddProduct(){
        if(Category::count()==0){
            return redirect('admin/list-categories')->with('flash_message_error', 'Bạn phải thêm hãng Laptop trước !');
        }

        $categories = Category::get();
        $configs = Config::with('configDetail')->get();
        return view('admin.products.add_product')->with(compact('categories', 'configs'));
    }
    public function addProduct(Request $request){
        if(Category::count()==0){
            return redirect('admin/list-categories')->with('flash_message_error', 'Bạn phải thêm hãng Laptop trước !');
        }
        $request->validate([
            'cate_id'      => 'required|exists:categories,id',
            'pro_name'     => 'required|unique:products|max:255|min:5',
            'pro_price'    => 'required',
            'pro_qty'      => 'required',
            'pro_des'      => 'required',
            'pro_image'    => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'config_detail.*' => 'exists:config_details,id'
        ], [
            'cate_id.required'    => 'Vui lòng loại sản phẩm !',
            'cate_id.exists'      => 'Dữ liệu không hợp lệ !',
            'pro_name.required'   => 'Vui lòng nhập tên sản phẩm !',
            'pro_name.unique'     => 'Tên sảm phẩm đã tồn tại !',
            'pro_name.max'        => 'Tên sảm phẩm quá dài !',
            'pro_name.min'        => 'Tên sảm phẩm quá ngắn !',
            'pro_price.required'  => 'Vui lòng nhập giá sản phẩm !',
            'pro_qty.required'    => 'Vui lòng nhập số lượng !',
            'pro_des.required'      => 'Vui lòng nhập mô tả sản phẩm !',
            'pro_image.required'    => 'Vui lòng chọn hình ảnh cho sản phẩm !',
            'pro_image.mimes'       => 'Vui lòng chọn hình ảnh cho sản phẩm !',
            'pro_image.max'         => 'Kích thước hình ảnh quá lớn !',
            'config_detail.exists'  => 'Dữ liệu không hợp lệ !',
        ]);
        $product = new Product;
        $product->cate_id   = $request->cate_id;
        $product->pro_name  = $request->pro_name;
        $product->pro_code  = generateRandomString(6);
        $product->pro_slug  = slug($request->pro_name);
        $product->pro_price = $request->pro_price;
        $product->pro_qty   = $request->pro_qty;
        $product->pro_des   = $request->pro_des;
        $product->pro_image = uploadImage($request->pro_image);
        isset($request->pro_status) ? $product->pro_status = 'active' : $product->pro_status = 'disable';
        $product->save();
        if(isset($request->config_detail)){
            foreach ($request->config_detail as $key => $value) {
                $data[] = ['pro_id'=> $product->id,'config_details_id' => $value];
            }
            ProductConfig::insert($data);
        }
        return redirect('admin/list-products')->with('flash_message_success', 'Đã thêm sản phẩm !');
    }
    public function showEditProduct($id){
        $url = URL::previous();
        session()->put('old_url', $url);
        $product     = Product::with('productConfigDetail:config_detail_name', 'category')->findOrFail($id);
        $config_info = array_flatten($product->productConfigDetail->toArray());
        $categories  = Category::get();
        $configs     = Config::with('configDetail')->get();
        return view('admin.products.edit_product')->with(compact('product', 'categories', 'configs', 'config_info'));
    }
    public function editProduct(Request $request, $id){

        $check = Product::findOrFail($id);
        $request->validate([
            'cate_id'      => 'required|exists:categories,id',
            'pro_name'     => 'required|max:255|min:5|unique:products,pro_name,'.$id,
            'pro_price'    => 'required',
            'pro_qty'      => 'required',
            'pro_des'      => 'required',
            'config_detail.*' => 'exists:config_details,id'
        ], [
            'cate_id.required'    => 'Vui lòng loại sản phẩm !',
            'cate_id.exists'      => 'Dữ liệu không hợp lệ !',
            'pro_name.required'   => 'Vui lòng nhập tên sản phẩm !',
            'pro_name.unique'     => 'Têm sảm phẩm đã tồn tại !',
            'pro_name.max'        => 'Tên sảm phẩm quá dài !',
            'pro_name.min'        => 'Tên sảm phẩm quá ngắn !',
            'pro_price.required'  => 'Vui lòng nhập giá sản phẩm !',
            'pro_qty.required'    => 'Vui lòng nhập số lượng !',
            'pro_des.required'    => 'Vui lòng nhập mô tả sản phẩm !',
            'config_detail.pro_image'    => 'Dữ liệu không hợp lệ !',
        ]);
        Product::where('id', $id)->update([
            'cate_id'    => $request->cate_id,
            'pro_name'   => $request->pro_name,
            'pro_slug'   => slug($request->pro_name),
            'pro_price'  => $request->pro_price,
            'pro_qty'    => $request->pro_qty,
            'pro_des'    => $request->pro_des,
            'pro_image'  => isset($request->pro_image)?upDateImage($request->pro_image, Product::find($id)->pro_image):Product::find($id)->pro_image,
            'pro_status' => isset($request->pro_status)?'active':'disable'
        ]);
        ProductConfig::where('pro_id', $id)->delete();
        foreach ($request->config_detail as $key => $value) {
            $data[] = ['pro_id'=> $id,'config_details_id' => $value];
        }
        ProductConfig::insert($data);
        $old_url = session()->get('old_url');
        session()->forget('old_url');
        return redirect($old_url)->with('flash_message_success', 'Đã cập nhập !');
    }
    public function deleteProduct(Request $request, $id){
        $product = Product::findOrFail($id);
        unlink('admin/img/products/'.$product->pro_image);
        ProductConfig::where('pro_id', $id)->delete();
        $product->delete();
        return redirect('admin/list-products')->with('flash_message_success', 'Đã xóa sản phẩm !');
    }
}
