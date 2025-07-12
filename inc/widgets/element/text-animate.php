<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_text_animate extends Widget_Base
    {

        public function get_name()
        {
            return 'Header-text-animate';
        }

        public function get_title()
        {
            return __('Text Animate', 'axero-toolkit');
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
                    'label' => esc_html__('Section Selection', ' axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'style_selection',
                [
                    'label'   => esc_html__('Select Section', ' axero-toolkit'),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'style1',
                    'options' => [
                        'style1' => esc_html__('Style 1', ' axero-toolkit'),
                        'style2' => esc_html__('Style 2', ' axero-toolkit'),
                        'style3' => esc_html__('Style 3', ' axero-toolkit'),
                    ],
                ]
            );

            $this->end_controls_section();
            // Text Content Section
            $this->start_controls_section(
                'text_content',
                [
                    'label'     => esc_html__('Text Content', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            $this->add_control(
                'title_number',
                [
                    'label'       => esc_html__('Title Number', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('01', 'axero-toolkit'),
                    'label_block' => true,
                    'condition'   => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            $this->add_control(
                'title_text',
                [
                    'label'       => esc_html__('Title Text', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Introduction', 'axero-toolkit'),
                    'label_block' => true,
                    'condition'   => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            $this->add_control(
                'description_text',
                [
                    'label'       => esc_html__('Description', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXTAREA,
                    'condition'   => [
                        'style_selection' => 'style1',
                    ],
                    'default'     => esc_html__('We specialize in crafting innovative brand experiences that seamlessly blend creativity and strategy. Our team is dedicated to inspiring audiences, driving engagement, and fostering growth through tailored, impactful solutions. 🚀', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->end_controls_section();

            /**
             * Content Tab: Style 2 Controls
             * -----------------------------
             * Adds controls for Style 2 content tab in the Elementor widget.
             */
            $this->start_controls_section(
                'style2_content_section',
                [
                    'label'     => esc_html__('Style 2 Content', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'style_selection' => 'style2',
                    ],
                ]
            );

            $this->add_control(
                'style2_description_text',
                [
                    'label'       => esc_html__('Description', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXTAREA,
                    'default'     => esc_html__('wasn’t just about visuals—it was a powerful force for business transformation.', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->end_controls_section();

            /**
             * Content Tab: Style 3 Controls
             * -----------------------------
             * Adds controls for Style 3 content tab in the Elementor widget.
             */
            $this->start_controls_section(
                'style3_content_section',
                [
                    'label'     => esc_html__('Style 3 Content', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'style_selection' => 'style3',
                    ],
                ]
            );

            $this->add_control(
                'style3_additional_text_1',
                [
                    'label'       => esc_html__('Additional Text 1', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('  Our California-based', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'style3_additional_text_2',
                [
                    'label'       => esc_html__('Additional Text 2', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('creative agency', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'style3_additional_text_3',
                [
                    'label'       => esc_html__('Additional Text 3', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('is known for combining creativity & expertise to deliver outstanding UI/UX designs with', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'style3_additional_text_4',
                [
                    'label'       => esc_html__('Additional Text 4', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('innovative', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'style3_additional_text_5',
                [
                    'label'       => esc_html__('Additional Text 5', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('ideas and user-friendly functionality.', 'axero-toolkit'),
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
            // content style controls tab
            // Title Number Style
            $this->start_controls_section(
                'title_number_style',
                [
                    'label'     => esc_html__('Title Number', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            $this->add_control(
                'title_number_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .brief-content .title .number' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'title_number_border_color',
                [
                    'label'     => esc_html__('Border Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .brief-content .title .number' => 'border-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'title_number_typography',
                    'selector' => '{{WRAPPER}} .brief-content .title .number',
                ]
            );

            $this->end_controls_section();

            // Title Text Style
            $this->start_controls_section(
                'title_text_style',
                [
                    'label'     => esc_html__('Title Text', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            $this->add_control(
                'title_text_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .brief-content h2.title-text' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'title_text_typography',
                    'selector' => '{{WRAPPER}} .brief-content h2.title-text',
                ]
            );

            $this->end_controls_section();

            // Description Style
            $this->start_controls_section(
                'description_style',
                [
                    'label'     => esc_html__('Description', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],

                ]
            );

            $this->add_control(
                'description_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .brief-content p' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'description_typography',
                    'selector' => '{{WRAPPER}} .brief-content p',
                ]
            );

            $this->end_controls_section();
            /**
             * Style Tab: Style 2 Description Controls
             * --------------------------------------
             * Adds controls for the Style 2 description text area in the Elementor widget.
             */
            $this->start_controls_section(
                'style2_description_style',
                [
                    'label'     => esc_html__('Description (Style 2)', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style2',
                    ],
                ]
            );
            $this->add_responsive_control(
                'style2_description_alignment',
                [
                    'label'     => esc_html__('Alignment', 'axero-toolkit'),
                    'type'      => Controls_Manager::CHOOSE,
                    'options'   => [
                        'left'   => [
                            'title' => esc_html__('Left', 'axero-toolkit'),
                            'icon'  => 'eicon-text-align-left',
                        ],
                        'center' => [
                            'title' => esc_html__('Center', 'axero-toolkit'),
                            'icon'  => 'eicon-text-align-center',
                        ],
                        'right'  => [
                            'title' => esc_html__('Right', 'axero-toolkit'),
                            'icon'  => 'eicon-text-align-right',
                        ],
                    ],
                    'default'   => 'left',
                    'selectors' => [
                        '{{WRAPPER}} .elementor-text-animate' => 'text-align: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'style2_description_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .elementor-text-animate' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style2_description_typography',
                    'selector' => '{{WRAPPER}} .elementor-text-animate',
                ]
            );

            $this->add_control(
                'style2_description_bg_color',
                [
                    'label'     => esc_html__('Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .elementor-text-animate' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style2_description_padding',
                [
                    'label'      => esc_html__('Padding', 'axero-toolkit'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors'  => [
                        '{{WRAPPER}} .elementor-text-animate' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'style2_description_border_radius',
                [
                    'label'      => esc_html__('Border Radius', 'axero-toolkit'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors'  => [
                        '{{WRAPPER}} .elementor-text-animate' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name'     => 'style2_description_border',
                    'selector' => '{{WRAPPER}} .elementor-text-animate',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Box_Shadow::get_type(),
                [
                    'name'     => 'style2_description_box_shadow',
                    'selector' => '{{WRAPPER}} .elementor-text-animate',
                ]
            );

            $this->end_controls_section();
            $this->start_controls_section(
                'style3_text_style',
                [
                    'label'     => esc_html__('Style 3 Text', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style3',
                    ],
                ]
            );

            $this->add_control(
                'style3_text_color',
                [
                    'label'     => esc_html__('Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awesome_about_us_title h2' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style3_typography',
                    'label'    => esc_html__('Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .awesome_about_us_title h2',
                ]
            );

            $this->add_control(
                'style3_span_text_color',
                [
                    'label'     => esc_html__('Span Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awesome_about_us_title h2 span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style3_span_typography',
                    'label'    => esc_html__('Span Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .awesome_about_us_title h2 span',
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
                <!-- Start Brief Area -->
        <div class="brief-area position-relative z-1">
            <div class="container">
                <div class="brief-content">
                    <?php if (! empty($settings['title_number']) || ! empty($settings['title_text'])): ?>
                    <div class="title d-flex align-items-center">
                        <?php if (! empty($settings['title_number'])): ?>
                        <div class="number">
                            <?php echo esc_html($settings['title_number']); ?>
                        </div>
                        <?php endif; ?>

                        <?php if (! empty($settings['title_text'])): ?>
                        <h2 class="title-text">
                            <?php echo esc_html($settings['title_text']); ?>
                        </h2>
                        <?php endif; ?>

                    </div>
                    <?php endif; ?>

                    <p class="on-scroll-font-color-change">
                        <?php if (! empty($settings['description_text'])): ?>
                        <?php echo esc_html($settings['description_text']); ?>
                        <?php endif; ?>
                    </p>
                </div>
            </div>
        </div>
        <!-- End Brief Area -->


        <?php
            } elseif ($settings['style_selection'] === 'style2') {
                    ?>
            <!-- style 2 -->

          <?php if (! empty($settings['style2_description_text'])): ?>
            <p class="elementor-text-animate">
                <?php echo wp_kses($settings['style2_description_text'], wp_kses_allowed_html('post')); ?>
            </p>
        <?php endif; ?>


        <?php
            } elseif ($settings['style_selection'] === 'style3') {
                    ?>
            <!-- style 3 -->

                <div class="awesome_about_us_title text_animation">
                    <h2 class="mb-0">
                        <?php if (! empty($settings['style3_additional_text_1'])): ?>
                        <?php echo esc_html($settings['style3_additional_text_1']); ?>
                        <?php endif; ?>

                        <?php if (! empty($settings['style3_additional_text_2'])): ?>
                            <span><?php echo esc_html($settings['style3_additional_text_2']); ?></span>
                        <?php endif; ?>

                        <?php if (! empty($settings['style3_additional_text_3'])): ?>
                        <?php echo esc_html($settings['style3_additional_text_3']); ?>
                        <?php endif; ?>

                        <?php if (! empty($settings['style3_additional_text_4'])): ?>
                            <span><?php echo esc_html($settings['style3_additional_text_4']); ?></span>
                        <?php endif; ?>

                        <?php if (! empty($settings['style3_additional_text_5'])): ?>
                        <?php echo esc_html($settings['style3_additional_text_5']); ?>
                        <?php endif; ?>
                    </h2>
                </div>
    <?php
        }
            }
        }

    $widgets_manager->register(new axero_text_animate());
