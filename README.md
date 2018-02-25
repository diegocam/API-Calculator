# Calculator API Project

I created this API simply for testing and practice. It calculates the `Mean`, `Median`, `Mode`, `Range` of a given set of numbers.
 
In order to test, you can use the `index.php` file and modify the JSON (string in this case, could have been an array through json_encode, but this shows support for strings).

When the `index.php` file is executed, it sends a request to the `api/mmmr.php`, there you will notice a .htaccess file
which removes the .php extension. The mmmr.php then checks if its a POST request, if so the `Calculate` class is then called, and the JSON is passed.


Sample JSON Request
```
POST {base_URL}/api/process.php

  Request body:
  {
    'numbers': [1,23,2,3,4]
  }
```
Sample JSON Response
```
{
    "results": {
        "mean": 6.6,
        "median": 3,
        "mode": 1,
        "range": 22
    }
}
```