<?php

class SeleniumBase extends PHPUnit_Extensions_Selenium2TestCase{

  const TEST_USER = 'pc8lo3xf';
  const SPIKE_TITLE = '';

  private $enduser = array();

  public function setUp(){
    parent::setUp();
    $this->setHost('192.168.1.147'); //Selenium Server Host
    //$this->setHost('127.0.0.1');
    $this->setPort(4444);
    $this->setEnduser();
  }

  public function tearDown(){
    parent::tearDown();
  }

  public function getEnduser($key=null){
    if(is_null($key)){
      return $this->enduser;
    } else {
      return $this->enduser[$key];
    }
  }

  public function setEnduser(){
    //todo API
    $this->enduser['email'] = 'lab@metaps.com';
    $this->enduser['password'] = 'asdf';
  }

  /**
   * APIでログインする
   */
  protected function useAPILogin(){
  }

  /**
   * Formからログインする
   */
  protected function useFormLogin($email,$password){
    $this->url("/");
    $this->byLinkText("ログイン")->click();
  
    $this->setFormValue(array
      (
        array ('method'=>'byId','element'=>'f_login_id','value'=>$email),
        array ('method'=>'byId','element'=>'f_lgoin_password','value'=>$password)
      )
    );
    $this->byXPath("//input[@value='ログイン']")->click();
  }

  /**
   * ダッシュボード取得
   */
  protected function getDashBord(){
  
  }
  
  /**
   * フロントbody取得
   */
  protected function getFrontBody(){
  
  }

  /**
   * nav 取得
   */
  protected function getFrontNav(){
  
  }

  /**
   * フッター取得
   */
  protected function getFooter(){
  
  }

  /**
   * Formに値のセット 複数の要素に対応
   * @param array $setMap <br>
   * array(array('method' => byId,byCssSelector,byClassName,byXPath <br>
   *    'element' => element value <br>
   *    'value' => values))
   */
  protected function setFormValue($setMap){
    try{
      foreach($setMap as $val){
        $this->$val['method']($val['element'])->value($val['value']); 
      }
    }catch(\Exception $e){
      echo $e->toString();
    }
  }

  /**
   * 要素のテキストを取得  複数の要素に対応
   * @param array $setMap <br>
   * array(array('method' => byId,byCssSelector,byClassName,byXPath <br>
   *    'element' => element value <br>
   *    'value' => values))
   */
  protected function getElementText($setMap){
    try{
    
    }catch(\Exception $e){
    
    }
  }
}
