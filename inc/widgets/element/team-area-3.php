<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_team_area_3 extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_team_area_3';
        }

        public function get_title()
        {
            return __('Team Area 3', 'axero-toolkit');
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
                <div class="team_area ptb_150">
                    <div class="container-fluid max_w_1560px">
                        <div class="section_title style_four position-relative">
                            <h2 class="mb-0 text-white text-uppercase fw-semibold text_animation">
                                Meet the team
                            </h2>
                            <img src="<?php echo get_template_directory_uri()?>/assets/images/icons/right_down_arrow.svg" alt="right_down_arrow">
                        </div>
                        <div class="team_members_content text-center" data-cue="slideInUp">
                            <img src="<?php echo get_template_directory_uri()?>/assets/images/team/team_members.png" alt="team_members">
                            <div class="content text-start d-md-flex align-items-center justify-content-between">
                                <p class="mb-0">
                                    We are a full-service digital agency that empowers businesses to achieve their online goals. We are passionate about helping our clients succeed in the ever-evolving digital landscape. Our mission is to provide our clients with high-quality, results-driven digital marketing solutions that help them grow their businesses and achieve their desired outcomes
                                </p>
                                <a href="team.html" class="btn secondary_btn style_three">
                                    <span class="d-inline-block position-relative">
                                        Meet the Team <i class="ti ti-arrow-up-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }
    }
$widgets_manager->register(new axero_team_area_3());