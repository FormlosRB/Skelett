<?php


/* Navigationen erstellen
 * ---------------------------------- */
function register_my_menu() {
  register_nav_menu('main_nav',__( 'Hauptnavigation' ));
  register_nav_menu('meta_nav',__( 'Meta-Navigation' ));
  register_nav_menu('footer_nav',__( 'Footer-Navigation' ));
}
add_action( 'init', 'register_my_menu' );


/* Vorschaubilder für Seiten ermöglichen 
 * ---------------------------------- */
add_theme_support( 'post-thumbnails' ); 



/* Logo zum Hochladen 
 * ---------------------------------- */
add_theme_support( 'custom-logo' );



/* Title ermöglichen 
 * ---------------------------------- */
add_theme_support( 'title-tag' );




/* Footer bearbeitbar machen
 * ---------------------------------- */
register_sidebar( array(
	'name' => 'Footer Inhalte',
	'id' => 'footer-sidebar',
	'description' => 'Appears in the footer area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
	)
);



/* Sidebar bearbeitbar machen
 * ---------------------------------- */
register_sidebar( array(
	'name' => 'Rechte Sidebar Inhalte',
	'id' => 'right-sidebar',
	'description' => 'Appears in the right sidebar area',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
	)
);

/* Stylesheet inkludieren
 * ---------------------------------- */
function formlos_load_styles() {
	if (!is_admin()) {
		wp_enqueue_style( 'style', get_stylesheet_uri() );
	}
}
add_action('get_header', 'formlos_load_styles');


/* Javascript inkludieren
 * ---------------------------------- */
function formlos_load_scripts() {
	if (!is_admin()) {
		wp_enqueue_script( 'sticky-script', get_stylesheet_directory_uri() . '/js/jquery.sticky.js', array( 'jquery' ) );
		wp_enqueue_script( 'main-js', get_stylesheet_directory_uri() . '/js/main.js', array( 'jquery' ) );
		wp_enqueue_script( 'ga-js', get_stylesheet_directory_uri() . '/js/ga.js', array( 'jquery' ) );
	}
}
add_action('get_header', 'formlos_load_scripts');


/* SVG Dateien im Upload erlauben
 * ---------------------------------- */
function formlos_svg ( $svg_mime ){
	$svg_mime['svg'] = 'image/svg+xml';
	return $svg_mime;
}
add_filter( 'upload_mimes', 'formlos_svg' );



/* Zusätzliche Funktionen Imagesizes, Kommentare, Navigation

vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv*/




/* Eigene Bildgröße
 * ---------------------------------- 

add_image_size( 'neue_größe', breite(int), höhe(int) , true );*/


/* Navigationen bearbeiten
 * ---------------------------------- 
add_filter( 'walker_nav_menu_start_el', 'generate_nav_images', 20, 4 );

function generate_nav_images( $item_output, $item, $depth, $args ) {
	

	if ( $depth === 1 )

	{
		$category = get_category_by_slug( $item_output );

		$cat_id = $category->cat_ID;

		$pod = pods( 'category' );
		$pod->fetch( $cat_id );
		$bild_array = $pod->get_field( 'bild' )[ 0 ];
		//var_dump($bild_array);
		$bild_url = $bild_array[ 'guid' ];
		
		$thumbnailURL = wp_get_attachment_image_src($bild_array[ 'ID' ], 'nav-size');
        $dom = new DOMDocument(); //DOM Parser because RegEx is a terrible idea
        $dom->loadHTML($item_output); //Load the markup provided by the original walker
        $final_html = $dom->createDocumentFragment(); //Leeres Element für gesamtes HTML
		
  		$html_thumbnail_image_link = '<a class="sub_nav_link" style="background:url('."'";
		$html_thumbnail_image_link .=	$thumbnailURL[0];
		$html_thumbnail_image_link .=	"') center center no-repeat; background-size:cover;".'"';
		$html_thumbnail_image_link .= ' href="'. $item-> url .'">';
		$html_thumbnail_image_link .='<span class="link_text"> '.$item->title.'</span>';
		$html_thumbnail_image_link .='</a>';
		
				      
		$final_html->appendXML($html_thumbnail_image_link); //Apply image data via string
        
        $menu_node = $dom->getElementsByTagName('a')->item(0);
    	$menu_node->parentNode->replaceChild($final_html, $menu_node); 
        
       
        $item_output = $dom->saveHTML(); //Replace the original output

	}
	return $item_output;
}*/


/* Kommentare selber steuern
 * ---------------------------------- 

function my_comment($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }?>
    <<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>"><?php 
    if ( 'div' != $args['style'] ) { ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
    } ?>
        <div class="comment-author vcard"><?php 
            if ( $args['avatar_size'] != 0 ) {
                echo get_avatar( $comment, 120 ); 
            } 
            printf( __( '<cite class="fn">%s</cite>' ), get_comment_author_link() ); ?>
			<span class="comment-meta commentmetadata">
				<?php
					printf( 
						__('%1$s at %2$s'), 
						get_comment_date(),  
						get_comment_time() 
					); ?>
				<?php 
				edit_comment_link( __( '(Edit)' ), '  ', '' ); ?>
			</span>
			<div class="clear"></div>
        </div><?php 
        if ( $comment->comment_approved == '0' ) { ?>
            <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em><br/><?php 
        } ?>
       

        <?php comment_text(); ?>

        <div class="reply"><?php 
                comment_reply_link( 
                    array_merge( 
                        $args, 
                        array( 
                            'add_below' => $add_below, 
                            'depth'     => $depth, 
                            'max_depth' => $args['max_depth'] 
                        ) 
                    ) 
                ); ?>
        </div><?php 
    if ( 'div' != $args['style'] ) : ?>
        </div><?php 
    endif;
}*/




?>