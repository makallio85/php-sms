# php-sms

PHP SMS class to send sms messages via gateway. Currently supports Nexmo only.

### Usage:

- Set your credentials to config/Config.php
- Set debug mode to false, when ready
- Use code below

```php
$SMS = new \SMS\SMS('nexmo');
$SMS->setSender('Insert sender number or id here.')
    ->setReceiver('Insert receiver number here.')
    ->setMessage('Insert your test message here.')
    ->send();
$response = $SMS->getResponse();
```
