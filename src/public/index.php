<?php

declare(strict_types=1);

$requestUri = $_SERVER['REQUEST_URI'] ?? '/';

$path = parse_url($requestUri, PHP_URL_PATH);

if($path === '/'){
    echo 'Welcome to the homepage!';
}else if($path === '/about'){
    echo 'This is the about page.';
}else if($path === '/contact'){
    echo 'This is the contact page.';
}else{
    http_response_code(404);
    echo '404 Not Found';
}