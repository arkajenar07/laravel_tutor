<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function tes()
    {
        return response()->json([
            "message" => "Hello Dunia",
            "status" => "success"
        ]);
    }
}
