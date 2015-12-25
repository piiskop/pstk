<?php
/**
 * @author = juri, Tambet
 * @$oh number|string
 * @$uh string
 * @$noh string
 * @echo $lause = midagi läks sassi
 * @echo midagi = Hello world!
 * @echo midagi = 5 kaks sõna
 * @echo $yes = 5Fornmat c:
 * @echo = see on midagi sellist:
 * @return = see oli huvitav programm !
 */
function midagi($oh, $uh, $noh){
	$lause=$oh+' '+$uh+' '+$noh;
	$nogo='Fornmat c:';
	$yes= $lause . $nogo;
	$veel="see on midagi sellist: <br />" ;
	if (mb_strlen($nogo) === mb_strlen($lause))
	{
		$yes = $nogo = $lause;
	}
	else if (mb_strlen($nogo) != mb_strlen($lause)) {
		echo "midagi läks sassi";
	}
	else { $nogo = $lause = $yes;}
	return $lause;
	
}
echo $lause; 
echo midagi('Hello', 'world', '!');
echo midagi(5, 'Kaks', 'sõna');
echo $yes('oh+', 'Fornmat c:');
echo $veel;
midagi("see oli", " huvitav", "programm !");
midagi("kena", " kala", " kasvab");
