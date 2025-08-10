<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_footer_3 extends Widget_Base
    {

        public function get_name()
        {
            return 'axero-footer-3';
        }

        public function get_title()
        {
            return __(' Footer 3', 'axero-toolkit');
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
             * Footer Top Content Tab
             */
            $this->start_controls_section(
                'footer_top_content_section',
                [
                    'label' => __('Footer Top', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'footer_top_quick_links_heading',
                [
                    'label' => __('Quick Links Heading', 'axero-toolkit'),
                    'type'  => Controls_Manager::TEXT,
                    'default' => __('Quick links', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'footer_top_quick_links',
                [
                    'label' => __('Quick Links', 'axero-toolkit'),
                    'type'  => Controls_Manager::REPEATER,
                    'fields' => [
                        [
                            'name'        => 'text',
                            'label'       => __('Link Text', 'axero-toolkit'),
                            'type'        => Controls_Manager::TEXT,
                            'default'     => __('Home', 'axero-toolkit'),
                            'label_block' => true,
                        ],
                        [
                            'name'        => 'url',
                            'label'       => __('Link URL', 'axero-toolkit'),
                            'type'        => Controls_Manager::URL,
                            'default'     => [
                                'url' => '#',
                            ],
                            'label_block' => true,
                        ],
                    ],
                    'default' => [
                        [
                            'text' => __('Home', 'axero-toolkit'),
                            'url'  => ['url' => '#'],
                        ],
                        [
                            'text' => __('About Us', 'axero-toolkit'),
                            'url'  => ['url' => '#'],
                        ],
                        [
                            'text' => __('Blog', 'axero-toolkit'),
                            'url'  => ['url' => '#'],
                        ],
                        [
                            'text' => __('Services', 'axero-toolkit'),
                            'url'  => ['url' => '#'],
                        ],
                        [
                            'text' => __('Contact Us', 'axero-toolkit'),
                            'url'  => ['url' => '#'],
                        ],
                    ],
                    'title_field' => '{{{ text }}}',
                ]
            );

            $this->add_control(
                'footer_top_utility_links_heading',
                [
                    'label' => __('Utility Pages Heading', 'axero-toolkit'),
                    'type'  => Controls_Manager::TEXT,
                    'default' => __('Utility Pages', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'footer_top_utility_links',
                [
                    'label' => __('Utility Links', 'axero-toolkit'),
                    'type'  => Controls_Manager::REPEATER,
                    'fields' => [
                        [
                            'name'        => 'text',
                            'label'       => __('Link Text', 'axero-toolkit'),
                            'type'        => Controls_Manager::TEXT,
                            'default'     => __('Privacy Policy', 'axero-toolkit'),
                            'label_block' => true,
                        ],
                        [
                            'name'        => 'url',
                            'label'       => __('Link URL', 'axero-toolkit'),
                            'type'        => Controls_Manager::URL,
                            'default'     => [
                                'url' => '#',
                            ],
                            'label_block' => true,
                        ],
                    ],
                    'default' => [
                        [
                            'text' => __('Privacy Policy', 'axero-toolkit'),
                            'url'  => ['url' => '#'],
                        ],
                        [
                            'text' => __('Terms & Conditions', 'axero-toolkit'),
                            'url'  => ['url' => '#'],
                        ],
                        [
                            'text' => __('Cookie Policy', 'axero-toolkit'),
                            'url'  => ['url' => '#'],
                        ],
                        [
                            'text' => __('Refund Policy', 'axero-toolkit'),
                            'url'  => ['url' => '#'],
                        ],
                        [
                            'text' => __('Disclaimer', 'axero-toolkit'),
                            'url'  => ['url' => '#'],
                        ],
                    ],
                    'title_field' => '{{{ text }}}',
                ]
            );

            $this->end_controls_section();

            /**
             * Footer Middle Content Tab
             */
            $this->start_controls_section(
                'footer_middle_content_section',
                [
                    'label' => __('Footer Middle', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'footer_middle_newsletter_heading',
                [
                    'label' => __('Newsletter Heading', 'axero-toolkit'),
                    'type'  => Controls_Manager::TEXT,
                    'default' => __('We’d Love to Hear from You', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'footer_middle_newsletter_shortcode',
                [
                    'label' => __('Newsletter Form Shortcode', 'axero-toolkit'),
                    'type' => Controls_Manager::TEXT,
                    'description' => __('Enter the newsletter form shortcode from your preferred plugin (e.g. Mailchimp, Contact Form 7b    )', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            
            $this->add_control(
                'footer_middle_newsletter_description',
                [
                    'label' => __('Newsletter Description', 'axero-toolkit'),
                    'type'  => Controls_Manager::TEXTAREA,
                    'default' => __('Reach out and let’s craft something remarkable together.', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->end_controls_section();

            /**
             * Footer Bottom Content Tab
             */
            $this->start_controls_section(
                'footer_bottom_content_section',
                [
                    'label' => __('Footer Bottom', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'footer_bottom_socials',
                [
                    'label' => __('Footer Socials', 'axero-toolkit'),
                    'type'  => Controls_Manager::REPEATER,
                    'fields' => [
                        [
                            'name'        => 'text',
                            'label'       => __('Social Name', 'axero-toolkit'),
                            'type'        => Controls_Manager::TEXT,
                            'default'     => __('Instagram', 'axero-toolkit'),
                            'label_block' => true,
                        ],
                        [
                            'name'        => 'url',
                            'label'       => __('Social URL', 'axero-toolkit'),
                            'type'        => Controls_Manager::URL,
                            'default'     => [
                                'url' => '#',
                            ],
                            'label_block' => true,
                        ],
                        [
                            'name'        => 'icon',
                            'label'       => __('Icon', 'axero-toolkit'),
                            'type'        => Controls_Manager::ICONS,
                            'default'     => [
                                'value'   => 'ri-arrow-right-up-line',
                                'library' => 'remixicon',
                            ],
                        ],
                    ],
                    'default' => [
                        [
                            'text' => __('Instagram', 'axero-toolkit'),
                            'url'  => ['url' => '#'],
                            'icon' => [
                                'value'   => 'ri-arrow-right-up-line',
                                'library' => 'remixicon',
                            ],
                        ],
                        [
                            'text' => __('Facebook', 'axero-toolkit'),
                            'url'  => ['url' => '#'],
                            'icon' => [
                                'value'   => 'ri-arrow-right-up-line',
                                'library' => 'remixicon',
                            ],
                        ],
                        [
                            'text' => __('Twitter', 'axero-toolkit'),
                            'url'  => ['url' => '#'],
                            'icon' => [
                                'value'   => 'ri-arrow-right-up-line',
                                'library' => 'remixicon',
                            ],
                        ],
                        [
                            'text' => __('YouTube', 'axero-toolkit'),
                            'url'  => ['url' => '#'],
                            'icon' => [
                                'value'   => 'ri-arrow-right-up-line',
                                'library' => 'remixicon',
                            ],
                        ],
                    ],
                    'title_field' => '{{{ text }}}',
                ]
            );

            $this->add_control(
                'footer_bottom_logo_text',
                [
                    'label' => __('Footer Logo Text', 'axero-toolkit'),
                    'type'  => Controls_Manager::TEXT,
                    'default' => __('Axero.', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'footer_bottom_copyright',
                [
                    'label' => __('Copyright Text', 'axero-toolkit'),
                    'type'  => Controls_Manager::TEXTAREA,
                    'default' => __('© Copyright', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'footer_bottom_designed_by',
                [
                    'label' => __('Designed By Text', 'axero-toolkit'),
                    'type'  => Controls_Manager::TEXT,
                    'default' => __('Designed by <span class="fw-bold">Axero</span>', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'footer_bottom_powered_by',
                [
                    'label' => __('Powered By Text', 'axero-toolkit'),
                    'type'  => Controls_Manager::TEXT,
                    'default' => __('Powered by <strong>Axero</strong>', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'footer_bottom_shape_image',
                [
                    'label' => __('Shape Image', 'axero-toolkit'),
                    'type'  => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => get_template_directory_uri() . '/assets/images/objects/blur.png',
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
            // Footer Top Style Tab
            $this->start_controls_section(
                'footer_top_style_section',
                [
                    'label' => __('Footer Top', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_STYLE,
                ]
            );

            // Link Header Color & Typography (.footer_two_widget h3)
            $this->add_control(
                'footer_top_link_header_color',
                [
                    'label'     => __('Link Header Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .footer_two_widget h3' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'footer_top_link_header_typography',
                    'selector' => '{{WRAPPER}} .footer_two_widget h3',
                ]
            );

            // Link Color, Hover Color & Typography (.footer_two_widget .links li a)
            $this->add_control(
                'footer_top_link_color',
                [
                    'label'     => __('Link Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .footer_two_widget .links li a' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'footer_top_link_hover_color',
                [
                    'label'     => __('Link Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .footer_two_widget .links li a:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'footer_top_link_typography',
                    'selector' => '{{WRAPPER}} .footer_two_widget .links li a',
                ]
            );

            // Form Header Color & Typography (.footer_newsletter_box h3)
            $this->add_control(
                'footer_top_form_header_color',
                [
                    'label'     => __('Form Header Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .footer_newsletter_box h3' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'footer_top_form_header_typography',
                    'selector' => '{{WRAPPER}} .footer_newsletter_box h3',
                ]
            );

            // Form Description Color & Typography  
            $this->add_control(
                'footer_top_form_desc_color',
                [
                    'label'     => __('Form Description Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .footer_newsletter_box p' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'footer_top_form_desc_typography',
                    'selector' => '{{WRAPPER}} .footer_newsletter_box p',
                ]
            );

            $this->end_controls_section();

            // Footer Middle Style Tab
            $this->start_controls_section(
                'footer_middle_style_section',
                [
                    'label' => __('Footer Middle', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_STYLE,
                ]
            );

            // Social Item Color, Hover Color, Typography, Background, Hover BG, Border  
            $this->add_control(
                'footer_middle_social_color',
                [
                    'label'     => __('Social Icon Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .footer_socials li a' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'footer_middle_social_hover_color',
                [
                    'label'     => __('Social Icon Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .footer_socials li a:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'footer_middle_social_typography',
                    'selector' => '{{WRAPPER}} .footer_socials li a, {{WRAPPER}} .footer_socials li a:hover',
                ]
            );
            $this->add_control(
                'footer_middle_social_bg_color',
                [
                    'label'     => __('Social Icon Background', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .footer_socials li a' => 'background-color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'footer_middle_social_hover_bg_color',
                [
                    'label'     => __('Social Icon Hover Background', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .footer_socials li a:hover' => 'background-color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name'     => 'footer_middle_social_border',
                    'selector' => '{{WRAPPER}} .footer_socials li a, {{WRAPPER}} .footer_socials li a:hover',
                ]
            );

            $this->end_controls_section();

            // Footer Bottom Style Tab
            $this->start_controls_section(
                'footer_bottom_style_section',
                [
                    'label' => __('Footer Bottom', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_STYLE,
                ]
            );

            // Footer Text Color & Typography 
            $this->add_control(
                'footer_bottom_text_color',
                [
                    'label'     => __('Footer Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .footer_logo_text' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'footer_bottom_text_typography',
                    'selector' => '{{WRAPPER}} .footer_logo_text',
                ]
            );

            // Copyright Text Color & Typography  
            $this->add_control(
                'footer_bottom_copyright_color',
                [
                    'label'     => __('Copyright Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .copyright_area_two ul li' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'footer_bottom_copyright_typography',
                    'selector' => '{{WRAPPER}} .copyright_area_two ul li',
                ]
            );

            $this->end_controls_section();
        }

        protected function render()
        {
          $settings = $this->get_settings_for_display(); ?>
             <footer class="footer_area_two pt_150 position-relative z-1">
                <div class="container-fluid max_w_1560px">
                    <div class="row" data-cues="slideInUp" data-group="footer_list">
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="footer_two_widget">
                                        <?php if(!empty( $settings['footer_top_quick_links_heading'])):?>
                                            <h3> <?php echo wp_kses_post( $settings['footer_top_quick_links_heading'] ); ?></h3>
                                        <?php endif; ?>
                                        <ul class="links p-0 mb-0 list-unstyled">
                                            <?php if ( ! empty( $settings['footer_top_quick_links'] ) ) : ?>
                                                <?php foreach ( $settings['footer_top_quick_links'] as $link ) : ?>
                                                    <li>
                                                        <a href="<?php echo esc_url( $link['url']['url'] ); ?>">
                                                            <?php echo esc_html( $link['text'] ); ?>
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                         
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="footer_two_widget">
                                        <h3>
                                            <?php echo esc_html( $settings['footer_top_utility_links_heading'] ); ?>
                                        </h3>
                                        <ul class="links p-0 mb-0 list-unstyled">
                                            <?php if ( ! empty( $settings['footer_top_utility_links'] ) ) : ?>
                                                <?php foreach ( $settings['footer_top_utility_links'] as $link ) : ?>
                                                    <li>
                                                        <a href="<?php echo esc_url( $link['url']['url'] ?? '#' ); ?>">
                                                            <?php echo esc_html( $link['text'] ); ?>
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="footer_newsletter_box">
                                <?php if(!empty( $settings['footer_middle_newsletter_heading'])):?>
                                    <h3>
                                        <?php echo wp_kses_post( $settings['footer_middle_newsletter_heading'] ); ?>
                                    </h3>
                                <?php endif; ?>
                                <?php if(!empty($settings['footer_middle_newsletter_shortcode'])): ?>
                                     
                                        <?php echo do_shortcode(wp_kses_post($settings['footer_middle_newsletter_shortcode'])); ?>
                                    
                                <?php endif; ?>
                                <?php if(!empty( $settings['footer_middle_newsletter_description'])):?> <p> <?php echo wp_kses_post( $settings['footer_middle_newsletter_description'] );?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <ul class="footer_socials row p-0 mx-0 mb-0 list-unstyled">
                        <?php if ( ! empty( $settings['footer_bottom_socials'] ) ) : ?>
                            <?php foreach ( $settings['footer_bottom_socials'] as $social ) : ?>
                                <li class="col-md-3 px-0">
                                    <a href="<?php echo esc_url( $social['url']['url'] ?? '#' ); ?>" target="_blank" class="d-flex align-items-center justify-content-between text-uppercase fw-medium">
                                        <?php echo wp_kses_post( $social['text'] ); ?>
                                        <?php
                                        if ( ! empty( $social['icon']['value'] ) ) {
                                            $icon_class = esc_attr( $social['icon']['value'] );
                                            echo '<i class="' . $icon_class . '"></i>';
                                        }
                                        ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                    <div class="footer_logo_text lh-1 fw-black text_animation">
                        <?php echo wp_kses_post( $settings['footer_bottom_logo_text'] ); ?>
                    </div>
                    <div class="copyright_area_two text-center">
                        <ul class="p-0 mb-0 list-unstyled">
                            <li class="d-inline-block position-relative">
                                <?php
                                if ( ! empty( $settings['footer_bottom_copyright'] ) ) {
                                    echo wp_kses_post( $settings['footer_bottom_copyright'] );
                                }
                                ?>
                            </li>
                            <li class="d-inline-block position-relative">
                                <?php echo wp_kses_post( $settings['footer_bottom_designed_by'] ); ?>
                            </li>
                            <li class="d-inline-block position-relative">
                                <?php echo wp_kses_post( $settings['footer_bottom_powered_by'] ); ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php if ( ! empty( $settings['footer_bottom_shape_image']['url'] ) ) : ?>
                    <img src="<?php echo esc_url( $settings['footer_bottom_shape_image']['url'] ); ?>" class="shape" alt="<?php esc_attr_e( 'blur', 'axero-toolkit' ); ?>">
                <?php endif; ?>
                <div class="border_lines">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                </div>
             </footer>
          <?php
        }
    }
 $widgets_manager->register(new axero_footer_3());
