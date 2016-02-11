<?php
    
    class CalcFactorial{
        
        function factorial($num){
            $factorial = 1;
            if(!is_int($num)){throw new InvalidArgumentException('No es un entero');};
            if(!isset($num)){throw new InvalidArgumentException('No se introdujo numero');};
            for($i=2;$i<=$num;$i++){
                $factorial*=$i;
            }
            return $factorial;
        }
        
    }
    
    $factor = new CalcFactorial();
    echo $factor->factorial(4);
    
?>
