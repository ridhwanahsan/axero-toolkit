<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_team_area_2 extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_team_area_2';
        }

        public function get_title()
        {
            return __('Team Area 2', 'axero-toolkit');
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
                 <div class="team_area_two pb_150 position-relative z-1">
                    <div class="container-fluid max_w_1560px">
                        <div class="section_title position-relative style_three right_side text_animation">
                            <div class="row align-items-end">
                                <div class="col-lg-7 order-1 order-lg-2 text-md-end">
                                    <div class="title position-relative d-inline-block">
                                        <h2 class="mb-0 fw-black text-uppercase">
                                            Our Team
                                        </h2>
                                        <img src="<?php echo get_template_directory_uri()?>/assets/images/icons/vector.svg" alt="vector">
                                    </div>
                                    <p>
                                        We believe that the surest measure of success is when a client partners with us more than half our clients stay with us for longer than a single project.
                                    </p>
                                </div>
                                <div class="col-lg-5 order-2 order-lg-1 text-md-end text-lg-start">
                                    <a href="<?php echo esc_url( home_url( '/team/' ) ); ?>" class="btn black_btn style_two with_border">
                                        <span class="d-inline-block position-relative">
                                            View All Team Member <i class="ti ti-arrow-up-right"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="team_tabs_slides overflow-hidden d-md-flex" data-cues="slideInUp" data-group="team_list">
                            <div
                                class="slide d-flex align-items-end"
                                style="background-image: url(<?php echo get_template_directory_uri()?>/assets/images/team/team6.jpg);"
                            >
                                <div class="team_content">
                                    <h3>
                                        <a href="team-details.html">
                                            Megan Wilson
                                        </a>
                                    </h3>
                                    <span class="d-block">
                                        Founder
                                    </span>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectet adipis cing elit. Fusce varius faucibus massa.
                                    </p>
                                    <div class="socials lh-1 d-flex align-items-center">
                                        <a href="#" target="_blank">
                                            <i class="ti ti-brand-facebook"></i>
                                        </a>
                                        <a href="#" target="_blank">
                                            <i class="ti ti-brand-instagram"></i>
                                        </a>
                                        <a href="#" target="_blank">
                                            <i class="ti ti-brand-x"></i>
                                        </a>
                                        <a href="#" target="_blank">
                                            <i class="ti ti-brand-linkedin"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="slide d-flex align-items-end"
                                style="background-image: url(<?php echo get_template_directory_uri()?>/assets/images/team/team7.jpg);"
                            >
                                <div class="team_content">
                                    <h3>
                                        <a href="team-details.html">
                                            Zylen Orion
                                        </a>
                                    </h3>
                                    <span class="d-block">
                                        Co-founder
                                    </span>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectet adipis cing elit. Fusce varius faucibus massa.
                                    </p>
                                    <div class="socials lh-1 d-flex align-items-center">
                                        <a href="#" target="_blank">
                                            <i class="ti ti-brand-facebook"></i>
                                        </a>
                                        <a href="#" target="_blank">
                                            <i class="ti ti-brand-instagram"></i>
                                        </a>
                                        <a href="#" target="_blank">
                                            <i class="ti ti-brand-x"></i>
                                        </a>
                                        <a href="#" target="_blank">
                                            <i class="ti ti-brand-linkedin"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="slide d-flex align-items-end active"
                                style="background-image: url(<?php echo get_template_directory_uri()?>/assets/images/team/team8.jpg);"
                            >
                                <div class="team_content">
                                    <h3>
                                        <a href="team-details.html">
                                            Sadie Doyle
                                        </a>
                                    </h3>
                                    <span class="d-block">
                                        Project Manager
                                    </span>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectet adipis cing elit. Fusce varius faucibus massa.
                                    </p>
                                    <div class="socials lh-1 d-flex align-items-center">
                                        <a href="#" target="_blank">
                                            <i class="ti ti-brand-facebook"></i>
                                        </a>
                                        <a href="#" target="_blank">
                                            <i class="ti ti-brand-instagram"></i>
                                        </a>
                                        <a href="#" target="_blank">
                                            <i class="ti ti-brand-x"></i>
                                        </a>
                                        <a href="#" target="_blank">
                                            <i class="ti ti-brand-linkedin"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="slide d-flex align-items-end"
                                style="background-image: url(<?php echo get_template_directory_uri()?>/assets/images/team/team9.jpg);"
                            >
                                <div class="team_content">
                                    <h3>
                                        <a href="team-details.html">
                                            Veyron Lorien
                                        </a>
                                    </h3>
                                    <span class="d-block">
                                        Manager
                                    </span>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectet adipis cing elit. Fusce varius faucibus massa.
                                    </p>
                                    <div class="socials lh-1 d-flex align-items-center">
                                        <a href="#" target="_blank">
                                            <i class="ti ti-brand-facebook"></i>
                                        </a>
                                        <a href="#" target="_blank">
                                            <i class="ti ti-brand-instagram"></i>
                                        </a>
                                        <a href="#" target="_blank">
                                            <i class="ti ti-brand-x"></i>
                                        </a>
                                        <a href="#" target="_blank">
                                            <i class="ti ti-brand-linkedin"></i>
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
$widgets_manager->register(new axero_team_area_2());