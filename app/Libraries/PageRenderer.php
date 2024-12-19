<?php

namespace App\Libraries;

use CodeIgniter\View\Exceptions\ViewException;

class PageRenderer
{
    public static function render($path, $data = [])
    {
        // Resolve full path to the file
        $filePath = realpath(APPPATH . 'Pages/' . $path . '.php');

        // Check if the file exists
        if (!$filePath || !file_exists($filePath)) {
            throw ViewException::forInvalidFile($filePath);
        }

        // Extract data to make it available as variables
        extract($data);

        // Start output buffering
        ob_start();

        // Include the file
        include $filePath;

        // Return the buffered content
        return ob_get_clean();
    }
}
