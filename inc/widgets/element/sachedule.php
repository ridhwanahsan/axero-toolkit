<?php
    namespace lunex_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class lunex_sachedule extends Widget_Base
    {

        public function get_name()
        {
            return 'lunex_sachedule';
        }

        public function get_title()
        {
            return __('Sachedule', 'lunex-toolkit');
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
              'style1_controls',
              [
                'label' => esc_html__('Style 1 Controls', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                  'style_selection' => 'style1',
                ],
              ]
            );

            $this->add_control(
              'table_heading_date',
              [
                'label' => esc_html__('Date Heading', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__('Date', 'lunex-toolkit'),
              ]
            );

            $this->add_control(
              'table_heading_slot1',
              [
                'label' => esc_html__('Time Slot 1 Heading', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__('Time slot 1', 'lunex-toolkit'),
              ]
            );

            $this->add_control(
              'table_heading_slot2',
              [
                'label' => esc_html__('Time Slot 2 Heading', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__('Time slot 2', 'lunex-toolkit'),
              ]
            );

            $this->add_control(
              'table_heading_slot3',
              [
                'label' => esc_html__('Time Slot 3 Heading', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__('Time slot 3', 'lunex-toolkit'),
              ]
            );

            $this->add_control(
              'schedule_table',
              [
                'label' => esc_html__('Schedule Table', 'lunex-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => [
                  [
                    'name' => 'day',
                    'label' => esc_html__('Day', 'lunex-toolkit'),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => true,
                    'default' => esc_html__('Monday', 'lunex-toolkit'),
                  ],
                  [
                    'name' => 'slot1',
                    'label' => esc_html__('Time Slot 1', 'lunex-toolkit'),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => true,
                    'default' => esc_html__('10:00 AM - 11:00 AM', 'lunex-toolkit'),
                  ],
                  [
                    'name' => 'slot2',
                    'label' => esc_html__('Time Slot 2', 'lunex-toolkit'),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => true,
                    'default' => esc_html__('2:00 PM - 3:00 PM', 'lunex-toolkit'),
                  ],
                  [
                    'name' => 'slot3',
                    'label' => esc_html__('Time Slot 3', 'lunex-toolkit'),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => true,
                    'default' => esc_html__('4:00 PM - 5:00 PM', 'lunex-toolkit'),
                  ],
                ],
                'default' => [
                  [
                    'day' => esc_html__('Monday', 'lunex-toolkit'),
                    'slot1' => esc_html__('10:00 AM - 11:00 AM', 'lunex-toolkit'),
                    'slot2' => esc_html__('2:00 PM - 3:00 PM', 'lunex-toolkit'),
                    'slot3' => esc_html__('4:00 PM - 5:00 PM', 'lunex-toolkit'),
                  ],
                  [
                    'day' => esc_html__('Tuesday', 'lunex-toolkit'),
                    'slot1' => esc_html__('9:00 AM - 10:00 AM', 'lunex-toolkit'),
                    'slot2' => esc_html__('12:00 PM - 1:00 PM', 'lunex-toolkit'),
                    'slot3' => esc_html__('3:00 PM - 4:00 PM', 'lunex-toolkit'),
                  ],
                  [
                    'day' => esc_html__('Wednesday', 'lunex-toolkit'),
                    'slot1' => esc_html__('11:00 AM - 12:00 PM', 'lunex-toolkit'),
                    'slot2' => esc_html__('1:00 PM - 2:00 PM', 'lunex-toolkit'),
                    'slot3' => esc_html__('5:00 PM - 6:00 PM', 'lunex-toolkit'),
                  ],
                  [
                    'day' => esc_html__('Thursday', 'lunex-toolkit'),
                    'slot1' => esc_html__('10:00 AM - 11:00 AM', 'lunex-toolkit'),
                    'slot2' => esc_html__('2:00 PM - 3:00 PM', 'lunex-toolkit'),
                    'slot3' => esc_html__('4:00 PM - 5:00 PM', 'lunex-toolkit'),
                  ],
                  [
                    'day' => esc_html__('Friday', 'lunex-toolkit'),
                    'slot1' => esc_html__('9:00 AM - 10:00 AM', 'lunex-toolkit'),
                    'slot2' => esc_html__('12:00 PM - 1:00 PM', 'lunex-toolkit'),
                    'slot3' => esc_html__('3:00 PM - 4:00 PM', 'lunex-toolkit'),
                  ],
                  [
                    'day' => esc_html__('Saturday - Sunday', 'lunex-toolkit'),
                    'slot1' => esc_html__('Day off', 'lunex-toolkit'),
                    'slot2' => esc_html__('Day off', 'lunex-toolkit'),
                    'slot3' => esc_html__('Day off', 'lunex-toolkit'),
                  ],
                ],
                'title_field' => '{{{ day }}}',
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
        // Table Style
        $this->start_controls_section(
            'table_style',
            [
                'label' => esc_html__('Table Style', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // Table Header Style
        $this->add_control(
            'table_header_style',
            [
                'label' => esc_html__('Table Header', 'lunex-toolkit'),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'table_header_text_color',
            [
                'label' => esc_html__('Text Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-features-table table thead th' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'table_header_background_color',
            [
                'label' => esc_html__('Background Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-features-table table thead th' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'table_header_typography',
                'selector' => '{{WRAPPER}} .pricing-features-table table thead th',
            ]
        );

        // Table Row Style
        $this->add_control(
            'table_row_style',
            [
                'label' => esc_html__('Table Rows', 'lunex-toolkit'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        // Odd Row Style
        $this->add_control(
            'odd_row_style',
            [
                'label' => esc_html__('Odd Rows', 'lunex-toolkit'),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'odd_row_text_color',
            [
                'label' => esc_html__('Text Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-features-table table tbody tr:nth-child(odd) td' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .pricing-features-table table tbody tr:nth-child(odd) th' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'odd_row_background_color',
            [
                'label' => esc_html__('Background Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-features-table table tbody tr:nth-child(odd)' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'odd_row_typography',
                'selector' => '{{WRAPPER}} .pricing-features-table table tbody tr:nth-child(odd) td, {{WRAPPER}} .pricing-features-table table tbody tr:nth-child(odd) th',
            ]
        );

        // Even Row Style
        $this->add_control(
            'even_row_style',
            [
                'label' => esc_html__('Even Rows', 'lunex-toolkit'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'even_row_text_color',
            [
                'label' => esc_html__('Text Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-features-table table tbody tr:nth-child(even) td' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .pricing-features-table table tbody tr:nth-child(even) th' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'even_row_background_color',
            [
                'label' => esc_html__('Background Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-features-table table tbody tr:nth-child(even)' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'even_row_typography',
                'selector' => '{{WRAPPER}} .pricing-features-table table tbody tr:nth-child(even) td, {{WRAPPER}} .pricing-features-table table tbody tr:nth-child(even) th',
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
            <div class="book-call-area">
              <div class="container">
                <div class="pricing-features-table table-responsive">
                  <table class="table mb-0">
                    <thead>
                      <tr>
                        <th scope="col">
                          <?php echo esc_html($settings['table_heading_date']); ?>
                        </th>
                        <th scope="col">
                          <?php echo esc_html($settings['table_heading_slot1']); ?>
                        </th>
                        <th scope="col">
                          <?php echo esc_html($settings['table_heading_slot2']); ?>
                        </th>
                        <th scope="col">
                          <?php echo esc_html($settings['table_heading_slot3']); ?>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($settings['schedule_table'])) : ?>
                        <?php foreach ($settings['schedule_table'] as $row) : ?>
                          <tr>
                            <th scope="row">
                              <?php echo esc_html($row['day']); ?>
                            </th>
                            <td>
                              <?php echo esc_html($row['slot1']); ?>
                            </td>
                            <td>
                              <?php echo esc_html($row['slot2']); ?>
                            </td>
                            <td>
                              <?php echo esc_html($row['slot3']); ?>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </tbody>
                  </table>
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

    $widgets_manager->register(new lunex_sachedule());