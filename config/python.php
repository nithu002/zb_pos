<?php

return [
    'binary' => env('PYTHON_BINARY', 'python3'),
    'url' => env('PYTHON_SERVICE_URL', 'http://localhost:8000'),
    'auto_start' => env('PYTHON_AUTO_START', false),
];
