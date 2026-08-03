<?php 

declare(strict_types=1);

namespace Core;

final class Router
{
    private array  $routes;

    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    public function match(string $path): ?string // ?string bu metot ya string döndürür yada null demek için
    {
        if(!array_key_exists($path, $this->routes))
        {
            return null;
        } 

        return $this->routes[$path];
    }
}