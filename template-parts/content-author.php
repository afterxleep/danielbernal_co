<?php
/**
 * The template for displaying Author Bio
 *
 * @package danielbernal_co
 */

if ( ! is_single() ) {
	return;
}
?>

<div class="entry-author">
	<div class="author-avatar">
		<?php
		/**
		 * Filter the author bio avatar size.
		 *
		 * @param int $size The avatar height and width size in pixels.
		 */
		$author_bio_avatar_size = apply_filters( 'danielbernal_co_author_bio_avatar_size', 80 );

		echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
		?>
	</div><!-- .author-avatar -->

	<div class="author-heading">
		<h2 class="author-title"><?php printf( esc_html__( 'Hi I\'m %s!', 'danielbernal-co' ), '<span class="author-name">' . get_the_author() . '</span>' ); ?></h2>
	</div><!-- .author-heading -->

	<p class="author-bio">
		<?php the_author_meta( 'description' ); ?>
	</p><!-- .author-bio -->
</div><!-- .entry-auhtor -->
