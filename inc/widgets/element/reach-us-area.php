<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_reach_us_area extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_reach_us_area';
        }

        public function get_title()
        {
            return __('Reach Us', 'axero-toolkit');
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
                <div class="reach_us_area pb_125">
                    <div class="container">
                        <div class="section_title text-center mx-auto">
                            <h2 class="mb-0 text_animation">
                                Other Ways to Reach Us
                            </h2>
                        </div>
                        <div class="row justify-content-center" data-cues="slideInUp" data-group="reach_us_list">
                            <div class="col-lg-3 col-sm-6">
                                <div class="reach_us_box text-center">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <i class="ti ti-map-pin"></i>
                                    </div>
                                    <h3>
                                        Our Office
                                    </h3>
                                    <p>
                                        Nenuya Centre Elia Street, New York, USA
                                    </p>
                                    <a href="<?php echo esc_url( home_url( 'contact' ) ); ?>" target="_blank" class="details_link_btn d-inline-block position-relative fw-medium">
                                        Visit Us <i class="ti ti-arrow-narrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="reach_us_box text-center">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <i class="ti ti-message"></i>
                                    </div>
                                    <h3>
                                        Via Chat
                                    </h3>
                                    <p>
                                        Instant solutions at your fingertips.
                                    </p>
                                    <a href="<?php echo esc_url( home_url( 'contact' ) ); ?>" class="details_link_btn d-inline-block position-relative fw-medium">
                                        Let's Chat <i class="ti ti-arrow-narrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="reach_us_box text-center">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <i class="ti ti-help-circle"></i>
                                    </div>
                                    <h3>
                                        Report Issue
                                    </h3>
                                    <p>
                                        Access premium support services.
                                    </p>
                                    <a href="<?php echo esc_url( home_url( 'contact' ) ); ?>" class="details_link_btn d-inline-block position-relative fw-medium">
                                        Send Report <i class="ti ti-arrow-narrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="reach_us_box text-center">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <i class="ti ti-users"></i>
                                    </div>
                                    <h3>
                                        Our Community
                                    </h3>
                                    <p>
                                        Create meaningful connections with users.
                                    </p>
                                    <a href="<?php echo esc_url( home_url( 'contact' ) ); ?>" class="details_link_btn d-inline-block position-relative fw-medium">
                                        Join Us <i class="ti ti-arrow-narrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }
    }
$widgets_manager->register(new axero_reach_us_area());