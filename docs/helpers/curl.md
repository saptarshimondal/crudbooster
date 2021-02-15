# cURL

cURL is a way you can hit a URL from your code to get a HTML response from it. It's used for command line cURL from the PHP language. cURL is a library that lets you make HTTP requests in PHP

You can use this built in helper to help you make a request with cURL

```php
// Include this bellow script line on top of class
use crocodicstudio\crudbooster\helpers\CurlHelper;


public function getUserList() {
    //...

    // Make a GET request
    $url = "http://example.com/api/users/list";
    $req = new CurlHelper($url, "GET");
    $req->headers([
        "Accept"=>"application/json"
    ]);
    $response = $req->send();

    // Make a POST request
    $url = "http://example.com/api/users/update";
    $req = new CurlHelper($url, "POST");

    // If you want to set timeout manually
    $req->timeout(60);

    // If you want to set user agent manually
    $req->userAgent("My CURL");

    // If you want to activate the cookie
    $req->cookie(true);

    // If you want to set referer manually
    $req->referer("http://google.com");

    // Pass headers by using array object
    $req->headers([
        "Accept"=>"application/json"
    ]);
    $req->data([
        "id"=>1,
        "name"=>"John",
        "age"=>25
    ]);
    $response = $req->send();
}
        
```