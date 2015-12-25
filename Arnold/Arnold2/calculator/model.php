<?php

namespace pstk;

/**
 * Deals with the main part-calculating
 * @author Eleri<eleri.apsolon@gmail.com>
 * @namespace pstk
 */
class Calculator
{

    /**
     * @access public
     * @author Eleri<eleri.apsolon@gmail.com>
     * @var number
     * variable, user input
     */
    private static $firstVariable = 0.0;

    /**
     * @access public
     * @author Eleri<eleri.apsolon@gmail.com>
     * @var number
     * variable, user input
     */
    private static $secondVariable = 0.0;

    /**
     * This function calculates the sum of 2 variables
     * @access public
     * @author Eleri<eleri.apsolon@gmail.com>
     * @return number result
     */
    public static function calculate()
    {
        
        if (isset($_GET['first'])) {
            Calculator::$firstVariable = filter_var($_GET['first'], FILTER_VALIDATE_FLOAT);
        } 

        if (isset($_GET['second'])) {
            Calculator::$secondVariable = filter_var($_GET['second'], FILTER_VALIDATE_FLOAT);
        }

        $result = Calculator::$firstVariable + Calculator::$secondVariable;
        return $result;
    }

    /**
     * @access public
     * @author Eleri<eleri.apsolon@gmail.com>
     * @return number
     */
    public static function getFirstVariable()
    {
        return Calculator::$firstVariable;
    }
    /**
     * @access public
     * @author Eleri<eleri.apsolon@gmail.com>
     * @return number
     */
    public static function getSecondVariable()
    {
        return Calculator::$secondVariable;
    }
}

