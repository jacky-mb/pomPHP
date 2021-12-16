<?php

namespace Page;

use Codeception\Module\WebDriver;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverSelect;
use Helper\DataProviders;

class BasePage
{
    public \AcceptanceTester $acceptanceTester;
}