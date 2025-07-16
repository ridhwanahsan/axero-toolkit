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
                        'style2' => esc_html__('Style 2', ' axero-toolkit'),

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
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            $repeater = new \Elementor\Repeater();

            // Service Image
            $repeater->add_control(
                'service_image',
                [
                    'label' => esc_html__('Image', 'axero-toolkit'),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ]
            );

            // Service Title
            $repeater->add_control(
                'service_title',
                [
                    'label' => esc_html__('Title', 'axero-toolkit'),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__('Service Title', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            // Service Description
            $repeater->add_control(
                'service_description',
                [
                    'label' => esc_html__('Description', 'axero-toolkit'),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'default' => esc_html__('Service description goes here', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            // Service Icon
            $repeater->add_control(
                'service_icon',
                [
                    'label' => esc_html__('Icon', 'axero-toolkit'),
                    'type' => \Elementor\Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'ti ti-arrow-up-right',
                        'library' => 'remix',
                    ],
                ]
            );

            // Service Icon URL
            $repeater->add_control(
                'service_icon_url',
                [
                    'label' => esc_html__('Icon URL', 'axero-toolkit'),
                    'type' => \Elementor\Controls_Manager::URL,
                    'placeholder' => esc_html__('https://your-icon-url.com/icon.svg', 'axero-toolkit'),
                    'description' => esc_html__('Optionally provide a custom icon image URL. If set, this will override the icon picker above.', 'axero-toolkit'),
                    'show_external' => true,
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'services_list',
                [
                    'label' => esc_html__('Services List', 'axero-toolkit'),
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'service_title' => esc_html__('Digital Advertising', 'axero-toolkit'),
                            'service_description' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'axero-toolkit'),
                            'service_icon' => [
                                'value' => 'ti ti-arrow-up-right',
                                'library' => 'remix',
                            ],
                            'service_icon_url' => [
                                'url' => '',
                                'is_external' => '',
                                'nofollow' => '',
                            ],
                        ],
                        [
                            'service_title' => esc_html__('Web Design', 'axero-toolkit'),
                            'service_description' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'axero-toolkit'),
                            'service_icon' => [
                                'value' => 'ti ti-arrow-up-right',
                                'library' => 'remix',
                            ],
                            'service_icon_url' => [
                                'url' => '',
                                'is_external' => '',
                                'nofollow' => '',
                            ],
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
                'card_box_style',
                [
                    'label' => esc_html__('Card Box', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            // Service card background, border and radius
            $this->add_control(
                'card_background',
                [
                    'label' => esc_html__('Background Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .service_box_item' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'card_border',
                    'selector' => '{{WRAPPER}} .service_box_item',
                ]
            );

            $this->add_control(
                'card_border_radius',
                [
                    'label' => esc_html__('Border Radius', 'axero-toolkit'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors' => [
                        '{{WRAPPER}} .service_box_item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            // Icon background colors
            $this->add_control(
                'icon_background',
                [
                    'label' => esc_html__('Icon Background', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .service_box_item .icon' => 'background-color: {{VALUE}};',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'icon_hover_background',
                [
                    'label' => esc_html__('Icon Hover Background', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .service_box_item:hover .icon' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            // Service title styling
            $this->add_control(
                'title_color',
                [
                    'label' => esc_html__('Title Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .service_box_item h3 a' => 'color: {{VALUE}};',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'title_hover_color',
                [
                    'label' => esc_html__('Title Hover Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .service_box_item h3 a:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'selector' => '{{WRAPPER}} .service_box_item h3 a',
                ]
            );

            // Service description styling
            $this->add_control(
                'description_color',
                [
                    'label' => esc_html__('Description Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .service_box_item p' => 'color: {{VALUE}};',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'description_typography',
                    'selector' => '{{WRAPPER}} .service_box_item p',
                ]
            );

            // Bottom icon styling
            $this->add_control(
                'bottom_icon_color',
                [
                    'label' => esc_html__('Bottom Icon Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .service_box_item .details_link_btn i' => 'color: {{VALUE}};',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'bottom_icon_size',
                [
                    'label' => esc_html__('Bottom Icon Size', 'axero-toolkit'),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range' => [
                        'px' => [
                            'min' => 10,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .service_box_item .details_link_btn i' => 'font-size: {{SIZE}}{{UNIT}};',
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
            <div class="container">
                <div class="row justify-content-center" data-cues="slideInUp" data-group="services_list">
                    <?php if ( ! empty( $settings['services_list'] ) && is_array( $settings['services_list'] ) ) : ?>
                        <?php foreach ( $settings['services_list'] as $index => $service ) : 
                            // Prepare variables
                            $service_title = !empty($service['service_title']) ? $service['service_title'] : '';
                            $service_description = !empty($service['service_description']) ? $service['service_description'] : '';
                            $service_image = !empty($service['service_image']['url']) ? $service['service_image']['url'] : '';
                            $service_icon = !empty($service['service_icon']['value']) ? $service['service_icon']['value'] : '';
                            $service_icon_url = !empty($service['service_icon_url']['url']) ? $service['service_icon_url']['url'] : '';
                            $service_link = !empty($service['service_icon_url']['url']) ? $service['service_icon_url']['url'] : '#';
                        ?>
                        <div class="col-lg-4 col-sm-6">
                            <div class="service_box_item">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <?php if ( $service_icon_url ) : ?>
                                        <img src="<?php echo esc_url( $service_icon_url ); ?>" alt="<?php echo esc_attr( $service_title ); ?>">
                                    <?php elseif ( $service_image ) : ?>
                                        <img src="<?php echo esc_url( $service_image ); ?>" alt="<?php echo esc_attr( $service_title ); ?>">
                                    <?php elseif ( $service_icon ) : ?>
                                        <i class="<?php echo esc_attr( $service_icon ); ?>"></i>
                                    <?php endif; ?>
                                </div>
                                <h3>
                                    <a href="<?php echo esc_url( $service_link ); ?>">
                                        <?php echo esc_html( $service_title ); ?>
                                    </a>
                                </h3>
                                <p>
                                    <?php echo esc_html( $service_description ); ?>
                                </p>
                                <a href="<?php echo esc_url( $service_link ); ?>" class="details_link_btn">
                                    <?php if ( $service_icon ) : ?>
                                        <i class="<?php echo esc_attr( $service_icon ); ?>"></i>
                                    <?php endif; ?>
                                </a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        
     



        <?php
            } elseif ($settings['style_selection'] === 'style2') {
                    ?>
            <!-- style 2 -->
               
            <div class="white_top_rectangle h_125"></div>
            <div class="overflow-hidden">
                <div class="container-fluid">
                    <div class="services_slides position-relative owl-carousel owl-theme" data-cue="slideInUp">
                        <div class="service_box position-relative">
                            <h3>
                                <a href="service-details.html">
                                    Digital Advertising
                                </a>
                            </h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidid unt ut labore et dolore magna.
                            </p>
                            <a href="service-details.html" class="details_link_btn">
                                <i class="ti ti-arrow-up-right"></i>
                            </a>
                            <img src="assets/images/icons/megaphone.svg" class="icon d-block w-auto" alt="megaphone">
                        </div>
                        <div class="service_box position-relative">
                            <h3>
                                <a href="service-details.html">
                                    Social Media Graphics
                                </a>
                            </h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidid unt ut labore et dolore magna.
                            </p>
                            <a href="service-details.html" class="details_link_btn">
                                <i class="ti ti-arrow-up-right"></i>
                            </a>
                            <img src="assets/images/icons/media_target.svg" class="icon d-block w-auto" alt="media_target">
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

    $widgets_manager->register(new axero_service_card());
