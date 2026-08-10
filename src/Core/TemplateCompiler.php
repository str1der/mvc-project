<?php 

declare(strict_types = 1);

namespace Core;

final class TemplateCompiler
{
    public static function compile(string $template): string
    {
        $content = preg_replace_callback('/\{([a-zA-Z0-9_]+)\}/', 
            function (array $matches): string
            {
                $key = $matches[1];

                return "<?= htmlspecialchars(\$$key, ENT_QUOTES, 'UTF-8') ?>";
            }, $template
        );
	return $content;
    }
}
