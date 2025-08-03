<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_feedback_area extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_feedback_area';
        }

        public function get_title()
        {
            return __('Feed Back', 'axero-toolkit');
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
                 <div class="feedback_area bg_color ptb_150">
                    <div class="container">
                        <div class="section_title style_two text_animation">
                            <div class="sub_title d-inline-block">
                                <span class="d-flex align-items-center text-uppercase">
                                    Clients Feedback
                                    <img src="<?php echo get_template_directory_uri();?>/assets/images/icons/arrow_long_right.svg" alt="arrow_long_right">
                                </span>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-lg-7">
                                    <h2 class="mb-0">
                                        Take a Look at What <br>Our Clients Say
                                    </h2>
                                </div>
                                <div class="col-lg-5">
                                    <p>
                                        Our agency powers growth and success in the fast-paced digital marketing space. Let’s turn your vision into reality.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="feedback_slides owl-carousel owl-theme mx-auto" data-cue="slideInUp">
                            <div class="feedback_item position-relative z-1">
                                <p>
                                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam, eaqu psa quae ab illo inventore veritatis et quasi architecto beatae vitae. Sed ut perspiciatis unde omnis iste natus error sit volupta tem accusantium doloremque laudantium.
                                </p>
                                <div class="reviewer d-flex align-items-center">
                                    <img src="<?php echo get_template_directory_uri();?>/assets/images/users/user1.jpg" alt="user">
                                    <div>
                                        <h4>
                                            Mason Logan
                                        </h4>
                                        <span class="d-block">
                                            Manager at Business
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="feedback_item position-relative z-1">
                                <p>
                                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam, et quasi architecto beatae vitae. Sed ut perspiciatis unde omnis iste natus error sit volupta tem accusantium doloremque laudantium eaqu psa quae ab illo inventore veritatis.
                                </p>
                                <div class="reviewer d-flex align-items-center">
                                    <img src="<?php echo get_template_directory_uri();?>/assets/images/users/user2.jpg" alt="user">
                                    <div>
                                        <h4>
                                            Aelira Evangelle
                                        </h4>
                                        <span class="d-block">
                                            Developer at Marketing
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }
    }
$widgets_manager->register(new axero_feedback_area());