<?php
namespace Swiftriver\Core\DAL\Repositories;
class ChannelProcessingJobRepository {

    /**
     * The fully qualified type of the IAPIKeyDataContext implemting
     * data context for this repository
     * @var \Swiftriver\Core\DAL\DataContextInterfaces\IDataContext
     */
    private $dataContext;

    /**
     * The constructor for this repository
     * Accepts the fully qulaified type of the IAPIKeyDataContext implemting
     * data context for this repository
     *
     * @param string $dataContext
     */
    public function __construct($dataContext = null) {
        if(!isset($dataContext))
            $dataContext = \Swiftriver\Core\Setup::DALConfiguration()->DataContextType;
        $classType = (string) $dataContext;
        $this->dataContext = new $classType();
    }

    /**
     * Adds a new channel processing job to the data store
     *
     * @param \Swiftriver\Core\ObjectModel\Channel $channel
     */
    public function AddNewChannelProgessingJob($channel) {
        $dc = $this->dataContext;
        $dc::AddNewChannelProgessingJob($channel);
    }

    /**
     * Given a Channel processing job, this method deletes it from the data store
     * @param \Swiftriver\Core\ObjectModel\Channel $channel
     */
    public function RemoveChannelProcessingJob($channel) {
        $dc = $this->dataContext;
        $dc::RemoveChannelProcessingJob($channel);
    }

    /**
     * Given a Channel processing job, this method marks it as active
     * @param \Swiftriver\Core\ObjectModel\Channel $channel
     */
    public function ActivateChannelProcessingJob($channel) {
        $dc = $this->dataContext;
        $dc::ActivateChannelProcessingJob($channel);
    }

    /**
     * Given a Channel processing job, this method marks it as deactive
     * @param \Swiftriver\Core\ObjectModel\Channel $channel
     */
    public function DeactivateChannelProcessingJob($channel) {
        $dc = $this->dataContext;
        $dc::DeactivateChannelProcessingJob($channel);
    }

    /**
     * Given a date time, this function returns the next due
     * channel processing job.
     *
     * @param DateTime $time
     * @return \Swiftriver\Core\ObjectModel\Channel
     */
    public function SelectNextDueChannelProcessingJob($time) {
        $dc = $this->dataContext;
        $channel = $dc::SelectNextDueChannelProcessingJob($time);
        return $channel;
    }

    /**
     * Given a Channel processing job, this method upadtes the data store
     * to reflect that the last run was a sucess.
     *
     * @param \Swiftriver\Core\ObjectModel\Channel $channel
     */
    public function MarkChannelProcessingJobAsComplete($channel) {
        $dc = $this->dataContext;
        $dc::MarkChannelProcessingJobAsComplete($channel);
    }

    /**
     * Lists all the current Channel Processing Jobs in the core
     * @return \Swiftriver\Core\ObjectModel\Channel[]
     */
    public function ListAllChannelProcessingJobs() {
        $dc = $this->dataContext;
        $channels = $dc::ListAllChannelProcessingJobs();
        return $channels;
    }
}
?>
