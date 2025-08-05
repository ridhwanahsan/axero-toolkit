<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_team_details_area extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_team_details_area';
        }

        public function get_title()
        {
            return __('Team Details', 'axero-toolkit');
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
                <div class="team_details_area pt_150">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="team_details_img">
                                    <img src="<?php echo get_template_directory_uri()?>/assets/images/team/team11.jpg" alt="team1">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="team_details_content">
                                    <h3 class="text_animation">
                                        Megan Wilson
                                    </h3>
                                    <span class="designation fw-medium d-block">
                                        Co-founder
                                    </span>
                                    <div class="socials d-flex align-items-center">
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
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry ipsum has been the industry's standard dummy 1500s, when an unknown print er took a galley  make a type specimen book.
                                    </p>
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry ipsum has been the industry's standard dummy 1500s, when an unknown print er took a galley  make a type specimen book.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="team_details_desc">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="skills_details">
                                        <h3 class="text_animation">
                                            Professional Skills
                                        </h3>
                                        <div class="item">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <span class="d-block fw-medium">
                                                    Problem solving skills
                                                </span>
                                                <span class="d-block fw-bold">
                                                    90%
                                                </span>
                                            </div>
                                            <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar" style="width: 90%"></div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <span class="d-block fw-medium">
                                                    Networking skills
                                                </span>
                                                <span class="d-block fw-bold">
                                                    80%
                                                </span>
                                            </div>
                                            <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar" style="width: 80%"></div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <span class="d-block fw-medium">
                                                    Leadership skills
                                                </span>
                                                <span class="d-block fw-bold">
                                                    95%
                                                </span>
                                            </div>
                                            <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar" style="width: 95%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="qualifications_details">
                                        <h3 class="text_animation">
                                            Qualifications
                                        </h3>
                                        <ul class="list-unstyled mb-0 p-0">
                                            <li class="position-relative">
                                                A bachelor's degree in design (or related field) or equivalent professional experience.‍
                                            </li>
                                            <li class="position-relative">
                                                Proficiency in a variety of design tools such as Figma, Photoshop, Illustrator, and Sketch.
                                            </li>
                                            <li class="position-relative">
                                                The ability to scope and estimate efforts accurately and prioritize tasks and goals independently.
                                            </li>
                                            <li class="position-relative">
                                                Excellent interpersonal skills.
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }
    }
$widgets_manager->register(new axero_team_details_area());