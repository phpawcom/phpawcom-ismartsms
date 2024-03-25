## IsmartSMS Library for Laravel
This basic library help you to send SMS via ismartsms.net (Oman)

## Installation:
```bash
composer require phpawcom/ismartsms
```

In your .env, add the following:
```dotenv
ISMARTSMS_USER_ID="Your ismartsms API username"
ISMARTSMS_PASSWORD="Your Password"
```


### publish config:
This is an optional step, not really needed if you are using .env for configuration 
```bash
php artisan vendor:publish --provider "S4D\Laravel\IsmartSMS\IsmartSMSProvider"
```

The S4D\Laravel\IsmartSMS\IsmartSMSProvider is auto-discovered and registered by default.
If you want to register it yourself, add the ServiceProvider in config/app.php:
```php
'providers' => [
    S4D\Laravel\IsmartSMS\IsmartSMSProvider::class,
]
```
For alias:
```php
'aliases' => [
    S4D\Laravel\IsmartSMS\IsmartSMS::class,
]
```

## Usage:
Example code:
```php
if(IsmartSMS::SendSMS('{8 digits phone number}', '{SMS Content}')){ 
    // TODO: SMS has been sent, some action here
}else{
    // TODO: SMS couldn't be sent, some action here
}
```

If you want to see the result of SMS gateway:
```php
print_r(IsmartSMS::getRawResults());
```
You can add setFlashSMS() if you want the SMS to disappear after reading:
```php
IsmartSMS::setFlashSMS()->SendSMS('{8 digits phone number}', '{SMS Content}')
```
