<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_clients_area extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_clients_area';
        }

        public function get_title()
        {
            return __('Clients Area', 'axero-toolkit');
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
                <div class="clients_area ptb_150">
                    <div class="container-fluid max_w_1560px">
                        <span class="sub_title text-white d-block text-uppercase fw-medium text_animation">
                            Our clients
                        </span>
                        <div class="partners_slides owl-carousel owl-theme" data-cue="slideInUp">
                            <div class="partner_item text-center">
                                <img src="<?php echo get_template_directory_uri()?>/assets/images/partners/partner1.svg" alt="partner1">
                            </div>
                            <div class="partner_item text-center">
                                <img src="<?php echo get_template_directory_uri()?>/assets/images/partners/partner2.svg" alt="partner2">
                            </div>
                            <div class="partner_item text-center">
                                <img src="<?php echo get_template_directory_uri()?>/assets/images/partners/partner3.svg" alt="partner3">
                            </div>
                            <div class="partner_item text-center">
                                <img src="<?php echo get_template_directory_uri()?>/assets/images/partners/partner4.svg" alt="partner4">
                            </div>
                            <div class="partner_item text-center">
                                <img src="<?php echo get_template_directory_uri()?>/assets/images/partners/partner5.svg" alt="partner5">
                            </div>
                            <div class="partner_item text-center">
                                <img src="<?php echo get_template_directory_uri()?>/assets/images/partners/partner1.svg" alt="partner1">
                            </div>
                            <div class="partner_item text-center">
                                <img src="<?php echo get_template_directory_uri()?>/assets/images/partners/partner2.svg" alt="partner2">
                            </div>
                            <div class="partner_item text-center">
                                <img src="<?php echo get_template_directory_uri()?>/assets/images/partners/partner3.svg" alt="partner3">
                            </div>
                            <div class="partner_item text-center">
                                <img src="<?php echo get_template_directory_uri()?>/assets/images/partners/partner4.svg" alt="partner4">
                            </div>
                            <div class="partner_item text-center">
                                <img src="<?php echo get_template_directory_uri()?>/assets/images/partners/partner5.svg" alt="partner5">
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }
    }
           
$widgets_manager->register(new axero_clients_area());