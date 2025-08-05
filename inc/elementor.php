<?php
/**
 * Theme Support Elementor
 */

// Main Elementor axero Extension Class
final class Elementor_Axero_Extension
{

    const VERSION                   = '1.0.0';
    const MINIMUM_ELEMENTOR_VERSION = '2.0.0';
    const MINIMUM_PHP_VERSION       = '7.0';

    // Instance
    private static $_instance = null;

    public static function instance()
    {

        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;

    }

    // Constructor
    public function __construct()
    {
        add_action('plugins_loaded', [$this, 'init']);
        add_action('elementor/editor/after_enqueue_styles', [$this, 'editor_style']);
        add_action('elementor/widgets/register', [$this, 'register_widgets']);

    }

    // init
    public function init()
    {
        load_plugin_textdomain('axero-toolkit');

        // Check if Elementor installed and activated
        if (! did_action('elementor/loaded')) {
            add_action('admin_notices', [$this, 'admin_notice_missing_main_plugin']);
            return;
        }

        // Check for required Elementor version
        if (! version_compare(ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=')) {
            add_action('admin_notices', [$this, 'admin_notice_minimum_elementor_version']);
            return;
        }

        // Check for required PHP version
        if (version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<')) {
            add_action('admin_notices', [$this, 'admin_notice_minimum_php_version']);
            return;
        }

    }

    // Admin notice
    public function admin_notice_missing_main_plugin()
    {

        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }

        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor */
            esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'axero-toolkit'),
            '<strong>' . esc_html__('Axero Toolkit', 'axero-toolkit') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'axero-toolkit') . '</strong>'
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);

    }
    public function admin_notice_minimum_elementor_version()
    {

        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }

        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'axero-toolkit'),
            '<strong>' . esc_html__('Axero Toolkit', 'axero-toolkit') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'axero-toolkit') . '</strong>',
            self::MINIMUM_ELEMENTOR_VERSION
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);

    }
    public function admin_notice_minimum_php_version()
    {

        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }

        $message = sprintf(
            /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'axero-toolkit'),
            '<strong>' . esc_html__('Axero Toolkit', 'axero-toolkit') . '</strong>',
            '<strong>' . esc_html__('PHP', 'axero-toolkit') . '</strong>',
            self::MINIMUM_PHP_VERSION
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);

    }

    public function editor_style()
    {
        $img = AXERO_IMG . '/elementor-icon.svg';
        wp_add_inline_style('elementor-editor', '.elementor-control-type-select2 .elementor-control-input-wrapper {min-width: 130px;}.elementor-element .icon .et-el-custom{content: url(' . $img . ');width: 22px;}');
    }

    public function register_widgets($widgets_manager)
    {
        // Register other widgets
        foreach ($this->Axero_widget_list() as $widget_file_name) {
            $widget_path = plugin_dir_path(__FILE__) . "widgets/{$widget_file_name}.php";
            if (file_exists($widget_path)) {
                require_once $widget_path;
            }
        }
        foreach ($this->Axero_widget__element_list() as $widget_file_name) {
            $widget_path = plugin_dir_path(__FILE__) . "widgets/element/{$widget_file_name}.php";
            if (file_exists($widget_path)) {
                require_once $widget_path;
            }
        }
        foreach ($this->Axero_header_footer_widget_list() as $widget_file_name) {
            $widget_path = plugin_dir_path(__FILE__) . "widgets/header-footer/{$widget_file_name}.php";
            if (file_exists($widget_path)) {
                require_once $widget_path;
            }
        }
    }

    /**
     * The function `Axero_widget_list` returns an array of widget names for a PHP application.
     *
     * @return An array of widget names is being returned. The array contains 'hero-banner' and
     * 'hero-banner2' widget names, and more widget names can be added as needed.
     */
    public function Axero_widget_list()
    {
        return [
            'banner-1',
            'banner-2',
            'awesome-work',
            'awesome-about',
            'awesome-service',
            'awesome-testimonial',
            'awesome-blog',
            'blog-area',
            'blog-area-2',
            'blog-area-3',
            'featured-works',
          
            // Add more widget names here as needed
        ];
    }
    public function Axero_widget__element_list()
    {
        return [
            // 'text-animate',
            'button',
            'counter',
            'video-area',
            'brands-area',
            'awesome-team',
            'awards-area',
            'text-slide',
            'about-us',
            'about-us-2',
            'about-us-3',
            'about-us-4',
            'partner-logo',
            'services-area',
            'services-area-2',
            'services-area-3',
            'services-area-4',
            'features-area',
            'our-process',
            'choose-us',
            'choose-us-2',
            'case-studies',
            'feedback-area',
            'team-area',
            'team-area-2',
            'team-area-3',
            'team-area-4',
            'faq-area',
            'faq-area-2',
            'faq-area-3',
            'text-slider',
            'success-stories',
            'work-process',
            'portfolio-area',
            'portfolio-area-2',
            'testimonials-area',
            'partners-area',
            'text-scroll',
            'funfacts-area',
            'reviews-area',
            'clients-area',
            'cta',
            'service-box',
            'pricing-area',
            'privacy-policy',
            'terms-conditions',
            'contact-area',
            'reach-us-area',
            'service-details',
            'portfolio-details',
            'team-details',
            // Add more widget names here as needed
        ];
    }

    /**
     * The function returns an array of header and footer widget names.
     *
     * @return The function `Axero_header_footer_widget_list()` is returning an array with one
     */
    public function Axero_header_footer_widget_list(){
        return [
            // 'header01',
            
            // Add more header footer widget names here as needed
        ];
    }

}
Elementor_axero_Extension::instance();
