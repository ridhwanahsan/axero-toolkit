<?php
/**
 *
 * Demo Imports
 */
// OCDI Importer System
if (! function_exists('lunex_ocdi_import_files')) {
    function lunex_ocdi_import_files()
    {
        return [
            [
                'import_file_name'             => 'Home - Creative Agency',
                'categories'                   => ['Creative Agency'],

                'local_import_file'            => trailingslashit(get_template_directory()) . 'lib/sample-data/contents.xml',
                'local_import_widget_file'     => trailingslashit(get_template_directory()) . 'lib/sample-data/widgets.wie',
                'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'lib/sample-data/customizer.dat',


                'import_preview_image_url'     => get_template_directory_uri() . '/assets/demo/demo-1.jpg',
                'preview_url'                  => 'hhtlunexs: //demo.nsatheme.com/html/lunex/index-4.html
',
            ],
            [
                'import_file_name'             => 'Home - Digital Agency',
                'categories'                   => ['Digital Agency'],
                 'local_import_file'            => trailingslashit(get_template_directory()) . 'lib/sample-data/contents.xml',
                'local_import_widget_file'     => trailingslashit(get_template_directory()) . 'lib/sample-data/widgets.wie',
                'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'lib/sample-data/customizer.dat',
                'import_preview_image_url'     => get_template_directory_uri() . '/assets/demo/demo-2.jpg',
                'preview_url'                  => 'htlunexs://demo.nsatheme.com/html/lunex/index-4.html',
            ],
            [
                'import_file_name'             => 'Home - Development Agency',
                'categories'                   => ['Development Agency'],
                  'local_import_file'            => trailingslashit(get_template_directory()) . 'lib/sample-data/contents.xml',
                'local_import_widget_file'     => trailingslashit(get_template_directory()) . 'lib/sample-data/widgets.wie',
                'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'lib/sample-data/customizer.dat',
                'import_preview_image_url'     => get_template_directory_uri() . '/assets/demo/demo-3.jpg',
                'preview_url'                  => 'htlunexs://demo.nsatheme.com/html/lunex/index-4.html',
            ],
            [
                'import_file_name'             => 'Home - Digital Marketing Agency',
                'categories'                   => ['Business Consulting'],
                 'local_import_file'            => trailingslashit(get_template_directory()) . 'lib/sample-data/contents.xml',
                'local_import_widget_file'     => trailingslashit(get_template_directory()) . 'lib/sample-data/widgets.wie',
                'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'lib/sample-data/customizer.dat',
                'import_preview_image_url'     => get_template_directory_uri() . '/assets/demo/demo-4.jpg',
                'preview_url'                  => 'htlunexs://demo.nsatheme.com/html/lunex/index-4.html',
            ],
            [
                'import_file_name'             => 'Home - UI/UX Design Agency',
                'categories'                   => ['Portfolio'],
                 'local_import_file'            => trailingslashit(get_template_directory()) . 'lib/sample-data/contents.xml',
                'local_import_widget_file'     => trailingslashit(get_template_directory()) . 'lib/sample-data/widgets.wie',
                'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'lib/sample-data/customizer.dat',
                'import_preview_image_url'     => get_template_directory_uri() . '/assets/demo/demo-5.jpg',
                'preview_url'                  => 'htlunexs://demo.nsatheme.com/html/lunex/index-4.html',
            ],
            [
                'import_file_name'             => 'Home - Branding Agency',
                'categories'                   => ['Marketing '],
                 'local_import_file'            => trailingslashit(get_template_directory()) . 'lib/sample-data/contents.xml',
                'local_import_widget_file'     => trailingslashit(get_template_directory()) . 'lib/sample-data/widgets.wie',
                'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'lib/sample-data/customizer.dat',
                'import_preview_image_url'     => get_template_directory_uri() . '/assets/demo/demo-6.jpg',
                'preview_url'                  => 'htlunexs://demo.nsatheme.com/html/lunex/index-4.html',
            ],
            [
                'import_file_name'             => 'Home - Content Creation Agency',
                'categories'                   => ['Marketing '],
                 'local_import_file'            => trailingslashit(get_template_directory()) . 'lib/sample-data/contents.xml',
                'local_import_widget_file'     => trailingslashit(get_template_directory()) . 'lib/sample-data/widgets.wie',
                'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'lib/sample-data/customizer.dat',
                'import_preview_image_url'     => get_template_directory_uri() . '/assets/demo/demo-7.jpg',
                'preview_url'                  => 'htlunexs://demo.nsatheme.com/html/lunex/index-4.html',
            ],
        ];
    }
    add_filter('ocdi/import_files', 'lunex_ocdi_import_files');
}

if (! function_exists('lunex_ocdi_after_import_setup')) {
    function lunex_ocdi_after_import_setup($demo)
    {
        $front_page_id = "";
        $blog_page_id  = "";
        // Map demo names to page titles
        $demo_to_page = [
            'Home - Creative Agency'          => 'Creative Agency',
            'Home - Digital Agency'           => 'Digital Agency',
            'Home - Development Agency'       => 'Development Agency',
            'Home - Digital Marketing Agency' => 'Digital Marketing Agency',
            'Home - UI/UX Design Agency'      => 'UI/UX Design Agency',
            'Home - Branding Agency'          => 'Branding Agency',
            'Home - Content Creation Agency'  => 'Content Creation Agency',
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
    add_action('ocdi/after_import', 'lunex_ocdi_after_import_setup');
}

if (! function_exists('lunex_ocdi_plugin_page_setup')) {
    function lunex_ocdi_plugin_page_setup($default_settings)
    {
        $default_settings['parent_slug'] = 'themes.php';
        $default_settings['page_title']  = esc_html__('One Click Demo Import', 'one-click-demo-import');
        $default_settings['menu_title']  = esc_html__('Import Theme Demos', 'one-click-demo-import');
        $default_settings['capability']  = 'import';
        $default_settings['menu_slug']   = 'one-click-demo-import';
        return $default_settings;
    }
    add_filter('ocdi/plugin_page_setup', 'lunex_ocdi_plugin_page_setup');
}
