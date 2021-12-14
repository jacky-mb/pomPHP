<?php

namespace TestCase;

use AcceptanceTester;
use Codeception\Example;
use Helper\DataProviders;
use Page\LoginPage;
use Validation\LoginPageValid;

class LoginCest
{
    public function login(AcceptanceTester $tester, $user = 'admink12', $password = 'Vhv@2020')
    {
        $loginPage = new LoginPage($tester);
        $homePage = $loginPage->login($user, $password);
        LoginPageValid::checkLoginSuccess($loginPage->acceptanceTester);
        $homePage->openTimeTablePage();
        sleep(300);
    }

    /*
     * @dataProvider dp
     * */
    public function loginDataProvider(AcceptanceTester $tester, Example $example)
    {
        $loginPage = new LoginPage($tester);
        $loginPage->loginWithDataProvider($example);
        sleep(300);

    }

    protected function dp()
    {
        return null;
    }
}