<?php
    namespace App\Core;

    abstract class Controller
    {
        protected array $config;
        public function __construct(array $config) { $this->config =$config}
        protected function view(string $templet, array $data = []): void
        {view::render($template, $data); }
        protected function redirect(string $path): never
        {header("Location : {$path}"); exit; }
    }