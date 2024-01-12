<?php

require_once __DIR__ . '/Design.php';
require_once __DIR__ . '/LoadData.php';

class ABTest
{


    private $designs;

    public function __construct(array $promoDesigns)
    {
        $this->designs = [];

        foreach ($promoDesigns as $designData) {
            $this->designs[] = new Design(
                $designData['designId'],
                $designData['designName'],
                $designData['splitPercent']
            );
        }
    }



    public function getDesign()
    {
        $randomNumber = mt_rand(1, 100);
        $splitPercent = 0;

        foreach ($this->designs as $design) {
            $splitPercent += $design->getSplitPercent();

            if ($randomNumber <= $splitPercent) {
                return $design;
            }
        }
        return $this->designs[0];
    }



}




$designsData = new LoadData();
$abTest = new ABTest($designsData->getData());
$selectedDesign = $abTest->getDesign();

//   // Redirect based on the selected design
echo "Redirecting to Design ID: " . $selectedDesign->getDesignId() . " - " . $selectedDesign->getDesignName();

