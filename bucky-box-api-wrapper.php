<?php

require_once 'bucky-box-api-wrapper-base.php';

/*
 * Bucky Box API v1.0 PHP
 * More information: api.buckybox.com/docs/v1
 *
 * Each method returns array(statusCode, response)
 */
  

class BuckyBoxApiWrapper {

    static $api_base_url = 'https://api.buckybox.com/v1/';

    function __construct($key, $secret) {
        $this->api_key = $key;
        $this->api_secret = $secret;
    }

    public function boxes() {
       return new Boxes($this->api_key, $this->api_secret);
    }

    public function customers() {
       return new Customers($this->api_key, $this->api_secret);
    }

    public function deliveries() {
       return new Deliveries($this->api_key, $this->api_secret);
    }

    public function deliveryServices() {
       return new DeliveryServices($this->api_key, $this->api_secret);
    }

    public function orders() {
       return new Orders($this->api_key, $this->api_secret);
    }

    public function webstore() {
       return new Webstore($this->api_key, $this->api_secret);
    }
    
}


class Boxes extends BuckyBoxApiBase {

    public function all() {
        $url = $this->getFullUrl('boxes');
        return $this->getHelper($url);
    }

    public function id($id) {
        $url = $this->getFullUrl('boxes/'.$id);
        return $this->getHelper($url);
    }

}

class Customers extends BuckyBoxApiBase {

    public function all() {
        $url = $this->getFullUrl('customers');
        return $this->getHelper($url);
    }
    public function id($id) {
        $url = $this->getFullUrl('customers/'.$id);
        return $this->getHelper($url);
    }
    public function create($params) {
        // TODO: use array params instead of JSON
        $url = $this->getFullUrl('customers');
        $this->curl = new BuckyBoxCurl($this->api_key, $this->api_secret);
        return $this->curl->post($params, $url);
    }
    public function update($params, $id) {
    // TODO: use array params instead of JSON
    $url = $this->getFullUrl('customers/'.$id);
    $this->curl = new BuckyBoxCurl($this->api_key, $this->api_secret);
    return $this->curl->post($params, $url);
    }

    public function signIn($params) { 
    // TODO: POST /v1/customers/sign_in
    }
   
}

class Deliveries extends BuckyBoxApiBase {

    public function packingCsv($date){
        $url = $this->getFullUrl('deliveries?date='.$date.'&screen=packing');
        return $this->getHelper($url);
    }

    public function deliveryServicesCsv($date){
        $url = $this->getFullUrl('deliveries?date='.$date.'&screen=delivery');
        return $this->getHelper($url);
    }

    public function pendingDates() {
        $url = $this->getFullUrl('deliveries/pending');
        return $this->getHelper($url);
    }

}

class DeliveryServices extends BuckyBoxApiBase {

    public function all() {
        $url = $this->getFullUrl('delivery_services');
        return $this->getHelper($url);
    }

    public function id($id) {
        $url = $this->getFullUrl('delivery_services/'.$id);
        return $this->getHelper($url);
    }

}

class Orders extends BuckyBoxApiBase {
    
    public function all() {
        $url = $this->getFullUrl('orders');
        return $this->getHelper($url);
    }

    public function id($id) {
        $url = $this->getFullUrl('orders/'.$id);
        return $this->getHelper($url);
    }

    public function create($params){
        // TODO: use array params instead of JSON
        // not fully documented, ask Ced
        $url = $this->getFullUrl('orders');
        $this->curl = new BuckyBoxCurl($this->api_key, $this->api_secret);
        return $this->curl->post($params, $url);
    }

}

class Webstore extends BuckyBoxApiBase {

    public function all() {
        $url = $this->getFullUrl('webstore');
        return $this->getHelper($url);
    }

}

?>