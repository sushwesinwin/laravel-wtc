<?php

function stringLimit($string, $length) {
    if(strlen($string) > $length) {
        return substr($string, 0, $length) . '...';
    }
    return $string;
}
