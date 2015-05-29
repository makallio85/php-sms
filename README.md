# php-sms

PHP SMS class to send sms messages via gateway. Currently supports Nexmo only.

### Todo:
 - Testing
 - Improve exeption handling

### Usage:

```php
$SMS = new \SMS\SMS('nexmo');
$SMS->setSender('Insert sender number or id here.')
    ->setReceiver('Insert receiver number here.')
    ->setMessage('Insert your test message here.')
    ->send();
$reponse = $SMS->getResponse();
```
