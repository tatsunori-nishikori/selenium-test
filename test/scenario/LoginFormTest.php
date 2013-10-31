<?php

class LoginFormTest extends SeleniumBase{
    /**
     * Setup
     */
    public function setUp()
    {
        $this->setBrowser('firefox');
        $this->setBrowserUrl('https://tatsunori_nishikori.d.spike.cc/');
    }
    
    /** 
     * Method testSpikeLogin 
     * @test 
     */ 
    public function testSpikeLogin()
    {
        $this->url("/");
        $this->byLinkText("ログイン")->click();
        $this->byId("f_login_id")->value("lab@metaps.com");
        $this->byId("f_lgoin_password")->value("asdf");
        $this->byXPath("//input[@value='ログイン']")->click();
        $this->byLinkText("Spike Platform")->click();
        $this->byCssSelector("a.btn-logout > div")->click();
    }
}
