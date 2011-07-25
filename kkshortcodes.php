<?php


function kk_table_row($title, $price) {

  $row = <<<EOR
<tr>
<td>$title</td>
<td>$price</td>
</tr>
EOR;
  return $row; 

}

function kk_haircut_price_table() {
  
  $default = 'n/a';
  $options = get_option('kkelegant_options');
  
  $mensprice     = (isset($options['mens_haircut']))   ? $options['mens_haircut']   : $default;
  $womensprice   = (isset($options['womens_haircut'])) ? $options['womens_haircut'] : $default;
  $color         = (isset($options['color_touchup']))  ? $options['color_touchup']  : $default;
  $solidcolor    = (isset($options['solid_color']))    ? $options['solid_color']    : $default;
  $partialhilite = (isset($options['partialhilite']))  ? $options['partialhilite']  : $default;
  $fullhilite    = (isset($options['fullhilite']))     ? $options['fullhilite']     : $default;
  $perm          = (isset($options['perm']))           ? $options['perm']           : $default;
  $treatment     = (isset($options['treatment']))      ? $options['treatment']      : $default;
  $washstyle     = (isset($options['washstyle']))      ? $options['washstyle']      : $default;
  $updo          = (isset($options['updo']))           ? $options['updo']           : $default;
  
  $prices = <<<EOD
<div id="haircut-price-table">
<table class="price-table">
<tbody>
<tr><th>Haircut</td><th>Price</td></tr>
<tr><td>Women's</td><td>$womensprice</td></tr>
<tr><td>Men's cut</td><td>$mensprice</td></tr>
<tr><td>Color touch up</td><td>$color</td></tr>
<tr><td>All over solid color</td><td>$solidcolor</td></tr>
<tr><td>Partial Hi lite</td><td>$partialhilite</td></tr>
<tr><td>Full hi lite</td><td>$fullhilite</td></tr>
<tr><td>Perm</td><td>$perm</td></tr>
<tr><td>Treatment</td><td>$treatment</td></tr>
<tr><td>Wash &amp; style</td><td>$washstyle</td></tr>
<tr><td>Updo's</td><td>$updo</td></tr>
</tbody>
</table>
</div>    
EOD;

  return $prices;  
}
add_shortcode('haircut-price-table','kk_haircut_price_table');


function kk_emit_tr($col1, $col2) {
  
  $tablerow = <<<EOR
  <tr>
  <td>$col1</td>
  <td>$col2</td>
  </tr>
EOR;
  return $tablerow;
}


function kk_massage_price_list() {

  $default = 'n/a';
  $options = get_option('kkelegant_options');
  
  $massage90 = (isset($options['massage90']))   ? $options['massage90']   : $default;
  $massage60 = (isset($options['massage60']))   ? $options['massage60']   : $default;
  $massage30 = (isset($options['massage30']))   ? $options['massage30']   : $default;
    
  $prices = <<<EOD
<div id="massage-price-table">
<table class="price-table">
<tbody>
<tr>
<th>Massage</td>
<th>Price</td>
</tr>
<tr>
<td>90 minute</td>
<td>$massage90</td>
</tr>
<tr>
<td>60 minute</td>
<td>$massage60</td>
</tr>
<tr>
<td>30 minute</td>
<td>$massage30</td>
</tr>
</tbody>
</table>
</div>    
EOD;
  return $prices;    
}
add_shortcode('massage-price-list','kk_massage_price_list');


function kk_waxing_price_list() {

  $default = 'n/a';
  $options = get_option('kkelegant_options');
  
  $browlashtint    = (isset($options['browlashtint']))    ? $options['browlashtint']    : $default;
  $eyebrows        = (isset($options['eyebrows']))        ? $options['eyebrows']        : $default;
  $eyebrowupperlip = (isset($options['eyebrowupperlip'])) ? $options['eyebrowupperlip'] : $default;
  $brazilian       = (isset($options['brazilian']))       ? $options['brazilian']       : $default;
  $standardbikini  = (isset($options['standardbikini']))  ? $options['standardbikini']  : $default;
  $extendedbikini  = (isset($options['extendedbikini']))  ? $options['extendedbikini']  : $default;
  $fullleg         = (isset($options['fullleg']))         ? $options['fullleg']         : $default;
  $lowerleg        = (isset($options['lowerleg']))        ? $options['lowerleg']        : $default;
  $upperleg        = (isset($options['upperleg']))        ? $options['upperleg']        : $default;
  $underarm        = (isset($options['underarm']))        ? $options['underarm']        : $default;
  $fullarm         = (isset($options['fullarm']))         ? $options['fullarm']         : $default;
  $forearm         = (isset($options['forearm']))         ? $options['forearm']         : $default;
  $lip             = (isset($options['lip']))             ? $options['lip']             : $default;
  $chin            = (isset($options['chin']))            ? $options['chin']            : $default;
  $fullface        = (isset($options['fullface']))        ? $options['fullface']        : $default;
  $fullfaceeyebrow = (isset($options['fullfaceeyebrow'])) ? $options['fullfaceeyebrow'] : $default;
  $upperback       = (isset($options['upperback']))       ? $options['upperback']       : $default;
  $lowerback       = (isset($options['lowerback']))       ? $options['lowerback']       : $default;
  $fullback        = (isset($options['fullback']))        ? $options['fullback']        : $default;
  $chest           = (isset($options['chest']))           ? $options['chest']           : $default;

  $prices = <<<EOD
<div id="waxing-price-table">
<table class="price-table">
<tbody>
<tr><th>Waxing Service</td><th>Price</td></tr>
<tr><td>Brow or Lash Tint</td><td>$browlashtint</td>
</tr><tr><td>Eyebrows</td><td>$eyebrows</td></tr>
<tr><td>Eyebrow &amp; Upper Lip</td><td>$eyebrowupperlip</td></tr>
<tr><td>Brazilian</td><td>$brazilian</td></tr>
<tr><td>Standard Bikini</td><td>$standardbikini</td></tr>
<tr><td>Extended Bikini</td><td>$extendedbikini</td></tr>
<tr><td>Full Leg</td><td>$fullleg</td></tr>
<tr><td>Lower Log</td><td>$lowerleg</td></tr>
<tr><td>Upper Leg</td><td>$upperleg</td></tr>
<tr><td>Under Arm</td><td>$underarm</td></tr>
<tr><td>Full Arm</td><td>$fullarm</td></tr>
<tr><td>Forearm</td><td>$forearm</td></tr>
<tr><td>Lip</td><td>$lip</td></tr>
<tr><td>Chin</td><td>$chin</td></tr>
<tr><td>Full Face</td><td>$fullface</td></tr>
<tr><td>Full Face & Eyebrow</td><td>$fullfaceeyebrow</td></tr>
<tr><td>Upper Back</td><td>$upperback</td></tr>
<tr><td>Lower Back</td><td>$lowerback</td></tr>
<tr><td>Full Back</td><td>$fullback</td></tr>
<tr><td>Chest</td><td>$chest</td></tr>
</tbody>
</table>
</div>
EOD;
  return $prices;  
} 
add_shortcode('waxing-price-list','kk_waxing_price_list');


function kk_facebody_price_list() {

  $default = 'n/a';
  $options = get_option('kkelegant_options');

  $microzone30  = (isset($options['microzone30']))  ? $options['microzone30']  : $default;
  $facial30     = (isset($options['facial30']))     ? $options['facial30']     : $default;
  $facial60     = (isset($options['facial60']))     ? $options['facial60']     : $default;
  $facial75     = (isset($options['facial75']))     ? $options['facial75']     : $default;
  $back30       = (isset($options['back30']))       ? $options['back30']       : $default;
  $bodymasque60 = (isset($options['bodymasque60'])) ? $options['bodymasque60'] : $default;
  $bodyglow30   = (isset($options['bodyglow30']))   ? $options['bodyglow30']   : $default;

  $prices = <<<EOD
<div id="facebody-price-table">
<table class="price-table">
<tbody>
<tr>
<th>Face & Body</td>
<th>Price</td>
</tr>
<tr>
<td>Microzone treatment - 30 m</td>
<td>$microzone30</td>
</tr>
<tr>
<td>Facial - 30 m</td>
<td>$facial30</td>
</tr>
<tr>
<td>Facial - 60 m</td>
<td>$facial60</td>
</tr>
<tr>
<td>Facial - 75 m</td>
<td>$facial75</td>
</tr>
<tr>
<td>Back - 30 m</td>
<td>$back30</td>
</tr>
<tr>
<td>Body Masque - 60 m</td>
<td>$bodymasque60</td>
</tr>
<tr>
<td>Body Glow - 30 m</td>
<td>$bodyglow30</td>
</tr>
</tbody>
</table>
</div>
EOD;
  return $prices;
}
add_shortcode('facebody-price-list','kk_facebody_price_list');

?>