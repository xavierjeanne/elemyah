<?php
/*
  Created by Pierre Bernardeau.
  For Influa
  Date: 13/09/2018
  Time: 09:06
  
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

$id=get_option( 'page_for_posts' );
$post=get_post($id);
setup_postdata($post);


$bgimage = get_template_directory_uri() . '/assets/img/default.jpg';
if (has_post_thumbnail()) {
    $url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large', true);
    $bgimage = $url[0];
}
$titre=get_the_title();
$sstitre=get_field('sous_titre');

wp_reset_postdata();
?>

<div id="actualite">
  <div id="top" class="container-fluid top" style="background-image:url(<?= $bgimage; ?>);">
      <div class="in container">
        <h1><span><?= $titre; ?></span><br/>
            <?php if ($sstitre) {
                echo $sstitre;
            }
            ?>
        </h1>
      </div>
  </div>
  <div id="article" class="container">
    <?php
    $args=array(
                'post_type' => 'post',
                'posts_per_page'    => 6
    );
    $query= new WP_Query($args);
    while ( $query->have_posts() ):
      $query->the_post();
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;  query_posts("posts_per_page=6&paged=$paged"); 
      $titre = get_the_title();
      $image = get_template_directory_uri() . '/assets/img/default.jpg';
      if ( has_post_thumbnail() ) {
        $url   = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large', true );
        $image = $url[0];
      }
      $link = get_the_permalink();
      $cat  = get_the_category()[0]->name;
      ?>
       <div class="col-sm-6 col-xs-12 actu">
          <div class="col-sm-6 col-xs-12 img" data-expand-target>
            <img src="<?= $image; ?>" alt="<?= $titre; ?>">
            <span class="band"></span>
          </div>
          <div class="col-sm-6 col-xs-12 txt">
            <p class="cat"><?= $cat; ?></p>
            <p class="titre"><?= $titre; ?></p>
            <p class="lire"><a href="<?= $link; ?>" data-expand-link><?= __( '<span>+</span> lire l\'article', 'elemyah' ); ?></a></p>
          </div>
        </div>
        <?php endwhile; ?>
    </div>
     <div id="pagination" class="container">
        <?php
        global $wp_query;

        $big = 999999999; // need an unlikely integer
          echo paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'prev_next' => true,
            'prev_text' => __('«'),
            'next_text' => __('»'),
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages
          ) );
          ?>
        </div>
  </div>

<?php
get_footer();