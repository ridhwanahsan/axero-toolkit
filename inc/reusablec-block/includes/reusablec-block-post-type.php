<?php
/**
 * Register  Reusable Content Blocks post type.
 *
 * @package reusablec-block
 *
 */

$labels = [
    'name'               => _x('Lunex Blocks', 'lunex-toolkit'),
    'singular_name'      => _x('Lunex Block', 'lunex-toolkit'),
    'add_new'            => _x('Add New', 'lunex-toolkit'),
    'add_new_item'       => _x('Add New Block', 'lunex-toolkit'),
    'edit_item'          => _x('Edit Block', 'lunex-toolkit'),
    'new_item'           => _x('New Block', 'lunex-toolkit'),
    'all_items'          => _x('All Blocks', 'lunex-toolkit'),
    'view_item'          => _x('View Blocks', 'lunex-toolkit'),
    'search_items'       => _x('Search Blocks', 'lunex-toolkit'),
    'not_found'          => _x('No Blocks found', 'lunex-toolkit'),
    'not_found_in_trash' => _x('No Blocks found in Trash', 'lunex-toolkit'),
    'parent_item_colon'  => '',
    'menu_name'          => _x('Lunex Blocks', 'lunex-toolkit'),
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
    'rewrite'             => ['slug' => 'lunex_blocks'],
    'capability_type'     => 'post',
    'has_archive'         => false,
    'hierarchical'        => false,
    'menu_position'       => null,
    'menu_icon'           => 'dashicons-clipboard',
    'supports'            => ['title', 'editor'],
];

register_post_type('lunex_blocks', $args);

//add Lunex Blocks shortcode to post list view
add_filter('manage_lunex_blocks_posts_columns', 'rcb_columns_head_lunex_blocks', 10);
add_action('manage_lunex_blocks_posts_custom_column', 'rcb_columns_content_lunex_blocks', 10, 2);

//re arrange post list columns order and add new
function rcb_columns_head_lunex_blocks($defaults)
{
    $new = [];
    foreach ($defaults as $key => $title) {
        if ($key == 'date') // Put the Thumbnail column before the Author column
        {
            $new['rcb_shortcode'] = esc_html__('Usage', 'lunex-toolkit');
        }

        $new[$key] = $title;
    }

    return $new;
}
function rcb_columns_content_lunex_blocks($column_name, $post_ID)
{
    if ($column_name == 'rcb_shortcode') {
        echo rcb_get_usage_codes($post_ID, $width = false);
    }
}

//add Lunex Blocks shortcode to Publish metabox
add_action('post_submitbox_misc_actions', 'add_tcpshortcode_to_publish_meta_box');
function add_tcpshortcode_to_publish_meta_box($post_obj)
{

    global $post;
    $post_type = 'lunex_blocks';
    $pid       = $post_obj->ID;

    if ($post_type == $post->post_type) {

        echo "<div class='misc-pub-section misc-pub-section-last'>";
        echo rcb_get_usage_codes($pid, $width = true);
        echo "</div>";

    }
}

function rcb_get_usage_codes($pid, $width)
{

    $shortocde = '[lunex_block id="' . $pid . '"]';
    $function  = '<?php lunex_block_by_id( "' . $pid . '" ); ?>';

    $class = ($width) ? "class='widefat'" : "style='width:230px'";

    $codes = esc_html('Shortcode:', 'lunex-toolkit') . " <input type='text' value='" . $shortocde . "'" . $class . " readonly></br>";
    $codes .= esc_html('Function: &nbsp;', 'lunex-toolkit') . " <input type='text' value='" . $function . "'" . $class . " readonly>";

    return $codes;
}
