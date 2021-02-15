# Google FCM Push

We're very often using the Google FCM Push. To support it, CRUDBooster has a helper to do pushing fcm very simple way.

First, you have to set Google FCM Server Key at `/config/crudbooster.php` on key "GOOGLE_FCM_SERVER_KEY". 

Learn more about Google FCM Server Key [click here](https://developer.clevertap.com/docs/find-your-fcm-sender-id-fcm-server-api-key#)

```php
// Include this bellow script on top of class
use crocodicstudio\crudbooster\helpers\FCM;

// Send FCM Script
$fcm_response = FCM::title("Message")
    ->message("Thank you")
    ->data(["var"=>1,"var2"=>2]) // If you want to add additional data add this method
    ->tokenAndroid(["token1","token2"]) // Set this method with android tokens
    ->tokenIOS(["token1","token2"]) // Set this method with iOS tokens
    ->send(); // Call this method whenever completed
```