<?php
/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */

if (! class_exists('Redux')) {
    return;
}

// This line is only for altering the demo. Can be easily removed.
$opt_name = apply_filters('opt_name/opt_name', 'axero_opt');

// Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
$sampleHTML = '';
if (file_exists(dirname(__FILE__) . '/info-html.html')) {
    Redux_Functions::initWpFilesystem();

    global $wp_filesystem;

    $sampleHTML = $wp_filesystem->get_contents(dirname(__FILE__) . '/info-html.html');
}

// Background Patterns Reader
$sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
$sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
$sample_patterns      = [];

if (is_dir($sample_patterns_path)) {
    if ($sample_patterns_dir = opendir($sample_patterns_path)) {
        $sample_patterns = [];
        while (($sample_patterns_file = readdir($sample_patterns_dir)) !== false) {
            if (stristr($sample_patterns_file, '.png') !== false || stristr($sample_patterns_file, '.jpg') !== false) {
                $name              = explode('.', $sample_patterns_file);
                $name              = str_replace('.' . end($name), '', $sample_patterns_file);
                $sample_patterns[] = [
                    'alt' => $name,
                    'img' => $sample_patterns_url . $sample_patterns_file,
                ];
            }
        }
    }
}

                         // All the possible arguments for Redux.
$theme = wp_get_theme(); // For use with some settings. Not necessary.
$args  = [
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'         => $theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version'      => $theme->get('Version'),
    // Version that appears at the top of your panel
    'menu_type'            => 'menu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => __('Theme Options', 'axero-toolkit'),
    'page_title'           => __('Theme Options', 'axero-toolkit'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => false,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-portfolio',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => false,
    // Show the time the page took to load, etc
    'update_notice'        => false,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

    // OPTIONAL -> Give you extra features
    'page_priority'        => 3,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => 'axero_opt',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints'                => [
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => [
            'color'   => 'red',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ],
        'tip_position'  => [
            'my' => 'top left',
            'at' => 'bottom right',
        ],
        'tip_effect'    => [
            'show' => [
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ],
            'hide' => [
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ],
        ],
    ],
];

// Panel Intro text -> before the form
if (! isset($args['global_variable']) || $args['global_variable'] !== false) {
    if (! empty($args['global_variable'])) {
        $v = $args['global_variable'];
    } else {
        $v = str_replace('-', '_', $args['opt_name']);
    }
    $args['intro_text'] = sprintf(__('<p></p>', 'axero-toolkit'), $v);
} else {
    $args['intro_text'] = __('<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'axero-toolkit');
}
Redux::setArgs($opt_name, $args);

// General Options
Redux::setSection($opt_name, [
    'title'      => esc_html__('General Options', 'axero-toolkit'),
    'id'         => 'general_options',
    'customizer' => false,
    'icon'       => ' el el-home',
    'fields'     => [
        [
            'id'    => 'light_logo',
            'type'  => 'media',
            'url'   => true,
            'title' => esc_html__('Main Logo', 'axero-toolkit'),
            'desc'  => esc_html__('Recommended sizes - width: 100px, height: 30px with SVG format', 'axero-toolkit'),
        ],
        [
            'title'  => __('Site Logo Dimensions', 'axero-toolkit'),
            'id'     => 'main_logo_dimensions',
            'type'   => 'dimensions',
            'units'  => ['em', 'px', '%'],
            'output' => '.navbar .navbar-brand img',
        ],
        [
            'id'      => 'enable_back_to_top',
            'type'    => 'switch',
            'title'   => esc_html__('Enable back-to-top Button', 'axero-toolkit'),
            'default' => '1',
        ],
    ],
]);

// Preloader Options
Redux::setSection($opt_name, [
    'title'      => esc_html__('Preloader', 'axero-toolkit'),
    'id'         => 'preloader_opt',
    'customizer' => false,
    'icon'       => 'dashicons dashicons-controls-repeat',
    'fields'     => [

        [
            'id'      => 'enable_preloader',
            'type'    => 'switch',
            'title'   => esc_html__('Pre-loader', 'axero-toolkit'),
            'on'      => esc_html__('Enable', 'axero-toolkit'),
            'off'     => esc_html__('Disable', 'axero-toolkit'),
            'default' => true,
        ],

        [
            'title'                 => esc_html__('Background Color', 'axero-toolkit'),
            'id'                    => 'preloader_color_spin',
            'type'                  => 'background',
            'background-image'      => false,
            'background-repeat'     => false,
            'background-size'       => false,
            'background-attachment' => false,
            'background-position'   => false,
            'transparent'           => false,
            'output'                => '.preloader-area',
            'required'              => ['enable_preloader', '=', '1'],
        ],
        [
            'id'          => 'preloader_spinner_color',
            'type'        => 'color',
            'title'       => esc_html__('Spinner Color', 'axero-toolkit'),
            'default'     => '#000000',
            'validate'    => 'color',
            'transparent' => false,
            'output'      => [
                '--blackColor' => '.preloader-area .loader',
            ],
            'required'    => ['enable_preloader', '=', '1'],
        ],
        [
            'id'          => 'preloader_spinner_bg_color',
            'type'        => 'color',
            'title'       => esc_html__('Spinner Background Color', 'axero-toolkit'),
            'default'     => '#ffffff',
            'validate'    => 'color',
            'transparent' => false,
            'output'      => [
                '--whiteColor' => '.preloader-area .loader',
            ],
            'required'    => ['enable_preloader', '=', '1'],
        ],
    ],
]);
// Back to Top Options
Redux::setSection($opt_name, [
    'title'      => esc_html__('Back to Top', 'axero-toolkit'),
    'id'         => 'back_to_top_opt',
    'customizer' => false,
    'icon'       => 'dashicons dashicons-arrow-up-alt',
    'fields'     => [

        [
            'id'      => 'enable_back_to_top',
            'type'    => 'switch',
            'title'   => esc_html__('Back to Top Button', 'axero-toolkit'),
            'on'      => esc_html__('Enable', 'axero-toolkit'),
            'off'     => esc_html__('Disable', 'axero-toolkit'),
            'default' => true,
        ],

        [
            'id'          => 'back_to_top_bg_color',
            'type'        => 'color',
            'title'       => esc_html__('Background Color', 'axero-toolkit'),
            'default'     => '#5538CE',
            'validate'    => 'color',
            'transparent' => false,
            'output'      => [
                'background-color' => '.back-to-top',
            ],
            'required'    => ['enable_back_to_top', '=', '1'],
        ],
        [
            'id'          => 'back_to_top_hover_bg_color',
            'type'        => 'color',
            'title'       => esc_html__('Hover Background Color', 'axero-toolkit'),
            'default'     => '#20265B',
            'validate'    => 'color',
            'transparent' => false,
            'output'      => [
                'background-color' => '.back-to-top:hover',
            ],
            'required'    => ['enable_back_to_top', '=', '1'],
        ],

    ],
]);

// Header Option
Redux::setSection($opt_name, [
    'title'      => esc_html__('Header', 'axero-toolkit'),
    'icon'       => 'el el-caret-up',
    'customizer' => false,
    'fields'     => [
        [
            'id'      => 'enable_sticky_header',
            'type'    => 'switch',
            'title'   => esc_html__('Enable Sticky Header', 'axero-toolkit'),
            'desc'    => esc_html__('', 'axero-toolkit'),
            'default' => '0',
        ],
        [
            'id'   => 'divider_header1',
            'type' => 'divide',
        ],
        [
            'id'      => 'header_btn_text',
            'type'    => 'text',
            'title'   => esc_html__('Header Button Text', 'axero-toolkit'),
            'default' => ' Lets Talk',
        ],
        [
            'id'          => 'header_btn_icon',
            'type'        => 'text',
            'title'       => esc_html__('Header Button Icon Class Name', 'axero-toolkit'),
            'default'     => 'ti ti-arrow-narrow-right',
            'description' => "You can use https://remixicon.com/ icons ex: ri-arrow-right-s-line",
        ],
        [
            'id'      => 'header_btn_link',
            'type'    => 'text',
            'title'   => esc_html__('Header Button Link', 'axero-toolkit'),
            'default' => '#',
        ],

    ],
]);

// Mobile Header Option
Redux::setSection($opt_name, [
    'title'      => esc_html__('Mobile Header', 'axero-toolkit'),
    'icon'       => 'el el-list-alt',
    'customizer' => false,
    'fields'     => [
        [
            'id'      => 'mobile_menu_location_title',
            'type'    => 'text',
            'title'   => esc_html__('Location Title', 'axero-toolkit'),
            'default' => 'The Empire State',
        ],
        [
            'id'      => 'mobile_menu_location_address',
            'type'    => 'text',
            'title'   => esc_html__('Location Address', 'axero-toolkit'),
            'default' => 'Parker Avenue, Kingsley Road, New York',
        ],
        [
            'id'      => 'mobile_menu_email',
            'type'    => 'text',
            'title'   => esc_html__('Email Address', 'axero-toolkit'),
            'default' => 'support@axero.com',
        ],
        [
            'id'   => 'divider_mobile_header',
            'type' => 'divide',
        ],
        [
            'id'      => 'mobile_header_social_target',
            'type'    => 'select',
            'options' => [
                '_blank'  => 'Load in a new window. ( _blank )',
                '_self'   => 'Load in the same frame as it was clicked. ( _self )',
                '_parent' => 'Load in the parent frameset. ( _parent )',
                '_top'    => 'Load in the full body of the window ( _top )',
            ],
            'title'   => esc_html__('Social Link Target', 'axero-toolkit'),
            'default' => '_blank',
        ],
        [
            'id'      => 'facebook_link',
            'type'    => 'text',
            'title'   => esc_html__('Facebook Link', 'axero-toolkit'),
            'default' => '#',
        ],
        [
            'id'      => 'instagram_link',
            'type'    => 'text',
            'title'   => esc_html__('Instagram Link', 'axero-toolkit'),
            'default' => '#',
        ],
        [
            'id'      => 'threads_link',
            'type'    => 'text',
            'title'   => esc_html__('Threads Link', 'axero-toolkit'),
            'default' => '#',
        ],
        [
            'id'      => 'twitter_link',
            'type'    => 'text',
            'title'   => esc_html__('Twitter/X Link', 'axero-toolkit'),
            'default' => '#',
        ],
        [
            'id'      => 'youtube_link',
            'type'    => 'text',
            'title'   => esc_html__('YouTube Link', 'axero-toolkit'),
            'default' => '#',
        ],

    ]]);

// Footer Area
Redux::setSection($opt_name, [
    'title'      => esc_html__('Footer', 'axero-toolkit'),
    'id'         => 'footer',
    'customizer' => false,
    'icon'       => 'el el-edit',
    'fields'     => [
        [
            'id'   => 'divider_footer',
            'desc' => '<div style="font-size:16px;">The Axero footer is built using Elementor. To add or update footer content, please navigate to UAE -> Elementor Header & Footer Builder.</div>',
            'type' => 'info',
        ],
        [
            'id'      => 'footer_copyright_year',
            'type'    => 'text',
            'title'   => esc_html__('Copyright Year', 'axero-toolkit'),
            'default' => '2025',
        ],
        [
            'id'      => 'footer_copyright_link_url',
            'type'    => 'text',
            'title'   => esc_html__('Copyright Link URL', 'axero-toolkit'),
            'default' => 'https://nsatheme.com/',
        ],
        [
            'id'      => 'footer_copyright_link_text',
            'type'    => 'text',
            'title'   => esc_html__('Copyright Link Text', 'axero-toolkit'),
            'default' => 'NsaTheme',
        ],
        [
            'id'      => 'footer_copyright_text',
            'type'    => 'text',
            'title'   => esc_html__('Copyright Text', 'axero-toolkit'),
            'default' => 'All rights reserved.',
        ],
    ],
]);

// Banner
Redux::setSection($opt_name, [
    'title'      => esc_html__('Banner', 'axero-toolkit'),
    'id'         => 'banner_options',
    'customizer' => false,
    'icon'       => 'el el-website',
    'fields'     => [

        [
            'id'      => 'page_title_tag',
            'type'    => 'select',
            'title'   => esc_html__('Banner Title Tag', 'axero-toolkit'),
            'options' => [
                'h1' => esc_html__('h1', 'axero-toolkit'),
                'h2' => esc_html__('h2', 'axero-toolkit'),
                'h3' => esc_html__('h3', 'axero-toolkit'),
                'h4' => esc_html__('h4', 'axero-toolkit'),
                'h5' => esc_html__('h5', 'axero-toolkit'),
                'h6' => esc_html__('h6', 'axero-toolkit'),
            ],
            'default' => 'h2',
        ],
        [
            'id'         => 'title_title_typo',
            'type'       => 'typography',
            'text-align' => false,
            'title'      => esc_html__('Title Typography', 'axero-toolkit'),
            'output'     => '.breadcrumb-content h2',
        ],
        [
            'id'         => 'title_desc_typo',
            'type'       => 'typography',
            'text-align' => false,
            'title'      => esc_html__('Breadcumb Typography', 'axero-toolkit'),
            'output'     => '.page-banner-content .list, .cs-page-banner-content .list',
        ],

        [
            'id'    => 'banner_shape1',
            'type'  => 'media',
            'url'   => true,
            'title' => esc_html__('Banner Shape Image 1', 'axero-toolkit'),
        ],
        [
            'id'    => 'banner_shape2',
            'type'  => 'media',
            'url'   => true,
            'title' => esc_html__('Banner Shape Image 2', 'axero-toolkit'),
        ],
        [
            'id'    => 'banner_shape3',
            'type'  => 'media',
            'url'   => true,
            'title' => esc_html__('Banner Shape Image 3', 'axero-toolkit'),
        ],
    ],
]);

// Social Profiles
Redux::setSection($opt_name, [
    'title'      => esc_html__('Social Profiles', 'axero-toolkit'),
    'desc'       => 'Social profiles are used in different places inside the theme.',
    'icon'       => 'el-icon-user',
    'customizer' => false,
    'fields'     => [
        [
            'id'      => 'axero_social_target',
            'type'    => 'select',
            'options' => [
                '_blank'  => 'Load in a new window. ( _blank )',
                '_self'   => 'Load in the same frame as it was clicked. ( _self )',
                '_parent' => 'Load in the parent frameset. ( _parent )',
                '_top'    => 'Load in the full body of the window ( _top )',
            ],
            'title'   => esc_html__('Social Link Target', 'axero-toolkit'),
            'default' => '_blank',
        ],

        [
            'id'    => 'twitter_url',
            'type'  => 'text',
            'title' => esc_html__('X URL', 'axero-toolkit'),
        ],
        [
            'id'    => 'facebook_url',
            'type'  => 'text',
            'title' => esc_html__('Facebook URL', 'axero-toolkit'),
        ],
        [
            'id'    => 'instagram_url',
            'type'  => 'text',
            'title' => esc_html__('Instagram URL', 'axero-toolkit'),
        ],
        [
            'id'    => 'linkedin_url',
            'type'  => 'text',
            'title' => esc_html__('Linkedin URL', 'axero-toolkit'),
        ],
        [
            'id'    => 'pinterest_url',
            'type'  => 'text',
            'title' => esc_html__('Pinterest URL', 'axero-toolkit'),
        ],
        [
            'id'    => 'dribbble_url',
            'type'  => 'text',
            'title' => esc_html__('Dribbble URL', 'axero-toolkit'),
        ],
        [
            'id'    => 'tumblr_url',
            'type'  => 'text',
            'title' => esc_html__('Tumblr URL', 'axero-toolkit'),
        ],
        [
            'id'    => 'youtube_url',
            'type'  => 'text',
            'title' => esc_html__('Youtube URL', 'axero-toolkit'),
        ],
        [
            'id'    => 'flickr_url',
            'type'  => 'text',
            'title' => esc_html__('Flickr URL', 'axero-toolkit'),
        ],
        [
            'id'    => 'behance_url',
            'type'  => 'text',
            'title' => esc_html__('Behance URL', 'axero-toolkit'),
        ],
        [
            'id'    => 'github_url',
            'type'  => 'text',
            'title' => esc_html__('Github URL', 'axero-toolkit'),
        ],
        [
            'id'    => 'skype_url',
            'type'  => 'text',
            'title' => esc_html__('Skype URL', 'axero-toolkit'),
        ],
        [
            'id'    => 'rss_url',
            'type'  => 'text',
            'title' => esc_html__('RSS URL', 'axero-toolkit'),
        ],
        [
            'id'    => 'tiktok_url',
            'type'  => 'text',
            'title' => esc_html__('TikTok URL', 'axero-toolkit'),
        ],
        [
            'id'    => 'gogole_url',
            'type'  => 'text',
            'title' => esc_html__('Google URL', 'axero-toolkit'),
        ],
        [
            'id'    => 'medium_url',
            'type'  => 'text',
            'title' => esc_html__('Medium URL', 'axero-toolkit'),
        ],
        [
            'id'    => 'snapchat_url',
            'type'  => 'text',
            'title' => esc_html__('Snapchat URL', 'axero-toolkit'),
        ],
        [
            'id'    => 'vimeo_url',
            'type'  => 'text',
            'title' => esc_html__('Vimeo URL', 'axero-toolkit'),
        ],
        [
            'id'    => 'wechat_url',
            'type'  => 'text',
            'title' => esc_html__('WeChat URL', 'axero-toolkit'),
        ],
        [
            'id'    => 'whatsapp_url',
            'type'  => 'text',
            'title' => esc_html__('WhatsApp URL', 'axero-toolkit'),
        ],
        [
            'id'    => 'wordpress_url',
            'type'  => 'text',
            'title' => esc_html__('WordPress URL', 'axero-toolkit'),
        ],
        [
            'id'    => 'weibo_url',
            'type'  => 'text',
            'title' => esc_html__('Weibo URL', 'axero-toolkit'),
        ],
        [
            'id'    => 'telegram_url',
            'type'  => 'text',
            'title' => esc_html__('Telegram URL', 'axero-toolkit'),
        ],
        [
            'id'    => 'amazon_url',
            'type'  => 'text',
            'title' => esc_html__('Amazon URL', 'axero-toolkit'),
        ],
        [
            'id'    => 'soundcloud_url',
            'type'  => 'text',
            'title' => esc_html__('Soundcloud URL', 'axero-toolkit'),
        ],
        [
            'id'    => 'leanpub_url',
            'type'  => 'text',
            'title' => esc_html__('Leanpub URL', 'axero-toolkit'),
        ],
        [
            'id'    => 'xing_url',
            'type'  => 'text',
            'title' => esc_html__('Xing URL', 'axero-toolkit'),
        ],
        [
            'id'    => 'bitcoin_url',
            'type'  => 'text',
            'title' => esc_html__('Bitcoin URL', 'axero-toolkit'),
        ],
        [
            'id'    => 'twitch_url',
            'type'  => 'text',
            'title' => esc_html__('Twitch URL', 'axero-toolkit'),
        ],
        [
            'id'    => 'gitlab_url',
            'type'  => 'text',
            'title' => esc_html__('Gitlab URL', 'axero-toolkit'),
        ],
        [
            'id'    => 'trello_url',
            'type'  => 'text',
            'title' => esc_html__('Trello URL', 'axero-toolkit'),
        ],
        [
            'id'    => 'slack_url',
            'type'  => 'text',
            'title' => esc_html__('Slack URL', 'axero-toolkit'),
        ],
    ],
]);

// Blog Area
Redux::setSection($opt_name, [
    'title'      => esc_html__('Blog Settings', 'axero-toolkit'),
    'id'         => 'axero_blog',
    'customizer' => false,
    'icon'       => 'el el-file-edit',
    'desc'       => 'Manage your blog settings.',
    'fields'     => [
        [
            'id'       => 'hide_blog_banner',
            'type'     => 'switch',
            'title'    => esc_html__('Hide Blog Banner', 'axero-toolkit'),
            'default'  => '0',
            'subtitle' => esc_html__('It will affect the blog, category, tag, and search page', 'axero-toolkit'),
        ],
        [
            'id'       => 'hide_breadcrumb',
            'type'     => 'switch',
            'title'    => esc_html__('Hide Blog Breadcrumb', 'axero-toolkit'),
            'default'  => '0',
            'required' => ['hide_blog_banner', 'equals', '0'],
            'subtitle' => esc_html__('It will affect the blog, category, tag, and search page', 'axero-toolkit'),
        ],
        [
            'id'       => 'blog_title',
            'type'     => 'text',
            'title'    => esc_html__('Blog Page Title', 'axero-toolkit'),
            'required' => ['hide_blog_banner', 'equals', '0'],
        ],
        [
            'id'       => 'axero_blog_layout',
            'type'     => 'select',
            'options'  => [
                'container'       => esc_html__('Container', 'axero-toolkit'),
                'container-fluid' => esc_html__('Container Fluid', 'axero-toolkit'),
            ],
            'title'    => esc_html__('Blog Page Width', 'axero-toolkit'),
            'default'  => 'container',
            'subtitle' => esc_html__('It will affect the blog, category, tag, and search page', 'axero-toolkit'),
        ],
        [
            'id'    => 'axero_search_page',
            'type'  => 'switch',
            'title' => esc_html__('Show Pages in the Search Result Page', 'axero-toolkit'),
            'on'    => esc_html__('Enable', 'axero-toolkit'),
            'off'   => esc_html__('Disable', 'axero-toolkit'),
        ],
        [
            'id'    => 'axero_tag_count',
            'type'  => 'text',
            'title' => esc_html__('Limit Tags in Tag Cloud Widget
            ', 'axero-toolkit'),
        ],
        [
            'id'      => 'post_image_size',
            'type'    => 'select',
            'options' => [
                'axero_post_card_thumb' => esc_html__('Default Size', 'axero-toolkit'),
                'full'                  => esc_html__('Full Size', 'axero-toolkit'),
            ],
            'title'   => esc_html__('Blog Post Image Size', 'axero-toolkit'),
            'default' => 'axero_blog_thumb',
        ],

        [
            'id'      => 'axero_blog_grid',
            'type'    => 'select',
            'options' => [
                'col-lg-12 col-md-12'   => esc_html__('One Column', 'axero-toolkit'),
                'col-lg-6 col-md-6 p-0' => esc_html__('Two Column', 'axero-toolkit'),
                'col-lg-4 col-md-6'     => esc_html__('Three Column', 'axero-toolkit'),
            ],
            'title'   => esc_html__('Blog Page Post Column', 'axero-toolkit'),
            'default' => 'col-lg-12 col-md-12',
        ],
        [
            'id'    => 'blog_info_normal',
            'type'  => 'info',
            'style' => 'warning',

            'desc'  => 'Recommended Settings for Grid:<br>Two Column: [Blog Page Width=Container][ Blog Sidebar=Without Sidebar]<br>Three Column: [Blog Page Width=Container Fluid][ Blog Sidebar=Without Sidebar]',
        ],
        [
            'id'      => 'axero_blog_sidebar',
            'type'    => 'select',
            'options' => [
                'axero_with_sidebar'           => 'With Sidebar',
                'axero_without_sidebar'        => 'Without Sidebar (Full Width)',
                'axero_without_sidebar_center' => 'Without Sidebar (Center)',
            ],
            'title'   => esc_html__('Blog Page Sidebar', 'axero-toolkit'),
            'default' => 'axero_with_sidebar',
        ],

        [
            'id'   => 'divider_blog_page',
            'type' => 'divide',
        ],

        [
            'id'      => 'axero_blog_single_layout',
            'type'    => 'select',
            'options' => [
                'container'       => esc_html__('Container', 'axero-toolkit'),
                'container-fluid' => esc_html__('Container Fluid', 'axero-toolkit'),
            ],
            'title'   => esc_html__('Single Post Page Width', 'axero-toolkit'),
            'default' => 'container',
        ],

        [
            'id'      => 'single_image_size',
            'type'    => 'select',
            'options' => [
                'axero_single_thumb' => esc_html__('Default Size', 'axero-toolkit'),
                'full'               => esc_html__('Full Size', 'axero-toolkit'),
            ],
            'title'   => esc_html__('Single Post Image Size', 'axero-toolkit'),
            'default' => 'axero_single_thumb',
        ],
        [
            'id'      => 'axero_single_blog_sidebar',
            'type'    => 'select',
            'options' => [
                'axero_with_sidebar'           => 'With Sidebar',
                'axero_without_sidebar'        => 'Without Sidebar ( full width )',
                'axero_without_sidebar_center' => 'Without Sidebar( center )',
            ],
            'title'   => esc_html__('Single Blog Sidebar', 'axero-toolkit'),
            'default' => 'axero_with_sidebar',
        ],
        [
            'title'    => esc_html__('Post Meta', 'axero-toolkit'),
            'subtitle' => esc_html__('Show/hide post meta', 'axero-toolkit'),
            'id'       => 'is_post_meta',
            'type'     => 'switch',
            'on'       => esc_html__('Show', 'axero-toolkit'),
            'off'      => esc_html__('Hide', 'axero-toolkit'),
            'default'  => '1',
        ],
        [
            'id'      => 'next_post_txt',
            'type'    => 'text',
            'title'   => esc_html__('Next Post Text', 'axero-toolkit'),
            'default' => esc_html__('Next Post', 'axero-toolkit'),
        ],
        [
            'id'      => 'previous_post_txt',
            'type'    => 'text',
            'title'   => esc_html__('Previous Post Title', 'axero-toolkit'),
            'default' => esc_html__('Previous Post', 'axero-toolkit'),
        ],
    ],
]);

// Custom Post Permalink
Redux::setSection($opt_name, [
    'title'      => esc_html__('Doctors and Services', 'axero-toolkit'),
    'id'         => 'permalink_options',
    'customizer' => false,
    'icon'       => 'el el-link',
    'fields'     => [
        [
            'id'      => 'services_label',
            'type'    => 'text',
            'title'   => esc_html__('Services Post Label', 'axero-toolkit'),
            'default' => esc_html__('Services', 'axero-toolkit'),
        ],
        [
            'id'      => 'services_permalink',
            'type'    => 'text',
            'title'   => esc_html__('Services Post Slug', 'axero-toolkit'),
            'default' => esc_html__('services', 'axero-toolkit'),
            'desc'    => '<p>After changing the permalink go to <strong style="color:#28a745;">Settings Permalinks</strong> and hit <strong style="color:#28a745;">Save Changes</strong> button.</p>',
        ],
        [
            'id'      => 'services_cat_count',
            'type'    => 'text',
            'title'   => esc_html__('Services Categories Par Page', 'axero-toolkit'),
            'default' => esc_html__('8', 'axero-toolkit'),
        ],
        [
            'id'      => 'services_post_has_archive',
            'type'    => 'select',
            'options' => [
                true  => 'True',
                false => 'False',
            ],
            'title'   => esc_html__('Services Post Has Archive?', 'axero-toolkit'),
            'default' => true,
            'desc'    => '<p>After changing the archive go to <strong style="color:#28a745;">Settings Permalinks</strong> and hit <strong style="color:#28a745;">Save Changes</strong> button.</p>',
        ],

        [
            'id'      => 'doctors_label',
            'type'    => 'text',
            'title'   => esc_html__('Doctors Post Label', 'axero-toolkit'),
            'default' => esc_html__('Doctors', 'axero-toolkit'),
        ],
        [
            'id'      => 'doctors_permalink',
            'type'    => 'text',
            'title'   => esc_html__('Doctors Post Slug', 'axero-toolkit'),
            'default' => esc_html__('doctor', 'axero-toolkit'),
            'desc'    => '<p>After changing the permalink go to <strong style="color:#28a745;">Settings Permalinks</strong> and hit <strong style="color:#28a745;">Save Changes</strong> button.</p>',
        ],

        [
            'id'      => 'doctors_post_has_archive',
            'type'    => 'select',
            'options' => [
                true  => 'True',
                false => 'False',
            ],
            'title'   => esc_html__('Doctors Post Has Archive?', 'axero-toolkit'),
            'default' => true,
            'desc'    => '<p>After changing the archive go to <strong style="color:#28a745;">Settings Permalinks</strong> and hit <strong style="color:#28a745;">Save Changes</strong> button.</p>',
        ],
    ],
]);

// Styling
Redux::setSection($opt_name, [
    'title'      => esc_html__('Styling Options', 'axero-toolkit'),
    'id'         => 'styling_options',
    'customizer' => false,
    'icon'       => ' el el-magic',
    'fields'     => [
        [
            'id'    => 'styling_options_info',
            'type'  => 'info',
            'style' => 'warning',
            'title' => esc_html__('Warning', 'axero-toolkit'),
            'desc'  => esc_html__('If some color does not affect by Theme Options then you have to change the color from page with Elementor edit mode.', 'axero-toolkit'),
        ],
        [
            'id'          => 'primary_color',
            'type'        => 'color',
            'title'       => esc_html__('Primary Color', 'axero-toolkit'),
            'default'     => '#F7931E',
            'validate'    => 'color',
            'transparent' => false,
        ],
        [
            'id'          => 'primary_color2',
            'type'        => 'color',
            'title'       => esc_html__('Primary Color 2', 'axero-toolkit'),
            'default'     => '#F0DA69',
            'validate'    => 'color',
            'transparent' => false,
        ],
        [
            'id'          => 'optional_color',
            'type'        => 'color',
            'title'       => esc_html__('Black Color', 'axero-toolkit'),
            'default'     => '#20265B',
            'validate'    => 'color',
            'transparent' => false,
        ],

        [
            'id'          => 'additionalColor1',
            'type'        => 'color',
            'title'       => esc_html__('Additional Color 1', 'axero-toolkit'),
            'default'     => '#E1F3CA',
            'validate'    => 'color',
            'transparent' => false,
            'output'      => [
                '--additionalColor1' => ':root',
            ],
        ],
        [
            'id'          => 'additionalColor2',
            'type'        => 'color',
            'title'       => esc_html__('Additional Color 2', 'axero-toolkit'),
            'default'     => '#FCD3BF',
            'validate'    => 'color',
            'transparent' => false,
            'output'      => [
                '--additionalColor2' => ':root',
            ],
        ],
        [
            'id'          => 'additionalColor3',
            'type'        => 'color',
            'title'       => esc_html__('Additional Color 3', 'axero-toolkit'),
            'default'     => '#B3C8FF',
            'validate'    => 'color',
            'transparent' => false,
            'output'      => [
                '--additionalColor3' => ':root',
            ],
        ],
        [
            'id'          => 'additionalColor4',
            'type'        => 'color',
            'title'       => esc_html__('Additional Color 4', 'axero-toolkit'),
            'default'     => '#EEBCFF',
            'validate'    => 'color',
            'transparent' => false,
            'output'      => [
                '--additionalColor4' => ':root',
            ],
        ],
        [
            'id'          => 'additionalColor5',
            'type'        => 'color',
            'title'       => esc_html__('Additional Color 5', 'axero-toolkit'),
            'default'     => '#F8E7E7',
            'validate'    => 'color',
            'transparent' => false,
            'output'      => [
                '--additionalColor5' => ':root',
            ],
        ],
        [
            'id'          => 'additionalColor6',
            'type'        => 'color',
            'title'       => esc_html__('Additional Color 6', 'axero-toolkit'),
            'default'     => '#724060',
            'validate'    => 'color',
            'transparent' => false,
            'output'      => [
                '--additionalColor6' => ':root',
            ],
        ],
        [
            'id'          => 'additionalColor7',
            'type'        => 'color',
            'title'       => esc_html__('Additional Color 7', 'axero-toolkit'),
            'default'     => '#A070A1',
            'validate'    => 'color',
            'transparent' => false,
            'output'      => [
                '--additionalColor7' => ':root',
            ],
        ],

        [
            'id'          => 'additionalColor8',
            'type'        => 'color',
            'title'       => esc_html__('Additional Color 8', 'axero-toolkit'),
            'default'     => '#FDB517',
            'validate'    => 'color',
            'transparent' => false,
            'output'      => [
                '--additionalColor11' => ':root',
            ],
        ],
        [
            'id'          => 'additionalColor9',
            'type'        => 'color',
            'title'       => esc_html__('Additional Color 9', 'axero-toolkit'),
            'default'     => '#FF6347',
            'validate'    => 'color',
            'transparent' => false,
            'output'      => [
                '--additionalColor12' => ':root',
            ],
        ],
        [
            'id'          => 'additionalColor10',
            'type'        => 'color',
            'title'       => esc_html__('Additional Color 10', 'axero-toolkit'),
            'default'     => '#38A0A7',
            'validate'    => 'color',
            'transparent' => false,
            'output'      => [
                '--additionalColor13' => ':root',
            ],
        ],
        [
            'id'          => 'additionalColor11',
            'type'        => 'color',
            'title'       => esc_html__('Additional Color 11', 'axero-toolkit'),
            'default'     => '#00A1DE',
            'validate'    => 'color',
            'transparent' => false,
            'output'      => [
                '--additionalColor14' => ':root',
            ],
        ],

        [
            'id'          => 'paragraphColor',
            'type'        => 'color',
            'title'       => esc_html__('Theme Paragraph Color', 'axero-toolkit'),
            'default'     => '#20265B',
            'validate'    => 'color',
            'transparent' => false,
        ],

        [
            'id'          => 'nav_item_color',
            'type'        => 'color',
            'title'       => esc_html__('Navbar Item Color', 'axero-toolkit'),
            'default'     => '#20265B',
            'validate'    => 'color',
            'transparent' => false,
        ],

        [
            'id'          => 'mob_nav_item_color',
            'type'        => 'color',
            'title'       => esc_html__('Offcanvas Navbar Item Color', 'axero-toolkit'),
            'default'     => '#20265B ',
            'validate'    => 'color',
            'transparent' => false,
        ],

    ],
]);

// Typography
Redux::setSection($opt_name, [
    'title'      => esc_html__('Typography', 'axero-toolkit'),
    'desc'       => esc_html__('Manage your fonts and typefaces.', 'axero-toolkit'),
    'icon'       => 'el-icon-fontsize',
    'customizer' => false,
    'fields'     => [
        [
            'id'          => 'primary_typography',
            'type'        => 'typography',
            'title'       => esc_html__('Primary Typography', 'axero-toolkit'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => false,
            'font-style'  => true,
            'font-weight' => true,
            'font-size'   => true,
            'text-align'  => false,
            'color'       => true,
            'line-height' => true,
            'output'      => 'body',
        ],
        [
            'id'          => 'heading_typography',
            'type'        => 'typography',
            'title'       => esc_html__('Heading Typography', 'axero-toolkit'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => false,
            'font-style'  => true,
            'font-weight' => true,
            'font-size'   => true,
            'text-align'  => false,
            'color'       => true,
            'line-height' => true,
            'output'      => 'h1, h2, h3, h4, h5, h6',
        ],
    ],
]);

// Advanced Settings
Redux::setSection($opt_name, [
    'title'      => esc_html__('Advanced Settings', 'axero-toolkit'),
    'icon'       => 'el-icon-cogs',
    'customizer' => false,
    'fields'     => [
        [
            'id'       => 'css_code',
            'type'     => 'ace_editor',
            'title'    => esc_html__('Custom CSS Code', 'axero-toolkit'),
            'desc'     => esc_html__('e.g. .btn-primary{ background: #000; } Don\'t use &lt;style&gt; tags', 'axero-toolkit'),
            'subtitle' => esc_html__('Paste your CSS code here.', 'axero-toolkit'),
            'mode'     => 'css',
            'theme'    => 'monokai',
        ],
        [
            'id'       => 'js_code',
            'type'     => 'ace_editor',
            'title'    => esc_html__('Custom JS Code', 'axero-toolkit'),
            'desc'     => esc_html__('e.g. alert("Hello World!"); Don\'t use&lt;script&gt;tags.', 'axero-toolkit'),
            'subtitle' => esc_html__('Paste your JS code here.', 'axero-toolkit'),
            'mode'     => 'javascript',
            'theme'    => 'monokai',
        ],
    ],
]);

// 404 Area
Redux::setSection($opt_name, [
    'title'  => esc_html__('404 Settings', 'axero-toolkit'),
    'id'     => 'axero_404',
    'icon'   => 'el el-question-sign',
    'fields' => [
        [
            'id'      => 'error_page_title',
            'type'    => 'text',
            'title'   => esc_html__('Banner Title', 'axero-toolkit'),
            'default' => 'Uh-oh! Page not <span>found</span>!',
            'desc'    => esc_html__('Default: Uh-oh! Page not <span>found</span>!', 'axero-toolkit'),
        ],
        [
            'id'      => 'button_not_found',
            'type'    => 'text',
            'title'   => esc_html__('Back to Home Button Text', 'axero-toolkit'),
            'default' => 'Back To Home',
            'desc'    => esc_html__('Default: Back To Home', 'axero-toolkit'),
        ],
        [
            'id'      => 'button_icon_404',
            'type'    => 'media',
            'url'     => true,
            'title'   => esc_html__('Button Icon', 'axero-toolkit'),
            'desc'    => esc_html__('Upload the white right arrow icon for the back to home button. Default: white-right-top-arrow.svg', 'axero-toolkit'),
            'default' => [
                'url' => get_template_directory_uri() . '/assets/images/icons/white-right-top-arrow.svg',
            ],
        ],
        [
            'id'     => 'error_page_title_typo',
            'type'   => 'typography',
            'title'  => esc_html__('404 Title Typography', 'axero-toolkit'),
            'output' => '.page-banner-area .page-banner-content h1',
        ],
        [
            'id'          => 'error_page_title_color',
            'type'        => 'color',
            'title'       => esc_html__('404 Title Color', 'axero-toolkit'),
            'default'     => '#20265B',
            'validate'    => 'color',
            'transparent' => false,
            'output'      => [
                'color' => '.page-banner-area .page-banner-content h1',
            ],
        ],
        [
            'id'          => 'error_page_title_span_color',
            'type'        => 'color',
            'title'       => esc_html__('404 Title 2nd Part (Span) Color', 'axero-toolkit'),
            'default'     => '#5538CE',
            'validate'    => 'color',
            'transparent' => false,
            'output'      => [
                'color' => '.page-banner-area .page-banner-content h1 span',
            ],
        ],
        [
            'id'     => 'error_page_title_span_typo',
            'type'   => 'typography',
            'title'  => esc_html__('404 Title 2nd Part (Span) Typography', 'axero-toolkit'),
            'output' => '.page-banner-area .page-banner-content h1 span',
        ],
        [
            'id'          => 'error_page_link_btn_bg_color',
            'type'        => 'color',
            'title'       => esc_html__('404 Link Button Background Color', 'axero-toolkit'),
            'default'     => '#5538CE',
            'validate'    => 'color',
            'transparent' => false,
            'output'      => [
                'background-color' => '.content-404 .link-btn',
            ],
        ],
        [
            'id'          => 'error_page_link_btn_text_color',
            'type'        => 'color',
            'title'       => esc_html__('404 Link Button Text Color', 'axero-toolkit'),
            'default'     => '#fff',
            'validate'    => 'color',
            'transparent' => false,
            'output'      => [
                'color' => '.content-404 .link-btn',
            ],
        ],
        [
            'id'     => 'error_page_link_btn_typography',
            'type'   => 'typography',
            'title'  => esc_html__('404 Link Button Typography', 'axero-toolkit'),
            'output' => '.content-404 .link-btn',
        ],
        [
            'id'          => 'error_page_link_btn_bg_color_hover',
            'type'        => 'color',
            'title'       => esc_html__('404 Link Button Hover Background Color', 'axero-toolkit'),
            'default'     => '#5538CE',
            'validate'    => 'color',
            'transparent' => false,
            'output'      => [
                'background-color' => '.content-404 .link-btn:hover',
            ],
        ],
        [
            'id'          => 'error_page_link_btn_text_color_hover',
            'type'        => 'color',
            'title'       => esc_html__('404 Link Button Hover Text Color', 'axero-toolkit'),
            'default'     => '#fff',
            'validate'    => 'color',
            'transparent' => false,
            'output'      => [
                'color' => '.content-404 .link-btn:hover',
            ],
        ],
    ],
]);

/**
 * This is a test function that will let you see when the compiler hook occurs.
 * It only runs if a field    set with compiler=>true is changed.
 * */
if (! function_exists('compiler_action')) {
    function compiler_action($options, $css, $changed_values)
    {
        echo '<h1>The compiler hook has run!</h1>';
        echo "<pre>";
        print_r($changed_values); // Values that have changed since the last save
        echo "</pre>";
        //print_r($options); //Option values
        //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
    }
}

// Custom function for the callback validation referenced above
if (! function_exists('redux_validate_callback_function')) {
    function redux_validate_callback_function($field, $value, $existing_value)
    {
        $error   = false;
        $warning = false;

        //do your validation
        if ($value == 1) {
            $error = true;
            $value = $existing_value;
        } elseif ($value == 2) {
            $warning = true;
            $value   = $existing_value;
        }

        $return['value'] = $value;

        if ($error == true) {
            $field['msg']    = 'your custom error message';
            $return['error'] = $field;
        }

        if ($warning == true) {
            $field['msg']      = 'your custom warning message';
            $return['warning'] = $field;
        }

        return $return;
    }
}

// Custom function for the callback referenced above
if (! function_exists('redux_my_custom_field')) {
    function redux_my_custom_field($field, $value)
    {
        print_r($field);
        echo '<br/>';
        print_r($value);
    }
}

/**
 * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
 * Simply include this function in the child themes functions.php file.
 * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
 * so you must use get_template_directory_uri() if you want to use any of the built in icons
 * */
if (! function_exists('dynamic_section')) {
    function dynamic_section($sections)
    {
        //$sections = array();
        $sections[] = [
            'title'  => __('Section via hook', 'axero-toolkit'),
            'desc'   => __('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'axero-toolkit'),
            'icon'   => 'el el-paper-clip',
            // Leave this as a blank section, no options just some intro text set above.
            'fields' => [],
        ];

        return $sections;
    }
}

// Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
if (! function_exists('change_arguments')) {
    function change_arguments($args)
    {
        //$args['dev_mode'] = true;

        return $args;
    }
}

// Filter hook for filtering the default value of any given field. Very useful in development mode.
if (! function_exists('change_defaults')) {
    function change_defaults($defaults)
    {
        $defaults['str_replace'] = 'Testing filter hook!';

        return $defaults;
    }
}

// Removes the demo link and the notice of integrated demo from the redux-framework plugin
if (! function_exists('remove_demo')) {
    function remove_demo()
    {
        // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
        if (class_exists('ReduxFrameworkPlugin')) {
            remove_filter('plugin_row_meta', [
                ReduxFrameworkPlugin::instance(),
                'plugin_metalinks',
            ], null, 2);

            // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
            remove_action('admin_notices', [ReduxFrameworkPlugin::instance(), 'admin_notices']);
        }
    }
}
