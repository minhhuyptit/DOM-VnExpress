<?php
    require_once 'function.php';
    $type = $_POST['type'];
    $result = '';
    if($type == 'vnexpress1'){
        $result = getContent('https://vnexpress.net/the-thao');
    }
    if($type == 'vnexpress2'){
        $result = getContent2('https://vnexpress.net/the-thao');
    }
    echo $result;
?>