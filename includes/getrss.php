<?php

$xml=("http://estaticos.marca.com/rss/futbol/barcelona.xml");/*http://estaticos.marca.com/rss/futbol/barcelona.xml*/
$namespace = "http://search.yahoo.com/mrss/";

$xmlDoc = new DOMDocument();
$xmlDoc->load($xml);
$channel=$xmlDoc->getElementsByTagName('channel')->item(0);
$channel_title = $channel->getElementsByTagName('title')->item(0)->childNodes->item(0)->nodeValue;
$channel_desc = $channel->getElementsByTagName('description')->item(0)->childNodes->item(0)->nodeValue;

$x=$xmlDoc->getElementsByTagName('item');
$counter = 0 ;
echo ' <div class="nuevo_elemento"></div>';
foreach($x as $item)
{
  if(++$counter > 3) break;
  $item_title=$item->getElementsByTagName('title')->item(0)->childNodes->item(0)->nodeValue;
  $item_desc=$item->getElementsByTagName('description')->item(0)->childNodes->item(0)->nodeValue;
  $fecha=$item->getElementsByTagName('pubDate')->item(0)->childNodes->item(0)->nodeValue;
  $ruta=$item->getElementsByTagName('link')->item(0)->childNodes->item(0)->nodeValue;

  $description= $item_img = $item->getElementsByTagNameNS($namespace,'description')
  ->item(0)->nodeValue;

  $type_item_img = $item->getElementsByTagNameNS($namespace,'content')
  ->item(0)->getAttribute('type');

  $item_img = $item->getElementsByTagNameNS($namespace,'content')
  ->item(0)->getAttribute('url');

  if($type_item_img=="videofile"){

    $item_img = $item->getElementsByTagNameNS($namespace,'content')
    ->item(1)->getAttribute('url');
  }


  if($counter%2==0)
  {

    ?>
    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading titulo"><?php echo $item_title; ?></h2>
        <p class="lead"><?php echo html_entity_decode($description); ?>...</p>
        <a class="btn btn-lg btn-primary" href="<?php echo $ruta; ?>" target="_blank"  role="button">Ver mas...</a>
      </div>
      <div class="col-md-5">
        <img class="featurette-image img-responsive center-block" src="<?php echo $item_img; ?>" alt="Generic placeholder image">
      </div>
    </div>

    <hr class="featurette-divider">

    <?php
  }
  else
  {
    ?>
    <div class="row featurette">
      <div class="col-md-7 col-md-push-5">
        <h2 class="featurette-heading titulo"><?php echo $item_title; ?></h2>
        <p class="lead"><?php echo html_entity_decode($description); ?>...</p>
        <a class="btn btn-lg btn-primary" href="<?php echo $ruta; ?>" target="_blank" role="button">Ver mas...</a>
      </div>
      <div class="col-md-5 col-md-pull-7">
        <img class="featurette-image img-responsive center-block" src="<?php echo $item_img; ?>" alt="Generic placeholder image">
      </div>
    </div>
    <hr class="featurette-divider">
    <?php

  }

}

?>