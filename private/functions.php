<?php
if(!function_exists('r2')) 
{
    function r2($text) 
    {
        echo '<pre>' . print_r($text, true) . '</pre>';
    }
}
?>