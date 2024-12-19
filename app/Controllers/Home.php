<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $request = service('request');
        // dd($request);
        return view('welcome_message');
    }
}
