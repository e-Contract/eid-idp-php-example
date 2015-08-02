<?php

session_start();

$openIdAttributes = $_SESSION["openid.attributes"];
echo '<pre>';
echo print_r($openIdAttributes, true);
echo '</pre>';
