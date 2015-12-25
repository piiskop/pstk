<?php
class car {
	private $carColor;
	public function getCarColor() {
		return $this->carColor;
	}
	public function setCarColor($carColor) {
		$this->carColor = $carColor;
	}
	private $carMark;
	public function getCarMark() {
		return $this->carMark;
	}
	public function setCarMark($carMark) {
		$this->carMark = $carMark;
	}
	private $carModel;
	public function getCarModel() {
		return $this->carModel;
	}
	public function setCarModel($carModel) {
		$this->carModel = $carModel;
	}
}
class vheels {
	private $vheelColor;
	public function getVheelColor() {
		return $this->vheelColor;
	}
	public function setVheelColor($vheelColor) {
		$this->vheelColor = $vheelColor;
	}
	private $vheelDiameter;
	public function getVheelDiameter() {
		return $this->vheelDiameter;
	}
	public function setVheelDiameter($vheeldiameter) {
		$this->vheelDiameter = $vheeldiameter;
	}
}
class image {
	private $image;
	public function getImage() {
		$image ['src'] = '' . $this->image;
		return $image;
	}
	public function setImage($image) {
		$this->image = $image;
	}
}