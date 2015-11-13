<?php
/**
 * Author: Joris Rietveld <jorisrietveld@protonmail.com>
 * Date: 13-11-15 - 13:15
 */

namespace CWSite\Models\Storage;

use CWSite\Helper\DateAndTime;


class ProjectsTable
{
	const TABLE_NAME = "projects";

	protected $allFields = [
		"id",
		"project_code",
		"title",
		"description",
		"link",
		"release_date",
		"active",
		"date_added",
		"image"
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
	public function getAllActiveProjects( $order = "", $limit = "" )
	{
		$whereClause = [
			"active = :active",
			[
				":active" => 1
			]
		];

		$pdoStatementObj = $this->databaseConnection->select( self::TABLE_NAME, $this->allFields, $whereClause, $order, $limit );

		$resultSet = $pdoStatementObj->fetchAll( \PDO::FETCH_ASSOC );

		if( count( $resultSet ) )
		{
			return $resultSet;
		}

		return [ ];
	}

	public function getAllInActiveProjects()
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

		return [ ];
	}

	public function getAllProjects()
	{
		$pdoStatementObj = $this->databaseConnection->select( self::TABLE_NAME, $this->allFields );

		$resultSet = $pdoStatementObj->fetchAll( \PDO::FETCH_ASSOC );

		if( count( $resultSet ) )
		{
			return $resultSet;
		}

		return [ ];
	}

	public function getProjectById( $id )
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

		return [ ];
	}

	public function getProjectByProjectCode( $projectCode )
	{
		$whereClause = [
			"active = :active AND project_code = :projectCode",
			[
				":active"      => 1,
				":projectCode" => $projectCode
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

	public function insertProject( $title, $description, $projectCode, $link, $release_date, $image )
	{
		$insertData = [
			"project_code"  => $projectCode,
			"title"         => $title,
			"description"   => $description,
			"link"          => $link,
			"release_date"  => $release_date,
			"active"        => 1,
			"date_added"    => DateAndTime::ConvertToMysqlDateTime( "now" ),
			"date_modified" => DateAndTime::ConvertToMysqlDateTime( "now" ),
		    "image" => $image
		];

		$insertedRows = $this->databaseConnection->insert( self::TABLE_NAME, $insertData );

		return (bool)$insertedRows;
	}

	public function hideProject( $id )
	{
		$updateSetData = [ "active" => 0 ];

		$updatedRows = $this->databaseConnection->update( self::TABLE_NAME, $updateSetData, $id );

		return (bool)$updatedRows;
	}

	public function showProject( $id )
	{
		$updateSetData = [ "active" => 1 ];

		$updatedRows = $this->databaseConnection->update( self::TABLE_NAME, $updateSetData, $id );

		return (bool)$updatedRows;
	}

	public function deleteProject( $id )
	{
		$deletedRows = $this->databaseConnection->delete( self::TABLE_NAME, $id );

		return (bool)$deletedRows;
	}

	public function updateProject( $id, Array $setKeyToValue )
	{
		$updatedRows = $this->databaseConnection->update( self::TABLE_NAME, $setKeyToValue, $id );

		return (bool)$updatedRows;
	}
}