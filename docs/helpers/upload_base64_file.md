# Upload Base64

This helper is to upload the base64 data to file.

```php
// For example set the filename to "dummyfile.jpg", then second parameter fill the base64 value
$file = cb()->uploadBase64("dummyfile.jpg", "[content_base64]"); // return example = uploads/2019/01/{encrypted_filename}.png

// Disable encryption, set false to third parameter
$file = cb()->uploadBase64("dummyfile.jpg", "[content_base64]", false);

// Resize width of image file if the file is image, for example resize width to 350px
$image = cb()->uploadBase64("dummyfile.jpg", "[content_base64]", true, 350);

// Resize width and height of image file, for example resize to 350 x 350 px
$image = cb()->uploadBase64("dummyfile.jpg", "[content_base64]", true, 350, 350);
```