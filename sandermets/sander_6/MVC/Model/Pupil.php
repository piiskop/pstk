<?php

namespace MVC\Model;

/**
 * Model of Pupil
 *
 * @author sander
 */
class Pupil
{

    /**
     *
     * @var int
     */
    private $id;

    /**
     *
     * @var string 
     */
    private $name;

    /**
     *
     * @var bool 
     */
    private $coder;

    /**
     * 
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * 
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * 
     * @return bool
     */
    public function getCoder()
    {
        return $this->coder;
    }

    /**
     * 
     * @param int $id
     * @return \mvc\model\Pupil
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * 
     * @param string $name
     * @return \mvc\model\Pupil
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * 
     * @param bool $coder
     * @return \mvc\model\Pupil
     */
    public function setCoder($coder)
    {
        $this->coder = $coder;
        return $this;
    }

}
