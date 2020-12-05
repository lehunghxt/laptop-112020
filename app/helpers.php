<?php
if (! function_exists('slug')) {
    function slug($str) {
      $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
      $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
      $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
      $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
      $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
      $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
      $str = preg_replace('/(đ)/', 'd', $str);
      $str = preg_replace('/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/', 'A', $str);
      $str = preg_replace('/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/', 'E', $str);
      $str = preg_replace('/(Ì|Í|Ị|Ỉ|Ĩ)/', 'I', $str);
      $str = preg_replace('/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/', 'O', $str);
      $str = preg_replace('/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/', 'U', $str);
      $str = preg_replace('/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/', 'Y', $str);
      $str = preg_replace('/(Đ)/', 'D', $str);
      $str = str_replace('–', '', $str);
      $str = str_replace(',', '', $str);
      $str = str_replace(' ', '-', $str);
      return $str;
    }
}

if (! function_exists('generateRandomString')) {
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

if (! function_exists('generateCode')) {
    function generateCode($length = 10) {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

if (! function_exists('uploadImage')) {
    function uploadImage($data) {
        $imageName = generateRandomString().'.'.$data->getClientOriginalExtension();
        $data->move(public_path('admin/img/products'), $imageName);
        return $imageName;
    }
}

if (! function_exists('upDateImage')) {
    function upDateImage($new, $old){
        $imageName = generateRandomString().'.'.$new->getClientOriginalExtension();
        $new->move(public_path('admin/img/products'), $imageName);
        // if(file_exists(public_path('admin/img/products/'.$old))){
        //     unlink(public_path('admin/img/products/'.$old));
        // }
        return $imageName;
    }
}

if (! function_exists('array_flatten')) {
    function array_flatten($array) {
        if (!is_array($array)) {
          return false;
        }
        $result = array();
        foreach ($array as $key => $value) {
          if (is_array($value)) {
            $result = array_merge($result, array_flatten($value));
          } else {
            $result = array_merge($result, array($key => $value));
          }
        }
        return $result;
      }
}

if (! function_exists('show')) {
    function show($data) {
        echo '<pre>';
        print_r($data);
        echo '</pre>';die;
    }
}
if (! function_exists('price')) {
    function price($price) {
        return number_format($price,0,',','.');
    }
}

if (! function_exists('changeTime')) {
    function changeTime($time) {
        \Carbon\Carbon::setLocale('vi');
        return \Carbon\Carbon::parse($time)->diffForHumans(\Carbon\Carbon::now());
    }
}


?>
