<?php
namespace MaxServ\Replacecontent\Tests\Unit;

use \Nimut\TestingFramework\TestCase\UnitTestCase;

use \MaxServ\Replacecontent\Tests\Unit\Fixtures\LoadableClass;

/**
 * First Class Test Class
 *
 * @package MaxServ\Replacecontent\Tests\Unit
 */
class FirstClassTest extends UnitTestCase {
    /**
     * Test if method returns true.
     *
     * @test
     */
    public function methodReturnsTrue()
    {
        $firstClassObject = new LoadableClass();

        $this->assertTrue($firstClassObject->returnsTrue());
    }

    /**
     * Test if view helper base class is loadable.
     *
     * @test
     */
    public function viewHelperBaseClassIsLoadable()
    {
        $this->assertTrue(class_exists('TYPO3\CMS\Fluid\Tests\Unit\ViewHelpers\ViewHelperBaseTestcase'));
    }
}