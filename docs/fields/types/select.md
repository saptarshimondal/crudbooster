# Field: Select
This type of field is to make a select box

```php
public function cbInit() {
    // ...

    // Using addSelectTable to make a select from table
    $this->addSelectTable("City","cities_id",[
                "table"         => "cities",
                "value_option"  => "id",
                "display_option" => "name",
                "sql_condition" => null
            ]);

    // Using sql_condition to make a condition
    $this->addSelectTable("City","cities_id",[
                "table"         => "cities",
                "value_option"  => "id",
                "display_option" => "name",
                "sql_condition" => "name != 'Jakarta'"
            ]);

    // If you want to select with graded select for example bellow
    $this->addSelectTable("Province","provinces_id",[
                "table"         => "provinces",
                "value_option"  => "id",
                "display_option" => "name",
                "sql_condition" => null
            ]);
    $this->addSelectTable("City","cities_id",[
                "table"         => "cities",
                "value_option"  => "id",
                "display_option" => "name",
                "sql_condition" => null
            ])->foreignKey("provinces_id"); // Add foreignKey() fill with parent name
}
```

You can also make a select box from your defined array. Use `addSelectOption`
```php
public function cbInit() {
    // ...

    // Using addSelectOption to make a select from defined array
    $this->addSelectOption("Fruit","fruit_name",[
            "apple" => "Apple",
            "mango" => "Mango"
        ]);
}
```