<?php 

declare(strict_types=1);

namespace Core;

final class View
{
    public static function render(string $page, array $data = []): string
    {
	$templatePath =  __DIR__ . "/../App/Views/" . $page . '.php';
	

	$cacheFile = __DIR__ . "/../storage/cache/views/" . hash('sha256', $templatePath) .'.php';
	$compilerPath = __DIR__ . '/TemplateCompiler.php';

	if(!is_file($cacheFile) 
		|| filemtime($cacheFile) < filemtime($templatePath) 
		|| filemtime($cacheFile) < filemtime($compilerPath)
	) {

		$templateContent = file_get_contents($templatePath);

		if($templateContent === false) {
			throw new \RuntimeException("Failed to read template file: $templatePath");
		}

		$compiledCode = TemplateCompiler::compile($templateContent);

		if(file_put_contents($cacheFile, $compiledCode) === false) {
			throw new \RuntimeException("Failed to write compiled template to cache: $cacheFile");
		}
	}

	extract($data, EXTR_SKIP);

	ob_start();

    include $cacheFile;

	$view = ob_get_clean();

        return $view === false ? '' : $view;
    }
}
