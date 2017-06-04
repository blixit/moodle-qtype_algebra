<?php

/**
 * Utilitary class
 *
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author Blixit
 */
class Utils
{
    const DEFAULT_ = '39';
    const DANGER = '31';
    const SUCCESS = '32';
    const WARNING = '33';
    const INFOS = '34';

    public static function debug($text, $color=self::DEFAULT_){
        if(self::is_verbose())
            print "\n\e[".$color."m".$text."\e[0m";
    }

    public static function is_verbose(){
        return (
            in_array('-v', $_SERVER['argv'], true)
            || in_array('--verbose', $_SERVER['argv'], true)
        );
    }
}