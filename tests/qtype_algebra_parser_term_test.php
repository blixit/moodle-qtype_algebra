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
require_once($CFG->dirroot . '/question/type/algebra/tests/Utils.php');

/**
 * Unit tests for Parser terms
 *
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author Blixit
 */
class qtype_algebra_parser_term_testcase extends basic_testcase
{
    /**
     * @var qtype_algebra_parser_term
     */
    private $term;

    public function setUp(){
        Utils::debug("Testing qtype_algebra_parser_term",Utils::INFOS);

        $this->term = new qtype_algebra_parser_term(3,[],'',true);

        $this->assertInstanceOf(qtype_algebra_parser_term::class,$this->term);
    }

    protected function tearDown()
    {
        Utils::debug("Suit tested !",Utils::SUCCESS);
    }

    public static function constructorargsProvider(){
        return [
            [3,["arg","axd"],'ax+2',true]
        ];
    }

    public function testToString(){
        Utils::debug("--Testing __tostring",Utils::INFOS);

        $str = $this->term->__toString();
        $this->assertContains(qtype_algebra_parser_term::class, $str);

        Utils::debug("--Done !",Utils::SUCCESS);
    }

    /**
     * @param $nargs
     * @param $array
     * @param $text
     * @param $commutes
     * @dataProvider constructorargsProvider
     */
    public function testprint_args($nargs, $array, $text, $commutes){
        Utils::debug("--Testing print_args",Utils::INFOS);

        $this->term = new qtype_algebra_parser_term($nargs,$array,$text,$commutes);

        $str = $this->term->print_args("print_args");


        Utils::debug("--Done !",Utils::SUCCESS);
    }
}
