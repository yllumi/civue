<?php

use App\Libraries\PageRenderer;

if (!function_exists('page_view')) {
    function pageView($viewPath = 'index', $data = [])
    {
        return PageRenderer::render($viewPath, $data);
    }
}
