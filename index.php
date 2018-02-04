<!DOCTYPE html>
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
        'Eunectes murinus'
      ],
    'Australia' => [
        'Macropus rufus',
        'Alectura lathami',
        'Callocephalon fimbriatum'
      ]
    ];

    function output_array($array) {
        echo "<ol>";
        $is_num = array_values($array) == $array; // если это порядковый массив

        $keys = array_keys($array);
        $last_elem = array_pop($keys); // извлекаем последний элемент (последний ключ)

        foreach ($array as $k => $a) {
            echo($is_num ? "<li>" : "<li>{$k}: "); // для ассоциативного массива показываем ключ элемента
            if (is_array($a))
                output_array($a);
            else {
                echo $a;
                if ($k != $last_elem)
                    echo ';';
            }
            echo "</li>";
        }
        echo "</ol>";
    }

    $keep_continent_name = true;

    // Теперь найдите всех зверей, название которых состоит из двух слов. Составьте из них новый массив.
    $animals2 = []; // результат
    foreach ($continents as $cont_name => $animals) { // $animals -- array
        foreach ($animals as $animal) { // $animal --- string
            $words = explode(' ', $animal);
            if (count($words) == 2) {
                if ($keep_continent_name) {
                    if (empty($animals2[$cont_name]))
                        $animals2[$cont_name] = [];
                    $animals2[$cont_name][] = $animal; // ассоциативный массив, в котором элементы - списки животных, а ключи - названия континентов
                } else {
                    $animals2[] = $animal; // массив строк
                }
            }
        }
    }
    if (!$keep_continent_name)
        $animals2 = array_unique($animals2);

    // вывод на экран
    output_array($animals2);

    // Перемешать названия животных и составить новые

    $real_animals = []; // => ['animal 1', 'animal 2', ...]
    foreach ($continents as $animals)
        $real_animals = array_merge($real_animals, $animals);
    $real_animals = array_unique($real_animals);

    $real_animals_words = [];
    foreach ($real_animals as $animal)
        $real_animals_words = array_merge($real_animals_words, explode(' ', $animal));
    
    shuffle($real_animals_words); // меняет порядок элементов этого массива произвольным способом

    $new_animals = [];
    while (count($real_animals_words) > 0) { // while (!empty($real_animals_words))
        $w1 = ucfirst(array_shift($real_animals_words));
        $w2 = strtolower(array_shift($real_animals_words));
        if (is_null($w2))
            $res = $w1;
        else
            $res = "{$w1} {$w2}";
        $new_animals[] = $res;
    }

    // вывод на экран
    output_array($new_animals);
?>
  </body>
</html>   