<?php
    namespace footer04_axero_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_footer_4 extends Widget_Base
    {

        public function get_name()
        {
            return 'axero-footer-4';
        }

        public function get_title()
        {
            return __(' Footer 4', 'axero-toolkit');
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
            // Footer Top Controls Section)
            $this->start_controls_section(
                'footer_top_content_section',
                [
                    'label' => __('Footer Top', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'footer_top_logo',
                [
                    'label' => __('Logo', 'axero-toolkit'),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ]
            );

            $this->add_control(
                'footer_top_description',
                [
                    'label' => __('Description', 'axero-toolkit'),
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => __('Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudanti mtota rem aperiam, eaque ipsa quae ab illo inve ntore veritatis et quasi architec to.', 'axero-toolkit'),
                ]
            );

            $this->add_control(
                'footer_top_quick_links_heading',
                [
                    'label' => __('Quick Links Heading', 'axero-toolkit'),
                    'type' => Controls_Manager::TEXT,
                    'default' => __('Quick links', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'footer_top_quick_links',
                [
                    'label' => __('Quick Links', 'axero-toolkit'),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => [
                        [
                            'name' => 'text',
                            'label' => __('Link Text', 'axero-toolkit'),
                            'type' => Controls_Manager::TEXT,
                            'default' => __('Home', 'axero-toolkit'),
                        ],
                        [
                            'name' => 'url',
                            'label' => __('URL', 'axero-toolkit'),
                            'type' => Controls_Manager::URL,
                            'default' => [
                                'url' => '#',
                            ],
                        ],
                    ],
                    'default' => [
                        [
                            'text' => __('Home', 'axero-toolkit'),
                            'url' => ['url' => '#'],
                        ],
                        [
                            'text' => __('About Us', 'axero-toolkit'),
                            'url' => ['url' => '#'],
                        ],
                        [
                            'text' => __('Blog', 'axero-toolkit'),
                            'url' => ['url' => '#'],
                        ],
                        [
                            'text' => __('Services', 'axero-toolkit'),
                            'url' => ['url' => '#'],
                        ],
                        [
                            'text' => __('Contact Us', 'axero-toolkit'),
                            'url' => ['url' => '#'],
                        ],
                    ],
                    'title_field' => '{{{ text }}}',
                ]
            );

            $this->add_control(
                'footer_top_utility_heading',
                [
                    'label' => __('Utility Pages Heading', 'axero-toolkit'),
                    'type' => Controls_Manager::TEXT,
                    'default' => __('Utility Pages', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'footer_top_utility_links',
                [
                    'label' => __('Utility Links', 'axero-toolkit'),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => [
                        [
                            'name' => 'text',
                            'label' => __('Link Text', 'axero-toolkit'),
                            'type' => Controls_Manager::TEXT,
                            'default' => __('Privacy Policy', 'axero-toolkit'),
                        ],
                        [
                            'name' => 'url',
                            'label' => __('URL', 'axero-toolkit'),
                            'type' => Controls_Manager::URL,
                            'default' => [
                                'url' => '#',
                            ],
                        ],
                    ],
                    'default' => [
                        [
                            'text' => __('Privacy Policy', 'axero-toolkit'),
                            'url' => ['url' => '#'],
                        ],
                        [
                            'text' => __('Terms & Conditions', 'axero-toolkit'),
                            'url' => ['url' => '#'],
                        ],
                        [
                            'text' => __('Cookie Policy', 'axero-toolkit'),
                            'url' => ['url' => '#'],
                        ],
                        [
                            'text' => __('Refund Policy', 'axero-toolkit'),
                            'url' => ['url' => '#'],
                        ],
                        [
                            'text' => __('Disclaimer', 'axero-toolkit'),
                            'url' => ['url' => '#'],
                        ],
                    ],
                    'title_field' => '{{{ text }}}',
                ]
            );

            $this->add_control(
                'footer_top_contact_heading',
                [
                    'label' => __('Contact Info Heading', 'axero-toolkit'),
                    'type' => Controls_Manager::TEXT,
                    'default' => __('Contact Info', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'footer_top_contact_links',
                [
                    'label' => __('Contact Info', 'axero-toolkit'),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => [
                        [
                            'name' => 'text',
                            'label' => __('Contact Text', 'axero-toolkit'),
                            'type' => Controls_Manager::TEXT,
                            'default' => __('+024(453)-5432', 'axero-toolkit'),
                        ],
                        [
                            'name' => 'url',
                            'label' => __('URL', 'axero-toolkit'),
                            'type' => Controls_Manager::URL,
                            'default' => [
                                'url' => 'tel:+024(453)-5432',
                            ],
                        ],
                    ],
                    'default' => [
                        [
                            'text' => __('+024(453)-5432', 'axero-toolkit'),
                            'url' => ['url' => 'tel:+024(453)-5432'],
                        ],
                        [
                            'text' => __('Reach Us', 'axero-toolkit'),
                            'url' => ['url' => '#'],
                        ],
                        [
                            'text' => __('axero@example.com', 'axero-toolkit'),
                            'url' => ['url' => 'mailto:axero@example.com'],
                        ],
                    ],
                    'title_field' => '{{{ text }}}',
                ]
            );
            $this->end_controls_section();

            // Footer Middle Controls Section
            $this->start_controls_section(
                'footer_middle_content_section',
                [
                    'label' => __('Footer Middle', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'footer_middle_socials_heading',
                [
                    'label' => __('Socials Heading', 'axero-toolkit'),
                    'type' => Controls_Manager::TEXT,
                    'default' => __('Follow Us', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'footer_middle_socials',
                [
                    'label' => __('Social Links', 'axero-toolkit'),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => [
                        [
                            'name' => 'title',
                            'label' => __('Social Name', 'axero-toolkit'),
                            'type' => Controls_Manager::TEXT,
                            'default' => __('Instagram', 'axero-toolkit'),
                        ],
                        [
                            'name' => 'url',
                            'label' => __('URL', 'axero-toolkit'),
                            'type' => Controls_Manager::URL,
                            'default' => [
                                'url' => '#',
                            ],
                        ],
                        [
                            'name' => 'icon',
                            'label' => __('Icon', 'axero-toolkit'),
                            'type' => Controls_Manager::ICON,
                            'default' => 'ti ti-arrow-up-right',
                        ],
                    ],
                    'default' => [
                        [
                            'title' => __('Instagram', 'axero-toolkit'),
                            'url' => ['url' => '#'],
                            'icon' => 'ti ti-arrow-up-right',
                        ],
                        [
                            'title' => __('Facebook', 'axero-toolkit'),
                            'url' => ['url' => '#'],
                            'icon' => 'ti ti-arrow-up-right',
                        ],
                        [
                            'title' => __('Twitter', 'axero-toolkit'),
                            'url' => ['url' => '#'],
                            'icon' => 'ti ti-arrow-up-right',
                        ],
                        [
                            'title' => __('YouTube', 'axero-toolkit'),
                            'url' => ['url' => '#'],
                            'icon' => 'ti ti-arrow-up-right',
                        ],
                    ],
                    'title_field' => '{{{ title }}}',
                ]
            );
            $this->end_controls_section();

            // Footer Bottom Controls Section
            $this->start_controls_section(
                'footer_bottom_content_section',
                [
                    'label' => __('Footer Bottom', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'footer_bottom_logo_text',
                [
                    'label'       => __('Footer Logo Text', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => __('Axero.', 'axero-toolkit'),
                    'placeholder' => __('Enter footer logo text', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'footer_bottom_copyright',
                [
                    'label'       => __('Copyright Text', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => __('© Copyright', 'axero-toolkit'),
                    'placeholder' => __('Enter copyright text', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'footer_bottom_year',
                [
                    'label'       => __('Show Current Year', 'axero-toolkit'),
                    'type'        => Controls_Manager::SWITCHER,
                    'label_on'    => __('Show', 'axero-toolkit'),
                    'label_off'   => __('Hide', 'axero-toolkit'),
                    'return_value'=> 'yes',
                    'default'     => 'yes',
                ]
            );

            $this->add_control(
                'footer_bottom_designed_by',
                [
                    'label'       => __('Designed By Text', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => __(' Designed by <span class="fw-bold">Axero</span>', 'axero-toolkit'),
                    'placeholder' => __('Enter designed by text', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'footer_bottom_powered_by',
                [
                    'label'       => __('Powered By Text', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => __('Powered by <strong class="text-white">Axero</strong>', 'axero-toolkit'),
                    'placeholder' => __('Enter powered by text', 'axero-toolkit'),
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
            // Footer Top Style Tab
            $this->start_controls_section(
                'footer_top_style_section',
                [
                    'label' => __('Footer Top', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_STYLE,
                ]
            );

            // Footer Top Description Color & Typography
            $this->add_control(
                'footer_top_desc_color',
                [
                    'label'     => __('Description Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .footer_inner_box .footer_logo_widget p' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'footer_top_desc_typography',
                    'selector' => '{{WRAPPER}} .footer_inner_box .footer_logo_widget p',
                ]
            );

            // Custom Link Header Color & Typography
            $this->add_control(
                'footer_top_link_header_color',
                [
                    'label'     => __('Link Header Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .footer_inner_box .footer_widgets_list .footer_widget h3' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'footer_top_link_header_typography',
                    'selector' => '{{WRAPPER}} .footer_inner_box .footer_widgets_list .footer_widget h3',
                ]
            );

            // Custom Link Text Color, Hover Color, Typography
            $this->add_control(
                'footer_top_link_text_color',
                [
                    'label'     => __('Link Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .footer_inner_box.style_two .footer_widgets_list .footer_widget .links li a' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'footer_top_link_text_hover_color',
                [
                    'label'     => __('Link Text Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .footer_inner_box.style_two .footer_widgets_list .footer_widget .links li a:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'footer_top_link_text_typography',
                    'selector' => '{{WRAPPER}} .footer_inner_box.style_two .footer_widgets_list .footer_widget .links li a',
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
                    <div class="footer_inner_box style_two p-0 bg-transparent rounded-0" data-cue="slideInUp">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="footer_logo_widget">
                                    <?php if ( ! empty( $settings['footer_top_logo']['url'] ) ) : ?>
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="d-inline-block">
                                            <img src="<?php echo esc_url( $settings['footer_top_logo']['url'] ); ?>" alt="<?php echo esc_attr__( 'logo', 'axero-toolkit' ); ?>">
                                        </a>
                                    <?php endif; ?>
                                    <?php if ( ! empty( $settings['footer_top_description'] ) ) : ?>
                                        <p>
                                            <?php echo esc_html( $settings['footer_top_description'] ); ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="footer_widgets_list">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="footer_widget">
                                                <?php if ( ! empty( $settings['footer_top_quick_links_heading'] ) ) : ?>
                                                    <h3>
                                                        <?php echo esc_html( $settings['footer_top_quick_links_heading'] ); ?>
                                                    </h3>
                                                <?php endif; ?>
                                                <?php if ( ! empty( $settings['footer_top_quick_links'] ) && is_array( $settings['footer_top_quick_links'] ) ) : ?>
                                                    <ul class="links p-0 mb-0 list-unstyled">
                                                        <?php foreach ( $settings['footer_top_quick_links'] as $link ) : ?>
                                                            <li>
                                                                <?php
                                                                $url = isset( $link['url']['url'] ) ? $link['url']['url'] : '#';
                                                                $target = isset( $link['url']['is_external'] ) && $link['url']['is_external'] ? ' target="_blank"' : '';
                                                                $nofollow = isset( $link['url']['nofollow'] ) && $link['url']['nofollow'] ? ' rel="nofollow"' : '';
                                                                ?>
                                                                <a href="<?php echo esc_url( $url ); ?>"<?php echo $target . $nofollow; ?>>
                                                                    <?php echo esc_html( $link['text'] ); ?>
                                                                </a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="footer_widget">
                                                <?php if ( ! empty( $settings['footer_top_utility_heading'] ) ) : ?>
                                                    <h3>
                                                        <?php echo esc_html( $settings['footer_top_utility_heading'] ); ?>
                                                    </h3>
                                                <?php endif; ?>
                                                <?php if ( ! empty( $settings['footer_top_utility_links'] ) && is_array( $settings['footer_top_utility_links'] ) ) : ?>
                                                    <ul class="links p-0 mb-0 list-unstyled">
                                                        <?php foreach ( $settings['footer_top_utility_links'] as $link ) : ?>
                                                            <li>
                                                                <?php
                                                                $url = isset( $link['url']['url'] ) ? $link['url']['url'] : '#';
                                                                $target = isset( $link['url']['is_external'] ) && $link['url']['is_external'] ? ' target="_blank"' : '';
                                                                $nofollow = isset( $link['url']['nofollow'] ) && $link['url']['nofollow'] ? ' rel="nofollow"' : '';
                                                                ?>
                                                                <a href="<?php echo esc_url( $url ); ?>"<?php echo $target . $nofollow; ?>>
                                                                    <?php echo esc_html( $link['text'] ); ?>
                                                                </a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="footer_widget">
                                                <?php if ( ! empty( $settings['footer_top_contact_heading'] ) ) : ?>
                                                    <h3>
                                                        <?php echo esc_html( $settings['footer_top_contact_heading'] ); ?>
                                                    </h3>
                                                <?php endif; ?>
                                                <?php if ( ! empty( $settings['footer_top_contact_links'] ) && is_array( $settings['footer_top_contact_links'] ) ) : ?>
                                                    <ul class="links p-0 mb-0 list-unstyled">
                                                        <?php foreach ( $settings['footer_top_contact_links'] as $link ) : ?>
                                                            <li>
                                                                <?php
                                                                $url = isset( $link['url']['url'] ) ? $link['url']['url'] : '#';
                                                                $target = isset( $link['url']['is_external'] ) && $link['url']['is_external'] ? ' target="_blank"' : '';
                                                                $nofollow = isset( $link['url']['nofollow'] ) && $link['url']['nofollow'] ? ' rel="nofollow"' : '';
                                                                ?>
                                                                <a href="<?php echo esc_url( $url ); ?>"<?php echo $target . $nofollow; ?>>
                                                                    <?php echo esc_html( $link['text'] ); ?>
                                                                </a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if ( ! empty( $settings['footer_middle_socials'] ) && is_array( $settings['footer_middle_socials'] ) ) : ?>
                        <ul class="footer_socials style_two row p-0 mx-0 mb-0 list-unstyled">
                            <?php foreach ( $settings['footer_middle_socials'] as $social ) : 
                                $url = isset( $social['url']['url'] ) ? $social['url']['url'] : '#';
                                $target = isset( $social['url']['is_external'] ) && $social['url']['is_external'] ? ' target="_blank"' : '';
                                $nofollow = isset( $social['url']['nofollow'] ) && $social['url']['nofollow'] ? ' rel="nofollow"' : '';
                                $icon = ! empty( $social['icon'] ) ? $social['icon'] : 'ti ti-arrow-up-right';
                                $title = ! empty( $social['title'] ) ? $social['title'] : '';
                            ?>
                                <li class="col-md-3 px-0">
                                    <a href="<?php echo esc_url( $url ); ?>"<?php echo $target . $nofollow; ?> class="d-flex align-items-center justify-content-between text-uppercase fw-medium">
                                        <?php echo esc_html( $title ); ?>
                                        <i class="<?php echo esc_attr( $icon ); ?>"></i>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>


                    <div class="footer_logo_text lh-1 fw-black text_animation">
                        <?php echo wp_kses_post( $settings['footer_bottom_logo_text'] ); ?>
                    </div>
                    <div class="copyright_area_two style_two text-center">
                        <ul class="p-0 mb-0 list-unstyled">
                            <li class="d-inline-block position-relative">
                                <?php echo wp_kses_post( $settings['footer_bottom_copyright'] ); ?>
                                <?php if ( ! empty( $settings['footer_bottom_year'] ) && $settings['footer_bottom_year'] === 'yes' ) : ?>
                                    <span class="fw-bold text-white"><?php echo date('Y'); ?></span>
                                <?php endif; ?>
                            </li>
                            <li class="d-inline-block position-relative">
                                <?php echo wp_kses_post( $settings['footer_bottom_designed_by'] ); ?></span>
                            </li>
                            <li class="d-inline-block position-relative">
                                <?php echo wp_kses_post( $settings['footer_bottom_powered_by'] ); ?></strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </footer>
          <?php
        }
    }
 $widgets_manager->register(new axero_footer_4());
