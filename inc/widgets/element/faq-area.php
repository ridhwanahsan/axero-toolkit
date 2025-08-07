<?php
    namespace axero_toolkit\Widgets;
    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (!defined('ABSPATH')) {
        exit; // Exit if accessed directly
    }

    class axero_faq_area extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_faq_area';
        }

        public function get_title()
        {
            return __('FAQ Area', 'axero-toolkit');
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

        }

        /**
         * Style Tab Content Section
         * ------------------------
         */

        protected function style_tab_content()
        {
            $this->start_controls_section(
                'faq_title_style_section',
                [
                    'label' => esc_html__('Title Style', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_STYLE,
                ]
            );

            // Sub Title Style
            $this->add_control(
                'sub_title_heading',
                [
                    'label' => esc_html__('Sub Title', 'axero-toolkit'),
                    'type'  => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'sub_title_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .faq_content .sub_title span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'sub_title_typography',
                    'label'    => esc_html__('Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .faq_content .sub_title span',
                ]
            );

            // Main Title Style
            $this->add_control(
                'main_title_heading',
                [
                    'label' => esc_html__('Main Title', 'axero-toolkit'),
                    'type'  => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'main_title_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .faq_content h2' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'main_title_typography',
                    'label'    => esc_html__('Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .faq_content h2',
                ]
            );

            $this->end_controls_section();

            $this->start_controls_section(
                'faq_area_style_section',
                [
                    'label' => esc_html__('FAQ Section', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_control(
                'show_top_rectangle',
                [
                    'label'        => esc_html__('Show Top Rectangle', 'axero-toolkit'),
                    'type'         => Controls_Manager::SWITCHER,
                    'label_on'     => esc_html__('Show', 'axero-toolkit'),
                    'label_off'    => esc_html__('Hide', 'axero-toolkit'),
                    'return_value' => 'yes',
                    'default'      => 'yes',
                ]
            );

            $this->add_control(
                'top_rectangle_bg_color',
                [
                    'label'     => esc_html__('Top Rectangle Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .white_top_rectangle' => 'background-color: {{VALUE}};',
                    ],
                    'condition' => [
                        'show_top_rectangle' => 'yes',
                    ],
                ]
            );

            $this->add_control(
                'show_bottom_rectangle',
                [
                    'label'        => esc_html__('Show Bottom Rectangle', 'axero-toolkit'),
                    'type'         => Controls_Manager::SWITCHER,
                    'label_on'     => esc_html__('Show', 'axero-toolkit'),
                    'label_off'    => esc_html__('Hide', 'axero-toolkit'),
                    'return_value' => 'yes',
                    'default'      => 'yes',
                ]
            );

            $this->add_control(
                'bottom_rectangle_bg_color',
                [
                    'label'     => esc_html__('Bottom Rectangle Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} .white_bottom_rectangle' => 'background-color: {{VALUE}};',
                    ],
                    'condition' => [
                        'show_bottom_rectangle' => 'yes',
                    ],
                ]
            );

            $this->end_controls_section();
        }

        protected function render()
        {
            $settings = $this->get_settings_for_display(); ?>
                <div class="faq_area bg_image">
                    <?php if ( ! empty( $settings['show_top_rectangle'] ) && $settings['show_top_rectangle'] === 'yes' ) : ?>
                        <div class="white_top_rectangle"></div>
                    <?php endif; ?>
                    <div class="container ptb_150">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="faq_content">
                                     <div class="sub_title d-inline-block  ">
                                    <span class="d-flex text-white align-items-center text-uppercase">
                                        FAQ
                                        <img src="<?php echo get_template_directory_uri();?>/assets/images/icons/white_arrow_long_right.svg" alt="white_arrow_long_right">
                                    </span>
                                    </div>
                                    <h2 class="text-white  text_animation">
                                        Have Questions? We’ve got Answers
                                    </h2>
                                    <div class="accordion" id="faqAccordion" data-cues="slideInUp" data-group="faq_content">
                                        <div class="accordion-item rounded-0 bg-transparent">
                                            <button class="accordion-button d-block text-start p-0 fw-semibold bg-transparent shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                What is the difference between SEO and PPC?
                                            </button>
                                            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                                <div class="accordion-body px-0 pb-0">
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidid unt ut labo magna.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item rounded-0 bg-transparent">
                                            <button class="accordion-button d-block text-start p-0 fw-semibold bg-transparent shadow-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                What is included in your SEO services?
                                            </button>
                                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                                <div class="accordion-body px-0 pb-0">
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidid unt ut labo magna.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item rounded-0 bg-transparent">
                                            <button class="accordion-button d-block text-start p-0 fw-semibold bg-transparent shadow-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                Do you provide support after the campaign ends?
                                            </button>
                                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                                <div class="accordion-body px-0 pb-0">
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidid unt ut labo magna.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="faq_image position-relative z-1" data-cue="slideInUp">
                                    <img src="<?php echo get_template_directory_uri();?>/assets/images/faq.jpg" alt="faq-image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if ('yes' === $settings['show_bottom_rectangle']) : ?>
                        <div class="white_bottom_rectangle"></div>
                    <?php endif; ?>
                </div>
            <?php
        }
    }
$widgets_manager->register(new axero_faq_area());