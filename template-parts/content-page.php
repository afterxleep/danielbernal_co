<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package danielbernal_co
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php danielbernal_co_entry_header(); ?>

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() || wp_link_pages( array( 'echo' => false ) ) ) : ?>
		<div class="entry-footer">
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'danielbernal-co' ),
					'after'  => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );

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
	<?php endif; ?>
</article><!-- #post-## -->
