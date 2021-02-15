# Field: Hidden

This type of field is to make an input hidden

```php
public function cbInit() {
    // ...

    // Using the "foo" column
    $this->addHidden("Foo","foo")->defaultValue("Bar");

}
```