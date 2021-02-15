# Additional Custom Input

If you want add custom input with form-group section, you can use this method.


```php
public function cbInit() {
    // ...

    // Add your custom input to first order for Add Form
    $this->prependAddForm(function() {
         return "
            <div class='form-group'>
                <label for=''>Foo Bar</label>
                <input type='text' name='foo_bar' required class='form-control'>
            </div>
            ";
    });

    // Add your custom input to last or append the last for Add Form
    $this->appendAddForm(function() {
        return "
            <div class='form-group'>
                <label for=''>Foo Bar</label>
                <input type='text' name='foo_bar' required class='form-control'>
            </div>
            ";
    });


    // Add your custom input to first order for Edit Form
    $this->prependEditForm(function($row) {
        return "
            <div class='form-group'>
                <label for=''>Foo Bar</label>
                <input type='text' name='foo_bar' value='".$row->foo_bar."' required class='form-control'>
            </div>
            ";
    });

    // Add your custom input to last or append the last for edit Form
    $this->appendEditForm(function($row) {
        return "
            <div class='form-group'>
                <label for=''>Foo Bar</label>
                <input type='text' name='foo_bar' value='".$row->foo_bar."' required class='form-control'>
            </div>
            ";
    });

}
```