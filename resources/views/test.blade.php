@php

    

    $json='{"0":{"name":"Nombre","value":"alex guzman","id":0,"type":"name","first":"alex","middle":"","last":"guzman"},"1":{"name":"Correo electr\u00f3nico","value":"alexitglobalproject@gmail.com","id":1,"type":"email"},"3":{"name":"Tel\u00e9fono","value":"+3421563652","id":3,"type":"text"}}';
    
    $var1 = json_decode($json, true);

    var_dump($var1);

    echo $var1[1]['value'];
@endphp