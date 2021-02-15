# Validation

To make input validation

```php
public function cbInit() {
    // ...

    $this->addText("First Name","first_name")->validation("required|string");

}
```