<?php
// for session variables
if (! isset($_SESSION)) {
	session_start();
}

// for localization
setlocale(LC_TIME, 'et_EE.UTF-8');
date_default_timezone_set('Europe/Tallinn');

// for seeing errors
ini_set('display_errors', 1);

if (defined('E_DEPRECATED')) {
	error_reporting(E_ALL & ~ E_DEPRECATED & ~ E_STRICT);
} else {
	error_reporting(E_ALL & ~ E_STRICT);
}

class User
{

    private $name = 'John';

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

}

$user = new User;
$user->setName('George');
echo $user->getName();

$user->setName(null);
echo '</br>' . $user->getName();

$variable = "Mina ja ainult mina";
echo '</br>' . $variable;
unset($variable);

class Menu
{
    private $width = 200;
    private $height = 300;
    private $title = "My menu";
    
    public function getWidth()
    {
        return $this->width;
    }
    
     public function getHeight()
    {
        return $this->height;
    }
    
     public function getTitle()
    {
        return $this->title;
    }
    
    public function setWidth($width)
    {
        $this->width = $width;
    }
    
    public function setHeight($height)
    {
        $this->height = $height;
    }
    
    public function setTitle($title)
    {
        $this->title = $title;
    }
}



$menu = new Menu;
function object($obj) {
    $obj->setWidth($obj->getWidth()*2);
    $obj->setHeight($obj->getHeight()*2);
    if (is_numeric($obj->getTitle())) {
        $obj->setTitle($obj->gettitle()*2);
    }
    else {
        echo '<br/>'."Title is a string you stupid! =)";
    }
}

object($menu);
echo ("<pre>");
echo var_dump($menu);
echo ("</pre>");