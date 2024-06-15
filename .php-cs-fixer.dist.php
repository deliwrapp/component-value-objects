<?php

$header = <<<EOF
This file is part of the Deliwrapp HQ Value Objects Component.

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.
EOF;
$rules = include \Deliwrapp\Integration\PhpCsFixer\Deliwrapp::SHQ_LIBRARY;


$phan = PhpCsFixer\Finder::create()
->in(__DIR__ . '/.phan')
->getIterator();

$finder = PhpCsFixer\Finder::create()
    ->in([
        __DIR__.'/src',
        __DIR__.'/tests',
    ])
    ->append($phan);

$config = new PhpCsFixer\Config();
return $config
    ->setFinder($finder)
    ->setUsingCache(true)
    ->setCacheFile(__DIR__.'/var/cache/.php_cs.cache')
    ->setRiskyAllowed(true)
    ->setRules($rules);
