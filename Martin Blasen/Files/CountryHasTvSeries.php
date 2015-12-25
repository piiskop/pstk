<?php

/**
 * This Class describes which countries peoduce which tv series.
 * @author martinmb
 *
 */

class CountryHasTvSeries {
	private $Country_idCountry;
	public function setCountry_idCountry($Country_idCountry) {
		$this->Country_idCountry = $Country_idCountry;
	}
	public function getCountry_idCountry() {
		return $this->Country_idCountry;
	}
	private $TvSeries_IdTvSeries;
	public function setTvSeries_IdTvSeries($TvSeries_IdTvSeries) {
		$this->TvSeries_IdTvSeries = $TvSeries_IdTvSeries;
	}
	public function getTvSeries_IdTvSeries() {
		return $this->TvSeries_IdTvSeries;
	}
}