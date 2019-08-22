<?php /*
    Template Name: Page Parent
    */
/*
 Created by Pierre Bernardeau.
 For Influa
 Date: 26/10/2018
 Time: 14:23

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

    <div id="parent">
        <div id="top" class="container-fluid" style="background-image:url(<?= $bgimage; ?>);height:535px;">
            <div class="in container">
                <h1><span><?= get_the_title(); ?></span><br/>
                    <?php if (get_field('sous_titre')) {
                        echo get_field('sous_titre');
                    }
                    ?>
                </h1>
            </div>
        </div>
        <div id="parent_cont" class="container">
            <?php
            $args = array(
                'post_parent' => get_the_ID(),
                'post_type' => 'page',
                'numberposts' => 9,     // Pas plus de 9 enfants !
                'post_status' => 'publish'
            );
            $children = get_children($args);
            $nb_children = count($children);
            switch ($nb_children) {
                case 1;
                    $case_array = ['col-sm-12'];
                    break;
                case 2;
                    $case_array = ['col-md-6', 'col-md-6'];
                    break;
                case 3;
                    $case_array = ['col-md-4', 'col-md-4', 'col-md-4'];
                    break;
                case 4;
                    $case_array = ['col-md-6', 'col-md-6', 'col-md-6', 'col-md-6'];
                    break;
                case 5;
                    $case_array = ['col-md-6', 'col-md-6', 'col-md-4', 'col-md-4', 'col-md-4'];
                    break;
                case 6;
                    $case_array = ['col-md-4', 'col-md-4', 'col-md-4', 'col-md-4', 'col-md-4', 'col-md-4'];
                    break;
                case 7;
                    $case_array = ['col-md-6', 'col-md-6', 'col-md-4', 'col-md-4', 'col-md-4', 'col-md-6', 'col-md-6'];
                    break;
                case 8;
                    $case_array = ['col-md-6', 'col-md-6', 'col-md-4', 'col-md-4', 'col-md-4', 'col-md-4', 'col-md-4', 'col-md-4'];
                    break;

                case 9;
                    $case_array = ['col-md-4', 'col-md-4', 'col-md-4', 'col-md-4', 'col-md-4', 'col-md-4', 'col-md-4', 'col-md-4', 'col-md-4'];
                    break;
            }
            $count = 0;
            foreach ($children as $child):
                $post = $child;
                setup_postdata($post);
                $titre = get_the_title();
                $first = explode(' ', trim($titre))[0];
                $reste = substr($titre, strlen($first));
                $lien = get_the_permalink();
                $image = get_template_directory_uri() . '/assets/img/default.jpg';
                if (has_post_thumbnail()) {
                    $url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large', true);
                    $image = $url[0];
                }
                ?>
                <div class="case col-xs-12 <?= $case_array[$count]; ?>" data-expand-target>
                    <div class="in" style="background-image: url(<?= $image; ?>);height:510px;">
                        <div class="titre">
                            <a href="<?= $lien; ?>" data-expand-link>
                <span>
                    <?= $first; ?>
                </span><br/>
                                <?= $reste; ?><br/>
                                <em>
                                    <?= __('En savoir <i>+</i>', 'elemyah'); ?>
                                </em>
                            </a>
                            <span class="band"></span>
                        </div>
                    </div>
                </div>
                <?php
                $count++;
                wp_reset_postdata();
            endforeach;
            ?>

        </div>
    </div>
     <div id="slider" class="container-fluid hidden-xs">
        <div class="vignette"><a href="http://www.bordeaux-metropole.fr/" target="_blanck"><img src="<?php echo get_template_directory_uri();?>/assets/img/bdx.jpg"></a></div>
        <div class="vignette"><a href="https://www.girondins.com/fr" target="_blanck"><img src="<?php echo get_template_directory_uri();?>/assets/img/fcgb.jpg"></a></div>
        <div class="vignette"><a href="https://www.thalesgroup.com/fr" target="_blanck"><img src="<?php echo get_template_directory_uri();?>/assets/img/thales.jpg"></a></div>
        <div class="vignette"><a href="https://www.ubbrugby.com/" target="_blanck"><img src="<?php echo get_template_directory_uri();?>/assets/img/ubb.jpg"></a></div>
        <div class="vignette"><a href="https://www.ffr.fr/" target="_blanck"><img src="<?php echo get_template_directory_uri();?>/assets/img/ffr.jpg"></a></div>
        <div class="vignette"><a href="https://coachingforleaders.com/" target="_blanck"><img src="<?php echo get_template_directory_uri();?>/assets/img/coaching4leader.jpg"></a></div>
    </div>
<?php get_footer();
