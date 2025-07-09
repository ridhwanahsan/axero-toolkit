<?php
    namespace lunex_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;
    use Elementor\Icons_Manager;


    if (! defined('ABSPATH')) {
        exit;
    }

    class lunex_header_one extends Widget_Base
    {

        public function get_name()
        {
            return 'lunex_header_one';
        }

        public function get_title()
        {
            return __('Header one', 'lunex-toolkit');
        }

        public function get_icon()
        {
            return 'eicon-elementor';
        }

        public function get_categories()
        {
            return ['header_footer'];
        }

        protected function register_controls()
        {
            $this->register_controls_section();
            $this->style_tab_content();
        }

        protected function register_controls_section()
        {
            // Section Selection
            $this->start_controls_section(
                'section_selection',
                [
                    'label' => esc_html__('Section Selection', 'lunex-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'style_selection',
                [
                    'label'   => esc_html__('Select Section', 'lunex-toolkit'),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'style1',
                    'options' => [
                        'style1' => esc_html__('Style 1', 'lunex-toolkit'),
                        
                    ],
                ]
            );

            $this->end_controls_section();
        // Menu Selection Control
        $this->start_controls_section(
            'menu_selection',
            [
                'label' => esc_html__('Header One Setting', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'style_selection' => 'style1',
                ],
            ]
        );
        // Light Logo Control
        $this->add_control(
            'light_logo',
            [
                'label' => esc_html__('Light Logo', 'lunex-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/white-logo.svg',
                ],
                'description' => esc_html__('Upload the light version of your logo (visible in dark mode)', 'lunex-toolkit'),
                'dynamic' => [
                    'active' => true,
                ],
                
            ]
        );

        // Dark Logo Control
        $this->add_control(
            'dark_logo',
            [
                'label' => esc_html__('Dark Logo', 'lunex-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/logo.svg',
                ],
                'description' => esc_html__('Upload the dark version of your logo (visible in light mode)', 'lunex-toolkit'),
                'dynamic' => [
                    'active' => true,
                ],
                 
            ]
        );
        // Get all registered menus
        $menus = wp_get_nav_menus();
        $menu_options = [];

        foreach ($menus as $menu) {
            $menu_options[$menu->slug] = $menu->name;
        }

        $this->add_control(
            'selected_menu',
            [
                'label'   => esc_html__('Select Menu', 'lunex-toolkit'),
                'type'    => Controls_Manager::SELECT,
                'label_block' => true,
                'default' => !empty($menu_options) ? array_key_first($menu_options) : '',
                'options' => $menu_options,
                'description' => empty($menu_options) ? esc_html__('No menus found. Please create a menu first.', 'lunex-toolkit') : '',
            ]
        );

        $this->add_control(
            'enable_dark_mode_switch',
            [
                'label' => esc_html__('Enable Dark Mode Switch', 'lunex-toolkit'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'lunex-toolkit'),
                'label_off' => esc_html__('No', 'lunex-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',
                'description' => esc_html__('Show dark/light mode toggle button in header', 'lunex-toolkit'),
            ]
        );

        $this->add_control(
            'enable_header_button',
            [
                'label' => esc_html__('Enable Header Button', 'lunex-toolkit'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'lunex-toolkit'),
                'label_off' => esc_html__('No', 'lunex-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',
                'separator' => 'before',
                'description' => esc_html__('Show call-to-action button in header', 'lunex-toolkit'),
            ]
        );

        $this->add_control(
            'header_button_text',
            [
                'label' => esc_html__('Button Text', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Talk to Us', 'lunex-toolkit'),
                'condition' => [
                    'enable_header_button' => 'yes',
                ],
            ]
        );
$this->add_control(
    'header_button_icon',
    [
        'label'   => esc_html__('Button Icon', 'lunex-toolkit'),
        'type'    => Controls_Manager::ICONS,
        'default' => [
            'value'   => 'ri-arrow-right-up-line',
            'library' => 'remixicon',
        ],
    ]
);


        $this->add_control(
            'header_button_link',
            [
                'label' => esc_html__('Button Link', 'lunex-toolkit'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'lunex-toolkit'),
                'default' => [
                    'url' => '#',
                ],
                'condition' => [
                    'enable_header_button' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'mobile_menu_section',
            [
                'label' => esc_html__('Mobile Menu', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'mobile_menu_heading',
            [
                'label' => esc_html__('Mobile Menu Settings', 'lunex-toolkit'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $menus = wp_get_nav_menus();
        $options = [];
        
        foreach ($menus as $menu) {
            $options[$menu->slug] = $menu->name;
        }

        $this->add_control(
            'mobile_selected_menu',
            [
                'label' => esc_html__('Select Mobile Menu', 'lunex-toolkit'),
                'type' => Controls_Manager::SELECT,
                'options' => $options,
                'default' => !empty($options) ? array_key_first($options) : '',
                'description' => esc_html__('Choose which menu to display in mobile view', 'lunex-toolkit'),
            ]
        );

        $this->add_control(
            'mobile_menu_contact_info',
            [
                'label' => esc_html__('Show Contact Info', 'lunex-toolkit'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'lunex-toolkit'),
                'label_off' => esc_html__('Hide', 'lunex-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'mobile_menu_location_heading',
            [
                'label' => esc_html__('Location Settings', 'lunex-toolkit'),
                'type' => Controls_Manager::HEADING,
                'condition' => [
                    'mobile_menu_contact_info' => 'yes',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'mobile_menu_location_title',
            [
                'label' => esc_html__('Location Title', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('The Empire State', 'lunex-toolkit'),
                'condition' => [
                    'mobile_menu_contact_info' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'mobile_menu_location_address',
            [
                'label' => esc_html__('Location Address', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Parker Avenue, Kingsley Road, New York', 'lunex-toolkit'),
                'condition' => [
                    'mobile_menu_contact_info' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'mobile_menu_email',
            [
                'label' => esc_html__('Email Address', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('support@lunex.com', 'lunex-toolkit'),
                'condition' => [
                    'mobile_menu_contact_info' => 'yes',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'mobile_menu_socials',
            [
                'label' => esc_html__('Social Links', 'lunex-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'social_icon',
                        'label' => esc_html__('Icon', 'lunex-toolkit'),
                        'type' => Controls_Manager::ICONS,
                        'default' => [
                            'value' => 'ri-facebook-circle-fill',
                            'library' => 'remixicon',
                        ],
                    ],
                    [
                        'name' => 'social_link',
                        'label' => esc_html__('Link', 'lunex-toolkit'),
                        'type' => Controls_Manager::URL,
                        'placeholder' => esc_html__('https://your-link.com', 'lunex-toolkit'),
                        'default' => [
                            'url' => '#',
                            'is_external' => true,
                            'nofollow' => false,
                        ],
                    ],
                ],
                'default' => [
                    [
                        'social_icon' => [
                            'value' => 'ri-facebook-circle-fill',
                            'library' => 'remixicon',
                        ],
                    ],
                    [
                        'social_icon' => [
                            'value' => 'ri-instagram-line',
                            'library' => 'remixicon',
                        ],
                    ],
                    [
                        'social_icon' => [
                            'value' => 'ri-threads-line',
                            'library' => 'remixicon',
                        ],
                    ],
                    [
                        'social_icon' => [
                            'value' => 'ri-twitter-x-line',
                            'library' => 'remixicon',
                        ],
                    ],
                    [
                        'social_icon' => [
                            'value' => 'ri-youtube-fill',
                            'library' => 'remixicon',
                        ],
                    ],
                ],
                'title_field' => '{{{ elementor.helpers.getSocialNetworkNameFromIcon( social_icon, false, true, false ) }}}',
                'condition' => [
                    'mobile_menu_contact_info' => 'yes',
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();

            

        }
        /**
         * Style Tab Content Section
         * ------------------------
         */

        protected function style_tab_content()
        {
            // content style controls tab
        $this->start_controls_section(
            'header_nav_style',
            [
                'label' => esc_html__('Header Navigation', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Background Color
        $this->add_control(
            'header_bg_color',
            [
                'label' => esc_html__('Background Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .navbar-area' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Text Color
        $this->add_control(
            'nav_text_color',
            [
                'label' => esc_html__('Text Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .navbar-area .navbar .navbar-nav .nav-item .nav-link' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Text Hover Color
        $this->add_control(
            'nav_text_hover_color',
            [
                'label' => esc_html__('Text Hover Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .navbar-area .navbar .navbar-nav .nav-item:hover .nav-link' => 'color: {{VALUE}};',
                 
                ],
            ]
        );

        // Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'nav_typography',
                'label' => esc_html__('Typography', 'lunex-toolkit'),
                'selector' => '{{WRAPPER}} .navbar-area .navbar .navbar-nav .nav-item .nav-link',
            ]
        );
        // Arrow Color
        $this->add_control(
            'dropdown_arrow_color',
            [
                'label' => esc_html__('Dropdown Arrow Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .navbar-area .navbar .navbar-nav .nav-item .dropdown-toggle::before' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Arrow Hover Color
        $this->add_control(
            'dropdown_arrow_hover_color',
            [
                'label' => esc_html__('Dropdown Arrow Hover Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .navbar-area .navbar .navbar-nav .nav-item:hover .dropdown-toggle::before' => 'color: {{VALUE}};',
                ],
            ]
        );
        // Submenu Background Color
        $this->add_control(
            'submenu_bg_color',
            [
                'label' => esc_html__('Submenu Background Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .navbar-area .navbar .navbar-nav .nav-item .dropdown-menu' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Submenu Border Radius
        $this->add_control(
            'submenu_border_radius',
            [
                'label' => esc_html__('Border Radius', 'lunex-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .navbar-area .navbar .navbar-nav .nav-item .dropdown-menu' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Submenu Hover Background Color
        $this->add_control(
            'submenu_hover_bg_color',
            [
                'label' => esc_html__('Submenu Hover Background', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .navbar-area .navbar .navbar-nav .nav-item .dropdown-menu .nav-item:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        // Submenu Text Color
        $this->add_control(
            'submenu_text_color',
            [
                'label' => esc_html__('Submenu Text Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .navbar-area .navbar .navbar-nav .nav-item .dropdown-menu .nav-item .nav-link' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Submenu Text Hover Color
        $this->add_control(
            'submenu_text_hover_color',
            [
                'label' => esc_html__('Submenu Hover Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .navbar-area .navbar .navbar-nav .nav-item .dropdown-menu .nav-item .nav-link:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        // Submenu Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'submenu_typography',
                'label' => esc_html__('Submenu Typography', 'lunex-toolkit'),
                'selector' => '{{WRAPPER}} .navbar-area .navbar .navbar-nav .nav-item .dropdown-menu .nav-item .nav-link',
            ]
        );

        $this->end_controls_section();
        
        $this->start_controls_section(
            'header_button_style',
            [
                'label' => esc_html__('Header Button', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'enable_header_button' => 'yes',
                ],
            ]
        );

        // Text Color
        $this->add_control(
            'button_text_color',
            [
                'label' => esc_html__('Text Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .navbar-area .navbar .others-option .link-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Text Hover Color
        $this->add_control(
            'button_text_hover_color',
            [
                'label' => esc_html__('Text Hover Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .navbar-area .navbar .others-option .link-btn:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .navbar-area .navbar .others-option .link-btn:hover span' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'label' => esc_html__('Typography', 'lunex-toolkit'),
                'selector' => '{{WRAPPER}} .navbar-area .navbar .others-option .link-btn',
            ]
        );
        
        // Background Color
        $this->add_control(
            'button_background_color',
            [
                'label' => esc_html__('Background Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .navbar-area .navbar .others-option .link-btn' => 'background-color: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        // Background Hover Color
        $this->add_control(
            'button_background_hover_color',
            [
                'label' => esc_html__('Background Hover Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .navbar-area .navbar .others-option .link-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Padding
        $this->add_control(
            'button_padding',
            [
                'label' => esc_html__('Padding', 'lunex-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .navbar-area .navbar .others-option .link-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        // Border Radius
        $this->add_control(
            'button_border_radius',
            [
                'label' => esc_html__('Border Radius', 'lunex-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .navbar-area .navbar .others-option .link-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Icon Color
        $this->add_control(
            'button_icon_color',
            [
                'label' => esc_html__('Icon Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .navbar-area .navbar .others-option .link-btn i' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        // Icon Hover Color
        $this->add_control(
            'button_icon_hover_color',
            [
                'label' => esc_html__('Icon Hover Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .navbar-area .navbar .others-option .link-btn:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Icon Size
        $this->add_control(
            'button_icon_size',
            [
                'label' => esc_html__('Icon Size', 'lunex-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .navbar-area .navbar .others-option .link-btn i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Icon Background Color
        $this->add_control(
            'button_icon_background_color',
            [
                'label' => esc_html__('Icon Background Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .navbar-area .navbar .others-option .link-btn span' => 'background-color: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        // Icon Background Hover Color
        $this->add_control(
            'button_icon_background_hover_color',
            [
                'label' => esc_html__('Icon Background Hover Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .navbar-area .navbar .others-option .link-btn:hover span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Mobile Navigation Style
        $this->start_controls_section(
            'mobile_nav_style',
            [
                'label' => esc_html__('Mobile Navigation', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Mobile Menu Background Color
        $this->add_control(
            'mobile_menu_bg_color',
            [
                'label' => esc_html__('Background Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu-popup-area' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Mobile Menu Text Color
        $this->add_control(
            'mobile_menu_text_color',
            [
                'label' => esc_html__('Text Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu-popup-area .meanu-popup-nav .accordion .accordion-item .accordion-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Mobile Menu Text Hover/Active Color
        $this->add_control(
            'mobile_menu_text_hover_color',
            [
                'label' => esc_html__('Text Hover/Active Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu-popup-area .meanu-popup-nav .accordion .accordion-item .accordion-button:hover, {{WRAPPER}} .menu-popup-area .meanu-popup-nav .accordion .accordion-item .accordion-button.active' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Mobile Menu Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'mobile_menu_typography',
                'label' => esc_html__('Typography', 'lunex-toolkit'),
                'selector' => '{{WRAPPER}} .menu-popup-area .meanu-popup-nav .accordion .accordion-item .accordion-button',
            ]
        );

        // Submenu Background Color
        $this->add_control(
            'mobile_submenu_bg_color',
            [
                'label' => esc_html__('Submenu Background', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu-popup-area .meanu-popup-nav .accordion .accordion-item .accordion-collapse .accordion-body' => 'background-color: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        // Submenu Text Color
        $this->add_control(
            'mobile_submenu_text_color',
            [
                'label' => esc_html__('Submenu Text Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu-popup-area .meanu-popup-nav .accordion .accordion-item .accordion-collapse .accordion-body .accordion-item .accordion-link' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Submenu Text Hover Color
        $this->add_control(
            'mobile_submenu_text_hover_color',
            [
                'label' => esc_html__('Submenu Text Hover Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu-popup-area .meanu-popup-nav .accordion .accordion-item .accordion-collapse .accordion-body .accordion-item .accordion-link:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Submenu Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'mobile_submenu_typography',
                'label' => esc_html__('Submenu Typography', 'lunex-toolkit'),
                'selector' => '{{WRAPPER}} .menu-popup-area .meanu-popup-nav .accordion .accordion-item .accordion-collapse .accordion-body .accordion-item .accordion-link',
            ]
        );
        // Close Button Color
        $this->add_control(
            'mobile_close_btn_color',
            [
                'label' => esc_html__('Close Button Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu-popup-area .menu-popup-close-btn' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        // Close Button Hover Color
        $this->add_control(
            'mobile_close_btn_hover_color',
            [
                'label' => esc_html__('Close Button Hover Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu-popup-area .menu-popup-close-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Close Button Background Color
        $this->add_control(
            'mobile_close_btn_bg_color',
            [
                'label' => esc_html__('Close Button Background', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu-popup-area .menu-popup-close-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Close Button Hover Background Color
        $this->add_control(
            'mobile_close_btn_hover_bg_color',
            [
                'label' => esc_html__('Close Button Hover Background', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu-popup-area .menu-popup-close-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

        // mobile menu contact style 

        $this->start_controls_section(
            'mobile_menu_contact_style',
            [
                'label' => esc_html__('Mobile Menu Contact', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'mobile_menu_contact_info' => 'yes',
                ],
            ]
        );

        // Title Color
        $this->add_control(
            'mobile_contact_title_color',
            [
                'label' => esc_html__('Title Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu-popup-area .menu-contact-info .location h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Title Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'mobile_contact_title_typography',
                'label' => esc_html__('Title Typography', 'lunex-toolkit'),
                'selector' => '{{WRAPPER}} .menu-popup-area .menu-contact-info .location h5',
            ]
        );

        // Description Color
        $this->add_control(
            'mobile_contact_desc_color',
            [
                'label' => esc_html__('Description Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu-popup-area .menu-contact-info .location p' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        // Description Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'mobile_contact_desc_typography',
                'label' => esc_html__('Description Typography', 'lunex-toolkit'),
                'selector' => '{{WRAPPER}} .menu-popup-area .menu-contact-info .location p',
            ]
        );

        // Email Color
        $this->add_control(
            'mobile_contact_email_color',
            [
                'label' => esc_html__('Email Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu-popup-area .menu-contact-info h4' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        // Email Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'mobile_contact_email_typography',
                'label' => esc_html__('Email Typography', 'lunex-toolkit'),
                'selector' => '{{WRAPPER}} .menu-popup-area .menu-contact-info h4',
            ]
        );

        // Social Icon Color
        $this->add_control(
            'mobile_contact_social_color',
            [
                'label' => esc_html__('Social Icon Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu-popup-area .menu-contact-info .socials a' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );

        // Social Icon Hover Color
        $this->add_control(
            'mobile_contact_social_hover_color',
            [
                'label' => esc_html__('Social Icon Hover Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu-popup-area .menu-contact-info .socials a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
        }

        protected function render()
        {
            $settings = $this->get_settings_for_display();

            if ($settings['style_selection'] === 'style1') {
            ?>
            <!-- style 1 -->
            <div class="navbar-area top-0 start-0 end-0 h-auto">
        <div class="container">
            <nav class="navbar p-0 navbar-expand-lg">
                <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                    <?php if(!empty($settings['dark_logo']['url'])): ?>
                        <img src="<?php echo esc_url($settings['dark_logo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" class="black-logo">
                    <?php endif; ?>
                    <?php if(!empty($settings['light_logo']['url'])): ?>
                        <img src="<?php echo esc_url($settings['light_logo']['url']); ?>" class="d-none" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                    <?php endif; ?>
                </a>
                <button class="navbar-toggler" type="button">
                        <span class="burger-menu">
                            <span class="top-bar"></span>
                            <span class="middle-bar"></span>
                            <span class="bottom-bar"></span>
                        </span>
                    </button>
                <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <?php
                    // Get the selected menu from widget settings
                    $selected_menu = $settings['selected_menu'] ?? '';

                    if (!empty($selected_menu) && class_exists('defult_Custom_Nav_Walker')) {
                        wp_nav_menu([
                            'menu'            => $selected_menu,
                            'container'       => false,
                            'items_wrap'      => '%3$s',
                            'walker'          => new \defult_Custom_Nav_Walker(),
                            'fallback_cb'     => 'defult_Custom_Nav_Walker::fallback',
                        ]);
                    } elseif (empty($selected_menu)) {
                        echo '<div class="notice notice-warning"><p>' . 
                            esc_html__('Please select a menu from the widget settings.', 'lunex-toolkit') . 
                        '</p></div>';
                    } else {
                        echo '<div class="notice notice-warning"><p>' . 
                            esc_html__('Lunex Toolkit plugin is not active. Please activate it for full functionality.', 'lunex-toolkit') . 
                        '</p></div>';
                    }
                    ?>
                </ul>
                    <div class="others-option d-flex align-items-center">
                        <?php if ($settings['enable_dark_mode_switch'] === 'yes') : ?>
                            <button type="button" class="light-dark-btn d-inline-block p-0 bg-transparent border-0 lh-1" id="light-dark-btn">
                                <i class="ri-sun-line"></i>
                            </button>
                        <?php endif; ?>


                        <?php if ($settings['enable_header_button'] === 'yes') : ?>
                            <a href="<?php echo esc_url($settings['header_button_link']['url'] ?? '#'); ?>" 
                               class="link-btn d-flex align-items-center"
                               target="<?php echo !empty($settings['header_button_link']['is_external']) ? '_blank' : '_self'; ?>"
                               <?php echo !empty($settings['header_button_link']['nofollow']) ? 'rel="nofollow"' : ''; ?>>
                                <span>
                                    <?php if (!empty($settings['header_button_icon']['value'])) : ?>
                                        <i class="<?php echo esc_attr($settings['header_button_icon']['value']); ?>"></i>
                                    <?php else : ?>
                                        <i class="ri-arrow-right-up-line"></i>
                                    <?php endif; ?>
                                    
                                </span>
                                <?php echo esc_html($settings['header_button_text'] ?? 'Talk to Us'); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </nav>
        </div>
    </div>


<!------------------- Mobile device header One ---------------->
   <div class="menu-popup-area position-fixed start-0 end-0 top-0 bottom-0">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-md-12">
                            <div class="meanu-popup-nav">
                                <div class="accordion" id="navbarAccordion">
                                    <?php
                                    // Get the selected mobile menu from widget settings
                                    $mobile_selected_menu = $settings['mobile_selected_menu'] ?? '';

                                    if (!empty($mobile_selected_menu) && class_exists('\Mobile_Nav_Walker')) {
                                        wp_nav_menu([
                                            'menu'           => $mobile_selected_menu,
                                            'container'      => false,
                                            'items_wrap'     => '%3$s',
                                            'walker'         => new \Mobile_Nav_Walker(),
                                            'fallback_cb'    => false
                                        ]);
                                    } elseif (empty($mobile_selected_menu)) {
                                        echo '<div class="notice notice-warning"><p>' . 
                                            esc_html__('Please select a mobile menu from the widget settings.', 'lunex-toolkit') . 
                                        '</p></div>';
                                    } else {
                                        echo '<div class="notice notice-warning"><p>' . 
                                            esc_html__('Lunex Toolkit plugin is not active. Please activate it for full functionality.', 'lunex-toolkit') . 
                                        '</p></div>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <?php if ($settings['mobile_menu_contact_info'] === 'yes') : ?>
                                <div class="menu-contact-info">
                                    <?php if (!empty($settings['mobile_menu_location_title']) || !empty($settings['mobile_menu_location_address'])) : ?>
                                        <div class="location">
                                            <?php if (!empty($settings['mobile_menu_location_title'])) : ?>
                                                <h5><?php echo esc_html($settings['mobile_menu_location_title']); ?></h5>
                                            <?php endif; ?>
                                            <?php if (!empty($settings['mobile_menu_location_address'])) : ?>
                                                <p><?php echo esc_html($settings['mobile_menu_location_address']); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <?php if (!empty($settings['mobile_menu_email'])) : ?>
                                        <h4><?php echo esc_html($settings['mobile_menu_email']); ?></h4>
                                    <?php endif; ?>
                                    
                                    <?php if (!empty($settings['mobile_menu_socials'])) : ?>
                                        <div class="socials">
                                            <?php foreach ($settings['mobile_menu_socials'] as $social) : 
                                                $icon = $social['social_icon'];
                                                $link = $social['social_link'];
                                                if (!empty($icon['value'])) : ?>
                                                    <a href="<?php echo esc_url($link['url']); ?>" 
                                                       class="d-inline-block" 
                                                       target="<?php echo esc_attr($link['is_external'] ? '_blank' : '_self'); ?>"
                                                       <?php echo $link['nofollow'] ? 'rel="nofollow"' : ''; ?>>
                                                        <i class="<?php echo esc_attr($icon['value']); ?>"></i>
                                                    </a>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="menu-popup-close-btn position-absolute rounded-circle text-center border-0 p-0">
                <i class="ri-close-line"></i>
            </button>
    </div>

        <?php
            } elseif ($settings['style_selection'] === 'style2') {
                    ?>
            <!-- style 2 -->

        <?php
            } elseif ($settings['style_selection'] === 'style3') {
                    ?>
            <!-- style 3 -->

    <?php
        }
            }
        }

    $widgets_manager->register(new lunex_header_one()); 