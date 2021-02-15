# Field: Password

This type of field is to make an input password.

By default, the password input show on form only. Its value will be converted to Laravel Hash.

```php
public function cbInit() {
    // ...

    // Using the "password" column
    $this->addPassword("Password","password");

}
```