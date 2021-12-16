<?php
class testCest{
    function test(){
        print_r(\Helper\DataProviders::loadTestCase(codecept_data_dir("demo.xlsx"),"loginncc",['index'=>1]));
    }
}