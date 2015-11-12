<?php
/**
 * Author: Joris Rietveld <jorisrietveld@protonmail.com>
 * Date: 11-11-15 - 16:21
 */

namespace CWSite\Models\Storage;

use CWSite\Helper\DateAndTime;


class NewsTable
{
	const TABLE_NAME = "news";

	protected $allFields = [
		"id",
		"title",
		"article",
		"image",
		"order",
		"active",
		"date"
	];

	protected $siteDatabase;
	protected $databaseConnection;

	public function __construct( SiteDatabase $siteDatabase )
	{
		$this->siteDatabase       = $siteDatabase;
		$this->databaseConnection = $siteDatabase->getConnection();
	}

	public function getAllActiveArticles()
	{
		$whereClause = [
			"active = :active",
			[
				":active" => 1
			]
		];

		$pdoStatementObj = $this->databaseConnection->select( self::TABLE_NAME, $this->allFields, $whereClause );

		$resultSet = $pdoStatementObj->fetchAll( \PDO::FETCH_ASSOC );

		if( count( $resultSet ) )
		{
			return $resultSet;
		}

		return false;
	}

	public function getAllInActiveArticles()
	{
		$whereClause = [
			"active = :active",
			[
				":active" => 0
			]
		];

		$pdoStatementObj = $this->databaseConnection->select( self::TABLE_NAME, $this->allFields, $whereClause );

		$resultSet = $pdoStatementObj->fetchAll( \PDO::FETCH_ASSOC );

		if( count( $resultSet ) )
		{
			return $resultSet;
		}

		return false;
	}

	public function getAllArticles()
	{
		$pdoStatementObj = $this->databaseConnection->select( self::TABLE_NAME, $this->allFields );

		$resultSet = $pdoStatementObj->fetchAll( \PDO::FETCH_ASSOC );

		if( count( $resultSet ) )
		{
			return $resultSet;
		}

		return false;
	}

	public function getArticleById( $id )
	{
		$whereClause = [
			"active = :active AND id = :id",
			[
				":active" => 1,
				":id"     => $id
			]
		];

		$pdoStatementObj = $this->databaseConnection->select( self::TABLE_NAME, $this->allFields, $whereClause );

		$resultSet = $pdoStatementObj->fetchAll( \PDO::FETCH_ASSOC );

		if( count( $resultSet ) )
		{
			return $resultSet[ 0 ];
		}

		return false;
	}

	public function insertArticle( $title, $article, $image, $order, $date = "now" )
	{
		$insertData = [
			"title"   => $title,
			"article" => $article,
			"image"   => $image,
			"order"   => $order,
			"active"  => 1,
			"date"    => DateAndTime::ConvertToMysqlDateTime( $date )
		];

		$insertedRows = $this->databaseConnection->insert( self::TABLE_NAME, $insertData );

		return $insertedRows;
	}

	public function hideArticle( $id )
	{
		$updateSetData = [ "active" => 0 ];
		$updatedRows   = $this->databaseConnection->update( self::TABLE_NAME, $updateSetData, $id );

		return $updatedRows;
	}

	public function showArticle( $id )
	{
		$updateSetData = [ "active" => 1 ];
		$updatedRows   = $this->databaseConnection->update( self::TABLE_NAME, $updateSetData, $id );

		return $updatedRows;
	}

	public function deleteArticle( $id )
	{
		$deletedRows = $this->databaseConnection->delete( self::TABLE_NAME, $id );

		return $deletedRows;
	}

	public function updateArticle( $id, Array $setKeyToValue )
	{
		$updatedRows = $this->databaseConnection->update( self::TABLE_NAME, $setKeyToValue, $id );

		return $updatedRows;
	}
}