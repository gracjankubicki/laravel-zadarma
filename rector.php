<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\ValueObject\PhpVersion;

return RectorConfig::configure()
    ->withPaths([
        __DIR__.'/src',
        __DIR__.'/tests',
    ])
    ->withPhpSets(php85: true)
    ->withPreparedSets(
        codeQuality: true,
        typeDeclarations: true,
    )
    ->withPhpVersion(PhpVersion::PHP_85);
