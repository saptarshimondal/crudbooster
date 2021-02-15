# Field: Upload Image
This type of field is to make an input upload image

```php
public function cbInit() {
    // ...

    // Using photo column
    $this->addImage("Photo","photo");

    // Add encrypt filename
    $this->addImage("Photo","photo")->encrypt(true);

    // Disable encrypt filename
    $this->addImage("Photo","photo")->encrypt(false);

    // Resize Image width x height
    $this->addImage("Photo","photo")->resize(360, 240);

    // Resize image width only and height auto
    $this->addImage("Photo","photo")->resize(360);

}
```
This image type will be auto make an `<img>` tag on index display