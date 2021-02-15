# Field: Checkbox
This type of field is to make a checkbox button

```php
public function cbInit() {
    // ...

    // Using fruits column
    $this->addCheckbox("Fruits","fruits")->options([
        "apple"  => "Apple",
        "mango" => "Mango",
        "cucumber"  => "Cucumber"
    ]);
}
```

Please make sure the field column has enough of field length to save the option string.
The saved value will be **"apple; mango; cucumber"**.