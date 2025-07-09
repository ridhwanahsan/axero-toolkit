<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_counter extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_counter';
        }

        public function get_title()
        {
            return __('axero counter', 'axero-toolkit');
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
            // Counter Tab
            $this->start_controls_section(
                'section_counter',
                [
                    'label' => esc_html__('Counter', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'counter_items',
                [
                    'label'       => esc_html__('Counter Items', 'axero-toolkit'),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => [
                        [
                            'name'    => 'number',
                            'label'   => esc_html__('Number', 'axero-toolkit'),
                            'type'    => \Elementor\Controls_Manager::TEXT,
                            'default' => '25',
                        ],
                        [
                            'name'    => 'suffix',
                            'label'   => esc_html__('Suffix', 'axero-toolkit'),
                            'type'    => \Elementor\Controls_Manager::TEXT,
                            'default' => '+',
                        ],
                        [
                            'name'    => 'quote',
                            'label'   => esc_html__('Quote', 'axero-toolkit'),
                            'type'    => \Elementor\Controls_Manager::TEXT,
                            'default' => '//',
                        ],
                        [
                            'name'    => 'title',
                            'label'   => esc_html__('Title', 'axero-toolkit'),
                            'type'    => \Elementor\Controls_Manager::TEXT,
                            'default' => 'Awards & Recognitions',
                        ],
                    ],
                    'default'     => [
                        [
                            'number' => '25',
                            'suffix' => '+',
                            'quote'  => '//',
                            'title'  => 'Awards & Recognitions',
                        ],
                        [
                            'number' => '98',
                            'suffix' => '%',
                            'quote'  => '//',
                            'title'  => 'Clients Satisfaction',
                        ],
                        [
                            'number' => '15',
                            'suffix' => '+',
                            'quote'  => '//',
                            'title'  => 'Years of experience in particular field',
                        ],
                        [
                            'number' => '12',
                            'suffix' => 'K',
                            'quote'  => '//',
                            'title'  => 'Cases overseen',
                        ],
                    ],
                    'title_field' => '{{{ title }}}',
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
            // Number Style
            $this->start_controls_section(
                'number_style',
                [
                    'label' => esc_html__('Number Style', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_control(
                'number_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '#ffffff',
                    'selectors' => [
                        '{{WRAPPER}} .funfact_box .number' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'number_typography',
                    'selector' => '{{WRAPPER}} .funfact_box .number',
                ]
            );

            $this->end_controls_section();

            // Quote Style
            $this->start_controls_section(
                'quote_style',
                [
                    'label' => esc_html__('Quote Style', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_control(
                'quote_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '#ffffff',
                    'selectors' => [
                        '{{WRAPPER}} .funfact_box .quote' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'quote_typography',
                    'selector' => '{{WRAPPER}} .funfact_box .quote',
                ]
            );

            $this->end_controls_section();

            // Title Style
            $this->start_controls_section(
                'title_style',
                [
                    'label' => esc_html__('Title Style', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_control(
                'title_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '#ffffff',
                    'selectors' => [
                        '{{WRAPPER}} .funfact_box .title' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'title_typography',
                    'selector' => '{{WRAPPER}} .funfact_box .title',
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

            <div class="funfacts_area ">
                <div class="container">
                    <div class="row" data-cues="slideInUp" data-group="funfacts_list">
                        <?php if (! empty($settings['counter_items']) && is_array($settings['counter_items'])): ?>
<?php foreach ($settings['counter_items'] as $item): ?>
                                <div class="col-sm-6">
                                    <div class="funfact_box">
                                        <div class="number lh-1 fw-bold ">
                                            <span class="counter_number"><?php echo esc_html($item['number']); ?></span><?php echo esc_html($item['suffix']); ?>
                                        </div>
                                        <div class="quote  fw-medium lh-1">
                                            <?php echo esc_html($item['quote']); ?>
                                        </div>
                                        <div class="title text-lg-end text-uppercase fw-medium">
                                            <?php echo esc_html($item['title']); ?>
                                        </div>
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

    $widgets_manager->register(new axero_counter());