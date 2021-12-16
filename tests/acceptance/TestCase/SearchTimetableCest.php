<?php

namespace TestCase;
use AcceptanceTester;

class SearchTimetableCest
{
    /**
     * @param AcceptanceTester $tester
     * @param \Codeception\Example $example
     * @return void
     * @dataProvider  dp
     */
    function searchTimetble(AcceptanceTester $tester, \Codeception\Example $example)
    {
        $loginPgae = new \Page\LoginPage($tester);
        $homePage = $loginPgae->login();
        $timeTablePage = $homePage->openTimeTablePage();
        $timeTablePage->searchTimetable($example);

    }
    protected function dp()
    {
        return \Helper\DataProviders::loadTestCase(codecept_data_dir("timetable.xlsx"), "search");
    }
}