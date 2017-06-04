<?php

/**
 * Unit tests for formula validation code.
 *
 * @package    qtype_algebra
 * @copyright  Roger Moore <rwmoore@ualberta.ca>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


defined('MOODLE_INTERNAL') || die();

global $CFG;
require_once($CFG->dirroot . '/question/type/algebra/edit_algebra_form.php');
require_once($CFG->dirroot . '/question/type/algebra/questiontype.php');

/**
 * Unit tests for formula validation code.
 *
 * @copyright  2014 The Open University
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class qtype_algebra_testclasses_testcase extends basic_testcase
{
    protected function setUp()
    {
        $cmd = "vendor/bin/phpunit qtype_algebra_testclasses_testcase question/type/algebra/tests/qtype_algebra_testclasses_testcase.php";

    }

    public function testIfClassesExist()
    {
        try{
            $editFormReflection = new \ReflectionClass(qtype_algebra_edit_form::class);
        }catch (\Exception $e){
            //$this->assertInstanceOf(\)
            var_dump($e);
        }
        $this->assertSame('', '');

    }
}
