<?php

namespace Page;


use AcceptanceTester;
use Codeception\Example;
use Locator\Login;


class LoginPage extends BasePage
{
    public function __construct(AcceptanceTester $tester)
    {
        $this->acceptanceTester = $tester;
    }

    public function login($user, $password)
    {
        $this->acceptanceTester->amOnPage("login");
        $this->acceptanceTester->fillField(Login::$user, $user);
        $this->acceptanceTester->fillField(Login::$password, $password);
        $this->acceptanceTester->click(Login::$btnLogin);
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
