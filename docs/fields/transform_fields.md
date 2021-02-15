# Transform Fields
Transform fields enable you to modify the display of field, instead from table column.

```php
public function cbInit() {
    // ...
    // To modify the display on grid table
    $this->addText("Name","first_name")->indexDisplayTransform(function($row) {
        return $row->first_name." ".$row->last_name;
    });

    // To modify the display on detail page
    $this->addText("Name","first_name")->detailDisplayTransform(function($row) {
        return $row->first_name." ".$row->last_name;
    });
    // ...
}
```