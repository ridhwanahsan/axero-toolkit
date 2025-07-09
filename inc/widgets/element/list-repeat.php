<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_list_repeat extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_list_repeat';
        }

        public function get_title()
        {
            return __('Icon Box', 'axero-toolkit');
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
            // Content Tab
            $this->start_controls_section(
                'content_section',
                [
                    'label' => esc_html__('Content', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'list_title',
                [
                    'label'       => esc_html__('Title', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Instagram', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'list_url',
                [
                    'label'         => esc_html__('URL', 'axero-toolkit'),
                    'type'          => Controls_Manager::URL,
                    'placeholder'   => esc_html__('https://your-link.com', 'axero-toolkit'),
                    'show_external' => true,
                    'default'       => [
                        'url'         => '#',
                        'is_external' => true,
                        'nofollow'    => true,
                    ],
                ]
            );

            $this->add_control(
                'list_icon',
                [
                    'label'   => esc_html__('Icon', 'axero-toolkit'),
                    'type'    => Controls_Manager::ICONS,
                    'default' => [
                        'value'   => 'ri-arrow-right-up-line',
                        'library' => 'remixicon',
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
                'style1_style_section',
                [
                    'label'     => esc_html__('Style 1', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            // Title Color
            $this->add_control(
                'style1_title_color',
                [
                    'label'     => esc_html__('Title Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .footer_socials li a' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Title Hover Color
            $this->add_control(
                'style1_title_hover_color',
                [
                    'label'     => esc_html__('Title Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .footer_socials li a:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );
            // Typography Control
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'style1_typography',
                    'label'          => esc_html__('Typography', 'axero-toolkit'),
                    'selector'       => '{{WRAPPER}} .footer_socials li a',
                    'fields_options' => [
                        'font_size'   => [
                            'default' => [
                                'unit' => 'px',
                                'size' => 24,
                            ],
                        ],
                        'font_weight' => [
                            'default' => '400',
                        ],
                        'line_height' => [
                            'default' => [
                                'unit' => 'em',
                                'size' => 1,
                            ],
                        ],
                    ],
                ]
            );

            // Background Color
            $this->add_control(
                'style1_background_color',
                [
                    'label'     => esc_html__('Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .footer_socials li a' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            // Background Hover Color
            $this->add_control(
                'style1_background_hover_color',
                [
                    'label'     => esc_html__('Background Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .footer_socials li a:hover' => 'background-color: {{VALUE}};',
                    ],
                ]
            );
            // Border Control
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name'     => 'style1_border',
                    'label'    => esc_html__('Border', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .footer_socials li a',
                ]
            );

            // Border Hover Control
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name'     => 'style1_border_hover',
                    'label'    => esc_html__('Border Hover', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .footer_socials li a:hover',
                ]
            );

            // Border Radius
            $this->add_control(
                'style1_border_radius',
                [
                    'label'      => esc_html__('Border Radius', 'axero-toolkit'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .footer_socials li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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


                <ul class="footer_socials row p-0 mx-0 mb-0 list-unstyled">
                    <li>
                        <a href="<?php echo esc_url($settings['list_url']['url']); ?>"
                           target="<?php echo $settings['list_url']['is_external'] ? '_blank' : '_self'; ?>"
                           class="d-flex align-items-center justify-content-between text-uppercase fw-medium">
                            <?php echo esc_html($settings['list_title']); ?>
<?php if (! empty($settings['list_icon']['value'])): ?>
                                <i class="<?php echo esc_attr($settings['list_icon']['value']); ?>"></i>
                            <?php endif; ?>
                        </a>
                    </li>

                </ul>



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

    $widgets_manager->register(new axero_list_repeat());