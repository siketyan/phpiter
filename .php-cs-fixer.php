<?php

declare(strict_types=1);

use PhpCsFixer\Finder;
use YumemiInc\PhpCsFixerConfig\Config;

$config = new Config(allowRisky: true);
$config->setRules([
    ...$config->getRules(),
    'global_namespace_import' => [
        'import_classes' => false,
        'import_constants' => false,
        'import_functions' => false,
    ],
    'phpdoc_to_comment' => false,
]);

return $config->setFinder(
    (new Finder())
        ->in(__DIR__),
);
