# Field: Custom

This type of field is to make an input custom

```php
public function cbInit() {
    // ...

    // Custom field with raw html
    $this->addCustom("Custom Field")->setHtml(
                "<input type='text' class='form-control' name='foo'/>"
            );

    // Custom field with view render
    $this->addCustom("Custom Field")->setHtml(
                view("custom_field")->render()
            );

}
```

You may `setHtml` with raw html or from view

This field type can't show on the index display