<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_counter extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_counter';
        }

        public function get_title()
        {
            return __('Axero Counter', 'axero-toolkit');
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
            // Counter Tab
            $this->start_controls_section(
                'section_counter',
                [
                    'label' => esc_html__('Counter', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            $this->add_control(
                'counter_items',
                [
                    'label'       => esc_html__('Counter Items', 'axero-toolkit'),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => [
                        [
                            'name'    => 'number',
                            'label'   => esc_html__('Number', 'axero-toolkit'),
                            'type'    => \Elementor\Controls_Manager::TEXT,
                            'default' => '25',
                        ],
                        [
                            'name'    => 'suffix',
                            'label'   => esc_html__('Suffix', 'axero-toolkit'),
                            'type'    => \Elementor\Controls_Manager::TEXT,
                            'default' => '+',
                        ],
                        [
                            'name'    => 'quote',
                            'label'   => esc_html__('Quote', 'axero-toolkit'),
                            'type'    => \Elementor\Controls_Manager::TEXT,
                            'default' => '//',
                        ],
                        [
                            'name'    => 'title',
                            'label'   => esc_html__('Title', 'axero-toolkit'),
                            'type'    => \Elementor\Controls_Manager::TEXT,
                            'default' => 'Awards & Recognitions',
                        ],
                    ],
                    'default'     => [
                        [
                            'number' => '25',
                            'suffix' => '+',
                            'quote'  => '//',
                            'title'  => 'Awards & Recognitions',
                        ],
                        [
                            'number' => '98',
                            'suffix' => '%',
                            'quote'  => '//',
                            'title'  => 'Clients Satisfaction',
                        ],
                        [
                            'number' => '15',
                            'suffix' => '+',
                            'quote'  => '//',
                            'title'  => 'Years of experience in particular field',
                        ],
                        [
                            'number' => '12',
                            'suffix' => 'K',
                            'quote'  => '//',
                            'title'  => 'Cases overseen',
                        ],
                    ],
                    'title_field' => '{{{ title }}}',
                ]
            );

            $this->end_controls_section();

        // Start a new controls section for Style2 repeater controls
        $this->start_controls_section(
            'section_style2_items',
            [
                'label' => esc_html__('Style2 Items', 'axero-toolkit'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'style_selection' => 'style2',
                ],
            ]
        );

        // Add repeater controls for style2 with prefix 'style2_'
        $repeater2 = new \Elementor\Repeater();

        $repeater2->add_control(
            'style2_number',
            [
                'label'   => esc_html__('Number', 'axero-toolkit'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '15',
            ]
        );

        $repeater2->add_control(
            'style2_suffix',
            [
                'label'   => esc_html__('Suffix', 'axero-toolkit'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '',
            ]
        );

        $repeater2->add_control(
            'style2_title',
            [
                'label'   => esc_html__('Title', 'axero-toolkit'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Year Experience',
            ]
        );

        $repeater2->add_control(
            'style2_content',
            [
                'label'   => esc_html__('Content', 'axero-toolkit'),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Gain access to a network of trusted recruitment agencies specializing in tech talent acquisition. Collaborate to find the perfect match for your team for a fixed price.',
            ]
        );

        $this->add_control(
            'style2_items',
            [
                'label'       => esc_html__('Style2 Items', 'axero-toolkit'),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater2->get_controls(),
                'default'     => [
                    [
                        'style2_number' => '15',
                        'style2_suffix' => '',
                        'style2_title'  => 'Year Experience',
                        'style2_content' => 'Gain access to a network of trusted recruitment agencies specializing in tech talent acquisition. Collaborate to find the perfect match for your team for a fixed price.',
                    ],
                    [
                        'style2_number' => '25',
                        'style2_suffix' => 'K',
                        'style2_title'  => '+ Happy Customer',
                        'style2_content' => 'Gain access to a network of trusted recruitment agencies specializing in tech talent acquisition. Collaborate to find the perfect match for your team for a fixed price.',
                    ],
                    [
                        'style2_number' => '8',
                        'style2_suffix' => 'K',
                        'style2_title'  => 'Project Completed',
                        'style2_content' => 'Gain access to a network of trusted recruitment agencies specializing in tech talent acquisition. Collaborate to find the perfect match for your team for a fixed price.',
                    ],
                    [
                        'style2_number' => '98',
                        'style2_suffix' => '',
                        'style2_title'  => 'Team Member',
                        'style2_content' => 'Gain access to a network of trusted recruitment agencies specializing in tech talent acquisition. Collaborate to find the perfect match for your team for a fixed price.',
                    ],
                ],
                'title_field' => '{{{ style2_title }}}',
            ]
        );

        $this->end_controls_section();
       
        // Style3 Content Controls Tab
        $this->start_controls_section(
            'style3_content_section',
            [
                'label' => esc_html__('Style 3 Content', 'axero-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'style_selection' => 'style3',
                ],
            ]
        );

        $repeater3 = new \Elementor\Repeater();

        $repeater3->add_control(
            'style3_number',
            [
                'label'   => esc_html__('Number', 'axero-toolkit'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '50',
            ]
        );

        $repeater3->add_control(
            'style3_suffix',
            [
                'label'   => esc_html__('Suffix', 'axero-toolkit'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '+',
            ]
        );

        $repeater3->add_control(
            'style3_title',
            [
                'label'   => esc_html__('Title', 'axero-toolkit'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Projects Completed',
            ]
        );

        $this->add_control(
            'style3_items',
            [
                'label'       => esc_html__('Style3 Items', 'axero-toolkit'),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater3->get_controls(),
                'default'     => [
                    [
                        'style3_number' => '50',
                        'style3_suffix' => '+',
                        'style3_title'  => 'Projects Completed',
                    ],
                    [
                        'style3_number' => '90',
                        'style3_suffix' => '+',
                        'style3_title'  => 'CREATIVE MINDS',
                    ],
                    [
                        'style3_number' => '20',
                        'style3_suffix' => '+',
                        'style3_title'  => 'YEARS OF EXPERIENCE',
                    ],
                    [
                        'style3_number' => '30',
                        'style3_suffix' => '+',
                        'style3_title'  => 'AWWARDS & RECOGNITION',
                    ],
                ],
                'title_field' => '{{{ style3_title }}}',
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
            // Number Style
            $this->start_controls_section(
                'number_style',
                [
                    'label' => esc_html__('Number Style', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            $this->add_control(
                'number_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '#ffffff',
                    'selectors' => [
                        '{{WRAPPER}} .funfact_box .number' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'number_typography',
                    'selector' => '{{WRAPPER}} .funfact_box .number',
                ]
            );

            $this->end_controls_section();

            // Quote Style
            $this->start_controls_section(
                'quote_style',
                [
                    'label' => esc_html__('Quote Style', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            $this->add_control(
                'quote_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '#ffffff',
                    'selectors' => [
                        '{{WRAPPER}} .funfact_box .quote' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'quote_typography',
                    'selector' => '{{WRAPPER}} .funfact_box .quote',
                ]
            );

            $this->end_controls_section();

            // Title Style
            $this->start_controls_section(
                'title_style',
                [
                    'label' => esc_html__('Title Style', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            $this->add_control(
                'title_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '#ffffff',
                    'selectors' => [
                        '{{WRAPPER}} .funfact_box .title' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'title_typography',
                    'selector' => '{{WRAPPER}} .funfact_box .title',
                ]
            );

            $this->end_controls_section();
        // Style2 Tab Style Controls Section
        $this->start_controls_section(
            'style2_style',
            [
                'label' => esc_html__('Style 2 Styling', 'axero-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style2',
                ],
            ]
        );

        // Style2 Dot Background Color
        $this->add_control(
            'style2_dot_bg_color',
            [
                'label' => esc_html__('Dot Background Color', 'axero-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awesome_funfacts_inner .awesome_funfacts_list .item_box .number::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Style2 Number Symbol Color & Typography
        $this->add_control(
            'style2_number_color',
            [
                'label' => esc_html__('Number Color', 'axero-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awesome_funfacts_inner .awesome_funfacts_list .item_box .number h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style2_number_typography',
                'selector' => '{{WRAPPER}} .awesome_funfacts_inner .awesome_funfacts_list .item_box .number h3',
            ]
        );

        // Style2 Sub Title Color & Typography
        $this->add_control(
            'style2_subtitle_color',
            [
                'label' => esc_html__('Sub Title Color', 'axero-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awesome_funfacts_inner .awesome_funfacts_list .item_box .number .sub_title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style2_subtitle_typography',
                'selector' => '{{WRAPPER}} .awesome_funfacts_inner .awesome_funfacts_list .item_box .number .sub_title',
            ]
        );

        // Style2 Description Color & Typography
        $this->add_control(
            'style2_description_color',
            [
                'label' => esc_html__('Description Color', 'axero-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awesome_funfacts_inner .awesome_funfacts_list .item_box .content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style2_description_typography',
                'selector' => '{{WRAPPER}} .awesome_funfacts_inner .awesome_funfacts_list .item_box .content p',
            ]
        );

        // Style2 Background Controls
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'style2_background',
                'label' => esc_html__('Background', 'axero-toolkit'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .awesome_funfacts_inner',
            ]
        );

        // Style2 Border Controls
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'style2_border',
                'selector' => '{{WRAPPER}} .awesome_funfacts_inner',
            ]
        );

        // Style2 Padding Controls
        $this->add_responsive_control(
            'style2_padding',
            [
                'label' => esc_html__('Padding', 'axero-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .awesome_funfacts_inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Style2 Margin Controls
        $this->add_responsive_control(
            'style2_margin',
            [
                'label' => esc_html__('Margin', 'axero-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .awesome_funfacts_inner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        // Style3 Content Style
        $this->start_controls_section(
            'style3_content_style',
            [
                'label' => esc_html__('Style 3 Content', 'axero-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style3',
                ],
            ]
        );

        // Item Background Color
        $this->add_control(
            'style3_item_bg_color',
            [
                'label' => esc_html__('Item Background Color', 'axero-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .funfact_item' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Number Style
        $this->add_control(
            'style3_number_heading',
            [
                'label' => esc_html__('Number', 'axero-toolkit'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'style3_number_color',
            [
                'label' => esc_html__('Color', 'axero-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .funfact_item .number' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style3_number_typography',
                'selector' => '{{WRAPPER}} .funfact_item .number',
            ]
        );

        // Title Style
        $this->add_control(
            'style3_title_heading',
            [
                'label' => esc_html__('Title', 'axero-toolkit'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'style3_title_color',
            [
                'label' => esc_html__('Color', 'axero-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .funfact_item .title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style3_title_typography',
                'selector' => '{{WRAPPER}} .funfact_item .title',
            ]
        );

        

        }

        protected function render()
        {
            $settings = $this->get_settings_for_display();

            if ($settings['style_selection'] === 'style1') {
            ?>
            <!-- style 1 -->

            <div class="funfacts_area ">
                <div class="container">
                    <div class="row" data-cues="slideInUp" data-group="funfacts_list">
                        <?php if (! empty($settings['counter_items']) && is_array($settings['counter_items'])): ?>
                        <?php foreach ($settings['counter_items'] as $item): ?>
                                <div class="col-sm-6">
                                    <div class="funfact_box">
                                        <div class="number lh-1 fw-bold ">
                                            <span class="counter_number"><?php echo esc_html($item['number']); ?></span><?php echo esc_html($item['suffix']); ?>
                                        </div>
                                        <div class="quote  fw-medium lh-1">
                                            <?php echo esc_html($item['quote']); ?>
                                        </div>
                                        <div class="title text-lg-end text-uppercase fw-medium">
                                            <?php echo esc_html($item['title']); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        <?php
            } elseif ($settings['style_selection'] === 'style2') {
                    ?>
            <!-- style 2 -->
                  <div class="awesome_funfacts_area">
                      <div class="awesome_funfacts_inner">
                          <div class="awesome_funfacts_list">
                              <?php if (!empty($settings['style2_items']) && is_array($settings['style2_items'])): ?>
                                  <?php foreach ($settings['style2_items'] as $item): ?>
                                      <div class="item_box">
                                          <div class="row align-items-center">
                                              <div class="col-xxl-8 col-lg-6">
                                                  <div class="number position-relative">
                                                      <div class="d-flex align-items-center">
                                                          <h3 class="mb-0 lh-1">
                                                              <span class="counter_number">
                                                                  <?php echo esc_html($item['style2_number']); ?>
                                                              </span>
                                                              <?php if (!empty($item['style2_suffix'])): ?>
                                                                  <?php echo esc_html($item['style2_suffix']); ?>
                                                              <?php endif; ?>
                                                          </h3>
                                                          <span class="sub_title d-block text-uppercase fw-medium">
                                                              <?php echo esc_html($item['style2_title']); ?>
                                                          </span>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-xxl-4 col-lg-6">
                                                  <div class="content text_animation">
                                                      <p>
                                                          <?php echo esc_html($item['style2_content']); ?>
                                                      </p>
                                                  </div>
                                              </div>
                                          </div>
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

            <div class="funfacts_area_two pb_125">
                <div class="container-fluid max_w_1560px">
                    <div class="row" data-cues="slideInUp" data-group="funfacts_list">
                        <?php if (!empty($settings['style3_items']) && is_array($settings['style3_items'])): ?>
                            <?php foreach ($settings['style3_items'] as $item): ?>
                                <div class="col-sm-6">
                                    <div class="funfact_item">
                                        <div class="number lh-1 fw-black">
                                            <span class="counter_number">
                                                <?php echo esc_html($item['style3_number']); ?>
                                            </span>
                                            <?php if (!empty($item['style3_suffix'])): ?>
                                                <?php echo esc_html($item['style3_suffix']); ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="title text-lg-end text-uppercase fw-semibold">
                                            <?php echo esc_html($item['style3_title']); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

    <?php
        }
            }
        }

    $widgets_manager->register(new axero_counter());