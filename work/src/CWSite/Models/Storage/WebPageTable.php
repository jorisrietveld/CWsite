<?php
/**
 * Author: Joris Rietveld <jorisrietveld@protonmail.com>
 * Date: 13-11-15 - 15:33
 */

namespace CWSite\Models\Storage;

class WebPageTable
{
	const TABLE_NAME = "webpage";

	protected $allFields = [
		"id",
		"title",
		"metadata",
		"content",
		"image",
		"switch_id"
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
	public function getAllWebPages( $order = "", $limit = "" )
	{
		$pdoStatementObj = $this->databaseConnection->select( self::TABLE_NAME, $this->allFields, [], $order, $limit );

		$resultSet = $pdoStatementObj->fetchAll( \PDO::FETCH_ASSOC );

		if( count( $resultSet ) )
		{
			return $resultSet;
		}

		return [ ];
	}

	public function getWebPageById( $id )
	{
		$whereClause = [
			"id = :id",
			[
				":id"     => $id
			]
		];

		$pdoStatementObj = $this->databaseConnection->select( self::TABLE_NAME, $this->allFields, $whereClause );

		$resultSet = $pdoStatementObj->fetchAll( \PDO::FETCH_ASSOC );

		if( count( $resultSet ) )
		{
			return $resultSet[ 0 ];
		}

		return [ ];
	}

	public function getWebPageBySwitchId( $switchId )
	{
		$whereClause = [
			"switch_id = :switchId",
		[
				":switchId"     => $switchId
			]
		];

		$pdoStatementObj = $this->databaseConnection->select( self::TABLE_NAME, $this->allFields, $whereClause );

		$resultSet = $pdoStatementObj->fetchAll( \PDO::FETCH_ASSOC );

		if( count( $resultSet ) )
		{
			return $resultSet[ 0 ];
		}

		return [ ];
	}

	public function getProjectByTitle( $title )
	{
		$whereClause = [
			"title = :title",
			[
				":title" => $title
			]
		];

		$pdoStatementObj = $this->databaseConnection->select( self::TABLE_NAME, $this->allFields, $whereClause );

		$resultSet = $pdoStatementObj->fetchAll( \PDO::FETCH_ASSOC );

		if( count( $resultSet ) )
		{
			return $resultSet[ 0 ];
		}

		return [ ];
	}

	public function deleteWebPage( $id )
	{
		$deletedRows = $this->databaseConnection->delete( self::TABLE_NAME, $id );

		return (bool)$deletedRows;
	}

	public function updateWebPage( $id, Array $setKeyToValue )
	{
		$updatedRows = $this->databaseConnection->update( self::TABLE_NAME, $setKeyToValue, $id );

		return (bool)$updatedRows;
	}
}