<?php

namespace App\Pages\Dashboard\Statistic;

use App\Controllers\BaseController;

class PageAction extends BaseController
{
    public function index(): string
    {
        $data['name'] = 'in Statistic';
        return pageView('Dashboard/Statistic/index', $data);
    }
}
