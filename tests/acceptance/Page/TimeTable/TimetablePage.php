<?php

namespace Page\TimeTable;
use Page\BasePage;

class TimetablePage extends BasePage
{

    public function __construct(\AcceptanceTester $acceptanceTester)
    {
        $this->acceptanceTester = $acceptanceTester;
    }

}