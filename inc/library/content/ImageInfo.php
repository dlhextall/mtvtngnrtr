<?php

namespace library\content;

class ImageInfo {
	
	private $fileSrc;
	private $image;

	public function __construct($imgSrc) {
		set_error_handler("self::exceptionsErrorHandler");
		try {
			$this->image = imagecreatefromstring(file_get_contents($imgSrc));
			$this->fileSrc = $imgSrc;
		} catch (Exception $e) {
			$this->image = null;
			$this->fileSrc = "";
		}

	}

	public function getDominantHexColor($default = "#000000") {
		$color = "";
		if ($this->image != null) {
			$rTot = $gTot = $bTot = $tot = 0;
			for ($i=0; $i < imagesx($this->image); $i++) { 
				for ($j=0; $j < imagesy($this->image); $j++) {
					$colors = imagecolorsforindex($this->image, imagecolorat($this->image, $i, $j));
					$rTot += $colors['red'];
					$gTot += $colors['green'];
					$bTot += $colors['blue'];
					$tot++;
				}
			}
			$rAvg = round($rTot / $tot);
			$gAvg = round($gTot / $tot);
			$bAvg = round($bTot / $tot);

			$color = "#" . self::formatHex($rAvg) . self::formatHex($gAvg) . self::formatHex($bAvg);
		}

		return ($color == "") ? $default : $color;
	}

	public function getContrastDominantHexColor() {
		$dominant = $this->getDominantHexColor();
		$r = substr($dominant, 1, 3);
		$g = substr($dominant, 3, 5);
		$b = substr($dominant, 5, 7);
		$yiq = (($r * 299) + ($g * 587) + ($b * 114)) / 1000;
		return ($yiq <= 128) ? "#000000" : "#FFFFFF";
	}

	private static function formatHex($code) {
		return (strlen(dechex($code)) < 2 ? "0" . dechex($code) : dechex($code));
	}


	private static function exceptionsErrorHandler($_severity, $_message, $_filename, $_lineno) {
		if (error_reporting() == 0) {
			return;
		}
		if (error_reporting() && $_severity) {
			throw new \ErrorException($_message, 0, $_severity, $_filename, $_lineno);
		}
	}
	
}

?>