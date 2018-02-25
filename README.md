# Calculator API Project

I created this API simply for testing and practice. It calculates the `Mean`, `Median`, `Mode`, `Range` of a given set of numbers.
 
In order to test on your browser, you can use `index.php` by running `http://<base_url>/index.php`. This will create an API request using CURL, feel free to modify the `$json` passed for testing. 

For better testing use a client such as [Postman](https://www.getpostman.com/) to send POST requests to the API.

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