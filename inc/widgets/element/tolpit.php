<?php
    namespace lunex_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class lunex_toolpit extends Widget_Base
    {

        public function get_name()
        {
            return 'lunex_toolpit';
        }

        public function get_title()
        {
            return __('Toolpit', 'lunex-toolkit');
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
        $this->start_controls_section(
            'style1_content_section',
            [
                'label' => esc_html__('Style 1 Content', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'style1_heading',
            [
                'label' => esc_html__('Heading', 'lunex-toolkit'),
                'type'  => Controls_Manager::TEXT,
                'default' => esc_html__('Effortlessly increase your website\'s organic traffic', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'style1_border_image',
            [
                'label' => esc_html__('Border Image', 'lunex-toolkit'),
                'type'  => Controls_Manager::MEDIA,
                'default' => [
                    'url' => '', // Default URL can be set if needed
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'style1_description',
            [
                'label' => esc_html__('Description', 'lunex-toolkit'),
                'type'  => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Effortlessly increase your website\'s organic traffic with our expert SEO strategies. We optimize your site to attract more visitors, enhance user engagement, and improve search engine rankings, helping you achieve long-term growth and visibility without relying on paid ads.', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'style1_icon1',
            [
                'label' => esc_html__('Icon 1', 'lunex-toolkit'),
                'type'  => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'ri-instagram-line', // Default icon can be set if needed
                    'library' => 'remix', // Specify the icon library
                ],
            ]
        );

        $this->add_control(
            'style1_icon2',
            [
                'label' => esc_html__('Icon 2', 'lunex-toolkit'),
                'type'  => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'ri-at-line', // Ensure a valid default icon is set
                    'library' => 'remix',
                ],
            ]
        );

        $this->add_control(
            'style1_icon3',
            [
                'label' => esc_html__('Icon 3', 'lunex-toolkit'),
                'type'  => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'ri-heart-line',
                   
                ],
            ]
        );

        $this->add_control(
            'style1_icon4',
            [
                'label' => esc_html__('Icon 4', 'lunex-toolkit'),
                'type'  => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'ri-twitter-x-line',
                    'library' => 'remix',
                ],
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
            'style1_icon_controls',
            [
                'label' => esc_html__('Icon Controls', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'style1_icon1_color',
            [
                'label' => __( 'Icon 1 Color', 'lunex-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .boost-content .icons div:nth-child(1)' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'style1_icon1_bg_color',
            [
                'label' => __( 'Icon 1 Background Color', 'lunex-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .boost-content .icons div:nth-child(1)' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'style1_icon1_size',
            [
                'label' => __( 'Icon 1 Size', 'lunex-toolkit' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem'],
                'default' => [
                    'size' => 24,
                    'unit' => 'px',
                ],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .boost-content .icons div:nth-child(1) svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'style1_icon2_color',
            [
                'label' => __( 'Icon 2 Color', 'lunex-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .boost-content .icons div:nth-child(2)' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'style1_icon2_bg_color',
            [
                'label' => __( 'Icon 2 Background Color', 'lunex-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .boost-content .icons div:nth-child(2)' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'style1_icon2_size',
            [
                'label' => __( 'Icon 2 Size', 'lunex-toolkit' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem'],
                'default' => [
                    'size' => 24,
                    'unit' => 'px',
                ],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .boost-content .icons div:nth-child(2) svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'style1_icon3_color',
            [
                'label' => __( 'Icon 3 Color', 'lunex-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .boost-content .icons div:nth-child(3)' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'style1_icon3_bg_color',
            [
                'label' => __( 'Icon 3 Background Color', 'lunex-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .boost-content .icons div:nth-child(3)' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'style1_icon3_size',
            [
                'label' => __( 'Icon 3 Size', 'lunex-toolkit' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem'],
                'default' => [
                    'size' => 24,
                    'unit' => 'px',
                ],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .boost-content .icons div:nth-child(3) svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'style1_icon4_color',
            [
                'label' => __( 'Icon 4 Color', 'lunex-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .boost-content .icons div:nth-child(4)' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'style1_icon4_bg_color',
            [
                'label' => __( 'Icon 4 Background Color', 'lunex-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .boost-content .icons div:nth-child(4)' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'style1_icon4_size',
            [
                'label' => __( 'Icon 4 Size', 'lunex-toolkit' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem'],
                'default' => [
                    'size' => 24,
                    'unit' => 'px',
                ],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .boost-content .icons div:nth-child(4) svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'boost_content_before_color',
            [
                'label' => __( 'Before Element Color', 'lunex-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .boost-content::before' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'boost_content_before_bg_color',
            [
                'label' => __( 'Before Element Background Color', 'lunex-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .boost-content::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Heading Color Control
        $this->add_control(
            'style1_heading_color',
            [
                'label' => esc_html__('Heading Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .boost-content h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Heading Hover Color Control
        $this->add_control(
            'style1_heading_hover_color',
            [
                'label' => esc_html__('Heading Hover Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .boost-content h2:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Heading Typography Control
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style1_heading_typography',
                'selector' => '{{WRAPPER}} .boost-content h2',
            ]
        );
        // Paragraph Color Control
        $this->add_control(
            'style1_paragraph_color',
            [
                'label' => esc_html__('Paragraph Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .boost-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Paragraph Typography Control
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style1_paragraph_typography',
                'selector' => '{{WRAPPER}} .boost-content p',
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
          <div class="boost-area">
            <div class="container">
                <div class="boost-content text-center position-relative">
                    <h2 class="fw-normal mx-auto position-relative text-animation">
                        
                        <?php echo esc_html($settings['style1_heading']); ?>
                        
                        <?php if (!empty($settings['style1_border_image']['url'])) : ?>
                            <img src="<?php echo esc_url($settings['style1_border_image']['url']); ?>" alt="<?php esc_attr_e('border', 'lunex-toolkit'); ?>" loading="lazy" class="border-image">
                        <?php endif; ?>


                    </h2>
                    <p class="mx-auto">
                        <?php echo esc_html($settings['style1_description']); ?>
                    </p>
                    <div class="icons">
                        <div class="rounded-circle text-center">
                            <?php \Elementor\Icons_Manager::render_icon($settings['style1_icon1'], ['aria-hidden' => 'true']); ?>
                        </div>
                        <div class="rounded-circle text-center">
                            <?php \Elementor\Icons_Manager::render_icon($settings['style1_icon2'], ['aria-hidden' => 'true']); ?>
                        </div>
                        <div class="rounded-circle text-center">
                            
                            <?php \Elementor\Icons_Manager::render_icon($settings['style1_icon3'], ['aria-hidden' => 'true']); ?>
                      
                        </div>
                        <div class="rounded-circle text-center">
                            <?php \Elementor\Icons_Manager::render_icon($settings['style1_icon4'], ['aria-hidden' => 'true']); ?>
                        </div>
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

    $widgets_manager->register(new lunex_toolpit());