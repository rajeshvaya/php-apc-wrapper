<?php

class Apc{

    function __construct(){
        
    }
	
    /**
     * Check if APC is available to be used or PHP APC module is installed
     * @author Rajesh Vaya
     * @return boolean
     */
	function is_available(){
		//return false;
		return function_exists('apc_fetch');
	}
	
    /**
     * To store data on APC using a key
     * @param stgring $key 
     * @param string $value 
     * @param integer $ttl [defaults to 7 days]
     * @return boolean
     */
    function store($key, $value, $ttl=604800){
		if(!$this->is_available()) return false;
        $hashkey = $this->hash($key);
        return apc_store($hashkey, $value, $ttl);
    }

    /**
     * Check if the key value exists in APC already
     * @param  string $key 
     * @return boolean      
     */
    public function exists($key) {
		if(!$this->is_available()) return false;
        return ($this->get($key) !== FALSE) ? true : false;
    }

    /**
     * Get the value stored in APC
     * @param string $key 
     * @return mixed
     */
    function get($key){
		if(!$this->is_available()) return false;
        $hashkey = $this->hash($key);
        $data = apc_fetch($hashkey, $retval);
        return ($retval) ? $data : false;
    }

    /**
     * Clear the APC cache bucket or a specific key value
     * @param  string $key [optional]
     * @return boolean      
     */
    function clear($key=''){
		if(!$this->is_available()) return false;
        // If a key was specified then delete that key
        if ($key != '') {
            $hashkey = $this->hash($key);
            return apc_delete($hashkey);
        }else{
			apc_clear_cache();
			return apc_clear_cache('user');
		}
    }
	
    /**
     * Creates a hash out of the key to store in APC
     * @param  string $key 
     * @return string $hashkey      
     */
	protected function hash($key){
        $hashkey = $key . "_" . sha1($key);
        $hashkey = substr($hashkey, 0, 250);
        return $hashkey;
    }

}

?>
