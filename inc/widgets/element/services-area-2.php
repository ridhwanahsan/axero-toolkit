<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_services_area_2 extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_services_area_2';
        }

        public function get_title()
        {
            return __('Service Area 2', 'axero-toolkit');
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
                <div class="services_area position-relative z-1">
                    <div class="container-fluid max_w_1560px">
                        <div class="section_title position-relative style_three text_animation">
                            <div class="row align-items-end">
                                <div class="col-lg-7">
                                    <div class="title position-relative d-inline-block">
                                        <h2 class="mb-0 fw-black text-uppercase">
                                            Services
                                        </h2>
                                        <img src="<?php echo get_template_directory_uri()?>/assets/images/icons/vector.svg" alt="vector">
                                    </div>
                                    <p>
                                        We believe that the surest measure of success is when a client partners with us more than half our clients stay with us for longer than a single project.
                                    </p>
                                </div>
                                <div class="col-lg-5 text-lg-end">
                                    <a href="services.html" class="btn black_btn style_two with_border">
                                        <span class="d-inline-block position-relative">
                                            View All Services <i class="ti ti-arrow-up-right"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid px-0 max-w-full" data-cues="slideInUp" data-group="services_list">
                        <div class="service_item position-relative">
                            <div class="container-fluid max_w_1560px position-relative">
                                <div class="row align-items-center mx-0">
                                    <div class="col-lg-5 order-2 order-lg-1 px-0">
                                        <h3 class="mb-0">
                                            Digital Marketing
                                        </h3>
                                    </div>
                                    <div class="col-lg-2 order-1 order-lg-2 px-0">
                                        <div class="number lh-1 fw-bold">
                                            01
                                        </div>
                                    </div>
                                    <div class="col-lg-5 order-3 order-lg-3 px-0">
                                        <div class="content position-relative">
                                            <p class="mb-0">
                                                We believe that the surest measure of success is when a client partners with us more than half our clients stay with us for longer than a single project.
                                            </p>
                                            <a href="service-details.html" class="details_link_btn">
                                                <i class="ti ti-arrow-up-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="image">
                                    <img src="<?php echo get_template_directory_uri()?>/assets/images/services/service1.jpg" alt="service1">
                                </div>
                            </div>
                            <a href="service-details.html" class="position-absolute z-1 start-0 end-0 top-0 bottom-0"></a>
                        </div>
                        <div class="service_item position-relative">
                            <div class="container-fluid max_w_1560px position-relative">
                                <div class="row align-items-center mx-0">
                                    <div class="col-lg-5 order-2 order-lg-1 px-0">
                                        <h3 class="mb-0">
                                            Website Design
                                        </h3>
                                    </div>
                                    <div class="col-lg-2 order-1 order-lg-2 px-0">
                                        <div class="number lh-1 fw-bold">
                                            02
                                        </div>
                                    </div>
                                    <div class="col-lg-5 order-3 order-lg-3 px-0">
                                        <div class="content position-relative">
                                            <p class="mb-0">
                                                We believe that the surest measure of success is when a client partners with us more than half our clients stay with us for longer than a single project.
                                            </p>
                                            <a href="service-details.html" class="details_link_btn">
                                                <i class="ti ti-arrow-up-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="image">
                                    <img src="<?php echo get_template_directory_uri()?>/assets/images/services/service2.jpg" alt="service2">
                                </div>
                            </div>
                            <a href="service-details.html" class="position-absolute z-1 start-0 end-0 top-0 bottom-0"></a>
                        </div>
                        <div class="service_item position-relative">
                            <div class="container-fluid max_w_1560px position-relative">
                                <div class="row align-items-center mx-0">
                                    <div class="col-lg-5 order-2 order-lg-1 px-0">
                                        <h3 class="mb-0">
                                            Digital Advertising 
                                        </h3>
                                    </div>
                                    <div class="col-lg-2 order-1 order-lg-2 px-0">
                                        <div class="number lh-1 fw-bold">
                                            03
                                        </div>
                                    </div>
                                    <div class="col-lg-5 order-3 order-lg-3 px-0">
                                        <div class="content position-relative">
                                            <p class="mb-0">
                                                We believe that the surest measure of success is when a client partners with us more than half our clients stay with us for longer than a single project.
                                            </p>
                                            <a href="service-details.html" class="details_link_btn">
                                                <i class="ti ti-arrow-up-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="image">
                                    <img src="<?php echo get_template_directory_uri()?>/assets/images/services/service3.jpg" alt="service3">
                                </div>
                            </div>
                            <a href="service-details.html" class="position-absolute z-1 start-0 end-0 top-0 bottom-0"></a>
                        </div>
                        <div class="service_item position-relative">
                            <div class="container-fluid max_w_1560px position-relative">
                                <div class="row align-items-center mx-0">
                                    <div class="col-lg-5 order-2 order-lg-1 px-0">
                                        <h3 class="mb-0">
                                            Content Marketing
                                        </h3>
                                    </div>
                                    <div class="col-lg-2 order-1 order-lg-2 px-0">
                                        <div class="number lh-1 fw-bold">
                                            04
                                        </div>
                                    </div>
                                    <div class="col-lg-5 order-3 order-lg-3 px-0">
                                        <div class="content position-relative">
                                            <p class="mb-0">
                                                We believe that the surest measure of success is when a client partners with us more than half our clients stay with us for longer than a single project.
                                            </p>
                                            <a href="service-details.html" class="details_link_btn">
                                                <i class="ti ti-arrow-up-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="image">
                                    <img src="<?php echo get_template_directory_uri()?>/assets/images/services/service4.jpg" alt="service4">
                                </div>
                            </div>
                            <a href="service-details.html" class="position-absolute z-1 start-0 end-0 top-0 bottom-0"></a>
                        </div>
                        <div class="service_item position-relative">
                            <div class="container-fluid max_w_1560px position-relative">
                                <div class="row align-items-center mx-0">
                                    <div class="col-lg-5 order-2 order-lg-1 px-0">
                                        <h3 class="mb-0">
                                            SEO Marketing
                                        </h3>
                                    </div>
                                    <div class="col-lg-2 order-1 order-lg-2 px-0">
                                        <div class="number lh-1 fw-bold">
                                            05
                                        </div>
                                    </div>
                                    <div class="col-lg-5 order-3 order-lg-3 px-0">
                                        <div class="content position-relative">
                                            <p class="mb-0">
                                                We believe that the surest measure of success is when a client partners with us more than half our clients stay with us for longer than a single project.
                                            </p>
                                            <a href="service-details.html" class="details_link_btn">
                                                <i class="ti ti-arrow-up-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="image">
                                    <img src="<?php echo get_template_directory_uri()?>/assets/images/services/service5.jpg" alt="service5">
                                </div>
                            </div>
                            <a href="service-details.html" class="position-absolute z-1 start-0 end-0 top-0 bottom-0"></a>
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
$widgets_manager->register(new axero_services_area_2());