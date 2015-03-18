<?php

add_filter('http_request_timeout', function(){
        return 10;
});

add_action( 'wp_enqueue_scripts', 'add_mailchimp_goal_tracking' );
add_action( 'wp_enqueue_scripts', 'add_analytics_event_tracking' );
add_action( 'wp_head', 'add_font_awesome' );
add_action('wp_footer', 'add_google_tag_manager');
add_action('wp_footer', 'add_pinterest_hover_button');
add_filter( 'upstart_homepage_features', '__return_false' );
add_filter( 'upstart_homepage_testimonials', '__return_false' );
add_filter( 'upstart_homepage_featured_products', '__return_false' );
add_filter( 'upstart_homepage_blog_posts', '__return_false' );
add_filter( 'upstart_homepage_our_team', '__return_false' );
add_filter( 'wp_nav_menu_items', 'woo_custom_add_sociallink_navitems', 10, 2 );

function add_font_awesome() {
	?><link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"><?php
}
 
function woo_custom_add_sociallink_navitems ( $items, $args ) {
	// Bandcamp
	/*$items .= '<a href="http://simonhudson.bandcamp.com" title="Bandcamp" alt="Bandcamp"><img src="https://s1.bcbits.com/img/buttons/bandcamp_60x23_white.png"></a>';*/
	$items .= '<a href="http://simonhudson.bandcamp.com" title="Bandcamp" alt="Bandcamp" target="_blank"><img src="https://s1.bcbits.com/img/buttons/bandcamp_130x27_white.png" width="65" height="13"></a>';
	// Reverbnation
	$items .= '<a href="http://www.reverbnation.com/simonhudsonband" title="ReverbNation" alt="ReverbNation" target="_blank"><img src="' . get_stylesheet_directory_uri() . '/reverbnation_logo.svg" width="95px" height="40px" /></a>';
	// Soundcloud
	$items .= '<a href="https://soundcloud.com/simonhudsonband" title="Soundcloud" alt="Soundcloud" target="_blank"><i class="fa fa-soundcloud"></i></a>';
	//$items .= '<li><iframe allowtransparency="true" scrolling="no" frameborder="no" src="https://w.soundcloud.com/icon/?url=http%3A%2F%2Fsoundcloud.com%2Fsimonhudsonband&color=orange_transparent&size=24" style="width: 30px; height: 30px;"></iframe></li>';
	// Tumblr
	$items .= '<a href="http://simonhudsonband.tumblr.com/" title="Tumblr" alt="Tumblr" target="_blank"><i class="fa fa-tumblr"></i></a>';
	// Flickr
	$items .= '<a href="https://www.flickr.com/photos/simonhudson/" title="Flickr" alt="Flickr" target="_blank"><i class="fa fa-flickr"></i></a>';
	// Reverbnation
	/*$items .= '<a href="http://www.reverbnation.com/simonhudsonband" title="ReverbNation" alt="ReverbNation" target="_blank"><object type="image/svg+xml" data="' . get_stylesheet_directory_uri() . '/reverbnation_logo.svg"></object></a>';*/
	return $items;
} // End woo_custom_add_sociallink_navitems()

function add_mailchimp_goal_tracking() {
        wp_enqueue_script( 'mailchimp_goal_tracking', get_stylesheet_directory_uri() . '/mailchimp_goal_tracking.js', array(), '1.0.0', true );
}

function add_analytics_event_tracking() {
        wp_enqueue_script( 'analytics_goal_tracking', get_stylesheet_directory_uri() . '/analytics_goal_tracking.js', array(), '1.0.0', true );
}

/**
 * Load the stylesheet from the parent theme with theme version added automatically.
 *
 */
function theme_name_parent_styles() {
 
	$parent = get_template();
	$parent = wp_get_theme( $parent );
 
	// Enqueue the parent stylesheet
	wp_enqueue_style( 'theme-name-parent-style', get_template_directory_uri() . '/style.css', array(), $parent['Version'], 'all' );
 
	// Enqueue the parent rtl stylesheet
	if ( is_rtl() ) {
		wp_enqueue_style( 'theme-name-parent-style-rtl', get_template_directory_uri() . '/rtl.css', array(), $parent['Version'], 'all' );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_name_parent_styles' );


/**
 * Load child theme sytlesheets
 * 
 */
function child_theme_styles() {
	wp_dequeue_style( 'parent-theme-style' );
	wp_enqueue_style( 'child-theme-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'child_theme_styles' );


// Register style sheet.
add_action( 'wp_enqueue_scripts', 'add_style_sheet', 20 );

/**
 * Register style sheet.
 */
function add_style_sheet() {
	wp_register_style( 'style-sheet-1', get_stylesheet_directory_uri() . '/style1.css' );
	wp_enqueue_style( 'style-sheet-1' );
}


function add_google_tag_manager() { ?>
<!-- Paste your Google code here -->

<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-NLTJGL"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NLTJGL');</script>
<!-- End Google Tag Manager -->

<?php }

function add_pinterest_hover_button() { ?>

<!-- Please call pinit.js only once per page -->
<script type="text/javascript" async  data-pin-shape="round" data-pin-hover="true" src="//assets.pinterest.com/js/pinit.js"></script>

<?php } ?>
