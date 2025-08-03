<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_features_area extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_features_area';
        }

        public function get_title()
        {
            return __('Features Area', 'axero-toolkit');
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
                <div class="features_area bg_color pb_150">
                    <div class="container">
                        <div class="section_title style_two text_animation">
                            <div class="sub_title d-inline-block">
                                <span class="d-flex align-items-center text-uppercase">
                                    Features
                                    <img src="<?php echo get_template_directory_uri();?>/assets/images/icons/arrow_long_right.svg" alt="arrow_long_right">
                                </span>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-lg-7">
                                    <h2 class="mb-0">
                                        Unlocking the Potential of Digital Marketing
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
                    <div class="features_list" data-cues="slideInUp" data-group="features_list">
                        <div class="item">
                            <div class="container position-relative">
                                <h3 class="mb-0 fw-normal text-uppercase">
                                    <span class="fw-bold">01.</span> <strong class="fw-bold">Grow Your</strong> Business
                                </h3>
                                <div class="box">
                                    <img src="<?php echo get_template_directory_uri();?>/assets/images/features/feature1.png" alt="feature">
                                    <a href="https://www.youtube.com/watch?v=ObKsCs5mYGQ" class="video_btn popup_video">
                                        <img src="<?php echo get_template_directory_uri();?>/assets/images/objects/play_now.png" alt="play-now">
                                        <i class="ti ti-player-play"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="container position-relative">
                                <h3 class="mb-0 fw-normal text-uppercase">
                                    <span class="fw-bold">02.</span> <strong class="fw-bold">Increase Your</strong> Revenue
                                </h3>
                                <div class="box">
                                    <img src="<?php echo get_template_directory_uri();?>/assets/images/features/feature2.png" alt="feature">
                                    <a href="https://www.youtube.com/watch?v=ObKsCs5mYGQ" class="video_btn popup_video">
                                        <img src="<?php echo get_template_directory_uri();?>/assets/images/objects/play_now.png" alt="play-now">
                                        <i class="ti ti-player-play"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="container position-relative">
                                <h3 class="mb-0 fw-normal text-uppercase">
                                    <span class="fw-bold">03.</span> <strong class="fw-bold">Boost Brand</strong> Awareness
                                </h3>
                                <div class="box">
                                    <img src="<?php echo get_template_directory_uri();?>/assets/images/features/feature3.png" alt="feature">
                                    <a href="https://www.youtube.com/watch?v=ObKsCs5mYGQ" class="video_btn popup_video">
                                        <img src="<?php echo get_template_directory_uri();?>/assets/images/objects/play_now.png" alt="play-now">
                                        <i class="ti ti-player-play"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="container position-relative">
                                <h3 class="mb-0 fw-normal text-uppercase">
                                    <span class="fw-bold">04.</span> <strong class="fw-bold">Expand Market</strong> Share
                                </h3>
                                <div class="box">
                                    <img src="<?php echo get_template_directory_uri();?>/assets/images/features/feature4.png" alt="feature">
                                    <a href="https://www.youtube.com/watch?v=ObKsCs5mYGQ" class="video_btn popup_video">
                                        <img src="<?php echo get_template_directory_uri();?>/assets/images/objects/play_now.png" alt="play-now">
                                        <i class="ti ti-player-play"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }
    }
$widgets_manager->register(new axero_features_area());