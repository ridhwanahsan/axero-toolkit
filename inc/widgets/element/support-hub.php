<?php
    namespace lunex_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class lunex_support_hub extends Widget_Base
    {

        public function get_name()
        {
            return 'lunex_support_hub';
        }

        public function get_title()
        {
            return __('Support Hub', 'lunex-toolkit');
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
                'condition' => [
                  'style_selection' => 'style1',
                ],
              ]
            );

            $this->add_control(
              'style1_icon',
              [
              'label'   => esc_html__('Icon', 'lunex-toolkit'),
              'type'    => Controls_Manager::ICONS,
              'default' => [
                'value'   => 'ri-message-2-line',
                'library' => 'remixicon',
              ],
              'options' => [
                'remixicon' => [
                'ri-map-pin-line'      => 'ri-map-pin-line',
                'ri-message-2-line'    => 'ri-message-2-line',
                'ri-question-line'     => 'ri-question-line',
                'ri-group-2-line'      => 'ri-group-2-line',
                ],
                'fa-solid' => [
                'fa fa-map-marker-alt' => 'fa fa-map-marker-alt',
                'fa fa-comments'       => 'fa fa-comments',
                'fa fa-question'       => 'fa fa-question',
                'fa fa-users'          => 'fa fa-users',
                ],
              ],
              'label_block' => true,
              ]
            );

            $this->add_control(
              'style1_title',
              [
                'label'       => esc_html__('Title', 'lunex-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__('Via Chat', 'lunex-toolkit'),
                'label_block' => true,
              ]
            );

            $this->add_control(
              'style1_description',
              [
                'label'       => esc_html__('Description', 'lunex-toolkit'),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => esc_html__('Instant solutions at your fingertips.', 'lunex-toolkit'),
                'label_block' => true,
              ]
            );

            $this->add_control(
              'style1_link',
              [
                'label'       => esc_html__('Button Link', 'lunex-toolkit'),
                'type'        => Controls_Manager::URL,
                'default'     => [
                  'url' => 'contact.html',
                ],
                'label_block' => true,
              ]
            );

            $this->add_control(
              'style1_button_text',
              [
                'label'       => esc_html__('Button Text', 'lunex-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__("Let's Chat", 'lunex-toolkit'),
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
              'style1_box_style_section',
              [
                'label' => esc_html__('Style 1 Box', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                  'style_selection' => 'style1',
                ],
              ]
            );

            $this->add_control(
              'style1_box_bg_color',
              [
                'label' => esc_html__('Background Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'default' => '#FFFAF3',
                'selectors' => [
                  '{{WRAPPER}} .reach_us_box' => 'background-color: {{VALUE}};',
                ],
              ]
            );

            $this->add_responsive_control(
              'style1_box_padding',
              [
                'label' => esc_html__('Padding', 'lunex-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'default' => [
                  'top' => 50,
                  'right' => 30,
                  'bottom' => 50,
                  'left' => 30,
                  'unit' => 'px',
                ],
                'selectors' => [
                  '{{WRAPPER}} .reach_us_box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
              ]
            );

            $this->add_control(
              'style1_box_radius',
              [
                'label' => esc_html__('Border Radius', 'lunex-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                  'px' => [
                    'min' => 0,
                    'max' => 50,
                  ],
                ],
                'default' => [
                  'size' => 6,
                  'unit' => 'px',
                ],
                'selectors' => [
                  '{{WRAPPER}} .reach_us_box' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
              ]
            );

            $this->end_controls_section();

            // Icon
            $this->start_controls_section(
              'style1_icon_style_section',
              [
                'label' => esc_html__('Style 1 Icon', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                  'style_selection' => 'style1',
                ],
              ]
            );

            $this->add_control(
              'style1_icon_color',
              [
                'label' => esc_html__('Icon Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                  '{{WRAPPER}} .reach_us_box .icon, {{WRAPPER}} .reach_us_box .icon i' => 'color: {{VALUE}};',
                ],
              ]
            );

            $this->add_control(
              'style1_icon_bg_color',
              [
                'label' => esc_html__('Icon Background', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'default' => 'var(--primaryColor)',
                'selectors' => [
                  '{{WRAPPER}} .reach_us_box .icon' => 'background-color: {{VALUE}};',
                ],
              ]
            );
            $this->add_control(
              'style1_icon_hover_bg_color',
              [
                'label' => esc_html__('Icon Hover Background', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                  '{{WRAPPER}} .reach_us_box:hover .icon' => 'background-color: {{VALUE}};',
                ],
              ]
            );

            $this->add_control(
              'style1_icon_hover_color',
              [
                'label' => esc_html__('Icon Hover Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                  '{{WRAPPER}} .reach_us_box:hover .icon, {{WRAPPER}} .reach_us_box:hover .icon i' => 'color: {{VALUE}};',
                ],
              ]
            );

            $this->add_responsive_control(
              'style1_icon_size',
              [
                'label' => esc_html__('Icon Size', 'lunex-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                  'px' => [
                    'min' => 10,
                    'max' => 100,
                  ],
                ],
                'default' => [
                  'size' => 30,
                  'unit' => 'px',
                ],
                'selectors' => [
                  '{{WRAPPER}} .reach_us_box .icon, {{WRAPPER}} .reach_us_box .icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
              ]
            );

            $this->add_responsive_control(
              'style1_icon_width',
              [
                'label' => esc_html__('Icon Width', 'lunex-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                  'px' => [
                    'min' => 30,
                    'max' => 200,
                  ],
                ],
                'default' => [
                  'size' => 92,
                  'unit' => 'px',
                ],
                'selectors' => [
                  '{{WRAPPER}} .reach_us_box .icon' => 'width: {{SIZE}}{{UNIT}};',
                ],
              ]
            );

            $this->add_responsive_control(
              'style1_icon_height',
              [
                'label' => esc_html__('Icon Height', 'lunex-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                  'px' => [
                    'min' => 30,
                    'max' => 200,
                  ],
                ],
                'default' => [
                  'size' => 70,
                  'unit' => 'px',
                ],
                'selectors' => [
                  '{{WRAPPER}} .reach_us_box .icon' => 'height: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}};',
                ],
              ]
            );

            $this->add_control(
              'style1_icon_radius',
              [
                'label' => esc_html__('Icon Border Radius', 'lunex-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                  'px' => [
                    'min' => 0,
                    'max' => 50,
                  ],
                ],
                'default' => [
                  'size' => 6,
                  'unit' => 'px',
                ],
                'selectors' => [
                  '{{WRAPPER}} .reach_us_box .icon' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
              ]
            );

            $this->end_controls_section();

            // Title
            $this->start_controls_section(
              'style1_title_style_section',
              [
                'label' => esc_html__('Style 1 Title', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                  'style_selection' => 'style1',
                ],
              ]
            );

            $this->add_control(
              'style1_title_color',
              [
                'label' => esc_html__('Title Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'default' => '#222',
                'selectors' => [
                  '{{WRAPPER}} .reach_us_box h3' => 'color: {{VALUE}};',
                ],
              ]
            );

            $this->add_group_control(
              \Elementor\Group_Control_Typography::get_type(),
              [
                'name' => 'style1_title_typography',
                'selector' => '{{WRAPPER}} .reach_us_box h3',
              ]
            );

            $this->end_controls_section();

            // Description
            $this->start_controls_section(
              'style1_desc_style_section',
              [
                'label' => esc_html__('Style 1 Description', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                  'style_selection' => 'style1',
                ],
              ]
            );

            $this->add_control(
              'style1_desc_color',
              [
                'label' => esc_html__('Description Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'default' => '#666',
                'selectors' => [
                  '{{WRAPPER}} .reach_us_box p' => 'color: {{VALUE}};',
                ],
              ]
            );

            $this->add_group_control(
              \Elementor\Group_Control_Typography::get_type(),
              [
                'name' => 'style1_desc_typography',
                'selector' => '{{WRAPPER}} .reach_us_box p',
              ]
            );

            $this->end_controls_section();

            // Button
            $this->start_controls_section(
              'style1_button_style_section',
              [
              'label' => esc_html__('Style 1 Button', 'lunex-toolkit'),
              'tab'   => Controls_Manager::TAB_STYLE,
              'condition' => [
                'style_selection' => 'style1',
              ],
              ]
            );

            $this->add_control(
              'style1_btn_color',
              [
              'label' => esc_html__('Button Text Color', 'lunex-toolkit'),
              'type' => Controls_Manager::COLOR,
              'default' => '#fff',
              'selectors' => [
                '{{WRAPPER}} .reach_us_box .details_link_btn' => 'color: {{VALUE}};',
              ],
              ]
            );

            $this->add_group_control(
              \Elementor\Group_Control_Typography::get_type(),
              [
              'name' => 'style1_btn_typography',
              'selector' => '{{WRAPPER}} .reach_us_box .details_link_btn',
              ]
            );

            $this->add_control(
              'style1_btn_hover_heading',
              [
              'label' => esc_html__('Button Hover', 'lunex-toolkit'),
              'type' => Controls_Manager::HEADING,
              'separator' => 'before',
              ]
            );

            $this->add_control(
              'style1_btn_hover_color',
              [
              'label' => esc_html__('Text Hover Color', 'lunex-toolkit'),
              'type' => Controls_Manager::COLOR,
              'selectors' => [
                '{{WRAPPER}} .reach_us_box .details_link_btn:hover' => 'color: {{VALUE}};',
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

            <div class="reach_us_area">
              <div class="reach_us_box text-center">
                <div class="icon d-flex align-items-center justify-content-center">
                  <?php
                  if (!empty($settings['style1_icon']['value'])) {
                    if (!empty($settings['style1_icon']['library']) && 'svg' === $settings['style1_icon']['library']) {
                      echo $settings['style1_icon']['value'];
                    } else {
                      ?>
                      <i class="<?php echo esc_attr($settings['style1_icon']['value']); ?>"></i>
                      <?php
                    }
                  }
                  ?>
                </div>
                <?php if (!empty($settings['style1_title'])) : ?>
                  <h3><?php echo esc_html($settings['style1_title']); ?></h3>
                <?php endif; ?>
                <?php if (!empty($settings['style1_description'])) : ?>
                  <p><?php echo esc_html($settings['style1_description']); ?></p>
                <?php endif; ?>
                <?php if (!empty($settings['style1_link']['url'])) : 
                  $target = $settings['style1_link']['is_external'] ? ' target="_blank"' : '';
                  $nofollow = $settings['style1_link']['nofollow'] ? ' rel="nofollow"' : '';
                ?>
                  <a href="<?php echo esc_url($settings['style1_link']['url']); ?>" class="details_link_btn d-inline-block position-relative fw-medium"<?php echo $target . $nofollow; ?>>
                    <?php echo esc_html($settings['style1_button_text']); ?> <i class="ri-arrow-right-long-line"></i>
                  </a>
                <?php endif; ?>
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

    $widgets_manager->register(new lunex_support_hub());