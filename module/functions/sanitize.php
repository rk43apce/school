<?php

require_once '../core/init.php';

function escape($string) {
    return htmlentities( trim($string), ENT_QUOTES, 'UTF-8');
}