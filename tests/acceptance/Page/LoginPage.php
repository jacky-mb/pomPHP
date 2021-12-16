<?php

namespace Page;


use AcceptanceTester;
use Codeception\Example;
use Locator\Login;


class LoginPage extends BasePage
{
    public static $fileName = "_data/demo.xlsx";
    public static $sheetName = "loginncc";
    public static $filters = [];

    public function __construct(AcceptanceTester $tester)
    {
        $this->acceptanceTester = $tester;
    }

    public function login($user = 'admink12', $password = 'Vhv@2020')
    {
        $this->acceptanceTester->amOnPage("login");
        $this->acceptanceTester->fillField(Login::$user, $user);
        $this->acceptanceTester->fillField(Login::$password, $password);
        $this->acceptanceTester->click(Login::$btnLogin);
        $this->acceptanceTester->waitPageLoaded();

        return new HomePage($this->acceptanceTester);
    }

    public function loginWithDataProvider(Example $example)
    {
        $this->acceptanceTester->amOnPage("login");
        $this->acceptanceTester->fillField(Login::$user, $example['user']);
        $this->acceptanceTester->fillField(Login::$password, $example['password']);
        $this->acceptanceTester->click(Login::$btnLogin);
    }
}