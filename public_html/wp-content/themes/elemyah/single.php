<?php
/*
  Created by Pierre Bernardeau.
  For Influa
  Date: 20/09/2018
  Time: 13:53
  
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

get_header(); ?>
<div class="container">
  <div class="row"> </div>
      <div class="single_article col-sm-12 col-xs-12"> 
  
      <?php if (have_posts()) :
        while (have_posts()) : the_post(); ?>
          <div class="single_content">
             <?php the_content(); ?>
          </div>
        </div>
          <?php endwhile;?>
    <?php endif; ?>
  </div>
  <div  id="article" class="container">
    <h2>Vous aimerez aussi</h2>
    <?php
      $args=array('post_type' => 'post','posts_per_page'=> 2);
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
        <div class="col-sm-6 col-xs-12 actu">
          <div class="col-sm-6 col-xs-12 img" data-expand-target>
            <img src="<?= $image; ?>" alt="<?= $titre; ?>">
            <span class="band"></span>
          </div>
          <div class="col-sm-6 col-xs-12 txt">
            <p class="cat"><?= $cat; ?></p>
            <p class="titre"><?= $titre; ?></p>
            <a href="<?= $link; ?>" data-expand-link><?= __( '<span>+</span> lire l\'article', 'elemyah' ); ?></a>
          </div>
        </div>
      <?php endwhile; ?>
  </div>
</div>
<?php get_footer(); ?>