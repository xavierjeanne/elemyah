<?php /*
    Template Name: Page enfant
    */
/*
 Created by Pierre Bernardeau.
 For Influa
 Date: 26/10/2018
 Time: 14:24

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
    <div id="enfant">
        <div id="top" class="container-fluid" style="background-image:url(<?= $bgimage; ?>);">
            <div class="in container">
                <h1><span><?= get_the_title(); ?></span><br/>
                    <?php if (get_field('sous_titre')) {
                        echo get_field('sous_titre');
                    }
                    ?>
                </h1>
            </div>
        </div>
        <div id="enfant_content">
            <?php
            $count = 0;
            while (have_rows('prestations')):
                the_row();
                $image = get_sub_field('image')['sizes']['large'];
                $jaune = get_sub_field('texte_jaune');
                $titre = get_sub_field('titre');
                $contenu = get_sub_field('contenu');
                if ($count != 0) {
                    $class = 'ligne';
                } else {
                    $class = '';
                }
                ?>

                <div class="container section">
                    <div class="col-sm-4 col-xs-12 left">
                        <div class="imgwrp">
                            <img src="<?= $image; ?>" alt="<?= $titre; ?>">
                        </div>
                        <div class="jaune">
                            <?= $jaune; ?>
                        </div>
                        <div class="zonerdv">
                            <p>
                                <?= __('Demandez votre premier rendez-vous d\'<span>1 heure gratuite</span>', ''); ?>
                            </p>
                            <p><a class="pill" href="<?=get_permalink(__('32','elemyah'));?>"><?= __('Prendre rendez-vous <i>+</i>', 'elemyah'); ?></a></p>
                            <p><a class="pill" href="tel:+336 77 05 78 15"><?= __('Nous appeler <i>+</i>', 'elemyah'); ?></a></p>
                        </div>
                    </div>
                    <div class="col-sm-8 col-xs-12 right <?= $class; ?>">
                        <?php if ($count == 0) {
                            echo '<div class="h1">' . get_the_title() . '</div>';
                        } ?>
                        <h2><?= $titre; ?></h2>
                        <div class="contenu">
                            <?= $contenu; ?>
                        </div>
                    </div>
                </div>
                <?php
                $count++;
            endwhile;
            ?>
        </div>

        <?php
        get_template_part('parts/lies');
        ?>

    </div>


<?php get_footer();
