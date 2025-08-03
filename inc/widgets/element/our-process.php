<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_our_process extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_our_process';
        }

        public function get_title()
        {
            return __('Our Process', 'axero-toolkit');
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
                <div class="our_process_area pt_150">
                    <div class="container">
                        <div class="section_title text-center mx-auto">
                            <div class="sub_title d-inline-block">
                                <span class="d-flex align-items-center text-uppercase">
                                    Our Process
                                    <img src="<?php echo get_template_directory_uri();?>/assets/images/icons/arrow_long_right.svg" alt="arrow_long_right">
                                </span>
                            </div>
                            <h2 class="mb-0 text_animation">
                                A Step-by-Step Approach to Digital Marketing
                            </h2>
                        </div>
                        <div class="our_process_inner_box position-relative z-1" data-cue="slideInUp">
                            <div class="row align-items-center gx-0">
                                <div class="col-lg-6">
                                    <div class="image text-center">
                                        <img src="<?php echo get_template_directory_uri();?>/assets/images/process_group_meeting.jpg" alt="process_group_meeting">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="content">
                                        <div class="box position-relative z-1">
                                            <h3>
                                                Come up With a Blue Print
                                            </h3>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidid labore et dolore.
                                            </p>
                                            <a href="<?php echo esc_url( home_url( '/pricing/' ) ); ?>" class="link_btn">
                                                <i class="ti ti-arrow-up-right"></i>
                                            </a>
                                        </div>
                                        <div
                                            class="box position-relative z-1"
                                            style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/bg_image/bg_image1.jpg');"
                                        >
                                            <h3>
                                                Execute to Achieve
                                            </h3>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidid labore et dolore.
                                            </p>
                                            <a href="<?php echo esc_url( home_url( '/pricing/' ) ); ?>" class="link_btn">
                                                <i class="ti ti-arrow-up-right"></i>
                                            </a>
                                        </div>
                                        <div class="box position-relative z-1">
                                            <h3>
                                                Monitor & Report
                                            </h3>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidid labore et dolore.
                                            </p>
                                            <a href="<?php echo esc_url( home_url( '/pricing/' ) ); ?>" class="link_btn">
                                                <i class="ti ti-arrow-up-right"></i>
                                            </a>
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
$widgets_manager->register(new axero_our_process());