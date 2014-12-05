<?php

//$facebook = file_get_contents('https://graph.facebook.com/XXXXXXXXXXXXXX/feed?limit=5&access_token=744390368974551|1cc13f289d46f1400260fb036ffcb3fd');
//XXXXXXXXXXXXXXX = id do face do candidato.
//acess_token = APP_ID | APP_SECRET, é importante ficar em uma variavel pois é usado em todos os acessos.
//limit = qtd feed a mostrar
// ainda não consegui contar os likes.

$facebook = file_get_contents('https://graph.facebook.com/351338968253034/feed?limit=1&access_token=744390368974551|1cc13f289d46f1400260fb036ffcb3fd');


//print_r($facebook);


$json  = json_decode($facebook);
$dado = $json->data;
foreach ($dado as $value) {
    
    echo $value->name.'<br>';
    echo utf8_decode($value->message).'<br>';
    echo '<img src="'.$value->picture.'" width="130"><br>';
    echo $value->created_time.'<br>';
    echo $value->shares->count.' compartilhamentos<br>';
    
    
    /*foreach ($value->likes->data as $val) {
       echo key($val).'<br>';
         
          
    }*/
  
}
 