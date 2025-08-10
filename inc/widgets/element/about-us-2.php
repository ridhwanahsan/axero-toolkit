<?php
    namespace axero_toolkit\Widgets;
    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_about_us_2 extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_about_us_2';
        }

        public function get_title()
        {
            return __('About Us 2', 'axero-toolkit');
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
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="about_us_left_side">
                                    <h2 class="text-uppercase fw-black text_animation">
                                        Connecting you with marketing
                                    </h2>
                                    <a href="<?php echo esc_url( home_url( '/about-us' ) ); ?>" class="btn black_btn style_two with_border">
                                        <span class="d-inline-block position-relative">
                                            More About Us <i class="ti ti-arrow-up-right"></i>
                                        </span>
                                    </a>
                                    <img src="<?php echo get_template_directory_uri()?>/assets/images/about/about3.jpg" alt="about3">
                                    <p>
                                        We believe that the surest measure of success is when a client partners with us more than half our clients stay with us for longer than a single project.
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="about_us_right_side" data-cue="slideInUp">
                                    <img src="<?php echo get_template_directory_uri()?>/assets/images/about/about2.jpg" alt="about2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="object3">
                        <img src="<?php echo get_template_directory_uri()?>/assets/images/objects/object3.svg" alt="object3">
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
$widgets_manager->register(new axero_about_us_2());