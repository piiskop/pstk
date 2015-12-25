<?php
//svn:ignore;
namespace pearphpvaade;
/**
 * klass mis kirjeldab liitmist
 * @author kristen <seppkristen@gmail.com>
 * @namespace pearphpvaade
 */
class SumModel{
	/**
	 * funktsioon mis liidab 2 parameetrit omavahel
	 * @access public
	 * @author kristen <seppkristen@gmail.com>
	 * @param number $a esimene number
	 * @param number $b teine number
	 * @return number summa
	 */
	public static function add($a, $b){
		return ($a+$b);
	}
}