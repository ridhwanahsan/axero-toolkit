<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;
    use Elementor\Icons_Manager;


    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_header_four extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_header_four';
        }

        public function get_title()
        {
            return __('Header 4', 'axero-toolkit');
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
            // Menu Selection Control
            $this->start_controls_section(
                'menu_selection',
                [
                    'label' => esc_html__('Header One Setting', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                    
                ]
            );
    
            // Main Logo Control
            $this->add_control(
                'main_logo',
                [
                    'label' => esc_html__('Main Logo', 'axero-toolkit'),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => get_template_directory_uri() . '/assets/images/logo.svg',
                    ],
                    'description' => esc_html__('Upload the dark version of your logo (visible in light mode)', 'axero-toolkit'),
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
                    'label'   => esc_html__('Select Menu', 'axero-toolkit'),
                    'type'    => Controls_Manager::SELECT,
                    'label_block' => true,
                    'default' => !empty($menu_options) ? array_key_first($menu_options) : '',
                    'options' => $menu_options,
                    'description' => empty($menu_options) ? esc_html__('No menus found. Please create a menu first.', 'axero-toolkit') : '',
                ]
            );


            $this->add_control(
                'enable_header_button',
                [
                    'label' => esc_html__('Enable Header Button', 'axero-toolkit'),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('Yes', 'axero-toolkit'),
                    'label_off' => esc_html__('No', 'axero-toolkit'),
                    'return_value' => 'yes',
                    'default' => 'yes',
                    'separator' => 'before',
                    'description' => esc_html__('Show call-to-action button in header', 'axero-toolkit'),
                ]
            );

            $this->add_control(
                'header_button_text',
                [
                    'label' => esc_html__('Button Text', 'axero-toolkit'),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Get in Touch', 'axero-toolkit'),
                    'condition' => [
                        'enable_header_button' => 'yes',
                    ],
                ]
            );
            $this->add_control(
                'header_button_icon',
                [
                    'label'   => esc_html__('Button Icon', 'axero-toolkit'),
                    'type'    => Controls_Manager::ICONS,
                    'default' => [
                        'value'   => 'ti ti-arrow-up-right',
                        'library' => 'remixicon',
                    ],
                ]
            );


            $this->add_control(
                'header_button_link',
                [
                    'label' => esc_html__('Button Link', 'axero-toolkit'),
                    'type' => Controls_Manager::URL,
                    'placeholder' => esc_html__('https://your-link.com', 'axero-toolkit'),
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
                    'label' => esc_html__('Mobile Menu', 'axero-toolkit'),
                    'tab' => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'mobile_logo',
                [
                    'label' => esc_html__('Upload Mobile Logo', 'axero-toolkit'),
                    'type' => Controls_Manager::MEDIA,
                    'separator' => 'before',
                ]
            );
 
            $this->add_control(
                'mobile_menu_heading',
                [
                    'label' => esc_html__('Mobile Menu Settings', 'axero-toolkit'),
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
                    'label' => esc_html__('Select Mobile Menu', 'axero-toolkit'),
                    'type' => Controls_Manager::SELECT,
                    'options' => $options,
                    'default' => !empty($options) ? array_key_first($options) : '',
                    'description' => esc_html__('Choose which menu to display in mobile view','axero-toolkit'),
                ]
            );

            $this->add_control(
                'mobile_menu_form_title',
                [
                    'label' => esc_html__('Form Title', 'axero-toolkit'),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Follow the Newest Trends','axero-toolkit'),
                    'label_block' => true,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'mobile_menu_form_shortcode',
                [
                    'label' => esc_html__('Form Shortcode', 'axero-toolkit'),
                    'type' => Controls_Manager::TEXT,
                    'description' => esc_html__('Enter a contact form 7 or other form shortcode', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );
            
            $this->add_control(
                'mobile_menu_social_heading',
                [
                    'label' => esc_html__('Social Media', 'axero-toolkit'),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'show_mobile_socials',
                [
                    'label' => esc_html__('Show Social Icons', 'axero-toolkit'),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('Show', 'axero-toolkit'),
                    'label_off' => esc_html__('Hide', 'axero-toolkit'),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            $this->add_control(
                'mobile_social_icons',
                [
                    'label' => esc_html__('Social Icons', 'axero-toolkit'),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => [
                        [
                            'name' => 'icon',
                            'label' => esc_html__('Icon', 'axero-toolkit'),
                            'type' => Controls_Manager::ICONS,
                            'default' => [
                                'value' => 'ti ti-brand-x',
                                'library' => 'ti-icons',
                            ],
                        ],
                        [
                            'name' => 'link',
                            'label' => esc_html__('Link', 'axero-toolkit'),
                            'type' => Controls_Manager::URL,
                            'placeholder' => esc_html__('https://your-link.com', 'axero-toolkit'),
                        ],
                    ],
                    'default' => [
                        [
                            'icon' => ['value' => 'ti ti-brand-x', 'library' => 'ti-icons'],
                        ],
                        [
                            'icon' => ['value' => 'ti ti-brand-facebook', 'library' => 'ti-icons'],
                        ],
                        [
                            'icon' => ['value' => 'ti ti-brand-linkedin', 'library' => 'ti-icons'],
                        ],
                    ],
                    'title_field' => '{{{ elementor.helpers.getSocialNetworkNameFromIcon
                    ( icon, false, \'\', \'brand-\' ) }}}',
                    'condition' => [
                        'show_mobile_socials' => 'yes',
                    ],
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
                    'label' => esc_html__('Header Navigation', 'axero-toolkit'),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
            );

            
            // Header Container Margin
            $this->add_responsive_control(
                'header_container_padding',
                [
                    'label' => esc_html__('Container Padding', 'axero-toolkit'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .navbar_area' => 'padding: {{TOP}}{{UNIT}} 
                        {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                    ],
                    'default' => [
                        'top' => '25',
                        'right' => '0',
                        'bottom' => '25',
                        'left' => '0',
                        'unit' => 'px',
                        'isLinked' => false,
                    ],
                ]
            );
            
            // Border control  
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'navbar_area_border',
                    'label' => esc_html__('Navbar Area Border', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .navbar_area.border_bottom',
                ]
            );
            // Header Background Controls
            $this->add_control(
                'header_menu_style',
                [
                    'label' => esc_html__('Menu Style', 'axero-toolkit'),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'header_menu_background',
                [
                    'label' => esc_html__('Menu Background', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .navbar_area .navbar-nav' => 'background: {{VALUE}};',
                    ],
                    'default' => 'rgba(255, 255, 255, 0.1)',
                ]
            );

            $this->add_control(
                'header_menu_border_radius',
                [
                    'label' => esc_html__('Border Radius', 'axero-toolkit'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors' => [
                        '{{WRAPPER}} .navbar_area .navbar-nav' => 'border-radius: 
                        {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'default' => [
                        'top' => '94.5',
                        'right' => '85',
                        'bottom' => '94.5',
                        'left' => '94.5',
                        'unit' => 'px',
                    ],
                ]
            );

            $this->add_control(
                'header_menu_blur',
                [
                    'label' => esc_html__('Backdrop Filter Blur', 'axero-toolkit'),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 50,
                            'step' => 0.1,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .navbar_area .navbar-nav' => '-webkit-backdrop-filter:
                         blur({{SIZE}}{{UNIT}}); backdrop-filter: blur({{SIZE}}{{UNIT}});',
                    ],
                    'default' => [
                        'size' => 17.67,
                        'unit' => 'px',
                    ],
                ]
            );

            $this->add_control(
                'header_menu_border',
                [
                    'label' => esc_html__('Border Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .navbar_area .navbar-nav' => 'border: 1px solid {{VALUE}};',
                    ],
                    'default' => 'rgba(255, 255, 255, 0.1)',
                ]
            );

            $this->add_responsive_control(
                'header_menu_padding',
                [
                    'label' => esc_html__('Horizontal Padding', 'axero-toolkit'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors' => [
                        '{{WRAPPER}} .navbar_area 
                        .navbar-nav' => 'padding-left: {{LEFT}}{{UNIT}}; 
                        padding-right: {{RIGHT}}{{UNIT}};',
                    ],
                    'default' => [
                        'left' => '40',
                        'right' => '40',
                        'unit' => 'px',
                        'isLinked' => false,
                    ],
                ]
            );

            // Background Color
            $this->add_control(
                'header_bg_color',
                [
                    'label' => esc_html__('Background Color', 'axero-toolkit'),
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
                    'label' => esc_html__('Text Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .navbar_area.style_three .navbar .navbar-nav 
                        .nav-item .nav-link' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .navbar_area.style_three .navbar .navbar-nav 
                        .nav-item .dropdown-toggle::before' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Hover Text Color
            $this->add_control(
                'nav_hover_text_color',
                [
                    'label' => esc_html__('Hover Text Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .navbar_area.style_three .navbar 
                        .navbar-nav .nav-item .nav-link:hover' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .navbar_area.style_three 
                        .navbar .navbar-nav .nav-item 
                        .dropdown-toggle:hover::before' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'nav_typography',
                    'label' => esc_html__('Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .navbar_area.style_three .navbar .navbar-nav 
                    .nav-item .nav-link, {{WRAPPER}} .navbar_area.style_three 
                    .navbar .navbar-nav .nav-item .dropdown-toggle::before',
                ]
            );
            // Submenu Background Color
            $this->add_control(
                'submenu_bg_color',
                [
                    'label' => esc_html__('Submenu Background Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .navbar_area.style_three .navbar .navbar-nav 
                        .nav-item .dropdown-menu' => 'background-color: {{VALUE}};',
                    ],
                    'separator' => 'before',
                ]
            );

            // Submenu Text Color
            $this->add_control(
                'submenu_text_color',
                [
                    'label' => esc_html__('Submenu Text Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .navbar_area.style_three .navbar .navbar-nav 
                        .nav-item .dropdown-menu .nav-item .nav-link' => 'color: {{VALUE}};',
                         
                    ],
                ]
            );

            // Submenu Hover Text Color
            $this->add_control(
                'submenu_hover_text_color',
                [
                    'label' => esc_html__('Submenu Hover Text Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .navbar_area.style_three .navbar 
                        .navbar-nav .nav-item .dropdown-menu .nav-item 
                        .nav-link:hover' => 'color: {{VALUE}};',
                         
                    ],
                ]
            );

            // Submenu Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'submenu_typography',
                    'label' => esc_html__('Submenu Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .navbar_area.style_three .navbar 
                    .navbar-nav .nav-item .dropdown-menu .nav-item .nav-link',
                ]
            );

            // Submenu Active Text Color
            $this->add_control(
                'submenu_active_text_color',
                [
                    'label' => esc_html__('Submenu Active Text Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .navbar_area.style_three .navbar .navbar-nav 
                        .nav-item .dropdown-menu .nav-item .nav-link.active' => 'color: {{VALUE}};',
                    ],
                    'separator' => 'before',
                ]
            );

            // Submenu Line Background Color
            $this->add_control(
                'submenu_line_bg_color',
                [
                    'label' => esc_html__('Submenu Line Background Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .navbar_area .navbar .navbar-nav .nav-item 
                        .dropdown-menu .nav-item .nav-link::after' => 'background-color: {{VALUE}};',
                    ],
                    'separator' => 'before',
                ]
            );

            // Submenu Arrow Color
            $this->add_control(
                'submenu_arrow_color',
                [
                    'label' => esc_html__('Submenu Arrow Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .navbar_area.style_three 
                        .navbar .navbar-nav .nav-item .dropdown-menu 
                        .nav-item .nav-link.dropdown-toggle::before' => 'color: {{VALUE}};',
                    ],
                    'separator' => 'before',
                ]
            );

            // Submenu Arrow Hover Color
            $this->add_control(
                'submenu_arrow_hover_color',
                [
                    'label' => esc_html__('Submenu Arrow Hover Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .navbar_area.style_three .navbar 
                        .navbar-nav .nav-item .dropdown-menu 
                        .nav-item .nav-link:hover.dropdown-toggle::before' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_section();
            
            $this->start_controls_section(
                'header_button_style',
                [
                    'label' => esc_html__('Header Button', 'axero-toolkit'),
                    'tab' => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'enable_header_button' => 'yes',
                    ],
                ]
            );

            // Button Text Color
            $this->add_control(
                'button_text_color',
                [
                    'label' => esc_html__('Text Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn.style_three' => 'color: {{VALUE}} !important;',
                        '{{WRAPPER}} .btn.style_three i' => 'color: {{VALUE}} !important;',
                    ],
                ]
            );

            // Button Hover Text Color
            $this->add_control(
                'button_hover_text_color',
                [
                    'label' => esc_html__('Hover Text Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn.style_three:hover, {{WRAPPER}} .btn.style_three:focus, {{WRAPPER}} .btn.style_three:active' => 'color: {{VALUE}} !important;',
                        '{{WRAPPER}} .btn.style_three:hover i, {{WRAPPER}} .btn.style_three:focus i, {{WRAPPER}} .btn.style_three:active i' => 'color: {{VALUE}} !important;',
                    ],
                ]
            );

            // Button Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'button_typography',
                    'label' => esc_html__('Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .btn.style_three',
                ]
            );

            // Button Background Color
            $this->add_control(
                'button_bg_color',
                [
                    'label' => esc_html__('Background Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn.style_three' => 'background-color: {{VALUE}} !important;',
                    ],
                ]
            );

            // Button Hover Background Color
            $this->add_control(
                'button_hover_bg_color',
                [
                    'label' => esc_html__('Hover Background Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn.style_three:hover, {{WRAPPER}} .btn.style_three:focus, {{WRAPPER}} .btn.style_three:active' => 'background-color: {{VALUE}} !important;',
                    ],
                ]
            );

            // Button Border Control
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'button_border',
                    'label' => esc_html__('Border', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .btn.style_three, {{WRAPPER}} .btn',
                ]
            );

            // Button Hover Border Color
            $this->add_control(
                'button_hover_border_color',
                [
                    'label' => esc_html__('Hover Border Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn.style_three:hover, {{WRAPPER}} .btn.style_three:focus, {{WRAPPER}} .btn.style_three:active, {{WRAPPER}} .btn:hover, {{WRAPPER}} .btn:focus, {{WRAPPER}} .btn:active' => 'border-color: {{VALUE}} !important;',
                    ],
                ]
            );

            // Button Border Radius Control
            $this->add_responsive_control(
                'button_border_radius',
                [
                    'label' => esc_html__('Border Radius', 'axero-toolkit'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .btn.style_three, {{WRAPPER}} .btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_section();

            // Sticky Header Style
            $this->start_controls_section(
                'sticky_header_style',
                [
                    'label' => esc_html__('Mobile Header', 'axero-toolkit'),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
            );

             
            // Non Sticky Toggle Color
            $this->add_control(
                'non_sticky_toggle_color',
                [
                    'label' => esc_html__('Toggle Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#ffffff',
                    'selectors' => [
                        '{{WRAPPER}} .navbar_area.style_three .navbar .navbar-toggler .burger_menu span' => 'background-color: {{VALUE}};',
                    ],
                    'separator' => 'before',
                ]
            );
            $this->end_controls_section();

            // Mobile Navigation Style
            $this->start_controls_section(
                'mobile_nav_style',
                [
                    'label' => esc_html__('Mobile Navigation', 'axero-toolkit'),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
            );

            // Mobile Menu Background Color
            $this->add_control(
                'mobile_menu_bg_color',
                [
                    'label' => esc_html__('Background Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .menu-popup-area' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            // Mobile Menu Icon Background Color
            $this->add_control(
                'mobile_menu_icon_bg_color',
                [
                    'label' => esc_html__('Mobile Menu Icon Background Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .navbar-area .navbar .navbar-toggler .burger-menu span' => 'background-color: {{VALUE}};',
                    ],
                    'separator' => 'before',
                ]
            );

            // Mobile Menu Text Color
            $this->add_control(
                'mobile_menu_text_color',
                [
                    'label' => esc_html__('Text Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .menu-popup-area .meanu-popup-nav .accordion .accordion-item .accordion-button' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .menu-popup-area .meanu-popup-nav .accordion .accordion-item a' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Mobile Menu Text Hover/Active Color
            $this->add_control(
                'mobile_menu_text_hover_color',
                [
                    'label' => esc_html__('Text Hover/Active Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .menu-popup-area .meanu-popup-nav .accordion .accordion-item .accordion-button:hover, {{WRAPPER}} .menu-popup-area .meanu-popup-nav .accordion .accordion-item .accordion-button.active, {{WRAPPER}} .menu-popup-area .meanu-popup-nav .accordion .accordion-item a:hover, {{WRAPPER}} .menu-popup-area .meanu-popup-nav .accordion .accordion-item a.active' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Mobile Menu Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'mobile_menu_typography',
                    'label' => esc_html__('Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .menu-popup-area .meanu-popup-nav .accordion .accordion-item .accordion-button, {{WRAPPER}} .menu-popup-area .meanu-popup-nav .accordion .accordion-item a',
                ]
            );

            // Submenu Background Color
            $this->add_control(
                'mobile_submenu_bg_color',
                [
                    'label' => esc_html__('Submenu Background', 'axero-toolkit'),
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
                    'label' => esc_html__('Submenu Text Color', 'axero-toolkit'),
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
                    'label' => esc_html__('Submenu Text Hover Color', 'axero-toolkit'),
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
                    'label' => esc_html__('Submenu Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .menu-popup-area .meanu-popup-nav .accordion .accordion-item .accordion-collapse .accordion-body .accordion-item .accordion-link',
                ]
            );
            // Close Button Color
            $this->add_control(
                'mobile_close_btn_color',
                [
                    'label' => esc_html__('Close Button Color', 'axero-toolkit'),
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
                    'label' => esc_html__('Close Button Hover Color', 'axero-toolkit'),
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
                    'label' => esc_html__('Close Button Background', 'axero-toolkit'),
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
                    'label' => esc_html__('Close Button Hover Background', 'axero-toolkit'),
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
                    'label' => esc_html__('Mobile Menu Contact', 'axero-toolkit'),
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
                    'label' => esc_html__('Title Color', 'axero-toolkit'),
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
                    'label' => esc_html__('Title Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .menu-popup-area .menu-contact-info .location h5',
                ]
            );

            // Description Color
            $this->add_control(
                'mobile_contact_desc_color',
                [
                    'label' => esc_html__('Description Color', 'axero-toolkit'),
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
                    'label' => esc_html__('Description Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .menu-popup-area .menu-contact-info .location p',
                ]
            );

            // Email Color
            $this->add_control(
                'mobile_contact_email_color',
                [
                    'label' => esc_html__('Email Color', 'axero-toolkit'),
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
                    'label' => esc_html__('Email Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .menu-popup-area .menu-contact-info h4',
                ]
            );

            // Social Icon Color
            $this->add_control(
                'mobile_contact_social_color',
                [
                    'label' => esc_html__('Social Icon Color', 'axero-toolkit'),
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
                    'label' => esc_html__('Social Icon Hover Color', 'axero-toolkit'),
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
            $settings = $this->get_settings_for_display(); ?>
                <div class="navbar_area style_three top-0 start-0 end-0 h-auto  border_bottom">
                    <div class="container-fluid max_w_1560px">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <?php if ( !empty( $settings['main_logo']['url'] ) ) : ?>
                                    <img src="<?php echo esc_url( $settings['main_logo']['url'] ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                                <?php else : ?>
                                    <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
                                <?php endif; ?>
                            </a>
                            <button class="navbar-toggler shadow-none p-0 border-0" type="button">
                                <span class="burger_menu">
                                    <span class="d-block"></span>
                                    <span class="d-block"></span>
                                    <span class="d-block"></span>
                                </span>
                            </button>
                            <div class="collapse navbar-collapse">
                                <ul class="navbar-nav mx-auto">
                                <?php
                                // Get the selected menu from widget settings
                                $selected_menu = $settings['selected_menu'] ?? '';

                                if (!empty($selected_menu) && class_exists('Axero_Nav_Walker')) {
                                    wp_nav_menu([
                                        'menu'            => $selected_menu,
                                        'container'       => false,
                                        'items_wrap'      => '%3$s',
                                        'walker'          => new \Axero_Nav_Walker(),
                                        'fallback_cb'     => 'Axero_Nav_Walker::fallback',
                                    ]);
                                } elseif (empty($selected_menu)) {
                                    echo '<div class="notice notice-warning"><p>' . 
                                        esc_html__('Please select a menu from the widget settings.', 'axero-toolkit') . 
                                    '</p></div>';
                                } else {
                                    echo '<div class="notice notice-warning"><p>' . 
                                        esc_html__('Axero Toolkit plugin is not active. Please activate it for full functionality.', 'axero-toolkit') . 
                                    '</p></div>';
                                }
                                ?>
                            </ul>
                                <?php if ('yes' === $settings['enable_header_button']) : ?>
                                    <div class="right_side_options">
                                        <a href="<?php echo esc_url($settings['header_button_link']['url']); ?>" class="btn style_three">
                                            <span class="d-inline-block position-relative">
                                                <?php echo esc_html($settings['header_button_text']); ?>
                                                <?php \Elementor\Icons_Manager::render_icon($settings['header_button_icon'], ['aria-hidden' => 'true']); ?>
                                            </span>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </nav>
                    </div>
                </div>
                <!------ Mobile device header One ---------->
                <div class="menu_popup_area position-fixed start-0 end-0 top-0 bottom-0">
                    <div class="d-table">
                        <div class="d-table-cell">
                            <div class="container">
                                <div class="bg-white">
                                    <div class="row align-items-center">
                                        <div class="col-lg-7">
                                            <div class="meanu_popup_nav">
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
                                                            esc_html__('Please select a mobile menu from the widget settings.', 'axero-toolkit') . 
                                                        '</p></div>';
                                                    } else {
                                                        echo '<div class="notice notice-warning"><p>' . 
                                                            esc_html__('Lunex Toolkit plugin is not active. Please activate it for full functionality.', 'axero-toolkit') . 
                                                        '</p></div>';
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="menu_contact_info">
                                                <a class="d-inline-block" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                                        <?php if ( !empty( $settings['mobile_logo']['url'] ) ) : ?>
                                                        <img src="<?php echo esc_url( $settings['mobile_logo']['url'] ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                                                    <?php else : ?>
                                                        <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
                                                    <?php endif; ?>
                                                </a>
                                                <?php if (!empty($settings['mobile_menu_form_shortcode'])) : ?>
                                                    <div class="newsletter_box">
                                                        <?php if (!empty($settings['mobile_menu_form_title'])) : ?>
                                                            <h4 class="fw-medium">
                                                                <?php echo esc_html($settings['mobile_menu_form_title']); ?>
                                                            </h4>
                                                        <?php endif; ?>
                                                        <?php echo do_shortcode($settings['mobile_menu_form_shortcode']); ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (!empty($settings['show_mobile_socials']) && $settings['show_mobile_socials'] === 'yes' && !empty($settings['mobile_social_icons'])) : ?>
                                                    <div class="socials d-flex align-items-center">
                                                        <?php foreach ($settings['mobile_social_icons'] as $icon) : 
                                                            if (!empty($icon['icon']['value']) && !empty($icon['link']['url'])) : ?>
                                                                <a href="<?php echo esc_url($icon['link']['url']); ?>" 
                                                                target="<?php echo !empty($icon['link']['is_external']) ? '_blank' : '_self'; ?>" 
                                                                class="d-block">
                                                                    <i class="<?php echo esc_attr($icon['icon']['value']); ?>"></i>
                                                                </a>
                                                            <?php endif; 
                                                        endforeach; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="menu_popup_close_btn position-absolute rounded-circle text-center border-0 p-0">
                        <i class="ti ti-x"></i>
                    </button>
                </div>

                 

            <?php
        }
    }   
$widgets_manager->register(new axero_header_four()); 