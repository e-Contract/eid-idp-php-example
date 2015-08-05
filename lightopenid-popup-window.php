<?php

session_start();

include "lightopenid/openid.php";
// change 'localhost' in the next line to the actual name of your server
$openid = new LightOpenID('localhost');
if ($openid->mode) {
    if ($openid->validate()) {
        $_SESSION["openid.attributes"] = $openid->getAttributes();
        ?>
        <script type="text/javascript">
            function onMessage(event) {
                console.log("onMessage");
                // for firefox, we backfire on the ping event
                event.source.postMessage("done", event.origin);
            }
            window.addEventListener("message", onMessage, true);

            // next works in chrome, not firefox
            window.opener.postMessage("done", '*');
        </script>
        <?php

    }
} else {
    $openid->identity = 'https://www.e-contract.be/eid-idp/endpoints/openid/auth-ident';
    $openid->required = array('namePerson/first', 'namePerson/last',
        'namePerson', 'person/gender', 'contact/postalCode/home',
        'contact/postalAddress/home', 'contact/city/home', 'eid/nationality',
        'eid/pob', 'birthDate', 'eid/card-number', 'eid/card-validity/begin',
        'eid/card-validity/end');
    $openid->lang = 'fr';
    header('Location: ' . $openid->authUrl());
}
