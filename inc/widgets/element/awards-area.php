<?php
    namespace lunex_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class lunex_cta extends Widget_Base
    {

        public function get_name()
        {
            return 'lunex_cta';
        }

        public function get_title()
        {
            return __('Awards Area', 'lunex-toolkit');
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

        protected function register_controls_section(){

        // Title & Description
        $this->start_controls_section(
            'title_description_section',
            [
                'label' => esc_html__('Title', 'axero-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label'       => esc_html__('Title', 'axero-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__('We prioritize excellence over volume.', 'axero-toolkit'),
                'label_block' => true,
            ]
        );      

        $this->end_controls_section();

        // Style6 Content Section
        $this->start_controls_section(
            'style6_content_section',
            [
                'label' => esc_html__('Award Content', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
                 
            ]
        );

        // Style6 Main Title
        $this->add_control(
            'style6_main_title',
            [
                'label' => esc_html__('Main Title', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Awards', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        // Style6 Description
        $this->add_control(
            'style6_description',
            [
                'label' => esc_html__('Description', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Agency is a full-service agency', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        // Style6 Button Text
        $this->add_control(
            'style6_button_text',
            [
                'label' => esc_html__('Button Text', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Read More', 'lunex-toolkit'),
            ]
        );

        // Style6 Button Link
        $this->add_control(
            'style6_button_link',
            [
                'label' => esc_html__('Button Link', 'lunex-toolkit'),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ],
            ]
        );

        // Style6 Button Icon
        $this->add_control(
            'style6_button_icon',
            [
                'label' => esc_html__('Button Icon', 'lunex-toolkit'),
                'type' => Controls_Manager::ICONS,
                'fa4compatibility' => 'icon',
                'default' => [
                    'value' => 'ri-arrow-right-long-line',
                    'library' => 'remixicon',
                ],
            ]
        );

        // Style6 Award 1 Image
        $this->add_control(
            'style6_award1_image',
            [
                'label' => esc_html__('Award 1 Image', 'lunex-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        // Style6 Award 1 Text
        $this->add_control(
            'style6_award1_text',
            [
                'label' => esc_html__('Award 1 Text', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('3X SITE OF THE DAY', 'lunex-toolkit'),
            ]
        );

        // Style6 Award 2 Image
        $this->add_control(
            'style6_award2_image',
            [
                'label' => esc_html__('Award 2 Image', 'lunex-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        // Style6 Award 2 Text
        $this->add_control(
            'style6_award2_text',
            [
                'label' => esc_html__('Award 2 Text', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('3X SITE OF THE DAY', 'lunex-toolkit'),
            ]
        );

        $this->end_controls_section();
        }
        /**
         * Style Tab Content Section
         * ------------------------
         */

        protected function style_tab_content() { 


        //  Section Title Tab
        $this->start_controls_section(
            'style5_section_title_tab',
            [
                'label' => esc_html__('Section Title', 'axero-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // Section Title Color Control
        $this->add_control(
            'style5_section_title_color',
            [
                'label'     => esc_html__('Section Title Color', 'axero-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section_title.style_five h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Section Title Typography Control
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'style5_section_title_typography',
                'label'    => esc_html__('Section Title Typography', 'axero-toolkit'),
                'selector' => '{{WRAPPER}} .section_title.style_five h2',
            ]
        );

        // Section Border Line Color Control
        $this->add_control(
            'style5_section_border_color',
            [
                'label'     => esc_html__('Section Border Line Color', 'axero-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .border_bottom_style' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
        
        // Style6 Styling Section
        $this->start_controls_section(
            'style6_styling_section',
            [
                'label' => esc_html__('Award Styling', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
                 
            ]
        );

        // Background Image
        $this->add_control(
            'style6_bg_image_heading',
            [
                'label' => esc_html__('Background Image', 'lunex-toolkit'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'style6_awards_bg_image',
            [
                'label' => esc_html__('Background Image', 'lunex-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'selectors' => [
                    '{{WRAPPER}} .awards_inner_area' => 'background-image: url({{URL}});',
                ],
            ]
        );

        // Title Styling
        $this->add_control(
            'style6_title_heading',
            [
                'label' => esc_html__('Title', 'lunex-toolkit'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'style6_title_color',
            [
                'label' => esc_html__('Title Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awards_inner_area .content h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style6_title_typography',
                'selector' => '{{WRAPPER}} .awards_inner_area .content h3',
            ]
        );

        // Description Styling
        $this->add_control(
            'style6_desc_heading',
            [
                'label' => esc_html__('Description', 'lunex-toolkit'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'style6_desc_color',
            [
                'label' => esc_html__('Description Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awards_inner_area .content p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style6_desc_typography',
                'selector' => '{{WRAPPER}} .awards_inner_area .content p',
            ]
        );

        // Button Styling
        $this->add_control(
            'style6_button_heading',
            [
                'label' => esc_html__('Button', 'lunex-toolkit'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'style6_button_color',
            [
                'label' => esc_html__('Button Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn.primary_btn' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'style6_button_hover_color',
            [
                'label' => esc_html__('Button Hover Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn.primary_btn:hover' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'style6_button_border',
                'selector' => '{{WRAPPER}} .btn.primary_btn',
            ]
        );
        $this->add_control(
            'style6_button_border_radius',
            [
                'label' => esc_html__('Border Radius', 'lunex-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .btn.primary_btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style6_button_typography',
                'selector' => '{{WRAPPER}} .btn.primary_btn',
            ]
        );
        $this->add_control(
            'style6_button_bg_color',
            [
                'label' => esc_html__('Button Background Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn.primary_btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'style6_button_hover_bg_color',
            [
                'label' => esc_html__('Button Hover Background Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn.primary_btn:hover' => 'background-color: {{VALUE}} !important;',
                ],
            ]
        );

        // Button Icon Styling
        $this->add_control(
            'style6_button_icon_heading',
            [
                'label' => esc_html__('Button Icon', 'lunex-toolkit'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'style6_button_icon_color',
            [
                'label' => esc_html__('Icon Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn.primary_btn i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .btn.primary_btn svg' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'style6_button_icon_hover_color',
            [
                'label' => esc_html__('Icon Hover Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn.primary_btn:hover i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .btn.primary_btn:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'style6_button_icon_size',
            [
                'label' => esc_html__('Icon Size', 'lunex-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 26,
                ],
                'selectors' => [
                    '{{WRAPPER}} .btn.primary_btn i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .btn.primary_btn svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'style6_button_icon_padding',
            [
                'label' => esc_html__('Icon Padding', 'lunex-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'default' => [
                    'top' => '',
                    'right' => '45',
                    'bottom' => '',
                    'left' => '',
                    'unit' => 'px',
                    'isLinked' => false,
                ],
                'selectors' => [
                    '{{WRAPPER}} .btn.primary_btn span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Award Text Styling
        $this->add_control(
            'style6_award_heading',
            [
                'label' => esc_html__('Award Text', 'lunex-toolkit'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'style6_award_text_color',
            [
                'label' => esc_html__('Award Text Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awards_inner_area .box span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style6_award_text_typography',
                'selector' => '{{WRAPPER}} .awards_inner_area .box span',
            ]
        );
        $this->add_control(
            'style6_award_border_color',
            [
                'label' => esc_html__('Image Border Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awards_inner_area .box span' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        }

        protected function render()
        {
        $settings = $this->get_settings_for_display();  ?>
        
          <div class="awards_area">
            <div class="container-fluid max_w_1905px">
                <div class="section_title style_five">
                        <?php if (!empty($settings['section_title'])) : ?>
                        <h2 class="mb-0 text_animation">
                            <?php echo wp_kses_post($settings['section_title']); ?>
                        </h2>
                    <?php endif; ?>
                </div>
            </div>
            <div class="border_bottom_style"></div>
            <div class="container-fluid max_w_1905px">
                <div class="awards_inner_area">
                    <div class="row align-items-center">
                        <div class="col-xxl-7 col-lg-5">
                            <div class="content">
                                <?php if ( !empty($settings['style6_main_title']) ) : ?>
                                    <h3 class="text-uppercase">
                                        <?php echo wp_kses_post($settings['style6_main_title']); ?>
                                    </h3>
                                <?php endif; ?>
                                <?php if ( !empty($settings['style6_description']) ) : ?>
                                    <p>
                                        <?php echo wp_kses_post($settings['style6_description']); ?>
                                    </p>
                                <?php endif; ?>
                                <?php if ( !empty($settings['style6_button_text']) ) : ?>
                                    <a href="<?php echo esc_url($settings['style6_button_link']['url']); ?>" class="btn primary_btn">
                                        <span class="d-inline-block position-relative">
                                            <?php echo wp_kses_post($settings['style6_button_text']); ?>
                                             <?php \Elementor\Icons_Manager::render_icon( $settings['style6_button_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                        </span>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-xxl-5 col-lg-7">
                            <div class="box">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <?php if ( !empty($settings['style6_award1_image']['url']) ) : ?>
                                            <div class="item">
                                                <img src="<?php echo esc_url($settings['style6_award1_image']['url']); ?>" alt="<?php echo esc_attr($settings['style6_award1_text']); ?>">
                                                <?php if ( !empty($settings['style6_award1_text']) ) : ?>
                                                    <span class="d-block text-uppercase fw-medium">
                                                        <?php echo wp_kses_post($settings['style6_award1_text']); ?>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <?php if ( !empty($settings['style6_award2_image']['url']) ) : ?>
                                            <div class="item">
                                                <img src="<?php echo esc_url($settings['style6_award2_image']['url']); ?>" alt="<?php echo esc_attr($settings['style6_award2_text']); ?>">
                                                <?php if ( !empty($settings['style6_award2_text']) ) : ?>
                                                    <span class="d-block text-uppercase fw-medium">
                                                        <?php echo wp_kses_post($settings['style6_award2_text']); ?>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>

        <?php
            }
                }
            

    $widgets_manager->register(new lunex_cta());