<?php
/*
  ? Metoda poprawiająca wizualne wyświetlanie danych. Zamiast tego wpiszcie w index.php zamiast "r2" - "print_r". Ta metoda jest o wiele przejżystsza.
*/
if(!function_exists('r2')) 
{
    function r2($text) 
    {
        echo '<pre>' . print_r($text, true) . '</pre>';
    }
}
?>