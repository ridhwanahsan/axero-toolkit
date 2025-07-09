<?php
/**
 * Register  Reusable Content Blocks post type.
 *
 * @package reusablec-block
 *
 */

$labels = [
    'name'               => _x('Axero Blocks', 'axero-toolkit'),
    'singular_name'      => _x('Axero Block', 'axero-toolkit'),
    'add_new'            => _x('Add New', 'axero-toolkit'),
    'add_new_item'       => _x('Add New Block', 'axero-toolkit'),
    'edit_item'          => _x('Edit Block', 'axero-toolkit'),
    'new_item'           => _x('New Block', 'axero-toolkit'),
    'all_items'          => _x('All Blocks', 'axero-toolkit'),
    'view_item'          => _x('View Blocks', 'axero-toolkit'),
    'search_items'       => _x('Search Blocks', 'axero-toolkit'),
    'not_found'          => _x('No Blocks found', 'axero-toolkit'),
    'not_found_in_trash' => _x('No Blocks found in Trash', 'axero-toolkit'),
    'parent_item_colon'  => '',
    'menu_name'          => _x('Axero Blocks', 'axero-toolkit'),
];

$args = [
    'labels'              => $labels,
    'public'              => true,
    'publicly_queryable'  => true,
    'exclude_from_search' => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => false,
    'query_var'           => true,
    'rewrite'             => ['slug' => 'axero_blocks'],
    'capability_type'     => 'post',
    'has_archive'         => false,
    'hierarchical'        => false,
    'menu_position'       => null,
    'menu_icon'           => 'dashicons-clipboard',
    'supports'            => ['title', 'editor'],
];

register_post_type('axero_blocks', $args);

//add Axero Blocks shortcode to post list view
add_filter('manage_axero_blocks_posts_columns', 'rcb_columns_head_axero_blocks', 10);
add_action('manage_axero_blocks_posts_custom_column', 'rcb_columns_content_axero_blocks', 10, 2);

//re arrange post list columns order and add new
function rcb_columns_head_axero_blocks($defaults)
{
    $new = [];
    foreach ($defaults as $key => $title) {
        if ($key == 'date') // Put the Thumbnail column before the Author column
        {
            $new['rcb_shortcode'] = esc_html__('Usage', 'axero-toolkit');
        }

        $new[$key] = $title;
    }

    return $new;
}
function rcb_columns_content_axero_blocks($column_name, $post_ID)
{
    if ($column_name == 'rcb_shortcode') {
        echo rcb_get_usage_codes($post_ID, $width = false);
    }
}

//add Axero Blocks shortcode to Publish metabox
add_action('post_submitbox_misc_actions', 'add_tcpshortcode_to_publish_meta_box');
function add_tcpshortcode_to_publish_meta_box($post_obj)
{

    global $post;
    $post_type = 'axero_blocks';
    $pid       = $post_obj->ID;

    if ($post_type == $post->post_type) {

        echo "<div class='misc-pub-section misc-pub-section-last'>";
        echo rcb_get_usage_codes($pid, $width = true);
        echo "</div>";

    }
}

function rcb_get_usage_codes($pid, $width)
{

    $shortocde = '[axero_block id="' . $pid . '"]';
    $function  = '<?php axero_block_by_id( "' . $pid . '" ); ?>';

    $class = ($width) ? "class='widefat'" : "style='width:230px'";

    $codes = esc_html('Shortcode:', 'axero-toolkit') . " <input type='text' value='" . $shortocde . "'" . $class . " readonly></br>";
    $codes .= esc_html('Function: &nbsp;', 'axero-toolkit') . " <input type='text' value='" . $function . "'" . $class . " readonly>";

    return $codes;
}
