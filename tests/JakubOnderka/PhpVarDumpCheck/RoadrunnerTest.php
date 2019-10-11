<?php

use JakubOnderka\PhpVarDumpCheck;

class RoadrunnerTest extends PHPUnit_Framework_TestCase
{
    private $uut;


    public function __construct()
    {
        $settings = new PhpVarDumpCheck\Settings();
        $settings->functionsToCheck = array_merge($settings->functionsToCheck, array(
            PhpVarDumpCheck\Settings::ROADRUNNER_DUMP
        ));
        $this->uut = new PhpVarDumpCheck\Checker($settings);
    }

    public function testCheck_roadrunnerDumpShortcut()
    {
        $content = <<<PHP
<?php
dumprr(\$var);
PHP;
        $result = $this->uut->check($content);
        $this->assertCount(1, $result);
    }
}
