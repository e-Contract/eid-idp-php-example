<?php

session_start();

function base64url_decode($data) {
    return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
}

header('Content-Type: image/jpeg');
echo base64url_decode($_SESSION["photo"]);
