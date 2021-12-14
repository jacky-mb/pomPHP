<?php
namespace Helper;
abstract class PageObject
{
    public  $URL;
    public  $DATA_TEST;
    public  $SHEET_NAME;
    abstract public static function getDataProviders();
}