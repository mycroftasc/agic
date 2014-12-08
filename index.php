<?php

//$facebook = file_get_contents('https://graph.facebook.com/XXXXXXXXXXXXXX/feed?limit=1&access_token=744390368974551|1cc13f289d46f1400260fb036ffcb3fd');
//XXXXXXXXXXXXXXX = id do face do candidato.
//acess_token = APP_ID | APP_SECRET, é importante ficar em uma variavel pois é usado em todos os acessos.
//limit = qtd feed a mostrar
// ainda não consegui contar os likes.

$facebook = file_get_contents('https://graph.facebook.com/351338968253034/feed?limit=5&access_token=744390368974551|1cc13f289d46f1400260fb036ffcb3fd');


//print_r($facebook);


$json  = json_decode($facebook);
$dado = $json->data;

foreach ($dado as $value) {
    $id = $value->id;
    
    if (!isset($value->name)) {
        echo '';
    } else {
        echo utf8_decode($value->name) . '<br>';
    }
    
    if (!isset($value->message)) {
        if (!isset($value->story)) {
            echo '';
        } else {
            echo utf8_decode($value->story) . '<br>';
        }
    } else {
        echo utf8_decode($value->message) . '<br>';
    }

    if (!isset($value->picture)) {
        echo '';
    } else {
        echo '<img src="' . $value->picture . '" width="130"><br>';
    }
    echo $value->created_time.'<br>';
    echo $value->shares->count.' compartilhamentos<br>';
    
    $url ='https://graph.facebook.com/'.$id.'/?fields=likes.limit(1).summary(true)&access_token=744390368974551|1cc13f289d46f1400260fb036ffcb3fd'; 
    $face = file_get_contents($url);
      
    $json2 = json_decode($face);
    echo $dado2 = $json2->likes->summary->total_count.' likes<br><br>';
} 