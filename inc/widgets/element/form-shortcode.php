<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_form_shortcode extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_form_shortcode';
        }

        public function get_title()
        {
            return __('Form Shortcode', 'axero-toolkit');
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
            $this->start_controls_section(
                'form_shortcode_section',
                [
                    'label' => esc_html__('Form Shortcode', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'form_shortcode',
                [
                    'label'       => esc_html__('Form Shortcode', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXTAREA,
                    'default'     => '',
                    'placeholder' => esc_html__('Enter your form shortcode here', 'axero-toolkit'),
                    'description' => esc_html__('Insert your contact form 7 or other form shortcode. Example: [contact-form-7 id="7673ce2" title="contact style1"]', 'axero-toolkit'),
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

        }

        protected function render()
        {
            $settings = $this->get_settings_for_display();

            if ($settings['style_selection'] === 'style1') {
            ?>
            <!-- style 1 -->

                 <div class="contact-area">
            <div class="container">
                        <div class="contact-form">
                            <?php echo do_shortcode($settings['form_shortcode']); ?>
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

    $widgets_manager->register(new axero_form_shortcode());