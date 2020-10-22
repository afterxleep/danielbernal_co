<?php
/**
 * Template part for displaying posts.
 *
 * @package danielbernal_co
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php danielbernal_co_entry_meta(); ?>
	<?php danielbernal_co_entry_header(); ?>
	<?php danielbernal_co_post_thumbnail(); ?>
	<div class="entry-summary">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'danielbernal-co' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'danielbernal-co' ),
				'after'  => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
