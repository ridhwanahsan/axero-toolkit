<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_team_area extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_team_area';
        }

        public function get_title()
        {
            return __('Team Area', 'axero-toolkit');
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
                <div class="team_area pt_150">
                    <div class="container">
                        <div class="section_title text-center mx-auto text_animation">
                            <div class="sub_title d-inline-block">
                                <span class="d-flex align-items-center text-uppercase">
                                    Marketing Agency People
                                    <img src="<?php echo get_template_directory_uri();?>/assets/images/icons/arrow_long_right.svg" alt="arrow_long_right">
                                </span>
                            </div>
                            <h2 class="mb-0">
                                Leading Digital Minds Working for Your Success
                            </h2>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row align-items-center justify-content-center" data-cues="slideInUp" data-group="team_list">
                            <div class="col-lg-4 col-sm-6">
                                <div class="team_member position-relative">
                                    <img src="<?php echo get_template_directory_uri();?>/assets/images/team/team1.jpg" alt="team">
                                    <div class="content">
                                        <span class="d-block text-white">
                                            Founder
                                        </span>
                                        <h3 class="mb-0 text-white">
                                            <a href="team-details.html">
                                                Megan Wilson
                                            </a>
                                        </h3>
                                    </div>
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
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="team_member position-relative">
                                                    <img src="<?php echo get_template_directory_uri();?>/assets/images/team/team2.jpg" alt="team">
                                                    <div class="content">
                                                        <span class="d-block text-white">
                                                            Co-founder
                                                        </span>
                                                        <h3 class="mb-0 text-white">
                                                            <a href="team-details.html">
                                                                Zylen Orion
                                                            </a>
                                                        </h3>
                                                    </div>
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
                                            <div class="col-lg-12">
                                                <div class="team_member position-relative">
                                                    <img src="<?php echo get_template_directory_uri();?>/assets/images/team/team3.jpg" alt="team">
                                                    <div class="content">
                                                        <span class="d-block text-white">
                                                            Manager
                                                        </span>
                                                        <h3 class="mb-0 text-white">
                                                            <a href="team-details.html">
                                                                Veyron Lorien
                                                            </a>
                                                        </h3>
                                                    </div>
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
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="team_member position-relative">
                                                    <img src="<?php echo get_template_directory_uri();?>/assets/images/team/team4.jpg" alt="team">
                                                    <div class="content">
                                                        <span class="d-block text-white">
                                                            Web Developer
                                                        </span>
                                                        <h3 class="mb-0 text-white">
                                                            <a href="team-details.html">
                                                                Nyxelle Daxel
                                                            </a>
                                                        </h3>
                                                    </div>
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
                                            <div class="col-lg-12">
                                                <div class="team_member position-relative">
                                                    <img src="<?php echo get_template_directory_uri();?>/assets/images/team/team5.jpg" alt="team">
                                                    <div class="content">
                                                        <span class="d-block text-white">
                                                            Web Designer
                                                        </span>
                                                        <h3 class="mb-0 text-white">
                                                            <a href="team-details.html">
                                                                Serenya Fenrir
                                                            </a>
                                                        </h3>
                                                    </div>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }
    }
$widgets_manager->register(new axero_team_area());