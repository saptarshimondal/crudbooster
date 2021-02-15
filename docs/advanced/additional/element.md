# Additional Element

You can add additional element top of index table, bottom of index table, top of detail page, bottom of detail page

```php
public function cbInit() {
    // ...

    // To add html top of index table, use this bellow method
    $this->setBeforeIndexTable("
                <p>Lorem ipsum dolor sit amet</p>
    ");
    // Or you can include view like example "element_before" view
    $this->setBeforeIndexTable(view("element_before")->render());

    // To add html bottom of index table, use this bellow method
    $this->setAfterIndexTable("
            <p>Lorem ipsum dolor sit amet</p>
    ");
    // Or you can include view like example "element_after" view
    $this->setAfterIndexTable(view("element_after")->render());

    // To add html top of detail page, use this bellow method
    $this->setBeforeDetailForm(function($row) {
            // $row contain detail object variable

            return "<p>Lorem ipsum dolor</p>";
    });

    // To add html bottom of detail page, use this bellow method
    $this->setAfterDetailForm(function($row) {
            // $row contain detail object variable

            return "<p>Lorem ipsum dolor</p>";
    });


}
```