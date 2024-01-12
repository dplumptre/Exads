<?php


require_once __DIR__ . '/../../vendor/autoload.php';
use Exads\ABTestData;

class LoadData {

    private $promoId = 1;
  

    public function getData(): array
    {
      $abTest = new ABTestData($this->promoId);
      $promotion = $abTest->getPromotionName();
      $designs = $abTest->getAllDesigns();
      return $designs;

    }
}
