<?php
class FileLocation {
	private $prefix, $path, $domain, $project;

	public function __CONSTRUCT($project){
		$this->prefix 	= "SWH_2014";
		$this->path 	= "/usr/share/nginx/html/cdn/" . $this->prefix . DIRECTORY_SEPARATOR . $project . DIRECTORY_SEPARATOR;
		$this->project 	= $project;
		$this->domain 	= "http://127.0.0.1/cdn/";
	}

	public function project(){
		return $this->project;
	}

	public function dirPath(){
		return $this->path;
		/*
			/usr/share/nginx/html/cdn/SWH_2014/site/
		*/
	}

	public function httpPath(){
		return $this->domain . $this->prefix . DIRECTORY_SEPARATOR . $this->project . DIRECTORY_SEPARATOR;
		/*
			http://127.0.0.1/cdn/SWH_2014/site/
		*/
	}

	public function uploadByID($id){
		/*
			Query om het resultaat van een enkele upload op te halen.

			Tabel: 
				Uploads
			Velden:
				ID
				UserID
				UploadDT
				UserFile
				StoredFile

			Onderstaande nu hardcoded
		*/
		$tijdelijk = array(
						   'ID' => 1,
						   'UserID' => 4,
						   'UploadDT' => '',
						   'UserFile' => 'Definitiestudie K1 P6 - V3.docx',
						   'StoredFile' => 'definitiestudie_00001.docx'
						   );
		return $tijdelijk;
	}

	public function uploadsByUserID($userId){
		/*
			Query om de records op te halen van alle uploads van userID
			Zelfde data als bovenstaande, maar (mogelijk) meerdere resultaten.

			Tijdelijk hardcoded.
		*/

		$tijdelijk = array();
		$tijdelijk[] = array('ID' => 1,
						   'UserID' => 4,
						   'UploadDT' => '??',
						   'UserFile' => 'Definitiestudie K1 P6 - V3.docx',
						   'StoredFile' => 'definitiestudie_00001.docx');
		$tijdelijk[] = array('ID' => 2,
						   'UserID' => 4,
						   'UploadDT' => '??',
						   'UserFile' => 'Definitiestudie K1 P6 - V4.docx',
						   'StoredFile' => 'definitiestudie_00002.docx');
		return $tijdelijk;
	}

	public function getUserFileByID($id){
		/*
			Query om het resultaat van een enkele upload op te halen, enkel de 'userfile', dit is de naam hoe de gebruiker een bestand upload.

			Momenteel hardcoded.
		*/
		return 'ERD K1 P6 - V4.png';
	}

	public function getStoredFileByID($id){
		/* 
			Query om het resultaat van een enkele upload op te halen.
			Hier word enkel de 'storedfile' opgehaald.
			Dit is de naam hoe het bestand heet na het uploaden.
				"Definitiestudie K1 P6 - V3.docx" > "definitiestudie_00001.docx"

			Momenteel hardcoded.
		*/
		return 'ERD_00002.png';
	}
}