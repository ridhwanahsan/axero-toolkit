<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'opt_name/opt_name', 'axero_opt' );

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
        'menu_title'           => __( 'Theme Options', 'axero-toolkit' ),
        'page_title'           => __( 'Theme Options', 'axero-toolkit' ),
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
        $args['intro_text'] = sprintf( __( '<p></p>', 'axero-toolkit' ), $v );
    } else {
        $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'axero-toolkit' );
    }
    Redux::setArgs( $opt_name, $args );

// General Options
Redux::setSection( $opt_name, array(
    'title'             => esc_html__( 'General Options', 'axero-toolkit' ),
    'id'                => 'general_options',
    'customizer'        => false,
    'icon'              => ' el el-home',
    'fields'     => array(
        array(
            'id'       => 'light_logo',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'Main Logo', 'axero-toolkit' ),
            'desc'     => esc_html__( 'Recommended sizes - width: 100px, height: 30px with SVG format', 'axero-toolkit' ),
        ),
        array(
            'title'     => __( 'Site Logo Dimensions', 'axero-toolkit' ),
            'id'        => 'main_logo_dimensions',
            'type'      => 'dimensions',
            'units'     => array( 'em','px','%' ),
            'output'    => '.navbar-area .navbar .navbar-brand img'
        ),
        array(
            'id'        => 'enable_back_to_top',
            'type'      => 'switch',
            'title'     => esc_html__('Enable back-to-top Button', 'axero-toolkit'),
            'default'   => '1'
        ),
    ),
) );
 
// Header Option
Redux::setSection( $opt_name, array(
	'title' => esc_html__('Header', 'axero-toolkit'),
	'icon'  => 'el el-caret-up',
	'customizer' => false,
	'fields' => array(
        
        array(
            'id'        => 'header_options_info',
            'type'      => 'info',
            'style'     => 'warning',
            'title'     => esc_html__( 'Notice', 'axero-toolkit' ),
            'desc'      => esc_html__( 'The following options apply to the default header. If you have imported the theme demo data, please edit your site header from: Dashboard → UAE → Header & Footer.', 'axero-toolkit' ),
        ),

        // array(
        //     'id'        => 'enable_sticky_header',
        //     'type'      => 'switch',
        //     'title'     => esc_html__('Enable Sticky Header', 'axero-toolkit'),
        //     'desc'      => esc_html__('', 'axero-toolkit'),
        //     'default'   => '0',
        // ),
        
        // array(
        //     'id'        => 'dark_mode_switch',
        //     'type'      => 'switch',
        //     'title'     => esc_html__('Dark Mode Toggle', 'axero-toolkit'),
        //     'desc'      => esc_html__('Show/hide dark mode toggle button', 'axero-toolkit'),
        //     'default'   => '1',
        // ),
    
        array(
            'id'        => 'enable_header_button',
            'type'      => 'switch',
            'title'     => esc_html__('Enable Header Button', 'axero-toolkit'),
            'desc'      => esc_html__('Show/hide header button', 'axero-toolkit'),
            'default'   => '1',
        ),

        array(
			'id'    => 'header_btn_text',
            'type'  => 'text',
			'title' => esc_html__('Header Button Text', 'axero-toolkit'),
            'default' => 'Talk to Us',
            'required'  => array( 'enable_header_button', '=', '1' ),
        ),
        array(
			'id'    => 'header_btn_icon',
            'type'  => 'text',
			'title' => esc_html__('Header Button Icon Class Name', 'axero-toolkit'),
            'default' => 'ri-arrow-right-s-line',
            'description' => "You can use https://remixicon.com/ icons ex: ri-arrow-right-s-line",
            'required'  => array( 'enable_header_button', '=', '1' ),
        ),
        array(
			'id'    => 'header_btn_link',
            'type'  => 'text',
			'title' => esc_html__('Header Button Link', 'axero-toolkit'),
            'default' => '#',
            'required'  => array( 'enable_header_button', '=', '1' ),
        ),
  
	)
) );

// Mobile Header Option
Redux::setSection( $opt_name, array(
	'title' => esc_html__('Mobile Header', 'axero-toolkit'),
	'icon'  => 'el el-list-alt',
    'subsection' => true,
	'customizer' => false,
	'fields' => array(
        
        array(
            'id'        => 'm_header_options_info',
            'type'      => 'info',
            'style'     => 'warning',
            'title'     => esc_html__( 'Notice', 'axero-toolkit' ),
            'desc'      => esc_html__( 'The following options apply to the default header. If you have imported the theme demo data, please edit your site header from: Dashboard → UAE → Header & Footer.', 'axero-toolkit' ),
        ),
        array(
            'id'        => 'mobile_menu_form_title',
            'type'      => 'text',
            'title'     => esc_html__('Newsletter Title', 'axero-toolkit'),
            'default'   => 'Follow the Newest Trends',
            'desc'      => esc_html__('Follow the Newest Trends', 'axero-toolkit'),
        ),
        array(
            'id'        => 'mobile_menu_form_shortcode',
            'type'      => 'text',
            'title'     => esc_html__('Newsletter Form Shortcode', 'axero-toolkit'),
            'desc'      => esc_html__('Enter the shortcode for your newsletter form (e.g. from Mailchimp, Contact Form 7, etc.)', 'axero-toolkit'),
            'default'   => '',
        ),
        array(
            'id'   =>'divider_mobile_header',
            'type' => 'divide'
        ),
         
) ));
 
// Banner
Redux::setSection( $opt_name, array(
    'title'             => esc_html__( 'Banner', 'axero-toolkit' ),
    'id'                => 'banner_options',
    'customizer'        => false,
    'icon'              => 'el el-website',
    'fields'     => array(
        array(
            'id'        => 'page_title_tag',
            'type'      => 'select',
            'title'     => esc_html__( 'Banner Title Tag', 'axero-toolkit' ),
            'options' => array(
                'h1'         => esc_html__( 'h1', 'axero-toolkit' ),
                'h2'         => esc_html__( 'h2', 'axero-toolkit' ),
                'h3'         => esc_html__( 'h3', 'axero-toolkit' ),
                'h4'         => esc_html__( 'h4', 'axero-toolkit' ),
                'h5'         => esc_html__( 'h5', 'axero-toolkit' ),
                'h6'         => esc_html__( 'h6', 'axero-toolkit' ),
            ),
            'default' => 'h1'
        ),
        array(
            'id'        => 'title_title_typo',
            'type'      => 'typography',
            'text-align'    => false,
            'title'     => esc_html__( 'Title Typography', 'axero-toolkit' ),
            'output'    => '.page_banner_content .page_banner_content_title'
        ),
        array(
            'id'        => 'title_desc_typo',
            'type'      => 'typography',
            'text-align'    => false,
            'title'     => esc_html__( 'Breadcrumb Typography', 'axero-toolkit' ),
            'output'    => '.breadcrumb-menu'
        ),
    ),
) );

// Social Profiles
Redux::setSection( $opt_name, array(
	'title' => esc_html__('Social Profiles', 'axero-toolkit'),
	'desc'  => 'Social profiles are used in different places inside the theme.',
	'icon'  => 'el-icon-user',
	'customizer' => false,
	'fields' => array(
        array(
            'id' => 'axero_social_target',
            'type' => 'select',
            'options' => array(
                '_blank'    => 'Load in a new window. ( _blank )',
                '_self'     => 'Load in the same frame as it was clicked. ( _self )',
                '_parent'   => 'Load in the parent frameset. ( _parent )',
                '_top'      => 'Load in the full body of the window ( _top )',
            ),
            'title'     => esc_html__( 'Social Link Target', 'axero-toolkit' ),
            'default'   => '_blank',
        ),

        array(
			'id'    => 'twitter_url',
            'type'  => 'text',
			'title' => esc_html__('X URL', 'axero-toolkit')
		),
		array(
			'id'    => 'facebook_url',
			'type'  => 'text',
			'title' =>esc_html__('Facebook URL', 'axero-toolkit')
		),
		array(
			'id'    => 'instagram_url',
			'type'  => 'text',
			'title' => esc_html__('Instagram URL', 'axero-toolkit')
		),
		array(
			'id'    => 'linkedin_url',
			'type'  => 'text',
			'title' => esc_html__('Linkedin URL', 'axero-toolkit')
		),
		array(
			'id'    => 'pinterest_url',
			'type'  => 'text',
			'title' =>esc_html__('Pinterest URL', 'axero-toolkit')
		),
		array(
			'id'    => 'dribbble_url',
			'type'  => 'text',
			'title' =>esc_html__('Dribbble URL', 'axero-toolkit')
		),
		array(
			'id'    => 'tumblr_url',
			'type'  => 'text',
			'title' =>esc_html__('Tumblr URL', 'axero-toolkit')
		),
		array(
			'id'    => 'youtube_url',
			'type'  => 'text',
			'title' =>  esc_html__('Youtube URL', 'axero-toolkit')
		),
		array(
			'id'    => 'flickr_url',
			'type'  => 'text',
			'title' =>  esc_html__('Flickr URL', 'axero-toolkit')
		),
		array(
			'id'    => 'behance_url',
			'type'  => 'text',
			'title' =>  esc_html__('Behance URL', 'axero-toolkit'),
		),
		array(
			'id'    => 'github_url',
			'type'  => 'text',
			'title' =>  esc_html__('Github URL', 'axero-toolkit'),
		),
		array(
			'id'    => 'skype_url',
			'type'  => 'text',
			'title' =>  esc_html__('Skype URL', 'axero-toolkit'),
		),
		array(
			'id'    => 'rss_url',
			'type'  => 'text',
			'title' =>  esc_html__('RSS URL', 'axero-toolkit')
		),
		array(
			'id'    => 'tiktok_url',
			'type'  => 'text',
			'title' =>  esc_html__('TikTok URL', 'axero-toolkit')
		),
		array(
			'id'    => 'gogole_url',
			'type'  => 'text',
			'title' =>  esc_html__('Google URL', 'axero-toolkit')
		),
		array(
			'id'    => 'medium_url',
			'type'  => 'text',
			'title' =>  esc_html__('Medium URL', 'axero-toolkit')
		),
        array(
			'id'    => 'snapchat_url',
			'type'  => 'text',
			'title' =>  esc_html__('Snapchat URL', 'axero-toolkit')
		),
        array(
			'id'    => 'vimeo_url',
			'type'  => 'text',
			'title' =>  esc_html__('Vimeo URL', 'axero-toolkit')
		),
        array(
			'id'    => 'wechat_url',
			'type'  => 'text',
			'title' =>  esc_html__('WeChat URL', 'axero-toolkit')
		),
        array(
			'id'    => 'whatsapp_url',
			'type'  => 'text',
			'title' =>  esc_html__('WhatsApp URL', 'axero-toolkit')
		),
        array(
			'id'    => 'wordpress_url',
			'type'  => 'text',
			'title' =>  esc_html__('WordPress URL', 'axero-toolkit')
		),
        array(
			'id'    => 'weibo_url',
			'type'  => 'text',
			'title' =>  esc_html__('Weibo URL', 'axero-toolkit')
		),
        array(
			'id'    => 'telegram_url',
			'type'  => 'text',
			'title' =>  esc_html__('Telegram URL', 'axero-toolkit')
		),
        array(
			'id'    => 'amazon_url',
			'type'  => 'text',
			'title' =>  esc_html__('Amazon URL', 'axero-toolkit')
		),
        array(
			'id'    => 'soundcloud_url',
			'type'  => 'text',
			'title' =>  esc_html__('Soundcloud URL', 'axero-toolkit')
		),
        array(
			'id'    => 'leanpub_url',
			'type'  => 'text',
			'title' =>  esc_html__('Leanpub URL', 'axero-toolkit')
		),
        array(
			'id'    => 'xing_url',
			'type'  => 'text',
			'title' =>  esc_html__('Xing URL', 'axero-toolkit')
		),
        array(
			'id'    => 'bitcoin_url',
			'type'  => 'text',
			'title' =>  esc_html__('Bitcoin URL', 'axero-toolkit')
		),
        array(
			'id'    => 'twitch_url',
			'type'  => 'text',
			'title' =>  esc_html__('Twitch URL', 'axero-toolkit')
		),
        array(
			'id'    => 'gitlab_url',
			'type'  => 'text',
			'title' =>  esc_html__('Gitlab URL', 'axero-toolkit')
		),
        array(
			'id'    => 'trello_url',
			'type'  => 'text',
			'title' =>  esc_html__('Trello URL', 'axero-toolkit')
		),
        array(
			'id'    => 'slack_url',
			'type'  => 'text',
			'title' =>  esc_html__('Slack URL', 'axero-toolkit')
		),
	)
) );

// Blog Area
Redux::setSection( $opt_name, array(
    'title'         => esc_html__( 'Blog Settings', 'axero-toolkit' ),
    'id'            => 'axero_blog',
    'customizer'    => false,
    'icon'          => 'el el-file-edit',
    'desc'          => 'Manage your blog settings.',
    'fields' => array(
        array(
			'id'    => 'hide_blog_banner',
            'type'  => 'switch',
            'title' => esc_html__('Hide Blog Banner', 'axero-toolkit'),
            'default'   => '0',
            'subtitle'  => esc_html__( 'It will affect the blog, category, tag, and search page', 'axero-toolkit' ),
        ),
        
        array(
            'id'       => 'blog_banner_bg',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'Blog Banner Background', 'axero-toolkit' ),
            'required'      => array('hide_blog_banner','equals','0'),
        ),
        array(
			'id'    => 'hide_breadcrumb',
            'type'  => 'switch',
			'title' => esc_html__('Hide Blog Breadcrumb', 'axero-toolkit'),
            'default'   => '0',
            'required'      => array('hide_blog_banner','equals','0'),
            'subtitle'  => esc_html__( 'It will affect the blog, category, tag, and search page', 'axero-toolkit' ),
        ),
        array(
            'id'       => 'blog_title',
            'type'     => 'text',
            'title'    => esc_html__( 'Blog Page Title', 'axero-toolkit' ),
            'required'      => array('hide_blog_banner','equals','0'),
        ),
        array(
            'id' => 'axero_blog_layout',
            'type' => 'select',
            'options' => array(
                'container'                 => esc_html__( 'Container', 'axero-toolkit' ),
                'container-fluid'           => esc_html__( 'Container Fluid', 'axero-toolkit' ),
            ),
            'title'     => esc_html__( 'Blog Page Width', 'axero-toolkit' ),
            'default'   => 'container',
            'subtitle'  => esc_html__( 'It will affect the blog, category, tag, and search page', 'axero-toolkit' ),
        ),
        array(
			'id'    => 'axero_search_page',
            'type'  => 'switch',
            'title' => esc_html__('Show Pages in the Search Result Page', 'axero-toolkit'),
            'on'      => esc_html__( 'Enable', 'axero-toolkit' ),
            'off'     => esc_html__( 'Disable', 'axero-toolkit' ),
        ),
        array(
			'id'    => 'axero_tag_count',
            'type'  => 'text',
            'title' => esc_html__('Limit Tags in Tag Cloud Widget
            ', 'axero-toolkit'),
        ),
        array(
            'id' => 'post_image_size',
            'type' => 'select',
            'options' => array(
                'axero_post_card_thumb'    => esc_html__( 'Default Size', 'axero-toolkit' ),
                'full'                      => esc_html__( 'Full Size', 'axero-toolkit' ),
            ),
            'title'     => esc_html__( 'Blog Post Image Size', 'axero-toolkit' ),
            'default'   => 'axero_blog_thumb',
        ),

        array(
            'id' => 'axero_blog_grid',
            'type' => 'select',
            'options' => array(
                'col-lg-12 col-md-12'       => esc_html__( 'One Column', 'axero-toolkit' ),
                'col-lg-6 col-md-6'      => esc_html__( 'Two Column', 'axero-toolkit' ),
                'col-lg-4 col-md-6'         => esc_html__( 'Three Column', 'axero-toolkit' ),
            ),
            'title'     => esc_html__( 'Blog Page Post Column', 'axero-toolkit' ),
            'default'   => 'col-lg-12 col-md-12',
        ),
        array(
            'id'   => 'blog_info_normal',
            'type' => 'info',
            'style' => 'warning',

            'desc' => 'Recommended Settings for Grid:<br>Two Column: [Blog Page Width=Container][ Blog Sidebar=Without Sidebar]<br>Three Column: [Blog Page Width=Container Fluid][ Blog Sidebar=Without Sidebar]',
        ),
        array(
            'id' => 'axero_blog_sidebar',
            'type' => 'select',
            'options' => array(
                'axero_with_sidebar'              => 'With Sidebar',
                'axero_without_sidebar'           => 'Without Sidebar (Full Width)',
                'axero_without_sidebar_center'    => 'Without Sidebar (Center)',
            ),
            'title'     => esc_html__( 'Blog Page Sidebar', 'axero-toolkit' ),
            'default'   => 'axero_with_sidebar',
        ),

        array(
            'id'   =>'divider_blog_page',
            'type' => 'divide'
        ),

        array(
            'id' => 'axero_blog_single_layout',
            'type' => 'select',
            'options' => array(
                'container'                 => esc_html__( 'Container', 'axero-toolkit' ),
                'container-fluid'           => esc_html__( 'Container Fluid', 'axero-toolkit' ),
            ),
            'title'     => esc_html__( 'Single Post Page Width', 'axero-toolkit' ),
            'default'   => 'container',
        ),

        array(
            'id' => 'single_image_size',
            'type' => 'select',
            'options' => array(
                'axero_single_thumb'   => esc_html__( 'Default Size', 'axero-toolkit' ),
                'full'                  => esc_html__( 'Full Size', 'axero-toolkit' ),
            ),
            'title'     => esc_html__( 'Single Post Image Size', 'axero-toolkit' ),
            'default'   => 'axero_single_thumb',
        ),
        array(
            'id' => 'axero_single_blog_sidebar',
            'type' => 'select',
            'options' => array(
                'axero_with_sidebar'              => 'With Sidebar',
                'axero_without_sidebar'           => 'Without Sidebar ( full width )',
                'axero_without_sidebar_center'    => 'Without Sidebar( center )',
            ),
            'title'     => esc_html__( 'Single Blog Sidebar', 'axero-toolkit' ),
            'default'   => 'axero_with_sidebar',
        ),
        array(
			'title'     => esc_html__( 'Post Meta', 'axero-toolkit' ),
			'subtitle'  => esc_html__( 'Show/hide post meta', 'axero-toolkit' ),
			'id'        => 'is_post_meta',
			'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'axero-toolkit' ),
            'off'       => esc_html__( 'Hide', 'axero-toolkit' ),
            'default'   => '1',
        ),
        array(
            'id'       => 'next_post_txt',
            'type'     => 'text',
            'title'    => esc_html__( 'Next Post Text', 'axero-toolkit' ),
            'default'  => esc_html__( 'Next Post', 'axero-toolkit'),
        ),
        array(
            'id'       => 'previous_post_txt',
            'type'     => 'text',
            'title'    => esc_html__( 'Previous Post Title', 'axero-toolkit' ),
            'default'  => esc_html__( 'Previous Post', 'axero-toolkit'),
        ),
    array(
        'id'       => 'post_by_text',
        'type'     => 'text',
        'title'    => esc_html__( 'Post By Text', 'axero-toolkit' ),
        'default'  => esc_html__( 'by', 'axero-toolkit'),
    ),
    array(
        'id'       => 'mins_read_text',
        'type'     => 'text',
        'title'    => esc_html__( 'Mins Read Text', 'axero-toolkit' ),
        'default'  => esc_html__( 'mins read', 'axero-toolkit'),
    ),
    )
));

// Custom Post Permalink
Redux::setSection( $opt_name, array(
    'title'             => esc_html__( 'Custom Posts Permalink', 'axero-toolkit' ),
    'id'                => 'permalink_options',
    'customizer'        => false,
    'icon'              => 'el el-link',
    'fields'     => array(
        array(
			'id'    => 'projects_permalink',
			'type'  => 'text',
			'title' =>  esc_html__('Projects Post Slug', 'axero-toolkit'),
            'default'  => esc_html__('projects', 'axero-toolkit'),
            'desc'     => '<p>After changing the permalink go to <strong style="color:#28a745;">Settings Permalinks</strong> and hit <strong style="color:#28a745;">Save Changes</strong> button.</p>',
		),
        array(
			'id'    => 'teams_permalink',
			'type'  => 'text',
			'title' =>  esc_html__('Teams Post Slug', 'axero-toolkit'),
            'default'  => esc_html__('teams', 'axero-toolkit'),
            'desc'     => '<p>After changing the permalink go to <strong style="color:#28a745;">Settings Permalinks</strong> and hit <strong style="color:#28a745;">Save Changes</strong> button.</p>',
		),
        array(
			'id'    => 'services_permalink',
			'type'  => 'text',
			'title' =>  esc_html__('Services Post Slug', 'axero-toolkit'),
            'default'  => esc_html__('services', 'axero-toolkit'),
            'desc'     => '<p>After changing the permalink go to <strong style="color:#28a745;">Settings Permalinks</strong> and hit <strong style="color:#28a745;">Save Changes</strong> button.</p>',
		),
    )
) );

// Styling
Redux::setSection( $opt_name, array(
    'title'        => esc_html__( 'Styling Options', 'axero-toolkit' ),
    'id'           => 'styling_options',
    'customizer'   => false,
    'icon'         => ' el el-magic',
    'fields'     => array(
        array(
            'id'        => 'styling_options_info',
            'type'      => 'info',
            'style'     => 'warning',
            'title'     => esc_html__( 'Warning', 'axero-toolkit' ),
            'desc'      => esc_html__( 'If some color does not affect by Theme Options then you have to change the color from page with Elementor edit mode.', 'axero-toolkit' ),
        ),
        array(
            'id'            => 'primary_color',
            'type'          => 'color',
            'title'         => esc_html__('Primary Color', 'axero-toolkit'),
            'default'       => '#5538ce',
            'validate'      => 'color',
            'transparent'   => false,
        ),
        array(
            'id'            => 'primary_color2',
            'type'          => 'color',
            'title'         => esc_html__('Primary Color 2', 'axero-toolkit'),
            'default'       => '#d387F6',
            'validate'      => 'color',
            'transparent'   => false,
        ),
        array(
            'id'            => 'optional_color',
            'type'          => 'color',
            'title'         => esc_html__('Black Color', 'axero-toolkit'),
            'default'       => '#ffff56',
            'validate'      => 'color',
            'transparent'   => false,
        ),

        array(
            'id'            => 'paragraphColor',
            'type'          => 'color',
            'title'         => esc_html__('Theme Paragraph Color', 'axero-toolkit'),
            'default'       => '#8a8c99',
            'validate'      => 'color',
            'transparent'   => false,
        ),

    ),
) );

// Typography
Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Typography', 'axero-toolkit' ),
    'desc' => esc_html__( 'Manage your fonts and typefaces.', 'axero-toolkit' ),
    'icon' => 'el-icon-fontsize',
    'customizer'    => false,
    'fields' => array(
        array(
            'id'            => 'primary_typography',
            'type'          => 'typography',
            'title'         => esc_html__( 'Primary Typography', 'axero-toolkit' ),
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
            'title'         => esc_html__( 'Heading Typography', 'axero-toolkit' ),
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
	'title'         => esc_html__('Advanced Settings', 'axero-toolkit'),
    'icon'          => 'el-icon-cogs',
    'customizer'    => false,
	'fields' => array(
		array(
			'id' => 'css_code',
			'type' => 'ace_editor',
			'title' => esc_html__('Custom CSS Code', 'axero-toolkit'),
			'desc' => esc_html__('e.g. .btn-primary{ background: #000; } Don\'t use &lt;style&gt; tags', 'axero-toolkit'),
			'subtitle' => esc_html__('Paste your CSS code here.', 'axero-toolkit'),
			'mode' => 'css',
			'theme' => 'monokai'
		),
		array(
			'id'        => 'js_code',
			'type'      => 'ace_editor',
			'title'     => esc_html__('Custom JS Code', 'axero-toolkit'),
			'desc'      => esc_html__('e.g. alert("Hello World!"); Don\'t use&lt;script&gt;tags.', 'axero-toolkit'),
			'subtitle'  => esc_html__('Paste your JS code here.', 'axero-toolkit'),
			'mode'      => 'javascript',
			'theme'     => 'monokai'
		)
	)
) );

 // 404 Area
Redux::setSection( $opt_name, array(
    'title'  => esc_html__( '404 Settings', 'axero-toolkit' ),
    'id'     => 'axero_404',
    'icon'   => 'el el-question-sign',
    'fields' => array(
        array(
            'id'      => 'error_page_title',
            'type'    => 'text',
            'title'   => esc_html__('Banner Title', 'axero-toolkit'),
            'default' => esc_html__('Oops! The page you\'re looking for can\'t be found.', 'axero-toolkit'),
            'desc'    => esc_html__('Displayed as the main heading on the 404 page. Default: Oops! The page you\'re looking for can\'t be found.', 'axero-toolkit'),
        ),
        array(
            'id'      => 'error_page_description',
            'type'    => 'textarea',
            'title'   => esc_html__('Banner Description', 'axero-toolkit'),
            'default' => esc_html__('It might have been moved, deleted, or the URL could be incorrect.', 'axero-toolkit'),
            'desc'    => esc_html__('Displayed as the description below the 404 title. Default: It might have been moved, deleted, or the URL could be incorrect.', 'axero-toolkit'),
        ),
        array(
            'id'      => 'error_page_image',
            'type'    => 'media',
            'url'     => true,
            'title'   => esc_html__('404 Banner Image', 'axero-toolkit'),
            'desc'    => esc_html__('Upload an image to display on the 404 page. Default: error.png', 'axero-toolkit'),
            'default' => array(
                'url' => get_template_directory_uri() . '/assets/images/error.png'
            ),
        ),
        array(
            'id'      => 'button_not_found',
            'type'    => 'text',
            'title'   => esc_html__('Back to Home Button Text', 'axero-toolkit'),
            'default' => esc_html__('Back to Home', 'axero-toolkit'),
            'desc'    => esc_html__('Text for the button that returns users to the homepage. Default: Back to Home', 'axero-toolkit'),
        ),
         array(
            'id'      => 'button_icon_404',
            'type'    => 'text',
            'title'   => esc_html__('Button Icon Class', 'axero-toolkit'),
            'default' => 'ti ti-arrow-up-right',
            'desc'    => esc_html__('Enter the icon class for the back to home button. Default: ti ti-arrow-up-right', 'axero-toolkit'),
        ),
        array(
            'id'      => 'error_page_title_typo',
            'type'    => 'typography',
            'title'   => esc_html__('404 Title Typography', 'axero-toolkit'),
            'output'  => array('.page_banner_area .page_banner_content h3'),
        ),
        array(
            'id'      => 'error_page_title_color',
            'type'    => 'color',
            'title'   => esc_html__('404 Title Color', 'axero-toolkit'),
            'default' => '#20265B',
            'validate'=> 'color',
            'transparent' => false,
            'output'  => array(
                'color' => '.page_banner_area .page_banner_content h3',
            ),
        ),
        array(
            'id'      => 'error_page_desc_typo',
            'type'    => 'typography',
            'title'   => esc_html__('404 Description Typography', 'axero-toolkit'),
            'output'  => array('.page_banner_area .page_banner_content p'),
        ),
        array(
            'id'      => 'error_page_desc_color',
            'type'    => 'color',
            'title'   => esc_html__('404 Description Color', 'axero-toolkit'),
            'default' => '#6c757d',
            'validate'=> 'color',
            'transparent' => false,
            'output'  => array(
                'color' => '.page_banner_area .page_banner_content p',
            ),
        ),
         array(
            'id'      => 'error_page_link_btn_bg_color',
            'type'    => 'color',
            'title'   => esc_html__('404 Link Button Background Color', 'axero-toolkit'),
            'default' => '#5538CE',
            'validate'=> 'color',
            'transparent' => false,
            'output'  => array(
                'background-color' => '.secondary_btn',
                'important' => true,
            ),
        ),
        array(
            'id'      => 'error_page_link_btn_text_color',
            'type'    => 'color',
            'title'   => esc_html__('404 Link Button Text Color', 'axero-toolkit'),
            'default' => '#fff',
            'validate'=> 'color',
            'transparent' => false,
            'output'  => array(
                'color' => '.secondary_btn',
                'important' => true,
            ),
        ),
        array(
            'id'      => 'error_page_link_btn_typography',
            'type'    => 'typography',
            'title'   => esc_html__('404 Link Button Typography', 'axero-toolkit'),
            'output'  => array('.secondary_btn'),
            'default' => array(
                'font-size'   => '16px',
                'font-family' => 'Poppins',
                'font-weight' => '500',
            ),
        ),
        array(
            'id'      => 'error_page_link_btn_bg_color_hover',
            'type'    => 'color',
            'title'   => esc_html__('404 Link Button Hover Background Color', 'axero-toolkit'),
            'default' => '#FE5E3A',
            'validate'=> 'color',
            'transparent' => false,
            'output'  => array(
                'background-color' => '.secondary_btn:hover, .secondary_btn:focus, .secondary_btn:active',
                'important' => true,
            ),
        ),
        array(
            'id'      => 'error_page_link_btn_text_color_hover',
            'type'    => 'color',
            'title'   => esc_html__('404 Link Button Hover Text Color', 'axero-toolkit'),
            'default' => '#fff',
            'validate'=> 'color',
            'transparent' => false,
            'output'  => array(
                'color' => '.secondary_btn:hover, .secondary_btn:focus, .secondary_btn:active',
                'important' => true,
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
                'title'  => __( 'Section via hook', 'axero-toolkit' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'axero-toolkit' ),
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