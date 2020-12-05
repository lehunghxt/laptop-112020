<?php

namespace App\Http\Controllers;

use App\Config;
use App\ConfigDetail;
use Illuminate\Http\Request;

class ConfigDetailController extends Controller
{
    public function index($id){
        $config_detail = Config::with('configDetail')->findOrFail($id);
        return view('admin.configs.list_configdetail')->with(compact('config_detail'));
    }
    public function showAddConfig($id){
        $config = Config::findOrFail($id);
        return view('admin.configs.add_config_detail')->with(compact('config'));
    }
    public function addConfig(Request $request, $id){
        $request->validate([
            'config_detail_name'    => 'required|unique:config_details|max:255|min:3',
        ], [
            'config_detail_name.required'    => 'Tên cấu hình được bỏ trống !',
            'config_detail_name.unique'    => 'Tên cấu hình đã tồn tại !',
            'config_detail_name.max'    => 'Tên cấu hình quá dài !',
            'config_detail_name.min'    => 'Tên cấu hình quá dài !',
        ]);
        $config = new ConfigDetail;
        $config->config_detail_name = $request->config_detail_name;
        $config->config_id = $id;
        $config->save();
        return redirect('admin/list-config-detail/'.$id)->with('flash_message_success', 'Thêm thành công !');
    }

    public function showEditConfig($id){
        $config = ConfigDetail::with('config')->findOrFail($id);
        return view('admin.configs.edit_config_detail')->with(compact('config'));
    }
    public function editConfig(Request $request, $id){
        $check = ConfigDetail::findOrFail($id);
        $request->validate([
            'config_detail_name' => 'required|max:255|min:3|unique:config_details,config_detail_name,'.$id,
        ], [
            'config_detail_name.required' => 'Tên cấu hình được bỏ trống !',
            'config_detail_name.max'      => 'Tên cấu hình quá dài !',
            'config_detail_name.min'      => 'Tên cấu hình quá dài !',
            'config_detail_name.unique'   => 'Tên cấu hình đã tồn tại !',
        ]);
        ConfigDetail::where('id', $id)->update(['config_detail_name' => $request->config_detail_name]);
        $id = ConfigDetail::find($id)->config_id;
        return redirect('admin/list-config-detail/'.$id)->with('flash_message_success', 'Câp nhập thành công !');
    }

    public function deleteConfig(Request $request, $id){
        $check = ConfigDetail::findOrFail($id);
        ConfigDetail::where('id', $id)->delete();
        return redirect()->back()->with('flash_message_success', 'Đã xóa thành công !');
    }
}
