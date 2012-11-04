<?php

class JQuery_HeadHelper extends App_ViewHelper_Abstract
{
    const VERSION = '1.8.2';
    public function getJQueryUrl( $strCdn )
    {
        switch ( $strCdn )
        {
            case JQuery_Cdn::GOOGLE :
                return Sys_Mode::getScheme(). '://ajax.googleapis.com/ajax/libs/jquery/'
                        . self::VERSION . '/jquery.min.js';
            case JQuery_Cdn::MICROSOFT :
                return Sys_Mode::getScheme(). '://ajax.aspnetcdn.com/ajax/jquery/jquery-'
                        . self::VERSION . '.min.js';
            case JQuery_Cdn::JQUERY :
                return Sys_Mode::getScheme(). '://code.jquery.com/jquery-'
                        . self::VERSION . '.min.js';
            default:
                return $this->getView()->staticpath() . 'jquery/js/jquery-'
                    . self::VERSION . '.min.js';
        }
    }

    public function head( $strCdn = JQuery_Cdn::NONE )
    {
	$this->getView()->broker()->headScript()
                ->alias('jquery')
                ->prepend( $this->getJQueryUrl( $strCdn ) );
    }
}