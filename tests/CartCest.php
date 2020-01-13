<?php
class CartCest
{    
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/');
    }

    public function buySuccessfully(AcceptanceTester $I)
    {
        // write a positive login test 
    }
}