<?php

namespace pupilsearch;

/**
 * @author Eleri Apsolon <eleri.apsolon@gmail.com>
 * Pupils model
 */
class Model
{

    /**
     *
     * @var integer
     */
    private $id;

    /**
     *
     * @var string 
     */
    private $firstName;

    /**
     *
     * @var string
     */
    private $lastName;

    /**
     *
     * @var boolean 
     */
    private $canCode;

    /**
     * 
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * 
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * 
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * 
     * @return boolean
     */
    public function getCanCode()
    {
        return $this->canCode;
    }

    /**
     * 
     * @param \pupilsearch\integer $id
     * @return \pupilsearch\Model
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * 
     * @param \pupilsearch\string $firstName
     * @return \pupilsearch\Model
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * 
     * @param \pupilsearch\string $lastName
     * @return \pupilsearch\Model
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * 
     * @param \pupilsearch\boolean $canCode
     * @return \pupilsearch\Model
     */
    public function setCanCode($canCode)
    {
        $this->canCode = $canCode;
        return $this;
    }

}
