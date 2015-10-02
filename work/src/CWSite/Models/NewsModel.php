<?php
/**
 * Author: Joris Rietveld <jorisrietveld@protonmail.com>
 * Date: 1-10-15 - 17:29
 */

namespace CWSite\Models;

use CWDatabase\DatabaseConnection;
use CWSite\Helper\Message;
use CWSite\Models\Database as DatabaseModel;


class NewsModel
{
	const TABLE_NAME = "news";

	private $databaseModel;

	private $availableGetOptions = [ "fields", "where", "order" ];

	private $defaultGetOptions = [
		"fields" => [ 'id', 'title', 'content', 'image' ],
		"where"  => "active = 1",
		"order"  => "`id` DESC"
	];

	public function __construct( DatabaseModel $databaseModel = null )
	{
		$this->databaseModel = $databaseModel;
	}

	public function getNews()
	{
		$result = $this->selectNews();
		$result->fetchAll( \PDO::FETCH_ASSOC );
	}

	private function selectNews()
	{
		$sql = "SELECT " . $this->getQuotedSelectFields();
		$sql .= " FROM " . self::TABLE_NAME;
		$sql .= " WHERE " . $this->getDefaultOptions()[ "where" ];
		$sql .= "ORDER BY " . $this->getDefaultOptions()[ "order" ];

		return $this->databaseModel->query( $sql );
	}

	public function setDefaultOptions( Array $options )
	{
		foreach( $options as $option => $value )
		{
			if( !in_array( $option, $this->availableGetOptions ) )
			{
				$message = str_replace( "{{option}}", $option, Message::getMessage( "newsModel.exceptions.invalidGetOption" ) );
				throw new \InvalidArgumentException( $message );
			}
			$this->defaultGetOptions[ $option ] = $value;
		}
	}

	public function getDefaultOptions()
	{
		return $this->defaultGetOptions;
	}

	private function selectNewsFromDatabase( $sql, $values )
	{

	}

	private function getQuotedSelectFields()
	{
		return "`" . rtrim( ",", join( "`,", $this->getDefaultOptions()[ "fields" ] ) );
	}
}