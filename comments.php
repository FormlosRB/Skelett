<div id="kommentare_container">
	<div id="comments" class="comments-area">
		<?php if ( have_comments() ) : ?>
		<div class="comments_inner">
			

			<h3 class="comments-title">
				<?php
					printf( _n( 'Ein Kommentar zu &ldquo;%2$s&rdquo;', '%1$s Kommentare zu &ldquo;%2$s&rdquo;', get_comments_number() ),
						number_format_i18n( get_comments_number() ), get_the_title() );
				?>
			</h3>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
				<h1 class="screen-reader-text"><?php _e( 'Comment navigation'); ?></h1>
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; &auml;ltere Kommentare') ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'neuere Kommentare &rarr;') ); ?></div>
			</nav><!-- #comment-nav-above -->
			<?php endif; // Check for comment navigation. ?>

			<ul class="comment-list">
				<?php
					wp_list_comments( 'type=comment&callback=my_comment' ); 
				?>
			</ul><!-- .comment-list -->

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
				<h1 class="screen-reader-text"><?php _e( 'Comment navigation' ); ?></h1>
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; &auml;ltere Kommentare') ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'neuere Kommentare &rarr;' ) ); ?></div>
			</nav><!-- #comment-nav-below -->
			<?php endif; // Check for comment navigation. ?>

			<?php if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php _e( 'Keine Kommentare mehr m&ouml;glich.'); ?></p>
			<?php endif; ?>

			


		</div>
		<?php endif; // have_comments() ?>
	</div><!-- #comments -->

</div>
<div class="kommentar_formular">
	<div class="kommentar_formular_inner">
		<?php comment_form(); ?>
	</div>
</div>