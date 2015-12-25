<?php
/**
 * This class describes the human
 * 
 * @author Rasmus <juhansoo12@gmail.com>
 *
 */
class Human
{
	/**
	 * @author rasmus <juhansoo12@gmail.com>
	 * @var string name of human
	 */
	private $name;
	
	/**
	 * @author rasmus <juhansoo12@gmail.com>
	 * @var int age of human
	 */
	private $age;
	
	/**
	 * the setter for the name
	 *
	 * @access public
	 * @author rasmus <juhansoo12@gmail.com>
	 * @param string $name 
	 * 			name of human
	 * @return Human human
	 */
	public function setName($name) {
		$this->name = $name;
		return $this;
	}
	
	/**
	 * the getter for the name
	 *
	 * @access public
	 * @author rasmus <juhansoo12@gmail.com>
	 * @return string the name
	 */
	public function getName() {
		return $this->name;
	}
	
	/**
	 * the setter for the name
	 *
	 * @access public
	 * @author rasmus <juhansoo12@gmail.com>
	 * @param string $name 
	 * 			age of human
	 * @return Human human
	 */
	public function setAge($age) {
		$this->age = $age;
		return $this;
	}
	
	/**
	 * the getter for the age
	 *
	 * @access public
	 * @author rasmus <juhansoo12@gmail.com>
	 * @return int the age
	 */
	public function getAge() {
		return $this->age;
	}
	
	/**
	 * This function compares all the human ages and returns them in a sorted array
	 *
	 * @access public
	 * @author rasmus <juhansoo12@gmail.com>
	 * @param Human $a first compared human
	 * @param Human $b second compared human
	 * @return int return <samp>0</samp> if <code>$a</code> and <code>$b</code> are equal, <samp>-1</samp> or <samp>1</samp> if <code>$a</code> is smaller than <code>$b</code>
	 */
	public static function compare($a, $b)
	{
		if ($a->getAge() == $b->getAge()) {
			return 0;
		}
		return ($a->getAge() < $b->getAge()) ? -1 : 1;
	}
}