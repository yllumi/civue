<?php

namespace App\Pages\dashboard;

use App\Controllers\BaseController;

class PageController extends BaseController
{
    public function index(): string
    {
        $data['name'] = 'Civue Cihuyyy';
        // return pageView('dashboard/index', $data);
        return view('welcome_message', $data);
    }
    
    public function show($id): string
    {
        $data['name'] = $id;
        return pageView('dashboard/index', $data);
    }
}
