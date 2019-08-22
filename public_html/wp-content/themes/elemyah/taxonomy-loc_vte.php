<?php
/*
  Created by Pierre Bernardeau.
  For Influa
  Date: 21/09/2018
  Time: 14:33
  
        _
    ,--'_`--.    
  ,/( \   / )\.  
 //  \ \_/ /  \\ 
|/___/     \___\|
((___       ___))    Join the Empire !!!  ﴾̵ ̵◎̵ ̵﴿
|\   \  _  /   /|
 \\  / / \ \  // 
  `\(_/___\_)/'
    `--._.--'
  
 */
get_header();


echo '<pre>';
$terms=get_query_var('loc_vte');
var_dump($terms);

echo '</pre>';
?>

<h1 class="<?=$terms;?>">Nos biens en <?=$terms;?></h1>

<?php
if($terms=='location'){
	$html=
		'lorem ipsum';
}
?>

<?= do_shortcode('[contact-form-7 id="9" title="Formulaire de contact 1"]');?>


<?php
get_footer();