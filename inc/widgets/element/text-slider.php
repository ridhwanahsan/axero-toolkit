<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_text_slider_2 extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_text_slider_2';
        }

        public function get_title()
        {
            return __('Text Slide 2', 'axero-toolkit');
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
                 <div class="text_slider_area overflow-hidden">
                    <div class="container-fluid px-0" data-cue="slideInUp">
                        <div class="scroll_text_marquee d-flex align-items-center justify-content-center">
                            <h3 class="mb-0 text-uppercase fw-semibold lh-1">
                                HOW IT WORKS
                            </h3>
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/icons/bolt.svg" class="w-auto d-inline-block" alt="bolt">
                            <h3 class="mb-0 text-uppercase fw-semibold lh-1">
                                DOCUMENTATION
                            </h3>
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/icons/bolt.svg" class="w-auto d-inline-block" alt="bolt">
                            <h3 class="mb-0 text-uppercase fw-semibold lh-1">
                                JOIN THE COMMUNITY
                            </h3>
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/icons/bolt.svg" class="w-auto d-inline-block" alt="bolt">
                            <h3 class="mb-0 text-uppercase fw-semibold lh-1">
                                IDEAS INTO REALITY
                            </h3>
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/icons/bolt.svg" class="w-auto d-inline-block" alt="bolt">
                            <h3 class="mb-0 text-uppercase fw-semibold lh-1">
                                HOW IT WORKS
                            </h3>
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/icons/bolt.svg" class="w-auto d-inline-block" alt="bolt">
                            <h3 class="mb-0 text-uppercase fw-semibold lh-1">
                                DOCUMENTATION
                            </h3>
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/icons/bolt.svg" class="w-auto d-inline-block" alt="bolt">
                            <h3 class="mb-0 text-uppercase fw-semibold lh-1">
                                JOIN THE COMMUNITY
                            </h3>
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/icons/bolt.svg" class="w-auto d-inline-block" alt="bolt">
                            <h3 class="mb-0 text-uppercase fw-semibold lh-1">
                                IDEAS INTO REALITY
                            </h3>
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/icons/bolt.svg" class="w-auto d-inline-block" alt="bolt">
                            <h3 class="mb-0 text-uppercase fw-semibold lh-1">
                                HOW IT WORKS
                            </h3>
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/icons/bolt.svg" class="w-auto d-inline-block" alt="bolt">
                            <h3 class="mb-0 text-uppercase fw-semibold lh-1">
                                DOCUMENTATION
                            </h3>
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/icons/bolt.svg" class="w-auto d-inline-block" alt="bolt">
                            <h3 class="mb-0 text-uppercase fw-semibold lh-1">
                                JOIN THE COMMUNITY
                            </h3>
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/icons/bolt.svg" class="w-auto d-inline-block" alt="bolt">
                            <h3 class="mb-0 text-uppercase fw-semibold lh-1">
                                HOW IT WORKS
                            </h3>
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/icons/bolt.svg" class="w-auto d-inline-block" alt="bolt">
                            <h3 class="mb-0 text-uppercase fw-semibold lh-1">
                                DOCUMENTATION
                            </h3>
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/icons/bolt.svg" class="w-auto d-inline-block" alt="bolt">
                            <h3 class="mb-0 text-uppercase fw-semibold lh-1">
                                JOIN THE COMMUNITY
                            </h3>
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/icons/bolt.svg" class="w-auto d-inline-block" alt="bolt">
                        </div>
                    </div>
                </div>
            <?php
        }
    }
$widgets_manager->register(new axero_text_slider_2());