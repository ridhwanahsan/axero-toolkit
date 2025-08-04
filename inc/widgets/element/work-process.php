<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_work_process extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_work_process';
        }

        public function get_title()
        {
            return __('Work Process', 'axero-toolkit');
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
                <div class="work_process_area position-relative z-1">
                    <div class="container-fluid max_w_1560px">
                        <div class="section_title position-relative style_three right_side text_animation">
                            <div class="row align-items-end">
                                <div class="col-lg-7 order-1 order-lg-2 text-md-end">
                                    <div class="title position-relative d-inline-block">
                                        <h2 class="mb-0 fw-black text-uppercase">
                                            Work Process
                                        </h2>
                                        <img src="<?php echo get_template_directory_uri()?>/assets/images/icons/vector.svg" alt="vector">
                                    </div>
                                    <p>
                                        We believe that the surest measure of success is when a client partners with us more than half our clients stay with us for longer than a single project.
                                    </p>
                                </div>
                                <div class="col-lg-5 order-2 order-lg-1 text-md-end text-lg-start">
                                    <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="btn black_btn style_two with_border">
                                        <span class="d-inline-block position-relative">
                                            View All Services <i class="ti ti-arrow-up-right"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center" data-cues="slideInUp" data-group="work_process_list">
                            <div class="col-lg-4 col-sm-6">
                                <div class="work_process_box position-relative text-center z-1">
                                    <h3 class="mb-0 text-uppercase">
                                        Step 01
                                    </h3>
                                    <div class="box">
                                        <h4>
                                            Subscribe to a Plan
                                        </h4>
                                        <p>
                                            Lorem ipsum dolor sit amet consect urna tellus dignissim duis at.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="work_process_box position-relative text-center z-1">
                                    <h3 class="mb-0 text-uppercase">
                                        Step 02
                                    </h3>
                                    <div class="box">
                                        <h4>
                                            Make Your Request
                                        </h4>
                                        <p>
                                            Lorem ipsum dolor sit amet consect urna tellus dignissim duis at.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="work_process_box position-relative text-center z-1">
                                    <h3 class="mb-0 text-uppercase">
                                        Step 03
                                    </h3>
                                    <div class="box">
                                        <h4>
                                            Get Your Design in Time
                                        </h4>
                                        <p>
                                            Lorem ipsum dolor sit amet consect urna tellus dignissim duis at.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="satisfied_customers mx-auto d-flex align-items-center justify-content-center" data-cue="slideInUp">
                            <div class="icon rounded-circle text-center">
                                <i class="ti ti-star"></i>
                            </div>
                            <span class="d-inline-block">
                                <strong>Over 17K+</strong> Satisfied Customers
                            </span>
                        </div>
                    </div>
                    <div class="border_lines">
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                    </div>
                </div>
            <?php
        }
    }
$widgets_manager->register(new axero_work_process());