<?php
    namespace axero_toolkit\Widgets;
    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_services_area_4 extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_services_area_4';
        }

        public function get_title()
        {
            return __('Service Area 4', 'axero-toolkit');
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

        }

        protected function render()
        {
            $settings = $this->get_settings_for_display(); ?> 
                <div class="services_area bg_image">
                    <div class="white_top_rectangle h_125"></div>
                        <div class="ptb_150 overflow-hidden">
                            <div class="container">
                                <div class="section_title white_color style_two text_animation">
                                    <div class="sub_title d-inline-block">
                                        <span class="d-flex align-items-center text-uppercase">
                                            Our Approach
                                            <img src="<?php echo get_template_directory_uri()?>/assets/images/icons/white_arrow_long_right.svg" alt="white_arrow_long_right">
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
                                        <img src="<?php echo get_template_directory_uri()?>/assets/images/icons/megaphone.svg" class="icon d-block w-auto" alt="megaphone">
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
                                        <img src="<?php echo get_template_directory_uri()?>/assets/images/icons/media_target.svg" class="icon d-block w-auto" alt="media_target">
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
                                        <img src="<?php echo get_template_directory_uri()?>/assets/images/icons/search_chart.svg" class="icon d-block w-auto" alt="search_chart">
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
                                        <img src="<?php echo get_template_directory_uri()?>/assets/images/icons/mobile_design.svg" class="icon d-block w-auto" alt="mobile_design">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="white_bottom_rectangle"></div>
                </div>
            <?php
        }
    }
$widgets_manager->register(new axero_services_area_4());