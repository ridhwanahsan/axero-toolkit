<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_services_area_3 extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_services_area_3';
        }

        public function get_title()
        {
            return __('Service Area 3', 'axero-toolkit');
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
                <div class="services_area">
                    <div class="container-fluid max_w_1560px">
                        <div class="section_title style_four position-relative text_animation">
                            <h2 class="mb-0 text-white text-uppercase fw-semibold">
                                Services
                            </h2>
                            <img src="<?php echo get_template_directory_uri()?>/assets/images/icons/right_down_arrow.svg" alt="right_down_arrow">
                        </div>
                        <div class="services_items_list" data-cues="slideInUp" data-group="services_items_list">
                            <div class="item position-relative">
                                <div class="row align-items-center">
                                    <div class="col-lg-3">
                                        <div class="number text-white fw-semibold lh-1">
                                            (01)
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <h3 class="mb-0 fw-semibold">
                                            <a href="service-details.html">
                                                Product design
                                            </a>
                                        </h3>
                                    </div>
                                    <div class="col-lg-3 text-lg-end">
                                        <a href="service-details.html" class="btn secondary_btn style_three">
                                            <span class="d-inline-block position-relative">
                                                View Service <i class="ti ti-arrow-up-right"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="item position-relative">
                                <div class="row align-items-center">
                                    <div class="col-lg-3">
                                        <div class="number text-white fw-semibold lh-1">
                                            (02)
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <h3 class="mb-0 fw-semibold">
                                            <a href="service-details.html">
                                                Interaction design
                                            </a>
                                        </h3>
                                    </div>
                                    <div class="col-lg-3 text-lg-end">
                                        <a href="service-details.html" class="btn secondary_btn style_three">
                                            <span class="d-inline-block position-relative">
                                                View Service <i class="ti ti-arrow-up-right"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="item position-relative">
                                <div class="row align-items-center">
                                    <div class="col-lg-3">
                                        <div class="number text-white fw-semibold lh-1">
                                            (03)
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <h3 class="mb-0 fw-semibold">
                                            <a href="service-details.html">
                                                Animation
                                            </a>
                                        </h3>
                                    </div>
                                    <div class="col-lg-3 text-lg-end">
                                        <a href="service-details.html" class="btn secondary_btn style_three">
                                            <span class="d-inline-block position-relative">
                                                View Service <i class="ti ti-arrow-up-right"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="item position-relative">
                                <div class="row align-items-center">
                                    <div class="col-lg-3">
                                        <div class="number text-white fw-semibold lh-1">
                                            (04)
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <h3 class="mb-0 fw-semibold">
                                            <a href="service-details.html">
                                                Brand Strategy
                                            </a>
                                        </h3>
                                    </div>
                                    <div class="col-lg-3 text-lg-end">
                                        <a href="service-details.html" class="btn secondary_btn style_three">
                                            <span class="d-inline-block position-relative">
                                                View Service <i class="ti ti-arrow-up-right"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }
    }
$widgets_manager->register(new axero_services_area_3());