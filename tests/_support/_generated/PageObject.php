<?php

namespace Helper;
use Codeception\Module\WebDriver;

abstract class PageObject
{
    public $sheetName;
    public $fileName;
    public $filters;
    public  WebDriver $driver;

    abstract function getDataProviders();
}