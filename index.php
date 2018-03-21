<?php
function output_array(&$array)
{
    foreach ( $array as $name=>$value )
    {
        if( is_array($value) )
        {
            echo "<h2>$name</h2>";
            echo implode(", ", $value);
        }
        else
        {
            echo "<li>" . $value . "</li>";
        }
    }
}
?><!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Lesson-3</title>
</head>
<body>
<?php
$continents = [
    'Africa' => [
        'Gorilla beringei',
        'Loxodonta africana',
        'Bovidae antelope',
        'Hexaprotodon liberiensis'
    ],
    'Asia' => [
        'Cheirogaleus medius',
        'Ailuropoda melanoleuca',
        'Panthera uncia',
        'Elephas maximus'
    ],
    'America' => [
        'Mammuthus columbi',
        'Ophiophagus hannah',
        'Eunectes murinus',
        'Mankee'
    ],
    'Australia' => [
        'Macropus rufus',
        'Alectura lathami',
        'Callocephalon fimbriatum',
        'duck white big'
    ]
];

$new_continents = array();
$fantasy_animals = array();
$animals_names = array();


foreach ( $continents as  $continent=>$animals)
{
    $new_continents[$continent] = array();

    foreach ( $animals as $name )
    {
        $temp = explode(" ", $name);
        if( count( $temp ) == 2 )
        {
            $new_continents[ $continent ][] = $name;
            $animals_names[] = $temp[1];
        }
    }
}
shuffle( $animals_names );

output_array($new_continents);
//print_r($animals_names);

$name_i = 0;
foreach ( $new_continents as $continent=>$animals )
{
    $fantasy_animals[ $continent ] = array();

    foreach ( $animals as $name )
    {
        $temp = explode(" ", $name);
        $fantasy_animals[ $continent ][] = $temp[0] . " " . $animals_names[$name_i++];
    }
}

output_array($fantasy_animals);

?>
    </body>
</html>
