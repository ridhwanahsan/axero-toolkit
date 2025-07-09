<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

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
            return __('Header Four', 'axero-toolkit');
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
                    'label' => esc_html__('Section Selection', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'style_selection',
                [
                    'label'   => esc_html__('Select Section', 'axero-toolkit'),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'style1',
                    'options' => [
                        'style1' => esc_html__('Style 1', 'axero-toolkit'),

                    ],
                ]
            );

            $this->end_controls_section();
            // Menu Selection Control
            $this->start_controls_section(
                'menu_selection',
                [
                    'label'     => esc_html__('Header Setting', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            $this->add_control(
                'menu_text',
                [
                    'label'       => esc_html__('Menu Text', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Menu', 'axero-toolkit'),
                    'description' => esc_html__('Text to display next to menu icon', 'axero-toolkit'),
                ]
            );
            $this->add_control(
                'menu_icon',
                [
                    'label'       => esc_html__('Menu Icon', 'axero-toolkit'),
                    'type'        => Controls_Manager::MEDIA,
                    'default'     => [
                        'url' => get_template_directory_uri() . '/assets/images/icons/menu2.svg',
                    ],
                    'description' => esc_html__('Upload the menu icon image', 'axero-toolkit'),
                    'dynamic'     => [
                        'active' => true,
                    ],
                ]
            );
            // Light Logo Control
            $this->add_control(
                'light_logo',
                [
                    'label'       => esc_html__('Light Logo', 'axero-toolkit'),
                    'type'        => Controls_Manager::MEDIA,
                    'default'     => [
                        'url' => get_template_directory_uri() . '/assets/images/white-logo.svg',
                    ],
                    'description' => esc_html__('Upload the light version of your logo (visible in dark mode)', 'axero-toolkit'),
                    'dynamic'     => [
                        'active' => true,
                    ],

                ]
            );

            // Dark Logo Control
            $this->add_control(
                'dark_logo',
                [
                    'label'       => esc_html__('Dark Logo', 'axero-toolkit'),
                    'type'        => Controls_Manager::MEDIA,
                    'default'     => [
                        'url' => get_template_directory_uri() . '/assets/images/logo.svg',
                    ],
                    'description' => esc_html__('Upload the dark version of your logo (visible in light mode)', 'axero-toolkit'),
                    'dynamic'     => [
                        'active' => true,
                    ],

                ]
            );

            $this->add_control(
                'enable_dark_mode_switch',
                [
                    'label'        => esc_html__('Enable Dark Mode Switch', 'axero-toolkit'),
                    'type'         => Controls_Manager::SWITCHER,
                    'label_on'     => esc_html__('Yes', 'axero-toolkit'),
                    'label_off'    => esc_html__('No', 'axero-toolkit'),
                    'return_value' => 'yes',
                    'default'      => 'yes',
                    'description'  => esc_html__('Show dark/light mode toggle button in header', 'axero-toolkit'),
                ]
            );
            $this->add_control(
                'enable_header_button',
                [
                    'label'        => esc_html__('Enable Header Button', 'axero-toolkit'),
                    'type'         => Controls_Manager::SWITCHER,
                    'label_on'     => esc_html__('Yes', 'axero-toolkit'),
                    'label_off'    => esc_html__('No', 'axero-toolkit'),
                    'return_value' => 'yes',
                    'default'      => 'yes',
                    'separator'    => 'before',
                    'description'  => esc_html__('Show call-to-action button in header', 'axero-toolkit'),
                ]
            );

            $this->add_control(
                'header_button_text',
                [
                    'label'     => esc_html__('Button Text', 'axero-toolkit'),
                    'type'      => Controls_Manager::TEXT,
                    'default'   => esc_html__('Talk to Us', 'axero-toolkit'),
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
                        'value'   => 'ri-arrow-right-up-line',
                        'library' => 'remixicon',
                    ],
                ]
            );

            $this->add_control(
                'header_button_link',
                [
                    'label'       => esc_html__('Button Link', 'axero-toolkit'),
                    'type'        => Controls_Manager::URL,
                    'placeholder' => esc_html__('https://your-link.com', 'axero-toolkit'),
                    'default'     => [
                        'url' => '#',
                    ],
                    'condition'   => [
                        'enable_header_button' => 'yes',
                    ],
                ]
            );

            $this->end_controls_section();

            $this->start_controls_section(
                'mobile_menu_section',
                [
                    'label' => esc_html__('Mobile Menu', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'mobile_menu_heading',
                [
                    'label'     => esc_html__('Mobile Menu Settings', 'axero-toolkit'),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $menus   = wp_get_nav_menus();
            $options = [];

            foreach ($menus as $menu) {
                $options[$menu->slug] = $menu->name;
            }

            $this->add_control(
                'mobile_selected_menu',
                [
                    'label'       => esc_html__('Select Mobile Menu', 'axero-toolkit'),
                    'type'        => Controls_Manager::SELECT,
                    'options'     => $options,
                    'default'     => ! empty($options) ? array_key_first($options) : '',
                    'description' => esc_html__('Choose which menu to display in mobile view', 'axero-toolkit'),
                ]
            );

            $this->add_control(
                'mobile_menu_email',
                [
                    'label'     => esc_html__('Email Address', 'axero-toolkit'),
                    'type'      => Controls_Manager::TEXT,
                    'default'   => esc_html__('support@axero.com', 'axero-toolkit'),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'social_links_heading',
                [
                    'label'     => esc_html__('Social Links', 'axero-toolkit'),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control(
                'social_icon',
                [
                    'label'   => esc_html__('Icon', 'axero-toolkit'),
                    'type'    => Controls_Manager::ICONS,
                    'default' => [
                        'value'   => 'ri-facebook-circle-fill',
                        'library' => 'ri-icons',
                    ],
                ]
            );

            $repeater->add_control(
                'social_link',
                [
                    'label'         => esc_html__('Link', 'axero-toolkit'),
                    'type'          => Controls_Manager::URL,
                    'placeholder'   => esc_html__('https://your-link.com', 'axero-toolkit'),
                    'show_external' => true,
                    'default'       => [
                        'url'         => '#',
                        'is_external' => true,
                        'nofollow'    => false,
                    ],
                ]
            );

            $this->add_control(
                'social_links',
                [
                    'label'   => esc_html__('Social Links', 'axero-toolkit'),
                    'type'    => Controls_Manager::REPEATER,
                    'fields'  => $repeater->get_controls(),
                    'default' => [
                        [
                            'social_icon' => [
                                'value'   => 'ri-facebook-circle-fill',
                                'library' => 'ri-icons',
                            ],
                        ],
                        [
                            'social_icon' => [
                                'value'   => 'ri-instagram-line',
                                'library' => 'ri-icons',
                            ],
                        ],
                        [
                            'social_icon' => [
                                'value'   => 'ri-threads-line',
                                'library' => 'ri-icons',
                            ],
                        ],
                        [
                            'social_icon' => [
                                'value'   => 'ri-twitter-x-line',
                                'library' => 'ri-icons',
                            ],
                        ],
                        [
                            'social_icon' => [
                                'value'   => 'ri-youtube-fill',
                                'library' => 'ri-icons',
                            ],
                        ],
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
                    'label' => esc_html__('Header Style Setting', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_STYLE,
                ]
            );
            // Toggle Menu Text Color
            $this->add_control(
                'toggle_menu_text_color',
                [
                    'label'     => esc_html__('Toggle Menu Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .navbar-area.style-three .navbar .navbar-toggler' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Toggle Menu Text Hover Color
            $this->add_control(
                'toggle_menu_text_hover_color',
                [
                    'label'     => esc_html__('Toggle Menu Text Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .navbar-area.style-three .navbar .navbar-toggler:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Toggle Menu Text Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'toggle_menu_text_typography',
                    'label'    => esc_html__('Toggle Menu Text Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .navbar-area.style-three .navbar .navbar-toggler',
                ]
            );
            // Header Button Text Color
            $this->add_control(
                'header_button_text_color',
                [
                    'label'     => esc_html__('Button Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .navbar-area.style-three .navbar .others-option .link-btn' => 'color: {{VALUE}};',
                    ],
                    'separator' => 'before',
                ]
            );

            // Header Button Text Hover Color
            $this->add_control(
                'header_button_text_hover_color',
                [
                    'label'     => esc_html__('Button Text Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .navbar-area.style-three .navbar .others-option .link-btn:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Header Button Text Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'header_button_text_typography',
                    'label'    => esc_html__('Button Text Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .navbar-area.style-three .navbar .others-option .link-btn',
                ]
            );

            $this->end_controls_section();

            // Mobile Navigation Style
            $this->start_controls_section(
                'mobile_nav_style',
                [
                    'label' => esc_html__('Mobile Navigation', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_STYLE,
                ]
            );
            // Mobile Top Navigation Background Color
            $this->add_responsive_control(
                'mobile_top_nav_bg_color',
                [
                    'label'     => esc_html__('Top Navigation Background', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .navbar-area.style-three' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            // Mobile Top Navigation Padding
            $this->add_control(
                'mobile_top_nav_padding',
                [
                    'label'      => esc_html__('Top Navigation Padding', 'axero-toolkit'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .navbar-area.style-three' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'default'    => [
                        'top'      => '25',
                        'right'    => '0',
                        'bottom'   => '25',
                        'left'     => '0',
                        'unit'     => 'px',
                        'isLinked' => false,
                    ],
                ]
            );
            // Mobile Menu Background Color
            $this->add_control(
                'mobile_menu_bg_color',
                [
                    'label'     => esc_html__('Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .menu-popup-area'                        => 'background-color: {{VALUE}};',
                        '{{WRAPPER}} .navbar-area .navbar .navbar-popup-menu' => 'background-color: {{VALUE}};',
                    ],
                ]
            );
            // Mobile Menu Border
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name'     => 'mobile_menu_border',
                    'label'    => esc_html__('Border', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .navbar-area .navbar .navbar-popup-menu',
                ]
            );
            $this->add_control(
                'mobile_menu_border_radius',
                [
                    'label'      => esc_html__('Border Radius', 'axero-toolkit'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .navbar-area .navbar .navbar-popup-menu' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            // Mobile Menu Text Color
            $this->add_control(
                'mobile_menu_text_color',
                [
                    'label'     => esc_html__('Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .navbar-area .navbar .navbar-popup-menu ul li a' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Mobile Menu Text Hover/Active Color
            $this->add_control(
                'mobile_menu_text_hover_color',
                [
                    'label'     => esc_html__('Text Hover/Active Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .navbar-area .navbar .navbar-popup-menu ul li a:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Mobile Menu Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'mobile_menu_typography',
                    'label'    => esc_html__('Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .navbar-area .navbar .navbar-popup-menu ul li a',
                ]
            );

            // Close Button Color
            $this->add_control(
                'mobile_close_btn_color',
                [
                    'label'     => esc_html__('Close Button Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .navbar-area .navbar .navbar-popup-menu .top button' => 'color: {{VALUE}};',
                    ],
                    'separator' => 'before',
                ]
            );

            // Close Button Hover Color
            $this->add_control(
                'mobile_close_btn_hover_color',
                [
                    'label'     => esc_html__('Close Button Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .navbar-area .navbar .navbar-popup-menu .top button:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );
            // Close Button Size
            $this->add_control(
                'mobile_close_btn_size',
                [
                    'label'      => esc_html__('Close Button Size', 'axero-toolkit'),
                    'type'       => Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range'      => [
                        'px' => [
                            'min'  => 10,
                            'max'  => 100,
                            'step' => 1,
                        ],
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} .navbar-area .navbar .navbar-popup-menu .top button' => 'font-size: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->end_controls_section();

            // mobile menu contact style

            $this->start_controls_section(
                'mobile_menu_contact_style',
                [
                    'label' => esc_html__('Mobile Menu Contact', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_STYLE,
                ]
            );

            // Email Color
            $this->add_control(
                'mobile_contact_email_color',
                [
                    'label'     => esc_html__('Email Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .navbar-area .navbar .navbar-popup-menu .info .email' => 'color: {{VALUE}};',
                    ],
                    'separator' => 'before',
                ]
            );

            // Email Hover Color
            $this->add_control(
                'mobile_contact_email_hover_color',
                [
                    'label'     => esc_html__('Email Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .navbar-area .navbar .navbar-popup-menu .info .email:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Email Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'mobile_contact_email_typography',
                    'label'    => esc_html__('Email Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .navbar-area .navbar .navbar-popup-menu .info .email',
                ]
            );

            // Social Icon Color
            $this->add_control(
                'mobile_contact_social_color',
                [
                    'label'     => esc_html__('Social Icon Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .navbar-area .navbar .navbar-popup-menu .info .socials a' => 'color: {{VALUE}};',
                    ],
                    'separator' => 'before',
                ]
            );

            // Social Icon Hover Color
            $this->add_control(
                'mobile_contact_social_hover_color',
                [
                    'label'     => esc_html__('Social Icon Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .navbar-area .navbar .navbar-popup-menu .info .socials a:hover' => 'color: {{VALUE}};',
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
 <div class="navbar-area style-three top-0 start-0 end-0 h-auto">
        <div class="container">
            <nav class="navbar p-0 navbar-expand-lg">
                 <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                    <?php if (! empty($settings['dark_logo']['url'])): ?>
                        <img src="<?php echo esc_url($settings['dark_logo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" class="black-logo">
                    <?php endif; ?>
<?php if (! empty($settings['light_logo']['url'])): ?>
                        <img src="<?php echo esc_url($settings['light_logo']['url']); ?>" class="d-none" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                    <?php endif; ?>
                </a>
                <button class="navbar-toggler" type="button">
                        <?php if (! empty($settings['menu_icon']['url'])): ?>
                            <img src="<?php echo esc_url($settings['menu_icon']['url']); ?>" alt="<?php echo esc_attr($settings['menu_text']); ?>">
                        <?php endif; ?>
<?php echo esc_html($settings['menu_text']); ?>
                    </button>
                <div class="navbar-popup-menu">
                    <div class="top d-flex align-items-center justify-content-between">
                            <?php if (! empty($settings['menu_text'])): ?>
                        <span class="d-block">
                               <?php echo esc_html($settings['menu_text']); ?>
                            </span>
                            <?php endif; ?>


                        <button type="button" class="bg-transparent p-0 border-0">
                                <i class="ri-close-fill"></i>
                            </button>
                    </div>
                    <?php
                        // Render the selected menu using the custom walker
                                    if (! empty($settings['mobile_selected_menu'])) {
                                        if (class_exists('\header_four_nav_walker')) {
                                            wp_nav_menu([
                                                'menu'        => $settings['mobile_selected_menu'],
                                                'container'   => false,
                                                'menu_class'  => 'ps-0 mb-0 list-unstyled',
                                                'fallback_cb' => false,
                                                'walker'      => new \header_four_nav_walker(),
                                            ]);
                                        } else {
                                            echo '<div class="alert alert-warning">Axero Toolkit plugin is not active. Please activate it for full functionality.</div>';
                                        }
                                    }
                                ?>
                    <div class="info">
                        <?php if (! empty($settings['social_links'])): ?>
                            <div class="socials">
                                <?php foreach ($settings['social_links'] as $social):
                                                    $icon = $social['social_icon'];
                                                    $link = $social['social_link'];
                                                if (! empty($icon['value'])): ?>
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
<?php if (! empty($settings['mobile_menu_email'])): ?>
                            <a href="mailto:<?php echo esc_attr($settings['mobile_menu_email']); ?>" class="email">
                                <?php echo esc_html($settings['mobile_menu_email']); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="others-option d-flex align-items-center">

                    <?php if ($settings['enable_dark_mode_switch'] === 'yes'): ?>
                        <button type="button" class="light-dark-btn d-inline-block p-0 bg-transparent border-0 lh-1" id="light-dark-btn">
                            <i class="ri-sun-line"></i>
                        </button>
                    <?php endif; ?>



                    <?php if ($settings['enable_header_button'] === 'yes'): ?>
                        <a href="<?php echo esc_url($settings['header_button_link']['url'] ?? '#'); ?>"
                           class="link-btn d-inline-block"
                           target="<?php echo ! empty($settings['header_button_link']['is_external']) ? '_blank' : '_self'; ?>"
                           <?php echo ! empty($settings['header_button_link']['nofollow']) ? 'rel="nofollow"' : ''; ?>>
                            <?php echo esc_html($settings['header_button_text'] ?? 'Talk to Us'); ?>
<?php if (! empty($settings['header_button_icon']['value'])): ?>
                                <i class="<?php echo esc_attr($settings['header_button_icon']['value']); ?>"></i>
                            <?php else: ?>
                                <i class="ri-arrow-right-line"></i>
                            <?php endif; ?>
                        </a>
                    <?php endif; ?>
                </div>
            </nav>
        </div>
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

    $widgets_manager->register(new axero_header_four());