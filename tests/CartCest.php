<?php
class CartCest
{    
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->wait(2);
    }

    public function buySuccessfully(AcceptanceTester $I)
    {
        $I->see('Store information');
    }
}