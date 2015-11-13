<?php
/**
 * Author: Joris Rietveld <jorisrietveld@protonmail.com>
 * Date: 13-11-15 - 18:10
 */

namespace CWSite\Models\Storage;

class EmployeesProjectsTable
{
	const TABLE_NAME = "employees_projects";

	protected $allFields = [
		"id",
		"employees_id",
	    "project_id"
	];

	protected $siteDatabase;
	protected $databaseConnection;

	public function __construct( SiteDatabase $siteDatabase )
	{
		$this->siteDatabase       = $siteDatabase;
		$this->databaseConnection = $siteDatabase->getConnection();
	}

	public function getAllRecords()
	{
		$pdoStatementObj = $this->databaseConnection->select( self::TABLE_NAME, $this->allFields );

		return $pdoStatementObj->fetchAll( \PDO::FETCH_ASSOC );
	}

	public function getAllActiveRecords( )
	{
		$whereClause = [
			"active = :active",
		    [
			    ":active" => 1
		    ]
		];

		$pdoStatementObj = $this->databaseConnection->select( self::TABLE_NAME, $this->allFields, $whereClause );
		$result = $pdoStatementObj->fetchAll( \PDO::FETCH_ASSOC );

		if( count( $result ))
		{
			return $result;
		}
		return [];
	}

	public function getAllInActiveRecords(  )
	{
		$whereClause = [
			"active = :active",
			[
				":active" => 0
			]
		];

		$pdoStatementObj = $this->databaseConnection->select( self::TABLE_NAME, $this->allFields, $whereClause );
		$result = $pdoStatementObj->fetchAll( \PDO::FETCH_ASSOC );

		if( count( $result ))
		{
			return $result;
		}
		return [];
	}

	public function getAllRecordsWithEmployeeId( $employeeId )
	{
		$whereClause = [
			"employee_id = :employeeId AND active = :active ",
		    [
			    ":employeeId" => $employeeId,
		        ":active" => 1
		    ]
		];

		$pdoStatementObj = $this->databaseConnection->select( self::TABLE_NAME, $this->allFields, $whereClause );
		$result = $pdoStatementObj->fetchAll( \PDO::FETCH_ASSOC );

		if( count( $result ))
		{
			return $result;
		}
		return [];
	}

	public function getAllRecordsWithProjectId( $projectId )
	{
		$whereClause = [
			"employee_id = :projectId AND active = :active ",
			[
				":projectId" => $projectId,
				":active" => 1
			]
		];

		$pdoStatementObj = $this->databaseConnection->select( self::TABLE_NAME, $this->allFields, $whereClause );
		$result = $pdoStatementObj->fetchAll( \PDO::FETCH_ASSOC );

		if( count( $result ))
		{
			return $result;
		}
		return [];
	}


}