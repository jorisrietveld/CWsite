<?php
/**
 * Author: Joris Rietveld <jorisrietveld@protonmail.com>
 * Date: 26-9-15 - 23:17
 * Licence: GPLv3
 */

namespace CWSite\Models;

use CWSite\Helper\Message;
use CWDatabase\DatabaseConnection;


class Database
{
	const CONFIG_SITE_DB = "CampuswerkSite";

	/**
	 * This holds the configuration array, parsed from {project_root}/Config/dbconfig.xml
	 * @var
	 */
	private $config;

	/**
	 * This holds the database connection (an PDO Php Data Object) to the the database configured in the
	 * {project_root}/Config/dbconfig.xml
	 * @var null
	 */
	private $databaseConnection;

	/**
	 * This method will parse an xml file with the database configuration. the default is in
	 * {project_root}/Config/dbconfig.xml but you can specify an xml file in the file parameter. it will check if there
	 * is an specific file specified else it wil load the dbconfig.xml file.
	 *
	 * @param string $file
	 *
	 * @throws \Exception
	 */
	private function parseDatabaseConfig( $file = "" )
	{
		$file = ( strlen( $file ) < 1 ) ? CAMPUSWERK_SITE_CONFIG_DIR . "dbconfig.xml" : $file;

		$xmlConfigObject = simplexml_load_file( $file );

		if( $xmlConfigObject == false )
		{
			throw new \Exception( Message::getMessage( "database.exceptions.missingConfig" ) );
		}

		$this->config = (array)$xmlConfigObject->{self::CONFIG_SITE_DB};
	}

	/**
	 * This wil create a php data object (PDO) created in CWDatabase based on the configuration.
	 * @throws \Exception
	 */
	protected function connectToDatabase()
	{
		$this->parseDatabaseConfig();
		var_dump( $this->config);
		$cwDatabaseConnection     = new DatabaseConnection( $this->config );
		$this->databaseConnection = $cwDatabaseConnection->getConnection();
	}

	/**
	 * This will return a php data object (PDO) saved in the databaseConnection property. If there is no connection it
	 * will call the connectToDatabase method to create one.
	 * @return mixed
	 */
	public function getDatabaseConnection()
	{
		if( $this->databaseConnection == null )
		{
			$this->connectToDatabase();
		}
		return $this->databaseConnection;
	}

	/**
	 * This setter is to manually set an PDO object to the databaseConnection property.
	 *
	 * @param mixed $databaseConnection
	 */
	protected function setDatabaseConnection( \PDO $databaseConnection )
	{
		$this->databaseConnection = $databaseConnection;
	}

	/**
	 * This method returns the configuration array set in the config property.
	 * @return mixed
	 */
	protected function getConfig()
	{
		return $this->config;
	}

	/**
	 * With this method you can manually set an configuration array.
	 *
	 * @param mixed $config
	 */
	protected function setConfig( $config )
	{
		$this->config = $config;
	}

	/**
	 * With this method you can perform an raw SQL statement to the database. Only use this to execute statements that
	 * PDO::Query can't perform like setting a charset, collation, timezone or default database.
	 *
	 * @param $sql
	 *
	 * @return int
	 */
	public function rawSqlStatement( $sql )
	{
		$connection = $this->getDatabaseConnection();

		return $connection->exec( $sql );
	}

	/**
	 * With this method you can perform a raw query to the database. Do not use this to perform query's to the database
	 * with unfiltered user input because it has no security against SQL injections. It returns an PDO::Statment object.
	 *
	 * @param $sql
	 *
	 * @return \PDOStatement
	 */
	public function rawQuery( $sql )
	{
		$connection = $this->getDatabaseConnection();

		return $connection->query( $sql );
	}

	/**
	 * Perform an prepared query on the database.
	 *
	 * @param $sql
	 * @param $parameters
	 */
	public function query( $sql, $parameters = [ ] )
	{
		$statement = $this->databaseConnection->prepare( $sql );

		if( count( $parameters ) )
		{
			foreach( $parameters as $key => $parameter )
			{
				$statement->bindValue( ( $key + 1 ), $parameter );
			}
		}

		return $statement->execute();
	}
}