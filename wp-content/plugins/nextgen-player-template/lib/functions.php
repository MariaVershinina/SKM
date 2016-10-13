<?php

if (!function_exists('camelize')) {

    /**
     * @param string $text
     * 
     * @return string
     */
    function camelize($text) {
        return str_replace(' ', '', ucwords(str_replace('_', ' ', $text)));
    }

}

if (!function_exists('underscore')) {

    /**
     * @param string $text
     * 
     * @return string
     */
    function underscore($text) {
        return strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', $text));
    }

}