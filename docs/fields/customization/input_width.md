# Input Width

To set the width of input.

```php
public function cbInit() {
    // ...

    // Width 4 is equivalent with bootstrap grid system col-sm-4
    // It means you can only set range of width is 1 ~ 12
    $this->addText("First Name","first_name")->inputWidth(4);

}
```