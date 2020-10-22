<?php
/**
 * Template part for displaying single posts.
 *
 * @package danielbernal_co
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		danielbernal_co_entry_meta();
		danielbernal_co_entry_header();
		danielbernal_co_post_thumbnail();
	?>

	<div class="entry-content">
		<?php the_content(); ?>

	</div><!-- .entry-content -->

	<div class="entry-footer">

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'danielbernal-co' ),
				'after'  => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );

			the_tags( '<ul class="post-tags light-text"><li>' . esc_html__( 'Tagged', 'danielbernal-co' ) . '</li><li>', '</li><li>', '</li></ul><!-- .post-tags -->' );

			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'danielbernal-co' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="post-edit-link">',
				'</span>'
			);
		?>
	</div><!-- .entry-footer -->


	<div class="entry-author-wrapper">
		<?php danielbernal_co_author_bio(); ?>
	</div>
</article><!-- #post-## -->
