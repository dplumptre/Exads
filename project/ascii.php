<?php


class Ascii
{
    private $start = ",";
    private $end = "|";

    private function generateRandomArray(): array
    {
        $asciiArray = range(ord($this->start), ord($this->end));
        $randomArray = array_map('chr', $asciiArray);
         //print_r($randomArray); randon charz
        shuffle($randomArray);
        return $randomArray;
    }

    private function randomlyRemoveAndDiscard(array &$array): string
    {
        $randomKey = array_rand($array); // picks one from the array
        $removedElement = $array[$randomKey];
        unset($array[$randomKey]);
        return $removedElement;
    }

    private function missingChar(array $array): ?string
    {
        sort($array);
        $missingChar = null;

        foreach ($array as $index => $char) {
            if ($char !== chr(ord($this->start) + $index)) {
                $missingChar = chr(ord($this->start) + $index);
                break;
            }
        }

        return $missingChar;
    }

    public function handle(): void
    {
        $generated_array = $this->generateRandomArray();
        $removed_element = $this->randomlyRemoveAndDiscard($generated_array);
        $missing_character = $this->missingChar($generated_array);

        echo "generated_array: " . implode(',', $generated_array) . "<br />";
        echo "randomly_removed_element: " . $removed_element . "<br />";
        echo "missing_character: " . $missing_character . "<br />";
    }
}




$c = new Ascii();
// print_r($c->generateRandomArray(",","|"));
$c->handle();



?>



