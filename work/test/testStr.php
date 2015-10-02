<?php

/**
 * Author: Joris Rietveld <jorisrietveld@protonmail.com>
 * Date: 1-10-15 - 20:32
 */

require( "header.php" );

$string  = "hello this is a {{test}} string. and its {{test}}";
$replace = [ "test", "awesome" ];

var_dump( \CWSite\Helper\Str::replaceArray( "{{test}}", $replace, $string ) );