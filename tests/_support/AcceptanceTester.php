<?php

use Cassandra\Time;


/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method void pause()
 *
 * @SuppressWarnings(PHPMD)
 */
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

    /**
     * Define custom actions here
     */
    function waitPageLoaded()
    {
        while (1) {
            sleep(0.2);
            $readyState = $this->executeJS("return document.readyState;");
            print "readyState: $readyState\n";
            if ($readyState === "complete") {
                return;
            }
}
    }

}
