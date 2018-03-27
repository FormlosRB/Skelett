<?php

	get_header();
	
	?>

<section id="category_php" class="site-content">
	<h1><?php single_cat_title(); ?></h1>
	<!--div class="category_description">
		<?php $category = get_category( get_query_var( 'cat' ) );
			$cat_id = $category->cat_ID;?>
		<h3><?php category_description($cat_id); ?></h3>
	</div-->
	<div id="content">

	<?php 
	// Check if there are any posts to display
	if ( have_posts() ) :

	// The Loop
	while ( have_posts() ) : the_post(); ?>
	<div class="category_post">
		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<div class="category_post_image">
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a>
		</div>
		<div class="category_post_text">
			<?php the_excerpt(); ?>
			<a href="<?php the_permalink() ?>" class="category_btn">Jetzt lesen</a>
		</div>
		<div class="clear"></div>
	</div>
	

	<?php endwhile; endif; ?>
	</div>
</section>

	<?php
	get_footer();
?>