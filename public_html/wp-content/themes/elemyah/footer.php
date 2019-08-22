<footer>
    <div class="container-fluid" style="background-image: url(<?= get_template_directory_uri() . '/assets/img/footer.png'; ?>);height:615px;">
      <div class="foot">
        <div id="lefooter" class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <div class="row">
                        <div class="hidden-xs col-sm-2">
                            <img  src="<?= get_template_directory_uri() . '/assets/img/logo_footer.png'; ?>" alt="<?php bloginfo('name'); ?>"style="width:100px;height:100px;">
                        </div>
                        <div class=" col-xs-12 col-sm-10">
                          <p class="titre">Le premier élément<br/> <span>c'est vous !</span></p>
                          <p class="sig">Laurent Ardouin</p>
                      </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-12 col-xs-12 contact">
                         <a href="<?=get_permalink(__('32','elemyah'));?>" class="pill"><i class="fas fa-arrow-right"></i> <?= __( 'Contact', 'elemyah' ); ?></a>
                     </div>
                 </div>
             </div>
             <div class="col-sm-3 col-xs-12 menu">
                <!--      MENU 2 EN FOOTER         --><?php
                wp_nav_menu(array(
                    'menu' => 'menu2',
                    'theme_location' => 'menu2',
                    'depth' => 2,
                    'container' => 'div',
                    'container_class' => 'thefooter',
                    'container_id' => 'thefooter',
                    'menu_class' => 'menufooter'
                ));?>
            </div>
            <div class="col-sm-3 col-xs-12 menu2">     
            <!--      MENU 2 EN FOOTER         --><?php
            wp_nav_menu(array(
                'menu' => 'menu3',
                'theme_location' => 'menu3',
                'depth' => 2,
                'container' => 'div',
                'container_class' => 'thefooter',
                'container_id' => 'thefooter',
                'menu_class' => 'menufooter'
                 ));?>
            </div>
          </div>
        </div>
      <div id="subfooter" class="container">
        <div id="leftsubfooter" class="col-sm-12 col-xs-12">
          <span>Elemyah <?= date('Y');?> © - tous droits réservés</span><a href="https://www.influa.com" target="_blanck">Influa, Agence Web Bordeaux ©2018</a><a href="<?=get_permalink(__('30','elemyah'));?>"> Mentions légales</a>
        </div>
      </div>
    </div>
  </div>
</footer>
<?php

wp_footer(); ?>
 
</body>
</html>