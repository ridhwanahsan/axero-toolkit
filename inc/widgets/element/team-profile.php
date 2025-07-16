<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_team_profile extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_team_profile';
        }

        public function get_title()
        {
            return __('Team Profile', 'axero-toolkit');
        }

        public function get_icon()
        {
            return 'eicon-elementor';
        }

        public function get_categories()
        {
            return ['Axero'];
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
                        'style2' => esc_html__('Style 2', 'axero-toolkit'),
                        'style3' => esc_html__('Style 3', 'axero-toolkit'),
                    ],
                ]
            );

            $this->end_controls_section();

            // Style 1 Content Controls
            $this->start_controls_section(
                'style1_content_section',
                [
                    'label' => esc_html__('Style 1: Profile Content', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            // Profile Image
            $this->add_control(
                'style1_profile_image',
                [
                    'label' => esc_html__('Profile Image', 'axero-toolkit'),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => get_template_directory_uri() . '/assets/images/team/team11.jpg',
                    ],
                ]
            );

            // Name
            $this->add_control(
                'style1_name',
                [
                    'label' => esc_html__('Name', 'axero-toolkit'),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Megan Wilson', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            // Position
            $this->add_control(
                'style1_position',
                [
                    'label' => esc_html__('Position', 'axero-toolkit'),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Co-founder', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            // Social Media Repeater
            $repeater = new \Elementor\Repeater();

            $repeater->add_control(
                'icon',
                [
                    'label' => esc_html__('Icon', 'axero-toolkit'),
                    'type' => Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'fab fa-facebook-f',
                        'library' => 'fa-brands',
                    ],
                ]
            );

            $repeater->add_control(
                'url',
                [
                    'label' => esc_html__('URL', 'axero-toolkit'),
                    'type' => Controls_Manager::URL,
                    'placeholder' => 'https://your-link.com',
                    'default' => [
                        'url' => '#',
                        'is_external' => true,
                        'nofollow' => false,
                    ],
                ]
            );

            $this->add_control(
                'style1_socials',
                [
                    'label' => esc_html__('Social Media', 'axero-toolkit'),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'icon' => [
                                'value' => 'fab fa-facebook-f',
                                'library' => 'fa-brands',
                            ],
                            'url' => [
                                'url' => '#',
                                'is_external' => true,
                                'nofollow' => false,
                            ],
                        ],
                        [
                            'icon' => [
                                'value' => 'fab fa-instagram',
                                'library' => 'fa-brands',
                            ],
                            'url' => [
                                'url' => '#',
                                'is_external' => true,
                                'nofollow' => false,
                            ],
                        ],
                        [
                            'icon' => [
                                'value' => 'fab fa-x-twitter',
                                'library' => 'fa-brands',
                            ],
                            'url' => [
                                'url' => '#',
                                'is_external' => true,
                                'nofollow' => false,
                            ],
                        ],
                        [
                            'icon' => [
                                'value' => 'fab fa-linkedin-in',
                                'library' => 'fa-brands',
                            ],
                            'url' => [
                                'url' => '#',
                                'is_external' => true,
                                'nofollow' => false,
                            ],
                        ],
                    ],
                    'title_field' => '{{{ icon.value ? icon.value : "icon" }}}',
                ]
            );

            // Description 1
            $this->add_control(
                'style1_description1',
                [
                    'label' => esc_html__('Description 1', 'axero-toolkit'),
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => esc_html__("Lorem Ipsum is simply dummy text of the printing and typesetting industry ipsum has been the industry's standard dummy 1500s, when an unknown print er took a galley  make a type specimen book.", 'axero-toolkit'),
                    'rows' => 3,
                ]
            );

            // Description 2
            $this->add_control(
                'style1_description2',
                [
                    'label' => esc_html__('Description 2', 'axero-toolkit'),
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => esc_html__("Lorem Ipsum is simply dummy text of the printing and typesetting industry ipsum has been the industry's standard dummy 1500s, when an unknown print er took a galley  make a type specimen book.", 'axero-toolkit'),
                    'rows' => 3,
                ]
            );

            $this->end_controls_section();

        }
        /**
         * Style Tab Content Section
         * ------------------------
         */

        protected function style_tab_content() {
            $this->start_controls_section(
                'section_content_style',
                [
                    'label' => esc_html__('Content', 'axero-toolkit'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

            // Name Color
            $this->add_control(
                'style1_name_color',
                [
                    'label' => esc_html__('Name Color', 'axero-toolkit'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .team_details_content h3' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Position Color
            $this->add_control(
                'style1_position_color',
                [
                    'label' => esc_html__('Position Color', 'axero-toolkit'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .team_details_content .designation' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Description Color
            $this->add_control(
                'style1_description_color',
                [
                    'label' => esc_html__('Description Color', 'axero-toolkit'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .team_details_content p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Social Icon Color
            $this->add_control(
                'style1_social_icon_color',
                [
                    'label' => esc_html__('Social Icon Color', 'axero-toolkit'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .team_details_content .socials a i' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Social Icon Hover Color
            $this->add_control(
                'style1_social_icon_hover_color',
                [
                    'label' => esc_html__('Social Icon Hover Color', 'axero-toolkit'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .team_details_content .socials a:hover i' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Name Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'style1_name_typography',
                    'label' => esc_html__('Name Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .team_details_content h3',
                ]
            );

            // Position Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'style1_position_typography',
                    'label' => esc_html__('Position Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .team_details_content .designation',
                ]
            );

            // Description Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'style1_description_typography',
                    'label' => esc_html__('Description Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .team_details_content p',
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
        <div class="team_details_area">
             
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="team_details_img">
                            <img src="<?php echo esc_url( $settings['style1_profile_image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['style1_name'] ); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="team_details_content">
                            <h3 class="text_animation">
                                <?php echo esc_html( $settings['style1_name'] ); ?>
                            </h3>
                            <span class="designation fw-medium d-block">
                                <?php echo esc_html( $settings['style1_position'] ); ?>
                            </span>
                            <?php if ( !empty( $settings['style1_socials'] ) && is_array( $settings['style1_socials'] ) ) : ?>
                            <div class="socials d-flex align-items-center">
                                <?php foreach ( $settings['style1_socials'] as $social ) : 
                                    $icon = isset($social['icon']) ? $social['icon'] : '';
                                    $url = isset($social['url']['url']) ? $social['url']['url'] : '#';
                                    $is_external = !empty($social['url']['is_external']) ? ' target="_blank"' : '';
                                    $nofollow = !empty($social['url']['nofollow']) ? ' rel="nofollow"' : '';
                                ?>
                                    <a href="<?php echo esc_url( $url ); ?>"<?php echo $is_external . $nofollow; ?>>
                                        <?php
                                        if ( !empty($icon['value']) ) {
                                            if ( isset($icon['library']) && $icon['library'] === 'fa-brands' ) {
                                                echo '<i class="' . esc_attr( $icon['value'] ) . '"></i>';
                                            } else {
                                                // fallback for other icon libraries or custom icons
                                                echo '<i class="' . esc_attr( $icon['value'] ) . '"></i>';
                                            }
                                        }
                                        ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                            <?php if ( !empty( $settings['style1_description1'] ) ) : ?>
                            <p>
                                <?php echo esc_html( $settings['style1_description1'] ); ?>
                            </p>
                            <?php endif; ?>
                            <?php if ( !empty( $settings['style1_description2'] ) ) : ?>
                            <p>
                                <?php echo esc_html( $settings['style1_description2'] ); ?>
                            </p>
                            <?php endif; ?>
                        </div>
                    </div>
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

    $widgets_manager->register(new axero_team_profile());