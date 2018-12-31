<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP DOM</title>
</head>
<body>
    <?php
        require_once 'html.php';
        $dom = new DOMDocument();
        $dom->loadHTML($html);
        $xpath = new DOMXpath($dom);
        // $expression = "";
        //Di chuyển nhanh vào thẻ div với điều kiện class="caption" rồi truy cập vào tiếp thẻ h3
        $nameNode   = $xpath->query('//div[@class="caption"]/h3'); 
        $imgNode    = $xpath->query('//div[@class="thumbnail"]/img');
        $yearNode   = $xpath->query('//div[@class="caption"]/p');

        echo "<pre>";
        print_r($imgNode->item(0));
        echo "</pre>";

        $result = array();
        for($i = 0; $i <= 3; $i++){
            $result[$i]['name']  = $nameNode->item($i)->nodeValue;
            $result[$i]['image'] = $imgNode->item($i)->getAttribute('src'); 
            $result[$i]['year']  = $yearNode->item($i)->nodeValue;
        }

        echo "<pre>";
        print_r($result);
        echo "</pre>";

    ?>

</body>
</html>