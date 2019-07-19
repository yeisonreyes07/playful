<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Landing_Page_Yeison_Reyes
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

	<?php wp_head(); ?>


<body <?php body_class(); ?>>
	
	<header id="masthead" class="site-header container" >

		<div class="site-branding col-md-6">
			<?php
			if(has_custom_logo()){
				 
						the_custom_logo();
			}
			else{
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif;

			}
			
			
				
				 ?>

		</div><!-- .site-branding -->
<div class="col-md-6">
		<nav class="navbar navbar-expand-md navbar-light justify-content-center">
                        <button class="navbar-toggler mb-4" data-toggle="collapse" data-target="#nav_principal" aria-expanded="false" type="button">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <?php
                              $args = array(
                                   'menu_class' => 'navbar navbar-expand-lg navbar-dark pb_navbar pb_scrolled-light',
                                   'container_id' => 'primary-menu',
                                   'container_class' => 'collapse navbar-collapse justify-content-center  justify-content-lg-end text-uppercase',
                                   'theme_location' => 'menu_principal'
                              );

                              wp_nav_menu($args);

                         ?>
                    </nav><!-- #site-navigation -->
	
	      		</div><!-- Engloba la estructura del menu-->
	   					 </div>
     							 </div>
	</header><!-- #masthead -->


