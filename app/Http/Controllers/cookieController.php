<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class cookieController extends Controller
{
    public function setCookie(Request $request)
    {
        $minutes = 1; //lama
        $response = new Response('Hello World');
        $response->withCookie(cookie('name','ridho',$minutes));
        return $response;
    }

    public function getCookie(Request $request)
    {
        $value = $request->cookie('name');
        echo $value;
    }
}
