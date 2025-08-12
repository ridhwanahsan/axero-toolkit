<?php
/**
 *
 * Demo Imports
 */
// OCDI Importer System
if (! function_exists('axero_ocdi_import_files')) {
    function axero_ocdi_import_files()
    {
        return [
            [
                'import_file_name'             => 'Home Main',
                'categories'                   => ['Portfolio'],
                'local_import_file'            => trailingslashit(get_template_directory()) . 'lib/sample-data/contents.xml',
                'local_import_widget_file'     => trailingslashit(get_template_directory()) . 'lib/sample-data/widgets.wie',
                'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'lib/sample-data/customizer.dat',
                'import_preview_image_url'     => get_template_directory_uri() . '/assets/images/demos/demo-1.jpg',
                'preview_url'                  => 'https://demo.nsatheme.com/axero/',
            ],
            [
                'import_file_name'             => 'It Startup Agency Demo',
                'categories'                   => ['IT Startup Agency'],
                 'local_import_file'            => trailingslashit(get_template_directory()) . 'lib/sample-data/contents.xml',
                'local_import_widget_file'     => trailingslashit(get_template_directory()) . 'lib/sample-data/widgets.wie',
                'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'lib/sample-data/customizer.dat',
                'import_preview_image_url'     => get_template_directory_uri() . '/assets/images/demos/demo-2.jpg',
                'preview_url'                  => 'https://demo.nsatheme.com/axero/it-startup-agency-home/',
            ],
            [
                'import_file_name'             => 'Digital Agency Demo',
                'categories'                   => ['Digital Agency'],
                  'local_import_file'            => trailingslashit(get_template_directory()) . 'lib/sample-data/contents.xml',
                'local_import_widget_file'     => trailingslashit(get_template_directory()) . 'lib/sample-data/widgets.wie',
                'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'lib/sample-data/customizer.dat',
                'import_preview_image_url'     => get_template_directory_uri() . '/assets/images/demos/demo-3.jpg',
                'preview_url'                  => 'https://demo.nsatheme.com/axero/digital-agency-home/',
            ],
            [
                'import_file_name'             => 'Marketing Agency Demo',
                'categories'                   => ['Marketing Agency'],
                 'local_import_file'            => trailingslashit(get_template_directory()) . 'lib/sample-data/contents.xml',
                'local_import_widget_file'     => trailingslashit(get_template_directory()) . 'lib/sample-data/widgets.wie',
                'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'lib/sample-data/customizer.dat',
                'import_preview_image_url'     => get_template_directory_uri() . '/assets/images/demos/demo-4.jpg',
                'preview_url'                  => 'https://demo.nsatheme.com/axero/marketing-agency-home/',
            ],  
        ];
    }
    add_filter('ocdi/import_files', 'axero_ocdi_import_files');
}

if (! function_exists('axero_ocdi_after_import_setup')) {
    function axero_ocdi_after_import_setup($demo)
    {
        $front_page_id = "";
        $blog_page_id  = "";
        // Map demo names to page titles
        $demo_to_page = [
        'Home Main'              => 'Home Main',
        'It Startup Agency Home' => 'It Startup Agency Home',
        'Digital Agency Home'    => 'Digital Agency Home',
        'Marketing Agency Home'  => 'Marketing Agency Home',
        ];
        if (isset($demo_to_page[$demo['import_file_name']])) {
            $front_page = get_page_by_title($demo_to_page[$demo['import_file_name']]);
            $blog_page  = get_page_by_title('Blogs');
            if ($front_page && $blog_page) {
                update_option('show_on_front', 'page');
                update_option('page_on_front', $front_page->ID);
                update_option('page_for_posts', $blog_page->ID);
            }
        }
        $primary_menu = get_term_by('name', 'Primary Menu', 'nav_menu');
        if ($primary_menu) {
            set_theme_mod('nav_menu_locations', [
                'primary-menu' => $primary_menu->term_id,
            ]);
        }
        // Uncomment and adjust if WooCommerce pages are needed
        // if (class_exists('woocommerce')) {
        //     update_option('woocommerce_shop_page_id', '13');
        //     update_option('woocommerce_cart_page_id', '14');
        //     update_option('woocommerce_checkout_page_id', '15');
        //     update_option('woocommerce_myaccount_page_id', '16');
        // }
    }
    add_action('ocdi/after_import', 'axero_ocdi_after_import_setup');
}

if (! function_exists('axero_ocdi_plugin_page_setup')) {
    function axero_ocdi_plugin_page_setup($default_settings)
    {
        $default_settings['parent_slug'] = 'themes.php';
        $default_settings['page_title']  = esc_html__('One Click Demo Import', 'one-click-demo-import');
        $default_settings['menu_title']  = esc_html__('Import Theme Demos', 'one-click-demo-import');
        $default_settings['capability']  = 'import';
        $default_settings['menu_slug']   = 'one-click-demo-import';
        return $default_settings;
    }
    add_filter('ocdi/plugin_page_setup', 'axero_ocdi_plugin_page_setup');
}
