<?php
namespace Swiftriver\Core\ObjectModel;
class Content {
    /**
     * The unique Id of the content
     * @var sytring
     */
    private $id;

    /**
     * The current state of the content
     * @var int
     */
    private $state;

    /**
     * The title of the content
     * @var string
     */
    private $title;

    /**
     * An array of all text associated with the content
     * @var string[]
     */
    private $text;

    /**
     * The hyperlink to the original content
     * @var string
     */
    private $link;

    /**
     * An array of tags for the content
     * @var \Swiftriver\Core\ObjectModel\Tag[]
     */
    private $tags;

    /**
     * The source of the content
     * @var \Swiftriver\Core\ObjectModel\Source
     */
    private $source;

    /**
     * The array of DIFs
     * @var \Swiftriver\Core\ObjectModel\DuplicationIdentificationFieldCollection[]
     */
    private $difs;

    /**
     * Get he content Id
     * @return string
     */
    public function GetId()        { return $this->id; }


    /**
     * Gets the current state of the content
     * This is best intepreted with the help of a
     * Swiftriver\Core\StateTransition\StateController object
     * @return int
     */
    public function GetState()      { return $this->state; }

    /**
     * Gets the title of the content
     * @return string
     */
    public function GetTitle()     { return $this->title; }

    /**
     * Gets the array of text for the content
     * @return string[]
     */
    public function GetText()      { return isset($this->text) ? $this->text : array(); }

    /**
     * Gets the hyperlink to the original content
     * @return string
     */
    public function GetLink()      { return $this->link; }

    /**
     * Gets the array of tags for the content
     * @return \Swiftriver\Core\ObjectModel\Tag[]
     */
    public function GetTags()      { return isset($this->tags) ? $this->tags : array(); }

    /**
     * Gets the source associated with the content
     * @return \Swiftriver\Core\ObjectModel\Source
     */
    public function GetSource()    { return $this->source; }

    /**
     * Gest the array of difs associated with this content
     * @return \Swiftriver\Core\ObjectModel\DuplicationIdentificationFieldCollection[]
     */
    public function GetDifs()      { return isset($this->difs) ? $this->difs : array(); }

    /**
     * Sets the ID of the content
     * @param string $idIn
     */
    public function SetId($idIn)           { $this->id = $idIn; }

    /**
     * Sets the state of this content, best used with the help of a
     * Swiftriver\Core\StateTransition\StateController object
     * @param int $state
     */
    public function SetState($state)       { $this->state = $state; }

    /**
     * Sets the title of the content
     * @param string $titleIn
     */
    public function SetTitle($titleIn)     { $this->title = $titleIn; }

    /**
     * Sets the text array associated with the content
     * @param string[] $textIn
     */
    public function SetText($textIn)       { $this->text = $textIn; }

    /**
     * Sets the hyperlink to the original content
     * @param string $linkIn
     */
    public function SetLink($linkIn)       { $this->link = $linkIn; }

    /**
     * Sets the array of tags associated with the content
     * @param \Swiftriver\Core\ObjectModel\Tag[] $tagsIn
     */
    public function SetTags($tagsIn)       { $this->tags = $tagsIn; }

    /**
     * Sets the source associated with the content
     * @param \Swiftriver\Core\ObjectModel\Source $sourceIn
     */
    public function SetSource($sourceIn)   { $this->source = $sourceIn; }

    /**
     * Sets the array of difs associated with this content
     * @param \Swiftriver\Core\ObjectModel\DuplicationIdentificationFieldCollection[] $difsIn
     */
    public function SetDifs($difsIn)       { $this->difs = $difsIn; }

    /**
     * Static function to generate new unique IDs from content
     * @return string
     */
    public static function GenerateUniqueId() {
        return md5(uniqid(rand(), true));
    }
}
?>
