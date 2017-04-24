<?php
include "lightopenid/openid.php";
// change 'localhost' in the next line to the actual name of your server
$openid = new LightOpenID('localhost');
if ($openid->mode) {
    if ($openid->validate()) {
        session_start();
        $_SESSION["photo"] = $openid->getAttributes()["eid/photo"];
        echo '<pre>';
        echo print_r($openid->getAttributes(), true);
        ?>
        </pre>
        <img src="photo.php"/>
        <br/>
        <a href="./">Back</a>
        <?php
    } else {
        echo 'Login failed.';
    }
} else {
    $openid->identity = 'https://www.e-contract.be/eid-idp/endpoints/openid/auth-ident';
    $openid->required = array('namePerson/first', 'namePerson/last',
        'namePerson', 'person/gender', 'contact/postalCode/home',
        'contact/postalAddress/home', 'contact/city/home', 'eid/nationality',
        'eid/pob', 'birthDate', 'eid/card-number', 'eid/card-validity/begin',
        'eid/card-validity/end', 'eid/photo');
    $openid->lang = 'nl';
    header('Location: ' . $openid->authUrl());
}
