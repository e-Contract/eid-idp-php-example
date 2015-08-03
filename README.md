# eID Identity Provider PHP Examples

This project contains some PHP examples on how to integrate with eID Identity Provider using OpenID.
We also provided an example that uses a pop-up window.

This project is using the LightOpenID PHP library.
This library is available at: https://code.google.com/p/lightopenid/

The example code has been tested against both eID Identity Provider v1 and v2.

Important notice for production usage: change `localhost` in the code:
```
$openid = new LightOpenID('localhost');
```
to the actual DNS-name of your server.


## Web browsers

The pop-up example has been tested against the following web browsers:
* Firefox 39 (Linux/Windows/Mac)
* Google Chrome 44 (Linux/Windows/Mac)
* Internet Explorer 11
* Safari 8
* Opera 30
