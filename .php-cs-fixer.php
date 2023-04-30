<?php

use PhpCsFixer\Config;

return (new Config())
	->setRules([
		'@PSR12' => true,
        'no_unused_imports' => true
	])
	->setIndent("\t")
	->setLineEnding("\n");
