<?php

declare(strict_types=1);

require __DIR__ . '/../Core/TemplateCompiler.php';

use Core\TemplateCompiler;

$template = '<h1>{title}</h1>';

echo TemplateCompiler::compile($template);
