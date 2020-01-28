<?php
namespace Page\Acceptance;
use Facebook\WebDriver\WebDriverKeys;

class Cart
{
    // include url of current page
    public static $URL = '/';
    public $signInButton = '//*[@class="header_user_info"]/a';
    public $emailField = '#email_create';
    public $mrOrMrsField = 'input[name="id_gender"]';
    public $firstNameField = '#customer_firstname';
    public $lastNameField = '#customer_lastname';
    public $passwordField = '#passwd';
    public $birthDayField = '#days';
    public $birthMonthField = '#months';
    public $birthYearField = '#years';
    public $addressField = '#address1';
    public $cityField = '//*[@name="city"]';
    public $stateField = 'select#id_state';
    public $postcodeField = '//input[@id="postcode"]';
    public $countryField = '#id_country';
    public $mobilePhoneField = '#phone_mobile';
    public $addressAliasField = '#alias';
    public $registerAccountButton = '#submitAccount';
    public $emailLoginField = '#email';
    public $logOutButton = 'a.logout';
    public $womenSection = '//a[@title="Women"]';
    public $eveningDressLink = '//a[@title="Evening Dresses"]';
    public $printedDressImageLink = 'a[title="Printed Dress"]';
    public $addToCartButton = 'a[title="Add to cart"]';
    public $checkOutButton = 'a[title="Proceed to checkout"]';
    public $orderSummaryCheckOutButton = '#center_column > p.cart_navigation.clearfix > a.button.btn.btn-default.standard-checkout.button-medium';
    public $checkOutAddressButton = 'button[name="processAddress"]';
    public $termsOfServiceCheckbox = 'input#cgv';
    public $checkOutDeliveryButton = '#form > p > button';
    public $payByBankWireLink = '//p[@class="payment_module"]/a[@class="bankwire"]';
    public $orderConfirmButton = '//button/span[contains(text(), "I confirm my order")]';

    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public static $usernameField = '#username';
     * public static $formSubmitButton = "#mainForm input[type=submit]";
     */

    /**
     * Basic route example for your current URL
     * You can append any additional parameter to URL
     * and use it in tests like: Page\Edit::route('/123-post');
     */
    public static function route($param)
    {
        return static::$URL.$param;
    }

    /**
     * @var \AcceptanceTester;
     */
    protected $acceptanceTester;

    public function __construct(\AcceptanceTester $I)
    {
        $this->acceptanceTester = $I;
    }

    public function createAccount(
        $email,
        $gender,
        $firstName,
        $lastName,
        $password,
        $birthDay,
        $birthMonth,
        $birthYear,
        $address,
        $city,
        $state,
        $postcode,
        $country,
        $mobilePhoneNumber,
        $addressAlias)
    {
        $I = $this->acceptanceTester;
        $I->click($this->signInButton);
        $I->wait(2);
        $I->fillField($this->emailField, $email);
        $I->pressKey($this->emailField, WebDriverKeys::ENTER);
        $I->wait(10);
        $I->selectOption($this->mrOrMrsField, $gender);
        $I->fillField($this->firstNameField, $firstName);
        $I->fillField($this->lastNameField, $lastName);
        $I->fillField($this->passwordField, $password);
        $I->selectOption($this->birthDayField, $birthDay);
        $I->selectOption($this->birthMonthField, $birthMonth);
        $I->selectOption($this->birthYearField, $birthYear);
        $I->fillField($this->addressField, $address);
        $I->fillField($this->cityField, $city);
        $I->selectOption($this->stateField, $state);
        $I->fillField($this->postcodeField, $postcode);
        $I->selectOption($this->countryField, $country);
        $I->fillField($this->mobilePhoneField, $mobilePhoneNumber);
        $I->fillField($this->addressAliasField, $addressAlias);
        $I->click($this->registerAccountButton);
        $I->wait(2);
    }

    public function logIn($login, $password)
    {
        $I = $this->acceptanceTester;
        $I->click($this->signInButton);
        $I->wait(2);
        $I->fillField($this->emailLoginField, $login);
        $I->fillField($this->passwordField, $password);
        $I->pressKey($this->passwordField, WebDriverKeys::ENTER);
        $I->wait(3);
    }

    public function logOut()
    {
        $I = $this->acceptanceTester;
        $I->click($this->logOutButton);
    }

    public function addDressToCart()
    {
        $I = $this->acceptanceTester;
        $I->moveMouseOver($this->womenSection);
        $I->waitForElementClickable($this->eveningDressLink, 5);
        $I->click($this->eveningDressLink);
        $I->moveMouseOver($this->printedDressImageLink);
        $I->click($this->addToCartButton);
        $I->wait(3);
    }

    public function checkOut()
    {
        $I = $this->acceptanceTester;
        $I->click($this->checkOutButton);
        $I->waitForElement($this->orderSummaryCheckOutButton);
        $I->click($this->orderSummaryCheckOutButton);
        $I->waitForElement($this->checkOutAddressButton);
        $I->click($this->checkOutAddressButton);

        $I->waitForElement($this->termsOfServiceCheckbox);
        $I->waitForElement($this->checkOutDeliveryButton);
        $I->click($this->termsOfServiceCheckbox);
        $I->click($this->checkOutDeliveryButton);
        $I->waitForElement($this->payByBankWireLink);
        $I->click($this->payByBankWireLink);
        $I->waitForElement($this->orderConfirmButton);
        $I->click($this->orderConfirmButton);
    }

}
