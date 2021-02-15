# Field Display Control
This is for control the display of the fields

```php
public function cbInit() {
    // ...

    // Disable display on index
    $this->addText("First Name")->showIndex(false);

    // Disable display on edit
    $this->addText("First Name")->showEdit(false);

    // Disable display on add
    $this->addText("First Name")->showAdd(false);

    // Disable display on detail
    $this->addText("First Name")->showDetail(false);

    // You may combine all
    $this->addText("First Name")->showIndex(false)->showAdd(true)->showEdit(true)->showDetail(false);

}
```

Remember the value of option is boolean **TRUE** to display on, and **FALSE** to display off