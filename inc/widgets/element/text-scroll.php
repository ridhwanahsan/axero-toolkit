<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_text_scroll extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_text_scroll';
        }

        public function get_title()
        {
            return __('Text Scroll', 'axero-toolkit');
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
                <div class="text_scroll_area ptb_150 overflow-hidden">
                    <div class="container-fluid px-0">
                        <div class="scroll_text_marquee d-flex align-items-center justify-content-center">
                            <h3 class="mb-0 text-white text-uppercase fw-black lh-1">
                                IDEAS INTO REALITY
                            </h3>
                            <div class="bar"></div>
                            <h3 class="mb-0 text-white text-uppercase fw-black lh-1">
                                HOW IT WORKS
                            </h3>
                            <div class="bar"></div>
                            <h3 class="mb-0 text-white text-uppercase fw-black lh-1">
                                IDEAS INTO REALITY
                            </h3>
                            <div class="bar"></div>
                            <h3 class="mb-0 text-white text-uppercase fw-black lh-1">
                                HOW IT WORKS
                            </h3>
                            <div class="bar"></div>
                            <h3 class="mb-0 text-white text-uppercase fw-black lh-1">
                                IDEAS INTO REALITY
                            </h3>
                            <div class="bar"></div>
                            <h3 class="mb-0 text-white text-uppercase fw-black lh-1">
                                HOW IT WORKS
                            </h3>
                            <div class="bar"></div>
                            <h3 class="mb-0 text-white text-uppercase fw-black lh-1">
                                IDEAS INTO REALITY
                            </h3>
                            <div class="bar"></div>
                            <h3 class="mb-0 text-white text-uppercase fw-black lh-1">
                                HOW IT WORKS
                            </h3>
                            <div class="bar"></div>
                        </div>
                        <div class="scroll_text_marquee d-flex align-items-center justify-content-center">
                            <h3 class="mb-0 text-white text-uppercase fw-black lh-1">
                                IDEAS INTO REALITY
                            </h3>
                            <div class="bar"></div>
                            <h3 class="mb-0 text-white text-uppercase fw-black lh-1">
                                HOW IT WORKS
                            </h3>
                            <div class="bar"></div>
                            <h3 class="mb-0 text-white text-uppercase fw-black lh-1">
                                IDEAS INTO REALITY
                            </h3>
                            <div class="bar"></div>
                            <h3 class="mb-0 text-white text-uppercase fw-black lh-1">
                                HOW IT WORKS
                            </h3>
                            <div class="bar"></div>
                            <h3 class="mb-0 text-white text-uppercase fw-black lh-1">
                                IDEAS INTO REALITY
                            </h3>
                            <div class="bar"></div>
                            <h3 class="mb-0 text-white text-uppercase fw-black lh-1">
                                HOW IT WORKS
                            </h3>
                            <div class="bar"></div>
                            <h3 class="mb-0 text-white text-uppercase fw-black lh-1">
                                IDEAS INTO REALITY
                            </h3>
                            <div class="bar"></div>
                            <h3 class="mb-0 text-white text-uppercase fw-black lh-1">
                                HOW IT WORKS
                            </h3>
                            <div class="bar"></div>
                        </div>
                    </div>
                </div>
            <?php
        }
    }
$widgets_manager->register(new axero_text_scroll());