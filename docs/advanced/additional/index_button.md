# Additional Index Button

This is not add action button in grid data, instead of add more button on top of grid table data. If you want to add more index button with your custom action, you can use this method

```php
public function cbInit() {
// ...

$this->addIndexActionButton("Export", url("download"), "fa fa-download", ButtonColor::class);

}
```

To use `ButtonColor`, you have to `use` the `ButtonColor` class at the top of class 
```php
use crocodicstudio\crudbooster\controllers\partials\ButtonColor;
```