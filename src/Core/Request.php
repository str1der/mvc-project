<?php

declare(strict_types=1);

namespace Core;

final class Request
{
    public function path(): string
    {
        $requestUri = $_SERVER['REQUEST_URI'] ?? '/';

        $path = parse_url($requestUri, PHP_URL_PATH);

        return is_string($path) ? $path : '/';
    }
}