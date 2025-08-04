<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_services_area extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_services_area';
        }

        public function get_title()
        {
            return __('Service Area', 'axero-toolkit');
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
                'service_area_style_section',
                [
                    'label' => esc_html__('Service Area', 'lunex-toolkit'),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_control(
                'show_top_rectangle',
                [
                    'label'        => esc_html__('Show Top Rectangle', 'lunex-toolkit'),
                    'type'         => \Elementor\Controls_Manager::SWITCHER,
                    'label_on'     => esc_html__('Show', 'lunex-toolkit'),
                    'label_off'    => esc_html__('Hide', 'lunex-toolkit'),
                    'return_value' => 'yes',
                    'default'      => 'yes',
                ]
            );

            $this->add_control(
                'top_rectangle_bg_color',
                [
                    'label'     => esc_html__('Top Rectangle Background Color', 'lunex-toolkit'),
                    'type'      => \Elementor\Controls_Manager::COLOR,
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
                    'label'        => esc_html__('Show Bottom Rectangle', 'lunex-toolkit'),
                    'type'         => \Elementor\Controls_Manager::SWITCHER,
                    'label_on'     => esc_html__('Show', 'lunex-toolkit'),
                    'label_off'    => esc_html__('Hide', 'lunex-toolkit'),
                    'return_value' => 'yes',
                    'default'      => 'yes',
                ]
            );

            $this->add_control(
                'bottom_rectangle_bg_color',
                [
                    'label'     => esc_html__('Bottom Rectangle Background Color', 'lunex-toolkit'),
                    'type'      => \Elementor\Controls_Manager::COLOR,
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
                <div class="services_area bg_image">
                    <?php if ( ! empty( $settings['show_top_rectangle'] ) && $settings['show_top_rectangle'] === 'yes' ) : ?>
                        <div class="white_top_rectangle"></div>
                    <?php endif; ?>
                    <div class="ptb_150 overflow-hidden">
                        <div class="container">
                            <div class="section_title white_color style_two text_animation">
                                <div class="sub_title d-inline-block">
                                    <span class="d-flex align-items-center text-uppercase">
                                        Our Approach
                                        <img src="<?php echo get_template_directory_uri();?>/assets/images/icons/white_arrow_long_right.svg" alt="white_arrow_long_right">
                                    </span>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-lg-7">
                                        <h2 class="mb-0">
                                            We Offer a Wide Range of Design Services
                                        </h2>
                                    </div>
                                    <div class="col-lg-5">
                                        <p>
                                            Our agency powers growth and success in the fast-paced digital marketing space. Let’s turn your vision into reality.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="services_slides position-relative owl-carousel owl-theme" data-cue="slideInUp">
                                <div class="service_box position-relative">
                                    <h3>
                                        <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>">
                                            Digital Advertising
                                        </a>
                                    </h3>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidid unt ut labore et dolore magna.
                                    </p>
                                    <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="details_link_btn">
                                        <i class="ti ti-arrow-up-right"></i>
                                    </a>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/megaphone.svg" class="icon d-block w-auto" alt="megaphone">
                                </div>
                                <div class="service_box position-relative">
                                    <h3>
                                        <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>">
                                            Social Media Graphics
                                        </a>
                                    </h3>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidid unt ut labore et dolore magna.
                                    </p>
                                    <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="details_link_btn">
                                        <i class="ti ti-arrow-up-right"></i>
                                    </a>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/media_target.svg" class="icon d-block w-auto" alt="media_target">
                                </div>
                                <div class="service_box position-relative">
                                    <h3>
                                        <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>">
                                            Web Design
                                        </a>
                                    </h3>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidid unt ut labore et dolore magna.
                                    </p>
                                    <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="details_link_btn">
                                        <i class="ti ti-arrow-up-right"></i>
                                    </a>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/search_chart.svg" class="icon d-block w-auto" alt="search_chart">
                                </div>
                                <div class="service_box position-relative">
                                    <h3>
                                        <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>">
                                            Mobile Design
                                        </a>
                                    </h3>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidid unt ut labore et dolore magna.
                                    </p>
                                    <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="details_link_btn">
                                        <i class="ti ti-arrow-up-right"></i>
                                    </a>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/mobile_design.svg" class="icon d-block w-auto" alt="mobile_design">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="browse_all_services_btn text-center" data-cue="slideInUp">
                                <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>">
                                    Browse all services <i class="ti ti-arrow-up-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php if ( 'yes' === $settings['show_bottom_rectangle'] ) : ?>
                        <div class="white_bottom_rectangle bg_color"></div>
                    <?php endif; ?>
                </div>
            <?php
        }
    }
$widgets_manager->register(new axero_services_area());