<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function uriTest(Request $request){
    // ví dụ URL http://laravel.dev/category/laravel-nang-cao
    $uri = $request->path();
    // trả về category/laravel-nang-cao
    echo $uri;

    if ($request->is('admin/*')) {
        // các đường dẫn bắt đầu bằng admin/ được xử lý
        // ví dụ http://laravel.dev/admin/product/create, http://laravel.dev/admin/news/create
        echo '<br>Admin path';
    }
    if ($request->is('category/laravel-nang-cao')) {
        echo '<br>Đường dẫn bạn vừa truy nhập đúng là http://laravel.dev/' . $request->path();
    }

    // ví dụ đường dẫn http://laravel.dev/category/laravel-nang-cao?page=3&lang=vn
    $url = $request->url();
    // trả về http://laravel.dev/category/laravel-nang-cao
    echo '<br>Đường dẫn đầy đủ: ' . $url;

    // ví dụ đường dẫn http://laravel.dev/category/laravel-nang-cao?page=3&lang=vn
    $full_url = $request->fullurl();
    // trả về http://laravel.dev/category/laravel-nang-cao?page=3&lang=vn
    echo '<br>Đường dẫn đầy đủ cả query string' . $full_url;

    $method = $request->method();
    if ($request->isMethod('post')) {
        echo '<br>POST request';
    } else {
        echo '<br>GET request';
    }
}
}
