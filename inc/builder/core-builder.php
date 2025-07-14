<?php

// **
// Register Projects Custom Post Type
////***
function axero_register_works_post_type()
{
    $labels = [
        'name'               => __('Projects', 'axero-toolkit'),
        'singular_name'      => __('Projects', 'axero-toolkit'),
        'menu_name'          => __('Projects', 'axero-toolkit'),
        'add_new'            => __('Add New Projects', 'axero-toolkit'),
        'add_new_item'       => __('Add New Projects', 'axero-toolkit'),
        'edit_item'          => __('Edit Projects', 'axero-toolkit'),
        'new_item'           => __('New Projects', 'axero-toolkit'),
        'view_item'          => __('View Projects', 'axero-toolkit'),
        'search_items'       => __('Search Projects', 'axero-toolkit'),
        'not_found'          => __('No Projects found', 'axero-toolkit'),
        'not_found_in_trash' => __('No Projects found in trash', 'axero-toolkit'),
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
        'rewrite'            => ['slug' => 'Projects'],
        'capability_type'    => 'post',
        'supports'           => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'],
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-hammer',
        'taxonomies'         => ['works_category'],
    ];

    // Register Projects Category Taxonomy
    $category_labels = [
        'name'              => __('Projects Categories', 'axero-toolkit'),
        'singular_name'     => __('Projects Category', 'axero-toolkit'),
        'search_items'      => __('Search Projects Categories', 'axero-toolkit'),
        'all_items'         => __('All Projects Categories', 'axero-toolkit'),
        'parent_item'       => __('Parent Projects Category', 'axero-toolkit'),
        'parent_item_colon' => __('Parent Projects Category:', 'axero-toolkit'),
        'edit_item'         => __('Edit Projects Category', 'axero-toolkit'),
        'update_item'       => __('Update Projects Category', 'axero-toolkit'),
        'add_new_item'      => __('Add New Projects Category', 'axero-toolkit'),
        'new_item_name'     => __('New Projects Category Name', 'axero-toolkit'),
        'menu_name'         => __('Categories', 'axero-toolkit'),
    ];

    register_taxonomy('works_category', ['Projects'], [
        'hierarchical'       => true,
        'labels'             => $category_labels,
        'show_ui'            => true,
        'show_in_rest'       => true,
        'show_admin_column'  => true,
        'query_var'          => true,
        'rewrite'            => ['slug' => 'Projects-category'],
        'show_in_quick_edit' => true,
        'meta_box_cb'        => null,
    ]);

    register_post_type('Projects', $args);
}
add_action('init', 'axero_register_works_post_type');

// **
// Register Teams Custom Post Type
////***
function axero_register_teams_post_type()
{
    $labels = [
        'name'               => __('Teams', 'axero-toolkit'),
        'singular_name'      => __('Team', 'axero-toolkit'),
        'menu_name'          => __('Teams', 'axero-toolkit'),
        'add_new'            => __('Add New Team', 'axero-toolkit'),
        'add_new_item'       => __('Add New Team', 'axero-toolkit'),
        'edit_item'          => __('Edit Team', 'axero-toolkit'),
        'new_item'           => __('New Team', 'axero-toolkit'),
        'view_item'          => __('View Team', 'axero-toolkit'),
        'search_items'       => __('Search Teams', 'axero-toolkit'),
        'not_found'          => __('No teams found', 'axero-toolkit'),
        'not_found_in_trash' => __('No teams found in trash', 'axero-toolkit'),
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
        'rewrite'            => ['slug' => 'teams'],
        'capability_type'    => 'post',
        'supports'           => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'],
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-groups',
        'taxonomies'         => ['teams_category'],
    ];

    // Register Teams Category Taxonomy
    $category_labels = [
        'name'              => __('Teams Categories', 'axero-toolkit'),
        'singular_name'     => __('Teams Category', 'axero-toolkit'),
        'search_items'      => __('Search Teams Categories', 'axero-toolkit'),
        'all_items'         => __('All Teams Categories', 'axero-toolkit'),
        'parent_item'       => __('Parent Teams Category', 'axero-toolkit'),
        'parent_item_colon' => __('Parent Teams Category:', 'axero-toolkit'),
        'edit_item'         => __('Edit Teams Category', 'axero-toolkit'),
        'update_item'       => __('Update Teams Category', 'axero-toolkit'),
        'add_new_item'      => __('Add New Teams Category', 'axero-toolkit'),
        'new_item_name'     => __('New Teams Category Name', 'axero-toolkit'),
        'menu_name'         => __('Categories', 'axero-toolkit'),
    ];

    register_taxonomy('teams_category', ['teams'], [
        'hierarchical'       => true,
        'labels'             => $category_labels,
        'show_ui'            => true,
        'show_in_rest'       => true,
        'show_admin_column'  => true,
        'query_var'          => true,
        'rewrite'            => ['slug' => 'teams-category'],
        'show_in_quick_edit' => true,
        'meta_box_cb'        => null,
    ]);

    register_post_type('teams', $args);
}
add_action('init', 'axero_register_teams_post_type');

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
