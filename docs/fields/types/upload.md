# Field: Upload File
This type of field is to make an input file

```php
public function cbInit() {
    // ...

    // Using document column
    $this->addFile("Document","document");

    // Add encrypt filename
    $this->addFile("Document","document")->encrypt(true);

    // Disable encrypt filename
    $this->addFile("Document","document")->encrypt(false);

}
```