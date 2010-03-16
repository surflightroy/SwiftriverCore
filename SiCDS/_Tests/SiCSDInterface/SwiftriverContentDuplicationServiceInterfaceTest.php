<?php
namespace Swiftriver\SiCDS\SiCDSInterface;
require_once 'PHPUnit/Framework.php';

class SwiftriverContentDuplicationServiceInterfaceTest extends \PHPUnit_Framework_TestCase {
    private $object;

    protected function setUp() {
        include_once(dirname(__FILE__)."/../../SiCDSInterface/Setup.php");
        include_once(\Swiftriver\SiCDS\SiCDSInterface\Setup::Swiftriver_Core_Directory()."/PreProcessing/IPreProcessingStep.php");
        include_once(\Swiftriver\SiCDS\SiCDSInterface\Setup::Swiftriver_Core_Directory()."/ObjectModel/Content.php");
        include_once(\Swiftriver\SiCDS\SiCDSInterface\Setup::Swiftriver_Core_Directory()."/ObjectModel/DuplicationIdentificationField.php");
        require_once dirname(__FILE__).'/../../SiCDSInterface/SwiftriverContentDuplicationServiceInterface.php';
        $this->object = new SwiftriverContentDuplicationServiceInterface();
    }
}
 ?>
