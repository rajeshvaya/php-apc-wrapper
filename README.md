# APC Wrapper

## Usage
```php
<?php

//include the class
require_once 'apc.class.php';

//new APC object
$apc = new Apc();

//check if APC module is available
if($apc->is_available()){
	// to store data in apc
	$apc->store('USER_123', array(
		'name'=>'Rajesh', 
		'email'=>'rajesh@example.com', 
		'created' => '1987-06-08 13:20:00'
	));
	
	//to store data in apc with auto expiry (in seconds)
	$apc->store('USER_XXX', 'INACTIVE', 300);

	//to fetch data from apc
	$data = $apc->get('USER_123');

	//to check if data is present in apc
	$if_exists = $apc->exists('USER_123');

	//to clear APC by key 
	$apc->clear('USER_123');

	//to clear entire APC cache;
	$apc->clear();
}
?>
```


## APC status

Open apc.status.php in the browser

![https://raw.githubusercontent.com/rajeshvaya/php-apc-wrapper/master/apc.status.png](https://raw.githubusercontent.com/rajeshvaya/php-apc-wrapper/master/apc.status.png "APC STATUS")



## License

The MIT License (MIT)

Copyright (c) 2014 Rajesh Vaya <<vaya.rajesh@gmail.com>>

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
