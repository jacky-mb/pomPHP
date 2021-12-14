<?php

namespace Page;



use AcceptanceTester;
use Locator\Login;
use Validation\LoginPageValid;


class LoginPage extends BasePage
{
    public function __construct(AcceptanceTester $tester)
    {
        $this->acceptanceTester = $tester;
    }

    public function login($user , $password)
    {
        $this->acceptanceTester->amOnPage("login");
        $this->acceptanceTester->fillField(Login::$user, $user);
        $this->acceptanceTester->fillField(Login::$password, $password);
        $this->acceptanceTester->click(Login::$btnLogin);
        return new HomePage($this->acceptanceTester);
    }
}
