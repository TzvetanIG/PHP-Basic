<?php
$input = (object)[2, 34];
if(is_numeric($input)) {
    var_dump($input);
} else {
    echo gettype($input);
}