# MMMR Project

I created this API following the requirements. In order to test you can use the index.php file, 
and modify the JSON (string in this case, could have been an array through json_encode, but this shows support for strings).

When the index.php file is run, it sends a request to the api/mmmr.php, there you will notice a .htaccess file
which remove the .php extension. The mmmr.php then checks if its a POST request, if so the Calculate class is then called, and the JSON is passed.
