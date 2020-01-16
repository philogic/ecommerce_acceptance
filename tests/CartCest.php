<?php
use Page\Acceptance\Cart;

class CartCest
{    
    public function _before(AcceptanceTester $I, Cart $page)
    {
        $I->maximizeWindow();
        $I->amOnPage($page::$URL);
        $I->wait(2);
    }

    public function signUpSuccessfully(AcceptanceTester $I, Cart $page)
    {
        $page->createAccount(
            'perpetrator@box.pl',
            'Mr',
            'John',
            'Kovalsky',
            'kowalPass120',
            '20',
            '10',
            '1984',
            '5 Washington Avenue',
            'New York',
            'New York',
            '00000',
            'United States',
            '12345678910',
            'Basic address'
        );
        $I->seeElement('//*[@title="View my customer account"]');
        $I->see('John Kovalsky');

    }
}