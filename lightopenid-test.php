<?php
include "lightopenid/openid.php";
// change 'localhost' in the next line to the actual name of your server
$openid = new LightOpenID('localhost');
if ($openid->mode) {
        echo $openid->validate() ? 'Logged in.' : 'Failed';
        echo '<pre>';
        echo print_r($openid->getAttributes(), true);
        echo '</pre>';
	echo '<a href="./">Back</a>';
} else {
        $openid->identity = 'https://www.e-contract.be/eid-idp/endpoints/openid/auth-ident';
        $openid->required = array('namePerson/first', 'namePerson/last',
                'namePerson', 'person/gender', 'contact/postalCode/home',
                'contact/postalAddress/home', 'contact/city/home', 'eid/nationality',
                'eid/pob', 'birthDate', 'eid/card-number', 'eid/card-validity/begin',
                'eid/card-validity/end');
        header('Location: ' . $openid->authUrl());
}
?>
