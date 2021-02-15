# Mail

This helper is to sending email with very simple way

```php
// Include this bellow script line on top of class
use crocodicstudio\crudbooster\helpers\MailHelper;

// Send mail script
$mail = new MailHelper();

// First param is for send mail address, second param is for sender name
$mail->sender("ferry@example.com", "Ferry");

$mail->to("john@example.com");
$mail->subject("Welcome to CRUDBooster");
$mail->content("Hi, thank you for joining CRUDBooster!, enjoy it");

// If you want to attach the file, add this bellow method
$mail->addAttachment("http://yourdomain/file.pdf");

// Send email
$mail->send();
```