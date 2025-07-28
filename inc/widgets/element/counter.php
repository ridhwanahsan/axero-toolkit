<?php
    namespace lunex_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class lunex_counter extends Widget_Base
    {

        public function get_name()
        {
            return 'lunex_counter';
        }

        public function get_title()
        {
            return __('Awesome Funfacts', 'lunex-toolkit');
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
            
            // Start a new controls section for style3 repeater controls
            $this->start_controls_section(
                'section_style3_items',
                [
                    'label' => esc_html__('Content Counter Content', 'axero-toolkit'),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                    
                ]
            );

            $this->add_control(
                'style3_title',
                [
                    'label' => esc_html__('Title', 'axero-toolkit'),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__('Strategic Steps to Impactful Results', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            // Add repeater controls for style3 with prefix 'style3_'
            $repeater2 = new \Elementor\Repeater();

            $repeater2->add_control(
                'style3_number',
                [
                    'label'   => esc_html__('Number', 'axero-toolkit'),
                    'type'    => \Elementor\Controls_Manager::TEXT,
                    'default' => '15',
                ]
            );

            $repeater2->add_control(
                'style3_suffix',
                [
                    'label'   => esc_html__('Suffix', 'axero-toolkit'),
                    'type'    => \Elementor\Controls_Manager::TEXT,
                    'default' => '',
                ]
            );

            $repeater2->add_control(
                'style3_title',
                [
                    'label'   => esc_html__('Title', 'axero-toolkit'),
                    'type'    => \Elementor\Controls_Manager::TEXT,
                    'default' => 'Year Experience',
                ]
            );

            $repeater2->add_control(
                'style3_content',
                [
                    'label'   => esc_html__('Content', 'axero-toolkit'),
                    'type'    => \Elementor\Controls_Manager::TEXTAREA,
                    'default' => 'Gain access to a network of trusted recruitment agencies specializing in tech talent acquisition. Collaborate to find the perfect match for your team for a fixed price.',
                ]
            );

            $this->add_control(
                'style3_items',
                [
                    'label'       => esc_html__('style3 Items', 'axero-toolkit'),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater2->get_controls(),
                    'default'     => [
                        [
                            'style3_number' => '15',
                            'style3_suffix' => '',
                            'style3_title'  => 'Year Experience',
                            'style3_content' => 'Gain access to a network of trusted recruitment agencies specializing in tech talent acquisition. Collaborate to find the perfect match for your team for a fixed price.',
                        ],
                        [
                            'style3_number' => '25',
                            'style3_suffix' => 'K',
                            'style3_title'  => '+ Happy Customer',
                            'style3_content' => 'Gain access to a network of trusted recruitment agencies specializing in tech talent acquisition. Collaborate to find the perfect match for your team for a fixed price.',
                        ],
                        [
                            'style3_number' => '8',
                            'style3_suffix' => 'K',
                            'style3_title'  => 'Project Completed',
                            'style3_content' => 'Gain access to a network of trusted recruitment agencies specializing in tech talent acquisition. Collaborate to find the perfect match for your team for a fixed price.',
                        ],
                        [
                            'style3_number' => '98',
                            'style3_suffix' => '',
                            'style3_title'  => 'Team Member',
                            'style3_content' => 'Gain access to a network of trusted recruitment agencies specializing in tech talent acquisition. Collaborate to find the perfect match for your team for a fixed price.',
                        ],
                    ],
                    'title_field' => '{{{ style3_title }}}',
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
      
          // style3 Tab Style Controls Section
        $this->start_controls_section(
            'style3_style',
            [
                'label' => esc_html__('Content Styling', 'axero-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                 
            ]
        );

        // Add heading before section title controls
        $this->add_control(
            'style3_section_title_heading',
            [
                'label' => esc_html__('Section Title', 'axero-toolkit'),
                'type'  => Controls_Manager::HEADING,
            ]
        );

        // style3 Section Title Color
        $this->add_control(
            'style3_section_title_color',
            [
                'label' => esc_html__('Section Title Color', 'axero-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section_title.style_five h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        // style3 Section Title Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style3_section_title_typography',
                'selector' => '{{WRAPPER}} .section_title.style_five h2',
            ]
        );

        // style3 Border Line Color
        $this->add_control(
            'style3_border_line_color',
            [
                'label' => esc_html__('Border Line Color', 'axero-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .border_bottom_style' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_control(
            'style3_counter_item_heading',
            [
                'label' => esc_html__('Counter Item', 'axero-toolkit'),
                'type'  => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        // style3 Dot Background Color
        $this->add_control(
            'style3_dot_bg_color',
            [
                'label' => esc_html__('Dot Background Color', 'axero-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awesome_funfacts_inner .awesome_funfacts_list .item_box .number::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // style3 Number Symbol Color & Typography
        $this->add_control(
            'style3_number_color',
            [
                'label' => esc_html__('Number Color', 'axero-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awesome_funfacts_inner .awesome_funfacts_list .item_box .number h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style3_number_typography',
                'selector' => '{{WRAPPER}} .awesome_funfacts_inner .awesome_funfacts_list .item_box .number h3',
            ]
        );

        // style3 Sub Title Color & Typography
        $this->add_control(
            'style3_subtitle_color',
            [
                'label' => esc_html__('Sub Title Color', 'axero-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awesome_funfacts_inner .awesome_funfacts_list .item_box .number .sub_title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style3_subtitle_typography',
                'selector' => '{{WRAPPER}} .awesome_funfacts_inner .awesome_funfacts_list .item_box .number .sub_title',
            ]
        );

        // style3 Description Color & Typography
        $this->add_control(
            'style3_description_color',
            [
                'label' => esc_html__('Description Color', 'axero-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awesome_funfacts_inner .awesome_funfacts_list .item_box .content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style3_description_typography',
                'selector' => '{{WRAPPER}} .awesome_funfacts_inner .awesome_funfacts_list .item_box .content p',
            ]
        );

        // style3 Background Controls
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'style3_background',
                'label' => esc_html__('Background', 'axero-toolkit'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .awesome_funfacts_inner',
            ]
        );

        // style3 Border Controls
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'style3_border',
                'selector' => '{{WRAPPER}} .awesome_funfacts_inner',
            ]
        );

        // style3 Padding Controls
        $this->add_responsive_control(
            'style3_padding',
            [
                'label' => esc_html__('Padding', 'axero-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .awesome_funfacts_inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // style3 Margin Controls
        $this->add_responsive_control(
            'style3_margin',
            [
                'label' => esc_html__('Margin', 'axero-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .awesome_funfacts_inner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
 

        }

        protected function render()
        {
            $settings = $this->get_settings_for_display(); ?>
            <div class="awesome_funfacts_area">
                  <div class="container-fluid max_w_1905px">
                      <div class="awesome_funfacts_inner">
                        <?php if (!empty($settings['style3_title'])) : ?>
                            <div class="section_title style_five">
                                <h2 class="mb-0 text_animation">
                                    <?php echo wp_kses_post($settings['style3_title']); ?>
                                </h2>
                            </div>
                            <div class="border_bottom_style"></div>
                        <?php endif; ?>
                          <div class="awesome_funfacts_list">
                              <?php if (!empty($settings['style3_items']) && is_array($settings['style3_items'])): ?>
                                  <?php foreach ($settings['style3_items'] as $item): ?>
                                      <div class="item_box">
                                          <div class="row align-items-center">
                                              <div class="col-xxl-8 col-lg-6">
                                                  <div class="number position-relative">
                                                      <div class="d-flex align-items-center">
                                                          <h3 class="mb-0 lh-1">
                                                              <span class="counter_number">
                                                                  <?php echo esc_html($item['style3_number']); ?>
                                                              </span>
                                                              <?php if (!empty($item['style3_suffix'])): ?>
                                                                  <?php echo esc_html($item['style3_suffix']); ?>
                                                              <?php endif; ?>
                                                          </h3>
                                                          <span class="sub_title d-block text-uppercase fw-medium">
                                                              <?php echo esc_html($item['style3_title']); ?>
                                                          </span>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-xxl-4 col-lg-6">
                                                  <div class="content text_animation">
                                                      <p>
                                                          <?php echo esc_html($item['style3_content']); ?>
                                                      </p>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  <?php endforeach; ?>
                              <?php endif; ?>
                          </div>
                      </div>
                 </div>
            </div>
            
             

            <?php
                }
                    }
              

    $widgets_manager->register(new lunex_counter());