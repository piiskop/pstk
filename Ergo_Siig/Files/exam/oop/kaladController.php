<?php
/**
 * Klass Kala loomine
 * @author Ergo
 *
 */
class kala
{
	/**
	 * @access private
	 * @author Ergo
	 * @var string kala nimi
	 */
	private $nimi;
	/**
	 * @access private
	 * @author Ergo
	 * @var string kala sugukond
	 */
	private $sugukond;
	/**
	 * @access private
	 * @author Ergo
	 * @var string kala elukoht
	 */
	private $elukoht;	
	/**
	 * @access private
	 * @author Ergo
	 * @var string kala värv
	 */
	private $varv;
	
	/**
	 * kala nimie sättiaja
	 * 
	 * @access public
	 * @param string $nimi kala nimi
	 * @author Ergo
	 */
	public function setNimi($nimi)
	{
		$this->nimi = $nimi;
	}
	/**
	 * kala nimie sättiaja
	 *
	 * @access public
	 * @return string
	 * @author Ergo
	 */
	public function getNimi()
	{
		return $this->nimi;
	}
	/**
	 * kala nimie sättiaja
	 *
	 * @access public
	 * @param string $sugukond kala sugukond
	 * @author Ergo
	 */
	public function setSugukond($sugukond)
	{
		$this->sugukond = $sugukond;
	}	
	/**
	 * kala nimie pärija
	 *
	 * @access public
	 * @return string
	 * @author Ergo
	 */
	public function getSugukond()
	{
		return $this->sugukond;
	}

	/**
	 * kala elukoha sättiaja
	 *
	 * @access public
	 * @param string $elukoht kala elukoht
	 * @author Ergo
	 */
	public function setElukoht($elukoht)
	{
		$this->elukoht = $elukoht;
	}	

	/**
	 * kala elukoha pärija
	 *
	 * @access public
	 * @return string
	 * @author Ergo
	 */
	public function getElukoht()
	{
		return $this->elukoht;
	}
	/**
	 * kala värvi sättiaja
	 *
	 * @access public
	 * @param string $varv kala varv
	 * @author Ergo
	 */
	public function setVarv($varv)
	{
		$this->varv= $varv;
	}
	/**
	 * kala värvi sättiaja
	 *
	 * @access public
	 * @return string
	 * @author Ergo
	 */
	public function getVarv()
	{
		return $this->varv;
	}
	
}
