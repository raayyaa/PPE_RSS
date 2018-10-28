<?php
function getXML($rss){
    return simplexml_load_string(join("\n",$rss));
}
function getItems($rss){
    $rss = getXML($rss);
    $html = "";
    foreach($rss->channel->children() as $items){
  
            $html = $html . itemToHTML($items);
        
    }

    return $html;
}


function itemToHTML($item){
   $html = "<h2><a href=\"$item->link\">$item->title</a></h2>";
   $html = $html."<p>$item->description</p>"; 
   return $html;
}


$output1 = "";
$output2 = "";
$output3 = "";
$output4 = "";
$output5 = "";

 //exec('curl  https://www.estrepublicain.fr/sport-lorrain/rss',$output1);
 exec('curl  https://www.vosgesmatin.fr/sport/sport-lorrain/rss',$output2);
// exec('curl  https://www.republicain-lorrain.fr/sports/sport-lorrain/rss',$output3);
// exec('curl  https://www.dna.fr/rss',$output4);
// exec('curl  https://www.lalsace.fr/actualite/journal-l-alsace-le-pays/rss',$output5);

// $output = array($output1);
 //$html = "";

 $output = array($output2);
 $html = "";

 
foreach($output as $rss){
    $html = $html . getItems($rss);
}

echo $html;


?>
