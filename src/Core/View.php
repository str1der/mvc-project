<?php 

declare(strict_types=1);

namespace Core;

final class View
{
    public static function render(string $page, array $data = []): string
    {
        ob_start();

        extract($data, EXTR_SKIP);

        include __DIR__ . "/../App/Views/" . $page . '.php';

        $view = ob_get_clean();

        return $view === false ? '' : $view;
    }
}