<?php
/**
 * Author: Joris Rietveld <jorisrietveld@protonmail.com>
 * Date: 1-10-15 - 21:53
 */

namespace CWSite\Models;

class News
{

	const TABLE_NAME = "news";

	private $databaseModel;
	private $queryBuilder;

	private $availableGetOptions = [ "fields", "where", "order" ];

	protected $query;

	public function __construct()
	{
		$this->databaseModel = new Database();

		$this->queryBuilder = new \FluentPDO( $this->databaseModel->getDatabaseConnection() );
	}

	public function insertNewsArticle( $title, $article, $image, $order )
	{
		$insertValues = [
			"title"   => $title,
			"article" => $article,
			"image"   => $image,
			"order"   => $order,
			"date"    => ( new \FluentLiteral( "NOW()" ) )
		];

		$this->queryBuilder->insertInto( self::TABLE_NAME, $insertValues );
	}

	public function getNewsArticle( $id )
	{
		$colons      = [ "id", "title", "article", "image", "order" ];
		$this->query = $this->queryBuilder->from( self::TABLE_NAME )->where( "id", $id );

		return $this->query->execute()->fetch();
	}

	public function deleteNewsArticle( $id )
	{
		$this->queryBuilder->deleteFrom( self::TABLE_NAME )->where( "id", $id );
	}

	public function updateNewsArticle( $id, Array $update )
	{
		$this->queryBuilder->update( self::TABLE_NAME )->set( $update )->where( "id", $id );
	}

	public function getAllNewsMessages()
	{
		$colons      = [ "id", "title", "article", "image", "order" ];
		$this->query = $this->queryBuilder->from( self::TABLE_NAME );

		return $this->query->execute()->fetchAll();
	}

	public function getLastQuery()
	{
		return $this->query;
	}
}