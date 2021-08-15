<?php

namespace System;

use ErrorException;

class View
{
    public function render(string $page, string $layout, array $data = [])
    {
        $fullViewPath = __DIR__ . '/../views/layouts/' . strtolower($layout) . '.php';

        $page = __DIR__ . '/../views/pages/' . strtolower($page) . '.php';

        if (!file_exists($fullViewPath)) {
            throw new ErrorException('Layout not found');
        }

        if (!file_exists($page)) {
            throw new ErrorException('Page not found');
        }

        if (!empty($data)) {
            foreach ($data as $key => $value) {
                $$key = $value;
            }
        }

        include ($fullViewPath);
    }
}