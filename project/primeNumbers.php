<?php




class PrimeNumbers
{



    public function __construct(private array $array)
    {
    }



    /**
     * to get the prime numeber if its prime returns true if not return false
     * 
     */
    private function checkForPrimeNumber($num): ?bool
    {
        if ($num < 2) {
            return false;
        }
        for ($i = 2; $i <= ceil(sqrt($num)); $i++) {
            if ($num % $i === 0) {
                return false;
            }
        }
        return true;
    }




    public function handle()
    {
        for ($i = 1; $i <= count($this->array); $i++) {
            $multiple = [];
            for ($j = 1; $j <= count($this->array); $j++) {
                if ($i % $j === 0) {
                    $multiple[] = $j;
                }
            }
            $result = $this->checkForPrimeNumber($i) ? "[PRIME]" : "[" . implode(",", $multiple) . "]";
            echo $i . " " . $result . "<br />";
        }
    }


}


//  instantiated class
// this is is the feature i want
$array_numbers = range(1, 100);
$arr = new PrimeNumbers($array_numbers);
echo $arr->handle();





