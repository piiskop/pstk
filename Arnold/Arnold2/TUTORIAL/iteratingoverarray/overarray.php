<?php
//function find(array. value) {
//foreach ($arr as &$value) {
	//$value = $value
//}

////////////////////CLASS NAME///////////////////////////////////////////////////////////////////////
class obj{
	private $className="new menu";
	public function getClassName(){
		return $this->className;
	}
	public function setClassName($className){
	$this->className=$className;	
	}
	
	
}
$newObject= new obj();
function addClass($elem,$cls){
	 $a=explode(" ",$elem->getClassName());
	 //mixed array_search ( mixed $needle , array $haystack [, bool $strict = false ] )
	if(array_search($cls,$a,true)===false){
		$a[]=$cls;
	}
	$elem->setClassName(implode(" ",$a));
}
addClass($newObject, 'new'); // obj.className='open menu new'

addClass($newObject, 'open');  // no changes (class already exists)

addClass($newObject, 'me'); // obj.className='open menu new me'
echo "<pre>";
echo $newObject->getClassName($newObject);
echo "<pre>";
//////////////////////////////////////////////////////////////////////////////////////////////////
function camelize($str)
{
	$splitting = explode("-", $str);
	foreach ($splitting as $index => $value) {
		if ($index > 0) {
			$bigLetter = mb_strtoupper(substr($value, 0, 1), "UTF-8");
			$restPiece = substr($value, 1);
			$splitting[$index] = $bigLetter.$restPiece;
		}
	}
	return implode("", $splitting);
}

$i = camelize("background-color");
$j = camelize("list-style-image");
echo $i. "<br>";
echo $j;

