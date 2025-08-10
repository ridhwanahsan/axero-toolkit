<?php
    namespace lunex_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class lunex_text_slide extends Widget_Base
    {

        public function get_name()
        {
            return 'lunex_text_slide';
        }

        public function get_title()
        {
            return __('Text Slider', 'lunex-toolkit');
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
                        'style3' => esc_html__('Style 3', 'lunex-toolkit'),
                        'style4' => esc_html__('Style 4', 'lunex-toolkit'),
                    ],
                ]
            );

            $this->end_controls_section();
            // Text Content Controls
            $this->start_controls_section(
                'text_content',
                [
                    'label' => esc_html__('Text Content', 'lunex-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control(
                'main_text',
                [
                    'label' => esc_html__('Main Text', 'lunex-toolkit'),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Creative', 'lunex-toolkit'),
                    'label_block' => true,
                ]
            );

            $repeater->add_control(
                'highlighted_text', 
                [
                    'label' => esc_html__('Highlighted Text', 'lunex-toolkit'),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Design', 'lunex-toolkit'),
                    'label_block' => true,
                ]
            );

            $repeater->add_control(
                'ending_text',
                [
                    'label' => esc_html__('Ending Text', 'lunex-toolkit'),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Agency', 'lunex-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'text_slides',
                [
                    'label' => esc_html__('Text Slides', 'lunex-toolkit'),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'main_text' => esc_html__('Creative', 'lunex-toolkit'),
                            'highlighted_text' => esc_html__('Design', 'lunex-toolkit'),
                            'ending_text' => esc_html__('Agency', 'lunex-toolkit'),
                        ],
                        [
                            'main_text' => esc_html__('Creative', 'lunex-toolkit'),
                            'highlighted_text' => esc_html__('Design', 'lunex-toolkit'),
                            'ending_text' => esc_html__('Agency', 'lunex-toolkit'),
                        ],
                        [
                            'main_text' => esc_html__('Creative', 'lunex-toolkit'),
                            'highlighted_text' => esc_html__('Design', 'lunex-toolkit'),
                            'ending_text' => esc_html__('Agency', 'lunex-toolkit'),
                        ],
                    ],
                    'title_field' => '{{{ main_text }}} <span>{{{ highlighted_text }}}</span> {{{ ending_text }}}',
                ]
            );

            $this->end_controls_section();

            // Style 2 Content Controls
            $this->start_controls_section(
                'style2_content_section',
                [
                    'label' => esc_html__('Style 2 Content', 'lunex-toolkit'),
                    'tab' => Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'style_selection' => ['style2', 'style3'],
                    ],
                ]
            );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control(
                'slide_text',
                [
                    'label' => esc_html__('Slide Text', 'lunex-toolkit'),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('HOW IT WORKS', 'lunex-toolkit'),
                    'label_block' => true,
                ]
            );

            $repeater->add_control(
                'slide_image',
                [
                    'label' => esc_html__('Bolt Icon', 'lunex-toolkit'),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                         
                    ],
                ]
            );

            $this->add_control(
                'style2_slides',
                [
                    'label' => esc_html__('Slides', 'lunex-toolkit'),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'slide_text' => esc_html__('HOW IT WORKS', 'lunex-toolkit'),
                            'slide_image' => [
                                 
                            ],
                        ],
                        [
                            'slide_text' => esc_html__('DOCUMENTATION', 'lunex-toolkit'),
                            'slide_image' => [
                                 
                            ],
                        ],
                        [
                            'slide_text' => esc_html__('JOIN THE COMMUNITY', 'lunex-toolkit'),
                            'slide_image' => [
                                 
                            ],
                        ],
                        [
                            'slide_text' => esc_html__('IDEAS INTO REALITY', 'lunex-toolkit'),
                            'slide_image' => [
                                 
                            ],
                        ],
                    ],
                    'title_field' => '{{{ slide_text }}}',
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
                    'label' => esc_html__('Style 1 Content', 'lunex-toolkit'),
                    'tab'   => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            // Main Text Style
            $this->add_control(
                'main_text_heading',
                [
                    'label' => esc_html__('Main Text', 'lunex-toolkit'),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'main_text_color',
                [
                    'label' => esc_html__('Color', 'lunex-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .scroll_text_marquee h3' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'main_text_typography',
                    'selector' => '{{WRAPPER}} .scroll_text_marquee h3',
                ]
            );

            // Highlighted Text Style
            $this->add_control(
                'highlighted_text_heading',
                [
                    'label' => esc_html__('Highlighted Text', 'lunex-toolkit'),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'highlighted_text_color',
                [
                    'label' => esc_html__('Color', 'lunex-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .scroll_text_marquee h3 span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'highlighted_text_typography',
                    'selector' => '{{WRAPPER}} .scroll_text_marquee h3 span',
                ]
            );

            // Ending Text Style
            $this->add_control(
                'ending_text_heading',
                [
                    'label' => esc_html__('Ending Text', 'lunex-toolkit'),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'ending_text_color',
                [
                    'label' => esc_html__('Color', 'lunex-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .scroll_text_marquee h3' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'ending_text_typography',
                    'selector' => '{{WRAPPER}} .scroll_text_marquee h3',
                ]
            );

            $this->end_controls_section();
            
            // Style 2 Text Style
            $this->start_controls_section(
                'style2_text_style',
                [
                    'label' => esc_html__('Style 2 Text', 'lunex-toolkit'),
                    'tab' => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style2',
                    ],
                ]
            );

            $this->add_control(
                'style2_text_color',
                [
                    'label' => esc_html__('Text Color', 'lunex-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .scroll_text_marquee h3' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style2_background_color',
                [
                    'label' => esc_html__('Background Color', 'lunex-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .text_slider_area.with_border' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'style2_border',
                    'selector' => '{{WRAPPER}} .text_slider_area.with_border',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'style2_text_typography',
                    'selector' => '{{WRAPPER}} .scroll_text_marquee h3',
                ]
            );

            $this->end_controls_section();
            
            // Style 3 Text Style
            $this->start_controls_section(
                'style3_text_style',
                [
                    'label' => esc_html__('Style 3 Text', 'lunex-toolkit'),
                    'tab' => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style3',
                    ],
                ]
            );
            $this->add_responsive_control(
                'style3_margin',
                [
                    'label' => esc_html__('Margin', 'lunex-toolkit'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .scroll_text_area' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'style3_padding',
                [
                    'label' => esc_html__('Padding', 'lunex-toolkit'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .scroll_text_area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'style3_overflow',
                [
                    'label' => esc_html__('Overflow', 'lunex-toolkit'),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'hidden',
                    'options' => [
                        'visible' => esc_html__('Visible', 'lunex-toolkit'),
                        'hidden' => esc_html__('Hidden', 'lunex-toolkit'),
                        'scroll' => esc_html__('Scroll', 'lunex-toolkit'),
                        'auto' => esc_html__('Auto', 'lunex-toolkit'),
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .scroll_text_area' => 'overflow: {{VALUE}};',
                    ],
                ]
            );
            // Background Color Control
            $this->add_control(
                'style3_background_color',
                [
                    'label' => esc_html__('Background Color', 'lunex-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .scroll_text_area' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            // Text Color Control
            $this->add_control(
                'style3_text_color',
                [
                    'label' => esc_html__('Text Color', 'lunex-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .scroll_text_marquee h3.mb-0.text-uppercase.fw-semibold.lh-1' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Typography Control
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'style3_text_typography',
                    'selector' => '{{WRAPPER}} .scroll_text_marquee h3.mb-0.text-uppercase.fw-semibold.lh-1',
                ]
            );
            $this->end_controls_section();
        }

        protected function render()
        {
            $settings = $this->get_settings_for_display();

            if ($settings['style_selection'] === 'style1') { ?>
                    <!-- style 1 -->
                    <div class="video_area">
                        <div class="text_slider_area overflow-hidden">
                            <div class="container-fluid px-0 text_animation">
                                <div class="scroll_text_marquee d-flex align-items-center justify-content-center">
                                    <?php foreach ($settings['text_slides'] as $index => $slide): ?>
                                        <h3 class="mb-0 text-uppercase fw-semibold lh-1">
                                            <?php echo esc_html($slide['main_text']); ?>
                                            <span><?php echo esc_html($slide['highlighted_text']); ?></span>
                                            <?php echo esc_html($slide['ending_text']); ?>
                                        </h3>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } elseif ($settings['style_selection'] === 'style2') { ?>
                    <!-- style 2 -->
                    <div class="text_slider_area with_border overflow-hidden">
                        <div class="container-fluid px-0" data-cue="slideInUp">
                            <div class="scroll_text_marquee d-flex align-items-center justify-content-center">
                                <?php 
                                // Repeat the slides 4 times to create the marquee effect
                                for ($i = 0; $i < 4; $i++): 
                                    foreach ($settings['style2_slides'] as $slide): ?>
                                        <h3 class="mb-0 text-uppercase fw-semibold lh-1">
                                            <?php echo esc_html($slide['slide_text']); ?>
                                        </h3>
                                        <?php if (!empty($slide['slide_image']['url'])): ?>
                                            <img src="<?php echo esc_url($slide['slide_image']['url']); ?>" 
                                                class="w-auto d-inline-block" 
                                                alt="<?php echo esc_attr($slide['slide_text']); ?>">
                                        <?php endif; ?>
                                    <?php endforeach; 
                                endfor; ?>
                            </div>
                        </div>
                    </div>
                <?php } elseif ($settings['style_selection'] === 'style3') { ?>
                    <!-- style 3 -->
                    <div class="scroll_text_area overflow-hidden position-relative z-1">
                            <div class="scroll_text_marquee d-flex align-items-center justify-content-center">
                                <?php foreach ($settings['style2_slides'] as $slide): ?>
                                    <h3 class="mb-0 text-uppercase fw-semibold  lh-1">
                                        <?php echo esc_html($slide['slide_text']); ?>
                                    </h3>
                                    <img src="<?php echo esc_url($slide['slide_image']['url']); ?>" 
                                        class="w-auto d-inline-block" 
                                        alt="<?php echo esc_attr($slide['slide_text']); ?>">
                                <?php endforeach; ?>
                            </div>
                    </div>
                <?php } elseif ($settings['style_selection'] === 'style4') { ?>
                    <!-- style 4 -->
                    <div class="text_slider_area position-relative bg_black overflow-hidden">
                        <div class="container-fluid px-0">
                            <div class="scroll_text_marquee d-flex align-items-center justify-content-center">
                                <h3 class="mb-0 text-white text-uppercase fw-medium lh-1">
                                    Contact Us
                                </h3>
                                <img src="<?php echo get_template_directory_uri()?>/assets/images/objects/heart_beat.png" class="w-auto d-inline-block" alt="heart_beat">
                                <h3 class="mb-0 text-white text-uppercase fw-medium lh-1">
                                    Contact Us
                                </h3>
                                <img src="<?php echo get_template_directory_uri()?>/assets/images/objects/heart_beat.png" class="w-auto d-inline-block" alt="heart_beat">
                                <h3 class="mb-0 text-white text-uppercase fw-medium lh-1">
                                    Contact Us
                                </h3>
                                <img src="<?php echo get_template_directory_uri()?>/assets/images/objects/heart_beat.png" class="w-auto d-inline-block" alt="heart_beat">
                                <h3 class="mb-0 text-white text-uppercase fw-medium lh-1">
                                    Contact Us
                                </h3>
                                <img src="<?php echo get_template_directory_uri()?>/assets/images/objects/heart_beat.png" class="w-auto d-inline-block" alt="heart_beat">
                                <h3 class="mb-0 text-white text-uppercase fw-medium lh-1">
                                    Contact Us
                                </h3>
                                <img src="<?php echo get_template_directory_uri()?>/assets/images/objects/heart_beat.png" class="w-auto d-inline-block" alt="heart_beat">
                                <h3 class="mb-0 text-white text-uppercase fw-medium lh-1">
                                    Contact Us
                                </h3>
                                <img src="<?php echo get_template_directory_uri()?>/assets/images/objects/heart_beat.png" class="w-auto d-inline-block" alt="heart_beat">
                                <h3 class="mb-0 text-white text-uppercase fw-medium lh-1">
                                    Contact Us
                                </h3>
                                <img src="<?php echo get_template_directory_uri()?>/assets/images/objects/heart_beat.png" class="w-auto d-inline-block" alt="heart_beat">
                                <h3 class="mb-0 text-white text-uppercase fw-medium lh-1">
                                    Contact Us
                                </h3>
                                <img src="<?php echo get_template_directory_uri()?>/assets/images/objects/heart_beat.png" class="w-auto d-inline-block" alt="heart_beat">
                                <h3 class="mb-0 text-white text-uppercase fw-medium lh-1">
                                    Contact Us
                                </h3>
                                <img src="<?php echo get_template_directory_uri()?>/assets/images/objects/heart_beat.png" class="w-auto d-inline-block" alt="heart_beat">
                                <h3 class="mb-0 text-white text-uppercase fw-medium lh-1">
                                    Contact Us
                                </h3>
                                <img src="<?php echo get_template_directory_uri()?>/assets/images/objects/heart_beat.png" class="w-auto d-inline-block" alt="heart_beat">
                                <h3 class="mb-0 text-white text-uppercase fw-medium lh-1">
                                    Contact Us
                                </h3>
                                <img src="<?php echo get_template_directory_uri()?>/assets/images/objects/heart_beat.png" class="w-auto d-inline-block" alt="heart_beat">
                                <h3 class="mb-0 text-white text-uppercase fw-medium lh-1">
                                    Contact Us
                                </h3>
                                <img src="<?php echo get_template_directory_uri()?>/assets/images/objects/heart_beat.png" class="w-auto d-inline-block" alt="heart_beat">
                                <h3 class="mb-0 text-white text-uppercase fw-medium lh-1">
                                    Contact Us
                                </h3>
                                <img src="<?php echo get_template_directory_uri()?>/assets/images/objects/heart_beat.png" class="w-auto d-inline-block" alt="heart_beat">
                                <h3 class="mb-0 text-white text-uppercase fw-medium lh-1">
                                    Contact Us
                                </h3>
                                <img src="<?php echo get_template_directory_uri()?>/assets/images/objects/heart_beat.png" class="w-auto d-inline-block" alt="heart_beat">
                            </div>
                        </div>
                        <a href="<?php echo esc_url( home_url( 'contact' ) ); ?>" class="d-block position-absolute start-0 top-0 bottom-0 end-0"></a>
                     </div>
                <?php
                }
        }
    }

$widgets_manager->register(new lunex_text_slide());