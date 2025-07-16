<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_skill_bar extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_skill_bar';
        }

        public function get_title()
        {
            return __('Skill Bar', 'axero-toolkit');
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
                        'style2' => esc_html__('Style 2', 'axero-toolkit'),
                        'style3' => esc_html__('Style 3', 'axero-toolkit'),
                    ],
                ]
            );

            $this->end_controls_section();
            // Style 1 Content Controls
            $this->start_controls_section(
                'style1_content_section',
                [
                    'label' => esc_html__('Style 1: Skill Bar Content', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'style1_heading',
                [
                    'label' => esc_html__('Heading', 'axero-toolkit'),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Professional Skills', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control(
                'skill_name',
                [
                    'label' => esc_html__('Skill Name', 'axero-toolkit'),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Skill Name', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $repeater->add_control(
                'skill_percent',
                [
                    'label' => esc_html__('Skill Percent', 'axero-toolkit'),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 0,
                    'max' => 100,
                    'default' => 90,
                ]
            );

            $this->add_control(
                'style1_skills',
                [
                    'label' => esc_html__('Skills', 'axero-toolkit'),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'skill_name' => esc_html__('Problem solving skills', 'axero-toolkit'),
                            'skill_percent' => 90,
                        ],
                        [
                            'skill_name' => esc_html__('Networking skills', 'axero-toolkit'),
                            'skill_percent' => 80,
                        ],
                        [
                            'skill_name' => esc_html__('Leadership skills', 'axero-toolkit'),
                            'skill_percent' => 95,
                        ],
                    ],
                    'title_field' => '{{{ skill_name }}}',
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
            'style1_skills_section',
            [
                'label' => esc_html__('Style 1: Skills', 'axero-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // Heading Controls
        $this->add_control(
            'style1_heading_color',
            [
                'label' => esc_html__('Heading Color', 'axero-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .skills_details h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style1_heading_typography',
                'label' => esc_html__('Heading Typography', 'axero-toolkit'),
                'selector' => '{{WRAPPER}} .skills_details h3',
            ]
        );

        // Skill Text Controls
        $this->add_control(
            'style1_skill_name_color',
            [
                'label' => esc_html__('Skill Name Color', 'axero-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .skills_details .item span:first-child' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'style1_skill_percent_color',
            [
                'label' => esc_html__('Skill Percent Color', 'axero-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .skills_details .item span:last-child' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style1_skill_name_typography',
                'label' => esc_html__('Skill Name Typography', 'axero-toolkit'),
                'selector' => '{{WRAPPER}} .skills_details .item span:first-child',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style1_skill_percent_typography',
                'label' => esc_html__('Skill Percent Typography', 'axero-toolkit'),
                'selector' => '{{WRAPPER}} .skills_details .item span:last-child',
            ]
        );

        // Progress Bar Controls
        $this->add_control(
            'style1_progress_bg',
            [
                'label' => esc_html__('Progress Bar Background', 'axero-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .skills_details .progress' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'style1_progress_color',
            [
                'label' => esc_html__('Progress Bar Color', 'axero-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .skills_details .progress-bar' => 'background-color: {{VALUE}};',
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
             <div class="team_details_area">
                <div class="team_details_desc">
                    <div class="skills_details">
                        <?php if (!empty($settings['style1_heading'])) : ?>
                            <h3 class="text_animation">
                                <?php echo wp_kses_post($settings['style1_heading']); ?>
                            </h3>
                        <?php endif; ?>
                        <?php if ( !empty($settings['style1_skills']) && is_array($settings['style1_skills']) ) : ?>
                            <?php foreach ( $settings['style1_skills'] as $skill ) : 
                                $skill_name = isset($skill['skill_name']) ? $skill['skill_name'] : '';
                                $skill_percent = isset($skill['skill_percent']) ? intval($skill['skill_percent']) : 0;
                            ?>
                                <div class="item">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="d-block fw-medium">
                                            <?php echo esc_html($skill_name); ?>
                                        </span>
                                        <span class="d-block fw-bold">
                                            <?php echo esc_html($skill_percent); ?>%
                                        </span>
                                    </div>
                                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="<?php echo esc_attr($skill_percent); ?>" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar" style="width: <?php echo esc_attr($skill_percent); ?>%"></div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
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

    $widgets_manager->register(new axero_skill_bar());