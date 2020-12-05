<?php

namespace App\Http\Controllers;

use App\Config;
use App\ConfigDetail;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index(){
        $configs = Config::get();
        return view('admin.configs.list_config')->with(compact('configs'));
    }
    public function showAddConfig(){
        return view('admin.configs.add_config');
    }
    public function addConfig(Request $request){
        $request->validate([
            'config_name'    => 'required|unique:configs|max:255|min:3',
        ], [
            'config_name.required'  => 'Tên cấu hình không được bỏ trống !',
            'config_name.unique'    => 'Tên cấu hình đã tồn tại !',
            'config_name.max'       => 'Tên cấu hình quá dài !',
            'config_name.min'       => 'Tên cấu hình quá ngắn !',
        ]);
        $config = new Config;
        $config->config_name = $request->config_name;
        $config->save();
        return redirect('admin/list-configs')->with('flash_message_success', 'Thêm thành công !');
    }

    public function showEditConfig($id){
        $config = Config::findOrFail($id);
        return view('admin.configs.edit_config')->with(compact('config'));
    }
    public function editConfig(Request $request, $id){
        $check = Config::findOrFail($id);
        $request->validate([
            'config_name'    => 'required|max:255|min:3|unique:configs,config_name,'.$id,
        ], [
            'config_name.required'    => 'Tên cấu hình được bỏ trống !',
            'config_name.max'       => 'Tên cấu hình quá dài !',
            'config_name.min'       => 'Tên cấu hình quá ngắn !',
            'config_name.unique'    => 'Tên cấu hình đã tồn tại !',
        ]);
        Config::where('id', $id)->update(['config_name' => $request->config_name]);
        return redirect('admin/list-configs')->with('flash_message_success', 'Cập nhập thành công !');
    }

    public function deleteConfig(Request $request, $id){
        $check = Config::findOrFail($id);
        Config::where('id', $id)->delete();
        ConfigDetail::where('config_id', $id)->delete();
        return redirect('admin/list-configs')->with('flash_message_success', 'Đã xóa thành công !');
    }
}
