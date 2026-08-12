<?php 

declare(strict_types = 1);

namespace Core;

final class TemplateCompiler
{
    public static function compile(string $template): string
    {
        
        $content = preg_replace_callback('/\{\s*([a-zA-Z_][a-zA-Z0-9_]*)\s*\}/', 
            function (array $matches): string
            {
                $key = $matches[1];

                return "<?= htmlspecialchars(\$$key, ENT_QUOTES, 'UTF-8') ?>";
            }, $template
        );

        $content = preg_replace(
                '/@if\((.*?)\)/', 
                '<?php if ($1): ?>',
                $content
            ); //if pattern

        $content = preg_replace(
                '/@elseif\((.*?)\)/', 
                '<?php elseif ($1): ?>',
                $content
            ); //elseif pattern

        $content = str_replace(
                "@endif", 
                "<?php endif; ?>", 
                $content
            ); //endif pattern

        $content = str_replace(
                "@else", 
                '<?php else: ?>', 
                $content
            ); //else pattern


        $content = preg_replace(
            '/@foreach\((.*?)\)/',
            '<?php foreach ($1): ?>',
            $content
        ); // foreach pattern


        $content = str_replace(
            '@endforeach',
            '<?php endforeach; ?>',
            $content
        ); //endforeach pattern

        $content = preg_replace(
            '/@for\((.*?)\)/',
            '<?php for ($1) : ?>',
            $content
        ); // for pattern

        $content = str_replace(
            '@endfor',
            '<?php endfor; ?>',
            $content
        ); // endfor Pattern

        $content = preg_replace(
            '/@while\((.*?)\)/',
            '<?php while ($1) : ?>',
            $content
        );

        $content = str_replace(
            '@endwhile',
            '<?php endwhile; ?>',
            $content
        );




	return $content ?? '';
    }
}
