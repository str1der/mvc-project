<?php 

declare(strict_types = 1);

namespace Core;

final class TemplateCompiler
{
    public static function compile(string $template): string
    {
        $content = self::compileLayout($template);
        $content = self::compileIncludes($content);
        $content = self::compileVariables($content);
        $content = self::compileConditionals($content);
        $content = self::compileLoops($content);

	    return $content;
    }

    private static function compileLayout(string $template): string
    {
        $content  = $template; 

        $layout = null;
        
            if( preg_match(
                "/@extends\(\s*['\"](.*?)['\"]\s*\)/",
                $content,
                $matches
            )){
                $layout = $matches[1];
            }

        preg_match_all(
            "/@section\(['\"](.*?)['\"]\)(.*?)@endsection/s",
            $content,
            $sectionMatches,
            PREG_SET_ORDER
        );

        $sections = [];

        foreach ($sectionMatches as $section) {
            $sections[$section[1]] = trim($section[2]);
        }

        $content = preg_replace(
            "/@section\(['\"](.*?)['\"]\)(.*?)@endsection/s",
            '',
            $content
        );

        if ($layout !== null) {
            $layoutPath = __DIR__ . '/../App/Views/' . $layout . '.php';

            $layoutContent = file_get_contents($layoutPath);

            if ($layoutContent === false) {
                throw new \RuntimeException(
                    "Failed to read layout: $layoutPath"
                );
            }

            $content = preg_replace_callback('/@yield\(\s*[\'"](.*?)[\'"]\s*\)/',
                    function (array $matches) use ($sections): string {
                $key = $matches[1];

                return $sections[$key] ?? '';
                    }, $layoutContent
            );
        }
        
        return $content;
    }

    private static function compileVariables(string $content): string
    {
        $content = preg_replace_callback('/\{\s*([a-zA-Z_][a-zA-Z0-9_]*)\s*\}/', 
            function (array $matches): string
            {
                $key = $matches[1];

                return "<?= htmlspecialchars(\$$key, ENT_QUOTES, 'UTF-8') ?>";
            }, $content
        );
        return $content;
    }

    private static function compileConditionals(string $content): string
    {
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

        return $content;
    }

    private static function compileLoops(string $content): string
    {
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
        ); // while Pattern

        $content = str_replace(
            '@endwhile',
            '<?php endwhile; ?>',
            $content
        ); // endwhile Pattern
        return $content;
    }

    private static function compileIncludes(string $content): string
    {
        $content = preg_replace_callback(
            '/@include\(\s*[\'"](.*?)[\'"]\s*\)/',
            function (array $matches): string {
                $includeFile = $matches[1];

                $includePath = __DIR__ . '/../App/Views/' . $includeFile . '.php';

                $includeContent = file_get_contents($includePath);

                if($includeContent === false)
                {
                    throw new \RuntimeException (
                        "Failed to read include: $includePath"
                    );

                }return $includeContent;
            }, $content
        );
        return $content ?? '';
    }
}
