<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_about_us_3 extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_about_us_3';
        }

        public function get_title()
        {
            return __('About Us 3', 'axero-toolkit');
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
                <div class="about_us_area ptb_150 position-relative z-1">
                    <div class="container-fluid max_w_1560px">
                        <div class="about_video_box position-relative" data-cue="slideInUp">
                            <img src="<?php echo get_template_directory_uri()?>/assets/images/about/about4.jpg" alt="about4">
                            <a href="https://www.youtube.com/watch?v=ObKsCs5mYGQ" class="video_btn popup_video">
                                <i class="ri-play-fill"></i>
                            </a>
                        </div>
                        <div class="section_title style_four position-relative justify-content-md-end">
                            <h2 class="mb-0 text-uppercase fw-semibold order-md-2 text_animation">
                                About Axero
                            </h2>
                            <img src="<?php echo get_template_directory_uri()?>/assets/images/icons/left_down_arrow.svg" class="order-md-1" alt="left_down_arrow">
                        </div>
                        <div class="about_text_content" data-cue="slideInUp">
                            <p>
                                We are a full-service digital agency that empowers businesses to achieve their online goals. We are passionate about helping our clients succeed in the ever-evolving digital landscape. Our mission is to provide our clients with high-quality, results-driven digital marketing solutions that help them grow their businesses and achieve their desired outcomes.
                            </p>
                            <p>
                                Our vision is to be the leading digital agency in the industry, recognized for our innovative strategies, exceptional client service, and measurable results. We believe that every business has the potential to succeed online, and we are committed to helping our clients reach their full potential.
                            </p>
                            <div class="funafcts_list">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="number lh-1 fw-medium">
                                            <span class="counter_number">19</span>+
                                        </div>
                                        <div class="title text-uppercase fw-medium">
                                            Featured Work
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="number lh-1 fw-medium">
                                            <span class="counter_number">350</span>+
                                        </div>
                                        <div class="title text-uppercase fw-medium">
                                            Projected Completed
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="contact.html" class="btn black_btn style_three">
                                <span class="d-inline-block position-relative">
                                    Get in Touch <i class="ti ti-arrow-up-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="object5">
                        <img src="<?php echo get_template_directory_uri()?>/assets/images/objects/object5.png" alt="object5">
                    </div>
                    <div class="object6">
                        <img src="<?php echo get_template_directory_uri()?>/assets/images/objects/object6.png" alt="object6">
                    </div>
                </div>
            <?php
        }
    }
$widgets_manager->register(new axero_about_us_3());