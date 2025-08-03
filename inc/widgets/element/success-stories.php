<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_success_stories extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_success_stories';
        }

        public function get_title()
        {
            return __('Success Stories', 'axero-toolkit');
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
                <div class="success_stories_area pt_150 pb_125 position-relative z-1">
                    <div class="container-fluid max_w_1560px">
                        <div class="section_title text-center mx-auto text_animation">
                            <h2 class="mb-0 text-uppercase fw-black">
                                Axero's Success Stories
                            </h2>
                        </div>
                        <div class="row justify-content-center" data-cues="slideInUp" data-group="success_stories_list">
                            <div class="col-lg-3 col-sm-6">
                                <div class="success_story_box">
                                    <h3 class="fw-semibold lh-1">
                                        <strong class="counter_number fw-semibold">20</strong>+
                                    </h3>
                                    <span class="d-block">
                                        Award-Winning
                                    </span>
                                    <div class="border-top"></div>
                                    <p>
                                        There are many variations of pas but the in some form.
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="success_story_box">
                                    <h3 class="fw-semibold lh-1">
                                        <strong class="counter_number fw-semibold">80</strong>%
                                    </h3>
                                    <span class="d-block">
                                        Business Growth
                                    </span>
                                    <div class="border-top"></div>
                                    <p>
                                        There are many variations of pas but the in some form.
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="success_story_box">
                                    <h3 class="fw-semibold lh-1">
                                        <strong class="counter_number fw-semibold">10</strong>k+
                                    </h3>
                                    <span class="d-block">
                                        Project Completed
                                    </span>
                                    <div class="border-top"></div>
                                    <p>
                                        There are many variations of pas but the in some form.
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="success_story_box">
                                    <h3 class="fw-semibold lh-1">
                                        <strong class="counter_number fw-semibold">8</strong>k+
                                    </h3>
                                    <span class="d-block">
                                        Happy Clients
                                    </span>
                                    <div class="border-top"></div>
                                    <p>
                                        There are many variations of pas but the in some form.
                                    </p>
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
$widgets_manager->register(new axero_success_stories());