# Field: WYSIWYG
This type of field is to make a WYSIWYG Rich Text Editor

By default, CRUDBooster use [Summernote](https://summernote.org/) plugin for this WYSIWYG

```php
public function cbInit() {
    // ...

    // Using content column
    $this->addWysiwyg("Content","content");

    // Limit characters on index display
    $this->addWysiwyg("Content","content")->strLimit(100);

}
```