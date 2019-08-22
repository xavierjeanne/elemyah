<?php /*
    Template Name: Page Standard
    */
/*
 Created by Pierre Bernardeau.
 For Influa
 Date: 18/09/2018
 Time: 10:41
 
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
function alaune() {
	$image = get_template_directory_uri() . '/assets/img/default.jpg';
	if ( has_post_thumbnail() ) {
		$url   = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large', true );
		$image = $url[0];
	}

	return $image;
}

?>
    <div id="page">
        <div id="top" class="container-fluid" style="background-image: url(<?= alaune(); ?>">
            <div class="in container">
                <h1><span><?= get_the_title(); ?></span><br/>
                    <?php if (get_field('sous_titre')) {
                        echo get_field('sous_titre');
                    }
                    ?>
                </h1>
            </div>
        </div>
        <div id="page_main" class="container hidden-xs">
        	
	        <div class="photo  col-sm-4" style="background-image: url(<?= get_template_directory_uri() . '/assets/img/contact_info.png'; ?>);width:380px;height:380px;">
	        	<span class="band"></span>
	        </div>
	        <div class="txt_jaune  col-sm-8">
	            <p>
	            <?= __( 'Je suis Laurent Ardouin, coach en entreprise et fondateur d\'Elemyah', 'elemyah' ); ?>
	            </p>	               
	        </div>
        </div>
        <div id="page_content" class="container">
            <div id="page_content_main">
				<?php
				if ( function_exists( 'yoast_breadcrumb' ) ) {
					yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
				}
				?>
                <div id="page_content_main_section_0" class="section text_formating">
					<?= get_the_content_with_formatting(); ?>
                </div>
				<?php
				$count = 1;
				while ( have_rows( 'sections' ) ):the_row();
					?>
                    <div id="page_content_main_section_<?= $count; ?>" class="section text_formating">
						<?= get_sub_field( 'contenu' ); ?>
                    </div>
					<?php
					$count ++;
				endwhile;
				?>
            </div>


        </div>
		<?php         
			get_template_part('parts/lies');
		?>
    </div>
<?php get_footer();
