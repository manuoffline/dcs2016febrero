Ejercicios de DCS 2015-2016

Práctica 10
Crea una Clase que calcule el factorial de un número entero en la que además incorpore una excepción en la que muestre un mensaje de error si no se introdujo el número o este no es un entero.
Nota: Utiliza la clase InvalidArgumentException

Práctica 11
Calcula la diferencia entre dos fechas, usando la aproximación a objetos de PHP.
Nota: Utiliza un objeto nativo de PHP que trabaja con fechas y horas

Práctica 12
Encriptación de texto usando clases
Se creará una clase que permita encriptar y desencriptar texto, haciendo uso de la suma sin acarreo (ver la nota al final del enunciado).  Esta clase sólo contendrá una única propiedad (atributo o variable de instancia): la clave.
Tendrá además los siguientes métodos:

1. claveAlea: asignará a la propiedad clave un valor entero aleatorio entre 0 y 255 (ambos incluidos).

2. digito: recibirá dos enteros y devolverá el dígito del primer argumento que está en la posición indicado por el segundo. Las unidades se consideran la posición cero.  Por ejemplo: digito (345, 2) = 3

3. sumaSinAcarreo: recibirá dos argumentos enteros (se sabe que sólo tendrán un dígito cada uno de ellos) y devolverá suma de ambos sin acarreo (un solo dígito, por tanto):  Por ejemplo: sumaSinAcarreo (3,8) = 1

4. numDigitos: recibirá un argumento entero e indicará cuántos dígitos contiene. Por ejemplo: numDigitos (1325) = 4

5. suma: recibirá dos enteros (pueden tener más de un dígito) y devolverá la suma sin acarreo. Es recomendable usar los tres métodos anteriores. Por ejemplo: suma (123, 789) = 802

6. encripta: recibirá un texto y devolverá otro con los códigos ASCII encriptados y separados por una barra inclinada (“/”). Cada código se encripta sumándole la clave con el método del punto anterior (suma). Por ejemplo: suma(“HOLA”) = “22/29/26/15”.

7. claveDesc: devolverá el valor que permitirá desencriptar el texto encriptado. Se calcula a partir de la clave: suma (999 – clave, 111).  Por ejemplo, si la clave es 123, suma (999 – clave, 111) = 987

8. desencripta: recibirá el texto encriptado y desencriptará cada código (recuérdese que el separador de códigos es la barra inclinada /) aplicándole el método suma a cada uno con la clave de desencriptado calculada con el método anterior. Cada código ASCII recuperado ha de convertirse al carácter correspondiente.

Se debe escribir una página php que haga uso de la clase anterior para encriptar y desencriptar un texto.
Modificar lo anterior para que la generación de la clave aleatoria se haga de forma automática en el momento de crear el objeto.
Nota 1: Se necesitarán las siguientes funciones: strlen, ord, chr, substr, floor, max y  explode.
Nota 2: Suma de dos dígitos sin acarreo: Es igual a calcular el módulo de su suma y 10: (digito1 + digito2) % 10

Práctica 13
Generación de código HTML con herencia de clases.
Crear una clase que gestione un elemento genérico de HTML. Contendrá tres atributos que permitan almacenar el nombre, el valor y la etiqueta del elemento.
Tendrá además tres funciones (leeValor, leeNombre, leeEtiqueta) que devolverán el valor de cada uno de los atributos. De modo similar, se tendrán otras tres funciones que permitirán asignar valor a cada uno de los atributos.
Se creará una segunda clase heredada de la anterior que gestionará las opciones de los elementos Select del HTML: <optionvalue="valor">etiqueta</option>
El constructor de esta clase tendrá dos argumentos opcionales para asignar valor a los atributos etiqueta y valor. El método muestra escribirá (con la función echo) el código HTML de dicha opción, por ejemplo: <optionvalue="1">Lunes</option>
Se escribirá una tercera clase (Seleccion) derivada de Elemento que representará una lista de selección de HTML: <selectname="lista">
El único atributo de la clase será un vector privado de objetos de la clase anterior (Opcion). Tendrá un método (nuevaOpcion) que permitirá añadir opciones al vector anterior. Dispondrá de dos argumentos de tipo String para dar los dos datos de la opción (etiqueta y valor). El método muestra escribirá (con la función echo) el código HTML de la lista, por ejemplo:
<selectname="Dias">
	<optionvalue="1">Lunes</option>
	<optionvalue="2">Martes</option>
	<optionvalue="3">Miércoles</option>
	<option value="4">Jueves</option>
	<option value="5">Viernes</option>
	<optionvalue="6">Sábado</option>
	<option value="7">Domingo</option>
</select>
Crear una página php que muestre una lista como la anterior usando la última de las clases (Seleccion).

Solución propia a los ejercicios
