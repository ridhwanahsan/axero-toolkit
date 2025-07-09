<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_service_card extends Widget_Base
    {

        public function get_name()
        {
            return 'axero-service-card';
        }

        public function get_title()
        {
            return __('Service Card', 'axero-toolkit');
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

                    ],
                ]
            );

            $this->end_controls_section();
            // Service Content Section
            $this->start_controls_section(
                'service_content',
                [
                    'label' => esc_html__('Service Content', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'service_title',
                [
                    'label'       => esc_html__('Title', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Content creation', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'service_highlight_text',
                [
                    'label'       => esc_html__('Highlight Text', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('creation', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'service_description',
                [
                    'label'       => esc_html__('Description', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXTAREA,
                    'default'     => esc_html__('We develop compelling content, from copywriting to video production, designed to tell your story & connect with your audience.', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'service_link',
                [
                    'label'       => esc_html__('Link', 'axero-toolkit'),
                    'type'        => Controls_Manager::URL,
                    'placeholder' => esc_html__('https://your-service-link.com', 'axero-toolkit'),
                    'default'     => [
                        'url' => '#',
                    ],
                ]
            );

            $this->add_control(
                'service_icon',
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

            // Card Box Style
            $this->start_controls_section(
                'card_box_style',
                [
                    'label' => esc_html__('Card Box', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_control(
                'card_box_bg_color',
                [
                    'label'     => esc_html__('Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-service-box::before' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'card_box_hover_bg_color',
                [
                    'label'     => esc_html__('Hover Background', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-service-box:hover::before' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->end_controls_section();
            // Card Circle Style
            $this->start_controls_section(
                'card_circle_style',
                [
                    'label' => esc_html__('Card Circle', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_control(
                'circle_bg_color',
                [
                    'label'     => esc_html__('Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-service-box .link-btn' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'circle_hover_bg_color',
                [
                    'label'     => esc_html__('Hover Background', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-service-box .link-btn:hover' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->end_controls_section();

            // Title Style
            $this->start_controls_section(
                'title_style',
                [
                    'label' => esc_html__('Title', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_control(
                'title_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-service-box h3 a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'title_hover_color',
                [
                    'label'     => esc_html__('Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-service-box:hover h3 a' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .single-service-box:hover h3'   => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'title_typography',
                    'selector' => '{{WRAPPER}} .single-service-box h3',
                ]
            );

            $this->end_controls_section();

            // Description Style
            $this->start_controls_section(
                'description_style',
                [
                    'label' => esc_html__('Description', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_control(
                'description_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-service-box p' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'description_hover_color',
                [
                    'label'     => esc_html__('Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-service-box:hover p' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'description_typography',
                    'selector' => '{{WRAPPER}} .single-service-box p',
                ]
            );

            $this->end_controls_section();

            // Icon Style
            $this->start_controls_section(
                'icon_style',
                [
                    'label' => esc_html__('Icon', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_STYLE,
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
                            'min' => 20,
                            'max' => 100,
                        ],
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} .single-service-box .link-btn i'   => 'font-size: {{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .single-service-box .link-btn svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'icon_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-service-box .link-btn i'   => 'color: {{VALUE}}',
                        '{{WRAPPER}} .single-service-box .link-btn svg' => 'fill: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'icon_hover_color',
                [
                    'label'     => esc_html__('Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-service-box:hover .link-btn i'   => 'color: {{VALUE}}',
                        '{{WRAPPER}} .single-service-box:hover .link-btn svg' => 'fill: {{VALUE}}',
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
            <div class="services-area">
                <div class="row justify-content-center" data-cues="slideInUp">
                    <div class="single-service-box position-relative z-1">
                        <a href="<?php echo esc_url($settings['service_link']['url']); ?>" class="link-btn d-inline-block rounded-circle">

                             <i class="<?php echo esc_attr($settings['service_icon']['value']); ?>"></i>
                        <h3>
                            <a href="<?php echo esc_url($settings['service_link']['url']); ?>">
                                <?php
                                    $title     = $settings['service_title'];
                                                $highlight = $settings['service_highlight_text'];
                                                echo str_replace($highlight, '<span>' . $highlight . '</span>', esc_html($title));
                                            ?>
                            </a>
                        </h3>
                        <p>
                            <?php echo esc_html($settings['service_description']); ?>
                        </p>
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

    $widgets_manager->register(new axero_service_card());
