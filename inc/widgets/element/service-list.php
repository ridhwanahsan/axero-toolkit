<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_service_list extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_service_list';
        }

        public function get_title()
        {
            return __('Service List', 'axero-toolkit');
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

                    ],
                ]
            );

            $this->end_controls_section();
            // Service Content Repeater
            $this->start_controls_section(
                'service_content',
                [
                    'label'     => esc_html__('Service Content', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control(
                'service_title',
                [
                    'label'       => esc_html__('Title', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Digital Advertising', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $repeater->add_control(
                'service_description',
                [
                    'label'       => esc_html__('Description', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXTAREA,
                    'default'     => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidid unt ut labore et dolore magna.', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'service_image',
                [
                    'label'   => esc_html__('Image', 'axero-toolkit'),
                    'type'    => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ]
            );

            $repeater->add_control(
                'service_link',
                [
                    'label'         => esc_html__('Link', 'axero-toolkit'),
                    'type'          => Controls_Manager::URL,
                    'placeholder'   => esc_html__('https://your-link.com', 'axero-toolkit'),
                    'show_external' => true,
                    'default'       => [
                        'url'         => '',
                        'is_external' => true,
                        'nofollow'    => true,
                    ],
                ]
            );

            $this->add_control(
                'services_list',
                [
                    'label'       => esc_html__('Services List', 'axero-toolkit'),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'default'     => [
                        [
                            'service_title'       => esc_html__('Digital Advertising', 'axero-toolkit'),
                            'service_description' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidid unt ut labore et dolore magna.', 'axero-toolkit'),
                        ],
                    ],
                    'title_field' => '{{{ service_title }}}',
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
                'style1_content_style',
                [
                    'label'     => esc_html__('Style 1 Content', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            // Title Style
            $this->add_control(
                'style1_title_heading',
                [
                    'label'     => esc_html__('Title', 'axero-toolkit'),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'style1_title_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .service_box h3 a' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style1_title_hover_color',
                [
                    'label'     => esc_html__('Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .service_box h3 a:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style1_title_typography',
                    'selector' => '{{WRAPPER}} .service_box h3 a',
                ]
            );

            // Description Style
            $this->add_control(
                'style1_description_heading',
                [
                    'label'     => esc_html__('Description', 'axero-toolkit'),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'style1_description_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .service_box p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style1_description_typography',
                    'selector' => '{{WRAPPER}} .service_box p',
                ]
            );

            // Icon Button Style
            $this->add_control(
                'style1_icon_button_heading',
                [
                    'label'     => esc_html__('Icon Button', 'axero-toolkit'),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'style1_icon_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .service_box .details_link_btn' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style1_icon_hover_color',
                [
                    'label'     => esc_html__('Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .service_box .details_link_btn:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style1_icon_bg_color',
                [
                    'label'     => esc_html__('Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .service_box .details_link_btn' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style1_icon_hover_bg_color',
                [
                    'label'     => esc_html__('Hover Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .service_box .details_link_btn:hover' => 'background-color: {{VALUE}};',
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
                  <div class="services_area">
                 <div class=" overflow-hidden">
                    <div class="services_slides position-relative owl-carousel owl-theme" data-cue="slideInUp">
                        <?php foreach ($settings['services_list'] as $service): ?>
                            <div class="service_box position-relative">
                                <h3 class="fw-bold">
                                    <a href="<?php echo esc_url($service['service_link']['url']); ?>"
                                       <?php echo $service['service_link']['is_external'] ? 'target="_blank"' : ''; ?>
<?php echo $service['service_link']['nofollow'] ? 'rel="nofollow"' : ''; ?>>
                                        <?php echo esc_html($service['service_title']); ?>
                                    </a>
                                </h3>
                                <p>
                                    <?php echo esc_html($service['service_description']); ?>
                                </p>
                                <a href="<?php echo esc_url($service['service_link']['url']); ?>"
                                   class="details_link_btn"
                                   <?php echo $service['service_link']['is_external'] ? 'target="_blank"' : ''; ?>
<?php echo $service['service_link']['nofollow'] ? 'rel="nofollow"' : ''; ?>>
                                    <i class="ri-arrow-right-up-line"></i>
                                </a>
                                <img src="<?php echo esc_url($service['service_image']['url'] ?? ''); ?>"
                                     class="icon d-block w-auto"
                                     alt="<?php echo esc_attr($service['service_title']); ?>">
                            </div>
                        <?php endforeach; ?>
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

    $widgets_manager->register(new axero_service_list());