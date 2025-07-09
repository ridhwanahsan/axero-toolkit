<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_news_form extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_news_form';
        }

        public function get_title()
        {
            return __('News Form', 'axero-toolkit');
        }

        public function get_icon()
        {
            return 'eicon-elementor';
        }

        public function get_categories()
        {
            return ['header_footer'];
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
                    ],
                ]
            );

            $this->end_controls_section();
            // Style 1 Content Tab
            $this->start_controls_section(
                'style1_content_tab',
                [
                    'label'     => esc_html__('Style 1 Content', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            $this->add_control(
                'style1_shortcode',
                [
                    'label'       => esc_html__('Form Shortcode', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => '',
                    'description' => esc_html__('Enter the form shortcode from your preferred form plugin (e.g. Contact Form 7, WPForms)', 'axero-toolkit'),
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
                'style1_form_button_style',
                [
                    'label'     => esc_html__('Form Button Style', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            $this->add_control(
                'form_button_position',
                [
                    'label'      => esc_html__('Position', 'axero-toolkit'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .creative-agency-footer-area .footer-left-side .newsletter-form-wrapper form button' => 'top: {{TOP}}{{UNIT}};',
                    ],
                    'default'    => [
                        'top'  => '-40',
                        'unit' => 'px',
                    ],
                ]
            );

            $this->add_control(
                'form_button_padding',
                [
                    'label'      => esc_html__('Padding', 'axero-toolkit'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .creative-agency-footer-area .footer-left-side .newsletter-form-wrapper form button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'default'    => [
                        'top'    => '0',
                        'right'  => '0',
                        'bottom' => '0',
                        'left'   => '0',
                        'unit'   => 'px',
                    ],
                ]
            );

            $this->add_control(
                'form_button_font_size',
                [
                    'label'      => esc_html__('Font Size', 'axero-toolkit'),
                    'type'       => Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range'      => [
                        'px' => [
                            'min' => 10,
                            'max' => 50,
                        ],
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} .creative-agency-footer-area .footer-left-side .newsletter-form-wrapper form button' => 'font-size: {{SIZE}}{{UNIT}};',
                    ],
                    'default'    => [
                        'size' => 23,
                        'unit' => 'px',
                    ],
                ]
            );

            $this->start_controls_tabs('form_button_tabs');

            $this->start_controls_tab(
                'form_button_normal',
                [
                    'label' => esc_html__('Normal', 'axero-toolkit'),
                ]
            );

            $this->add_control(
                'form_button_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .creative-agency-footer-area .footer-left-side .newsletter-form-wrapper form button' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_tab();

            $this->start_controls_tab(
                'form_button_hover',
                [
                    'label' => esc_html__('Hover', 'axero-toolkit'),
                ]
            );

            $this->add_control(
                'form_button_hover_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .creative-agency-footer-area .footer-left-side .newsletter-form-wrapper form button:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_tab();
            $this->end_controls_tabs();

            $this->end_controls_section();

            $this->start_controls_section(
                'form_input_border_section',
                [
                    'label'     => esc_html__('Input Border', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            $this->add_control(
                'form_input_border_color',
                [
                    'label'     => esc_html__('Border Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .creative-agency-footer-area .footer-left-side .newsletter-form-wrapper form .input-newsletter' => 'border-bottom: 1px solid {{VALUE}};',
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
   <footer class="creative-agency-footer-area">

                    <div class="footer-left-side position-relative">

                        <div class="newsletter-form-wrapper">
                        <?php if (! empty($settings['style1_shortcode'])): ?>
                            <div class="newsletter-form">
                                <?php echo do_shortcode($settings['style1_shortcode']); ?>
                            </div>
                        <?php endif; ?>
                        </div>
                    </div>




    </footer>


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

    $widgets_manager->register(new axero_news_form());