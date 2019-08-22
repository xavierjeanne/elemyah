<?php /*
    Template Name: Page de mentions légales
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

get_header();?>
<div id="mentions" class="container">
    <?php echo get_the_content_with_formatting();?>
</div>
<?php get_footer();
