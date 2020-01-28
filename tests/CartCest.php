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


    /**
    public function signUpSuccessfully(AcceptanceTester $I, Cart $page)
    {
        $page->createAccount(
            'perpetrator20@box.pl',
            'Mrs',
            'Jaqueline',
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
        $I->see('Jaqueline Kovalsky');
    }
    */

    public function logInSuccessfully(AcceptanceTester $I, Cart $page)
    {
        $page->logIn('perpetrator20@box.pl', 'kowalPass120');
        $I->seeElement('//*[@title="View my customer account"]');
        $I->see('Jaqueline Kovalsky');
    }

    public function logOutSuccessfully(AcceptanceTester $I, Cart $page)
    {
        $page->logIn('perpetrator20@box.pl', 'kowalPass120');
        $page->logOut();
        $I->dontSeeElement('//*[@title="View my customer account"]');
        $I->dontSee('Jaqueline Kovalsky');
    }

    public function addDressSuccessfully(AcceptanceTester $I, Cart $page)
    {
        $page->logIn('perpetrator20@box.pl', 'kowalPass120');
        $page->addDressToCart();
        $I->see('There is 1 item in your cart.');
    }

    public function completeDressOrderSuccessfully(AcceptanceTester $I, Cart $page)
    {
        $page->logIn('perpetrator20@box.pl', 'kowalPass120');
        $page->addDressToCart();
        $page->checkOut();
        $I->see('ORDER CONFIRMATION');
        $I->see('Your order on My Store is complete.');
    }

}