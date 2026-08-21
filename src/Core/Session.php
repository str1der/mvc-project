<?php 

declare(strict_types=1);

namespace Core;

final class Session
{
    public static function start(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    public static function set(string $key, mixed $value): void
    {
        $_SESSION[$key] = $value;
    }

    public static function get(string $key): mixed
    {
        return $_SESSION[$key] ?? null;
    }

    public static function remove(string $key): void
    {
        unset($_SESSION[$key]);
    }

    public static function destroy(): void
    {
        $_SESSION = [];

        if (session_status() === PHP_SESSION_ACTIVE) {
            session_destroy();
        }
    }

    public static function has(string $key): bool
    {
        return isset($_SESSION[$key]);
    }
    
    public static function flash(string $key, mixed $value): void
    {
        $_SESSION["_flash"][$key] = $value;
    }

    public static function getFlash(string $key): mixed
    {
        $message =  $_SESSION["_flash"][$key] ?? null;

        unset ($_SESSION["_flash"][$key]);

        return $message;
    }
}