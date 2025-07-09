<?php

// **
// Register Works Custom Post Type
////***
function lunex_register_works_post_type() {
    $labels = array(
        'name'               => __('Works', 'lunex-toolkit'),
        'singular_name'      => __('Works', 'lunex-toolkit'),
        'menu_name'          => __('Works', 'lunex-toolkit'),
        'add_new'           => __('Add New Works', 'lunex-toolkit'),
        'add_new_item'      => __('Add New Works', 'lunex-toolkit'),
        'edit_item'         => __('Edit Works', 'lunex-toolkit'),
        'new_item'          => __('New Works', 'lunex-toolkit'),
        'view_item'         => __('View Works', 'lunex-toolkit'),
        'search_items'      => __('Search Works', 'lunex-toolkit'),
        'not_found'         => __('No works found', 'lunex-toolkit'),
        'not_found_in_trash'=> __('No works found in trash', 'lunex-toolkit')
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'show_in_rest'        => true,
        'has_archive'         => false,
        'publicly_queryable'  => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'works'),
        'capability_type'    => 'post',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-hammer',
        'taxonomies'         => array('works_category'),
    );

    // Register Works Category Taxonomy
    $category_labels = array(
        'name'              => __('Works Categories', 'lunex-toolkit'),
        'singular_name'     => __('Works Category', 'lunex-toolkit'),
        'search_items'      => __('Search Works Categories', 'lunex-toolkit'),
        'all_items'         => __('All Works Categories', 'lunex-toolkit'),
        'parent_item'       => __('Parent Works Category', 'lunex-toolkit'),
        'parent_item_colon' => __('Parent Works Category:', 'lunex-toolkit'),
        'edit_item'         => __('Edit Works Category', 'lunex-toolkit'),
        'update_item'       => __('Update Works Category', 'lunex-toolkit'),
        'add_new_item'      => __('Add New Works Category', 'lunex-toolkit'),
        'new_item_name'     => __('New Works Category Name', 'lunex-toolkit'),
        'menu_name'         => __('Categories', 'lunex-toolkit'),
    );

    register_taxonomy('works_category', array('works'), array(
        'hierarchical'      => true,
        'labels'            => $category_labels,
        'show_ui'          => true,
        'show_in_rest'     => true,
        'show_admin_column' => true,
        'query_var'        => true,
        'rewrite'          => array('slug' => 'works-category'),
        'show_in_quick_edit' => true,
        'meta_box_cb'       => null
    ));

    register_post_type('works', $args);
}
add_action('init', 'lunex_register_works_post_type');

 
// **
// Register Careers Custom Post Type
////***
function lunex_register_careers_post_type() {
    $labels = array(
        'name'               => __('Careers', 'lunex-toolkit'),
        'singular_name'      => __('Career', 'lunex-toolkit'),
        'menu_name'          => __('Careers', 'lunex-toolkit'),
        'add_new'           => __('Add New Career', 'lunex-toolkit'),
        'add_new_item'      => __('Add New Career', 'lunex-toolkit'),
        'edit_item'         => __('Edit Career', 'lunex-toolkit'),
        'new_item'          => __('New Career', 'lunex-toolkit'),
        'view_item'         => __('View Career', 'lunex-toolkit'),
        'search_items'      => __('Search Careers', 'lunex-toolkit'),
        'not_found'         => __('No careers found', 'lunex-toolkit'),
        'not_found_in_trash'=> __('No careers found in trash', 'lunex-toolkit')
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'show_in_rest'        => true,
        'has_archive'         => false,
        'publicly_queryable'  => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'careers'),
        'capability_type'    => 'post',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-businessperson',
        'taxonomies'         => array('careers_category'),
    );

    // Register Careers Category Taxonomy
    $category_labels = array(
        'name'              => __('Careers Categories', 'lunex-toolkit'),
        'singular_name'     => __('Careers Category', 'lunex-toolkit'),
        'search_items'      => __('Search Careers Categories', 'lunex-toolkit'),
        'all_items'         => __('All Careers Categories', 'lunex-toolkit'),
        'parent_item'       => __('Parent Careers Category', 'lunex-toolkit'),
        'parent_item_colon' => __('Parent Careers Category:', 'lunex-toolkit'),
        'edit_item'         => __('Edit Careers Category', 'lunex-toolkit'),
        'update_item'       => __('Update Careers Category', 'lunex-toolkit'),
        'add_new_item'      => __('Add New Careers Category', 'lunex-toolkit'),
        'new_item_name'     => __('New Careers Category Name', 'lunex-toolkit'),
        'menu_name'         => __('Categories', 'lunex-toolkit'),
    );

    register_taxonomy('careers_category', array('careers'), array(
        'hierarchical'      => true,
        'labels'            => $category_labels,
        'show_ui'          => true,
        'show_in_rest'     => true,
        'show_admin_column' => true,
        'query_var'        => true,
        'rewrite'          => array('slug' => 'careers-category'),
        'show_in_quick_edit' => true,
        'meta_box_cb'       => null
    ));

    register_post_type('careers', $args);
}
add_action('init', 'lunex_register_careers_post_type');
 
// **
// Register Services Custom Post Type
////***
function lunex_register_services_post_type() {
    $labels = array(
        'name'               => __('Services', 'lunex-toolkit'),
        'singular_name'      => __('Service', 'lunex-toolkit'),
        'menu_name'          => __('Services', 'lunex-toolkit'),
        'add_new'           => __('Add New Service', 'lunex-toolkit'),
        'add_new_item'      => __('Add New Service', 'lunex-toolkit'),
        'edit_item'         => __('Edit Service', 'lunex-toolkit'),
        'new_item'          => __('New Service', 'lunex-toolkit'),
        'view_item'         => __('View Service', 'lunex-toolkit'),
        'search_items'      => __('Search Services', 'lunex-toolkit'),
        'not_found'         => __('No services found', 'lunex-toolkit'),
        'not_found_in_trash'=> __('No services found in trash', 'lunex-toolkit')
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'show_in_rest'        => true,
        'has_archive'         => false,
        'publicly_queryable'  => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'services'),
        'capability_type'    => 'post',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-admin-tools',
        'taxonomies'         => array('services_category'),
    );

    // Register Services Category Taxonomy
    $category_labels = array(
        'name'              => __('Services Categories', 'lunex-toolkit'),
        'singular_name'     => __('Services Category', 'lunex-toolkit'),
        'search_items'      => __('Search Services Categories', 'lunex-toolkit'),
        'all_items'         => __('All Services Categories', 'lunex-toolkit'),
        'parent_item'       => __('Parent Services Category', 'lunex-toolkit'),
        'parent_item_colon' => __('Parent Services Category:', 'lunex-toolkit'),
        'edit_item'         => __('Edit Services Category', 'lunex-toolkit'),
        'update_item'       => __('Update Services Category', 'lunex-toolkit'),
        'add_new_item'      => __('Add New Services Category', 'lunex-toolkit'),
        'new_item_name'     => __('New Services Category Name', 'lunex-toolkit'),
        'menu_name'         => __('Categories', 'lunex-toolkit'),
    );

    register_taxonomy('services_category', array('services'), array(
        'hierarchical'      => true,
        'labels'            => $category_labels,
        'show_ui'          => true,
        'show_in_rest'     => true,
        'show_admin_column' => true,
        'query_var'        => true,
        'rewrite'          => array('slug' => 'services-category'),
        'show_in_quick_edit' => true,
        'meta_box_cb'       => null
    ));

    register_post_type('services', $args);
}
add_action('init', 'lunex_register_services_post_type');
