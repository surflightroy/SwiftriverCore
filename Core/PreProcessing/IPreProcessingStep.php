<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Swiftriver\Core\PreProcessing;
interface IPreProcessingStep {
    /**
     * Interface method that all PrePorcessing Steps must implement
     * 
     * @param \Swiftriver\Core\ObjectModel\Content[] $contentItems
     * @return \Swiftriver\Core\ObjectModel\Content[]
     */
    public function Process($contentItems);
}
?>
