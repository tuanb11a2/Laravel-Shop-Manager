<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	Cách truyền tham số vào cách dùng 
	a)compact()
	Route::get('chao/{user}', function ($user) {
    return view('hello-user', compact('user'));
	});
	b)with()
	Route::get('chao/{user}', function ($user) {
    return view('hello-user')->with('user', $user);
	});
	c)array
	Route::get('chao/{user}', function ($user) {
    return view('hello-user', ['user' => $user]);
	});


</body>
</html>