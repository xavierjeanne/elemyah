<?php
/*
  Created by Pierre Bernardeau.
  For Influa
  Date: 12/11/2018
  Time: 15:43
  
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
if (have_rows('pages_liees')): ?>
	<div id="pages_linked" class="container">
		<div class="h2"><?= __('<span>Elemyah</span> vous accompagne ...', 'elemyah'); ?></div>
		<?php
		while (have_rows('pages_liees')):
			the_row();
			$titre = get_sub_field('titre');
			$first = explode(' ', trim($titre))[0];
			$reste = substr($titre,strlen($first));
			$lien = get_sub_field('link');
			$image = get_sub_field('image');?>

			<div class="col-xs-12 col-sm-4 link" data-expand-target">
				<div class="in" style="background-image: url(<?= $image; ?>);height:510px;">
					<div class="titre">
						<a href="<?= $lien; ?>" data-expand-link>
                                <span>
                                    <?= $first; ?><br/>
                                </span>
							<?= $reste; ?><br/>
							<em>
								<?= __('En savoir <i>+</i>', 'elemyah'); ?>
							</em>
							<span class="band"></span>
						</a>
					</div>
				</div>
			</div>
			<?php
		endwhile;
		?>
	</div>
<?php
endif;