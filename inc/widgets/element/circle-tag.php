<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_circle_tag extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_circle_tag';
        }

        public function get_title()
        {
            return __('Circle Tag ', 'axero-toolkit');
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
                        'style4' => esc_html__('Style 4', 'axero-toolkit'),
                    ],
                ]
            );

            $this->end_controls_section();
            // Content Tab
            $this->start_controls_section(
                'content_section',
                [
                    'label'     => esc_html__('Content', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            $this->add_control(
                'link_url',
                [
                    'label'       => esc_html__('Link URL', 'axero-toolkit'),
                    'type'        => Controls_Manager::URL,
                    'placeholder' => esc_html__('https://your-link.com', 'axero-toolkit'),
                    'default'     => [
                        'url' => '#',
                    ],
                ]
            );

            $this->add_control(
                'button_text',
                [
                    'label'       => esc_html__('Button Text', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__("Let's Chat", 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'icon_image',
                [
                    'label'   => esc_html__('Icon Image', 'axero-toolkit'),
                    'type'    => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => get_template_directory_uri() . '/assets/images/icons/right-top-arrow.svg',
                    ],
                ]
            );

            $this->add_control(
                'hover_icon_image',
                [
                    'label'   => esc_html__('Hover Icon Image', 'axero-toolkit'),
                    'type'    => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => get_template_directory_uri() . '/assets/images/icons/white-right-top-arrow.svg',
                    ],
                ]
            );

            $this->end_controls_section();

            // Content Tab Controls for Style 2
            $this->start_controls_section(
                'content_section_style2',
                [
                    'label'     => esc_html__('Content (Style 2)', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'style_selection' => 'style2',
                    ],
                ]
            );

            $this->add_control(
                'style2_text_one',
                [
                    'label'       => esc_html__('Text One', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Lets Chat', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );
            // Add a link control for Style 2
            $this->add_control(
                'style2_link',
                [
                    'label'         => esc_html__('Button Link', 'axero-toolkit'),
                    'type'          => Controls_Manager::URL,
                    'placeholder'   => esc_url('https://your-link.com'),
                    'default'       => [
                        'url'         => '',
                        'is_external' => false,
                        'nofollow'    => false,
                    ],
                    'show_external' => true,
                    'label_block'   => true,
                ]
            );

            $this->end_controls_section();

            $this->start_controls_section(
                'content_section_style3',
                [
                    'label'     => esc_html__('Content (Style 3)', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'style_selection' => 'style3',
                    ],
                ]
            );

            $this->add_control(
                'style3_text',
                [
                    'label'       => esc_html__('Text', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Your Text Here', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'style3_image',
                [
                    'label'   => esc_html__('Image', 'axero-toolkit'),
                    'type'    => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => get_template_directory_uri() . '/assets/images/icons/default-image.png',
                    ],
                ]
            );

            $this->add_control(
                'line_off',
                [
                    'label'        => esc_html__('Line Off', 'axero-toolkit'),
                    'type'         => Controls_Manager::SWITCHER,
                    'label_on'     => esc_html__('Yes', 'axero-toolkit'),
                    'label_off'    => esc_html__('No', 'axero-toolkit'),
                    'return_value' => 'yes',
                    'default'      => 'no',
                ]
            );

            $this->end_controls_section();

            $this->start_controls_section(
                'content_section_style4',
                [
                    'label'     => esc_html__('Content (Style 4)', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'style_selection' => 'style4',
                    ],
                ]
            );

            $this->add_control(
                'style4_circle_image',
                [
                    'label'       => esc_html__('Circle Image', 'axero-toolkit'),
                    'type'        => Controls_Manager::MEDIA,
                    'default'     => [
                        'url' => get_template_directory_uri() . '/assets/images/icons/circle-text.svg',
                    ],
                    'description' => esc_html__('Upload or select a circular text image', 'axero-toolkit'),
                ]
            );

            $this->add_control(
                'style4_arrow_image',
                [
                    'label'   => esc_html__('Arrow Image', 'axero-toolkit'),
                    'type'    => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => get_template_directory_uri() . '/assets/images/icons/default-arrow.png',
                    ],
                ]
            );

            $this->add_control(
                'style4_link',
                [
                    'label'         => esc_html__('Link', 'axero-toolkit'),
                    'type'          => Controls_Manager::URL,
                    'placeholder'   => esc_html__('https://your-link.com', 'axero-toolkit'),
                    'show_external' => true,
                    'default'       => [
                        'url'         => '',
                        'is_external' => true,
                        'nofollow'    => true,
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
                'style_section',
                [
                    'label'     => esc_html__('Style', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            $this->add_control(
                'background_color',
                [
                    'label'     => esc_html__('Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .link-btn' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'hover_background_color',
                [
                    'label'     => esc_html__('Hover Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .link-btn:hover' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'text_color',
                [
                    'label'     => esc_html__('Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .menu_link-text' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'hover_text_color',
                [
                    'label'     => esc_html__('Hover Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .link-btn:hover .menu_link-text' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'text_typography',
                    'selector' => '{{WRAPPER}} .menu_link-text',
                ]
            );

            $this->end_controls_section();

            // Add controls for Style 2 tab: text color, hover color, and typography

            $this->start_controls_section(
                'style2_text_style_section',
                [
                    'label'     => esc_html__('Style 2 Text', 'axero-toolkit'),
                    'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style2',
                    ],
                ]
            );

            $this->add_control(
                'style2_text_color',
                [
                    'label'     => esc_html__('Text Color', 'axero-toolkit'),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .marketing-agency-footer-area .menu_link-text' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style2_hover_text_color',
                [
                    'label'     => esc_html__('Hover Text Color', 'axero-toolkit'),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .marketing-agency-footer-area .link-btn:hover .menu_link-text' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style2_text_typography',
                    'selector' => '{{WRAPPER}} .marketing-agency-footer-area .menu_link-text',
                ]
            );

            $this->end_controls_section();

            $this->start_controls_section(
                'style2_bg_style_section',
                [
                    'label'     => esc_html__('Style 2 bg', 'axero-toolkit'),
                    'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style2',
                    ],
                ]
            );

            $this->add_control(
                'style2_link_btn_border_color',
                [
                    'label'     => esc_html__('Button Border Color', 'axero-toolkit'),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'default'   => '#000000',
                    'selectors' => [
                        '{{WRAPPER}} .marketing-agency-footer-area .footer-top .link-btn' => 'border: 1px solid {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style2_link_btn_hover_border_color',
                [
                    'label'     => esc_html__('Button Hover Border Color', 'axero-toolkit'),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'default'   => '#D387F6', // Example primary color, adjust as needed
                    'selectors' => [
                        '{{WRAPPER}} .marketing-agency-footer-area .footer-top .link-btn:hover' => 'border-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style2_link_btn_hover_bg_color',
                [
                    'label'     => esc_html__('Button Hover Background Color', 'axero-toolkit'),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'default'   => '#D387F6', // Example primary color, adjust as needed
                    'selectors' => [
                        '{{WRAPPER}} .marketing-agency-footer-area .footer-top .link-btn:hover' => 'background-color: {{VALUE}};',
                    ],
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'style2_control_style_section',
                [
                    'label'     => esc_html__('Circle controls', 'axero-toolkit'),
                    'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style2',
                    ],
                ]
            );

            $this->add_responsive_control(
                'style2_link_btn_width',
                [
                    'label'      => esc_html__('Button Width', 'axero-toolkit'),
                    'type'       => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => ['px', '%', 'em'],
                    'range'      => [
                        'px' => [
                            'min' => 50,
                            'max' => 400,
                        ],
                        '%'  => [
                            'min' => 10,
                            'max' => 100,
                        ],
                        'em' => [
                            'min' => 1,
                            'max' => 20,
                        ],
                    ],
                    'default'    => [
                        'unit' => 'px',
                        'size' => 202,
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} .marketing-agency-footer-area .footer-top .link-btn' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'style2_link_btn_height',
                [
                    'label'      => esc_html__('Button Height', 'axero-toolkit'),
                    'type'       => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => ['px', '%', 'em'],
                    'range'      => [
                        'px' => [
                            'min' => 50,
                            'max' => 400,
                        ],
                        '%'  => [
                            'min' => 10,
                            'max' => 100,
                        ],
                        'em' => [
                            'min' => 1,
                            'max' => 20,
                        ],
                    ],
                    'default'    => [
                        'unit' => 'px',
                        'size' => 202,
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} .marketing-agency-footer-area .footer-top .link-btn' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'style2_link_btn_margin_top',
                [
                    'label'      => esc_html__('Button Margin Top', 'axero-toolkit'),
                    'type'       => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => ['px', 'em', '%'],
                    'range'      => [
                        'px' => [
                            'min' => 0,
                            'max' => 200,
                        ],
                        'em' => [
                            'min' => 0,
                            'max' => 20,
                        ],
                        '%'  => [
                            'min' => 0,
                            'max' => 50,
                        ],
                    ],
                    'default'    => [
                        'unit' => 'px',
                        'size' => 56,
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} .marketing-agency-footer-area .footer-top .link-btn' => 'margin-top: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'style2_link_btn_line_height',
                [
                    'label'      => esc_html__('Button Line Height', 'axero-toolkit'),
                    'type'       => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => ['px', 'em'],
                    'range'      => [
                        'px' => [
                            'min' => 20,
                            'max' => 400,
                        ],
                        'em' => [
                            'min' => 1,
                            'max' => 20,
                        ],
                    ],
                    'default'    => [
                        'unit' => 'px',
                        'size' => 208,
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} .marketing-agency-footer-area .footer-top .link-btn' => 'line-height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'style_section_style4',
                [
                    'label'     => esc_html__('Style 4', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style4',
                    ],
                ]
            );

            $this->add_control(
                'style4_btn_bg_color',
                [
                    'label'     => esc_html__('Button Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .digital-agency-footer-area .footer-left-side .link-btn' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style4_btn_inner_bg_color',
                [
                    'label'     => esc_html__('Button Inner Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .digital-agency-footer-area .footer-left-side .link-btn::before' => 'background-color: {{VALUE}};',
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
              <div class="why-choose-us-middle-side">
                 <a href="<?php echo esc_url($settings['link_url']['url']); ?>" class="link-btn menu_link d-inline-block text-center position-relative rounded-circle">
                        <?php if (! empty($settings['icon_image']['url'])): ?>
                                <img src="<?php echo esc_url($settings['icon_image']['url']); ?>" alt="right-top-arrow">
                            <?php endif; ?>


                            <?php if (! empty($settings['hover_icon_image']['url'])): ?>
                                <img src="<?php echo esc_url($settings['hover_icon_image']['url']); ?>" alt="white-right-top-arrow">
                                <?php endif; ?>



                            <span class="menu_link-text">
                                    <?php echo esc_html($settings['button_text']); ?>
                                </span>
                        </a>
                       </div>

        <?php
            } elseif ($settings['style_selection'] === 'style2') {
                    ?>
            <!-- style 2 -->
<footer class="marketing-agency-footer-area">
    <div class="footer-top">
        <div class="text-lg-end" data-cue="slideInUp">
                <?php
                    // Ensure the button text is set and not empty
                                if (! empty($settings['style2_text_one'])):
                                    // Use a dynamic link if provided, otherwise fallback to home URL
                                    $button_url = ! empty($settings['style2_link']['url']) ? esc_url($settings['style2_link']['url']) : esc_url(home_url('/'));
                                ?>
			                    <a href="<?php echo $button_url; ?>" class="link-btn menu_link d-inline-block text-center rounded-circle">
			                        <span class="menu_link-text">
			                            <?php echo esc_html($settings['style2_text_one']); ?>
			                        </span>
			                    </a>
			                <?php endif; ?>
            </div>
    </div>
</footer>

        <?php
            } elseif ($settings['style_selection'] === 'style3') {
                    ?>
            <!-- style 3 -->
                <div class="awesome_about_us_content position-relative mx-auto" data-cues="slideInUp" data-group="awesome_about_us_content">
                    <div class="circle_text text-center">
                        <?php if (! empty($settings['style3_image']['url'])): ?>
                            <img src="<?php echo esc_url($settings['style3_image']['url']); ?>" alt="<?php esc_attr_e('Circle Text', 'axero-toolkit'); ?>">
                        <?php endif; ?>
                        <span class="d-block text-uppercase mx-auto">
                            <?php echo esc_html($settings['style3_text']); ?>
                        </span>
                    </div>
                </div>


    <?php } elseif ($settings['style_selection'] === 'style4') {
                ?>
            <!-- style 4 -->
               <footer class="digital-agency-footer-area">
                  <div class="footer-left-side">
                            <div class="d-mdj-flex align-items-center">
                                <a href="<?php echo ! empty($settings['style4_link']['url']) ? esc_url($settings['style4_link']['url']) : '#'; ?>" class="link-btn d-inline-block rounded-circle text-center" data-cue="slideInUp"<?php echo ! empty($settings['style4_link']['is_external']) ? 'target="_blank"' : ''; ?><?php echo ! empty($settings['style4_link']['nofollow']) ? 'rel="nofollow"' : ''; ?>>
                                    <img src="<?php echo esc_url($settings['style4_circle_image']['url']); ?>" alt="<?php esc_attr_e('Circle Text', 'axero-toolkit'); ?>">

                                    <img src="<?php echo esc_url($settings['style4_arrow_image']['url']); ?>" alt="<?php esc_attr_e('Right Top Arrow', 'axero-toolkit'); ?>">
                                </a>
                            </div>
                            </div>
                         </footer>

             <?php
                 }
                     }
                 }

             $widgets_manager->register(new axero_circle_tag());
