<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_footer_5 extends Widget_Base
    {

        public function get_name()
        {
            return 'axero-footer-5';
        }

        public function get_title()
        {
            return __(' Footer 1', 'axero-toolkit');
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
            // Footer Top Content Section
            $this->start_controls_section(
                'footer_top_content_section',
                [
                    'label' => __('Footer Top Content', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'footer_top_title',
                [
                    'label'       => __('Footer Top Title', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => __("Let's Talk.", 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'footer_top_button_text',
                [
                    'label'       => __('Button Text', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => __('Hire Our Team', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'footer_top_button_url',
                [
                    'label'         => __('Button URL', 'axero-toolkit'),
                    'type'          => Controls_Manager::URL,
                    'placeholder'   => __('https://your-link.com', 'axero-toolkit'),
                    'default'       => [
                        'url'         => '#',
                        'is_external' => false,
                        'nofollow'    => false,
                    ],
                    'show_external' => true,
                    'label_block'   => true,
                ]
            );

            $this->add_control(
                'footer_top_button_icon',
                [
                    'label'   => __('Button Icon', 'axero-toolkit'),
                    'type'    => Controls_Manager::ICONS,
                    'default' => [
                        'value'   => 'ri-arrow-right-long-line',
                        'library' => 'remixicon',
                    ],
                ]
            );

            $this->end_controls_section();

            // -------------------------------
            // Footer Middle Content Section
            // -------------------------------
            $this->start_controls_section(
                'footer_middle_content_section',
                [
                    'label' => __('Footer Middle Content', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'footer_social_title',
                [
                    'label'       => __('Social Title', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => __('Social', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            // Social Links Repeater
            $social_repeater = new \Elementor\Repeater();

            $social_repeater->add_control(
                'social_label',
                [
                    'label'       => __('Label', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => 'LinkedIn',
                    'label_block' => true,
                ]
            );
            $social_repeater->add_control(
                'social_icon',
                [
                    'label'   => __('Icon', 'axero-toolkit'),
                    'type'    => Controls_Manager::ICONS,
                    'default' => [
                        'value'   => 'ri-arrow-right-up-line',
                        'library' => 'remixicon',
                    ],
                ]
            );
            $social_repeater->add_control(
                'social_url',
                [
                    'label'         => __('URL', 'axero-toolkit'),
                    'type'          => Controls_Manager::URL,
                    'placeholder'   => __('https://your-social-url.com', 'axero-toolkit'),
                    'default'       => [
                        'url'         => '#',
                        'is_external' => true,
                        'nofollow'    => false,
                    ],
                    'show_external' => true,
                    'label_block'   => true,
                ]
            );

            $this->add_control(
                'footer_social_links',
                [
                    'label'       => __('Social Links', 'axero-toolkit'),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $social_repeater->get_controls(),
                    'title_field' => '{{{ social_label }}}',
                    'default'     => [
                        [
                            'social_label' => 'LinkedIn',
                            'social_icon'  => [
                                'value'   => 'ri-arrow-right-up-line',
                                'library' => 'remixicon',
                            ],
                            'social_url'   => [
                                'url'         => '#',
                                'is_external' => true,
                                'nofollow'    => false,
                            ],
                        ],
                        [
                            'social_label' => 'Twitter',
                            'social_icon'  => [
                                'value'   => 'ri-arrow-right-up-line',
                                'library' => 'remixicon',
                            ],
                            'social_url'   => [
                                'url'         => '#',
                                'is_external' => true,
                                'nofollow'    => false,
                            ],
                        ],
                        [
                            'social_label' => 'Instagram',
                            'social_icon'  => [
                                'value'   => 'ri-arrow-right-up-line',
                                'library' => 'remixicon',
                            ],
                            'social_url'   => [
                                'url'         => '#',
                                'is_external' => true,
                                'nofollow'    => false,
                            ],
                        ],
                        [
                            'social_label' => 'Dribbble',
                            'social_icon'  => [
                                'value'   => 'ri-arrow-right-up-line',
                                'library' => 'remixicon',
                            ],
                            'social_url'   => [
                                'url'         => '#',
                                'is_external' => true,
                                'nofollow'    => false,
                            ],
                        ],
                        [
                            'social_label' => 'Behance',
                            'social_icon'  => [
                                'value'   => 'ri-arrow-right-up-line',
                                'library' => 'remixicon',
                            ],
                            'social_url'   => [
                                'url'         => '#',
                                'is_external' => true,
                                'nofollow'    => false,
                            ],
                        ],
                        [
                            'social_label' => 'Pinterest',
                            'social_icon'  => [
                                'value'   => 'ri-arrow-right-up-line',
                                'library' => 'remixicon',
                            ],
                            'social_url'   => [
                                'url'         => '#',
                                'is_external' => true,
                                'nofollow'    => false,
                            ],
                        ],
                    ],
                ]
            );

            // Company Links Repeater
            $this->add_control(
                'footer_company_title',
                [
                    'label'       => __('Company Title', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => __('Company', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );
            $company_repeater = new \Elementor\Repeater();

            $company_repeater->add_control(
                'company_label',
                [
                    'label'       => __('Label', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => 'Home',
                    'label_block' => true,
                ]
            );
            $company_repeater->add_control(
                'company_icon',
                [
                    'label'   => __('Icon', 'axero-toolkit'),
                    'type'    => Controls_Manager::ICONS,
                    'default' => [
                        'value'   => 'ri-arrow-right-up-line',
                        'library' => 'remixicon',
                    ],
                ]
            );
            $company_repeater->add_control(
                'company_url',
                [
                    'label'         => __('URL', 'axero-toolkit'),
                    'type'          => Controls_Manager::URL,
                    'placeholder'   => __('https://your-link.com', 'axero-toolkit'),
                    'default'       => [
                        'url'         => '#',
                        'is_external' => false,
                        'nofollow'    => false,
                    ],
                    'show_external' => true,
                    'label_block'   => true,
                ]
            );

            $this->add_control(
                'footer_company_links',
                [
                    'label'       => __('Company Links', 'axero-toolkit'),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $company_repeater->get_controls(),
                    'title_field' => '{{{ company_label }}}',
                    'default'     => [
                        [
                            'company_label' => 'Home',
                            'company_icon'  => [
                                'value'   => 'ri-arrow-right-up-line',
                                'library' => 'remixicon',
                            ],
                            'company_url'   => [
                                'url'         => '#',
                                'is_external' => false,
                                'nofollow'    => false,
                            ],
                        ],
                        [
                            'company_label' => 'About Us',
                            'company_icon'  => [
                                'value'   => 'ri-arrow-right-up-line',
                                'library' => 'remixicon',
                            ],
                            'company_url'   => [
                                'url'         => '#',
                                'is_external' => false,
                                'nofollow'    => false,
                            ],
                        ],
                        [
                            'company_label' => 'Services',
                            'company_icon'  => [
                                'value'   => 'ri-arrow-right-up-line',
                                'library' => 'remixicon',
                            ],
                            'company_url'   => [
                                'url'         => '#',
                                'is_external' => false,
                                'nofollow'    => false,
                            ],
                        ],
                        [
                            'company_label' => 'Projects',
                            'company_icon'  => [
                                'value'   => 'ri-arrow-right-up-line',
                                'library' => 'remixicon',
                            ],
                            'company_url'   => [
                                'url'         => '#',
                                'is_external' => false,
                                'nofollow'    => false,
                            ],
                        ],
                        [
                            'company_label' => 'Blogs',
                            'company_icon'  => [
                                'value'   => 'ri-arrow-right-up-line',
                                'library' => 'remixicon',
                            ],
                            'company_url'   => [
                                'url'         => '#',
                                'is_external' => false,
                                'nofollow'    => false,
                            ],
                        ],
                        [
                            'company_label' => 'Contact Us',
                            'company_icon'  => [
                                'value'   => 'ri-arrow-right-up-line',
                                'library' => 'remixicon',
                            ],
                            'company_url'   => [
                                'url'         => '#',
                                'is_external' => false,
                                'nofollow'    => false,
                            ],
                        ],
                    ],
                ]
            );

            // Services Links Repeater
            $this->add_control(
                'footer_services_title',
                [
                    'label'       => __('Services Title', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => __('Services', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );
            $services_repeater = new \Elementor\Repeater();

            $services_repeater->add_control(
                'service_label',
                [
                    'label'       => __('Label', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => 'Digital Advertising',
                    'label_block' => true,
                ]
            );
            $services_repeater->add_control(
                'service_icon',
                [
                    'label'   => __('Icon', 'axero-toolkit'),
                    'type'    => Controls_Manager::ICONS,
                    'default' => [
                        'value'   => 'ri-arrow-right-up-line',
                        'library' => 'remixicon',
                    ],
                ]
            );
            $services_repeater->add_control(
                'service_url',
                [
                    'label'         => __('URL', 'axero-toolkit'),
                    'type'          => Controls_Manager::URL,
                    'placeholder'   => __('https://your-link.com', 'axero-toolkit'),
                    'default'       => [
                        'url'         => '#',
                        'is_external' => false,
                        'nofollow'    => false,
                    ],
                    'show_external' => true,
                    'label_block'   => true,
                ]
            );

            $this->add_control(
                'footer_services_links',
                [
                    'label'       => __('Services Links', 'axero-toolkit'),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $services_repeater->get_controls(),
                    'title_field' => '{{{ service_label }}}',
                    'default'     => [
                        [
                            'service_label' => 'Digital Advertising',
                            'service_icon'  => [
                                'value'   => 'ri-arrow-right-up-line',
                                'library' => 'remixicon',
                            ],
                            'service_url'   => [
                                'url'         => '#',
                                'is_external' => false,
                                'nofollow'    => false,
                            ],
                        ],
                        [
                            'service_label' => 'Social Media Graphics',
                            'service_icon'  => [
                                'value'   => 'ri-arrow-right-up-line',
                                'library' => 'remixicon',
                            ],
                            'service_url'   => [
                                'url'         => '#',
                                'is_external' => false,
                                'nofollow'    => false,
                            ],
                        ],
                        [
                            'service_label' => 'Web Design',
                            'service_icon'  => [
                                'value'   => 'ri-arrow-right-up-line',
                                'library' => 'remixicon',
                            ],
                            'service_url'   => [
                                'url'         => '#',
                                'is_external' => false,
                                'nofollow'    => false,
                            ],
                        ],
                        [
                            'service_label' => 'Branding & Marketing',
                            'service_icon'  => [
                                'value'   => 'ri-arrow-right-up-line',
                                'library' => 'remixicon',
                            ],
                            'service_url'   => [
                                'url'         => '#',
                                'is_external' => false,
                                'nofollow'    => false,
                            ],
                        ],
                        [
                            'service_label' => 'Content Marketing',
                            'service_icon'  => [
                                'value'   => 'ri-arrow-right-up-line',
                                'library' => 'remixicon',
                            ],
                            'service_url'   => [
                                'url'         => '#',
                                'is_external' => false,
                                'nofollow'    => false,
                            ],
                        ],
                        [
                            'service_label' => 'Email Marketing',
                            'service_icon'  => [
                                'value'   => 'ri-arrow-right-up-line',
                                'library' => 'remixicon',
                            ],
                            'service_url'   => [
                                'url'         => '#',
                                'is_external' => false,
                                'nofollow'    => false,
                            ],
                        ],
                    ],
                ]
            );

            $this->end_controls_section();

            // -------------------------------
            // Footer Bottom Content Section
            // -------------------------------
            $this->start_controls_section(
                'footer_bottom_content_section',
                [
                    'label' => __('Footer Bottom Content', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'footer_bottom_back_to_top_text',
                [
                    'label'       => __('Back To Top Text', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => __('Back to top', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'footer_bottom_back_to_top_icon',
                [
                    'label'   => __('Back To Top Icon', 'axero-toolkit'),
                    'type'    => Controls_Manager::ICONS,
                    'default' => [
                        'value'   => 'ri-arrow-up-line',
                        'library' => 'remixicon',
                    ],
                ]
            );

            $this->add_control(
                'footer_bottom_logo',
                [
                    'label'   => __('Footer Logo', 'axero-toolkit'),
                    'type'    => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ]
            );
    

            $this->add_control(
                'footer_bottom_border_image',
                [
                    'label'   => __('Footer Border Image', 'axero-toolkit'),
                    'type'    => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
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
            // Footer Top Style Controls
            $this->start_controls_section(
                'footer_top_style_section',
                [
                    'label' => __('Footer Top', 'axero-toolkit'),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

            // Banner Title Color
            $this->add_control(
                'footer_top_title_color',
                [
                    'label'     => __('Banner Title Color', 'axero-toolkit'),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .main_footer_top .main_footer_title h2' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Banner Title Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'footer_top_title_typography',
                    'selector' => '{{WRAPPER}} .main_footer_top .main_footer_title h2',
                ]
            );

            // Button Text Color
            $this->add_control(
                'footer_top_button_text_color',
                [
                    'label'     => __('Button Text Color', 'axero-toolkit'),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn.primary_btn' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Button Text Hover Color
            $this->add_control(
                'footer_top_button_text_hover_color',
                [
                    'label'     => __('Button Text Hover Color', 'axero-toolkit'),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn.primary_btn:hover' => 'color: {{VALUE}} !important;',
                    ],
                ]
            );

            // Button Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'footer_top_button_typography',
                    'selector' => '{{WRAPPER}} .btn.primary_btn',
                ]
            );

            // Button Background Color
            $this->add_control(
                'footer_top_button_bg_color',
                [
                    'label'     => __('Button Background Color', 'axero-toolkit'),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn.primary_btn' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            // Button Hover Background Color
            $this->add_control(
                'footer_top_button_bg_hover_color',
                [
                    'label'     => __('Button Hover Background Color', 'axero-toolkit'),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn.primary_btn:hover' => 'background-color: {{VALUE}} !important;',
                    ],
                ]
            );

            // Button Border Control
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name'     => 'footer_top_button_border',
                    'selector' => '{{WRAPPER}} .btn.primary_btn',
                ]
            );

            $this->end_controls_section();

            // Footer Middle Style Controls
            $this->start_controls_section(
                'footer_middle_style_section',
                [
                    'label' => __('Footer Middle', 'axero-toolkit'),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

            // Custom Link Header Color
            $this->add_control(
                'footer_middle_header_color',
                [
                    'label'     => __('Custom Link Header Color', 'axero-toolkit'),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .main_footer_middle .main_footer_widget h3' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Custom Link Header Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'footer_middle_header_typography',
                    'selector' => '{{WRAPPER}} .main_footer_middle .main_footer_widget h3',
                ]
            );

            // Custom Link Icon Color
            $this->add_control(
                'footer_middle_icon_color',
                [
                    'label'     => __('Custom Link Icon Color', 'axero-toolkit'),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .main_footer_middle .main_footer_widget .custom_links li a i, {{WRAPPER}} .main_footer_middle .main_footer_widget .custom_links li a svg' => 'color: {{VALUE}}; fill: {{VALUE}};',
                    ],
                ]
            );

            // Custom Link Icon Size
            $this->add_control(
                'footer_middle_icon_size',
                [
                    'label'      => __('Custom Link Icon Size', 'axero-toolkit'),
                    'type'       => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range'      => [
                        'px' => [
                            'min' => 10,
                            'max' => 60,
                        ],
                    ],
                    'default'    => [
                        'size' => 22,
                        'unit' => 'px',
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} .main_footer_middle .main_footer_widget .custom_links li a i, {{WRAPPER}} .main_footer_middle .main_footer_widget .custom_links li a svg' => 'font-size: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            // Custom Link Text Color
            $this->add_control(
                'footer_middle_link_text_color',
                [
                    'label'     => __('Custom Link Text Color', 'axero-toolkit'),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .main_footer_middle .main_footer_widget .custom_links li a span' => 'color: {{VALUE}};',
                    ],
                ]
            );
            
            // Custom Link Text Hover Color
            $this->add_control(
                'footer_middle_link_text_hover_color',
                [
                    'label'     => __('Custom Link Text Hover Color', 'axero-toolkit'),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .main_footer_middle .main_footer_widget .custom_links li a:hover span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Custom Link Text Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'footer_middle_link_text_typography',
                    'selector' => '{{WRAPPER}} .main_footer_middle .main_footer_widget .custom_links li a span',
                ]
            );

            $this->end_controls_section();

            // Footer Bottom Style Controls
            $this->start_controls_section(
                'footer_bottom_style_section',
                [
                    'label' => __('Footer Bottom', 'axero-toolkit'),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

            // Back to Top Text Color
            $this->add_control(
                'footer_bottom_back_to_top_text_color',
                [
                    'label'     => __('Back To Top Text Color', 'axero-toolkit'),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .main_footer_bottom .back_to_top span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Back to Top Text Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'footer_bottom_back_to_top_text_typography',
                    'selector' => '{{WRAPPER}} .main_footer_bottom .back_to_top span',
                ]
            );

            // Back to Top Icon Color
            $this->add_control(
                'footer_bottom_back_to_top_icon_color',
                [
                    'label'     => __('Back To Top Icon Color', 'axero-toolkit'),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .main_footer_bottom .back_to_top i, {{WRAPPER}} .main_footer_bottom .back_to_top svg' => 'color: {{VALUE}}; fill: {{VALUE}};',
                    ],
                ]
            );

            // Back to Top Icon Hover Color
            $this->add_control(
                'footer_bottom_back_to_top_icon_hover_color',
                [
                    'label'     => __('Back To Top Icon Hover Color', 'axero-toolkit'),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .back_to_top:hover i, {{WRAPPER}} .back_to_top:hover svg, {{WRAPPER}} .main_footer_bottom .back_to_top:hover i, {{WRAPPER}} .main_footer_bottom .back_to_top:hover svg' => 'color: {{VALUE}} !important; fill: {{VALUE}} !important;',
                    ],
                ]
            );

            // Back to Top Border Color
            $this->add_control(
                'footer_bottom_back_to_top_border_color',
                [
                    'label'     => __('Back To Top Border Color', 'axero-toolkit'),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .main_footer_bottom .back_to_top .icon' => 'border-color: {{VALUE}};',
                    ],
                ]
            );

            // Back to Top Background Color
            $this->add_control(
                'footer_bottom_back_to_top_bg_color',
                [
                    'label'     => __('Back To Top Background Color', 'axero-toolkit'),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .main_footer_bottom .back_to_top .icon' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            // Back to Top Hover Background Color
            $this->add_control(
                'footer_bottom_back_to_top_bg_hover_color',
                [
                    'label'     => __('Back To Top Hover Background Color', 'axero-toolkit'),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .main_footer_bottom .back_to_top:hover .icon' => 'background-color: {{VALUE}} !important;',
                    ],
                ]
            );
            $this->end_controls_section();
        }
        protected function render()
        {
          $settings = $this->get_settings_for_display(); ?>
            <footer class="main_footer_area position-relative z-1 pt_150">
                <div class="container-fluid max_w_1905px">
                    <div class="main_footer_top">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-lg-6 col-md-6">
                                <div class="main_footer_title">
                                    <?php if (!empty($settings['footer_top_title'])) : ?>
                                        <h2 class="mb-0 text-uppercase lh-1">
                                            <?php echo wp_kses_post($settings['footer_top_title']); ?>
                                        </h2>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="main_footer_btn">
                                    <a href="<?php echo esc_url($settings['footer_top_button_url']['url']); ?>" class="btn primary_btn">
                                        <span class="d-inline-block position-relative">
                                            <?php echo wp_kses_post($settings['footer_top_button_text']); ?>
                                            <?php \Elementor\Icons_Manager::render_icon($settings['footer_top_button_icon'], ['aria-hidden' => 'true']); ?>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main_footer_middle mx-auto">
                        <div class="row justify-content-center">
                            <div class="col-lg-4 col-sm-6">
                                <div class="main_footer_widget">
                                    <?php if (!empty($settings['footer_social_title'])) : ?>
                                        <h3 class="lh-1 text-uppercase">
                                            <?php echo wp_kses_post($settings['footer_social_title']); ?>
                                        </h3>
                                    <?php endif; ?>
                                    <ul class="custom_links p-0 mb-0 list-unstyled">
                                        <?php foreach ($settings['footer_social_links'] as $social_link) : ?>
                                            <li>
                                                <a href="<?php echo esc_url($social_link['social_url']['url']); ?>" target="<?php echo esc_attr($social_link['social_url']['is_external'] ? '_blank' : '_self'); ?>">
                                                    <?php \Elementor\Icons_Manager::render_icon($social_link['social_icon'], ['aria-hidden' => 'true']); ?>
                                                    <span class="d-inline-block">
                                                        <?php echo esc_html($social_link['social_label']); ?>
                                                    </span>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="main_footer_widget">
                                    <?php if (!empty($settings['footer_company_title'])) : ?>
                                        <h3 class="lh-1 text-uppercase">
                                            <?php echo wp_kses_post($settings ['footer_company_title']); ?>
                                        </h3>
                                    <?php endif; ?>
                                    <ul class="custom_links p-0 mb-0 list-unstyled">
                                        <?php foreach ($settings['footer_company_links'] as $company_link) : ?>
                                            <li>
                                                <a href="<?php echo esc_url($company_link['company_url']['url']); ?>" target="<?php echo esc_attr($company_link['company_url']['is_external'] ? '_blank' : '_self'); ?>">
                                                    <?php \Elementor\Icons_Manager::render_icon($company_link['company_icon'], ['aria-hidden' => 'true']); ?>
                                                    <span class="d-inline-block">
                                                        <?php echo esc_html($company_link['company_label']); ?>
                                                    </span>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="main_footer_widget">
                                    <?php if (!empty($settings['footer_services_title'])) : ?>
                                    <h3 class="lh-1 text-uppercase">
                                       <?php echo wp_kses_post($settings['footer_services_title']); ?>
                                    </h3>
                                    <?php endif; ?>
                                    <ul class="custom_links p-0 mb-0 list-unstyled">
                                        <?php foreach ($settings['footer_services_links'] as $service_link) : ?>
                                            <li>
                                                <a href="<?php echo esc_url($service_link['service_url']['url']); ?>" target="<?php echo esc_attr($service_link['service_url']['is_external'] ? '_blank' : '_self'); ?>">
                                                    <?php \Elementor\Icons_Manager::render_icon($service_link['service_icon'], ['aria-hidden' => 'true']); ?>
                                                    <span class="d-inline-block">
                                                        <?php echo esc_html($service_link['service_label']); ?>
                                                    </span>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main_footer_bottom">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <div class="back_to_top d-flex align-items-center">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <?php \Elementor\Icons_Manager::render_icon($settings['footer_bottom_back_to_top_icon'], ['aria-hidden' => 'true']); ?>
                                    </div>
                                    <span class="d-block lh-1 text-uppercase">
                                        <?php echo wp_kses_post($settings['footer_bottom_back_to_top_text']); ?>
                                    </span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="main_footer_logo">
                                    <a href="<?php echo esc_url(home_url('/')); ?>" class="d-inline-block">
                                        <img src="<?php echo esc_url($settings['footer_bottom_logo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer_border">
                    <img src="<?php echo esc_url($settings['footer_bottom_border_image']['url']); ?>" alt="<?php echo esc_attr__('Footer decorative border', 'axero-toolkit'); ?>">
                </div>
            </footer>
             <?php
        }
    }
$widgets_manager->register(new axero_footer_5());
