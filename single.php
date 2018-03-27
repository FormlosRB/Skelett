<?php get_header(); ?>


<div id="single_sidebar">
 <?php
		if(is_active_sidebar('single-sidebar')){
			dynamic_sidebar('single-sidebar');
		}
	?>
</div>
<div id="single_content">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
        <?php the_post_thumbnail( 'large' );   ?>
    <div class="entry">
        <?php the_content(); ?>
    </div>
    <?php endwhile; endif; ?>
       
</div>

<?php 
/* Einkommentieren wenn gebraucht

comments_template();
*/
?>

<div class="clear"></div>
 
<?php get_footer(); ?>