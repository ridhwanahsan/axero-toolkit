<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_button extends Widget_Base
    {

        public function get_name()
        {
            return 'header_button';
        }

        public function get_title()
        {
            return __('Button', 'axero-toolkit');
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
                    'label'   => esc_html__('Select Section', ' axero-toolkit'),
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
            $this->start_controls_section(
                'button_content',
                [
                    'label' => esc_html__('Button Content', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                        'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            $this->add_control(
                'button_text',
                [
                    'label'       => esc_html__('Text', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('View Services', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'button_icon',
                [
                    'label' => esc_html__('Icon', 'axero-toolkit'),
                    'type'  => Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'ri-arrow-right-line',
                        'library' => 'remix',
                    ],
                ]
            );

            $this->add_control(
                'button_link',
                [
                    'label' => esc_html__('Link', 'axero-toolkit'),
                    'type' => Controls_Manager::URL,
                    'placeholder' => esc_html__('https://your-link.com', 'axero-toolkit'),
                    'default' => [
                        'url' => '#',
                    ],
                ]
            );

            $this->end_controls_section();


            /**
             * Style2 Tab Content Section
             * -------------------------
             */
            $this->start_controls_section(
                'button_content_style2',
                [
                    'label' => esc_html__('Button Content (Style 2)', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'style_selection' => 'style2',
                    ],
                ]
            );

            $this->add_control(
                'button_text_style2',
                [
                    'label'       => esc_html__('Text', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Start a Project', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'button_icon_style2',
                [
                    'label' => esc_html__('Icon', 'axero-toolkit'),
                    'type'  => Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'ri-arrow-right-long-line',
                        'library' => 'remix',
                    ],
                ]
            );

            $this->add_control(
                'button_link_style2',
                [
                    'label' => esc_html__('Link', 'axero-toolkit'),
                    'type' => Controls_Manager::URL,
                    'placeholder' => esc_html__('https://your-link.com', 'axero-toolkit'),
                    'default' => [
                        'url' => '#',
                    ],
                ]
            );

            $this->end_controls_section();

            /**
             * Style3 Tab Content Section
             * -------------------------
             */
            $this->start_controls_section(
                'button_content_style3',
                [
                    'label' => esc_html__('Button Content (Style 3)', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'style_selection' => 'style3',
                    ],
                ]
            );

            $this->add_control(
                'button_text_style3',
                [
                    'label'       => esc_html__('Text', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Browse all services', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'button_icon_style3',
                [
                    'label' => esc_html__('Icon', 'axero-toolkit'),
                    'type'  => Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'ri-arrow-right-up-line',
                        'library' => 'remix',
                    ],
                ]
            );

            $this->add_control(
                'button_link_style3',
                [
                    'label' => esc_html__('Link', 'axero-toolkit'),
                    'type' => Controls_Manager::URL,
                    'placeholder' => esc_html__('https://your-link.com', 'axero-toolkit'),
                    'default' => [
                        'url' => 'services.html',
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
            // Button Style Section
            $this->start_controls_section(
                'button_style',
                [
                    'label' => esc_html__('Button Styling', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            // Text Colors
            $this->add_control(
                'button_text_color',
                [
                    'label'     => esc_html__('Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .default-btn' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'button_text_hover_color',
                [
                    'label'     => esc_html__('Text Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .default-btn:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );

            // Background Colors
            $this->add_control(
                'button_bg_color',
                [
                    'label'     => esc_html__('Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .default-btn' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'button_bg_hover_color',
                [
                    'label'     => esc_html__('Hover Background', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .default-btn:hover' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            // Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'button_typography',
                    'label'    => esc_html__('Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .default-btn',
                ]
            );

            // Icon Styling
            $this->add_control(
                'button_icon_color',
                [
                    'label'     => esc_html__('Icon Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .default-btn i' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .default-btn svg' => 'fill: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'button_icon_hover_color',
                [
                    'label'     => esc_html__('Icon Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .default-btn:hover i' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .default-btn:hover svg' => 'fill: {{VALUE}}',
                    ],
                ]
            );

            // Border Styling
            $this->add_control(
                'button_border_color',
                [
                    'label'     => esc_html__('Border Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .default-btn' => 'border-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'button_border_hover_color',
                [
                    'label'     => esc_html__('Hover Border Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .default-btn:hover' => 'border-color: {{VALUE}}',
                    ],
                ]
            );

            // Icon Size Control
            $this->add_responsive_control(
                'button_icon_size',
                [
                    'label' => esc_html__('Icon Size', 'axero-toolkit'),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => ['px', 'em', 'rem'],
                    'default' => [
                        'size' => 18,
                        'unit' => 'px',
                    ],
                    'range' => [
                        'px' => [
                            'min' => 1,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .default-btn i' => 'font-size: {{SIZE}}{{UNIT}}',
                        '{{WRAPPER}} .default-btn svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}',
                    ],
                ]
            );

            $this->end_controls_section();

            /**
             * Style2 Tab Style Controls Section
             * -------------------------------
             */
            $this->start_controls_section(
                'button_style2',
                [
                    'label' => esc_html__('Button Styling (Style 2)', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style2',
                    ],
                ]
            );

            // Text Color
            $this->add_control(
                'button_text_color_style2',
                [
                    'label'     => esc_html__('Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .primary_btn3' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Text Hover Color
            $this->add_control(
                'button_text_hover_color_style2',
                [
                    'label'     => esc_html__('Text Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .primary_btn3:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'button_typography_style2',
                    'selector' => '{{WRAPPER}} .primary_btn3',
                ]
            );

            // Background Color
            $this->add_control(
                'button_bg_color_style2',
                [
                    'label'     => esc_html__('Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .primary_btn3' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            // Hover Background Color
            $this->add_control(
                'button_bg_hover_color_style2',
                [
                    'label'     => esc_html__('Hover Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .primary_btn3:hover' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            // Border Color
            $this->add_control(
                'button_border_color_style2',
                [
                    'label'     => esc_html__('Border Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .primary_btn3' => 'border-color: {{VALUE}};',
                    ],
                ]
            );

            // Hover Border Color
            $this->add_control(
                'button_border_hover_color_style2',
                [
                    'label'     => esc_html__('Hover Border Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .primary_btn3:hover' => 'border-color: {{VALUE}};',
                    ],
                ]
            );

            // Border Width
            $this->add_responsive_control(
                'button_border_width_style2',
                [
                    'label'      => esc_html__('Border Width', 'axero-toolkit'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', 'em'],
                    'selectors'  => [
                        '{{WRAPPER}} .primary_btn3' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; border-style: solid;',
                    ],
                ]
            );

            // Border Radius
            $this->add_responsive_control(
                'button_border_radius_style2',
                [
                    'label'      => esc_html__('Border Radius', 'axero-toolkit'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors'  => [
                        '{{WRAPPER}} .primary_btn3' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            // Icon Size (i, svg)
            $this->add_responsive_control(
                'button_icon_size_style2',
                [
                    'label' => esc_html__('Icon Size', 'axero-toolkit'),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => ['px', 'em', 'rem'],
                    'default' => [
                        'size' => 18,
                        'unit' => 'px',
                    ],
                    'range' => [
                        'px' => [
                            'min' => 1,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .primary_btn3 i' => 'font-size: {{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .primary_btn3 svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            // Icon Color
            $this->add_control(
                'button_icon_color_style2',
                [
                    'label'     => esc_html__('Icon Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .primary_btn3 i, {{WRAPPER}} .primary_btn3 svg' => 'color: {{VALUE}}; fill: {{VALUE}};',
                    ],
                ]
            );

            // Icon Hover Color
            $this->add_control(
                'button_icon_hover_color_style2',
                [
                    'label'     => esc_html__('Icon Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .primary_btn3:hover i, {{WRAPPER}} .primary_btn3:hover svg' => 'color: {{VALUE}}; fill: {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_section();

            // Style3 Button Styling Section
            $this->start_controls_section(
                'button_style_style3',
                [
                    'label' => esc_html__('Button Styling (Style 3)', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style3',
                    ],
                ]
            );

            // Padding Control
            $this->add_responsive_control(
                'button_padding_style3',
                [
                    'label' => esc_html__('Padding', 'axero-toolkit'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', 'em', '%'],
                    'selectors' => [
                        '{{WRAPPER}} .browse_all_services_btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            // Margin Control
            $this->add_responsive_control(
                'button_margin_style3',
                [
                    'label' => esc_html__('Margin', 'axero-toolkit'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', 'em', '%'],
                    'selectors' => [
                        '{{WRAPPER}} .browse_all_services_btn a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            // Text Color
            $this->add_control(
                'button_text_color_style3',
                [
                    'label'     => esc_html__('Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .browse_all_services_btn a' => 'color: {{VALUE}}',
                    ],
                ]
            );

            // Text Hover Color
            $this->add_control(
                'button_text_hover_color_style3',
                [
                    'label'     => esc_html__('Text Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .browse_all_services_btn a:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );

            // Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'button_typography_style3',
                    'label'    => esc_html__('Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .browse_all_services_btn a',
                ]
            );

            // Background Color 
            $this->add_control(
                'button_bg_color_style3',
                [
                    'label'     => esc_html__('Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .browse_all_services_btn a' => 'background-color: {{VALUE}}',
                        '{{WRAPPER}} .browse_all_services_btn a i' => 'background-color: {{VALUE}}',
                        '{{WRAPPER}} .browse_all_services_btn a svg' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            // Hover Background Color
            $this->add_control(
                'button_bg_hover_color_style3',
                [
                    'label'     => esc_html__('Hover Background', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .browse_all_services_btn a:hover' => 'background-color: {{VALUE}}',
                        '{{WRAPPER}} .browse_all_services_btn a:hover i' => 'background-color: {{VALUE}}',
                        '{{WRAPPER}} .browse_all_services_btn a:hover svg' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            // Border Color
            $this->add_control(
                'button_border_color_style3',
                [
                    'label'     => esc_html__('Border Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .browse_all_services_btn a' => 'border-color: {{VALUE}}',
                        '{{WRAPPER}} .browse_all_services_btn a i' => 'border-color: {{VALUE}}',
                        '{{WRAPPER}} .browse_all_services_btn a svg' => 'border-color: {{VALUE}}',
                    ],
                ]
            );

            // Hover Border Color
            $this->add_control(
                'button_border_hover_color_style3',
                [
                    'label'     => esc_html__('Hover Border Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .browse_all_services_btn a:hover' => 'border-color: {{VALUE}}',
                        '{{WRAPPER}} .browse_all_services_btn a:hover i' => 'border-color: {{VALUE}}',
                        '{{WRAPPER}} .browse_all_services_btn a:hover svg' => 'border-color: {{VALUE}}',
                    ],
                ]
            );

            // Icon Size
            $this->add_responsive_control(
                'button_icon_size_style3',
                [
                    'label' => esc_html__('Icon Size', 'axero-toolkit'),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'default' => [
                        'size' => 22,
                        'unit' => 'px',
                    ],
                    'range' => [
                        'px' => [
                            'min' => 1,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .browse_all_services_btn a i' => 'font-size: {{SIZE}}{{UNIT}}',
                        '{{WRAPPER}} .browse_all_services_btn a svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}',
                    ],
                ]
            );

            // Icon Color
            $this->add_control(
                'button_icon_color_style3',
                [
                    'label'     => esc_html__('Icon Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .browse_all_services_btn a i' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .browse_all_services_btn a svg' => 'fill: {{VALUE}}',
                    ],
                ]
            );

            // Icon Hover Color
            $this->add_control(
                'button_icon_hover_color_style3',
                [
                    'label'     => esc_html__('Icon Hover Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .browse_all_services_btn a:hover i' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .browse_all_services_btn a:hover svg' => 'fill: {{VALUE}}',
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
                <a href="<?php echo esc_url($settings['button_link']['url']); ?>" class="default-btn">
                    <?php echo esc_html($settings['button_text']); ?>
                    <?php \Elementor\Icons_Manager::render_icon($settings['button_icon'], ['aria-hidden' => 'true']); ?>
                </a>

                <?php } elseif ($settings['style_selection'] === 'style2') {
                //  style2
                $button_text = !empty($settings['button_text_style2']) ? esc_html($settings['button_text_style2']) : esc_html__('Start a Project', 'axero-toolkit');
                $button_icon = !empty($settings['button_icon_style2']) ? $settings['button_icon_style2'] : [
                    'value' => 'ri-arrow-right-long-line',
                    'library' => 'remix',
                ];
                $button_link = !empty($settings['button_link_style2']['url']) ? esc_url($settings['button_link_style2']['url']) : '#';?>
                    <!-- style 2 -->
                    <a href="<?php echo $button_link; ?>" class="btn primary_btn3">
                        <span class="d-inline-block position-relative">
                            <?php echo $button_text; ?>
                            <?php \Elementor\Icons_Manager::render_icon($button_icon, ['aria-hidden' => 'true']); ?>
                        </span>
                    </a>
                <?php } elseif ($settings['style_selection'] === 'style3') { ?>
                    <!-- style 3 -->
                    <div class="browse_all_services_btn text-center" data-cue="slideInUp">
                        <a href="<?php echo esc_url($settings['button_link_style3']['url']); ?>">
                            <?php echo wp_kses_post($settings['button_text_style3']); ?>
                            <?php \Elementor\Icons_Manager::render_icon($settings['button_icon_style3'], ['aria-hidden' => 'true']); ?>
                        </a>
                    </div>

            <?php
            }
        }
    }
$widgets_manager->register(new axero_button());
