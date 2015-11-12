<?php
/**
 * Author: Joris Rietveld <jorisrietveld@protonmail.com>
 * Date: 1-10-15 - 18:08
 */

require( "header.php" );

$siteDatabase = new \CWSite\Models\Storage\SiteDatabase();

$newsTable = new \CWSite\Models\Storage\NewsTable( $siteDatabase );

/** ---------------------------------------------------------------------- Test all active articles
 * Passed
 */
try
{
	$record = $newsTable->getAllActiveArticles();

	/*echo "<h1>all active articles</h1>";
	var_dump($record);*/
}
catch( Exception $e )
{
	var_dump( $e );
}

/** ---------------------------------------------------------------------- Test all inactive articles
 * Passed
 */
try
{
	$record = $newsTable->getAllInActiveArticles();

	/*echo "<h1>all inactive articles</h1>";
	var_dump($record);*/
}
catch( Exception $e )
{
	var_dump( $e );
}

/** ---------------------------------------------------------------------- Test all articles
 * Passed
 */
try
{
	$record = $newsTable->getAllArticles();

	/*echo "<h1>all articles</h1>";
	var_dump($record);*/
}
catch( Exception $e )
{
	var_dump( $e );
}

/** ---------------------------------------------------------------------- Test update articles
 * Passed
 */
try
{
	/*echo "<h1>update articles</h1>";
	var_dump( $newsTable->updateArticle( 1, [ "title" => "updatedTitle" ] ) );*/
}
catch( Exception $e )
{
	var_dump( $e );
}

/** ---------------------------------------------------------------------- Test get by id articles
 * Passed
 */
try
{
	/*echo "<h1>get by id 1 articles</h1>";
	var_dump( $newsTable->getArticleById( 1 ) );*/
}
catch( Exception $e )
{
	var_dump( $e );
}

/** ---------------------------------------------------------------------- Test delete articles
 * Passed
 */
try
{
//	echo "<h1>delete by id 1 articles</h1>";
//	var_dump( $newsTable->deleteArticle( 1 ) );
//	var_dump( $newsTable->getArticleById( 1 ) );
}
catch( Exception $e )
{
	var_dump( $e );
}

/** ---------------------------------------------------------------------- Test hide articles
 * Passed
 */
try
{
	/*
		echo "<h1>hide articles</h1>";
		var_dump( $newsTable->hideArticle( 2 ) );
		var_dump( $newsTable->getArticleById( 2 ) );
	}*/
}
catch( Exception $e )
{
	var_dump( $e );
}

/** ---------------------------------------------------------------------- Test show articles
 * Passed
 */
try
{
	/*echo "<h1>show articles</h1>";
	var_dump( $newsTable->showArticle( 2 ) );
	var_dump( $newsTable->getArticleById( 2 ) );*/
}
catch( Exception $e )
{
	var_dump( $e );
}

/** ---------------------------------------------------------------------- Test insert articles
 * Passed
 */
try
{
	echo "<h1>update articles</h1>";
	var_dump( $newsTable->insertArticle( "title", "article", "image", "1" ) );
	var_dump( end( $newsTable->getAllActiveArticles() ) );
}
catch( Exception $e )
{
	var_dump( $e );
}