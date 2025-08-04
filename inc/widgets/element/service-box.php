<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_service_box extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_service_box';
        }

        public function get_title()
        {
            return __('Service Box', 'axero-toolkit');
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
                <div class="pt_150">
                    <div class="container">
                        <div class="row justify-content-center" data-cues="slideInUp" data-group="services_list">
                            <div class="col-lg-4 col-sm-6">
                                <div class="service_box_item">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <img src="<?php echo get_template_directory_uri()?>/assets/images/icons/digital_advertising.svg" alt="digital_advertising">
                                    </div>
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
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="service_box_item">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <img src="<?php echo get_template_directory_uri()?>/assets/images/icons/social_media_graphics.svg" alt="social_media_graphics">
                                    </div>
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
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="service_box_item">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <img src="<?php echo get_template_directory_uri()?>/assets/images/icons/web_design.svg" alt="web_design">
                                    </div>
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
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="service_box_item">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <img src="<?php echo get_template_directory_uri()?>/assets/images/icons/branding_marketing.svg" alt="branding_marketing">
                                    </div>
                                    <h3>
                                        <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>">
                                            Branding & Marketing
                                        </a>
                                    </h3>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidid unt ut labore et dolore magna.
                                    </p>
                                    <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="details_link_btn">
                                        <i class="ti ti-arrow-up-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="service_box_item">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <img src="<?php echo get_template_directory_uri()?>/assets/images/icons/content_marketing.svg" alt="content_marketing">
                                    </div>
                                    <h3>
                                        <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>">
                                            Content Marketing
                                        </a>
                                    </h3>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidid unt ut labore et dolore magna.
                                    </p>
                                    <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="details_link_btn">
                                        <i class="ti ti-arrow-up-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="service_box_item">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <img src="<?php echo get_template_directory_uri()?>/assets/images/icons/email_marketing.svg" alt="email_marketing">
                                    </div>
                                    <h3>
                                        <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>">
                                            Email Marketing
                                        </a>
                                    </h3>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidid unt ut labore et dolore magna.
                                    </p>
                                    <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="details_link_btn">
                                        <i class="ti ti-arrow-up-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }
    }
$widgets_manager->register(new axero_service_box());