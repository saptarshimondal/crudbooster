# Javascript & Style CSS

If you want to add your own javascript and style css.

```php
public function cbInit() {
    // ...

    $this->javascript(function() {
        return "
            function showModal() {
                $('#modal-dummy').modal('show');
            }
            ";
    });

    $this->style(function() {
        return "
            .dummy_class {
                font-weight:bold;
                size: 20px;
            }
            ";
    });

}
```