<?php
/**
 * Unit tests for Algebra
 *
 * @package    qtype_algebra
 * @copyright  Roger Moore <rwmoore@ualberta.ca>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


defined('MOODLE_INTERNAL') || die();

global $CFG;
require_once($CFG->dirroot . '/question/type/algebra/edit_algebra_form.php');
require_once($CFG->dirroot . '/question/type/algebra/questiontype.php');
require_once($CFG->dirroot . '/question/type/algebra/parser.php');

/**
 * Unit tests for TODO complete
 *
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author Blixit
 */
class qtype_algebra_parser_testcase extends basic_testcase
{

    public function setUp(){
        Utils::debug("Testing qtype_algebra_parser",Utils::INFOS);

        $this->term = new qtype_algebra_parser(3,[],'',true);

        $this->assertInstanceOf(qtype_algebra_parser::class,$this->term);
    }

    protected function tearDown()
    {
        Utils::debug("Suit tested !",Utils::SUCCESS);
    }

    public function testItShouldAssertTrue(){
        $this->assertTrue(true);
    }
}