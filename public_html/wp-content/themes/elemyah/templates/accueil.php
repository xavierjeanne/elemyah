<?php /*
    Template Name: Page d'accueil
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
$bgimage = get_template_directory_uri() . '/assets/img/default.jpg';
if (has_post_thumbnail()) {
    $url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large', true);
    $bgimage = $url[0];
}
?>
    <div id="accueil">
        <div id="accueil_top" class="container-fluid" style="background-image:url(<?=$bgimage;?>);height:535px;">
            <div class="in container">
                <p class="first"><?= __( 'Le premier élément <span>c\'est vous !', 'elemyah' ); ?></span></p>
                <ul class="steps">
                    <li><?= __( 'Identifier', 'elemyah' ); ?></li>
                    <li><?= __( 'Avancer', 'elemyah' ); ?></li>
                    <li><?= __( 'Révéler votre potentiel est notre métier', 'elemyah' ); ?></li>
                </ul>
                <a href="<?=get_permalink(__('42','elemyah'));?>" class="pill"><?= __( 'Commencer maintenant !', 'elemyah' ); ?></a>
            </div>
        </div>
        <div id="accueil_main">
            <div id="accueil_main_who" class="container">
                <div class="col-xs-12 col-md-6 who">
                    <div class="photo">
                        <img src="<?= get_template_directory_uri() . '/assets/img/contact_info.jpg'; ?>"  alt="<?= __( 'Coach en entreprise', 'elemyah' ); ?>">
                    </div>
                    <div class="txt">
                        <h1>
                            <?= __( 'Je suis Laurent Ardouin, coach en entreprise et fondateur d\'Elemyah', 'elemyah' ); ?>
                        </h1>
                        <p class="orange">
                            <?= __( 'Mon parcours personnel est empreint du monde du sport, de l\'entreprise et de la sphère politique', 'elemyah' ); ?>
                        </p>
                        <p>
                            <?= __( 'Cette expérience, je la valorise et la met à profit d\'hommes, de femmes et d\'entreprises avec toujours le même objectif, révêler le meilleur de leur potentiel.', 'elemyah' ); ?>
                        </p>
                        <a href="<?=get_permalink(__('28','elemyah'));?>" class="pill"><?= __( 'En savoir <span>+</span>', 'elemyah' ); ?></a>
                        <span class="band"></span>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 ">
                    <div class="link first" href="<?= bloginfo('url')."/index.php/coaching/"; ?>" data-expand-target>
                        <div class="in" style="background-image: url(<?= get_template_directory_uri() . '/assets/img/coaching_entreprise.png'; ?>);height:510px;" >
                            <div class="titre">
                                <a href="<?=get_permalink(__('34','elemyah'));?>" data-expand-link>
                                <span>
                                    <?= __( 'Coaching', 'elemyah' ); ?>
                                </span>
                                <br/>
									<?= __( 'en entreprise', 'elemyah' ); ?>
                                </a>
                            <span class="band"></span>
                            </div>
                        </div>
                    </div>
                    <div class="link second" href="<?=get_permalink(__('36','elemyah'));?>" data-expand-target>
                        <div class="in" style="background-image: url(<?= get_template_directory_uri() . '/assets/img/seminaire_entreprise.png'; ?>);height:380px;">
                            <div class="titre">
                                <a href="<?= bloginfo('url')."/index.php/seminaires/" ?>" data-expand-link>
                                <span>
                                    <?= __( 'Séminaires', 'elemyah' ); ?>
                                </span>
                                <br/>
									<?= __( 'd\'entreprise', 'elemyah' ); ?>
                                </a>
                                <span class="band"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="accueil_main_bandeau" class="container-fluid" style="background-image: url(<?= get_template_directory_uri() . '/assets/img/bandeau.png'; ?>);">
                <div class="container">
                    <div class="col-sm-offset-5 col-sm-7 col-xs-12 ">
                        <p class="quote">
                            "<?= __( 'J\'ai beaucoup mieux à faire que m\'inquiéter de l\'avenir : j\'ai à le préparer', 'elemyah' ); ?>
                            "
                        </p>
                        <p class="sig">
                            Félix Antoine Savard
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div id="article" class="container">
            <?php
            $args=array(
                    'post_type' => 'post',
                'posts_per_page'    => 2
            );
            $query= new WP_Query($args);
            while ( $query->have_posts() ):
                $query->the_post();
                $titre = get_the_title();
                $image = get_template_directory_uri() . '/assets/img/default.jpg';
                if ( has_post_thumbnail() ) {
                    $url   = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large', true );
                    $image = $url[0];
                }
                $link = get_the_permalink();
                $cat  = get_the_category()[0]->name;
               
                ?>
                <div class="col-sm-6 col-xs-12 actu"  >
                    <div class="col-sm-6 col-xs-12 img" data-expand-target>
                        <img src="<?= $image; ?>" alt="<?= $titre; ?>">
                        <span class="band"></span>
                    </div>
                    <div class="col-sm-6 col-xs-12 txt"  >
                        <p class="cat"><?= $cat; ?></p>
                        <p class="titre"><?= $titre; ?></p>
                        <p class="lire"><a href="<?= $link; ?>" data-expand-link><?= __( '<span>+</span> lire l\'article', 'elemyah' ); ?></a></p>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
        
        
<?php get_footer();
