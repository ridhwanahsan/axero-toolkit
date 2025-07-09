<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_bottom_top extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_bottom_top';
        }

        public function get_title()
        {
            return __('Back to top', 'axero-toolkit');
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

                    ],
                ]
            );

            $this->end_controls_section();
            // Style 1 Controls
            $this->start_controls_section(
                'style1_section',
                [
                    'label'     => esc_html__('Style 1 Settings', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            $this->add_control(
                'style1_icon',
                [
                    'label'   => esc_html__('Icon', 'axero-toolkit'),
                    'type'    => Controls_Manager::ICONS,
                    'default' => [
                        'value'   => 'ri-arrow-up-line',
                        'library' => 'remix',
                    ],
                ]
            );

            $this->add_control(
                'style1_text',
                [
                    'label'       => esc_html__('Button Text', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Back to top', 'axero-toolkit'),
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
                'style1_style_section',
                [
                    'label'     => esc_html__('Style 1', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            // Title Color
            $this->add_control(
                'style1_title_color',
                [
                    'label'     => esc_html__('Title Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .main_footer_bottom .back_to_top span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Title Hover Color
            $this->add_control(
                'style1_title_hover_color',
                [
                    'label'     => esc_html__('Title Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .main_footer_bottom .back_to_top:hover span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Title Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style1_title_typography',
                    'label'    => esc_html__('Title Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .main_footer_bottom .back_to_top span',
                ]
            );

            // Icon Color
            $this->add_control(
                'style1_icon_color',
                [
                    'label'     => esc_html__('Icon Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .main_footer_bottom .back_to_top .icon' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Icon Hover Color
            $this->add_control(
                'style1_icon_hover_color',
                [
                    'label'     => esc_html__('Icon Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .main_footer_bottom .back_to_top:hover .icon' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Icon Background Color
            $this->add_control(
                'style1_icon_bg_color',
                [
                    'label'     => esc_html__('Icon Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .main_footer_bottom .back_to_top .icon' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            // Icon Hover Background Color
            $this->add_control(
                'style1_icon_hover_bg_color',
                [
                    'label'     => esc_html__('Icon Hover Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .main_footer_bottom .back_to_top:hover .icon' => 'background-color: {{VALUE}};',
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

<div class="main_footer_bottom">
  <div class="back_to_top d-flex align-items-center">
    <div class="icon d-flex align-items-center justify-content-center">
      <?php

                      \Elementor\Icons_Manager::render_icon($settings['style1_icon'], [
                          'aria-hidden' => 'true',
                          'class'       => 'back-to-top-icon',
                      ]);
                  ?>
    </div>
    <span class="d-block lh-1 text-uppercase">
      <?php echo esc_html($settings['style1_text']); ?>
    </span>
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

$widgets_manager->register(new axero_bottom_top());