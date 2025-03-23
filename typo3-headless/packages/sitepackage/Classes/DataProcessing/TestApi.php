<?php
declare(strict_types=1);

namespace Sitepackage\Sitepackage\DataProcessing;

class TestApi
{
    public function render()
    {
        header('Content-Type: application/json');
        echo json_encode(['status' => '✅ userFunc работает']);
        exit;
    }
}
