<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_partner_logo extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_partner_logo';
        }

        public function get_title()
        {
            return __('Partner Logo', 'axero-toolkit');
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
                <div class="trusted_partner_area">
                    <div class="container">
                        <div class="trusted_partner_inner position-relative">
                            <span class="title1 d-inline-block fw-medium text-uppercase text_animation">
                                Our Trusted Partner
                            </span>
                            <div class="trusted_partner_slides owl-carousel owl-theme">
                                <div class="text-center">
                                    <img src="<?php echo get_template_directory_uri();?>/assets/images/partners/partner1.svg" class="d-inline-block w-auto" alt="partner">
                                </div>
                                <div class="text-center">
                                    <img src="<?php echo get_template_directory_uri();?>/assets/images/partners/partner2.svg" class="d-inline-block w-auto" alt="partner">
                                </div>
                                <div class="text-center">
                                    <img src="<?php echo get_template_directory_uri();?>/assets/images/partners/partner3.svg" class="d-inline-block w-auto" alt="partner">
                                </div>
                                <div class="text-center">
                                    <img src="<?php echo get_template_directory_uri();?>/assets/images/partners/partner4.svg" class="d-inline-block w-auto" alt="partner">
                                </div>
                                <div class="text-center">
                                    <img src="<?php echo get_template_directory_uri();?>/assets/images/partners/partner5.svg" class="d-inline-block w-auto" alt="partner">
                                </div>
                                <div class="text-center">
                                    <img src="<?php echo get_template_directory_uri();?>/assets/images/partners/partner6.svg" class="d-inline-block w-auto" alt="partner">
                                </div>
                            </div>
                            <span class="title2 d-inline-block fw-medium text-uppercase text_animation">
                                Almost 20+ Partner we have
                            </span>
                        </div>
                    </div>
                </div>
            <?php
        }
    }
$widgets_manager->register(new axero_partner_logo());