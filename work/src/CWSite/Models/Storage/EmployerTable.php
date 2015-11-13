<?php
/**
 * Author: Joris Rietveld <jorisrietveld@protonmail.com>
 * Date: 13-11-15 - 17:32
 */

namespace CWSite\Models\Storage;

use CWSite\Helper\DateAndTime;


class EmployerTable
{
	const TABLE_NAME = "employees";

	protected $allFields = [
		"id",
		"first_name",
		"last_name",
		"tussenvoegsel",
		"description",
		"image",
		"authentication_id",
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
	public function getAllActiveEmployees()
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

		return [ ];
	}

	/**
	 * @return array
	 */
	public function getAllInActiveEmployees()
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

	/**
	 * @return array
	 */
	public function getAllEmployees()
	{
		$pdoStatementObj = $this->databaseConnection->select( self::TABLE_NAME, $this->allFields );

		$resultSet = $pdoStatementObj->fetchAll( \PDO::FETCH_ASSOC );

		if( count( $resultSet ) )
		{
			return $resultSet;
		}

		return [ ];
	}

	/**
	 * @param $id
	 * @return array
	 */
	public function getEmployeeById( $id )
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

	public function getEmployeeByAuthenticationId( $authenticationId )
	{
		$whereClause = [
			"active = :active AND authentication_id = :authenticationId",
			[
				":active"           => 1,
				":authenticationId" => $authenticationId
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

	public function getEmployeesByProjectId( $projectId )
	{
		$employeesProjectsTable = new EmployeesProjectsTable( $this->siteDatabase );

		$employeesByProject = $employeesProjectsTable->getAllRecordsWithProjectId( $projectId );

		if( count( $employeesByProject ))
		{
			$employees = [];

			foreach( $employeesByProject as $employeeByProject )
			{
				$employee = $this->getEmployeeById( $employeesByProject["employee_id"]);

				if( count( $employee ))
				{
					$employees[] = $employee;
				}
			}
			return $employees;
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
	public function insertEmployee( $firstName, $lastName, $tussenvoegsel, $description, $image, $authentication_id )
	{
		$insertData = [
			"first_name"        => $firstName,
			"last_name"         => $lastName,
			"tussenvoegsel"     => $tussenvoegsel,
			"description"       => $description,
			"image"             => $image,
			"authentication_id" => $authentication_id,
			"active"            => 1,
			"date_added"        => DateAndTime::ConvertToMysqlDateTime( "now" ),
			"date_modified"     => DateAndTime::ConvertToMysqlDateTime( "now" )
		];

		$insertedRows = $this->databaseConnection->insert( self::TABLE_NAME, $insertData );

		return (bool)$insertedRows;
	}

	/**
	 * @param $id
	 * @return bool
	 */
	public function blockEmployee( $id )
	{
		$updateSetData = [ "active" => 0, "date_modified" => DateAndTime::ConvertToMysqlDateTime( "now" ) ];
		$updatedRows   = $this->databaseConnection->update( self::TABLE_NAME, $updateSetData, $id );

		return (bool)$updatedRows;
	}

	/**
	 * @param $id
	 * @return bool
	 */
	public function unblockEmployee( $id )
	{
		$updateSetData = [ "active" => 1, "date_modified" => DateAndTime::ConvertToMysqlDateTime( "now" ) ];
		$updatedRows   = $this->databaseConnection->update( self::TABLE_NAME, $updateSetData, $id );

		return (bool)$updatedRows;
	}

	/**
	 * @param $id
	 * @return bool
	 */
	public function deleteEmployee( $id )
	{
		$deletedRows = $this->databaseConnection->delete( self::TABLE_NAME, $id );

		return (bool)$deletedRows;
	}

	/**
	 * @param       $id
	 * @param array $setKeyToValue
	 * @return bool
	 */
	public function updateEmployee( $id, Array $setKeyToValue )
	{
		$setKeyToValue = array_merge( $setKeyToValue, [ "date_modified" => DateAndTime::ConvertToMysqlDateTime( "now" ) ] );

		$updatedRows = $this->databaseConnection->update( self::TABLE_NAME, $setKeyToValue, $id );

		return (bool)$updatedRows;
	}
}