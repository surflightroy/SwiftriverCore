<?php
namespace Swiftriver\SiCDS\SiCDSInterface;
require_once 'PHPUnit/Framework.php';

class ContentToJSONParserTest extends \PHPUnit_Framework_TestCase {
    private $object;

    protected function setUp() {
        include_once(dirname(__FILE__)."/../../SiCDSInterface/Setup.php");
        include_once(\Swiftriver\SiCDS\SiCDSInterface\Setup::Swiftriver_Core_Directory()."/PreProcessing/IPreProcessingStep.php");
        include_once(\Swiftriver\SiCDS\SiCDSInterface\Setup::Swiftriver_Core_Directory()."/ObjectModel/Content.php");
        include_once(\Swiftriver\SiCDS\SiCDSInterface\Setup::Swiftriver_Core_Directory()."/ObjectModel/DuplicationIdentificationField.php");
        require_once dirname(__FILE__).'/../../SiCDSInterface/ContentToJSONParser.php';
        $this->object = new ContentToJSONParser();
    }

    public function testParseWithOneContentItemWithOneDiff() {
        $content = new \Swiftriver\Core\ObjectModel\Content();
        $content->SetId("testId");
        $dif = new \Swiftriver\Core\ObjectModel\DuplicationIdentificationField();
        $dif->SetType('testType');
        $dif->SetValue('testValue');
        $difs = array($dif);
        $content->SetDifs($difs);
        $contentItems = array($content);
        $json = $this->object->Parse($contentItems);
        $this->assertEquals('[{"id":"testId","difs":[{"type":"testType","value":"testValue"}]}]', $json);
    }

    public function testParseWithTWOContentItemWithOneDiff() {
        $content1 = new \Swiftriver\Core\ObjectModel\Content();
        $content1->SetId("testId");
        $dif1 = new \Swiftriver\Core\ObjectModel\DuplicationIdentificationField();
        $dif1->SetType('testType');
        $dif1->SetValue('testValue');
        $difs1 = array($dif1);
        $content1->SetDifs($difs1);

        $content2 = new \Swiftriver\Core\ObjectModel\Content();
        $content2->SetId("testId2");
        $dif2 = new \Swiftriver\Core\ObjectModel\DuplicationIdentificationField();
        $dif2->SetType('testType2');
        $dif2->SetValue('testValue2');
        $difs2 = array($dif2);
        $content2->SetDifs($difs2);

        $contentItems = array($content1, $content2);

        $json = $this->object->Parse($contentItems);
        $this->assertEquals('[{"id":"testId","difs":[{"type":"testType","value":"testValue"}]},{"id":"testId2","difs":[{"type":"testType2","value":"testValue2"}]}]', $json);
    }

    public function testParseWithTWOContentItemButOnlyOneWithDifs() {
        $content1 = new \Swiftriver\Core\ObjectModel\Content();
        $content1->SetId("testId");
        $dif1 = new \Swiftriver\Core\ObjectModel\DuplicationIdentificationField();
        $dif1->SetType('testType');
        $dif1->SetValue('testValue');
        $difs1 = array($dif1);
        $content1->SetDifs($difs1);

        $content2 = new \Swiftriver\Core\ObjectModel\Content();
        $content2->SetId("testId2");

        $contentItems = array($content1, $content2);

        $json = $this->object->Parse($contentItems);
        $this->assertEquals('[{"id":"testId","difs":[{"type":"testType","value":"testValue"}]}]', $json);
    }

    public function testParseWithOneContentItemWithTwoDifs() {
        $content = new \Swiftriver\Core\ObjectModel\Content();
        $content->SetId("testId");
        $dif1 = new \Swiftriver\Core\ObjectModel\DuplicationIdentificationField();
        $dif1->SetType('testType');
        $dif1->SetValue('testValue');
        $dif2 = new \Swiftriver\Core\ObjectModel\DuplicationIdentificationField();
        $dif2->SetType('testType2');
        $dif2->SetValue('testValue2');
        $difs = array($dif1, $dif2);
        $content->SetDifs($difs);
        $contentItems = array($content);
        $json = $this->object->Parse($contentItems);
        $this->assertEquals('[{"id":"testId","difs":[{"type":"testType","value":"testValue"},{"type":"testType2","value":"testValue2"}]}]', $json);
    }

    public function testParseWithEmptyArray() {
        $contentItems = array();
        $json = $this->object->Parse($contentItems);
        $this->assertEquals(null, $json);
    }

    public function testParseWithNullArguments() {
        $json = $this->object->Parse(null);
        $this->assertEquals(null, $json);
    }

    public function testParseWithOneContentItemWithNoDifs() {
        $content = new \Swiftriver\Core\ObjectModel\Content();
        $content->SetId("testId");
        $contentItems = array($content);
        $json = $this->object->Parse($contentItems);
        $this->assertEquals(null, $json);
    }

}
?>
