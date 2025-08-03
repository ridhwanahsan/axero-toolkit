<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_banner_2 extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_banner_2';
        }

        public function get_title()
        {
            return __('Banner 2', 'axero-toolkit');
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
            $settings = $this->get_settings_for_display();  ?>
                 <div class="axero_banner_area position-relative z-1">
            <div class="container-fluid max_w_1560px">
                <div class="axero_banner_content mx-auto text-center">
                    <span class="sub_title text-white d-block fw-medium text-uppercase" data-cue="slideInDown">
                        Creative team
                    </span>
                    <h1 class="text-uppercase text-white mb-0 text_animation">
                        We’re your marketing expert
                    </h1>
                </div>
                <div class="row align-items-center" data-cues="slideInUp" data-group="hero_banner_content">
                    <div class="col-md-4">
                        <div class="axero_banner_image text-center">
                            <img src="<?php echo get_template_directory_uri()?>/assets/images/banner/hero_banner6.jpg" alt="hero_banner6">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="axero_banner_text">
                            <p>
                                We believe that the surest measure of success is when a client partners with us more than half our clients stay with us for.
                            </p>
                            <a href="#" class="btn secondary_btn style_three">
                                <span class="d-inline-block position-relative">
                                    Get in Touch <i class="ti ti-arrow-up-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="object4">
                <img src="<?php echo get_template_directory_uri()?>/assets/images/objects/object4.png" alt="object4">
            </div>
        </div>
                 
           <?php
        }
    }
$widgets_manager->register(new axero_banner_2());
