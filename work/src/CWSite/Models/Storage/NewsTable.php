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
		"date_added",
		"date_modified"
	];

	protected $siteDatabase;
	protected $databaseConnection;

	public function __construct( SiteDatabase $siteDatabase )
	{
		$this->siteDatabase       = $siteDatabase;
		$this->databaseConnection = $siteDatabase->getConnection();
	}

	/**
	 * @return array
	 */
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

		return [];
	}

	/**
	 * @return array
	 */
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

		return [];
	}

	/**
	 * @return array
	 */
	public function getAllArticles()
	{
		$pdoStatementObj = $this->databaseConnection->select( self::TABLE_NAME, $this->allFields );

		$resultSet = $pdoStatementObj->fetchAll( \PDO::FETCH_ASSOC );

		if( count( $resultSet ) )
		{
			return $resultSet;
		}

		return [];
	}

	/**
	 * @param $id
	 * @return array
	 */
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

		return [];
	}

	/**
	 * @param $title
	 * @param $article
	 * @param $image
	 * @param $order
	 * @return bool
	 */
	public function insertArticle( $title, $article, $image, $order )
	{
		$insertData = [
			"title"         => $title,
			"article"       => $article,
			"image"         => $image,
			"order"         => $order,
			"active"        => 1,
			"date_added"    => DateAndTime::ConvertToMysqlDateTime( "now" ),
			"date_modified" => DateAndTime::ConvertToMysqlDateTime( "now" )
		];

		$insertedRows = $this->databaseConnection->insert( self::TABLE_NAME, $insertData );

		return (bool)$insertedRows;
	}

	/**
	 * @param $id
	 * @return bool
	 */
	public function hideArticle( $id )
	{
		$updateSetData = [ "active" => 0, "date_modified" => DateAndTime::ConvertToMysqlDateTime( "now" ) ];
		$updatedRows   = $this->databaseConnection->update( self::TABLE_NAME, $updateSetData, $id );

		return (bool)$updatedRows;
	}

	/**
	 * @param $id
	 * @return bool
	 */
	public function showArticle( $id )
	{
		$updateSetData = [ "active" => 1, "date_modified" => DateAndTime::ConvertToMysqlDateTime( "now" ) ];
		$updatedRows   = $this->databaseConnection->update( self::TABLE_NAME, $updateSetData, $id );

		return (bool)$updatedRows;
	}

	/**
	 * @param $id
	 * @return bool
	 */
	public function deleteArticle( $id )
	{
		$deletedRows = $this->databaseConnection->delete( self::TABLE_NAME, $id );

		return (bool)$deletedRows;
	}

	/**
	 * @param       $id
	 * @param array $setKeyToValue
	 * @return bool
	 */
	public function updateArticle( $id, Array $setKeyToValue )
	{
		$setKeyToValue = array_merge( $setKeyToValue, [ "date_modified" => DateAndTime::ConvertToMysqlDateTime( "now" ) ] );

		$updatedRows   = $this->databaseConnection->update( self::TABLE_NAME, $setKeyToValue, $id );

		return (bool)$updatedRows;
	}
}