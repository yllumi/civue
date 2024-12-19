<?php

namespace App\Pages\Dashboard;

use App\Controllers\BaseController;

class PageAction extends BaseController
{
    public function index(): string
    {
        $data['name'] = 'Civue Cihuyyy';
        return pageView('Dashboard/index', $data);
    }
}
