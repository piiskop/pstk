<?php
namespace summa;
/**
 *  class to calculate sum
 * @author Kristine <Kristinesepp@gmail.com>
 *@namespace summa
 *
 */
class Sum{
	/**
	 * function which calculates sum
	 * @author Kristine <Kristinesepp@gmail.com>
	 * @access public
	 * @param number $parameters['a'] first summand
	 * @param number $parameters['b'] second summand
	 * @return number Sum
	 */
	public static function calculateSum($parameters){
		return $parameters['a'] + $parameters['b'];
		
	}
}
