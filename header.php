<?php
/**
 * Header section for our theme
 *
 * @package WordPress
 * @subpackage Integral
 * @since Integral 1.0
 */
?>
<?php global $integral; ?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href='//fonts.googleapis.com/css?family=Alef' rel='stylesheet'>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>    

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">

            <div class="container-fluid">

                <div class="container-header">

                    <div class="navbar-header">
						<div id='navbar-toggle-container'> <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ ADDED CONTAINER FOR NAVBAR TOGGLE FOR OPTIMISING SITE CSS. AM 07/03/17 ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse-child">

								<span class="sr-only"><?php _e( 'Toggle navigation', 'integral' ); ?></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>

							</button>
						</div>

                        <?php

                            $integral_logo = get_theme_mod('integral_logo');

                            if(isset($integral_logo) && $integral_logo != ""):

                                echo '<h1 class="site-title"><a href="'.esc_url( home_url( '/' ) ).'" class="navbar-brand">';

                                    echo '<img class="img-responsive" src="'.$integral_logo.'" alt="'.get_bloginfo('title').'">';

                                echo '</a></h1>';

                            else:

                                echo '<h1 class="site-title"><a href="'.esc_url( home_url( '/' ) ).'" title="'.get_bloginfo('title').'" class="navbar-brand">';

                                    echo ''.get_bloginfo('title').'';

                                echo '</a></h1>';

                            endif;

                        ?>
						
						<?php // ~~~~~~~~~~~~ NEW CODE TO INCLUDE MINI CART AND CURRENT SHOP TOTAL IN HEADER. AM 15/02/17 ~~~~~~~~~~~~ ?>
						<?php // ~~~~~~~~~~~~ WILL RUN CLEANLY ONLY IF WOOCOMMERCE IS ACTIVATED. ~~~~~~~~~~~~~~ ?>
						<div id="meta-container"> <!-- ~~~~~~~~~~~~~~~~~~~~~~~ ADDED 31/03/17 ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
							<?php // ~~~~~~~~~~~~~~~~~~~~~~~ ADDED 31/03/17 ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
							
							
								
							function logInOut($arg) {
								if (is_user_logged_in()) {
									switch ($arg) {
										case 'home' : 
											$url = wp_logout_url();
											break;
										case 'shop' :
											$url = wp_logout_url();
											break;
										case 'confirm' :
											$url = wp_logout_url();
											break;
										case 'other' :
											$url = wp_logout_url();
											break;
									}
									$current_user = wp_get_current_user();
									echo '<li class="tester"><div id="usernameContainer"><p>Logged in as <b>' . $current_user->user_login . '</b>.</p></div><div id="userMenuCollapse" href="#"><a href="#" class="fa fa-chevron-down" aria-hidden="true"></a></div></li>';
									echo '<div id="meta-subContainer">';
										echo '<li class="myAccountItem hiddenItem"><a href="'. esc_url(get_permalink( get_option('woocommerce_myaccount_page_id'))) . '"><p>My Account</p></li>';
										echo '<li class="logOutItem hiddenItem"><a href="'. esc_url($url) . '"><p>Log Out</p></a></li>';
									echo '</div>';
								}
								elseif (!is_user_logged_in()) {
									switch ($arg) {
										case 'home' :
											$url = wp_login_url();
											break;
										case 'shop' :
											$url = wp_login_url();
											break;
										case 'confirm' :
											return;
											break;
										case 'other' :
											$url = wp_login_url();
											break;	
									}
									echo '<li id="login"><a href="'. esc_url($url) .'"><p>Log In</p></a></li>';
								}
							}
								
							if (is_home()) {
								logInOut('home');
							}
							elseif (is_shop()) {
								logInOut('shop');
							}
							elseif (is_wc_endpoint_url( 'order-received' )) {
								logInOut('confirm');
							}
							else {
								logInOut('other');
							}
								
								
								
							//	if ((is_user_logged_in() && !is_shop()) || (is_user_logged_in() && !is_home())) { // ~~~~~~~~~~~~~~~~~~~~~~~ ADDED 31/03/17 ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
							//		echo '<script>alert("user shouldn\'t be logged on here if on shop or home page");</script>';
							//		echo '<li><a href="'. get_permalink( get_option('woocommerce_myaccount_page_id')) . '">My Account</li>';
							//		echo '<li><a href="'. wp_logout_url( get_permalink()) . '">Log Out</a></li>'; // ~~~~~~~~~~~~~~~~~~~~~~~ ADDED 31/03/17 ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
							//	} // ~~~~~~~~~~~~~~~~~~~~~~~ ADDED 31/03/17 ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
							//	elseif (!is_user_logged_in() && is_shop()) {
							//		echo '<li><a href="'. wp_login_url(get_permalink(woocommerce_get_page_id('shop'))) .'">Log In</a></li>';
							//	}
							//	elseif (!is_user_logged_in() && is_home()) {
							//		echo '<li><a href="'. wp_login_url(home_url()) .'">Log In</a></li>';
							//	}
							//	elseif (is_user_logged_in() && is_home()) {
							//		echo '<li><a href="'. get_permalink( get_option('woocommerce_myaccount_page_id')) . '">My Account</li>';
							//		echo '<li><a href="'. wp_logout_url(home_url()) . '">Log Out</a></li>';
							//	}
							//	elseif (is_user_logged_in() && is_shop()) {
							//		echo '<script>alert("user logged in and on shop page");</script>';
							//		echo '<li><a href="'. get_permalink( get_option('woocommerce_myaccount_page_id')) . '">My Account</li>';
							//		echo '<li><a href="'. wp_logout_url(get_permalink(woocommerce_get_page_id('shop'))) . '">Log Out</a></li>';
							//	}
							//	elseif (!is_user_logged_in()) { // ~~~~~~~~~~~~~~~~~~~~~~~ ADDED 31/03/17 ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 
							//		echo '<li><a href="'. wp_login_url(get_permalink()) .'">Log In</a></li>'; // ~~~~~~~~~~~~~~~~~~~~~~~ ADDED 31/03/17 ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
							//	} // ~~~~~~~~~~~~~~~~~~~~~~~ ADDED 31/03/17 ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
							
							
							?> <!-- ~~~~~~~~~~~~~~~~~~~~~~~ ADDED 31/03/17 ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
							<div id="cart-container">				
								<a id="cart-contents" href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>">
									<span id="cart-icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
									<span id="subtotal"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span>
									<span id="count"><?php echo wp_kses_data( sprintf( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'e-commerce' ), WC()->cart->get_cart_contents_count() ) );?></span>
								</a>							
							</div>
						</div>
						
			
						<?php if ( has_nav_menu( 'primary' ) ) : ?>

                        <?php
                            wp_nav_menu( array(
                                'menu'              => 'primary',
                                'theme_location'    => 'primary',
                                'depth'             => 3,
                                'container'         => 'div',
                                'container_class'   => 'collapse-child navbar-collapse-child',
                                'container_id'      => 'navbar-ex-collapse-child',
                                'menu_class'        => 'nav navbar-nav-child navbar-right-child',
                                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                                'walker'            => new wp_bootstrap_navwalker())
                            );
                        ?>

						<?php endif; ?>			
                    </div>
					

               </div>

            </div>

        </nav>