<?php
    namespace lunex_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class Lunex_category  extends Widget_Base
    {

        public function get_name()
        {
            return 'Lunex_category ';
        }

        public function get_title()
        {
            return __('Lunex Cat', 'lunex-toolkit');
        }

        public function get_icon()
        {
            return 'eicon-elementor';
        }

        public function get_categories()
        {
            return ['Lunex'];
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
                    'label' => esc_html__('Section Selection', 'lunex-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'style_selection',
                [
                    'label'   => esc_html__('Select Section', 'lunex-toolkit'),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'style1',
                    'options' => [
                        'style1' => esc_html__('Style 1', 'lunex-toolkit'),
                        'style2' => esc_html__('Style 2', 'lunex-toolkit'),
                        
                    ],
                ]
            );

            $this->end_controls_section();

        $this->start_controls_section(
            'category_type_section',
            [
                'label' => esc_html__('Category Type', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'style_selection' => 'style1',
                ],
            ]
        );

        $this->add_control(
            'category_type',
            [
                'label'   => esc_html__('Select Category Type', 'lunex-toolkit'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'works_category',
                'options' => [
                    'works_category'    => esc_html__('Works Category', 'lunex-toolkit'),
                    'careers_category'  => esc_html__('Careers Category', 'lunex-toolkit'),
                    'services_category' => esc_html__('Services Category', 'lunex-toolkit'),
                ],
                 'condition' => [
                    'style_selection' => 'style1',
                ],
            ]
            
        );

        $this->end_controls_section();
        
        $this->start_controls_section(
            'category_section',
            [
                'label' => esc_html__('Category', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'style_selection' => 'style1',
                ],
            ]
        );
        $this->add_control(
            'category_label',
            [
                'label' => esc_html__('Category Label', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Category', 'lunex-toolkit'),
                'placeholder' => esc_html__('Enter category label', 'lunex-toolkit'),
            ]
        );
         

         
        $this->add_control(
            'number_of_categories',
            [
                'label' => esc_html__('Number of Categories', 'lunex-toolkit'),
                'type' => Controls_Manager::NUMBER,
                'default' => 1,
                'min' => 1,
                'max' => 10,
                'step' => 1,
            ]
        );
 
         

     
        $this->end_controls_section();
        $this->start_controls_section(
            'extra_fields_section',
            [
                'label' => esc_html__('Extra Fields', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'style_selection' => 'style2',
                ],
            ]
        );

        $this->add_control(
            'job_type_label',
            [
                'label' => esc_html__('Job Type Label', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Job Type', 'lunex-toolkit'),
                'placeholder' => esc_html__('Enter job type label', 'lunex-toolkit'),
            ]
        );

        $this->add_control(
            'job_type_value',
            [
                'label' => esc_html__('Job Type Value', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Full time | Onsite', 'lunex-toolkit'),
                'placeholder' => esc_html__('Enter job type value', 'lunex-toolkit'),
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'style2_content_section',
            [
                'label' => esc_html__('Style 2 Content', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'style_selection' => 'style2',
                ],
            ]
        );

        $this->add_control(
            'style2_job_type_label',
            [
                'label' => esc_html__('Job Type Label', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Job Type', 'lunex-toolkit'),
                'placeholder' => esc_html__('Enter job type label', 'lunex-toolkit'),
            ]
        );

        $this->add_control(
            'style2_job_type_value',
            [
                'label' => esc_html__('Job Type Value', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Full time | Onsite', 'lunex-toolkit'),
                'placeholder' => esc_html__('Enter job type value', 'lunex-toolkit'),
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
            'category_style_section',
            [
                'label' => esc_html__('Category Style', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style1',
                ],
            ]
        );

        $this->add_control(
            'category_label_color',
            [
                'label' => esc_html__('Label Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'category_text_color',
            [
                'label' => esc_html__('Text Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .fw-medium' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'category_label_typography',
                'label' => esc_html__('Label Typography', 'lunex-toolkit'),
                'selector' => '{{WRAPPER}} h3',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'category_text_typography',
                'label' => esc_html__('Text Typography', 'lunex-toolkit'),
                'selector' => '{{WRAPPER}} .fw-medium',
            ]
        );

        $this->end_controls_section();
        
        $this->start_controls_section(
            'category_style_2',
            [
                'label' => esc_html__('Category Style 2', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style2',
                ],
            ]
        );

        $this->add_control(
            'category_label_color_2',
            [
                'label' => esc_html__('Label Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .item h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'category_text_color_2',
            [
                'label' => esc_html__('Text Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .item .fw-medium' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'category_label_typography_2',
                'label' => esc_html__('Label Typography', 'lunex-toolkit'),
                'selector' => '{{WRAPPER}} .item h3',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'category_text_typography_2',
                'label' => esc_html__('Text Typography', 'lunex-toolkit'),
                'selector' => '{{WRAPPER}} .item .fw-medium',
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
               <h3>
                            <?php echo esc_html($settings['category_label']); ?>
                        </h3>
                        <span class="d-block fw-medium">
                            <?php 
                            $terms = get_the_terms(get_the_ID(), $settings['category_type']);
                            if (!empty($terms) && !is_wp_error($terms)) {
                                $term_names = array();
                                $count = 0;
                                foreach ($terms as $term) {
                                    if ($count < $settings['number_of_categories']) {
                                        $term_names[] = esc_html($term->name);
                                        $count++;
                                    } else {
                                        break;
                                    }
                                }
                                echo implode(', ', $term_names);
                            } else {
                                echo 'Web Design';
                            }
                            ?>
                        </span>

        <?php
            } elseif ($settings['style_selection'] === 'style2') {
                    ?>
            <!-- style 2 -->
             <div class="item">
            <h3>
                <?php if (!empty($settings['style2_job_type_label'])): ?>
                    <?php echo esc_html($settings['style2_job_type_label']); ?>
                <?php endif; ?>
            </h3>
            <span class="d-block fw-medium">
                <?php if (!empty($settings['style2_job_type_value'])): ?>
                    <?php echo esc_html($settings['style2_job_type_value']); ?>
                <?php endif; ?>
            </span>
        </div>

        <?php
            } elseif ($settings['style_selection'] === 'style3') {
                    ?>
            <!-- style 3 -->

    <?php
        }
            }
        }

    $widgets_manager->register(new Lunex_category ());