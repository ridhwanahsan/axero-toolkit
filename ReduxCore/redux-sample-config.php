<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'opt_name/opt_name', 'lunex_opt' );

    // Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();

    if ( is_dir( $sample_patterns_path ) ) {
        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();
            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {
                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    // All the possible arguments for Redux.
    $theme = wp_get_theme(); // For use with some settings. Not necessary.
    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Theme Options', 'lunex-toolkit' ),
        'page_title'           => __( 'Theme Options', 'lunex-toolkit' ),
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
        'page_slug'            => 'lunex_opt',
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
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '<p></p>', 'lunex-toolkit' ), $v );
    } else {
        $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'lunex-toolkit' );
    }
    Redux::setArgs( $opt_name, $args );

// General Options
Redux::setSection( $opt_name, array(
    'title'             => esc_html__( 'General Options', 'lunex-toolkit' ),
    'id'                => 'general_options',
    'customizer'        => false,
    'icon'              => ' el el-home',
    'fields'     => array(
        array(
            'id'       => 'main_logo',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'Dark Logo', 'lunex-toolkit' ),
            'desc'     => esc_html__( 'Recommended sizes - width: 100px, height: 30px with SVG format', 'lunex-toolkit' ),
        ),
        array(
            'id'       => 'light_logo',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'Light Logo', 'lunex-toolkit' ),
            'desc'     => esc_html__( 'Recommended sizes - width: 100px, height: 30px with SVG format', 'lunex-toolkit' ),
        ),
        array(
            'title'     => __( 'Site Logo Dimensions', 'lunex-toolkit' ),
            'id'        => 'main_logo_dimensions',
            'type'      => 'dimensions',
            'units'     => array( 'em','px','%' ),
            'output'    => '.navbar .navbar-brand img'
        ),
        array(
            'id'        => 'enable_back_to_top',
            'type'      => 'switch',
            'title'     => esc_html__('Enable back-to-top Button', 'lunex-toolkit'),
            'default'   => '1'
        ),
    ),
) );

// Preloader Options
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Preloader', 'lunex-toolkit' ),
    'id'               => 'preloader_opt',
    'customizer'        => false,
    'icon'             => 'dashicons dashicons-controls-repeat',
    'fields'           => array(

        array(
            'id'      => 'enable_preloader',
            'type'    => 'switch',
            'title'   => esc_html__( 'Pre-loader', 'lunex-toolkit' ),
            'on'      => esc_html__( 'Enable', 'lunex-toolkit' ),
            'off'     => esc_html__( 'Disable', 'lunex-toolkit' ),
            'default' => true,
        ),

        array(
            'title'     => esc_html__( 'Background Color', 'lunex-toolkit' ),
            'id'        => 'preloader_color_spin',
            'type'      => 'background',
            'background-image'      => false,
            'background-repeat'     => false,
            'background-size'       => false,
            'background-attachment' => false,
            'background-position'   => false,
            'transparent'           => false,
            'output'                => '.preloader-area',
            'required'              => array( 'enable_preloader', '=', '1' ),
        ),
    array(
        'id'        => 'preloader_spinner_color',
        'type'      => 'color',
        'title'     => esc_html__('Spinner Color', 'lunex-toolkit'),
        'default'   => '#000000',
        'validate'  => 'color',
        'transparent' => false,
        'output'    => array(
            '--blackColor' => '.preloader-area .loader'
        ),
        'required'  => array( 'enable_preloader', '=', '1' ),
    ),
    array(
        'id'        => 'preloader_spinner_bg_color',
        'type'      => 'color',
        'title'     => esc_html__('Spinner Background Color', 'lunex-toolkit'),
        'default'   => '#ffffff',
        'validate'  => 'color',
        'transparent' => false,
        'output'    => array(
            '--whiteColor' => '.preloader-area .loader'
        ),
        'required'  => array( 'enable_preloader', '=', '1' ),
    ),
    )
));
// Back to Top Options
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Back to Top', 'lunex-toolkit' ),
    'id'               => 'back_to_top_opt',
    'customizer'       => false,
    'icon'             => 'dashicons dashicons-arrow-up-alt',
    'fields'           => array(

        array(
            'id'      => 'enable_back_to_top',
            'type'    => 'switch',
            'title'   => esc_html__( 'Back to Top Button', 'lunex-toolkit' ),
            'on'      => esc_html__( 'Enable', 'lunex-toolkit' ),
            'off'     => esc_html__( 'Disable', 'lunex-toolkit' ),
            'default' => true,
        ),

        array(
            'id'        => 'back_to_top_bg_color',
            'type'      => 'color',
            'title'     => esc_html__('Background Color', 'lunex-toolkit'),
            'default'   => '#5538CE',
            'validate'  => 'color',
            'transparent' => false,
            'output'    => array(
                'background-color' => '.back-to-top'
            ),
            'required'  => array( 'enable_back_to_top', '=', '1' ),
        ),
        array(
            'id'        => 'back_to_top_hover_bg_color',
            'type'      => 'color',
            'title'     => esc_html__('Hover Background Color', 'lunex-toolkit'),
            'default'   => '#20265B',
            'validate'  => 'color',
            'transparent' => false,
            'output'    => array(
                'background-color' => '.back-to-top:hover'
            ),
            'required'  => array( 'enable_back_to_top', '=', '1' ),
        ),

       
    )
));

// Header Option
Redux::setSection( $opt_name, array(
	'title' => esc_html__('Header', 'lunex-toolkit'),
	'icon'  => 'el el-caret-up',
	'customizer' => false,
	'fields' => array(
        array(
            'id'        => 'enable_sticky_header',
            'type'      => 'switch',
            'title'     => esc_html__('Enable Sticky Header', 'lunex-toolkit'),
            'desc'      => esc_html__('', 'lunex-toolkit'),
            'default'   => '0',
        ),
        
        array(
            'id'        => 'dark_mode_switch',
            'type'      => 'switch',
            'title'     => esc_html__('Dark Mode Toggle', 'lunex-toolkit'),
            'desc'      => esc_html__('Show/hide dark mode toggle button', 'lunex-toolkit'),
            'default'   => '1',
        ),
    
        array(
            'id'        => 'enable_header_button',
            'type'      => 'switch',
            'title'     => esc_html__('Enable Header Button', 'lunex-toolkit'),
            'desc'      => esc_html__('Show/hide header button', 'lunex-toolkit'),
            'default'   => '1',
        ),
        array(
            'id'   =>'divider_header1',
            'type' => 'divide'
        ),

        array(
			'id'    => 'header_btn_text',
            'type'  => 'text',
			'title' => esc_html__('Header Button Text', 'lunex-toolkit'),
            'default' => 'Talk to Us',
        ),
        array(
			'id'    => 'header_btn_icon',
            'type'  => 'text',
			'title' => esc_html__('Header Button Icon Class Name', 'lunex-toolkit'),
            'default' => 'flaticon-right-arrow',
            'description' => "You can use https://remixicon.com/ icons ex: ri-arrow-right-s-line",
        ),
        array(
			'id'    => 'header_btn_link',
            'type'  => 'text',
			'title' => esc_html__('Header Button Link', 'lunex-toolkit'),
            'default' => '#',
        ),
  
	)
) );

// Mobile Header Option
Redux::setSection( $opt_name, array(
	'title' => esc_html__('Mobile Header', 'lunex-toolkit'),
	'icon'  => 'el el-list-alt',
	'customizer' => false,
	'fields' => array(
        array(
            'id'        => 'mobile_menu_location_title',
            'type'      => 'text',
            'title'     => esc_html__('Location Title', 'lunex-toolkit'),
            'default'   => 'The Empire State',
        ),
        array(
            'id'        => 'mobile_menu_location_address',
            'type'      => 'text',
            'title'     => esc_html__('Location Address', 'lunex-toolkit'),
            'default'   => 'Parker Avenue, Kingsley Road, New York',
        ),
        array(
            'id'        => 'mobile_menu_email',
            'type'      => 'text',
            'title'     => esc_html__('Email Address', 'lunex-toolkit'),
            'default'   => 'support@lunex.com',
        ),
        array(
            'id'   =>'divider_mobile_header',
            'type' => 'divide'
        ),
             array(
            'id' => 'mobile_header_social_target',
            'type' => 'select',
            'options' => array(
                '_blank'    => 'Load in a new window. ( _blank )',
                '_self'     => 'Load in the same frame as it was clicked. ( _self )',
                '_parent'   => 'Load in the parent frameset. ( _parent )',
                '_top'      => 'Load in the full body of the window ( _top )',
            ),
            'title'     => esc_html__( 'Social Link Target', 'lunex-toolkit' ),
            'default'   => '_blank',
        ),
        array(
            'id'        => 'facebook_link',
            'type'      => 'text',
            'title'     => esc_html__('Facebook Link', 'lunex-toolkit'),
            'default'   => '#',
        ),
        array(
            'id'        => 'instagram_link',
            'type'      => 'text',
            'title'     => esc_html__('Instagram Link', 'lunex-toolkit'),
            'default'   => '#',
        ),
        array(
            'id'        => 'threads_link',
            'type'      => 'text',
            'title'     => esc_html__('Threads Link', 'lunex-toolkit'),
            'default'   => '#',
        ),
        array(
            'id'        => 'twitter_link',
            'type'      => 'text',
            'title'     => esc_html__('Twitter/X Link', 'lunex-toolkit'),
            'default'   => '#',
        ),
        array(
            'id'        => 'youtube_link',
            'type'      => 'text',
            'title'     => esc_html__('YouTube Link', 'lunex-toolkit'),
            'default'   => '#',
        ),
         
) ));
 
// Footer Area
Redux::setSection( $opt_name, array(
    'title'             => esc_html__( 'Footer', 'lunex-toolkit' ),
    'id'                => 'footer',
    'customizer'        => false,
    'icon'              => 'el el-edit',
    'fields' => array(
        array(
            'id'   =>'divider_footer',
            'desc' => '<div style="font-size:16px;">The Lunex footer is built using Elementor. To add or update footer content, please navigate to UAE -> Elementor Header & Footer Builder.</div>',
            'type' => 'info',
        ),
    array(
        'id'        => 'footer_copyright_year',
        'type'      => 'text',
        'title'     => esc_html__('Copyright Year', 'lunex-toolkit'),
        'default'   => '2025',
    ),
    array(
        'id'        => 'footer_copyright_link_url',
        'type'      => 'text',
        'title'     => esc_html__('Copyright Link URL', 'lunex-toolkit'),
        'default'   => 'https://nsatheme.com/',
    ),
    array(
        'id'        => 'footer_copyright_link_text',
        'type'      => 'text',
        'title'     => esc_html__('Copyright Link Text', 'lunex-toolkit'),
        'default'   => 'NsaTheme',
    ),
    array(
        'id'        => 'footer_copyright_text',
        'type'      => 'text',
        'title'     => esc_html__('Copyright Text', 'lunex-toolkit'),
        'default'   => 'All rights reserved.',
    ),
    )
));

// Banner
Redux::setSection( $opt_name, array(
    'title'             => esc_html__( 'Banner', 'lunex-toolkit' ),
    'id'                => 'banner_options',
    'customizer'        => false,
    'icon'              => 'el el-website',
    'fields'     => array(
       
        array(
            'id'        => 'page_title_tag',
            'type'      => 'select',
            'title'     => esc_html__( 'Banner Title Tag', 'lunex-toolkit' ),
            'options' => array(
                'h1'         => esc_html__( 'h1', 'lunex-toolkit' ),
                'h2'         => esc_html__( 'h2', 'lunex-toolkit' ),
                'h3'         => esc_html__( 'h3', 'lunex-toolkit' ),
                'h4'         => esc_html__( 'h4', 'lunex-toolkit' ),
                'h5'         => esc_html__( 'h5', 'lunex-toolkit' ),
                'h6'         => esc_html__( 'h6', 'lunex-toolkit' ),
            ),
            'default' => 'h2'
        ),
        array(
            'id'        => 'title_title_typo',
            'type'      => 'typography',
            'text-align'    => false,
            'title'     => esc_html__( 'Title Typography', 'lunex-toolkit' ),
            'output'    => '.breadcrumb-content h2'
        ),
        array(
            'id'        => 'title_desc_typo',
            'type'      => 'typography',
            'text-align'    => false,
            'title'     => esc_html__( 'Breadcumb Typography', 'lunex-toolkit' ),
            'output'    => '.page-banner-content .list, .cs-page-banner-content .list'
        ),

        array(
            'id'       => 'banner_shape1',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'Banner Shape Image 1', 'lunex-toolkit' ),
        ),
        array(
            'id'       => 'banner_shape2',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'Banner Shape Image 2', 'lunex-toolkit' ),
        ),
        array(
            'id'       => 'banner_shape3',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'Banner Shape Image 3', 'lunex-toolkit' ),
        ),
    ),
) );

// Social Profiles
Redux::setSection( $opt_name, array(
	'title' => esc_html__('Social Profiles', 'lunex-toolkit'),
	'desc'  => 'Social profiles are used in different places inside the theme.',
	'icon'  => 'el-icon-user',
	'customizer' => false,
	'fields' => array(
        array(
            'id' => 'lunex_social_target',
            'type' => 'select',
            'options' => array(
                '_blank'    => 'Load in a new window. ( _blank )',
                '_self'     => 'Load in the same frame as it was clicked. ( _self )',
                '_parent'   => 'Load in the parent frameset. ( _parent )',
                '_top'      => 'Load in the full body of the window ( _top )',
            ),
            'title'     => esc_html__( 'Social Link Target', 'lunex-toolkit' ),
            'default'   => '_blank',
        ),

        array(
			'id'    => 'twitter_url',
            'type'  => 'text',
			'title' => esc_html__('X URL', 'lunex-toolkit')
		),
		array(
			'id'    => 'facebook_url',
			'type'  => 'text',
			'title' =>esc_html__('Facebook URL', 'lunex-toolkit')
		),
		array(
			'id'    => 'instagram_url',
			'type'  => 'text',
			'title' => esc_html__('Instagram URL', 'lunex-toolkit')
		),
		array(
			'id'    => 'linkedin_url',
			'type'  => 'text',
			'title' => esc_html__('Linkedin URL', 'lunex-toolkit')
		),
		array(
			'id'    => 'pinterest_url',
			'type'  => 'text',
			'title' =>esc_html__('Pinterest URL', 'lunex-toolkit')
		),
		array(
			'id'    => 'dribbble_url',
			'type'  => 'text',
			'title' =>esc_html__('Dribbble URL', 'lunex-toolkit')
		),
		array(
			'id'    => 'tumblr_url',
			'type'  => 'text',
			'title' =>esc_html__('Tumblr URL', 'lunex-toolkit')
		),
		array(
			'id'    => 'youtube_url',
			'type'  => 'text',
			'title' =>  esc_html__('Youtube URL', 'lunex-toolkit')
		),
		array(
			'id'    => 'flickr_url',
			'type'  => 'text',
			'title' =>  esc_html__('Flickr URL', 'lunex-toolkit')
		),
		array(
			'id'    => 'behance_url',
			'type'  => 'text',
			'title' =>  esc_html__('Behance URL', 'lunex-toolkit'),
		),
		array(
			'id'    => 'github_url',
			'type'  => 'text',
			'title' =>  esc_html__('Github URL', 'lunex-toolkit'),
		),
		array(
			'id'    => 'skype_url',
			'type'  => 'text',
			'title' =>  esc_html__('Skype URL', 'lunex-toolkit'),
		),
		array(
			'id'    => 'rss_url',
			'type'  => 'text',
			'title' =>  esc_html__('RSS URL', 'lunex-toolkit')
		),
		array(
			'id'    => 'tiktok_url',
			'type'  => 'text',
			'title' =>  esc_html__('TikTok URL', 'lunex-toolkit')
		),
		array(
			'id'    => 'gogole_url',
			'type'  => 'text',
			'title' =>  esc_html__('Google URL', 'lunex-toolkit')
		),
		array(
			'id'    => 'medium_url',
			'type'  => 'text',
			'title' =>  esc_html__('Medium URL', 'lunex-toolkit')
		),
        array(
			'id'    => 'snapchat_url',
			'type'  => 'text',
			'title' =>  esc_html__('Snapchat URL', 'lunex-toolkit')
		),
        array(
			'id'    => 'vimeo_url',
			'type'  => 'text',
			'title' =>  esc_html__('Vimeo URL', 'lunex-toolkit')
		),
        array(
			'id'    => 'wechat_url',
			'type'  => 'text',
			'title' =>  esc_html__('WeChat URL', 'lunex-toolkit')
		),
        array(
			'id'    => 'whatsapp_url',
			'type'  => 'text',
			'title' =>  esc_html__('WhatsApp URL', 'lunex-toolkit')
		),
        array(
			'id'    => 'wordpress_url',
			'type'  => 'text',
			'title' =>  esc_html__('WordPress URL', 'lunex-toolkit')
		),
        array(
			'id'    => 'weibo_url',
			'type'  => 'text',
			'title' =>  esc_html__('Weibo URL', 'lunex-toolkit')
		),
        array(
			'id'    => 'telegram_url',
			'type'  => 'text',
			'title' =>  esc_html__('Telegram URL', 'lunex-toolkit')
		),
        array(
			'id'    => 'amazon_url',
			'type'  => 'text',
			'title' =>  esc_html__('Amazon URL', 'lunex-toolkit')
		),
        array(
			'id'    => 'soundcloud_url',
			'type'  => 'text',
			'title' =>  esc_html__('Soundcloud URL', 'lunex-toolkit')
		),
        array(
			'id'    => 'leanpub_url',
			'type'  => 'text',
			'title' =>  esc_html__('Leanpub URL', 'lunex-toolkit')
		),
        array(
			'id'    => 'xing_url',
			'type'  => 'text',
			'title' =>  esc_html__('Xing URL', 'lunex-toolkit')
		),
        array(
			'id'    => 'bitcoin_url',
			'type'  => 'text',
			'title' =>  esc_html__('Bitcoin URL', 'lunex-toolkit')
		),
        array(
			'id'    => 'twitch_url',
			'type'  => 'text',
			'title' =>  esc_html__('Twitch URL', 'lunex-toolkit')
		),
        array(
			'id'    => 'gitlab_url',
			'type'  => 'text',
			'title' =>  esc_html__('Gitlab URL', 'lunex-toolkit')
		),
        array(
			'id'    => 'trello_url',
			'type'  => 'text',
			'title' =>  esc_html__('Trello URL', 'lunex-toolkit')
		),
        array(
			'id'    => 'slack_url',
			'type'  => 'text',
			'title' =>  esc_html__('Slack URL', 'lunex-toolkit')
		),
	)
) );

// Blog Area
Redux::setSection( $opt_name, array(
    'title'         => esc_html__( 'Blog Settings', 'lunex-toolkit' ),
    'id'            => 'lunex_blog',
    'customizer'    => false,
    'icon'          => 'el el-file-edit',
    'desc'          => 'Manage your blog settings.',
    'fields' => array(
        array(
			'id'    => 'hide_blog_banner',
            'type'  => 'switch',
            'title' => esc_html__('Hide Blog Banner', 'lunex-toolkit'),
            'default'   => '0',
            'subtitle'  => esc_html__( 'It will affect the blog, category, tag, and search page', 'lunex-toolkit' ),
        ),
        array(
			'id'    => 'hide_breadcrumb',
            'type'  => 'switch',
			'title' => esc_html__('Hide Blog Breadcrumb', 'lunex-toolkit'),
            'default'   => '0',
            'required'      => array('hide_blog_banner','equals','0'),
            'subtitle'  => esc_html__( 'It will affect the blog, category, tag, and search page', 'lunex-toolkit' ),
        ),
        array(
            'id'       => 'blog_title',
            'type'     => 'text',
            'title'    => esc_html__( 'Blog Page Title', 'lunex-toolkit' ),
            'required'      => array('hide_blog_banner','equals','0'),
        ),
        array(
            'id' => 'lunex_blog_layout',
            'type' => 'select',
            'options' => array(
                'container'                 => esc_html__( 'Container', 'lunex-toolkit' ),
                'container-fluid'           => esc_html__( 'Container Fluid', 'lunex-toolkit' ),
            ),
            'title'     => esc_html__( 'Blog Page Width', 'lunex-toolkit' ),
            'default'   => 'container',
            'subtitle'  => esc_html__( 'It will affect the blog, category, tag, and search page', 'lunex-toolkit' ),
        ),
        array(
			'id'    => 'lunex_search_page',
            'type'  => 'switch',
            'title' => esc_html__('Show Pages in the Search Result Page', 'lunex-toolkit'),
            'on'      => esc_html__( 'Enable', 'lunex-toolkit' ),
            'off'     => esc_html__( 'Disable', 'lunex-toolkit' ),
        ),
        array(
			'id'    => 'lunex_tag_count',
            'type'  => 'text',
            'title' => esc_html__('Limit Tags in Tag Cloud Widget
            ', 'lunex-toolkit'),
        ),
        array(
            'id' => 'post_image_size',
            'type' => 'select',
            'options' => array(
                'lunex_post_card_thumb'    => esc_html__( 'Default Size', 'lunex-toolkit' ),
                'full'                      => esc_html__( 'Full Size', 'lunex-toolkit' ),
            ),
            'title'     => esc_html__( 'Blog Post Image Size', 'lunex-toolkit' ),
            'default'   => 'lunex_blog_thumb',
        ),

        array(
            'id' => 'lunex_blog_grid',
            'type' => 'select',
            'options' => array(
                'col-lg-12 col-md-12'       => esc_html__( 'One Column', 'lunex-toolkit' ),
                'col-lg-6 col-md-6 p-0'      => esc_html__( 'Two Column', 'lunex-toolkit' ),
                'col-lg-4 col-md-6'         => esc_html__( 'Three Column', 'lunex-toolkit' ),
            ),
            'title'     => esc_html__( 'Blog Page Post Column', 'lunex-toolkit' ),
            'default'   => 'col-lg-12 col-md-12',
        ),
        array(
            'id'   => 'blog_info_normal',
            'type' => 'info',
            'style' => 'warning',

            'desc' => 'Recommended Settings for Grid:<br>Two Column: [Blog Page Width=Container][ Blog Sidebar=Without Sidebar]<br>Three Column: [Blog Page Width=Container Fluid][ Blog Sidebar=Without Sidebar]',
        ),
        array(
            'id' => 'lunex_blog_sidebar',
            'type' => 'select',
            'options' => array(
                'lunex_with_sidebar'              => 'With Sidebar',
                'lunex_without_sidebar'           => 'Without Sidebar (Full Width)',
                'lunex_without_sidebar_center'    => 'Without Sidebar (Center)',
            ),
            'title'     => esc_html__( 'Blog Page Sidebar', 'lunex-toolkit' ),
            'default'   => 'lunex_with_sidebar',
        ),

        array(
            'id'   =>'divider_blog_page',
            'type' => 'divide'
        ),

        array(
            'id' => 'lunex_blog_single_layout',
            'type' => 'select',
            'options' => array(
                'container'                 => esc_html__( 'Container', 'lunex-toolkit' ),
                'container-fluid'           => esc_html__( 'Container Fluid', 'lunex-toolkit' ),
            ),
            'title'     => esc_html__( 'Single Post Page Width', 'lunex-toolkit' ),
            'default'   => 'container',
        ),

        array(
            'id' => 'single_image_size',
            'type' => 'select',
            'options' => array(
                'lunex_single_thumb'   => esc_html__( 'Default Size', 'lunex-toolkit' ),
                'full'                  => esc_html__( 'Full Size', 'lunex-toolkit' ),
            ),
            'title'     => esc_html__( 'Single Post Image Size', 'lunex-toolkit' ),
            'default'   => 'lunex_single_thumb',
        ),
        array(
            'id' => 'lunex_single_blog_sidebar',
            'type' => 'select',
            'options' => array(
                'lunex_with_sidebar'              => 'With Sidebar',
                'lunex_without_sidebar'           => 'Without Sidebar ( full width )',
                'lunex_without_sidebar_center'    => 'Without Sidebar( center )',
            ),
            'title'     => esc_html__( 'Single Blog Sidebar', 'lunex-toolkit' ),
            'default'   => 'lunex_with_sidebar',
        ),
        array(
			'title'     => esc_html__( 'Post Meta', 'lunex-toolkit' ),
			'subtitle'  => esc_html__( 'Show/hide post meta', 'lunex-toolkit' ),
			'id'        => 'is_post_meta',
			'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'lunex-toolkit' ),
            'off'       => esc_html__( 'Hide', 'lunex-toolkit' ),
            'default'   => '1',
        ),
        array(
            'id'       => 'next_post_txt',
            'type'     => 'text',
            'title'    => esc_html__( 'Next Post Text', 'lunex-toolkit' ),
            'default'  => esc_html__( 'Next Post', 'lunex-toolkit'),
        ),
        array(
            'id'       => 'previous_post_txt',
            'type'     => 'text',
            'title'    => esc_html__( 'Previous Post Title', 'lunex-toolkit' ),
            'default'  => esc_html__( 'Previous Post', 'lunex-toolkit'),
        ),
    )
));

// Custom Post Permalink
Redux::setSection( $opt_name, array(
    'title'             => esc_html__( 'Doctors and Services', 'lunex-toolkit' ),
    'id'                => 'permalink_options',
    'customizer'        => false,
    'icon'              => 'el el-link',
    'fields'     => array(
        array(
			'id'    => 'services_label',
			'type'  => 'text',
			'title' =>  esc_html__('Services Post Label', 'lunex-toolkit'),
            'default'  => esc_html__('Services', 'lunex-toolkit'),
		),
        array(
			'id'    => 'services_permalink',
			'type'  => 'text',
			'title' =>  esc_html__('Services Post Slug', 'lunex-toolkit'),
            'default'  => esc_html__('services', 'lunex-toolkit'),
            'desc'     => '<p>After changing the permalink go to <strong style="color:#28a745;">Settings Permalinks</strong> and hit <strong style="color:#28a745;">Save Changes</strong> button.</p>',
		),
        array(
			'id'    => 'services_cat_count',
			'type'  => 'text',
			'title' =>  esc_html__('Services Categories Par Page', 'lunex-toolkit'),
            'default'  => esc_html__('8', 'lunex-toolkit'),
		),
        array(
            'id'      => 'services_post_has_archive',
            'type'    => 'select',
            'options' => array(
                true        => 'True',
                false       => 'False',
            ),
            'title'     => esc_html__( 'Services Post Has Archive?', 'lunex-toolkit' ),
            'default'   => true,
            'desc'     => '<p>After changing the archive go to <strong style="color:#28a745;">Settings Permalinks</strong> and hit <strong style="color:#28a745;">Save Changes</strong> button.</p>',
        ),

        array(
			'id'    => 'doctors_label',
			'type'  => 'text',
			'title' =>  esc_html__('Doctors Post Label', 'lunex-toolkit'),
            'default'  => esc_html__('Doctors', 'lunex-toolkit'),
		),
        array(
			'id'    => 'doctors_permalink',
			'type'  => 'text',
			'title' =>  esc_html__('Doctors Post Slug', 'lunex-toolkit'),
            'default'  => esc_html__('doctor', 'lunex-toolkit'),
            'desc'     => '<p>After changing the permalink go to <strong style="color:#28a745;">Settings Permalinks</strong> and hit <strong style="color:#28a745;">Save Changes</strong> button.</p>',
		),
        
        array(
            'id'      => 'doctors_post_has_archive',
            'type'    => 'select',
            'options' => array(
                true        => 'True',
                false       => 'False',
            ),
            'title'     => esc_html__( 'Doctors Post Has Archive?', 'lunex-toolkit' ),
            'default'   => true,
            'desc'     => '<p>After changing the archive go to <strong style="color:#28a745;">Settings Permalinks</strong> and hit <strong style="color:#28a745;">Save Changes</strong> button.</p>',
        ),
    )
) );

// Styling
Redux::setSection( $opt_name, array(
    'title'        => esc_html__( 'Styling Options', 'lunex-toolkit' ),
    'id'           => 'styling_options',
    'customizer'   => false,
    'icon'         => ' el el-magic',
    'fields'     => array(
        array(
            'id'        => 'styling_options_info',
            'type'      => 'info',
            'style'     => 'warning',
            'title'     => esc_html__( 'Warning', 'lunex-toolkit' ),
            'desc'      => esc_html__( 'If some color does not affect by Theme Options then you have to change the color from page with Elementor edit mode.', 'lunex-toolkit' ),
        ),
        array(
            'id'            => 'primary_color',
            'type'          => 'color',
            'title'         => esc_html__('Primary Color', 'lunex-toolkit'),
            'default'       => '#F7931E',
            'validate'      => 'color',
            'transparent'   => false,
        ),
        array(
            'id'            => 'primary_color2',
            'type'          => 'color',
            'title'         => esc_html__('Primary Color 2', 'lunex-toolkit'),
            'default'       => '#F0DA69',
            'validate'      => 'color',
            'transparent'   => false,
        ),
        array(
            'id'            => 'optional_color',
            'type'          => 'color',
            'title'         => esc_html__('Black Color', 'lunex-toolkit'),
            'default'       => '#20265B',
            'validate'      => 'color',
            'transparent'   => false,
        ),

        array(
            'id'            => 'additionalColor1',
            'type'          => 'color',
            'title'         => esc_html__('Additional Color 1', 'lunex-toolkit'),
            'default'       => '#E1F3CA',
            'validate'      => 'color',
            'transparent'   => false,
            'output'      => array(
                '--additionalColor1' => ':root',
            ),
        ),
        array(
            'id'            => 'additionalColor2',
            'type'          => 'color',
            'title'         => esc_html__('Additional Color 2', 'lunex-toolkit'),
            'default'       => '#FCD3BF',
            'validate'      => 'color',
            'transparent'   => false,
            'output'      => array(
                '--additionalColor2' => ':root',
            ),
        ),
        array(
            'id'            => 'additionalColor3',
            'type'          => 'color',
            'title'         => esc_html__('Additional Color 3', 'lunex-toolkit'),
            'default'       => '#B3C8FF',
            'validate'      => 'color',
            'transparent'   => false,
            'output'      => array(
                '--additionalColor3' => ':root',
            ),
        ),
        array(
            'id'            => 'additionalColor4',
            'type'          => 'color',
            'title'         => esc_html__('Additional Color 4', 'lunex-toolkit'),
            'default'       => '#EEBCFF',
            'validate'      => 'color',
            'transparent'   => false,
            'output'      => array(
                '--additionalColor4' => ':root',
            ),
        ),
        array(
            'id'            => 'additionalColor5',
            'type'          => 'color',
            'title'         => esc_html__('Additional Color 5', 'lunex-toolkit'),
            'default'       => '#F8E7E7',
            'validate'      => 'color',
            'transparent'   => false,
            'output'      => array(
                '--additionalColor5' => ':root',
            ),
        ),
        array(
            'id'            => 'additionalColor6',
            'type'          => 'color',
            'title'         => esc_html__('Additional Color 6', 'lunex-toolkit'),
            'default'       => '#724060',
            'validate'      => 'color',
            'transparent'   => false,
            'output'      => array(
                '--additionalColor6' => ':root',
            ),
        ),
        array(
            'id'            => 'additionalColor7',
            'type'          => 'color',
            'title'         => esc_html__('Additional Color 7', 'lunex-toolkit'),
            'default'       => '#A070A1',
            'validate'      => 'color',
            'transparent'   => false,
            'output'      => array(
                '--additionalColor7' => ':root',
            ),
        ),

        array(
            'id'            => 'additionalColor8',
            'type'          => 'color',
            'title'         => esc_html__('Additional Color 8', 'lunex-toolkit'),
            'default'       => '#FDB517',
            'validate'      => 'color',
            'transparent'   => false,
            'output'      => array(
                '--additionalColor11' => ':root',
            ),
        ),
        array(
            'id'            => 'additionalColor9',
            'type'          => 'color',
            'title'         => esc_html__('Additional Color 9', 'lunex-toolkit'),
            'default'       => '#FF6347',
            'validate'      => 'color',
            'transparent'   => false,
            'output'      => array(
                '--additionalColor12' => ':root',
            ),
        ),
        array(
            'id'            => 'additionalColor10',
            'type'          => 'color',
            'title'         => esc_html__('Additional Color 10', 'lunex-toolkit'),
            'default'       => '#38A0A7',
            'validate'      => 'color',
            'transparent'   => false,
            'output'      => array(
                '--additionalColor13' => ':root',
            ),
        ),
        array(
            'id'            => 'additionalColor11',
            'type'          => 'color',
            'title'         => esc_html__('Additional Color 11', 'lunex-toolkit'),
            'default'       => '#00A1DE',
            'validate'      => 'color',
            'transparent'   => false,
            'output'      => array(
                '--additionalColor14' => ':root',
            ),
        ),

        array(
            'id'            => 'paragraphColor',
            'type'          => 'color',
            'title'         => esc_html__('Theme Paragraph Color', 'lunex-toolkit'),
            'default'       => '#20265B',
            'validate'      => 'color',
            'transparent'   => false,
        ),

        array(
            'id'            => 'nav_item_color',
            'type'          => 'color',
            'title'         => esc_html__('Navbar Item Color', 'lunex-toolkit'),
            'default'       => '#20265B',
            'validate'      => 'color',
            'transparent'   => false
        ),

        array(
            'id'            => 'mob_nav_item_color',
            'type'          => 'color',
            'title'         => esc_html__('Offcanvas Navbar Item Color', 'lunex-toolkit'),
            'default'       => '#20265B ',
            'validate'      => 'color',
            'transparent'   => false
        ),

    ),
) );

// Typography
Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Typography', 'lunex-toolkit' ),
    'desc' => esc_html__( 'Manage your fonts and typefaces.', 'lunex-toolkit' ),
    'icon' => 'el-icon-fontsize',
    'customizer'    => false,
    'fields' => array(
        array(
            'id'            => 'primary_typography',
            'type'          => 'typography',
            'title'         => esc_html__( 'Primary Typography', 'lunex-toolkit' ),
            'google'        => true,
            'font-backup'   => true,
            'all_styles'    => false,
            'font-style'    => true,
            'font-weight'   => true,
            'font-size'     => true,
            'text-align'    => false,
            'color'         => true,
            'line-height'   => true,
            'output'        => 'body',
        ),
        array(
            'id'            => 'heading_typography',
            'type'          => 'typography',
            'title'         => esc_html__( 'Heading Typography', 'lunex-toolkit' ),
            'google'        => true,
            'font-backup'   => true,
            'all_styles'    => false,
            'font-style'    => true,
            'font-weight'   => true,
            'font-size'     => true,
            'text-align'    => false,
            'color'         => true,
            'line-height'   => true,
            'output'        => 'h1, h2, h3, h4, h5, h6',
        ),
    ),
) );

// Advanced Settings
Redux::setSection( $opt_name, array(
	'title'         => esc_html__('Advanced Settings', 'lunex-toolkit'),
    'icon'          => 'el-icon-cogs',
    'customizer'    => false,
	'fields' => array(
		array(
			'id' => 'css_code',
			'type' => 'ace_editor',
			'title' => esc_html__('Custom CSS Code', 'lunex-toolkit'),
			'desc' => esc_html__('e.g. .btn-primary{ background: #000; } Don\'t use &lt;style&gt; tags', 'lunex-toolkit'),
			'subtitle' => esc_html__('Paste your CSS code here.', 'lunex-toolkit'),
			'mode' => 'css',
			'theme' => 'monokai'
		),
		array(
			'id'        => 'js_code',
			'type'      => 'ace_editor',
			'title'     => esc_html__('Custom JS Code', 'lunex-toolkit'),
			'desc'      => esc_html__('e.g. alert("Hello World!"); Don\'t use&lt;script&gt;tags.', 'lunex-toolkit'),
			'subtitle'  => esc_html__('Paste your JS code here.', 'lunex-toolkit'),
			'mode'      => 'javascript',
			'theme'     => 'monokai'
		)
	)
) );

 // 404 Area
Redux::setSection( $opt_name, array(
    'title'             => esc_html__( '404 Settings', 'lunex-toolkit' ),
    'id'                => 'lunex_404',
    'icon'              => 'el el-question-sign',
    'fields'            => array(
        array(
            'id'        => 'error_page_title',
            'type'      => 'text',
            'title'     => esc_html__('Banner Title', 'lunex-toolkit'),
            'default'   => 'Uh-oh! Page not <span>found</span>!',
            'desc'      => esc_html__('Default: Uh-oh! Page not <span>found</span>!', 'lunex-toolkit'),
        ),
        array(
            'id'        => 'button_not_found',
            'type'      => 'text',
            'title'     => esc_html__( 'Back to Home Button Text', 'lunex-toolkit' ),
            'default'   => 'Back To Home',
            'desc'      => esc_html__('Default: Back To Home', 'lunex-toolkit'),
        ),
        array(
            'id'       => 'button_icon_404',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'Button Icon', 'lunex-toolkit' ),
            'desc'     => esc_html__('Upload the white right arrow icon for the back to home button. Default: white-right-top-arrow.svg', 'lunex-toolkit'),
            'default'  => array(
                'url' => get_template_directory_uri() . '/assets/images/icons/white-right-top-arrow.svg'
            ),
        ),
        array(
            'id'       => 'error_page_title_typo',
            'type'     => 'typography',
            'title'    => esc_html__('404 Title Typography', 'lunex-toolkit'),
            'output'   => '.page-banner-area .page-banner-content h1',
        ),
        array(
            'id'       => 'error_page_title_color',
            'type'     => 'color',
            'title'    => esc_html__('404 Title Color', 'lunex-toolkit'),
            'default'  => '#20265B',
            'validate' => 'color',
            'transparent' => false,
            'output'   => array(
                'color' => '.page-banner-area .page-banner-content h1',
            ),
        ),
        array(
            'id'       => 'error_page_title_span_color',
            'type'     => 'color',
            'title'    => esc_html__('404 Title 2nd Part (Span) Color', 'lunex-toolkit'),
            'default'  => '#5538CE',
            'validate' => 'color',
            'transparent' => false,
            'output'   => array(
                'color' => '.page-banner-area .page-banner-content h1 span',
            ),
        ),
        array(
            'id'       => 'error_page_title_span_typo',
            'type'     => 'typography',
            'title'    => esc_html__('404 Title 2nd Part (Span) Typography', 'lunex-toolkit'),
            'output'   => '.page-banner-area .page-banner-content h1 span',
        ),
        array(
            'id'       => 'error_page_link_btn_bg_color',
            'type'     => 'color',
            'title'    => esc_html__('404 Link Button Background Color', 'lunex-toolkit'),
            'default'  => '#5538CE',
            'validate' => 'color',
            'transparent' => false,
            'output'   => array(
            'background-color' => '.content-404 .link-btn',
            ),
        ),
        array(
            'id'       => 'error_page_link_btn_text_color',
            'type'     => 'color',
            'title'    => esc_html__('404 Link Button Text Color', 'lunex-toolkit'),
            'default'  => '#fff',
            'validate' => 'color',
            'transparent' => false,
            'output'   => array(
            'color' => '.content-404 .link-btn',
            ),
        ),
        array(
            'id'       => 'error_page_link_btn_typography',
            'type'     => 'typography',
            'title'    => esc_html__('404 Link Button Typography', 'lunex-toolkit'),
            'output'   => '.content-404 .link-btn',
        ),
        array(
            'id'       => 'error_page_link_btn_bg_color_hover',
            'type'     => 'color',
            'title'    => esc_html__('404 Link Button Hover Background Color', 'lunex-toolkit'),
            'default'  => '#5538CE',
            'validate' => 'color',
            'transparent' => false,
            'output'   => array(
            'background-color' => '.content-404 .link-btn:hover',
            ),
        ),
        array(
            'id'       => 'error_page_link_btn_text_color_hover',
            'type'     => 'color',
            'title'    => esc_html__('404 Link Button Hover Text Color', 'lunex-toolkit'),
            'default'  => '#fff',
            'validate' => 'color',
            'transparent' => false,
            'output'   => array(
            'color' => '.content-404 .link-btn:hover',
            ),
        ),
    ),
));
 
    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    // Custom function for the callback validation referenced above
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    // Custom function for the callback referenced above
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'lunex-toolkit' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'lunex-toolkit' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    // Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    // Filter hook for filtering the default value of any given field. Very useful in development mode.
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    // Removes the demo link and the notice of integrated demo from the redux-framework plugin
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }