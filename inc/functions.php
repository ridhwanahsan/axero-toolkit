<?php
/**
 * axero Toolkit Functions
 */

add_filter('script_loader_tag', 'axero_clean_script_tag');
function axero_clean_script_tag($input)
{
    $input = str_replace(['type="text/javascript"', "type='text/javascript'"], '', $input);
    return $input;
}

function axero_toolkit_get_products_cat_list()
{

    $courses_category_id = get_queried_object_id();
    $args                = [
        'parent' => $courses_category_id,
    ];

    $terms       = get_terms('product_cat', get_the_ID());
    $cat_options = ['' => ''];

    if ($terms) {
        foreach ($terms as $term) {
            $cat_options[$term->name] = $term->name;
        }
    }
    return $cat_options;
}

function axero_toolkit_get_cat_list()
{
    $category_id = get_queried_object_id();
    $args        = [
        'parent' => $category_id,
    ];
    $terms = get_terms([
        'taxonomy'   => 'category',
        'hide_empty' => false,
    ]);
    $cat_options = ['' => ''];

    if ($terms) {
        foreach ($terms as $term) {
            $cat_options[$term->name] = $term->name;
        }
    }
    return $cat_options;
}

// Post Category Select
function axero_toolkit_get_post_cat_list()
{
    $post_category_id = get_queried_object_id();
    $args             = [
        'parent' => $post_category_id,
    ];

    $terms       = get_terms('category', get_the_ID());
    $cat_options = [esc_html__('', 'axero-toolkit') => ''];

    if ($terms) {
        foreach ($terms as $term) {
            $cat_options[$term->name] = $term->name;
        }
    }
    return $cat_options;
}

// Select page for link
function axero_toolkit_get_page_as_list()
{
    $args = wp_parse_args([
        'post_type'   => 'page',
        'numberposts' => -1,
    ]);

    $posts        = get_posts($args);
    $post_options = [esc_html__('', 'axero-toolkit') => ''];

    if ($posts) {
        foreach ($posts as $post) {
            $post_options[$post->post_title] = $post->ID;
        }
    }
    $flipped = array_flip($post_options);
    return $flipped;
}

add_filter('body_class', function ($classes) {
    return array_merge($classes, ['axero-toolkit-activate']);
});

// Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter('gutenberg_use_widgets_block_editor', '__return_false', 100);

// Disables the block editor from managing widgets. renamed from wp_use_widgets_block_editor
add_filter('use_widgets_block_editor', '__return_false');

add_filter('navigation_markup_template', 'axero_navigation_template');
function axero_navigation_template($template)
{
    $template = '
    <nav class="navigation %1$s">
        <h2 class="screen-reader-text">%2$s</h2>
        <div class="nav-links">%3$s</div>
    </nav>';
    return $template;
}

/**
 * Get the existing menus in array format
 * @return array
 */
function axero_get_menu_array()
{
    $menus      = wp_get_nav_menus();
    $menu_array = [];
    foreach ($menus as $menu) {
        $menu_array[$menu->slug] = $menu->name;
    }
    return $menu_array;
}

/**
 * Post title array
 */
function axero_get_post_title_array($postType = 'post')
{
    $args = wp_parse_args([
        'post_type'   => $postType,
        'numberposts' => -1,
    ]);

    $posts        = get_posts($args);
    $post_options = ['' => ''];

    if ($posts) {
        foreach ($posts as $post) {
            $post_options[$post->post_title] = $post->ID;
        }
    }
    $flipped = array_flip($post_options);
    return $flipped;
}

function axero_year_shortcode()
{
    $year = date('Y');
    return $year;
}
add_shortcode('year', 'axero_year_shortcode');

function axero_add_class_body_if_user_not_login($classes)
{
    if (! is_user_logged_in()) {
        return array_merge($classes, ['not-logged-in']);
    } else {
        return array_merge($classes, ['']);
    }
}
add_filter('body_class', 'axero_add_class_body_if_user_not_login');

/**
 * Remove pages from search result
 */
if (! function_exists('axero_remove_pages_from_search')):
    function axero_remove_pages_from_search()
{
        global $axero_opt;
        global $wp_post_types;

        if (isset($axero_opt['axero_search_page'])):
            if ($axero_opt['axero_search_page'] != true):
                $wp_post_types['page']->exclude_from_search = true;
            else:
                $wp_post_types['page']->exclude_from_search = false;
            endif;
        else:
            $wp_post_types['page']->exclude_from_search = false;
        endif;
    }
endif;
add_action('init', 'axero_remove_pages_from_search');

function axero_toolkit_enable_svg_upload($upload_mimes)
{
    $upload_mimes['svg']  = 'image/svg+xml';
    $upload_mimes['svgz'] = 'image/svg+xml';
    return $upload_mimes;
}
add_filter('upload_mimes', 'axero_toolkit_enable_svg_upload', 10, 1);

/**
 * Get CPT Taxonomies
 * @return array
 */
function axero_cpt_taxonomies($posttype, $value = 'id')
{
    $options = [];
    $terms   = get_terms($posttype);
    if (! empty($terms) && ! is_wp_error($terms)) {
        foreach ($terms as $term) {
            if ('name' == $value) {
                $options[$term->name] = $term->name;
            } else {
                $options[$term->term_id] = $term->name;
            }
        }
    }
    return $options;
}

function axero_cpt_get_post_title($cptname = '')
{
    if ($cptname) {
        $list = get_posts([
            'post_type'      => $cptname,
            'posts_per_page' => -1,
        ]);
        $options = [];
        if (! empty($list) && ! is_wp_error($list)) {
            foreach ($list as $post) {
                $options[$post->ID] = $post->post_title;
            }
        }
        return $options;
    }
}

// register widget category//

function add_elementor_widget_categories($elements_manager)
{
    $categories = [
        'Axero'         => [
            'title' => 'Axero',
            'icon'  => 'fa fa-plug',
        ],
        'header_footer' => [
            'title' => 'Header Footer',
            'icon'  => 'fa fa-plug',
        ],
    ];

    $old_categories = $elements_manager->get_categories();
    $categories     = array_merge($categories, $old_categories);

    // Remove duplicates and ensure 'Axero' is at the top and 'header_footer' is under it
    $categories = array_unique($categories, SORT_REGULAR);
    uksort($categories, function ($key1, $key2) {
        if ($key1 === 'Axero') {
            return -1;
        }
        if ($key2 === 'Axero') {
            return 1;
        }
        if ($key1 === 'header_footer') {
            return -1;
        }
        if ($key2 === 'header_footer') {
            return 1;
        }
        return 0;
    });

    $set_categories = function ($categories) {
        $this->categories = $categories;
    };

    $set_categories->call($elements_manager, $categories);
}

add_action('elementor/elements/categories_registered', 'add_elementor_widget_categories');
