<?php
/**
 * The header of our theme.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package United_South_End_Settlements
 */

get_header();

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'uses' ); ?></a>

	<header id="masthead" class="site-header col-xs-12" role="banner">
		<div class="site-branding">
            <nav>
                <div class="top-nav">
                    <div class="top-logo">
                        <?php
                        // Query for all of the posts that have a tag of logo
                        $args = array(
                            // Arguments for your query.
                            'tag' => 'logo'
                        );

                        // Custom query.
                        $query = new WP_Query( $args );
                        // Check that we have query results.
                        if ( $query->have_posts() ) {
                            // Start looping over the query results.
                            while ( $query->have_posts() ) {
                                $query->the_post();
                                echo '<a href="'.home_url().'" >';
                                $img = strip_tags(the_content());
                                echo '</a>';
                            }
                        }

                        // Restore original post data.
                        wp_reset_postdata();
                        ?>
                    </div>
                    <div class="top-menu">
                    <?php
                    $TopMenu = array(
                        'menu'=> 'Top Menu',
                        'container'       => false,
                        'container_class' => false,
                        'menu_class' => false,
                    );
                    wp_nav_menu($TopMenu);

                    ?>
                    </div>
                </div>
                <div class="main-menu">
                    <?php
                    $MainMenu = array(
                        'menu'=> 'Main Menu',
                        'container'       => false,
                        'container_class' => false,
                        'menu_class' => false,
                    );
                    wp_nav_menu($MainMenu);

                    ?>
                </div>
            </nav><!-- site-navagation -->
            <?php if( is_front_page() ):?>
            <div class="home-banner-overlay">
            	<div class="home-banner">
                <div class="header-content">
                    <div class="home-logo">
                        <?php
                        // Query for all of the posts that have a tag of logo
                        $args = array(
                            // Arguments for your query.
                            'tag' => 'mainlogo'
                        );

                        // Custom query.
                        $query = new WP_Query( $args );
                        // Check that we have query results.
                        if ( $query->have_posts() ) {
                            // Start looping over the query results.
                            while ( $query->have_posts() ) {
                                $query->the_post();
//                            echo '<a href="'.home_url().'" >';
                                $img = strip_tags(the_content());
                                echo '</a>';
                            }
                        }

                        // Restore original post data.
                        wp_reset_postdata();
                        ?>
                    </div>
                    <div class="tag-line">
                        <h5>neighbors helping neighbors since 1891</h5>
                    </div>
                </div>
								<div class="hero-image">
								<?php
								//getting featured image and setting it as hero image
								$thumb_id = get_post_thumbnail_id();
								$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
								$thumb_url = $thumb_url_array[0];
								if (has_post_thumbnail()) {
										echo the_post_thumbnail('full');
								}
								wp_reset_postdata();
								?>
							</div>
  <?php endif; ?>

            </div>
        </div><!-- .site-branding -->
	</header><!-- #masthead -->
