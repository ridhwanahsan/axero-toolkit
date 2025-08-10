<?php
    namespace axero_toolkit\Widgets;
    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_awesome_about extends Widget_Base
    {

        public function get_name()
        {
            return 'axero-awesome-about';
        }

        public function get_title()
        {
            return __('Awesome About', 'axero-toolkit');
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
             
            $this->start_controls_section(
                'style3_content_section',
                [
                    'label'     => esc_html__('Control Content', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_CONTENT,
                     
                ]
            );

            $this->add_control(
                'style3_main_heading',
                [
                    'label'       => esc_html__('Main Heading', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXTAREA,
                    'default'     => esc_html__('Our California-based <span>creative agency</span> is known for combining creativity & expertise to deliver outstanding UI/UX designs with <span>innovative</span> ideas and user-friendly functionality.'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'style3_description',
                [
                    'label'       => esc_html__('Description', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXTAREA,
                    'default'     => esc_html__('We provide a world-class creative design team on demand, ready to design, build, deliver, and scale your vision with unmatched efficiency. For us, success is best measured by clients who choose to partner with us repeatedly. In fact, over half of our clients collaborate with us beyond their initial project.'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'style3_button_text',
                [
                    'label'       => esc_html__('Button Text', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Know More Us'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'style3_button_link',
                [
                    'label'       => esc_html__('Button Link', 'axero-toolkit'),
                    'type'        => Controls_Manager::URL,
                    'placeholder' => esc_html__('https://your-link.com', 'axero-toolkit'),
                    'default'     => [
                        'url' => '#',
                    ],
                    'label_block' => true,
                ]
            );
            // Button Icon
            $this->add_control(
                'style3_button_icon',
                [
                    'label' => esc_html__('Button Icon', 'axero-toolkit'),
                    'type'  => \Elementor\Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'ri-arrow-right-long-line',
                        'library' => 'remixicon',
                    ],
                ]
            );

            $this->add_control(
                'style3_circle_text',
                [
                    'label'       => esc_html__('Circle Text', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Since 2010'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'style3_circle_image',
                [
                    'label'   => esc_html__('Circle Image', 'axero-toolkit'),
                    'type'    => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ]
            );

            $this->add_control(
                'style3_image1',
                [
                    'label'   => esc_html__('Left Image', 'axero-toolkit'),
                    'type'    => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ]
            );

            $this->add_control(
                'style3_image2',
                [
                    'label'   => esc_html__('Right Image', 'axero-toolkit'),
                    'type'    => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
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
 
        // Control Controls
        $this->start_controls_section(
            'style3_style_section',
            [
                'label'     => esc_html__('Control Style', 'axero-toolkit'),
                'tab'       => Controls_Manager::TAB_STYLE,
               
            ]
        );

        // Main Title Style
        $this->add_control(
            'style3_main_title_heading',
            [
                'label'     => esc_html__('Main Title', 'axero-toolkit'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'style3_main_title_color',
            [
                'label'     => esc_html__('Color', 'axero-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awesome_about_us_title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'style3_main_title_typography',
                'selector' => '{{WRAPPER}} .awesome_about_us_title h2',
            ]
        );

        // Inner Title Style
        $this->add_control(
            'style3_inner_title_heading',
            [
                'label'     => esc_html__('Inner Title', 'axero-toolkit'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'style3_inner_title_color',
            [
                'label'     => esc_html__('Color', 'axero-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awesome_about_us_title h2 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Description Style
        $this->add_control(
            'style3_description_heading',
            [
                'label'     => esc_html__('Description', 'axero-toolkit'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'style3_description_color',
            [
                'label'     => esc_html__('Color', 'axero-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awesome_about_us_content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'style3_description_typography',
                'selector' => '{{WRAPPER}} .awesome_about_us_content p',
            ]
        );

        // Circle Text Style
        $this->add_control(
            'style3_circle_text_heading',
            [
                'label'     => esc_html__('Circle Text', 'axero-toolkit'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'style3_circle_text_color',
            [
                'label'     => esc_html__('Color', 'axero-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awesome_about_us_content .circle_text span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'style3_circle_text_typography',
                'selector' => '{{WRAPPER}} .awesome_about_us_content .circle_text span',
            ]
        );

        // Circle Line Style
        $this->add_control(
            'style3_circle_line_heading',
            [
                'label'     => esc_html__('Circle Line', 'axero-toolkit'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'style3_circle_line_color',
            [
                'label'     => esc_html__('Background Color', 'axero-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awesome_about_us_content .circle_text::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Button Style
        $this->add_control(
            'style3_button_heading',
            [
                'label'     => esc_html__('Button', 'axero-toolkit'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->start_controls_tabs('style3_button_tabs');

        // Normal Tab
        $this->start_controls_tab(
            'style3_button_normal_tab',
            [
                'label' => esc_html__('Normal', 'axero-toolkit'),
            ]
        );

        $this->add_control(
            'style3_button_text_color',
            [
                'label'     => esc_html__('Text Color', 'axero-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awesome_about_us_content .btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'style3_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'axero-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awesome_about_us_content .btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'style3_button_border_color',
            [
                'label'     => esc_html__('Border Color', 'axero-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awesome_about_us_content .btn' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'style3_button_typography',
                'selector' => '{{WRAPPER}} .awesome_about_us_content .btn',
            ]
        );

            $this->add_control(
            'style3_button_icon_size',
            [
                'label'     => esc_html__('Icon Size', 'axero-toolkit'),
                'type'      => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em'],
                'default' => [
                    'unit' => 'px',
                    'size' => 26,
                ],
                'selectors' => [
                    '{{WRAPPER}} .btn span i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .btn span svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
 
          $this->add_control(
            'style3_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'axero-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn.black_btn i, {{WRAPPER}} .btn.black_btn:focus i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .btn.black_btn svg, {{WRAPPER}} .btn.black_btn:focus svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'style3_button_padding',
            [
                'label' => esc_html__('Padding', 'axero-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}}   .btn span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();


        // Hover Tab
        $this->start_controls_tab(
            'style3_button_hover_tab',
            [
                'label' => esc_html__('Hover', 'axero-toolkit'),
            ]
         );

            $this->add_control(
            'style3_button_hover_color',
            [
                'label'     => esc_html__('Text Color', 'axero-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}   .btn.black_btn:hover, {{WRAPPER}}   .btn.black_btn:focus, {{WRAPPER}}   .btn.black_btn:active' => 'color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_control(
            'style3_button_hover_bg_color',
            [
                'label'     => esc_html__('Background Color', 'axero-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}   .btn.black_btn:hover, {{WRAPPER}}   .btn.black_btn:focus, {{WRAPPER}}   .btn.black_btn:active' => 'background-color: {{VALUE}} !important;',
                ],
            ]
        );
        $this->add_control(
            'style3_button_hover_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'axero-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn.black_btn:hover i, {{WRAPPER}} .btn.black_btn:focus i, {{WRAPPER}} .btn.black_btn:active i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .btn.black_btn:hover svg, {{WRAPPER}} .btn.black_btn:focus svg, {{WRAPPER}} .btn.black_btn:active svg' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        }

        protected function render()
        { $settings = $this->get_settings_for_display(); ?>
 
                 <div class="awesome_about_us_area ptb_150">
                    <div class="container-fluid max_w_1905px">
                        <div class="awesome_about_us_title text_animation">
                            <?php if (!empty($settings['style3_main_heading'])) : ?>
                                <h2 class="mb-0">
                                    <?php echo wp_kses_post($settings['style3_main_heading']); ?>
                                </h2>
                            <?php endif; ?>
                        </div>
                        <div class="awesome_about_us_content position-relative mx-auto" data-cues="slideInUp" data-group="awesome_about_us_content">
                            <?php if ( ! empty( $settings['style3_description'] ) ) : ?>
                                <p class="fw-medium">
                                    <?php echo wp_kses_post( $settings['style3_description'] ); ?>
                                </p>
                            <?php endif; ?>
                            <?php if ( ! empty( $settings['style3_button_text'] ) && ! empty( $settings['style3_button_link']['url'] ) ) : 
                                $target = ! empty( $settings['style3_button_link']['is_external'] ) ? ' target="_blank"' : '';
                                $nofollow = ! empty( $settings['style3_button_link']['nofollow'] ) ? ' rel="nofollow"' : '';
                                ?>
                                <a href="<?php echo esc_url( $settings['style3_button_link']['url'] ); ?>" class="btn black_btn"<?php echo $target . $nofollow; ?>>
                                    <span class="d-inline-block position-relative">
                                        <?php echo esc_html( $settings['style3_button_text'] ); ?>  
                                        <?php \Elementor\Icons_Manager::render_icon( $settings['style3_button_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                    </span>
                                </a>
                            <?php endif; ?>
                            <div class="circle_text text-center">
                                <?php if ( ! empty( $settings['style3_circle_image']['url'] ) ) : ?>
                                     <img src="<?php echo esc_url( $settings['style3_circle_image']['url'] ); ?>" alt="<?php echo esc_attr__('circle_text', 'axero-toolkit'); ?>">
                                <?php endif; ?>
                                <?php if ( ! empty( $settings['style3_circle_text'] ) ) : ?>
                                    <span class="d-block text-uppercase mx-auto">
                                        <?php echo esc_html( $settings['style3_circle_text'] ); ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="awesome_about_us_image mx-auto position-relative" data-cues="slideInUp" data-group="awesome_about_us_image">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6">
                                    <div class="image">
                                        <?php if ( ! empty( $settings['style3_image1']['url'] ) ) : ?>
                                             <img src="<?php echo esc_url($settings['style3_image1']['url']); ?>" alt="<?php echo esc_attr__('about4', 'axero-toolkit'); ?>">
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <div class="image">
                                        <?php if ( ! empty( $settings['style3_image2']['url'] ) ) : ?>
                                             <img src="<?php echo esc_url($settings['style3_image2']['url']); ?>" alt="<?php echo esc_attr__('about5', 'axero-toolkit'); ?>">
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>

            <?php
                }
                    }
 

$widgets_manager->register(new axero_awesome_about());
