# eID Identity Provider PHP Examples

This project contains some PHP examples on how to integrate with eID Identity Provider using OpenID.
We also provided an example that uses a pop-up window.

This project is using a patched version (added i18n support) of the LightOpenID PHP library.
The original library is available at: https://code.google.com/p/lightopenid/

The example code has been tested against both eID Identity Provider v1 and v2.


## iframe

Please notice that the usage of an `iframe` for integrating the eID Identity Provider should be avoided,
as the security policy implemented by modern web browsers is getting more strict.
Also, the eID Chrome solution, which has been integrated within eID Identity Provider v2,
cannot operate from within an `iframe`.


## Language selection

The language to be used by the eID Identity Provider can be configured via:
```
$openid->lang = 'nl';
```


## Production Usage

Important notice for production usage: change `localhost` in the code:
```
$openid = new LightOpenID('localhost');
```
to the actual DNS-name of your server.


## Supported Web browsers

The pop-up example has been tested against the following web browsers:
* Firefox 39 (Linux/Windows/Mac)
* Google Chrome 44 (Linux/Windows/Mac)
* Internet Explorer 11
* Safari 8
* Opera 30
