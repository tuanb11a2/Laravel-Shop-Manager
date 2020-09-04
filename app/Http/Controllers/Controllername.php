<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Controllername extends Controller
{
    public function index($name,$age){
    	echo "Chào $name , tuổi của bạn là $age";
    }
}
