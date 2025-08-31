<?php
    namespace App\Core;

    final class view
    {
        public static function render (string $template, array $data = []): void
        {
            extract($data);
            $templatePath = __DIR__ . '/../views/' . $template . 'php';
            require __DIR__ . '/../views/layout.php';
        }
    }