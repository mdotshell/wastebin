<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('generateRandomString'))
{
    function generateRandomString($length = 7) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $random = '';
        for ($i = 0; $i < $length; $i++) {
            $random .= $characters[rand(0, $charactersLength - 1)];
        }
        return $random;
    }
}