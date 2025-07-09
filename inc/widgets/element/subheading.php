<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_subheading extends Widget_Base
    {

        public function get_name()
        {
            return 'Header-subheading';
        }

        public function get_title()
        {
            return __('Sub Heading', 'axero-toolkit');
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
                        'style4' => esc_html__('Style 4', ' axero-toolkit'),
                        'style5' => esc_html__('Style 5', ' axero-toolkit'),
                    ],
                ]
            );

            $this->end_controls_section();

            $this->start_controls_section(
                'title_section',
                [
                    'label'     => esc_html__('Title', 'axero-toolkit'),
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
                ]
            );

            $this->add_control(
                'title_text',
                [
                    'label'       => esc_html__('Title Text', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Introduction', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );
            $this->end_controls_section();
            $this->start_controls_section(
                'title_section_style2',
                [
                    'label'     => esc_html__('Title Style 2', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'style_selection' => 'style2',
                    ],
                ]
            );

            $this->add_control(
                'title_text_style2',
                [
                    'label'       => esc_html__('Title Text', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Sub Heading', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'title_section_style4',
                [
                    'label'     => esc_html__('Title Style 4', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'style_selection' => 'style4',
                    ],
                ]
            );

            $this->add_control(
                'title_text_style4',
                [
                    'label'       => esc_html__('Title Text', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('ABOUT US', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'style4_image',
                [
                    'label'   => esc_html__('Right Arrow Image', 'axero-toolkit'),
                    'type'    => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => get_template_directory_uri() . '/assets/images/icons/arrow_long_right.svg',
                    ],
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'title_section_style5',
                [
                    'label'     => esc_html__('Title Style 5', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'style_selection' => 'style5',
                    ],
                ]
            );
            $this->add_control(
                'style5_switch_sides',
                [
                    'label'        => esc_html__('Switch Image Side', 'axero-toolkit'),
                    'type'         => Controls_Manager::SWITCHER,
                    'label_on'     => esc_html__('Right', 'axero-toolkit'),
                    'label_off'    => esc_html__('Left', 'axero-toolkit'),
                    'return_value' => 'yes',
                    'default'      => 'no',
                    'prefix_class' => 'right_side',
                    'condition'    => [
                        'style_selection' => 'style5',
                    ],
                ]
            );

            $this->add_control(
                'title_text_style5',
                [
                    'label'       => esc_html__('Title Text', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Services', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'style5_image',
                [
                    'label'   => esc_html__('Vector Image', 'axero-toolkit'),
                    'type'    => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => get_template_directory_uri() . '/assets/images/icons/vector.svg',
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
                        '{{WRAPPER}} .creative-agency-section-title .left-side .number div' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'title_number_border_color',
                [
                    'label'     => esc_html__('Border Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .creative-agency-section-title .left-side .number div' => 'border-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'title_number_typography',
                    'selector' => '{{WRAPPER}} .creative-agency-section-title .left-side .number div',
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
                        'style_selection' => 'style2',
                    ],
                ]
            );

            $this->add_control(
                'title_text_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .creative-agency-section-title .left-side' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .digital-agency-banner-content .sub-title' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'title_text_typography',
                    'selector' => '{{WRAPPER}} .creative-agency-section-title .left-side ',
                    'selector' => '{{WRAPPER}} .digital-agency-banner-content .sub-title',
                ]
            );

            $this->end_controls_section();

            // Sub-title Before Style
            $this->start_controls_section(
                'subtitle_before_style',
                [
                    'label'     => esc_html__('Sub-title Before', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style2',
                    ],
                ]
            );

            $this->add_control(
                'subtitle_before_bg_color',
                [
                    'label'     => esc_html__('Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .digital-agency-banner-content .sub-title::before' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->end_controls_section();
            $this->start_controls_section(
                'style3_content',
                [
                    'label'     => esc_html__('Style 3 Content', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'style_selection' => 'style3',
                    ],
                ]
            );

            $this->add_control(
                'style3_image',
                [
                    'label'   => esc_html__('Image', 'axero-toolkit'),
                    'type'    => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => get_template_directory_uri() . '/assets/images/abouts/element.svg',
                    ],
                ]
            );

            $this->end_controls_section();
            // Style 4 Text Style
            $this->start_controls_section(
                'style4_text_style',
                [
                    'label'     => esc_html__('Style 4 Text', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style4',
                    ],
                ]
            );

            // Text Color Control
            $this->add_control(
                'style4_text_color',
                [
                    'label'     => esc_html__('Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .about_us_title span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Hover Text Color Control
            $this->add_control(
                'style4_text_hover_color',
                [
                    'label'     => esc_html__('Hover Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .about_us_title:hover span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Typography Control
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style4_text_typography',
                    'selector' => '{{WRAPPER}} .about_us_title span',
                ]
            );

            // Background Color Control
            // Gap Control
            $this->add_control(
                'style4_gap',
                [
                    'label'      => esc_html__('Gap', 'axero-toolkit'),
                    'type'       => Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range'      => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default'    => [
                        'unit' => 'px',
                        'size' => 15,
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} .about_us_title span' => 'gap: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            // Padding Control
            $this->add_responsive_control(
                'style4_padding',
                [
                    'label'      => esc_html__('Padding', 'axero-toolkit'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px'],
                    'default'    => [
                        'top'    => 7,
                        'right'  => 19.5,
                        'bottom' => 7,
                        'left'   => 19.5,
                        'unit'   => 'px',
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} .about_us_title span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            // Background Color Control
            $this->add_control(
                'style4_background_color',
                [
                    'label'     => esc_html__('Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .about_us_title span' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            // Hover Background Color Control
            $this->add_control(
                'style4_background_hover_color',
                [
                    'label'     => esc_html__('Hover Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .about_us_title span:hover' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            // Border Control
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name'     => 'style4_border',
                    'selector' => '{{WRAPPER}} .about_us_title span',
                    'default'  => '1px solid #B9BCC3',
                ]
            );

            // Border Radius Control
            $this->add_control(
                'style4_border_radius',
                [
                    'label'      => esc_html__('Border Radius', 'axero-toolkit'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'default'    => [
                        'unit'   => 'px',
                        'top'    => 30,
                        'right'  => 30,
                        'bottom' => 30,
                        'left'   => 30,
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} .about_us_title span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->end_controls_section();
            $this->start_controls_section(
                'style5_text_style',
                [
                    'label'     => esc_html__('Style 5 Text', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style5',
                    ],
                ]
            );

            // Text Color Control
            $this->add_control(
                'style5_text_color',
                [
                    'label'     => esc_html__('Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .section_title.style_three h2' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Typography Control
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'style5_typography',
                    'selector'       => '{{WRAPPER}} .section_title.style_three h2',
                    'fields_options' => [
                        'font_weight' => [
                            'default' => '800',
                        ],
                        'font_size'   => [
                            'default' => [
                                'unit' => 'px',
                                'size' => '60',
                            ],
                        ],
                        'line_height' => [
                            'default' => [
                                'unit' => 'em',
                                'size' => '1.3',
                            ],
                        ],
                    ],
                ]
            );
            // Line Color Control
            $this->add_control(
                'style5_line_color',
                [
                    'label'     => esc_html__('Line Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .section_title.style_three::before' => 'background-color: {{VALUE}};',
                    ],
                ]
            );
            // Border Control
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name'     => 'style5_title_border',
                    'label'    => esc_html__('Border', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .section_title.style_three .title',
                ]
            );

            // Border Radius Control
            $this->add_control(
                'style5_title_border_radius',
                [
                    'label'      => esc_html__('Border Radius', 'axero-toolkit'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors'  => [
                        '{{WRAPPER}} .section_title.style_three .title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            // Margin Control
            $this->add_responsive_control(
                'style5_title_margin',
                [
                    'label'      => esc_html__('Margin', 'axero-toolkit'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors'  => [
                        '{{WRAPPER}} .section_title.style_three .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            // Padding Control
            $this->add_responsive_control(
                'style5_title_padding',
                [
                    'label'      => esc_html__('Padding', 'axero-toolkit'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors'  => [
                        '{{WRAPPER}} .section_title.style_three .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                <div class="creative-agency-section-title">
                        <div class="left-side">
             <?php if (! empty($settings['title_number'])): ?>
                            <div class="number d-flex align-items-center">
                            <div><?php echo esc_html($settings['title_number']); ?></div>
                            <?php endif; ?>
<?php echo esc_html($settings['title_text']); ?>
                            </div>
                        </div>
                    </div>



        <?php
            } elseif ($settings['style_selection'] === 'style2') {
                    ?>
            <!-- style 2 -->
             <div class="digital-agency-banner-content">
            <span class="sub-title d-block position-relative">
                <?php echo esc_html($settings['title_text_style2']); ?>
            </span>
            </div>

        <?php
            } elseif ($settings['style_selection'] === 'style3') {
                    ?>
            <!-- style 3 -->
               <img src="<?php echo esc_url($settings['style3_image']['url']); ?>" class="rotateme" alt="element-image">

    <?php
        } elseif ($settings['style_selection'] === 'style4') {
                ?>
            <!-- style 4 -->
                <div class="about_us_title d-inline-block" data-cue="slideInUp">
                    <span class="d-flex align-items-center text-uppercase">
                        <?php echo esc_html($settings['title_text_style4']); ?>
<?php if (! empty($settings['style4_image']['url'])): ?>
                            <img src="<?php echo esc_url($settings['style4_image']['url']); ?>" alt="<?php echo esc_attr__('Right arrow', 'axero-toolkit'); ?>">
                        <?php endif; ?>
                    </span>
                </div>

    <?php } elseif ($settings['style_selection'] === 'style5') {
                ?>
            <!-- style 5 -->

            <div class="section_title position-relative style_three text_animation                                                                                                                                                                                                                                                        <?php echo esc_attr($settings['style5_switch_sides'] === 'yes' ? 'right_side' : ''); ?>">
                <div class="title position-relative d-inline-block">
                    <h2 class="mb-0 fw-black text-uppercase">
                        <?php echo esc_html($settings['title_text_style5']); ?>
                    </h2>
                    <?php if (! empty($settings['style5_image']['url'])): ?>
                        <img src="<?php echo esc_url($settings['style5_image']['url']); ?>" alt="<?php echo esc_attr__('Vector image', 'axero-toolkit'); ?>">
                    <?php endif; ?>
                </div>
            </div>

             <?php
                 }
                     }
                 }

             $widgets_manager->register(new axero_subheading());
