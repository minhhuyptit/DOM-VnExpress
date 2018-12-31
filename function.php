<?php
    function getContent($link = 'https://vnexpress.net/the-thao'){
        $html = file_get_contents($link);
        $dom = new DOMDocument(); 
        @$dom->loadHTML($html);
        $xpath = new DOMXpath($dom);

        $contextNode = $dom->getElementById('news_home');

        $nameNode        = $xpath->query('.//article[@class="list_news"]/h3/a[1]', $contextNode); 
        $imgNode         = $xpath->query('.//article[@class="list_news"]/div/a/img', $contextNode);
        $descriptionNode = $xpath->query('.//article[@class="list_news"]/h4', $contextNode);

        $result = array();
        for($i = 0; $i <= 5; $i++){
          $result[$i]['name']        = $nameNode->item($i)->nodeValue;
          $result[$i]['image']       = $imgNode->item($i)->getAttribute('data-original');
          $result[$i]['link']        = $nameNode->item($i)->getAttribute('href');
          $result[$i]['description'] = $descriptionNode->item($i)->nodeValue;
        }

        $xhtml = '<ol>';
        for ($i = 0; $i < count($result); $i++) { 
          $xhtml .= '<li>
                    <div class="media">
                      <a class="pull-left" href="'.$result[$i]['link'].'">
                        <img class="media-object" src="'.$result[$i]['image'].'">
                      </a>
                      <div class="media-body">
                          <h4 class="media-heading"><a href="'.$result[$i]['link'].'">'.$result[$i]['name'].'</a></h4>
                          '.$result[$i]['description'].'
                      </div>
                    </div>
                  </li><br>';
        }
        $xhtml .= '</ol>';
        return $xhtml;
    }

    function getContent2($link = 'https://vnexpress.net/the-thao'){
        $html = file_get_contents($link);
        $dom = new DOMDocument(); 
        @$dom->loadHTML($html);
        $xpath = new DOMXpath($dom);

        $contextNode = $dom->getElementById('news_home');
        $resultNode        = $xpath->query('.//article[@class="list_news"]/h3/a[1] | .//article[@class="list_news"]/div/a/img | .//article[@class="list_news"]/h4', $contextNode); 

		$count = 0;
		$xhtml = '<ol>';
        foreach($resultNode as $value){
          if( ($count/3) == 6 ) break;
            $name        = $resultNode->item($count)->nodeValue;
            $link        = $resultNode->item($count)->getAttribute('href');
            $image       = $resultNode->item($count+1)->getAttribute('data-original');
            $description = $resultNode->item($count+2)->nodeValue;
			$count+=3;
			
			$xhtml .= '<li>
						<div class="media">
						  <a class="pull-left" href="'.$link.'">
							<img class="media-object" src="'.$image.'">
						  </a>
						  <div class="media-body">
							  <h4 class="media-heading"><a href="'.$link.'">'.$name.'</a></h4>
							  '.$description.'
						  </div>
						</div>
					  </li><br>';
			
		}
		$xhtml .= '</ol>';

        return $xhtml;
    }

    // echo getContent2();

?>