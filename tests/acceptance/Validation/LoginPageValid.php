<?php

namespace Validation;
class LoginPageValid
{
    public static function checkLoginSuccess(\AcceptanceTester $tester)
    {
        $tester->waitForText("Đăng nhập thành công",5);
    }
}