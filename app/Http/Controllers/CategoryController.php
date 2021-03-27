<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::withCount('products')->orderby('id', 'desc')->get();
        // show($categories->toJson());
        return view('admin.categories.list_catgegories')->with(compact('categories'));
    }
    public function showAddCategory(){
        return view('admin.categories.add_category');
    }
    public function addCategory(Request $request){

        $request->validate([
            'cate_name'    => 'required|unique:categories|max:255|min:3',
        ], [
            'cate_name.required' => 'Cate name không được bỏ trống !',
            'cate_name.unique'   => 'Cate name đã tồn tại đã tồn tại !',
            'cate_name.max'      => 'Cate name quá dài !',
            'cate_name.min'      => 'Cate name quá ngắn !',
        ]);

        $category = new Category;
        $category->cate_name = $request->cate_name;
        $category->cate_slug = slug($request->cate_name);
        $category->cate_status = isset($request->cate_status) ? 'active': 'disable';
        $category->save();
        return redirect('admin/list-categories')->with('flash_message_success', 'Thêm thành công !');

    }

    public function showEditCategory($id){
        $category = Category::findOrFail($id);
        return view('admin.categories.edit_category')->with(compact('category'));
    }
    public function editCategory(Request $request, $id){
        $request->validate([
            'cate_name'    => 'required|max:255|min:3|unique:categories,cate_name,'.$id,
        ], [
            'cate_name.required'    => 'Cate name không được bỏ trống !',
            'cate_name.max'      => 'Cate name quá dài !',
            'cate_name.min'      => 'Cate name quá ngắn !',
            'cate_name.unique'    => 'Cate name đã tồn tại đã tồn tại !',
        ]);
        Category::where('id', $id)->update([
                'cate_name' => $request->cate_name,
                'cate_slug' => slug($request->cate_name),
                'cate_status' => (isset($request->cate_status))?'active':'disable']);
        return redirect('admin/list-categories')->with('flash_message_success', 'Cập nhập thành công !');
    }

    public function deleteCategory($id){
        if(Product::where('cate_id', $id)->count()>0){
            return redirect()->back()->with('flash_message_error', 'Danh mục này có chứa nhiều sản phẩm, bạn không thể xóa được !');
        }
        Category::where('id', $id)->delete();
        return redirect('admin/list-categories')->with('flash_message_success', 'Xóa thành thành công !');
    }
    public function changeStatus(Request $request, $id){
        $user = Category::where('id', $id)->first();
        $status = ($user->cate_status=='disable') ? 'active':'disable';
        Category::where('id', $id)->update(['cate_status'=> $status]);
        return Category::where('id', $id)->first()->cate_status;
        // return redirect()->back()->with('flash_message_success', 'Đã thay đổi trạng thái - '.$user->name.' !');
    }
}
