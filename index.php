<?php

$xml = simplexml_load_file('test.xml');

foreach ($xml->product as $product) {
    echo 'Название: ' . $product->name;
    echo '<br>';
    echo 'Категория: ' . $product->category;
    echo '<br>';
    echo 'Цена: ' . $product['cost'] . '; Количество: ' . $product['amount'];
}
