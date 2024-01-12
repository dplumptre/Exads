<?php



class Design {
    private $designId;
    private $designName;
    private $splitPercent;

    public function __construct($designId, $designName, $splitPercent) {
        $this->designId = $designId;
        $this->designName = $designName;
        $this->splitPercent = $splitPercent;
    }

    public function getDesignId() {
        return $this->designId;
    }

    public function getDesignName() {
        return $this->designName;
    }

    public function getSplitPercent() {
        return $this->splitPercent;
    }
}
