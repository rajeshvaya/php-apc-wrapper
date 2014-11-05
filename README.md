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
	$apc->store('USER_XXX', 'INACTIVE');

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
