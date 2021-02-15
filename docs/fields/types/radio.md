# Field: Radio
This type of field is to make a radio button

```php
public function cbInit() {
    // ...

    // Using gender column
    $this->addRadio("Gender","gender")->options([
        "male"  => "Male",
        "female" => "Female"
    ]);
}
```