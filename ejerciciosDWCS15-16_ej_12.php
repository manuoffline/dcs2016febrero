<?php
    class EncPhp{
        // Atributo clave
        private $claveAlea = 0;
        // Generamos clave al instanciar el objeto, metodo magico constructor
        function __construct(){
            $this->setClaveAlea();
        }
        // Getter y setter, genera clave aleatoria
        function getClaveAlea() {
            return $this->claveAlea;
        }
        function setClaveAlea() {
            $this->claveAlea=rand(0,255);
        }
        // Funcion digito
        // Devuelve un número en la posición
        function digito($num,$pos){
            $salida = 0;
            if(strlen($num)<$pos){
                throw New RuntimeException ('Posición mayor que el número');
            }else{
                // Damos la vuelta al str y cogemos la posición
                // Para cuadrar con el ej el ultimo digit es 0
                $salida = substr(strrev($num),$pos,1);
            }
            return $salida;
        }
        // Suma sin acarreo
        function sumaSinAcarreo($numa,$numb){
            $salida = 0;
            if(($numa+$numb)>9){
                $salida = ($numa+$numb)%10;
            }else{
                $salida = $numa+$numb;
            }
            return $salida;
        }
        // Num de digitos
        function numDigito($num){
            return strlen($num);
        }
        // Suma sin acarreo
        function suma ($numa,$numb){
            $res = '';
            // Numeros con el mismo numero de digitos
            if($this->numDigito($numa)==$this->numDigito($numb)){
                for($i=($this->numDigito($numa))-1;$i>=0;$i--){
                    $res .= $this->sumaSinAcarreo($this->digito($numa,$i),$this->digito($numb,$i));
                }
            }
            // Numero con distinto numero de digitos
            else{
                $res ='';
                // Revisamos que numa siempre sea el mayor, sino cambiaos valores
                if($numa<$numb){$numc=$numb;$numb=$numa;$numa=$numc;};
                // Recorremos los digitos del mayor
                for($i=($this->numDigito($numa))-1;$i>=0;$i--){
                    // Si no hemos agotado los digitos de b usamos sumar
                    if($this->numDigito($numb)>$i){
                        $res .= $this->sumaSinAcarreo($this->digito($numa,$i),$this->digito($numb,$i));
                    }
                    // Sino usamos el digito
                    else{
                        $res .= $this->digito($numa,$i);
                    }
                }
            }
            return $res;
        }
        // Encripta
        function encripta($texto){
            $result = '';
            for($i=0;$i<strlen($texto);$i++){
                if($i===0){
                    $result .= $this->suma($this->claveAlea,ord(substr($texto,$i,1)));
                }else{
                    $result .= '/'.$this->suma($this->claveAlea,ord(substr($texto,$i,1)));
                }
            }
            return $result;
        }
        // claveDesc
        function claveDesc(){
            return $this->suma(999-$this->getClaveAlea(),111);
        }
        // Desencripta
        function desencripta($texto){
            $decript = explode('/',$texto);
            $result ='';
            $clavedes = $this->claveDesc();
            foreach($decript as $value){
                $result .= chr($this->suma($value,$clavedes));
            }
            return $result;
        }
    }
    
    // USO DEL CODIGO
    $codif = new EncPhp();
    echo 'Num digitos 1234567: '.$codif->numDigito(1234567).'<br />';
    echo 'Suma sin acarreo 8 3: '.$codif->sumaSinAcarreo(8,3).'<br />';
    echo 'Digito 2 en 345: '.$codif->digito(345,2).'<br />';
    echo 'Suma 123 789 -> 802: '.$codif->suma(123,789).'<br />';
    echo 'Suma 23 789 -> 702: '.$codif->suma(23,789).'<br />';
    echo 'Suma 789 23 -> 702: '.$codif->suma(789,23).'<br />';
    $prueba1 = $codif->encripta('HOLA');
    echo 'HOLA: '.$prueba1.'<br />';
    echo 'ClaveDesc: '.$codif->claveDesc().' la clave es : '.strval($codif->getClaveAlea()).'<br />';
    echo 'Desencripta '.$prueba1.' en : '.$codif->desencripta($prueba1);
?>