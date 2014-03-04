<?php

namespace library\content;

// require_once '../database/DatabaseConnection.php';
// require_once 'ImageInfo.php';

class BackgroundImage {

	private $imageInfo;
	private $fileSource;

	public function __construct($source = "") {
		if ($source == "") {
			$dbh = \library\database\DatabaseConnection::getInstance();
			$qString = "SELECT fileSource FROM t_backgrounds WHERE valid=1 ORDER BY RAND() LIMIT 1";
			$stmt = $dbh->prepare($qString);
			$stmt->execute();
			$result = $stmt->fetch();

			$this->fileSource = $result[0];
		} else {
			$this->fileSource = $source;
		}
		
		$this->imageInfo = new ImageInfo($this->fileSource);
	}

	public function getImageSource() {
		return $this->fileSource;
	}

	public function getDominantHexColor($default = "#000000") {
		return $this->imageInfo->getDominantHexColor();
	}

	public function getContrastDominantHexColor() {
		return $this->imageInfo->getContrastDominantHexColor();
	}

}

?>