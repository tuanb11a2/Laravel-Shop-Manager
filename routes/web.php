<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Cố định
Route::get('/', function () {
    return view('welcome');
});
//END cố định

    			// -------------------------------------------
//PART I: các loại route

// a) Route::get là route với phương thức GET
Route::get('/welcome1', function () {
    return 'Chào mừng các bạn đã đến với trang web test của Tuấn';
});

// b) Route::get là route với phương thức POST
Route::post('/welcome2', function () {
    return 'Chào mừng các bạn đã đến với trang web test của Tuấn';
});

// c) Route::match là route với phương thức POST và GET mà không phải là delete...
Route::match(['POST','GET'],'/welcome3', function () {
    return 'Chào mừng các bạn đã đến với trang web test của Tuấn';
});

// d)Route::any là route với tất cả các phương thức cú pháp giống get

// e)Route::resource là route phải tạo 1 file TestController bằng cmd rồi sử dụng chức năng của nó(xem thêm nếu quên)
Route::resource('id.author', 'TestController',['GET']);

// f)Route::group (xem thêm vì khó vl :)))

    			// -------------------------------------------

//PART II: truyền biến trong route
Route::get('/hoten/{ten}', function ($ten) {
    return "Chào mừng $ten đã đến với trang web test của Tuấn";
});

//Ràng buộc dữ liệu bằng Regex
Route::get('thongtin/{tuoi}/{ten}', function ($tuoi, $ten) {
   return "hello $ten , $tuoi tuổi";
})->where(['tuoi' => '[0-9]+', 'ten' => '[a-z]+']);


//PRACTICE

Route::get('login/{user}',function($user){
	return view('admin.login',['user'=>$user]);
});

Route::resource('hello', 'TestController',['GET']);

//Route để test phần kế thừa giao diện bài 8

Route::get('call-view', function () {
   return view('home');
}); 

//Route để test phần gọi action trong controller
Route::get('/call-controller/{name}/{age}','Controllername@index')->where(['name' => '[a-zA-Z]+', 'age' => '[0-9]+']);

//Route để test lấy dữ liệu database
Route::get('/database', function () {
    $data = DB::table('tbl_hocvien')->get(); //đây là câu lệnh lấy cả bảng tbl_hocvien
  //$data=DB::table('tbl_hocvien')->select('id','name','email')->get(); đây là câu lệnh lấy theo cột đặt tên là id,name,...

  //còn nhiều lệnh thêm sửa xóa lên trên toidicode.com tìm

    print_r($data);
});


