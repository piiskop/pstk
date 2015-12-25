<?php

namespace pstk;

/**
 * Deals with visual part of calculator
 * @author Eleri<eleri.apsolon@gmail.com>
 * @namespace pstk
 */
class CalculatorView
{

    /**
     * This function builds the Calculator
     * @access public
     * @author Eleri<eleri.apsolon@gmail.com>
     * @param number $result tulemus(result)
     * @param number $first esimene kasutaja poolt sisestatud muutuja
     * @param number $second teine kasutaja poolt sisestatud muutuja
     */
    public static function build($result, $first, $second)
    {
        require_once 'HTML/Template/IT.php';
        $variable = new \HTML_Template_IT(ROOT_FOLDER);
        $variable->loadTemplateFile('tunnis.html');

        $variable->setCurrentBlock('html');
        $variable->setVariable(array(
            'SAMP' => $result,
            'FIRST-VALUE' => $first,
            'SECOND-VALUE' => $second,
            'BEGINNING-OF-URL' => BEGINNING_OF_URL
        ));
        $variable->parse('html');
        echo $variable->get('html');
    }

}
