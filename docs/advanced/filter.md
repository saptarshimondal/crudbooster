# Filter

You may add a filter to the input type. The filter will created automatically.

```php
public function cbInit() {
    // ...

    // This text input will have a filter. Enable the filter by set the value to True.
    $this->addText("First Name","first_name")->filterable(true);

}
```

!> **Notice** - The types that have filterable only :
**text**, **text_area**, **checkbox**, **radio**, **date**, **datetime**, **email**, **money**, **number**, **select_option**, **select_table**, **time**, **wysiwyg**