<?php

/**
 * Unit tests for checking classes
 * It's an example test file
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
 * Unit tests for formula validation code.
 *
 * @copyright  2014 The Open University
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class qtype_algebra_classes_test extends basic_testcase
{

    protected function setUp()
    {
        Utils::debug("Testing classes existence",Utils::INFOS);
        $cmd = "vendor/bin/phpunit qtype_algebra_testclasses_testcase question/type/algebra/tests/qtype_algebra_testclasses_testcase.php";

    }

    protected function tearDown()
    {
        Utils::debug("Suit tested !",Utils::SUCCESS);
    }

    /**
     * Use :
     *
     * $SRC_Parser = $CFG->dirroot . '/question/type/algebra/parser.php';
     * ...
     * global $SRC_Parser;
     * $classes = $this->file_get_php_classes($SRC_Parser);
     *
     * @param $filepath
     * @return array
     */
    private function file_get_php_classes($filepath) {
        $php_code = file_get_contents($filepath);
        $classes = $this->get_php_classes($php_code);
        return $classes;
    }

    private function get_php_classes($php_code) {
        $classes = array();
        $tokens = token_get_all($php_code);
        var_dump($tokens);
        $count = count($tokens);
        for ($i = 2; $i < $count; $i++) {
            if (   $tokens[$i - 2][0] == T_CLASS
                && $tokens[$i - 1][0] == T_WHITESPACE
                && $tokens[$i][0] == T_STRING) {

                $class_name = $tokens[$i][1];
                $classes[] = $class_name;
            }
        }
        return $classes;
    }

    public function testIfClassesExist()
    {
        try{
            $classReflection = new \ReflectionClass(qtype_algebra_edit_form::class);
            $this->assertInstanceOf(\ReflectionClass::class, $classReflection);

            $classReflection = new \ReflectionClass(qtype_algebra_parser_term::class);
            $this->assertInstanceOf(\ReflectionClass::class, $classReflection);

            $classReflection = new \ReflectionClass(qtype_algebra_parser_nullterm::class);
            $this->assertInstanceOf(\ReflectionClass::class, $classReflection);

            $classReflection = new \ReflectionClass(qtype_algebra_parser_number::class);
            $this->assertInstanceOf(\ReflectionClass::class, $classReflection);

            $classReflection = new \ReflectionClass(qtype_algebra_parser_variable::class);
            $this->assertInstanceOf(\ReflectionClass::class, $classReflection);

            $classReflection = new \ReflectionClass(qtype_algebra_parser_power::class);
            $this->assertInstanceOf(\ReflectionClass::class, $classReflection);

            $classReflection = new \ReflectionClass(qtype_algebra_parser_divide::class);
            $this->assertInstanceOf(\ReflectionClass::class, $classReflection);

            $classReflection = new \ReflectionClass(qtype_algebra_parser_multiply::class);
            $this->assertInstanceOf(\ReflectionClass::class, $classReflection);

            $classReflection = new \ReflectionClass(qtype_algebra_parser_add::class);
            $this->assertInstanceOf(\ReflectionClass::class, $classReflection);

            $classReflection = new \ReflectionClass(qtype_algebra_parser_subtract::class);
            $this->assertInstanceOf(\ReflectionClass::class, $classReflection);

            $classReflection = new \ReflectionClass(qtype_algebra_parser_special::class);
            $this->assertInstanceOf(\ReflectionClass::class, $classReflection);

            $classReflection = new \ReflectionClass(qtype_algebra_parser_function::class);
            $this->assertInstanceOf(\ReflectionClass::class, $classReflection);

            $classReflection = new \ReflectionClass(qtype_algebra_parser_bracket::class);
            $this->assertInstanceOf(\ReflectionClass::class, $classReflection);

            $classReflection = new \ReflectionClass(qtype_algebra_parser::class);
            $this->assertInstanceOf(\ReflectionClass::class, $classReflection);


        }catch (\Exception $e){
            $this->throwException(new \Exception("A required class has been found."));
        }
    }
}
