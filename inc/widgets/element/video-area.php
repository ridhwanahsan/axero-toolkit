<?php
    namespace lunex_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class lunex_video_pop extends Widget_Base
    {

        public function get_name()
        {
            return 'lunex_video_pop';
        }

        public function get_title()
        {
            return __('Video Area', 'lunex-toolkit');
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
         // style2 content 
            $this->start_controls_section(
                'style2_content',
                [
                    'label' => esc_html__('Content Controls', 'lunex-toolkit'),
                    'tab' => Controls_Manager::TAB_CONTENT,
                    
                ]
            );

            $this->add_control(
                'style2_main_title',
                [
                    'label' => esc_html__('Main Title', 'lunex-toolkit'),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Their dedication to creativity and professionalism was evident at every point in the project.', 'lunex-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'style2_name',
                [
                    'label' => esc_html__('Name', 'lunex-toolkit'),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('David Korren', 'lunex-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'style2_designation',
                [
                    'label' => esc_html__('Designation', 'lunex-toolkit'),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Product Manager', 'lunex-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'style2_image',
                [
                    'label' => esc_html__('Image', 'lunex-toolkit'),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => get_template_directory_uri() . '/assets/images/product_manager.jpg',
                    ],
                ]
            );

            $this->end_controls_section();

            $this->start_controls_section(
                'style2_section',
                [
                    'label' => esc_html__('Button Url', 'lunex-toolkit'),
                    'tab' => Controls_Manager::TAB_CONTENT,
                    
                ]
            );

            $this->add_control(
                'style2_video_url',
                [
                    'label' => esc_html__('Video URL', 'lunex-toolkit'),
                    'type' => Controls_Manager::URL,
                    'default' => [
                        'url' => 'https://www.youtube.com/watch?v=ObKsCs5mYGQ',
                    ],
                    'label_block' => true,
                ]
            );

            $this->end_controls_section();

            // Text Content Controls
            $this->start_controls_section(
                'style2_text_content',
                [
                    'label' => esc_html__('Text Content', 'lunex-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                    
                ]
            );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control(
                'style2_main_text',
                [
                    'label' => esc_html__('Main Text', 'lunex-toolkit'),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Creative', 'lunex-toolkit'),
                    'label_block' => true,
                ]
            );

            $repeater->add_control(
                'style2_highlighted_text', 
                [
                    'label' => esc_html__('Highlighted Text', 'lunex-toolkit'),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Design', 'lunex-toolkit'),
                    'label_block' => true,
                ]
            );

            $repeater->add_control(
                'style2_ending_text',
                [
                    'label' => esc_html__('Ending Text', 'lunex-toolkit'),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Agency', 'lunex-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'style2_text_slides',
                [
                    'label' => esc_html__('Text Slides', 'lunex-toolkit'),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'style2_main_text' => esc_html__('Creative', 'lunex-toolkit'),
                            'style2_highlighted_text' => esc_html__('Design', 'lunex-toolkit'),
                            'style2_ending_text' => esc_html__('Agency', 'lunex-toolkit'),
                        ],
                        [
                            'style2_main_text' => esc_html__('Creative', 'lunex-toolkit'),
                            'style2_highlighted_text' => esc_html__('Design', 'lunex-toolkit'),
                            'style2_ending_text' => esc_html__('Agency', 'lunex-toolkit'),
                        ],
                        [
                            'style2_main_text' => esc_html__('Creative', 'lunex-toolkit'),
                            'style2_highlighted_text' => esc_html__('Design', 'lunex-toolkit'),
                            'style2_ending_text' => esc_html__('Agency', 'lunex-toolkit'),
                        ],
                    ],
                    'title_field' => '{{{ style2_main_text }}} <span>{{{ style2_highlighted_text }}}</span> {{{ style2_ending_text }}}',
                ]
            );

            $this->end_controls_section();
 
        }
        /**
         * Style Tab Content Section
         * ------------------------
         */

        protected function style_tab_content(){
 
        // content style controls tab
        $this->start_controls_section(
            'style2_text_style',
            [
                'label' => esc_html__('Text Style', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style2_title_typography',
                'selector' => '{{WRAPPER}} .video_content h3',
            ]
        );
        $this->add_control(
            'style2_title_color',
            [
                'label' => esc_html__('Title Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .video_content h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style2_name_typography',
                'selector' => '{{WRAPPER}} .video_content .info h4',
            ]
        );
        $this->add_control(
            'style2_name_color',
            [
                'label' => esc_html__('Name Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .video_content .info h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'style2_designation_typography',
                'selector' => '{{WRAPPER}} .video_content .info span',
            ]
        );
        $this->add_control(
            'style2_designation_color',
            [
                'label' => esc_html__('Designation Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .video_content .info span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'style2_content_bg_color',
            [
                'label' => esc_html__('Content Background Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .video_content' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'style2_button_style',
            [
                'label' => esc_html__('Button Style', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => esc_html__('Background Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .video_btn_box .video_btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_bg_color',
            [
                'label' => esc_html__('Hover Background Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .video_btn_box .video_btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'button_icon_color',
            [
                'label' => esc_html__('Icon Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .video_btn_box .video_btn i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_icon_hover_color',
            [
                'label' => esc_html__('Icon Hover Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .video_btn_box .video_btn:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style2_content_style',
            [
                'label'     => esc_html__('Text Slider Style', 'lunex-toolkit'),
                'tab'       => Controls_Manager::TAB_STYLE,
                
            ]
        );

        // Main Text Style
        $this->add_control(
            'style2_main_text_heading',
            [
                'label'     => esc_html__('Main Text', 'lunex-toolkit'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'style2_main_text_color',
            [
                'label'     => esc_html__('Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .scroll_text_marquee h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'style2_main_text_typography',
                'selector' => '{{WRAPPER}} .scroll_text_marquee h3',
            ]
        );

        // Highlighted Text Style
        $this->add_control(
            'style2_highlighted_text_heading',
            [
                'label'     => esc_html__('Highlighted Text', 'lunex-toolkit'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'style2_highlighted_text_color',
            [
                'label'     => esc_html__('Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .scroll_text_marquee h3 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'style2_highlighted_text_typography',
                'selector' => '{{WRAPPER}} .scroll_text_marquee h3 span',
            ]
        );

        // Ending Text Style
        $this->add_control(
            'style2_ending_text_heading',
            [
                'label'     => esc_html__('Ending Text', 'lunex-toolkit'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'style2_ending_text_color',
            [
                'label'     => esc_html__('Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .scroll_text_marquee h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'style2_ending_text_typography',
                'selector' => '{{WRAPPER}} .scroll_text_marquee h3',
            ]
        );

        $this->end_controls_section();
 
        }

        protected function render()
        {
            $settings = $this->get_settings_for_display(); ?>
            
              <div class="video_area pt_150">
                    <div class="container-fluid">
                        <div class="row align-items-center" data-cues="slideInUp" data-group="video_area">
                            <div class="col-xl-6 col-lg-7 col-md-8">
                                <div class="video_content">
                                    <?php if (!empty($settings['style2_main_title'])) : ?>
                                    <h3 class="text-uppercase fw-medium">
                                        <?php echo wp_kses_post($settings['style2_main_title']); ?>
                                    </h3>
                                    <?php endif; ?>
                                    <div class="info d-flex align-items-center">
                                        <?php if (!empty($settings['style2_image']['url'])) : ?>
                                        <img src="<?php echo esc_url($settings['style2_image']['url']); ?>" alt="<?php echo esc_attr($settings['style2_name']); ?>">
                                        <?php endif; ?>
                                        <div>
                                            <?php if (!empty($settings['style2_name'])) : ?>
                                            <h4 class="text-uppercase fw-medium">
                                                <?php echo wp_kses_post($settings['style2_name']); ?>
                                            </h4>
                                            <?php endif; ?>
                                            <?php if (!empty($settings['style2_designation'])) : ?>
                                            <span class="d-block">
                                                <?php echo wp_kses_post($settings['style2_designation']); ?>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-5 col-md-4">
                                <div class="video_btn_box text-center">
                                    <?php if (!empty($settings['style2_video_url']['url'])) : ?>
                                        <a href="<?php echo esc_url($settings['style2_video_url']['url']); ?>" class="video_btn popup_video popup-youtube">
                                            <i class="ri-play-fill"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text_slider_area overflow-hidden pt_150">
                        <div class="container-fluid px-0 text_animation">
                            <div class="scroll_text_marquee d-flex align-items-center justify-content-center">
                                <?php foreach ($settings['style2_text_slides'] as $index => $slide): ?>
                                    <h3 class="mb-0 text-uppercase fw-semibold lh-1">
                                        <?php echo esc_html($slide['style2_main_text']); ?>
                                        <span><?php echo esc_html($slide['style2_highlighted_text']); ?></span>
                                        <?php echo esc_html($slide['style2_ending_text']); ?>
                                    </h3>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
             </div>
 
             

    <?php
        }
            }
        

    $widgets_manager->register(new lunex_video_pop());