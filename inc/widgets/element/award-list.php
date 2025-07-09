<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_award_list extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_award_list';
        }

        public function get_title()
        {
            return __('Awards List', 'axero-toolkit');
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

                    ],
                ]
            );

            $this->end_controls_section();
            // Content Tab 1
            $this->start_controls_section(
                'content_tab_1',
                [
                    'label'     => esc_html__('Content', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control(
                'year',
                [
                    'label'       => esc_html__('Year', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => '2025',
                    'label_block' => true,
                ]
            );

            $repeater->add_control(
                'light_image',
                [
                    'label'   => esc_html__('Light Image', 'axero-toolkit'),
                    'type'    => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ]
            );
            $repeater->add_control(
                'dark_image',
                [
                    'label'   => esc_html__('Dark Image', 'axero-toolkit'),
                    'type'    => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ]
            );
            $repeater->add_control(
                'permalink',
                [
                    'label'       => esc_html__('Permalink', 'axero-toolkit'),
                    'type'        => Controls_Manager::URL,
                    'placeholder' => esc_html__('https://your-link.com', 'axero-toolkit'),
                    'default'     => [
                        'url' => '',
                    ],
                ]
            );

            $repeater->add_control(
                'number',
                [
                    'label'       => esc_html__('Number', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => '01',
                    'label_block' => true,
                ]
            );

            $repeater->add_control(
                'title',
                [
                    'label'       => esc_html__('Title', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => 'Future innovator\'s trophy',
                    'label_block' => true,
                ]
            );

            $repeater->add_control(
                'icon_list',
                [
                    'label'   => esc_html__('Icon', 'axero-toolkit'),
                    'type'    => Controls_Manager::ICONS,
                    'default' => [
                        'value'   => 'ri-stack-line',
                        'library' => 'remixicon',
                    ],
                ]
            );

            $this->add_control(
                'awards_list',
                [
                    'label'       => esc_html__('Awards List', 'axero-toolkit'),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'default'     => [
                        [
                            'year'   => '2025',
                            'title'  => 'Future innovator\'s trophy',
                            'number' => '01',
                        ],
                    ],
                    'title_field' => '{{{ title }}}',
                ]
            );

            $this->end_controls_section();

            // Content Tab 2 - Style 2
            $this->start_controls_section(
                'style2_content_tab_2',
                [
                    'label'     => esc_html__('Content', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'style_selection' => 'style2',
                    ],
                ]
            );

            $repeater2 = new \Elementor\Repeater();

            $repeater2->add_control(
                'style2_award_title',
                [
                    'label'       => esc_html__('Award Title', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => 'Creative Spark',
                    'label_block' => true,
                ]
            );

            $repeater2->add_control(
                'style2_award_status',
                [
                    'label'       => esc_html__('Status', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => 'Winner',
                    'label_block' => true,
                ]
            );

            $repeater2->add_control(
                'style2_award_organization',
                [
                    'label'       => esc_html__('Organization', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => 'PixelCrafters',
                    'label_block' => true,
                ]
            );
            $repeater2->add_control(
                'style2_link_view_text',
                [
                    'label'       => esc_html__('Link View Text', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('View', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );
            $repeater2->add_control(
                'style2_award_link',
                [
                    'label'       => esc_html__('Link', 'axero-toolkit'),
                    'type'        => Controls_Manager::URL,
                    'placeholder' => esc_html__('https://your-link.com', 'axero-toolkit'),
                    'default'     => [
                        'url' => '#',
                    ],
                ]
            );

            $repeater2->add_control(
                'style2_award_image',
                [
                    'label'   => esc_html__('Image', 'axero-toolkit'),
                    'type'    => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ]
            );

            $this->add_control(
                'style2_recognitions_list',
                [
                    'label'       => esc_html__('Recognitions List', 'axero-toolkit'),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $repeater2->get_controls(),
                    'default'     => [
                        [
                            'style2_award_title'        => 'Creative Spark',
                            'style2_award_status'       => 'Winner',
                            'style2_award_organization' => 'PixelCrafters',
                        ],
                        [
                            'style2_award_title'        => 'Tech Visionary',
                            'style2_award_status'       => 'Winner',
                            'style2_award_organization' => 'VisionaryTech',
                        ],
                    ],
                    'title_field' => '{{{ style2_award_title }}}',
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
            // Style Tab 1
            $this->start_controls_section(
                'style_tab_1',
                [
                    'label'     => esc_html__('Style 1', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            // Year Text
            $this->add_control(
                'year_text_heading',
                [
                    'label'     => esc_html__('Year Text', 'axero-toolkit'),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'year_text_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .achievements-list .item .left-side span' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'year_text_typography',
                    'selector' => '{{WRAPPER}} .achievements-list .item .left-side span',
                ]
            );

            // Icon Box
            $this->add_control(
                'icon_box_heading',
                [
                    'label'     => esc_html__('Icon Box', 'axero-toolkit'),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'icon_box_bg_color',
                [
                    'label'     => esc_html__('Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .achievements-list .item:hover .left-side .icon' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'icon_color',
                [
                    'label'     => esc_html__('Icon Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .achievements-list .item .icon i'   => 'color: {{VALUE}}',
                        '{{WRAPPER}} .achievements-list .item .icon svg' => 'fill: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'icon_hover_color',
                [
                    'label'     => esc_html__('Icon Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .achievements-list .item:hover .icon i'   => 'color: {{VALUE}}',
                        '{{WRAPPER}} .achievements-list .item:hover .icon svg' => 'fill: {{VALUE}}',
                    ],
                ]
            );
            $this->add_responsive_control(
                'icon_size',
                [
                    'label'      => esc_html__('Size', 'axero-toolkit'),
                    'type'       => Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range'      => [
                        'px' => [
                            'min' => 10,
                            'max' => 100,
                        ],
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} .achievements-list .item .icon i'   => 'font-size: {{SIZE}}{{UNIT}}',
                        '{{WRAPPER}} .achievements-list .item .icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}',
                    ],
                ]
            );

            // Number Box
            $this->add_control(
                'number_box_heading',
                [
                    'label'     => esc_html__('Number Box', 'axero-toolkit'),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'number_text_color',
                [
                    'label'     => esc_html__('Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .achievements-list .item .right-side .number' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'number_border_color',
                [
                    'label'     => esc_html__('Border Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .achievements-list .item .right-side .number' => 'border-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'number_hover_color',
                [
                    'label'     => esc_html__('Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .achievements-list .item:hover .right-side .number' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'number_typography',
                    'selector' => '{{WRAPPER}} .achievements-list .item .right-side .number',
                ]
            );

            // Link Button
            $this->add_control(
                'link_button_heading',
                [
                    'label'     => esc_html__('Link Button', 'axero-toolkit'),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'link_button_bg_color',
                [
                    'label'     => esc_html__('Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .achievements-list .item .right-side .link-btn' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'link_button_hover_bg_color',
                [
                    'label'     => esc_html__('Hover Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .achievements-list .item:hover .right-side .link-btn' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->end_controls_section();
            // Style Tab for Style 2
            $this->start_controls_section(
                'style2_award_style',
                [
                    'label'     => esc_html__('Style 2 Award Style', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style2',
                    ],
                ]
            );

            // Title Style
            $this->add_control(
                'style2_title_color',
                [
                    'label'     => esc_html__('Title Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awards-recognitions-list .item .title' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'style2_title_hover_color',
                [
                    'label'     => esc_html__('Title Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awards-recognitions-list .item:hover .title' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style2_title_typography',
                    'selector' => '{{WRAPPER}} .awards-recognitions-list .item .title',
                ]
            );

            // Image Style
            $this->add_control(
                'style2_image_width',
                [
                    'label'      => esc_html__('Image Width', 'axero-toolkit'),
                    'type'       => Controls_Manager::SLIDER,
                    'size_units' => ['px', '%'],
                    'range'      => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                        ],
                        '%'  => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} .awards-recognitions-list .item .image img' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'style2_image_height',
                [
                    'label'      => esc_html__('Image Height', 'axero-toolkit'),
                    'type'       => Controls_Manager::SLIDER,
                    'size_units' => ['px', '%'],
                    'range'      => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                        ],
                        '%'  => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} .awards-recognitions-list .item .image img' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'style2_image_border_radius',
                [
                    'label'      => esc_html__('Image Border Radius', 'axero-toolkit'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .awards-recognitions-list .item .image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            // Title Two Style
            $this->add_control(
                'style2_title_two_color',
                [
                    'label'     => esc_html__('Title Two Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awards-recognitions-list .item .title.two' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'style2_title_two_hover_color',
                [
                    'label'     => esc_html__('Title Two Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awards-recognitions-list .item:hover .title.two' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style2_title_two_typography',
                    'selector' => '{{WRAPPER}} .awards-recognitions-list .item .title.two',
                ]
            );

            // Title Three Style
            $this->add_control(
                'style2_title_three_color',
                [
                    'label'     => esc_html__('Title Three Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awards-recognitions-list .item .title.three' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'style2_title_three_hover_color',
                [
                    'label'     => esc_html__('Title Three Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awards-recognitions-list .item:hover .title.three' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style2_title_three_typography',
                    'selector' => '{{WRAPPER}} .awards-recognitions-list .item .title.three',
                ]
            );

            // Link Button Style
            $this->add_control(
                'style2_link_button_color',
                [
                    'label'     => esc_html__('Link Button Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awards-recognitions-list .item .link-btn' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'style2_link_button_hover_color',
                [
                    'label'     => esc_html__('Link Button Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awards-recognitions-list .item:hover .link-btn' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'style2_link_button_bg_color',
                [
                    'label'     => esc_html__('Link Button Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awards-recognitions-list .item .link-btn i' => 'background-color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'style2_link_button_hover_bg_color',
                [
                    'label'     => esc_html__('Link Button Hover Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awards-recognitions-list .item:hover .link-btn i' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_section();

        }

        protected function render()
        {
            $settings = $this->get_settings_for_display();
            /* The above PHP code is checking if the value of the 'style_selection' key in the  array is
equal to 'style1'. If the condition is true, it outputs HTML code for "style 1". */

            if ($settings['style_selection'] === 'style1') {
            ?>
            <!-- style 1 -->

          <div class="awards-area">
            <div class="container">
                <div class="achievements-list" data-cues="slideInUp">
                    <?php foreach ($settings['awards_list'] as $item): ?>
                    <div class="item">
                        <div class="row align-items-center">
                            <div class="col-xxl-6 col-lg-4 col-md-3">
                                <div class="left-side d-flex justify-content-between align-items-center">
                                    <span class="d-block">
                                        <?php echo esc_html($item['year']); ?>
                                    </span>
                                    <div class="icon text-center rounded-circle position-relative">
                                          <i class="<?php echo esc_attr($item['icon_list']['value']); ?>" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-lg-8 col-md-9">
                                <div class="right-side d-md-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="number d-inline-block rounded-circle text-center">
                                            <?php echo esc_html($item['number']); ?>
                                        </div>
                                        <h3 class="mb-0">
                                            <a href="<?php echo esc_url($item['permalink']['url']); ?>" target="_blank">
                                                <?php echo esc_html($item['title']); ?>
                                            </a>
                                        </h3>
                                    </div>
                                    <a href="<?php echo esc_url($item['permalink']['url']); ?>" target="_blank" class="link-btn d-inline-block rounded-circle text-center">
                                        <img src="<?php echo esc_url($item['light_image']['url']); ?>" alt="arrow-icon">
                                        <img src="<?php echo esc_url($item['dark_image']['url']); ?>" alt="arrow-icon">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <?php
            } elseif ($settings['style_selection'] === 'style2') {
                    ?>
            <!-- style 2 -->
            <div class="awards-area">
            <div class="container">
                <div class="awards-recognitions-list" data-cues="slideInUp">
                <?php if (! empty($settings['style2_recognitions_list'])): ?>
<?php foreach ($settings['style2_recognitions_list'] as $item): ?>
                    <div class="item position-relative">
                        <div class="row align-items-center">
                        <div class="col-lg-4 col-md-4">
                            <span class="title d-block">
                            <?php echo esc_html($item['style2_award_title']); ?>
                            </span>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <span class="title two d-block">
                            <?php echo esc_html($item['style2_award_status']); ?>
                            </span>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <span class="title three d-block">
                            <?php echo esc_html($item['style2_award_organization']); ?>
                            </span>
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <?php if (! empty($item['style2_award_link']['url'])): ?>
                            <a href="<?php echo esc_url($item['style2_award_link']['url']); ?>" target="_blank" class="link-btn d-flex align-items-center justify-content-md-end">
                                <i class="ri-arrow-right-up-line"></i>
                                <?php echo esc_html($item['style2_link_view_text']); ?>
                            </a>
                            <?php endif; ?>
                        </div>
                        </div>
                        <?php if (! empty($item['style2_award_image']['url'])): ?>
                        <div class="image">
                            <img src="<?php echo esc_url($item['style2_award_image']['url']); ?>" alt="recognitions-image">
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
<?php endif; ?>
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

    $widgets_manager->register(new axero_award_list());