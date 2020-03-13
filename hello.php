<?php

$arreglo = [

	'keyStr1' => 'lado',
	0 => 'ledo',

	'keyStr2' => 'lido',
	1 => 'lodo',
	2 => 'ludo'

];

$paises = [
    
[
    1 => 'Colombia',
    2 => 'Mexico',
    3 => 'Argentina',
    4 => 'Brazil',
    5 => 'España'
    
],

[
    1 => 'Cali',
    2 => 'Bogota',
    3 => 'Medellin',
],

[
    1 => 'Mexico df',
    2 => 'Queretaro',
    3 => 'Puebla'
],

[
    1 => 'Buenos Aires',
    2 => 'Cordoba',
    3 => 'Mar de Plata'
],

[
    1 => 'Sao Paulo',
    2 => 'Brasilia',
    3 => 'Rio de Janeiro'
],

[
    1 => 'Madrid',
    2 => 'Barcelona',
    3 => 'Sevilla'
]

];

$valores = [23, 54, 32, 67, 34, 78, 98, 56, 21, 34, 57, 92, 12, 5, 61]

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="arreglo">
        <?php  echo "<p>{$arreglo['keyStr1']} , {$arreglo[0]} , {$arreglo['keyStr2']} , {$arreglo[1]} , {$arreglo[2]}</p>"  ?>
        <?php  echo "<p> decirlo al revés, lo dudo.</p>"  ?>
        <?php  echo "<p>{$arreglo[2]} , {$arreglo[1]} , {$arreglo['keyStr2']} , {$arreglo[0]} ,  {$arreglo['keyStr1']}</p>"  ?>
        <?php  echo "<p>Que trabajo me ha costado! </p>" ?> 
    </div>
    <br>
    <div class="paise">
    <?php echo '<p>' . '<strong>'. $paises[0][1] . '</strong>' . ' : ' .  $paises[1][1] . ', ' . $paises[1][2] . ', ' . $paises[1][3] . '. </p>' ?>
    <?php echo '<p>' . '<strong>'. $paises[0][2] . '</strong>' . ' : ' .  $paises[2][1] . ', ' . $paises[2][2] . ', ' . $paises[2][3] . '. </p>' ?>
    <?php echo '<p>' . '<strong>'. $paises[0][3] . '</strong>' . ' : ' .  $paises[3][1] . ', ' . $paises[3][2] . ', ' . $paises[3][3] . '. </p>' ?>
    <?php echo '<p>' . '<strong>'. $paises[0][4] . '</strong>' . ' : ' .  $paises[4][1] . ', ' . $paises[4][2] . ', ' . $paises[4][3] . '. </p>' ?>
    <?php echo '<p>' . '<strong>'. $paises[0][5] . '</strong>' . ' : ' .  $paises[5][1] . ', ' . $paises[5][2] . ', ' . $paises[5][3] . '. </p>' ?>
    </div>
    <div class="valores">
    <?php
        $count = count($valores)-1;
        sort($valores);
        $maximo=[
        $valores[$count],
        $valores[$count-1],
        $valores[$count-2]
        ];

        $minimo=[
        $valores[0],
        $valores[1],
        $valores[2]
        ];
        
        
        var_dump($maximo);
        var_dump($minimo); ?>
    </div>
</body>
</html>