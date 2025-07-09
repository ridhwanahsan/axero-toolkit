<?php

// **
// Register Works Custom Post Type
////***
function axero_register_works_post_type()
{
    $labels = [
        'name'               => __('Works', 'axero-toolkit'),
        'singular_name'      => __('Works', 'axero-toolkit'),
        'menu_name'          => __('Works', 'axero-toolkit'),
        'add_new'            => __('Add New Works', 'axero-toolkit'),
        'add_new_item'       => __('Add New Works', 'axero-toolkit'),
        'edit_item'          => __('Edit Works', 'axero-toolkit'),
        'new_item'           => __('New Works', 'axero-toolkit'),
        'view_item'          => __('View Works', 'axero-toolkit'),
        'search_items'       => __('Search Works', 'axero-toolkit'),
        'not_found'          => __('No works found', 'axero-toolkit'),
        'not_found_in_trash' => __('No works found in trash', 'axero-toolkit'),
    ];

    $args = [
        'labels'             => $labels,
        'public'             => true,
        'show_in_rest'       => true,
        'has_archive'        => false,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => ['slug' => 'works'],
        'capability_type'    => 'post',
        'supports'           => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'],
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-hammer',
        'taxonomies'         => ['works_category'],
    ];

    // Register Works Category Taxonomy
    $category_labels = [
        'name'              => __('Works Categories', 'axero-toolkit'),
        'singular_name'     => __('Works Category', 'axero-toolkit'),
        'search_items'      => __('Search Works Categories', 'axero-toolkit'),
        'all_items'         => __('All Works Categories', 'axero-toolkit'),
        'parent_item'       => __('Parent Works Category', 'axero-toolkit'),
        'parent_item_colon' => __('Parent Works Category:', 'axero-toolkit'),
        'edit_item'         => __('Edit Works Category', 'axero-toolkit'),
        'update_item'       => __('Update Works Category', 'axero-toolkit'),
        'add_new_item'      => __('Add New Works Category', 'axero-toolkit'),
        'new_item_name'     => __('New Works Category Name', 'axero-toolkit'),
        'menu_name'         => __('Categories', 'axero-toolkit'),
    ];

    register_taxonomy('works_category', ['works'], [
        'hierarchical'       => true,
        'labels'             => $category_labels,
        'show_ui'            => true,
        'show_in_rest'       => true,
        'show_admin_column'  => true,
        'query_var'          => true,
        'rewrite'            => ['slug' => 'works-category'],
        'show_in_quick_edit' => true,
        'meta_box_cb'        => null,
    ]);

    register_post_type('works', $args);
}
add_action('init', 'axero_register_works_post_type');

// **
// Register Careers Custom Post Type
////***
function axero_register_careers_post_type()
{
    $labels = [
        'name'               => __('Careers', 'axero-toolkit'),
        'singular_name'      => __('Career', 'axero-toolkit'),
        'menu_name'          => __('Careers', 'axero-toolkit'),
        'add_new'            => __('Add New Career', 'axero-toolkit'),
        'add_new_item'       => __('Add New Career', 'axero-toolkit'),
        'edit_item'          => __('Edit Career', 'axero-toolkit'),
        'new_item'           => __('New Career', 'axero-toolkit'),
        'view_item'          => __('View Career', 'axero-toolkit'),
        'search_items'       => __('Search Careers', 'axero-toolkit'),
        'not_found'          => __('No careers found', 'axero-toolkit'),
        'not_found_in_trash' => __('No careers found in trash', 'axero-toolkit'),
    ];

    $args = [
        'labels'             => $labels,
        'public'             => true,
        'show_in_rest'       => true,
        'has_archive'        => false,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => ['slug' => 'careers'],
        'capability_type'    => 'post',
        'supports'           => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'],
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-businessperson',
        'taxonomies'         => ['careers_category'],
    ];

    // Register Careers Category Taxonomy
    $category_labels = [
        'name'              => __('Careers Categories', 'axero-toolkit'),
        'singular_name'     => __('Careers Category', 'axero-toolkit'),
        'search_items'      => __('Search Careers Categories', 'axero-toolkit'),
        'all_items'         => __('All Careers Categories', 'axero-toolkit'),
        'parent_item'       => __('Parent Careers Category', 'axero-toolkit'),
        'parent_item_colon' => __('Parent Careers Category:', 'axero-toolkit'),
        'edit_item'         => __('Edit Careers Category', 'axero-toolkit'),
        'update_item'       => __('Update Careers Category', 'axero-toolkit'),
        'add_new_item'      => __('Add New Careers Category', 'axero-toolkit'),
        'new_item_name'     => __('New Careers Category Name', 'axero-toolkit'),
        'menu_name'         => __('Categories', 'axero-toolkit'),
    ];

    register_taxonomy('careers_category', ['careers'], [
        'hierarchical'       => true,
        'labels'             => $category_labels,
        'show_ui'            => true,
        'show_in_rest'       => true,
        'show_admin_column'  => true,
        'query_var'          => true,
        'rewrite'            => ['slug' => 'careers-category'],
        'show_in_quick_edit' => true,
        'meta_box_cb'        => null,
    ]);

    register_post_type('careers', $args);
}
add_action('init', 'axero_register_careers_post_type');

// **
// Register Services Custom Post Type
////***
function axero_register_services_post_type()
{
    $labels = [
        'name'               => __('Services', 'axero-toolkit'),
        'singular_name'      => __('Service', 'axero-toolkit'),
        'menu_name'          => __('Services', 'axero-toolkit'),
        'add_new'            => __('Add New Service', 'axero-toolkit'),
        'add_new_item'       => __('Add New Service', 'axero-toolkit'),
        'edit_item'          => __('Edit Service', 'axero-toolkit'),
        'new_item'           => __('New Service', 'axero-toolkit'),
        'view_item'          => __('View Service', 'axero-toolkit'),
        'search_items'       => __('Search Services', 'axero-toolkit'),
        'not_found'          => __('No services found', 'axero-toolkit'),
        'not_found_in_trash' => __('No services found in trash', 'axero-toolkit'),
    ];

    $args = [
        'labels'             => $labels,
        'public'             => true,
        'show_in_rest'       => true,
        'has_archive'        => false,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => ['slug' => 'services'],
        'capability_type'    => 'post',
        'supports'           => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'],
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-admin-tools',
        'taxonomies'         => ['services_category'],
    ];

    // Register Services Category Taxonomy
    $category_labels = [
        'name'              => __('Services Categories', 'axero-toolkit'),
        'singular_name'     => __('Services Category', 'axero-toolkit'),
        'search_items'      => __('Search Services Categories', 'axero-toolkit'),
        'all_items'         => __('All Services Categories', 'axero-toolkit'),
        'parent_item'       => __('Parent Services Category', 'axero-toolkit'),
        'parent_item_colon' => __('Parent Services Category:', 'axero-toolkit'),
        'edit_item'         => __('Edit Services Category', 'axero-toolkit'),
        'update_item'       => __('Update Services Category', 'axero-toolkit'),
        'add_new_item'      => __('Add New Services Category', 'axero-toolkit'),
        'new_item_name'     => __('New Services Category Name', 'axero-toolkit'),
        'menu_name'         => __('Categories', 'axero-toolkit'),
    ];

    register_taxonomy('services_category', ['services'], [
        'hierarchical'       => true,
        'labels'             => $category_labels,
        'show_ui'            => true,
        'show_in_rest'       => true,
        'show_admin_column'  => true,
        'query_var'          => true,
        'rewrite'            => ['slug' => 'services-category'],
        'show_in_quick_edit' => true,
        'meta_box_cb'        => null,
    ]);

    register_post_type('services', $args);
}
add_action('init', 'axero_register_services_post_type');
