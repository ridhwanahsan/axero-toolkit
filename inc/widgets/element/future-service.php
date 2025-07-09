<?php
    namespace lunex_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class lunex_future_service extends Widget_Base
    {

        public function get_name()
        {
            return 'lunex_future_service';
        }

        public function get_title()
        {
            return __('Future Service', 'lunex-toolkit');
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
                        'style3' => esc_html__('Style 3', 'lunex-toolkit'),
                    ],
                ]
            );

            $this->end_controls_section();
            
        $this->start_controls_section(
            'service_items_section',
            [
                'label' => esc_html__('Service Items', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'style_selection' => 'style1',
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'service_title',
            [
                'label' => esc_html__('Title', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Service Title', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'service_description',
            [
                'label' => esc_html__('Description', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Service description goes here', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'service_items',
            [
                'label' => esc_html__('Services', 'lunex-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'service_title' => esc_html__('Smart strategy', 'lunex-toolkit'),
                        'service_description' => esc_html__('We craft data-driven strategies tailored to your business goals, ensuring efficiency & impactful results.', 'lunex-toolkit'),
                    ],
                    [
                        'service_title' => esc_html__('Seamless execution', 'lunex-toolkit'),
                        'service_description' => esc_html__('Our expert team transforms ideas into reality with precision, delivering high-quality solutions on time.', 'lunex-toolkit'),
                    ],
                ],
                'title_field' => '{{{ service_title }}}',
            ]
        );
$this->end_controls_section();

        $this->start_controls_section(
            'service_items_section_2',
            [
                'label' => esc_html__('Service Items', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'style_selection' => 'style2',
                ],
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'service_icon',
            [
                'label' => esc_html__('Icon', 'lunex-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'service_icon_hover',
            [
                'label' => esc_html__('Icon Hover', 'lunex-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'service_title',
            [
                'label' => esc_html__('Title', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Service Title', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'service_description',
            [
                'label' => esc_html__('Description', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Service description goes here', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'service_items_2',
            [
                'label' => esc_html__('Services', 'lunex-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'service_title' => esc_html__('Ideation phase', 'lunex-toolkit'),
                        'service_description' => esc_html__('We begin by brainstorming and refining creative ideas that align with your brand vision. This phase sets the foundation for a strategic and impactful execution.', 'lunex-toolkit'),
                    ],
                ],
                'title_field' => '{{{ service_title }}}',
            ]
        );

        $this->end_controls_section();
        
        $this->start_controls_section(
            'style3_content_section',
            [
                'label' => esc_html__('Style 3 Content', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'style_selection' => 'style3',
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'feature_title',
            [
                'label' => esc_html__('Title', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Grow Your Business', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'feature_number',
            [
                'label' => esc_html__('Number', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => '01',
            ]
        );
        $repeater->add_control(
            'play_now_image',
            [
                'label' => esc_html__('Play Now Image', 'lunex-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'description' => esc_html__('Upload the play button image that appears on video thumbnails', 'lunex-toolkit'),
                'condition' => [
                    'video_url[url]!' => '',
                ],
            ]
        );
        $repeater->add_control(
            'feature_image',
            [
                'label' => esc_html__('Feature Image', 'lunex-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'video_url',
            [
                'label' => esc_html__('Video URL', 'lunex-toolkit'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'lunex-toolkit'),
                'default' => [
                    'url' => 'https://www.youtube.com/watch?v=ObKsCs5mYGQ',
                ],
            ]
        );
        $repeater->add_control(
            'video_btn_note',
            [
                'type' => Controls_Manager::RAW_HTML,
                'raw' => esc_html__('Note: If you don\'t need the video play button, simply leave the Video URL field empty.', 'lunex-toolkit'),
                'content_classes' => 'elementor-descriptor',
                'condition' => [
                    'video_url[url]!' => '',
                ],
            ]
        );

        $this->add_control(
            'style3_items',
            [
                'label' => esc_html__('Features', 'lunex-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'feature_title' => esc_html__('Grow Your Business', 'lunex-toolkit'),
                        'feature_number' => '01',
                    ],
                ],
                'title_field' => '{{{ feature_title }}}',
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
            'feature_item_style',
            [
                'label' => esc_html__('Feature Item Style', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style1',
                ],
            ]
        );

        $this->add_control(
            'line_color',
            [
                'label' => esc_html__('Line Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-feature-item .line' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'circle_color',
            [
                'label' => esc_html__('Circle Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-feature-item::before, {{WRAPPER}} .col-lg-3:last-child .single-feature-item::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-feature-item h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__('Title Typography', 'lunex-toolkit'),
                'selector' => '{{WRAPPER}} .single-feature-item h3',
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => esc_html__('Description Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-feature-item p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => esc_html__('Description Typography', 'lunex-toolkit'),
                'selector' => '{{WRAPPER}} .single-feature-item p',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_tab_2',
            [
                'label' => esc_html__('Style Tab 2', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style2',
                ],
            ]
        );

        $this->add_control(
            'number_color',
            [
                'label' => esc_html__('Number Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .works-process-lines .number' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_control(
            'number_hover_color',
            [
                'label' => esc_html__('Number Hover Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .works-process-lines .item:hover .number' => 'color: {{VALUE}}; background-color: {{VALUE}};',
                ],
            ]
        );

 

        $this->add_control(
            'title_color_2',
            [
                'label' => esc_html__('Title Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .works-process-lines h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'hover_color',
            [
                'label' => esc_html__('Hover Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .works-process-lines .item:hover h3' => 'color: {{VALUE}};',
                     '{{WRAPPER}} .works-process-lines .item:hover .number' => 'background-color: {{VALUE}};',
                     
                    '{{WRAPPER}} .works-process-lines .item:hover::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'none_hover_color',
            [
                'label' => esc_html__('None Hover Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .works-process-lines .item h3' => 'color: {{VALUE}};',
                    
                    '{{WRAPPER}} .works-process-lines .item::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography_2',
                'label' => esc_html__('Title Typography', 'lunex-toolkit'),
                'selector' => '{{WRAPPER}} .works-process-lines h3',
            ]
        );

        $this->add_control(
            'description_color_2',
            [
                'label' => esc_html__('Description Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .works-process-lines p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography_2',
                'label' => esc_html__('Description Typography', 'lunex-toolkit'),
                'selector' => '{{WRAPPER}} .works-process-lines p',
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'style3_content_style',
            [
                'label' => esc_html__('Style 3 Content', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style3',
                ],
            ]
        );

        $this->add_control(
            'style3_number_color',
            [
                'label' => esc_html__('Number Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features_list .item h3 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style3_number_typography',
                'label' => esc_html__('Number Typography', 'lunex-toolkit'),
                'selector' => '{{WRAPPER}} .features_list .item h3 span',
            ]
        );

        $this->add_control(
            'style3_title_color',
            [
                'label' => esc_html__('Title Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features_list .item h3 strong' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style3_title_typography',
                'label' => esc_html__('Title Typography', 'lunex-toolkit'),
                'selector' => '{{WRAPPER}} .features_list .item h3 strong',
            ]
        );

        $this->add_control(
            'style3_icon_color',
            [
                'label' => esc_html__('Icon Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features_list .item .box .video_btn i' => 'color: {{VALUE}};',
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

        <div class="features-area">
        <div class="row gx-md-0">
            <?php foreach ($settings['service_items'] as $item): ?>
            <div class="col-lg-3 col-sm-6">
                <div class="single-feature-item position-relative">
                    <div class="line"></div>
                    <h3>
                        <?php echo esc_html($item['service_title']); ?>
                    </h3>
                    <p>
                        <?php echo esc_html($item['service_description']); ?>
                    </p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        </div>

        <?php
            } elseif ($settings['style_selection'] === 'style2') {
                    ?>
            <!-- style 2 -->
                <div class="works-process-area ">
                         <div class="container">
                <div class="row">
                   
                    <?php foreach ($settings['service_items_2'] as $index => $item): ?>
                    
                        <div class="works-process-lines">
                            <div class="item position-relative">
                                <div class="number d-flex align-items-center justify-content-center text-center rounded-circle">
                                    <?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?>
                                </div>
                                <div class="icon position-relative">
                                    <img src="<?php echo esc_url($item['service_icon']['url']); ?>" alt="icon">
                                    <img src="<?php echo esc_url($item['service_icon_hover']['url']); ?>" alt="icon">
                                </div>
                                <h3>
                                    <?php echo esc_html($item['service_title']); ?>
                                </h3>
                                <p>
                                    <?php echo esc_html($item['service_description']); ?>
                                </p>
                                <hr>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    
                </div>
        </div>
        </div>

        <?php
            } elseif ($settings['style_selection'] === 'style3') {
                    ?>
            <!-- style 3 -->
      <div class="features_area" >
            <div class="features_list" data-cues="slideInUp" data-group="features_list">
                <?php foreach ($settings['style3_items'] as $index => $item): ?>
                <div class="item">
                    <div class="container position-relative">
                        <h3 class="mb-0 fw-normal text-uppercase">
                            <span class="fw-bold"><?php echo esc_html($item['feature_number']); ?>.</span> 
                            <strong class="fw-bold"><?php echo esc_html($item['feature_title']); ?></strong>
                        </h3>
                        <div class="box">
                            <?php if (!empty($item['feature_image']['url'])): ?>
                                <img src="<?php echo esc_url($item['feature_image']['url']); ?>" alt="<?php echo esc_attr($item['feature_title']); ?>">
                            <?php endif; ?>
                            <?php if (!empty($item['video_url']['url'])): ?>
                                <a href="<?php echo esc_url($item['video_url']['url']); ?>" class="video_btn popup_video popup-youtube">
                                    <img src="<?php echo esc_url($item['play_now_image']['url']); ?>" alt="<?php echo esc_attr__('Play Now', 'lunex-toolkit'); ?>">
                                    <i class="ri-play-large-line"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

    <?php
        }
            }
        }

    $widgets_manager->register(new lunex_future_service());