<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class Axero_work_short extends Widget_Base
    {

        public function get_name()
        {
            return 'Axero_work_short';
        }

        public function get_title()
        {
            return __('Work Bar', 'axero-toolkit');
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
            $this->start_controls_section(
                'content_section',
                [
                    'label' => esc_html__('Content', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'client_label',
                [
                    'label'       => esc_html__('Client Label', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Client', 'axero-toolkit'),
                    'placeholder' => esc_html__('Enter client label', 'axero-toolkit'),
                ]
            );

            $this->add_control(
                'category_label',
                [
                    'label'       => esc_html__('Category Label', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Category', 'axero-toolkit'),
                    'placeholder' => esc_html__('Enter category label', 'axero-toolkit'),
                ]
            );
            $this->add_control(
                'website_label',
                [
                    'label'       => esc_html__('Website Label', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Website', 'axero-toolkit'),
                    'placeholder' => esc_html__('Enter website label', 'axero-toolkit'),
                ]
            );
            $this->add_control(
                'timeline_label',
                [
                    'label'       => esc_html__('Timeline Label', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Timeline', 'axero-toolkit'),
                    'placeholder' => esc_html__('Enter timeline label', 'axero-toolkit'),
                ]
            );

            $this->add_control(
                'service_label',
                [
                    'label'       => esc_html__('Service Label', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Service', 'axero-toolkit'),
                    'placeholder' => esc_html__('Enter service label', 'axero-toolkit'),
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
            // Content Style Section
            $this->start_controls_section(
                'content_style_section',
                [
                    'label' => esc_html__('Content Style', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_STYLE,
                ]
            );

            // Text Color Control
            $this->add_control(
                'content_text_color',
                [
                    'label'     => esc_html__('Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .project-details-info' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Typography Control
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'content_typography',
                    'label'    => esc_html__('Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .project-details-info',
                ]
            );

            // Label Text Color Control
            $this->add_control(
                'label_text_color',
                [
                    'label'     => esc_html__('Label Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .project-details-info h3' => 'color: {{VALUE}};',
                    ],
                    'separator' => 'before',
                ]
            );

            // Label Typography Control
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'label_typography',
                    'label'    => esc_html__('Label Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .project-details-info h3',
                ]
            );

            $this->end_controls_section();
            // Link Style Section
            $this->start_controls_section(
                'link_style_section',
                [
                    'label' => esc_html__('Link Style', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_STYLE,
                ]
            );

            // Link Text Color
            $this->add_control(
                'link_text_color',
                [
                    'label'     => esc_html__('Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .project-details-info a' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Icon Color
            $this->add_control(
                'icon_color',
                [
                    'label'     => esc_html__('Icon Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .project-details-info a i' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Icon Background Color
            $this->add_control(
                'icon_bg_color',
                [
                    'label'     => esc_html__('Icon Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .project-details-info a i' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            // Hover Text Color
            $this->add_control(
                'hover_text_color',
                [
                    'label'     => esc_html__('Hover Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .project-details-info a:hover' => 'color: {{VALUE}};',
                    ],
                    'separator' => 'before',
                ]
            );

            // Hover Icon Color
            $this->add_control(
                'hover_icon_color',
                [
                    'label'     => esc_html__('Hover Icon Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .project-details-info a:hover i' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Hover Icon Background Color
            $this->add_control(
                'hover_icon_bg_color',
                [
                    'label'     => esc_html__('Hover Icon Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .project-details-info a:hover i' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_section();

        }

        protected function render()
        {
            $settings = $this->get_settings_for_display();

            if ($settings['style_selection'] === 'style1') {

                $client           = get_field('client') ?: 'Sarah Thompson';
                $website          = get_field('website') ?: 'https://axero.com/';
                $project_timeline = get_field('project_timeline') ?: '1.5 months';
                $service_we_offer = get_field('service_we_offer') ?: 'UI/UX';

            ?>
            <!-- style 1 -->



                <div class="project-details-info d-md-flex align-items-center justify-content-between" data-cue="slideInUp">
                    <div>
                        <h3>
                            <?php echo esc_html($settings['client_label']); ?>
                        </h3>
                        <span class="d-block fw-medium">
                            <?php echo esc_html($client); ?>
                        </span>
                    </div>
                    <div>
                        <h3>
                            <?php echo esc_html($settings['category_label']); ?>
                        </h3>
                        <span class="d-block fw-medium">
                            <?php
                                $terms = get_the_terms(get_the_ID(), 'works_category');
                                            if (! empty($terms) && ! is_wp_error($terms)) {
                                                $term_names = [];
                                                foreach ($terms as $term) {
                                                    $term_names[] = esc_html($term->name);
                                                }
                                                echo implode(', ', $term_names);
                                            } else {
                                                echo 'Web Design';
                                            }
                                        ?>
                        </span>
                    </div>
                    <div>
                        <h3>
                            <?php echo esc_html($settings['website_label']); ?>
                        </h3>
                        <a href="<?php echo esc_url($website); ?>" target="_blank" class="d-inline-block position-relative fw-medium">
                            <?php echo esc_html($website); ?> <i class="ri-arrow-right-up-line"></i>
                        </a>
                    </div>
                    <div>
                        <h3>
                            <?php echo esc_html($settings['timeline_label']); ?>
                        </h3>
                        <span class="d-block fw-medium">
                            <?php echo esc_html($project_timeline); ?>
                        </span>
                    </div>
                    <div>
                        <h3>
                            <?php echo esc_html($settings['service_label']); ?>
                        </h3>
                        <span class="d-block fw-medium">
                            <?php echo esc_html($service_we_offer); ?>
                        </span>
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

    $widgets_manager->register(new Axero_work_short());