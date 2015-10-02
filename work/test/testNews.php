<?php
/**
 * Author: Joris Rietveld <jorisrietveld@protonmail.com>
 * Date: 1-10-15 - 18:08
 */

require( "header.php" );

$newsModel = new \CWSite\Models\News( );

echo '<h2>var_dump( $newsModel->getAllNewsMessages());</h2>';
var_dump( $newsModel->getAllNewsMessages());

echo '<h2></h2>';
var_dump( $newsModel->getNewsArticle(1));

echo '<h2></h2>';
var_dump( $newsModel->insertNewsArticle("test2", "blablabl alala sd skjflaksjd flkjsad lkfajskdlf as","image",1));
echo '<h2></h2>';

echo '<h2></h2>';

echo '<h2></h2>';