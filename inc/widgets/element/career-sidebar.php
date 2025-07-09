<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class Axero_side_bar extends Widget_Base
    {

        public function get_name()
        {
            return 'Axero_side_bar';
        }

        public function get_title()
        {
            return __('Career SideBar', 'axero-toolkit');
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
                'experience_label',
                [
                    'label'       => esc_html__('Experience Label', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Experience', 'axero-toolkit'),
                    'placeholder' => esc_html__('Enter experience label', 'axero-toolkit'),
                ]
            );

            $this->add_control(
                'working_hours_label',
                [
                    'label'       => esc_html__('Working Hours Label', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Working Hours', 'axero-toolkit'),
                    'placeholder' => esc_html__('Enter working hours label', 'axero-toolkit'),
                ]
            );

            $this->add_control(
                'working_days_label',
                [
                    'label'       => esc_html__('Working Days Label', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Working Days', 'axero-toolkit'),
                    'placeholder' => esc_html__('Enter working days label', 'axero-toolkit'),
                ]
            );

            $this->add_control(
                'salary_label',
                [
                    'label'       => esc_html__('Salary Label', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Salary', 'axero-toolkit'),
                    'placeholder' => esc_html__('Enter salary label', 'axero-toolkit'),
                ]
            );

            $this->add_control(
                'vacancy_label',
                [
                    'label'       => esc_html__('Vacancy Label', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Vacancy', 'axero-toolkit'),
                    'placeholder' => esc_html__('Enter vacancy label', 'axero-toolkit'),
                ]
            );

            $this->add_control(
                'deadline_label',
                [
                    'label'       => esc_html__('Deadline Label', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Deadline', 'axero-toolkit'),
                    'placeholder' => esc_html__('Enter deadline label', 'axero-toolkit'),
                ]
            );

            $this->add_control(
                'apply_now_label',
                [
                    'label'       => esc_html__('Apply Now Label', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Apply Now', 'axero-toolkit'),
                    'placeholder' => esc_html__('Enter apply now label', 'axero-toolkit'),
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
                'info_box_style_section',
                [
                    'label' => esc_html__('Info Box Style', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_control(
                'info_box_bg_color',
                [
                    'label'     => esc_html__('Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .career-details-info' => 'background-color: {{VALUE}};',
                    ],
                    'default'   => '#ffffff',
                ]
            );

            $this->add_control(
                'info_box_border_radius',
                [
                    'label'      => esc_html__('Border Radius', 'axero-toolkit'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .career-details-info' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'default'    => [
                        'top'    => '20',
                        'right'  => '20',
                        'bottom' => '20',
                        'left'   => '20',
                        'unit'   => 'px',
                    ],
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'content_style_section',
                [
                    'label' => esc_html__('Content Style', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_control(
                'label_color',
                [
                    'label'     => esc_html__('Label Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .career-details-info li span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'label_typography',
                    'label'    => esc_html__('Label Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .career-details-info li span',
                ]
            );

            $this->add_control(
                'value_color',
                [
                    'label'     => esc_html__('Value Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .career-details-info li h3' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'value_typography',
                    'label'    => esc_html__('Value Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .career-details-info li h3',
                ]
            );

            $this->add_control(
                'item_spacing',
                [
                    'label'      => esc_html__('Item Spacing', 'axero-toolkit'),
                    'type'       => Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range'      => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} .career-details-info li:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->end_controls_section();
            $this->start_controls_section(
                'button_style',
                [
                    'label' => esc_html__('Button Style', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_control(
                'button_bg_color',
                [
                    'label'     => esc_html__('Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .career-details-info button' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'button_hover_bg_color',
                [
                    'label'     => esc_html__('Hover Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .career-details-info button:hover' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'button_text_color',
                [
                    'label'     => esc_html__('Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .career-details-info button' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'button_hover_text_color',
                [
                    'label'     => esc_html__('Hover Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .career-details-info button:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'button_icon_color',
                [
                    'label'     => esc_html__('Icon Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .career-details-info button i' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'button_hover_icon_color',
                [
                    'label'     => esc_html__('Hover Icon Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .career-details-info button:hover i' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'button_typography',
                    'label'    => esc_html__('Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .career-details-info button',
                ]
            );

            $this->end_controls_section();
        }

        protected function render()
        {
            $settings = $this->get_settings_for_display();

            if ($settings['style_selection'] === 'style1') {

                $experience   = get_field('experience') ?: '2+ years of experience';
                $woking_hours = get_field('woking_hours') ?: '9:00 AM - 6:00 PM';
                $working_days = get_field('working_days') ?: 'Weekly 5 days (sat to thu)';
                $salary       = get_field('salary') ?: '$50k-70k (yearly)';
                $vacancy      = get_field('vacancy') ?: 'No of vacancies: 3';
                $deadline     = get_field('deadline') ?: '21 Mar 2025';
                $apply_now    = get_field('apply_now') ?: '#';

            ?>
            <!-- style 1 -->



              <div class="career-details-area ">
                <div class="row" data-cues="slideInUp">
                        <div class="career-details-info">
                            <ul class="ps-0 mb-0 list-unstyled">
                                <li>
                                    <span class="d-block">
                                        Experience
                                    </span>
                                    <h3 class="mb-0">
                                        <?php echo esc_html($experience); ?>
                                    </h3>
                                </li>
                                <li>
                                    <span class="d-block">
                                        <?php echo esc_html($settings['working_hours_label']); ?>
                                    </span>
                                    <h3 class="mb-0">
                                        <?php echo esc_html($woking_hours); ?>
                                    </h3>
                                </li>
                                <li>
                                    <span class="d-block">
                                        <?php echo esc_html($settings['working_days_label']); ?>
                                    </span>
                                    <h3 class="mb-0">
                                        <?php echo esc_html($working_days); ?>
                                    </h3>
                                </li>
                                <li>
                                    <span class="d-block">
                                        <?php echo esc_html($settings['salary_label']); ?>
                                    </span>
                                    <h3 class="mb-0">
                                        <?php echo esc_html($salary); ?>
                                    </h3>
                                </li>
                                <li>
                                    <span class="d-block">
                                        <?php echo esc_html($settings['vacancy_label']); ?>
                                    </span>
                                    <h3 class="mb-0">
                                        <?php echo esc_html($vacancy); ?>
                                    </h3>
                                </li>
                                <li>
                                    <span class="d-block">
                                        <?php echo esc_html($settings['deadline_label']); ?>
                                    </span>
                                    <h3 class="mb-0">
                                        <?php echo esc_html($deadline); ?>
                                    </h3>
                                </li>
                            </ul>

                                <?php if ($apply_now): ?>
                                <a href="<?php echo esc_url($apply_now); ?>" style="color: white;">
                                      <button type="button">
                                    <?php echo esc_html($settings['apply_now_label']); ?> <i class="ri-arrow-right-up-line"></i>
                                      </button>
                                </a>
                            <?php endif; ?>

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

    $widgets_manager->register(new Axero_side_bar());