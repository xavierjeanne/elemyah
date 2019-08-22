<?php 
 /*
    Template Name: Page de contact
    */
/*
 Created by Pierre Bernardeau.
 For Influa
 Date: 29/10/2018
 Time: 10:29
 
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

if (has_post_thumbnail()) {
    $url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large', true);
    $bgimage = $url[0];
}
?>
<div id="contact">
    <div id="top" class="container-fluid" style="background-image:url(<?=$bgimage;?>);height:535px;">
        <div class="in container">
            <h1><span>Prendre rendez-vous</span><br/>
                <?php if (get_field('sous_titre')) {
                    echo get_field('sous_titre');
                }?>
            </h1>
        </div>
    </div>
    <div id="contact_formulaire" class="container">
        <?php
        echo get_the_content_with_formatting();
        ?>
    </div>
    <div id="contact_info" class="container hidden-xs">
    	<div class="col-xs-4 col-sm-4" style="background-image:url(<?= get_template_directory_uri() . '/assets/img/presentation.png'; ?>);height:370px;">	
    	</div>
    	<div class="col-xs-8 col-xs-8 txt_jaune">	
    		<h2>Nous venons à votre rencontre</h2>
    		<p>ÉLÉMYAH se déplace sur l'ensemble de la France.<p>
    		<h2>Disponibilité</h2>
    		<p>Le cabinet est ouvert de 9h00 jusqu'à 19h00.<br/>
    		Les horaires de séances peuvent s'ajsuter en fonction de vos contraintes et de vos horaires.</p>
    	</div>
    </div>
</div>

<?php
get_footer();