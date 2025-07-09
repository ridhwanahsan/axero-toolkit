<?php
    namespace lunex_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class lunex_work_slider extends Widget_Base
    {

        public function get_name()
        {
            return 'lunex_work_slider';
        }

        public function get_title()
        {
            return __('Work Slider', 'lunex-toolkit');
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
                        
                    ],
                ]
            );

            $this->end_controls_section();
        // Style 1 Background Image Section
        $this->start_controls_section(
            'style1_background_section',
            [
                'label' => esc_html__('Background Image', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'style_selection' => 'style1',
                ],
            ]
        );

        $this->add_control(
            'style1_background_image',
            [
                'label' => esc_html__('Background Image', 'lunex-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
 

        $this->end_controls_section();
        // Repeater Controls for Style 1
        $this->start_controls_section(
            'style1_content_section',
            [
                'label' => esc_html__('Slider Content', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'style_selection' => 'style1',
                ],
            ]
        );
        
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'style1_slide_title',
            [
                'label' => esc_html__('Title', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Discovery phase', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'style1_slide_description',
            [
                'label' => esc_html__('Description', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('In this initial phase, we dive deep into understanding your business, goals, and target audience.', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'style1_slides',
            [
                'label' => esc_html__('Slides', 'lunex-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'style1_slide_title' => esc_html__('Discovery phase', 'lunex-toolkit'),
                        'style1_slide_description' => esc_html__('In this initial phase, we dive deep into understanding your business, goals, and target audience.', 'lunex-toolkit'),
                    ],
                ],
                'title_field' => '{{{ style1_slide_title }}}',
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
        // Box Style
        $this->start_controls_section(
            'style1_box_style',
            [
                'label' => esc_html__('Box Style', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style1',
                ],
            ]
        );

        $this->add_control(
            'style1_box_background_color',
            [
                'label' => esc_html__('Background Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .how-we-work-box' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'style1_box_border_radius',
            [
                'label' => esc_html__('Border Radius', 'lunex-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .how-we-work-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'style1_box_padding',
            [
                'label' => esc_html__('Padding', 'lunex-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .how-we-work-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Title Style
        $this->start_controls_section(
            'style1_title_style',
            [
                'label' => esc_html__('Title Style', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style1',
                ],
            ]
        );

        $this->add_control(
            'style1_title_color',
            [
                'label' => esc_html__('Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .how-we-work-box h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style1_title_typography',
                'selector' => '{{WRAPPER}} .how-we-work-box h3',
            ]
        );

        $this->end_controls_section();

        // Description Style
        $this->start_controls_section(
            'style1_description_style',
            [
                'label' => esc_html__('Description Style', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style1',
                ],
            ]
        );

        $this->add_control(
            'style1_description_color',
            [
                'label' => esc_html__('Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .how-we-work-box p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style1_description_typography',
                'selector' => '{{WRAPPER}} .how-we-work-box p',
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

       <div class="how-we-work-area position-relative z-1">
        <div class="container-fluid" data-cue="slideInUp">
            <div class="swiper howWeWorkSwiper">
                <div class="swiper-wrapper">
                    <?php foreach ($settings['style1_slides'] as $slide): ?>
                        <div class="swiper-slide">
                            <div class="how-we-work-box">
                                <h3>
                                    <?php echo esc_html($slide['style1_slide_title']); ?>
                                </h3>
                                <p>
                                    <?php echo esc_html($slide['style1_slide_description']); ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
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

    $widgets_manager->register(new lunex_work_slider());