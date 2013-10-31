<?php

//class AddGoodsTest extends PHPUnit_Extensions_Selenium2TestCase{
require_once dirname(dirname(dirname(__FILE__))).'/SeleniumBase.php';
class AddGoodsTest extends SeleniumBase{


  /**
   * Setup
   */
  public function setUp(){
    parent::setUp();
    $this->setBrowser('firefox');
    $this->setBrowserUrl('https://tatsunori_nishikori.d.spike.cc/');
    $this->useFormLogin('lab@metaps.com','asdf');
  }


  public function tearDown(){
    parent::tearDown();
  }
  
  /** 
   * Method testAddGoods 
   * @test 
   */ 
  public function testAddGoods(){ 


    //商品を10個登録
    
    for($i = 0;$i < 10;$i++ ){
      $this->url("/items/");
      //title assertion 
      $this->byId("skip-uploading-large")->click();
      $this->setFormValue(array(
        array ('method'=>'byId','element'=>'goods_name','value'=>'商品 '.time()),
        array ('method'=>'byId','element'=>'price','value'=>1000+$i*10),
        array ('method'=>'byId','element'=>'description','value'=>'商品 Sample '.time())
      ));
      sleep(5);
      $this->byId("execute")->click();
      $message = $this->byId("alertMessage")->text();
      $this->assertEquals("更新が完了しました。",$message,$message);
      $this->byId("spike-modal-btn-ok")->click();
      sleep(5);
      //title assertion 
    }
  }

}
