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

}
