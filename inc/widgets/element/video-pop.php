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
            return __('Pop Video', 'lunex-toolkit');
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
            'style1_content_tab',
            [
                'label' => esc_html__('Style 1 Content', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'style_selection' => 'style1',
                ],
            ]
        );

        $this->add_control(
            'style1_main_title',
            [
                'label'       => esc_html__('Main Title', 'lunex-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__('Welcome to Style 1', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'style1_sub_title',
            [
                'label'       => esc_html__('Sub Title', 'lunex-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__('Experience the difference', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'style1_video_url',
            [
                'label'       => esc_html__('Video URL', 'lunex-toolkit'),
                'type'        => Controls_Manager::URL,
                'default'     => [
                    'url' => 'https://www.youtube.com/watch?v=HKk4oLIzhhM',
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'style1_video_image',
            [
                'label' => esc_html__('Video Image', 'lunex-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/videos/video1.jpg',
                ],
            ]
        );
        $this->add_control(
            'shape5_image',
            [
                'label' => esc_html__('Shape Image 5', 'lunex-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/shapes/shape5.svg',
                ],
            ]
        );

        $this->add_control(
            'shape5_image_visibility',
            [
                'label' => esc_html__('Shape Image 5 Visibility', 'lunex-toolkit'),
                'type' => Controls_Manager::SELECT,
                'default' => 'visible',
                'options' => [
                    'visible' => esc_html__('Visible', 'lunex-toolkit'),
                    'hidden' => esc_html__('Hidden', 'lunex-toolkit'),
                ],
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'style2_section',
            [
                'label' => esc_html__('Style 2 Settings', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'style_selection' => 'style2',
                ],
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

        }
        /**
         * Style Tab Content Section
         * ------------------------
         */

        protected function style_tab_content()
        {
            // content style controls tab
        $this->start_controls_section(
            'style2_button_style',
            [
                'label' => esc_html__('Button Style', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style2',
                ],
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

        }

        protected function render()
        {
            $settings = $this->get_settings_for_display();

            if ($settings['style_selection'] === 'style1') {
            ?>
            <!-- style 1 -->

        <div class="video-area">
            <div class="container">
                <div class="video-content position-relative z-1 text-center" data-cues="slideInUp">
                    <div class="box mx-auto position-relative">
                        <img src="<?php echo esc_url($settings['style1_video_image']['url']); ?>" alt="video-image">
                        <a href="<?php echo esc_url($settings['style1_video_url']['url']); ?>" class="video-btn popup-youtube d-inline-block rounded-circle text-center">
                            <i class="ri-play-fill"></i>
                        </a>
                    </div>
                    <?php if (!empty($settings['shape5_image']['url'])) : ?>
                    <div class="shape5">
                        <img src="<?php echo esc_url($settings['shape5_image']['url']); ?>" alt="shape5">
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <?php
            } elseif ($settings['style_selection'] === 'style2') {
                    ?>
            <!-- style 2 -->
             <div class="video_btn_box text-center">
                <a href="<?php echo esc_url($settings['style2_video_url']['url']); ?>" class="video_btn popup_video popup-youtube">
                    <i class="ri-play-fill"></i>
                </a>
            </div>

        <?php
            } elseif ($settings['style_selection'] === 'style3') {
                    ?>
            <!-- style 3 -->

    <?php
        }
            }
        }

    $widgets_manager->register(new lunex_video_pop());