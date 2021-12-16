<?php
namespace Page;
use AcceptanceTester;
use Page\TimeTable\TimetablePage;

class HomePage extends BasePage {
    public function __construct(AcceptanceTester $tester)
    {
        $this->acceptanceTester = $tester;
    }
    public function openTimeTablePage(){
        $this->acceptanceTester->amOnPage("?page=LMS.K12.Schedule.Manager.list");
        $this->acceptanceTester->waitPageLoaded();
        return new TimetablePage($this->acceptanceTester);
    }
}