<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_footer_2 extends Widget_Base
    {

        public function get_name()
        {
            return 'axero-footer-2';
        }

        public function get_title()
        {
            return __(' Footer 2', 'axero-toolkit');
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
            /**
             * Footer Top Content Controls
             */
            $this->start_controls_section(
                'footer_top_content_section',
                [
                    'label' => __('Footer Top Content', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'footer_top_title_1',
                [
                    'label'       => __('First Title', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => __('Have an Idea?', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'footer_top_title_2',
                [
                    'label'       => __('Second Title', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => __("Let's Work Together!", 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'footer_top_button_text',
                [
                    'label'       => __('Button Text', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => __('Get Started for Free', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'footer_top_button_url',
                [
                    'label'       => __('Button URL', 'axero-toolkit'),
                    'type'        => Controls_Manager::URL,
                    'default'     => [
                        'url'         => '#',
                        'is_external' => false,
                    ],
                    'show_external' => true,
                ]
            );

            $this->add_control(
                'footer_top_button_icon',
                [
                    'label' => __('Button Icon', 'axero-toolkit'),
                    'type'  => Controls_Manager::ICONS,
                    'default' => [
                        'value'   => 'ri-arrow-right-up-line',
                        'library' => 'remixicon',
                    ],
                ]
            ); 

            $this->end_controls_section();

            /**
             * Footer Middle Content Controls
             */
            $this->start_controls_section(
                'footer_middle_content_section',
                [
                    'label' => __('Footer Middle Content', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            // Logo
            $this->add_control(
                'footer_logo',
                [
                    'label'   => __('Footer Logo', 'axero-toolkit'),
                    'type'    => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ]
            );

    
            // Newsletter
            $this->add_control(
                'footer_newsletter_title',
                [
                    'label'       => __('Newsletter Title', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => __('Follow the Newest Trends', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'footer_newsletter_form_shortcode',
                [
                    'label'       => __('Newsletter Form Shortcode', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'description' => __('Enter the newsletter form shortcode from your preferred plugin (e.g. Mailchimp, Contact Form 7)', 'axero-toolkit'),
                    'default'     => '',
                    'label_block' => true,
                ]
            );

            // Quick Links Repeater
            $this->add_control(
                'footer_quick_links_title',
                [
                    'label'       => __('Quick Links Title', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => __('Quick links', 'axero-toolkit'),
                ]
            );

            $this->add_control(
                'footer_quick_links',
                [
                    'label'       => __('Quick Links', 'axero-toolkit'),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => [
                        [
                            'name'        => 'label',
                            'label'       => __('Label', 'axero-toolkit'),
                            'type'        => Controls_Manager::TEXT,
                            'default'     => __('Home', 'axero-toolkit'),
                        ],
                        [
                            'name'        => 'url',
                            'label'       => __('URL', 'axero-toolkit'),
                            'type'        => Controls_Manager::URL,
                            'default'     => [
                                'url'         => '#',
                                'is_external' => false,
                            ],
                            'show_external' => true,
                        ],
                    ],
                    'default'     => [
                        [
                            'label' => __('Home', 'axero-toolkit'),
                            'url'   => ['url' => '#'],
                        ],
                        [
                            'label' => __('About Us', 'axero-toolkit'),
                            'url'   => ['url' => '#'],
                        ],
                        [
                            'label' => __('Blog', 'axero-toolkit'),
                            'url'   => ['url' => '#'],
                        ],
                        [
                            'label' => __('Services', 'axero-toolkit'),
                            'url'   => ['url' => '#'],
                        ],
                        [
                            'label' => __('Contact Us', 'axero-toolkit'),
                            'url'   => ['url' => '#
    '],
                        ],
                    ],
                    'title_field' => '{{{ label }}}',
                ]
            );

            // Utility Pages Repeater
            $this->add_control(
                'footer_utility_links_title',
                [
                    'label'       => __('Utility Pages Title', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => __('Utility Pages', 'axero-toolkit'),
                ]
            );

            $this->add_control(
                'footer_utility_links',
                [
                    'label'       => __('Utility Links', 'axero-toolkit'),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => [
                        [
                            'name'        => 'label',
                            'label'       => __('Label', 'axero-toolkit'),
                            'type'        => Controls_Manager::TEXT,
                            'default'     => __('Privacy Policy', 'axero-toolkit'),
                        ],
                        [
                            'name'        => 'url',
                            'label'       => __('URL', 'axero-toolkit'),
                            'type'        => Controls_Manager::URL,
                            'default'     => [
                                'url'         => '#',
                                'is_external' => false,
                            ],
                            'show_external' => true,
                        ],
                    ],
                    'default'     => [
                        [
                            'label' => __('Privacy Policy', 'axero-toolkit'),
                            'url'   => ['url' => '#
    '],
                        ],
                        [
                            'label' => __('Terms & Conditions', 'axero-toolkit'),
                            'url'   => ['url' => '#'],
                        ],
                        [
                            'label' => __('Cookie Policy', 'axero-toolkit'),
                            'url'   => ['url' => '#'],
                        ],
                        [
                            'label' => __('Refund Policy', 'axero-toolkit'),
                            'url'   => ['url' => '#'],
                        ],
                        [
                            'label' => __('Disclaimer', 'axero-toolkit'),
                            'url'   => ['url' => '#'],
                        ],
                    ],
                    'title_field' => '{{{ label }}}',
                ]
            );

            // Contact Info Repeater
            $this->add_control(
                'footer_contact_info_title',
                [
                    'label'       => __('Contact Info Title', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => __('Contact Info', 'axero-toolkit'),
                ]
            );

            $this->add_control(
                'footer_contact_info',
                [
                    'label'       => __('Contact Info', 'axero-toolkit'),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => [
                        [
                            'name'        => 'label',
                            'label'       => __('Label', 'axero-toolkit'),
                            'type'        => Controls_Manager::TEXT,
                            'default'     => __('+024(453)-5432', 'axero-toolkit'),
                        ],
                        [
                            'name'        => 'url',
                            'label'       => __('URL', 'axero-toolkit'),
                            'type'        => Controls_Manager::URL,
                            'default'     => [
                                'url'         => '#',
                                'is_external' => false,
                            ],
                            'show_external' => true,
                        ],
                    ],
                    'default'     => [
                        [
                            'label' => __('+024(453)-5432', 'axero-toolkit'),
                            'url'   => ['url' => 'tel:+024(453)-5432'],
                        ],
                        [
                            'label' => __('Reach Us', 'axero-toolkit'),
                            'url'   => ['url' => '#'],
                        ],
                        [
                            'label' => __('axero@example.com', 'axero-toolkit'),
                            'url'   => ['url' => 'mailto:axero@example.com'],
                        ],
                    ],
                    'title_field' => '{{{ label }}}',
                ]
            );

            $this->end_controls_section();

            /**
             * Footer Bottom Content Controls
             */
            $this->start_controls_section(
                'footer_bottom_content_section',
                [
                    'label' => __('Footer Bottom Content', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            // Social Icons
            $this->add_control(
                'footer_socials',
                [
                    'label'       => __('Social Icons', 'axero-toolkit'),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => [
                        [
                            'name'        => 'icon',
                            'label'       => __('Icon', 'axero-toolkit'),
                            'type'        => Controls_Manager::ICONS,
                            'default'     => [
                                'value'   => 'ri-twitter-x-line',
                                'library' => 'remixicon',
                            ],
                        ],
                        [
                            'name'        => 'url',
                            'label'       => __('URL', 'axero-toolkit'),
                            'type'        => Controls_Manager::URL,
                            'default'     => [
                                'url'         => '#',
                                'is_external' => true,
                            ],
                            'show_external' => true,
                        ],
                    ],
                    'default'     => [
                        [
                            'icon' => [
                                'value'   => 'ri-twitter-x-line',
                                'library' => 'remixicon',
                            ],
                            'url'  => ['url' => '#'],
                        ],
                        [
                            'icon' => [
                                'value'   => 'ri-facebook-fill',
                                'library' => 'remixicon',
                            ],
                            'url'  => ['url' => '#'],
                        ],
                        [
                            'icon' => [
                                'value'   => 'ri-linkedin-fill',
                                'library' => 'remixicon',
                            ],
                            'url'  => ['url' => '#'],
                        ],
                    ],
                    'title_field' => '<i class="{{ icon.value }}"></i>',
                ]
            );

            $this->add_control(
                'footer_copyright_text',
                [
                    'label'       => __('Copyright Text', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => __('© <span class="fw-semibold">axero</span>. All Rights Reserved.', 'axero-toolkit'),
                    'label_block' => true,
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
            // Footer Background Style Tab
            $this->start_controls_section(
                'footer_background_section',
                [
                    'label' => __('Footer Background', 'axero-toolkit'),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'     => 'footer_background',
                    'label'    => __('Background', 'axero-toolkit'),
                    'types'    => ['classic', 'gradient'],
                    'selector' => '{{WRAPPER}} .footer_area',
                ]
            );

            $this->end_controls_section();

            // Footer Top Style Tab
            $this->start_controls_section(
                'footer_top_style_section',
                [
                    'label' => __('Footer Top', 'axero-toolkit'),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

            // Footer Title Color & Typography
            $this->add_control(
                'footer_top_title_color',
                [
                    'label'     => __('Title Color', 'axero-toolkit'),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .footer_content h2' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'footer_top_title_typography',
                    'selector' => '{{WRAPPER}} .footer_content h2',
                ]
            );

            // Footer Button Colors & Typography
            $this->add_control(
                'footer_button_color',
                [
                    'label'     => __('Button Text Color', 'axero-toolkit'),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn.primary_btn' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'footer_button_bg_color',
                [
                    'label'     => __('Button Background Color', 'axero-toolkit'),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn.primary_btn' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'footer_button_hover_color',
                [
                    'label'     => __('Button Hover Text Color', 'axero-toolkit'),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .primary_btn:hover, {{WRAPPER}} .primary_btn:focus, {{WRAPPER}} .primary_btn:active' => 'color: {{VALUE}} !important;',
                    ],
                ]
            );

            $this->add_control(
                'footer_button_hover_bg_color',
                [
                    'label'     => __('Button Hover Background Color', 'axero-toolkit'),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .primary_btn:hover, {{WRAPPER}} .primary_btn:focus, {{WRAPPER}} .primary_btn:active' => 'background-color: {{VALUE}} !important;',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'footer_button_typography',
                    'selector' => '{{WRAPPER}} .btn.primary_btn',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name'     => 'footer_button_border',
                    'selector' => '{{WRAPPER}} .btn.primary_btn',
                ]
            );

            $this->end_controls_section();

            // Footer Middle Style Tab
            $this->start_controls_section(
                'footer_middle_style_section',
                [
                    'label' => __('Footer Middle', 'axero-toolkit'),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

            // Footer Middle Background Color
            $this->add_control(
                'footer_middle_bg_color',
                [
                    'label'     => __('Background Color', 'axero-toolkit'),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .footer_inner_box' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            // Newsletter Title Color & Typography
            $this->add_control(
                'footer_newsletter_title_color',
                [
                    'label'     => __('Newsletter Title Color', 'axero-toolkit'),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .footer_inner_box .footer_logo_widget .newsletter_box h4' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'footer_newsletter_title_typography',
                    'selector' => '{{WRAPPER}} .footer_inner_box .footer_logo_widget .newsletter_box h4',
                ]
            );

            // Custom Link Header Color & Typography
            $this->add_control(
                'footer_custom_link_header_color',
                [
                    'label'     => __('Custom Link Header Color', 'axero-toolkit'),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .footer_inner_box .footer_widgets_list .footer_widget h3' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'footer_custom_link_header_typography',
                    'selector' => '{{WRAPPER}} .footer_inner_box .footer_widgets_list .footer_widget h3',
                ]
            );

            // Custom Link Color, Hover Color & Typography
            $this->add_control(
                'footer_custom_link_color',
                [
                    'label'     => __('Custom Link Color', 'axero-toolkit'),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .footer_inner_box .footer_widgets_list .footer_widget .links li a' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'footer_custom_link_hover_color',
                [
                    'label'     => __('Custom Link Hover Color', 'axero-toolkit'),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .footer_inner_box .footer_widgets_list .footer_widget .links li a:hover, {{WRAPPER}} .footer_inner_box .footer_widgets_list .footer_widget .links li a:focus' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'footer_custom_link_typography',
                    'selector' => '{{WRAPPER}} .footer_inner_box .footer_widgets_list .footer_widget .links li a',
                ]
            );

            $this->end_controls_section();

            // Footer Bottom Style Tab
            $this->start_controls_section(
                'footer_bottom_style_section',
                [
                    'label' => __('Footer Bottom', 'axero-toolkit'),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

            // Social Icon Color, Hover Color, Size
            $this->add_control(
                'footer_social_icon_color',
                [
                    'label'     => __('Social Icon Color', 'axero-toolkit'),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .copyright_footer .socials a i, {{WRAPPER}} .copyright_footer .socials a svg' => 'color: {{VALUE}}; fill: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'footer_social_icon_hover_color',
                [
                    'label'     => __('Social Icon Hover Color', 'axero-toolkit'),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .copyright_footer .socials a:hover i, {{WRAPPER}} .copyright_footer .socials a:focus i, {{WRAPPER}} .copyright_footer .socials a:active i, {{WRAPPER}} .copyright_footer .socials a:hover svg, {{WRAPPER}} .copyright_footer .socials a:focus svg, {{WRAPPER}} .copyright_footer .socials a:active svg' => 'color: {{VALUE}} !important; fill: {{VALUE}} !important;',
                    ],
                ]
            );

            $this->add_responsive_control(
                'footer_social_icon_size',
                [
                    'label'      => __('Social Icon Size', 'axero-toolkit'),
                    'type'       => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range'      => [
                        'px' => [
                            'min' => 10,
                            'max' => 100,
                            'step' => 1,
                        ],
                    ],
                    'default'    => [
                        'unit' => 'px',
                        'size' => 30,
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} .copyright_footer .socials a i, {{WRAPPER}} .copyright_footer .socials a svg' => 'font-size: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            // Copyright Text Color & Typography
            $this->add_control(
                'footer_copyright_text_color',
                [
                    'label'     => __('Copyright Text Color', 'axero-toolkit'),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .copyright_footer p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'footer_copyright_text_typography',
                    'selector' => '{{WRAPPER}} .copyright_footer p',
                ]
            );
            $this->end_controls_section();
        }

        protected function render()
        {
          $settings = $this->get_settings_for_display(); ?>
            <footer class="footer_area">
                <div class="white_top_rectangle"></div>
                <div class="container pt_150">

                    <div class="footer_content">
                            <?php if ( ! empty( $settings['footer_top_title_1'] ) ) : ?>
                            <h2 class="text_animation fw-bold">
                                <?php echo wp_kses_post( $settings['footer_top_title_1'] ); ?>
                            </h2>
                            <?php endif; ?>

                            <?php if ( ! empty( $settings['footer_top_title_2'] ) ) : ?>
                            <h2 class=" text_animation fw-bold">
                                <?php echo wp_kses_post( $settings['footer_top_title_2'] ); ?>
                            </h2>

                            <?php endif; ?>
                        <?php if (!empty($settings['footer_top_button_text']) && !empty($settings['footer_top_button_url']['url'])) : ?>
                            <a href="<?php echo esc_url($settings['footer_top_button_url']['url']); ?>"
                                class="btn primary_btn"
                                data-cue="slideInUp"
                                <?php if (!empty($settings['footer_top_button_url']['is_external'])) : ?>target="_blank"<?php endif; ?>
                                <?php if (!empty($settings['footer_top_button_url']['nofollow'])) : ?>rel="nofollow"<?php endif; ?>>
                                <span class="d-inline-block position-relative">
                                    <?php echo wp_kses_post($settings['footer_top_button_text']); ?>
                                    <?php if (!empty($settings['footer_top_button_icon']['value'])) : ?>
                                        <?php \Elementor\Icons_Manager::render_icon($settings['footer_top_button_icon'], ['aria-hidden' => 'true']); ?>
                                    <?php endif; ?>
                                </span>
                            </a>
                        <?php endif; ?>
                    </div>

                    <div class="pt_150"></div>
                    <div class="footer_inner_box" data-cue="slideInUp">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="footer_logo_widget">
                                    <?php if (!empty($settings['footer_logo']['url'])) : ?>
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="d-inline-block">
                                            <img src="<?php echo esc_url($settings['footer_logo']['url']); ?>" alt="<?php esc_attr_e('logo', 'axero-toolkit'); ?>">
                                        </a>
                                    <?php endif; ?>
                                    <div class="newsletter_box">
                                        <?php if ( ! empty( $settings['footer_newsletter_title'] ) ) : ?>
                                            <h4 class="fw-semibold ">
                                                <?php echo wp_kses_post( $settings['footer_newsletter_title'] ); ?>
                                            </h4>
                                        <?php endif; ?>
                                        <?php if (!empty($settings['footer_newsletter_form_shortcode'])) : ?>
                                            
                                                <?php echo do_shortcode($settings['footer_newsletter_form_shortcode']); ?>
                                            
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="footer_widgets_list">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="footer_widget">
                                                <h3 class="fw-semibold">
                                                    <?php echo wp_kses_post($settings['footer_quick_links_title']); ?>
                                                </h3>
                                                <ul class="links p-0 mb-0 list-unstyled">
                                                    <?php if (!empty($settings['footer_quick_links'])) :
                                                        foreach ($settings['footer_quick_links'] as $link) :
                                                            if (empty($link['url']['url'])) continue; ?>
                                                            <li>
                                                                <a href="<?php echo esc_url($link['url']['url']); ?>"
                                                                    <?php if (!empty($link['url']['is_external'])) : ?>target="_blank"<?php endif; ?>
                                                                    <?php if (!empty($link['url']['nofollow'])) : ?>rel="nofollow"<?php endif; ?>>
                                                                    <?php echo wp_kses_post($link['label']); ?>
                                                                </a>
                                                            </li>
                                                        <?php endforeach;
                                                    endif; ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="footer_widget">
                                                <?php if ( ! empty( $settings['footer_utility_links_title'] ) ) : ?>
                                                    <h3 class="fw-semibold">
                                                        <?php echo wp_kses_post( $settings['footer_utility_links_title'] ); ?>
                                                    </h3>
                                                <?php endif; ?>
                                                <ul class="links p-0 mb-0 list-unstyled">
                                                    <?php if (!empty($settings['footer_utility_links'])) :
                                                        foreach ($settings['footer_utility_links'] as $link) :
                                                            if (empty($link['url']['url'])) continue; ?>
                                                            <li>
                                                                <a href="<?php echo esc_url($link['url']['url']); ?>"
                                                                    <?php if (!empty($link['url']['is_external'])) : ?>target="_blank"<?php endif; ?>
                                                                    <?php if (!empty($link['url']['nofollow'])) : ?>rel="nofollow"<?php endif; ?>>
                                                                    <?php echo wp_kses_post($link['label']); ?>
                                                                </a>
                                                            </li>
                                                        <?php endforeach;
                                                    endif; ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="footer_widget">
                                                <?php if ( ! empty( $settings['footer_contact_info_title'] ) ) : ?>
                                                    <h3 class="fw-semibold">
                                                        <?php echo wp_kses_post( $settings['footer_contact_info_title'] ); ?>
                                                    </h3>
                                                <?php endif; ?>
                                                <ul class="links p-0 mb-0 list-unstyled">
                                                    <?php if (!empty($settings['footer_contact_info'])) :
                                                        foreach ($settings['footer_contact_info'] as $link) :
                                                            if (empty($link['url']['url'])) continue; ?>
                                                            <li>
                                                                <a href="<?php echo esc_url($link['url']['url']); ?>"
                                                                    <?php if (!empty($link['url']['is_external'])) : ?>target="_blank"<?php endif; ?>
                                                                    <?php if (!empty($link['url']['nofollow'])) : ?>rel="nofollow"<?php endif; ?>>
                                                                    <?php echo wp_kses_post($link['label']); ?>
                                                                </a>
                                                            </li>
                                                        <?php endforeach;
                                                    endif; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="copyright_footer">
                        <div class="row align-items-center">
                            <div class="col-md-5">
                                <div class="socials d-flex align-items-center">
                                    <?php if (!empty($settings['footer_socials'])) :
                                        foreach ($settings['footer_socials'] as $social) :
                                            if (empty($social['url']['url'])) continue; ?>
                                            <a href="<?php echo esc_url($social['url']['url']); ?>"
                                                class="d-block"
                                                <?php if (!empty($social['url']['is_external'])) : ?>target="_blank"<?php endif; ?>
                                                <?php if (!empty($social['url']['nofollow'])) : ?>rel="nofollow"<?php endif; ?>>
                                                <?php if (!empty($social['icon']['value'])) :
                                                    \Elementor\Icons_Manager::render_icon($social['icon'], ['aria-hidden' => 'true']);
                                                endif; ?>
                                            </a>
                                        <?php endforeach;
                                    endif; ?>
                                </div>
                            </div>
                            <div class="col-md-7 text-md-end">
                                <?php if ( ! empty( $settings['footer_copyright_text'] ) ) : ?>
                                    <p class="text-uppercase">
                                        <?php echo wp_kses_post( $settings['footer_copyright_text'] ); ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
          <?php
        }
    }
 $widgets_manager->register(new axero_footer_2());
