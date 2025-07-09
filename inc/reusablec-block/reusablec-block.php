<?php
/*
 * Reusable Content Blocks
 */

if ( ! defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly


//init Reusable Content Blocks
add_action( 'init', 'rcb_plugin_init' );

function rcb_plugin_init() {
	
	// Include plugin style
	wp_enqueue_style( 'reusablec-block-css', plugins_url( '/includes/css/reusablec-block.css', __FILE__ ) );
		
	// Include the code that generates the options page.
	require_once dirname( __FILE__ ) . '/includes/options.php';
	
	//include post type register code 
	require_once dirname( __FILE__ ) . '/includes/reusablec-block-post-type.php';

}

//if enabled widget include code 
if (get_option('rcb_enable_widget')) {
	require_once dirname( __FILE__ ) . '/includes/widget.php';
}

//add wp bakery element
if (  defined( 'WPB_VC_VERSION' ) ) {
	
	// enable wpbakery for Reusable block post type by default
	if(function_exists('vc_set_default_editor_post_types')) {
        vc_set_default_editor_post_types(array('page', 'lunex_blocks'));
		//For The7
		add_filter('presscore_mod_js_composer_default_editor_post_types', 'rcb_make_wpb_defult_reusable_block');
    }
	
	//add WPBakery element for Reusable Content Blocks
	require_once dirname( __FILE__ ) . '/includes/wpb-reusecb-element.php';	
}

			
//get contnet function
function rcb_get_content_func( $atts ) {

	$rcbval = shortcode_atts( array(
		'data_source' => '',
		'id' => '',
		'othe_id' => '',
	), $atts );
	
	$pagid = ( $rcbval['data_source'] == 'db_other' ) ? $rcbval['othe_id'] : $rcbval['id'];
	$elmntrbuilt = get_post_meta( $pagid, '_elementor_edit_mode', true );

	if( absint($pagid) ) {
	
	//retun if used same page ID 
		if(get_the_ID() == $pagid ) {
			return __('Oops! You are trying to display contnet of this page in this page itself using shortcode?', 'lunex-toolkit');
		}
		
		//beaver bulider support
		if ( class_exists( 'FLBuilder' ) && FLBuilderModel::is_builder_enabled( $pagid ) ) {

			FLBuilder::enqueue_layout_styles_scripts_by_id( $pagid );
			
			// Print the styles if we are outside of the head tag.
			if ( ! doing_action( 'wp_enqueue_scripts' ) ) {
				wp_print_styles();
			}
			
			FLBuilder::render_content_by_id( $pagid );

		}
		//elementor support
		if (  class_exists( 'Elementor\Plugin') && $elmntrbuilt ) {

			return Elementor\Plugin::$instance->frontend->get_builder_content( $pagid, $with_css = false );
		}
		
		
		else {
			$page_data = get_post( $pagid );

			if ( get_option('rcb_hide_unpub') && $page_data->post_status !== 'publish') {
				return;
			}

			
			$content = apply_filters('the_content', $page_data->post_content);
			
			//get wpbakery css
			if ( class_exists( 'Vc_Base' ) ) {
				$vc = new Vc_Base;
				$vc->addPageCustomCss( $pagid );
				$vc->addShortcodesCustomCss( $pagid );

			}
					
			//get inline custom css from post meta
			$css = rcb_get_css_from_meta($pagid); 
			$content .= $css;
			
			//filter for further modification scenarios
			$content = apply_filters('rcb_content_filter', $content);
			
			return $content;
			}
		
	
	}
	
	else {
		return __('Invlaied ID', 'lunex-toolkit');
	}
}

//register shortcode
add_shortcode( 'lunex_block', 'rcb_get_content_func' );

//fucntion for template call
function lunex_block_by_id( $id ) {
	echo rcb_get_content_func ( array('id' => $id) );
}


//get inline custom css from post meta
function rcb_get_css_from_meta( $id ) {
	
	$rcbcss_inline_meta = array();
	
	if(get_option('rcb_css_metakeys')) {
		$rcbcss_inline_meta = explode("\n", trim(get_option('rcb_css_metakeys')));

	}

	//The7 theme support
	$theme = wp_get_theme(); 
	if('The7' == $theme->name || 'The7' == $theme->parent_theme) {
		$rcbcss_inline_meta[] = 'the7_shortcodes_inline_css';
	}

	$rcbcss_inline_meta[] = '_wpb_shortcodes_custom_css';
	$rcbcss_inline_meta[] = '_wpb_post_custom_css';
	//use this filter to add metakeys of other themes and addons
	$rcbcss_inline_meta = apply_filters( 'rcb_add_css_meta_keys', $rcbcss_inline_meta );

	if ( !empty( $rcbcss_inline_meta ) ):
		$css = '';
		foreach($rcbcss_inline_meta as $metakey ) {
			$rcb_inline_css = get_post_meta( $id, $metakey, true );
	
			if ( ! empty( $rcb_inline_css) ) {
				$css .= '<style type="text/css" data-type="rcb-'.$metakey.'-'.$id.'">';
				$css .= maybe_unserialize($rcb_inline_css);
				$css .= '</style>';
			}
		}
		
		return $css;
		
	endif;
	
	//siteorigin support
	if ( class_exists( 'SiteOrigin_Panels' ) ) {
		$renderer = SiteOrigin_Panels::renderer();
		$renderer->add_inline_css( get_the_ID(), $renderer->generate_css( $id ) );
	}
}

//get resuable block post list
function rcb_get_posts_as_options( $selected ) {
	
	$posts = get_posts( array( 
		'post_type' => 'lunex_blocks',
		'posts_per_page' => -1
	) );
	
	$rcpost = '';
	
	foreach ( $posts as $post ) {
			$postID = $post->ID;
			$sel = '';
			if ($selected == $postID) {
				$sel = ' selected';
			}
		$rcpost .='<option value="'.$postID.'"'.$sel.' >'.
			get_the_title( $postID ).'</option>';
	}
	
	return $rcpost;				
}

//make wpb default for Resuable block post types
function rcb_make_wpb_defult_reusable_block( $post_types ) {
		$post_types[] = 'lunex_blocks';
		return $post_types;
}
?>