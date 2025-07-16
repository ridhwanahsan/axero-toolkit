<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_board_list extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_board_list';
        }

        public function get_title()
        {
            return __('Board List', 'axero-toolkit');
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

                    ],
                ]
            );

            $this->end_controls_section();
            // Content Tab 1
            $this->start_controls_section(
                'content_tab_1',
                [
                    'label'     => esc_html__('Content', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );
            $this->add_control(
                'heading_title',
                [
                    'label' => esc_html__('Heading Title', 'axero-toolkit'),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Qualifications', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control(
                'list_item',
                [
                    'label' => esc_html__('List Item', 'axero-toolkit'),
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => esc_html__('List item content', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'qualifications_list',
                [
                    'label' => esc_html__('Qualifications List', 'axero-toolkit'),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'list_item' => esc_html__('A bachelor\'s degree in design (or related field) or equivalent professional experience.', 'axero-toolkit'),
                        ],
                        [
                            'list_item' => esc_html__('Proficiency in a variety of design tools such as Figma, Photoshop, Illustrator, and Sketch.', 'axero-toolkit'),
                        ],
                    ],
                    'title_field' => '{{{ list_item }}}',
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
            
            // Style Tab 1
            $this->start_controls_section(
                'style_tab_1',
                [
                    'label'     => esc_html__('Style 1', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            $this->add_control(
                'heading_color',
                [
                    'label' => esc_html__('Heading Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .qualifications_details h3' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'heading_typography',
                    'selector' => '{{WRAPPER}} .qualifications_details h3',
                ]
            );

            $this->add_control(
                'list_item_color',
                [
                    'label' => esc_html__('List Item Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .qualifications_details li' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'list_item_typography',
                    'selector' => '{{WRAPPER}} .qualifications_details li',
                ]
            );

            $this->add_control(
                'list_item_spacing',
                [
                    'label' => esc_html__('List Item Spacing', 'axero-toolkit'),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 50,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .qualifications_details li:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
            <div class="team_details_area">
                <div class="container">
                    <div class="team_details_desc">
                        <div class="qualifications_details">
                            <?php if (!empty($settings['heading_title'])) : ?>
                                <h3 class="text_animation">
                                    <?php echo wp_kses_post($settings['heading_title']); ?>
                                </h3>
                            <?php endif; ?>
                            <ul class="list-unstyled mb-0 p-0">
                                <?php foreach ($settings['qualifications_list'] as $item) : ?>
                                    <li class="position-relative">
                                        <?php echo esc_html($item['list_item']); ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
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

    $widgets_manager->register(new axero_board_list());