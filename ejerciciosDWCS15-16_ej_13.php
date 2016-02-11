<?php

class ElementoHtml {

    protected $nombre = '';
    protected $valor = '';
    private $etiqueta = '';

    // CONSTRUCTOR
    function __construct($nombre, $valor, $etiqueta) {
        $this->nombre = $nombre;
        $this->valor = $valor;
        $this->etiqueta = $etiqueta;
    }

    // GETTERS Y SETTERS
    function leeNombre() {
        return $this->nombre;
    }

    function leeValor() {
        return $this->valor;
    }

    function leeEtiqueta() {
        return $this->etiqueta;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function setEtiqueta($etiqueta) {
        $this->etiqueta = $etiqueta;
    }

}

class Opcion extends ElementoHtml {

    function __construct($etiqueta,$nombre="",$valor="") {
        parent::__construct($nombre, $valor, $etiqueta);
    }

    function muestra() {
        if (empty($att)) {
            echo '<' . $this->leeEtiqueta() . " value=" . $this->leeValor() . ">" . $this->leeNombre() . "</" . $this->leeEtiqueta() . ">";
        } else {
            
        }
    }

}

class Seleccion extends ElementoHtml {

    private $arrobj = array();

    function __construct($nombre, $valor, $etiqueta, $arrobj) {
        parent::__construct($nombre, $valor, $etiqueta);
        // Añadimos array de objetos
        $this->arrobj=$arrobj;
    }

    function muestra() {
        echo '<' . $this->leeEtiqueta() . " " . $this->leeNombre() . "=" . $this->leeValor() . ">";
        foreach ($this->arrobj as $value) {
            $value->muestra();
        }
        echo "</" . $this->leeEtiqueta() . ">";
    }
    
    function nuevaOpcion($att,$attvalor){
        array_push($this->arrobj, new Opcion("option",$att,$attvalor));
    }

}

$obj = [new Opcion("option","Lunes", "1"), new Opcion("option","Martes", "2"),
    new Opcion("option","Miercoles", "3"), new Opcion("option","Jueves", "4"),
    new Opcion("option","Viernes", "5"), new Opcion("option","Sabado", "6")];
// Instanciamos objeto select y añadimos array de objetos
$obj2 = new Seleccion("name", "dias", "select", $obj);
// Usamos método nuevaOpcion para poner otro elemento al array
$obj2->nuevaOpcion("Domingo",7);
$obj2->muestra();
