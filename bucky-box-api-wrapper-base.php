<?php

/**
* Encapsulate some utility functions
*/
class BuckyBoxApiBase {

    function __construct($key, $secret) {
        $this->api_key = $key;
        $this->api_secret = $secret;
    }

    protected function getHelper($url) {
        $this->curl = new BuckyBoxCurl($this->api_key, $this->api_secret);
        return $this->curl->get($url);
    }

    protected function getFullUrl($url) {
        return BuckyBoxApiWrapper::$api_base_url . $url;
    }

}


class BuckyBoxCurl {

    function __construct($key, $secret) {
        $this->api_key = $key;
        $this->api_secret = $secret;
    }

    public function get($url) {
        $this->curl = curl_init($url); 
        $this->setBasicCurlOptions();
        $this->doCurlSession();
        return [ $this->result_status , json_decode($this->response) ];

    }

    public function post($params, $url) {
        d($params);
        $this->curl = curl_init($url); 
        $this->setBasicCurlOptions();
        
        curl_setopt($this->curl, CURLOPT_POST, true);
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, $params);

        $this->doCurlSession();
        return [ $this->result_status , json_decode($this->response) ];
    }
    
    protected function setBasicCurlOptions() {
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->curl, CURLOPT_USERAGENT, 'Bucky Box PHP API Wrapper');
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, [ 'API-Key: ' . $this->api_key, 'API-Secret: ' . $this->api_secret ]);
    }
    
    protected function doCurlSession() {
        $this->response = curl_exec($this->curl);
        $this->result_status = curl_getinfo($this->curl, CURLINFO_HTTP_CODE);
        curl_close($this->curl);
    }
    
}



?>