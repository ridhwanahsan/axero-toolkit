<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_troggle_scroll extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_troggle_scroll';
        }

        public function get_title()
        {
            return __('Trogle Scroll', 'axero-toolkit');
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

                    ],
                ]
            );

            $this->end_controls_section();
            /**
             * Content Tab: Style 1 Controls
             * -----------------------------
             * Adds controls for Style 1 content tab in the Elementor widget.
             */
            $this->start_controls_section(
                'style1_content_section',
                [
                    'label'     => esc_html__('Style 1 Content', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            $this->add_control(
                'style1_label_text',
                [
                    'label'       => esc_html__('Label Text', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Scroll down', 'axero-toolkit'),
                    'placeholder' => esc_html__('Enter label text', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'style1_show_dot',
                [
                    'label'        => esc_html__('Show Dot', 'axero-toolkit'),
                    'type'         => Controls_Manager::SWITCHER,
                    'label_on'     => esc_html__('Show', 'axero-toolkit'),
                    'label_off'    => esc_html__('Hide', 'axero-toolkit'),
                    'return_value' => 'yes',
                    'default'      => 'yes',
                ]
            );

            $this->add_control(
                'style1_label_tag',
                [
                    'label'   => esc_html__('Label HTML Tag', 'axero-toolkit'),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'span',
                    'options' => [
                        'span' => esc_html__('Span', 'axero-toolkit'),
                        'div'  => esc_html__('Div', 'axero-toolkit'),
                        'p'    => esc_html__('Paragraph', 'axero-toolkit'),
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

            // Style Tab for Style 1: Color and Typography controls
            $this->start_controls_section(
                'style1_label_style_section',
                [
                    'label' => esc_html__('Label Style', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_STYLE,
                ]
            );

            // Label Color
            $this->add_control(
                'style1_label_color',
                [
                    'label'     => esc_html__('Label Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .scroll_down_text .d-block' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Label Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style1_label_typography',
                    'label'    => esc_html__('Label Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .scroll_down_text .d-block',
                ]
            );
            // Add control for Dot Border Color
            $this->add_control(
                'style1_dot_border_color',
                [
                    'label'     => esc_html__('Dot Border Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .scroll_down_text .dot' => 'border-color: {{VALUE}};',
                    ],
                ]
            );

            // Add control for Dot Inner Color
            $this->add_control(
                'style1_dot_inner_color',
                [
                    'label'     => esc_html__('Dot Inner Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .scroll_down_text .dot::before' => 'background: {{VALUE}};',
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


            <?php
                // Retrieve settings for label text, dot visibility, and label tag
                            $label_text = ! empty($settings['style1_label_text']) ? esc_html($settings['style1_label_text']) : esc_html__('Scroll down', 'axero-toolkit');
                            $show_dot   = isset($settings['style1_show_dot']) && $settings['style1_show_dot'] === 'yes';
                            $label_tag  = ! empty($settings['style1_label_tag']) ? esc_attr($settings['style1_label_tag']) : 'span';

                            // Output scroll down markup with dynamic options
                        ?>
            <div class="scroll_down_text">
                <?php if ($show_dot): ?>
                    <div class="dot"></div>
                <?php endif; ?>
                <<?php echo $label_tag; ?> class="d-block fw-medium text-uppercase">
                    <?php echo $label_text; ?>
                </<?php echo $label_tag; ?>>
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

    $widgets_manager->register(new axero_troggle_scroll());