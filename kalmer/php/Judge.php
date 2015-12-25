<?php
class Judge {
	
	/**
	 * @access private
	 * @author kalmer
	 * @var integer the ID of the judge
	 */
	private $idJudge;

	/**
	 * the setter for the ID of the judge
	 * 
	 * @access public
	 * @author kalmer
	 * @param integer $idJudge the ID of the judge
	 */
	public function setIdJudge($idJudge)
	{
		$this->idJudge = $idJudge;
	}

	/**
	 *
	 * @access private
	 * @author kalmer
	 * @var string the first name
	 */
	private $firstName;
	/**
	 * the getter of the first name
	 * 
	 * @access public
	 * @author kalmer
	 * @return string
	 */
	public function getFirstName()
	{
		return $this->firstName;
	}

	/**
	 *
	 * @access private
	 * @author kalmer
	 * @var string the last name
	 */
	private $lastName;
	/**
	 * the getter of the last name
	 *
	 * @access public
	 * @author kalmer
	 * @return string
	 */
	public function getLastName()
	{
		return $this->lastName;
	}

	/**
	 *
	 * @access private
	 * @author kalmer
	 * @var string the phone number
	 */
	private $phoneNumber;
	/**
	 * the getter of the phone number
	 *
	 * @access public
	 * @author kalmer
	 * @return string
	 */
	public function getPhoneNumber()
	{
		return $this->phoneNumber;
	}

	/**
	 *
	 * @access private
	 * @author kalmer
	 * @var string the email address
	 */
	private $emailAddress;
	/**
	 * the getter of the email address
	 *
	 * @access public
	 * @author kalmer
	 * @return string
	 */
	public function getEmailAddress()
	{
		return $this->emailAddress;
	}

	/**
	 *
	 * @access private
	 * @author kalmer
	 * @var string the relative path to the image of the judge
	 */
	private $image;
	
	/**
	 *
	 * @access private
	 * @author kalmer
	 * @var integer the width of the image of the judge in pixels
	 */
	private $width;
	
	/**
	 *
	 * @access private
	 * @author kalmer
	 * @var integer the height of the image of the judge in pixels
	 */
	private $height;

	/**
	 * This function sets the complete judge.
	 * 
	 * @access public
	 * @author kalmer
	 */
	public function setCompleteJudge()
	{
		$judges = Judge::getJudges();
		$this->firstName = $judges[$this->idJudge]->firstName;
		$this->lastName = $judges[$this->idJudge]->lastName;
		$this->emailAddress = $judges[$this->idJudge]->emailAddress;
		$this->phoneNumber = $judges[$this->idJudge]->phoneNumber;
		$this->image = $judges[$this->idJudge]->image;
		$this->width = $judges[$this->idJudge]->width;
		$this->height = $judges[$this->idJudge]->height;
	}

	/**
	 * This function checks whether the image exists and displays it or a
	 * standard
	 * image otherwise.
	 *
	 * @author kalmer
	 * @param string|int[string] $judge
	 *        	a judge
	 * @return string|int[string] the image data
	 */
	public function makeImage() {
		$image['src'] = '../images/' . $this->image;

		if (file_exists($image['src']) && is_file($image['src'])) {
			$image['width'] = $this->width;
			$image['height'] = $this->height;
		} else {
			$image['src'] = 'http://localhost/pstk/kalmer/images/Worst_Tennis_Player_lg.jpg';
			$image['width'] = 500;
			$image['height'] = 386;
		}

		return $image;
	}

	/**
	 * This function gets all the judges.
	 *
	 * @access public
	 * @author kalmer
	 * @return multitype:Judge
	 */
	public static function getJudges() {
		$judges = array ();
		
		$judge = new Judge();
		$judge->firstName = 'Kalmer';
		$judge->lastName = 'Piiskop';
		$judge->phoneNumber = '5620 4556';
		$judge->emailAddress = 'kalmer@tennis24.ee';
		$judge->image = 'x_5182d4f7.jpg';
		$judge->width = 604;
		$judge->height = 453;
		$judges[] = $judge;
		
		$judge = new Judge();
		$judge->firstName = 'Kirsi';
		$judge->lastName = 'Raudsepp';
		$judge->phoneNumber = '5620 3394';
		$judge->emailAddress = 'kirsi.raudsepp@hot.ee';
		$judge->image = '';
		$judge->width = 604;
		$judge->height = 453;
		$judges[] = $judge;
		
		$judge = new Judge();
		$judge->firstName = 'Aleksander';
		$judge->lastName = 'Jürgens';
		$judge->phoneNumber = '527 4146';
		$judge->emailAddress = 'aleksander@tennis.ee';
		$judge->image = 'jürgens.png';
		$judge->width = 173;
		$judge->height = 18;
		$judges[] = $judge;
		
		$judge = new Judge();
		$judge->firstName = 'Taavi';
		$judge->lastName = 'Palu';
		$judge->phoneNumber = '525 9991';
		$judge->emailAddress = 'palutaavi@hotmail.com';
		$judge->image = '089f0f5c48ca9daa09fb6ceecdf3bf87efb82c027.jpg';
		$judge->width = 800;
		$judge->height = 533;
		$judges[] = $judge;
		
		return $judges;
	}
}
