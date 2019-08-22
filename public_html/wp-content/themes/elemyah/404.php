<?php
/*
  Created by Pierre Bernardeau.
  For Influa
  Date: 13/09/2018
  Time: 09:15
  
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
 ?>
<div class="container erreur" style="background-image:url(<?= get_template_directory_uri() . '/assets/img/erreur.jpg'; ?>);height:600px;background-size:cover;">
    <p><span>Erreur 404</span><br/> La page demandée n'existe pas, vous devriez faire appel à un coach pour vous aiguiller<p>
</div>
<div id="pages_linked" class="container">
	<div class="h2"><?= __('<span>Elemyah</span> vous accompagne ...', 'elemyah'); ?></div>
		<div class="col-xs-12 col-sm-4 link" href="<?=get_permalink(__('34','elemyah'));?>">
			<div class="in" style="background-image: url(<?= get_template_directory_uri() . '/assets/img/coaching_entreprise.png'; ?>);width:350px;height:510px;">
				<div class="titre">
					<a href="<?=get_permalink(__('34','elemyah'));?>">
                        <span>
                             Coaching<br/>
                         </span>
							en entreprise<br/>
						<em>
							<?= __('En savoir <i>+</i>', 'elemyah'); ?>
						</em>
						<span class="band"></span>
					</a>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-4 link" href="<?=get_permalink(__('38','elemyah'));?>">
			<div class="in" style="background-image: url(<?= get_template_directory_uri() . '/assets/img/seminaire_entreprise.png'; ?>);width:350px;height:510px;">
				<div class="titre">
					<a href="<?=get_permalink(__('38','elemyah'));?>">
                        <span>
                             Séminaires<br/>
                         </span>
							 d'entreprise<br/>
						<em>
							<?= __('En savoir <i>+</i>', 'elemyah'); ?>
						</em>
						<span class="band"></span>
					</a>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-4 link" href="<?=get_permalink(__('36','elemyah'));?>">
			<div class="in" style="background-image: url(<?= get_template_directory_uri() . '/assets/img/formation.png'; ?>);width:350px;height:510px;">
				<div class="titre">
					<a href="<?=get_permalink(__('36','elemyah'));?>">
                        <span>
                            Formations<br/>
                         </span>
							sur mesure<br/>
						<em>
							<?= __('En savoir <i>+</i>', 'elemyah'); ?>
						</em>
						<span class="band"></span>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php

get_footer();