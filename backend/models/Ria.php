<?php
namespace backend\models;

use Yii;

class Ria
{
    protected $key= 'GYkHHyMFSx3o0S3bAUcsAHDSAGrJ4U60jTVSaNYn';
    protected $throwErrors = FALSE;
    protected $type = 'GET';
    protected $format = 'array';
    
    function __construct($key = 'GYkHHyMFSx3o0S3bAUcsAHDSAGrJ4U60jTVSaNYn',  $type = 'GET', $throwErrors = FALSE) {
		$this->throwErrors = $throwErrors;
		return $this	
			->setKey($key)
			->setType($type);
	}
        
       function setKey($key) {
		$this->key = $key;
		return $this;
	}
	function getKey() {
		return $this->key;
	}
	function setType($type) {
		$this->type = $type;
		return $this;
	}
	function getType() {
		return $this->type;
	} 
        
        private function prepare($data) {
		//Returns array
		if ($this->format == 'array') {
			$result = is_array($data) ? $data : json_decode($data);
			
			//if ($this->throwErrors AND $result['errors'])
				//throw new \Exception(is_array($result['errors']) ? implode("\n", $result['errors']) : $result['errors']);
			return $result;
		}
		// Returns json or xml document
		return $data;
	}
        private function request($type = 'GET', $model = 'marks', $param = ''){
$curl = curl_init();
$crl = [
  CURLOPT_URL => 'https://developers.ria.com/auto'.$model.'?api_key='.$this->key,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
 CURLOPT_CUSTOMREQUEST => $type,
  CURLOPT_POSTFIELDS => json_encode($param),
  CURLOPT_HTTPHEADER => [
  // "Authorization: Bearer ".$this->bearer,
    "Cache-Control: no-cache",
    "Content-Type: application/json"
  ]
];
curl_setopt_array($curl, $crl);

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
  return $this->prepare($err);
} else {
  return $this->prepare($response);
}
}
/**
 * Тип транспорта
 * @return type
 */
 public function getCategories(){
     $model = '/categories/';
    return $this->request('GET', $model);
 }
 /**
  * Марки авто
  * @param type $category
  * @return type
  */
 public function getMarks($category = 1){
            $model = '/categories/'.$category.'/marks';
	  return $this->request('GET', $model);
 }
 /**
  * Модели авто
  * @param type $param
  * @return boolean
  */
  public function getModels($param = []){
      if(count($param)){
        if(!$param['category']){ $category = 1;}else{$category =  (int)$param['category'];}
        if(!$param['marks']){ $marks = 1; }else{ $marks = (int)$param['marks'];}
            $model = '/categories/'.$category.'/marks/'.$marks.'/models';
      return $this->request('GET', $model);
      }else{
          return false;
      }
 }
 /**
  * Тип кузова
  * @param type $category
  * @return type
  */
 public function getBodystyles($category = 1){
            $model = '/categories/'.$category.'/bodystyles';
	  return $this->request('GET', $model);
 }
 /**
  * Область продажи
  * @return type
  */
public function getStates(){
     $model = '/states';
    return $this->request('GET', $model);
 } 
 /**
  * Город продажи
  * @param type $states
  * @return type
  */
  public function getCities($states = 10){
            $model = '/states/'.$states.'/cities';
	  return $this->request('GET', $model);
 }
 /**
  * Тип привода
  * @param type $category
  * @return type
  */
  public function getDriverTypes($category = 1){
            $model = '/categories/'.$category.'/driverTypes';
	  return $this->request('GET', $model);
 }
 /**
  * Тип топлива
  * @return type
  */
 public function getTypeOil(){
     $model = '/type';
    return $this->request('GET', $model);
 } 
 /**
  * Коробка передач
  * @param type $category
  * @return type
  */
  public function getGearboxes($category = 1){
            $model = '/categories/'.$category.'/gearboxes';
	  return $this->request('GET', $model);
 }
 /**
  * Опции авто
  * @param type $category
  * @return type
  */
   public function getOptions($category = 1){
            $model = '/categories/'.$category.'/options';
	  return $this->request('GET', $model);
 }
 /**
  * Цвета
  * @return type
  */
  public function getColors(){
     $model = '/colors';
    return $this->request('GET', $model);
 } 
 /**
  * Страна производитель
  * @return type
  */
   public function getCountries(){
     $model = '/countries';
    return $this->request('GET', $model);
 } 



}

