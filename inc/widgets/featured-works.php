<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_featured_works extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_featured_works';
        }

        public function get_title()
        {
            return __('Featured Works', 'axero-toolkit');
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
                <div class="featured_works_area">
                    <div class="container-fluid max_w_1560px">
                        <div class="section_title style_four position-relative justify-content-md-end">
                            <h2 class="mb-0 text-white text-uppercase fw-semibold order-md-2 text_animation">
                                Featured Work
                            </h2>
                            <img src="<?php echo get_template_directory_uri()?>/assets/images/icons/left_down_arrow.svg" class="order-md-1" alt="left_down_arrow">
                        </div>
                    </div>
                    <div class="container-fluid px-0">
                        <div class="featured_works_slides owl-carousel owl-theme" data-cue="slideInUp">
                            <div class="work_item">
                                <div class="image position-relative overflow-hidden">
                                    <img src="<?php echo get_template_directory_uri()?>/assets/images/works/work1.jpg" alt="work1">
                                    <a href="portfolio-details.html" class="details_link_btn d-flex align-items-center justify-content-center fw-medium rounded-circle">
                                        View
                                    </a>
                                </div>
                                <h3 class="fw-semibold">
                                    <a href="portfolio-details.html">
                                        Finance Website
                                    </a>
                                </h3>
                                <ul class="custom_list mb-0 list-unstyled p-0">
                                    <li class="fw-semibold d-inline-block">
                                        Design & UX Research
                                    </li>
                                    <li class="fw-medium d-inline-block">
                                        User interface
                                    </li>
                                </ul>
                            </div>
                            <div class="work_item">
                                <div class="image position-relative overflow-hidden">
                                    <img src="<?php echo get_template_directory_uri()?>/assets/images/works/work2.jpg" alt="work2">
                                    <a href="portfolio-details.html" class="details_link_btn d-flex align-items-center justify-content-center fw-medium rounded-circle">
                                        View
                                    </a>
                                </div>
                                <h3 class="fw-semibold">
                                    <a href="portfolio-details.html">
                                        Capital Compass
                                    </a>
                                </h3>
                                <ul class="custom_list mb-0 list-unstyled p-0">
                                    <li class="fw-semibold d-inline-block">
                                        UX Blueprint
                                    </li>
                                    <li class="fw-medium d-inline-block">
                                        Engaging Experiences
                                    </li>
                                </ul>
                            </div>
                            <div class="work_item">
                                <div class="image position-relative overflow-hidden">
                                    <img src="<?php echo get_template_directory_uri()?>/assets/images/works/work3.jpg" alt="work3">
                                    <a href="portfolio-details.html" class="details_link_btn d-flex align-items-center justify-content-center fw-medium rounded-circle">
                                        View
                                    </a>
                                </div>
                                <h3 class="fw-semibold">
                                    <a href="portfolio-details.html">
                                        Finance Navigator
                                    </a>
                                </h3>
                                <ul class="custom_list mb-0 list-unstyled p-0">
                                    <li class="fw-semibold d-inline-block">
                                        Design and UX
                                    </li>
                                    <li class="fw-medium d-inline-block">
                                        Designing for Impact
                                    </li>
                                </ul>
                            </div>
                            <div class="work_item">
                                <div class="image position-relative overflow-hidden">
                                    <img src="<?php echo get_template_directory_uri()?>/assets/images/works/work4.jpg" alt="work4">
                                    <a href="portfolio-details.html" class="details_link_btn d-flex align-items-center justify-content-center fw-medium rounded-circle">
                                        View
                                    </a>
                                </div>
                                <h3 class="fw-semibold">
                                    <a href="portfolio-details.html">
                                        Penny Perfect
                                    </a>
                                </h3>
                                <ul class="custom_list mb-0 list-unstyled p-0">
                                    <li class="fw-semibold d-inline-block">
                                        Design Excellence
                                    </li>
                                    <li class="fw-medium d-inline-block">
                                        Interface Innovation
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }
    }
$widgets_manager->register(new axero_featured_works());