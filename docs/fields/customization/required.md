# Required

To make the input field to be required

```php
public function cbInit() {
    // ...

    // Set the input to be required
    $this->addText("First Name","first_name")->required(true);

    // Set the input to be non required
    $this->addText("First Name","first_name")->required(false);

}
```