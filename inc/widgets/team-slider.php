<?php
    namespace lunex_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class lunex_team_slider extends Widget_Base
    {

        public function get_name()
        {
            return 'lunex_team_slider';
        }

        public function get_title()
        {
            return __('Team Slider', 'lunex-toolkit');
        }

        public function get_icon()
        {
            return 'eicon-elementor';
        }

        public function get_categories()
        {
            return ['Lunex'];
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
                        'style2' => esc_html__('Style 2', 'lunex-toolkit'),
                       
                    ],
                ]
            );

            $this->end_controls_section();
        // Style 1 Content Controls
        $this->start_controls_section(
            'style1_content_section',
            [
                'label' => esc_html__('Style 1 Content', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'style_selection' => 'style1',
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'member_image',
            [
                'label' => esc_html__('Member Image', 'lunex-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/teams/team7.jpg',
                ],
            ]
        );

        $repeater->add_control(
            'member_name',
            [
                'label' => esc_html__('Name', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Michael Carter', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'member_position',
            [
                'label' => esc_html__('Position', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Junior Executive', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'member_description',
            [
                'label' => esc_html__('Description', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('In cursus quam consequat non tortor tristique dolor pellentesque.', 'lunex-toolkit'),
            ]
        );

        $this->add_control(
            'team_members_list',
            [
                'label' => esc_html__('Team Members', 'lunex-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'member_name' => esc_html__('Michael Carter', 'lunex-toolkit'),
                        'member_position' => esc_html__('Junior Executive', 'lunex-toolkit'),
                        'member_description' => esc_html__('In cursus quam consequat non tortor tristique dolor pellentesque.', 'lunex-toolkit'),
                        'member_image' => [
                            'url' => get_template_directory_uri() . '/assets/images/teams/team7.jpg',
                        ],
                    ],
                ],
                'title_field' => '{{{ member_name }}}',
            ]
        );

        $this->end_controls_section();
        // Style 2 Content Controls
        $this->start_controls_section(
            'style2_content_section',
            [
            'label' => esc_html__('Style 2 Content', 'lunex-toolkit'),
            'tab' => Controls_Manager::TAB_CONTENT,
            'condition' => [
                'style_selection' => 'style2',
            ],
            ]
        );

        $style2_repeater = new \Elementor\Repeater();

        $style2_repeater->add_control(
            'style2_member_image',
            [
            'label' => esc_html__('Member Image', 'lunex-toolkit'),
            'type' => Controls_Manager::MEDIA,
            'default' => [
                'url' => get_template_directory_uri() . '/assets/images/teams/team1.jpg',
            ],
            ]
        );

        $style2_repeater->add_control(
            'style2_member_name',
            [
            'label' => esc_html__('Name', 'lunex-toolkit'),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__('David Wilson', 'lunex-toolkit'),
            'label_block' => true,
            ]
        );

        $style2_repeater->add_control(
            'style2_member_position',
            [
            'label' => esc_html__('Position', 'lunex-toolkit'),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__('Content Strategist', 'lunex-toolkit'),
            'label_block' => true,
            ]
        );

        // Social Media repeater
        $social_repeater = new \Elementor\Repeater();

        $social_repeater->add_control(
            'social_icon',
            [
            'label' => esc_html__('Icon', 'lunex-toolkit'),
            'type' => Controls_Manager::ICONS,
            'default' => [
                'value' => 'fab fa-facebook-f',
                'library' => 'fa-brands',
            ],
            ]
        );

        $social_repeater->add_control(
            'social_url',
            [
            'label' => esc_html__('URL', 'lunex-toolkit'),
            'type' => Controls_Manager::URL,
            'placeholder' => 'https://',
            ]
        );

        $style2_repeater->add_control(
            'style2_member_socials',
            [
            'label' => esc_html__('Social Media', 'lunex-toolkit'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $social_repeater->get_controls(),
            'title_field' => '{{{ social_icon.value }}}',
            ]
        );

        $this->add_control(
            'style2_team_members_list',
            [
            'label' => esc_html__('Team Members', 'lunex-toolkit'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $style2_repeater->get_controls(),
            'default' => [
                [
                'style2_member_name' => esc_html__('David Wilson', 'lunex-toolkit'),
                'style2_member_position' => esc_html__('Content Strategist', 'lunex-toolkit'),
                'style2_member_image' => [
                    'url' => get_template_directory_uri() . '/assets/images/teams/team1.jpg',
                ],
                'style2_member_socials' => [
                    [
                    'social_icon' => [
                        'value' => 'ri-instagram-line',
                        'library' => 'remixicon',
                    ],
                    'social_url' => ['url' => '#'],
                    ],
                    [
                    'social_icon' => [
                        'value' => 'ri-facebook-circle-fill',
                        'library' => 'remixicon',
                    ],
                    'social_url' => ['url' => '#'],
                    ],
                    [
                    'social_icon' => [
                        'value' => 'ri-threads-line',
                        'library' => 'remixicon',
                    ],
                    'social_url' => ['url' => '#'],
                    ],
                    [
                    'social_icon' => [
                        'value' => 'ri-twitter-x-line',
                        'library' => 'remixicon',
                    ],
                    'social_url' => ['url' => '#'],
                    ],
                ],
                ],
                [
                'style2_member_name' => esc_html__('Sophia Martinez', 'lunex-toolkit'),
                'style2_member_position' => esc_html__('Marketing Specialist', 'lunex-toolkit'),
                'style2_member_image' => [
                    'url' => get_template_directory_uri() . '/assets/images/teams/team2.jpg',
                ],
                'style2_member_socials' => [
                    [
                    'social_icon' => [
                        'value' => 'ri-instagram-line',
                        'library' => 'remixicon',
                    ],
                    'social_url' => ['url' => '#'],
                    ],
                    [
                    'social_icon' => [
                        'value' => 'ri-facebook-circle-fill',
                        'library' => 'remixicon',
                    ],
                    'social_url' => ['url' => '#'],
                    ],
                    [
                    'social_icon' => [
                        'value' => 'ri-threads-line',
                        'library' => 'remixicon',
                    ],
                    'social_url' => ['url' => '#'],
                    ],
                    [
                    'social_icon' => [
                        'value' => 'ri-twitter-x-line',
                        'library' => 'remixicon',
                    ],
                    'social_url' => ['url' => '#'],
                    ],
                ],
                ],
            ],
            'title_field' => '{{{ style2_member_name }}}',
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
        // Name Style
        $this->start_controls_section(
            'name_style_section',
            [
                'label' => esc_html__('Name Style', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style1',
                ],
            ]
        );

        $this->add_control(
            'name_color',
            [
                'label' => esc_html__('Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single_awesome_team_member .image h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'name_typography',
                'selector' => '{{WRAPPER}} .single_awesome_team_member .image h3',
            ]
        );

        $this->end_controls_section();

        // Position Style
        $this->start_controls_section(
            'position_style_section',
            [
                'label' => esc_html__('Position Style', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style1',
                ],
            ]
        );

        $this->add_control(
            'position_color',
            [
                'label' => esc_html__('Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single_awesome_team_member .content h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'position_typography',
                'selector' => '{{WRAPPER}} .single_awesome_team_member .content h4',
            ]
        );

        $this->end_controls_section();

        // Description Style
        $this->start_controls_section(
            'description_style_section',
            [
                'label' => esc_html__('Description Style', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style1',
                ],
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => esc_html__('Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single_awesome_team_member .content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'selector' => '{{WRAPPER}} .single_awesome_team_member .content p',
            ]
        );

        $this->end_controls_section();


        // Style 2 Team Member Image
        $this->start_controls_section(
            'style2_member_image_style',
            [
                'label' => esc_html__('Member Image Style', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style2',
                ],
            ]
        );

        $this->add_control(
            'style2_image_width',
            [
                'label' => esc_html__('Width', 'lunex-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .teamSwiper .single-team-member img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'style2_image_height',
            [
                'label' => esc_html__('Height', 'lunex-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .teamSwiper .single-team-member img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'style2_image_border_radius',
            [
                'label' => esc_html__('Border Radius', 'lunex-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .teamSwiper .single-team-member img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style 2 Member Name
        $this->start_controls_section(
            'style2_member_name_style',
            [
                'label' => esc_html__('Member Name Style', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style2',
                ],
            ]
        );

        $this->add_control(
            'style2_name_color',
            [
                'label' => esc_html__('Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-team-member .content .title h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style2_name_typography',
                'selector' => '{{WRAPPER}} .single-team-member .content .title h3',
            ]
        );

        $this->end_controls_section();

        // Style 2 Member Position
        $this->start_controls_section(
            'style2_member_position_style',
            [
                'label' => esc_html__('Member Position Style', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style2',
                ],
            ]
        );

        $this->add_control(
            'style2_position_color',
            [
                'label' => esc_html__('Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-team-member .content .title span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style2_position_typography',
                'selector' => '{{WRAPPER}} .single-team-member .content .title span',
            ]
        );

        $this->end_controls_section();

        // Style 2 Social Icons
        $this->start_controls_section(
            'style2_social_icons_style',
            [
                'label' => esc_html__('Social Icons Style', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style2',
                ],
            ]
        );

        $this->add_control(
            'style2_icon_color',
            [
                'label' => esc_html__('Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-team-member .content .socials a i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .single-team-member .content .socials a svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'style2_icon_size',
            [
                'label' => esc_html__('Size', 'lunex-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .single-team-member .content .socials a i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .single-team-member .content .socials a svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
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

  <div class="awesome_team_area">
      <div class="awesome_team_slides owl-carousel owl-theme" data-cue="slideInUp">
                 <?php foreach ($settings['team_members_list'] as $member): ?>
                        <div class="single_awesome_team_member">
                            <div class="image position-relative">
                                <?php 
                                $image_url = !empty($member['member_image']['id']) 
                                    ? wp_get_attachment_image_url($member['member_image']['id'], 'full') 
                                    : (!empty($member['member_image']['url']) 
                                        ? $member['member_image']['url'] 
                                        : LUNEX_IMG . '/teams/placeholder.jpg');
                                ?>
                                <img src="<?php echo esc_url($image_url); ?>" 
                                     alt="<?php echo esc_attr($member['member_name']); ?>"
                                     class="team-member-image"
                                     loading="lazy">

                                <h3 class="mb-0">
                                    <?php echo esc_html($member['member_name']); ?>
                                </h3>

                            </div>
                            <div class="content">

                                <h4>
                                    <?php echo esc_html($member['member_position']); ?>
                                </h4>

                                <p>
                                    <?php echo esc_html($member['member_description']); ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
        </div>

        <?php
            } elseif ($settings['style_selection'] === 'style2') {
                    ?>
            <!-- style 2 -->
            <div class="team-area">
                <div class="container">
                    <div class="teamSwiper position-relative" data-cue="slideInUp">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <?php if (!empty($settings['style2_team_members_list'])): ?>
                                    <?php foreach ($settings['style2_team_members_list'] as $member): ?>
                                        <div class="swiper-slide">
                                            <div class="single-team-member">
                                                <?php
                                                $image_url = !empty($member['style2_member_image']['id'])
                                                    ? wp_get_attachment_image_url($member['style2_member_image']['id'], 'full')
                                                    : (!empty($member['style2_member_image']['url'])
                                                        ? $member['style2_member_image']['url']
                                                        : LUNEX_IMG . '/teams/placeholder.jpg');
                                                ?>
                                                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($member['style2_member_name']); ?>">
                                                <div class="content d-flex justify-content-between align-items-end">
                                                    <div class="title">
                                                        <h3>
                                                            <?php echo esc_html($member['style2_member_name']); ?>
                                                        </h3>
                                                        <span class="d-block">
                                                            <?php echo esc_html($member['style2_member_position']); ?>
                                                        </span>
                                                    </div>
                                                    <?php if (!empty($member['style2_member_socials'])): ?>
                                                        <div class="socials">
                                                            <?php foreach ($member['style2_member_socials'] as $social): ?>
                                                                <?php
                                                                $url = !empty($social['social_url']['url']) ? $social['social_url']['url'] : '#';
                                                                $target = !empty($social['social_url']['is_external']) ? ' target="_blank"' : '';
                                                                $nofollow = !empty($social['social_url']['nofollow']) ? ' rel="nofollow"' : '';
                                                                ?>
                                                                <a href="<?php echo esc_url($url); ?>" class="d-inline-block"<?php echo $target . $nofollow; ?>>
                                                                    <?php
                                                                    if (!empty($social['social_icon']['value'])) {
                                                                        if (isset($social['social_icon']['library']) && $social['social_icon']['library'] === 'remixicon') {
                                                                            echo '<i class="' . esc_attr($social['social_icon']['value']) . '"></i>';
                                                                        } else {
                                                                            \Elementor\Icons_Manager::render_icon($social['social_icon'], ['aria-hidden' => 'true']);
                                                                        }
                                                                    }
                                                                    ?>
                                                                </a>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="btn-box d-flex align-items-center">
                            <div class="swiper-button-prev">
                                <i class="ri-arrow-left-line"></i>
                            </div>
                            <div class="swiper-button-next">
                                <i class="ri-arrow-right-line"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php
            } elseif ($settings['style_selection'] === 'style3') {
                    ?>
            <!-- style 3 -->

    <?php
        }
            }
        }

    $widgets_manager->register(new lunex_team_slider());