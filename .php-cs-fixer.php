<?php 

$finder = PhpCsFixer\Finder::create()
    ->exclude('vendor')
    ->in('src')
;

$config = new PhpCsFixer\Config();
return $config->setFinder($finder)
;