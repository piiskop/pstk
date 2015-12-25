<?php
/**tegin klassi tops
 * klass tops, millel omadus värv
 * 
 * @author tambet
 *        
 */
class Tops {
	/**
	 *andsin topsile väärtuse värv, mis on avalik
	 * @author tambet
	 * @var string color of a cup
	 */
	public $varv;
	/**
	 *andsin topsile väärtuse suurus, mis on privaatne
	 *seeg atuleb tema poole edaspidi pöörduda setter, getteri abil
	 * @var string size of a cup
	 */
	private $suurus;
	/**
	 *teen setteri, mille kaudu saab lisada muidu privaatsele suurusele
	 *$this->suurus = $suurus
	 * @author tambet
	 * @param string $suurus        	
	 */
	public function setSuurus($suurus) {
		$this->suurus = $suurus;
	}
	/**
	 * teen getteri, mille kaudu pöördun suuruse poole
	 * () on tühjad kuna võtab setterist
	 * @author tambet
	 * @return string 
	 */
	public function getSuurus(){
		return $this->suurus;
	}
}
