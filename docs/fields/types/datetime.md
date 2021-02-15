# Field: Date & Time
This type of field is to make an input date & time

```php
public function cbInit() {
    // ...

    // Using registration_open_at column
    $this->addDateTime("Registration Open At","registration_open_at");

    // Change date default format Y-m-d H:i:s to d/m/Y H:i:s
    $this->addDateTime("Registration Open At","registration_open_at")->format("d/m/Y H:i:s");

}
```

For more date format you can [check here](https://www.php.net/manual/en/function.date.php). 