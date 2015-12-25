<?php
namespace tuts;
class Model{
	
	private  $id;
	
	public function setId($id){
		$this->id=$id;
	}
	private static $raw = array(
			'address' => '123 unknown street, address&#160;<br />8600 Philippnes',
			'blogDate' => '2012-05-30 0:0:0',
			'blogEntry' => 'Never seen any of our designers try to use the
							list-style-image when implementing custom icons for list, I guess
							this is why :)',
			'phoneNumber' => '(012) 35 6789',
			'title' => 'Insert title here',
			'twitter' => '2015-11-01'
	);
	
	protected function getId()
	{
		return $this->id;
	}
	
	private static $address;
	
	public static function getAddress()
	{
		return Model::$address;
	}
	
	private static $blogDate;
	
	public static function getBlogDate()
	{
		return Model::$blogDate;
	}
	
	private static $blogEntry;
	
	public static function getBlogEntry()
	{
		return Model::$blogEntry;
	}
	
	private static $phoneNumber;
	
	public static function getPhoneNumber()
	{
		return Model::$phoneNumber;
	}
	
	private static $title;
	
	public static function getTitle()
	{
		return Model::$title;
	}
	
	
	private static $twitter;
	
	
	public static function getTwitter()
	{
		return Model::$twitter;
	}
	
	private $translations;
	
	protected function setTranslations($translations)
	{
		$this->translations = $translations;
	}
	
	
	public function setComplete()
	{
		if (isset(Model::$raw['address'])) {
			$this->address = Model::$raw['address'];
		}
		if (isset(Model::$raw['blogDate'])) {
			$this->blogDate = Model::$raw['blogDate'];
		}
		if (isset(Model::$raw['blogEntry'])) {
			$this->blogEntry = Model::$raw['blogEntry'];
		}
		if (isset(Model::$raw['phoneNumber'])) {
			$this->phoneNumber = Model::$raw['phoneNumber'];
		}
		if (isset(Model::$raw['translations'])) {
			$this->translations = Model::$raw['translations'];
		}
		if (isset(Model::$raw['twitter'])) {
			$this->twitter = Model::$raw['twitter'];
		}
	}
	
	public static function slugify($parameters)
	{
		return trim(
				mb_strtolower(
						preg_replace(
								array(
										'/[^\p{L}\p{N}]/ui',
										'/-(-)*/i'
								), array(
										'-',
										'-'
								), $parameters['original']), 'UTF-8'), '-');
	}
	
	public  function  translate($parameters)
	{
		if (isset($parameters['property'])) {
			if (isset($parameters['locale']) &&
					isset($this->translations[$parameters['property']][$locale])) {
						$translation = $this->translations[$parameters['property']][$parameters['locale']];
					}
					else if (isset($_SESSION['locale']) && isset(
							$this->translations[$parameters['property']][$_SESSION['locale']])) {
								$translation = $this->translations[$parameters['property']][$_SESSION['locale']];
							}
							else if (isset(
									$this->translations[$parameters['property']][DEFAULT_LOCALE])) {
										$translation = $this->translations[$parameters['property']][DEFAULT_LOCALE];
									}
									else {
										$translation = ':-)';
									}
									if (isset($parameters['isSlug']) && $parameters['isSlug'] &&
											isset($this->translations['label']) && (':-)' === $translation)) {
												if (isset($parameters['locale']) &&
														isset($this->translations['label'][$locale])) {
															$label = $this->translations['label'][$parameters['locale']];
														}
														else if (isset($_SESSION['locale']) && isset(
																$this->translations['label'][$_SESSION['locale']])) {
																	$label = $this->translations['label'][$_SESSION['locale']];
																}
																else if (isset($this->translations['label'][DEFAULT_LOCALE])) {
																	$label = $this->translations['label'][DEFAULT_LOCALE];
																}
																else {
																	$label = ':-)';
																}
																return \tuts\Model::slugify(array(
																		'original' => $label
																));
											}
											else {
												return $translation;
											}
		}
		else {
			exit('Millist omadust tõlgime?');
		}
	}
	
	
	
}