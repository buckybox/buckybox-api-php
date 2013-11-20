<?php
  /*
   * Bucky Box Distributor API v0.0 PHP
   * More information: api.buckybox.com/docs/v0.0
   *
   * $data is an associative array of key/pair values or a JSON string
   */
  

  class Bucky_Box_Distributor_Api_Settings{
    static $key = "";
    static $secret = "";
    static $url = "https://api.buckybox.com/v0/";
  }

  class Bucky_Box_Distributor_Api{
    protected $customers, $delivery_services, $orders, $boxes;

    public function customers(){
       $customers = new Customers();
       return $customers;
    }
     
     function delivery_services(){
       $delivery_services = new Delivery_Services();
       return $delivery_services;
    }

    function orders(){
       $orders = new Orders();
       return $orders;
    }

    function boxes(){
       $boxes = new Boxes();
       return $boxes;
    }
  }

  class Customers{

    public function all($data = []){
      $ch = CurlFactory::Instance()->curl;
      $url = sprintf("%s?%s", Bucky_Box_Distributor_Api_Settings::$url."customers", http_build_query($data));
      curl_setopt($ch, CURLOPT_URL, $url);  
      $result = curl_exec($ch);
      curl_close($ch);
      return $result;
    }
    public function find($id, $data = []){
      $ch = CurlFactory::Instance()->curl;
      $url = sprintf("%s?%s", Bucky_Box_Distributor_Api_Settings::$url."customers/".$id, http_build_query($data));
      curl_setopt($ch, CURLOPT_URL, $url);  
      $result = curl_exec($ch);
      curl_close($ch);
      return $result;
    }
    public function findByEmail($data = []){
      return $this->all($data);
    }
    public function create($data = []){
      $ch = CurlFactory::Instance()->curl;
      $url = Bucky_Box_Distributor_Api_Settings::$url."customers/";
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
      curl_setopt($ch, CURLOPT_URL, $url);  
      $result = curl_exec($ch);
      curl_close($ch);
      return $result;
    }
  }

  class Delivery_Services{
    public function all($data = []){
      $ch = CurlFactory::Instance()->curl;
      $url = sprintf("%s?%s", Bucky_Box_Distributor_Api_Settings::$url."delivery_services", http_build_query($data));
      curl_setopt($ch, CURLOPT_URL, $url);  
      $result = curl_exec($ch);
      curl_close($ch);
      return $result;
    }
  }

  class Orders{
    public function all($data = []){
      $ch = CurlFactory::Instance()->curl;
      $url = sprintf("%s?%s", Bucky_Box_Distributor_Api_Settings::$url."orders", http_build_query($data));
      curl_setopt($ch, CURLOPT_URL, $url);  
      $result = curl_exec($ch);
      curl_close($ch);
      return $result;
    }
    public function find($id){
      $ch = CurlFactory::Instance()->curl;
      $url = sprintf("%s?%s", Bucky_Box_Distributor_Api_Settings::$url."orders/".$id, http_build_query($data));
      curl_setopt($ch, CURLOPT_URL, $url);  
      $result = curl_exec($ch);
      curl_close($ch);
      return $result;
    }
    public function create($data){
      $ch = CurlFactory::Instance()->curl;
      $url = Bucky_Box_Distributor_Api_Settings::$url."orders/";
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
      curl_setopt($ch, CURLOPT_URL, $url);  
      $result = curl_exec($ch);
      curl_close($ch);
      return $result;
    }
  }

  class Boxes{
    public function all($data = []){
      $ch = CurlFactory::Instance()->curl;
      $url = sprintf("%s?%s", Bucky_Box_Distributor_Api_Settings::$url."boxes", http_build_query($data));
      curl_setopt($ch, CURLOPT_URL, $url);  
      $result = curl_exec($ch);
      curl_close($ch);
      return $result;
    }

    public function find($id, $data = []){
      $ch = CurlFactory::Instance()->curl;
      $url = sprintf("%s?%s", Bucky_Box_Distributor_Api_Settings::$url."boxes/".$id, http_build_query($data));
      curl_setopt($ch, CURLOPT_URL, $url);  
      $result = curl_exec($ch);
      curl_close($ch);
      return $result;
    }
  }

final class CurlFactory
{
    public $curl;
    /**
     * Call this method to get singleton
     * @return CurlFactory
     */
    public static function Instance()
    {
      static $inst = null;
      if ($inst === null) {
        $inst = new CurlFactory();
      }
      return $inst;
    }
    private function __construct()
    {
      $this->curl = curl_init();
      curl_setopt($this->curl, CURLOPT_HTTPHEADER, array(
        'API-Key: '.Bucky_Box_Distributor_Api_Settings::$key,
        'API-Secret: '.Bucky_Box_Distributor_Api_Settings::$secret
      ));
      curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
  
    }
}
?>