<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_choose_us_2 extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_choose_us_2';
        }

        public function get_title()
        {
            return __('Choose Us 2', 'axero-toolkit');
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
                <div class="why_choose_us_area pb_150 position-relative z-1">
                    <div class="container-fluid max_w_1560px">
                        <div class="row align-items-end">
                            <div class="col-lg-6">
                                <div class="why_choose_us_left_side position-relative z-1">
                                    <h2 class="text-uppercase fw-black text_animation">
                                        Watch the video to discover more
                                    </h2>
                                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn black_btn style_two with_border" data-cue="slideInUp">
                                        <span class="d-inline-block position-relative">
                                            Contact Us <i class="ti ti-arrow-up-right"></i>
                                        </span>
                                    </a>
                                    <div class="image text-center">
                                        <img src="<?php echo get_template_directory_uri()?>/assets/images/banner/star.svg" alt="star">
                                    </div>
                                    <img src="<?php echo get_template_directory_uri()?>/assets/images/blur.png" class="shape" alt="blur">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="why_choose_us_right_side">
                                    <p>
                                        We believe that the surest measure of success is when a client partners with us more than half our clients stay with us for longer than a single project.
                                    </p>
                                    <div class="box position-relative" data-cue="slideInUp">
                                        <img src="<?php echo get_template_directory_uri()?>/assets/images/discover.jpg" alt="discover">
                                        <a href="https://www.youtube.com/watch?v=ObKsCs5mYGQ" class="video_btn popup_video">
                                            <i class="ti ti-player-play"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
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
$widgets_manager->register(new axero_choose_us_2());