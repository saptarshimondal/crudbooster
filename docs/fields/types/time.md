# Field: Time
This type of field is to make an input time

```php
public function cbInit() {
    // ...

    // Using check_in_at column
    $this->addTime("Check In","check_in_at");

}
```