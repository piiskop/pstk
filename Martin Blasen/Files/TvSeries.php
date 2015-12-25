<?php

/**
 * This class describes the Tv series that are being produced.
 * @author martinmb
 *
 */
class TvSeries {
	/**
	 * 
	 * @var integer the id of the tv series.
	 */
	private $id;
	public function setId($id) {
		$this->id = $id;
	}
	/**
	 * 
	 * @return number returns the id of the tv series
	 */
	public function getId() {
		return $this->id;
	}
	/**
	 * 
	 * @var string the name of the tv series.
	 */
	private $name;
	public function setName($name) {
		$this->name = $name;
	}
	/**
	 * 
	 * @return string returns the name of the tv series.
	 */
	public function getName() {
		return $this->name;
	}
	/**
	 * 
	 * @var string the type of the tv series.
	 */
	private $type;
	public function setType($type) {
		$this->type = $type;
	}
	/**
	 * 
	 * @return string returns the type of the tv series. 
	 */
	public function getType() {
		return $this->type;
	}
	/**
	 * 
	 * @var integer the number of seasns the tv series has.
	 */
	private $seasons;
	public function setSeasons($seasons) {
		$this->seasons = $seasons;
	}
	/**
	 * 
	 * @return number returns the number of seasns tv series has.
	 */
	public function getSeasons() {
		return $this->seasons;
	}
	/**
	 * 
	 * @var date the date the tv series started.
	 */
	private $start_date;
	public function setStart_date($start_date) {
		$this->start_date = $start_date;
	}
	/**
	 * 
	 * @return date returns the date the tv sreies started.
	 */
	public function getStart_date() {
		return $this->start_date;
	}
	/**
	 * 
	 * @var date the date the tv series ended.
	 */
	private $end_date;
	public function setEnd_date($end_date) {
		$this->end_date = $end_date;
	}
	/**
	 * 
	 * @return date returns the date the tv series ended.
	 */
	public function getEnd_date() {
		return $this->end_date;
	}
	/**
	 * 
	 * @return multitype:TvSeries creates an array for all the data a tv series has.
	 */
	public static function getTvSeries() {
	
		$tvserieses = array ();
	
		$tvseries = new TvSeries();
		$tvseries->setId (1);
		$tvseries->setName ('The A-Team');
		$tvseries->setType ('Action-adventure');
		$tvseries->setSeasons (5);
		$tvseries->setStart_date ('1992-08-27');
		$tvseries->setEnd_date ('1997-05-01');
		$tvserieses [$tvseries->getId ()] = $tvseries;
	
		$tvseries2 = new TvSeries();
		$tvseries2->setId (2);
		$tvseries2->setName ('CSI');
		$tvseries2->setType ('Crime drama');
		$tvseries2->setSeasons (15);
		$tvseries2->setStart_date ('2000-10-20');
		$tvseries2->setEnd_date ('2015-02-15');
		$tvserieses [$tvseries2->getId ()] = $tvseries2;
		
		return $tvserieses;
	
	}
	/**
	 * 
	 * @var unknown
	 */
	private $idsOfCountries = array();
	public function insertIdsOfCountries ($idOfCountries){
		$this->idsOfCountries[$idOfCountries]=$idOfCountries;
	
	}
	/**
	 * 
	 */
	public function idsOfCountries () {
		return $this->idsOfCountries;
	}
}








