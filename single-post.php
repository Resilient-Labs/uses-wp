<?php
/**
* The template for displaying all single posts.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
* @package Teen_Empowerment
*/


get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
      <div class="post-banner">
        <div class="post-image">
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
    </div>
    <section class="wrapper flexbox">
			<div class="insert-content">
				<?php
				while ( have_posts() ) : the_post();
				//shows content withoutout images
				echo only_content();
			endwhile;//end while loop
			//restore original post
			wp_reset_postdata();
			//get_template_part( 'template-parts/content', get_post_format() );

			//the_post_navigation();
			?>
		</div>
		<div class="insert-images">
			<?php
			while ( have_posts() ) : the_post();
			$szPostContent = $post->post_content;
			$szSearchPattern = '~<img [^\>]*\ />~';

			// Run preg_match_all to grab all the images and save the results in $aPics
			preg_match_all( $szSearchPattern, $szPostContent, $aPics );

			// Check to see if we have at least 1 image
			$iNumberOfPics = count($aPics[0]);

			if ( $iNumberOfPics > 0 ) {
				// Now here you would do whatever you need to do with the images
				// For this example the images are just displayed
				for ( $i=0; $i < $iNumberOfPics ; $i++ ) {
					echo $aPics[0][$i];
				};
			};
		endwhile;//end while loop
		//restore original post
		wp_reset_postdata();
		?>
	</div>

</main><!-- #main -->
</div><!-- #primary -->
</section>
<?php
get_footer();
?>
