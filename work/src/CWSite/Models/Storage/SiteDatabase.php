<?php
/**
 * Author: Joris Rietveld <jorisrietveld@protonmail.com>
 * Date: 11-11-15 - 16:13
 */

namespace CWSite\Models\Storage;

use CWDatabase\DatabaseConnection;


class SiteDatabase
{
	protected $databaseConnection = null;
	protected $siteDatabaseConfig = [
		"name"     => "siteDatabaseConnection",
		"driver"   => "mysql",
		"host"     => "127.0.0.1",
		"database" => "CampuswerkSite",
		"username" => "root",
		"password" => "toor",
		"port"     => "3306",
		"charset"  => "utf8"
	];

	protected $errors = [ ];

	protected function openConnection()
	{
		try
		{
			if( !$this->databaseConnection )
			{
				$this->databaseConnection = new DatabaseConnection( $this->siteDatabaseConfig );
			}
		}
		catch( \Exception $e )
		{
			$this->setError( "[exception]{$e->getMessage()}");
		}

	}

	public function getConnection()
	{
		$this->openConnection();

		return $this->databaseConnection;
	}

	public function setError( $message )
	{
		$this->errors[] = $message;
	}

	public function getErrors(  )
	{
		return $this->errors;
	}
}