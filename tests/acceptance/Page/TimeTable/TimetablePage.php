<?php

namespace Page\TimeTable;
use Codeception\Example;
use Page\BasePage;

class TimetablePage extends BasePage
{

    public function __construct(\AcceptanceTester $acceptanceTester)
    {
        $this->acceptanceTester = $acceptanceTester;
    }

    function searchTimetable(Example $example){
        $this->acceptanceTester->selectOption(\Locator\TimeTable\TimetablePage::$grades,$example['grades']);
        $this->acceptanceTester->waitPageLoaded();
        $this->acceptanceTester->selectOption(\Locator\TimeTable\TimetablePage::$classroomId,$example['classroomId']);
        $this->acceptanceTester->waitPageLoaded();
        $this->acceptanceTester->selectOption(\Locator\TimeTable\TimetablePage::$teacherId,$example['teacherId']);
        $this->acceptanceTester->waitPageLoaded();
        $this->acceptanceTester->selectOption(\Locator\TimeTable\TimetablePage::$scheduleType,$example['scheduleType']);
        $this->acceptanceTester->waitPageLoaded();
    }

}