<?php
/**
 * Author: Joris Rietveld <jorisrietveld@protonmail.com>
 * Date: 2-10-15 - 14:06
 */

require( "header.php" );

$databaseModel = new \CWSite\Models\Database();

$sqlSelect       = "SELECT * FROM `news` WHERE id = ? AND id = ?";
$sqlSelectValues = [ 1, 1 ];

var_dump( $databaseModel->query( $sqlSelect, $sqlSelectValues ));

$sqlSelect = "SELECT * FROM `news` WHERE id = :id";
$sqlSelectValues = [":id" => 1 ];

var_dump( $databaseModel->query($sqlSelect, $sqlSelectValues )->fetchAll( PDO::FETCH_ASSOC ));

$colons = ["id", ""]