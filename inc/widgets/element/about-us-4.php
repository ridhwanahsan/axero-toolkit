<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_about_us_4 extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_about_us_4';
        }

        public function get_title()
        {
            return __('About Us 4', 'axero-toolkit');
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
                <div class="about_us_area ptb_150">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="about_us_title d-inline-block" data-cue="slideInUp">
                                    <span class="d-flex align-items-center text-uppercase">
                                        ABOUT US
                                        <img src="<?php echo get_template_directory_uri()?>/assets/images/icons/arrow_long_right.svg" alt="arrow_long_right">
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="about_us_content">
                                    <h2 class="on_scroll_color_change fw-medium text-uppercase">
                                        We believe that the surest measure of success is when a client partners with us more than half our clients stay with us for longer than a single project.
                                    </h2>
                                    <div class="row" data-cues="slideInUp" data-group="about_us_content">
                                        <div class="col-lg-4">
                                            <div class="about_us_text">
                                                <div class="number lh-1 position-relative fw-medium d-inline-block">
                                                    <div class="text_animation counter_number">
                                                        25
                                                    </div>
                                                    <span class="text_animation">
                                                        M
                                                    </span>
                                                </div>
                                                <p>
                                                    Axero is a creative agency offering marketing, development, design, and a range of digital solutions. We’ve secured over $15M in funding.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="about_us_image text-center">
                                                <img src="<?php echo get_template_directory_uri()?>/assets/images/about/about1.jpg" alt="about">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }
    }
$widgets_manager->register(new axero_about_us_4());