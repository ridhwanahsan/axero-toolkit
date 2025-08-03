<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_reviews_area extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_reviews_area';
        }

        public function get_title()
        {
            return __('Reviews Area', 'axero-toolkit');
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
                <div class="reviews_area position-relative z-1">
                    <div class="container-fluid max_w_1560px">
                        <div class="section_title style_four position-relative justify-content-md-end">
                            <h2 class="mb-0 text-white text-uppercase fw-semibold order-md-2 text_animation">
                                Our Reviews
                            </h2>
                            <img src="<?php echo get_template_directory_uri()?>/assets/images/icons/left_down_arrow.svg" class="order-md-1" alt="left_down_arrow">
                        </div>
                        <div class="total_reviews lh-1 d-flex align-items-center" data-cue="slideInUp">
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <span class="block text-white fw-semibold">
                                Based on +300 Reviews
                            </span>
                        </div>
                        <div class="reviews_slides owl-carousel owl-theme" data-cue="slideInUp">
                            <div class="review_item">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="content">
                                            <img src="<?php echo get_template_directory_uri()?>/assets/images/white_logo.svg" alt="white_logo">
                                            <p>
                                                We are a full-service digital agency that empowers businesses to achieve their online goals. We are passion ate about helping our clients succeed in the ever-evolving digital landscape.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="image">
                                            <img src="<?php echo get_template_directory_uri()?>/assets/images/reviews/review1.jpg" alt="review1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="review_item">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="content">
                                            <img src="<?php echo get_template_directory_uri()?>/assets/images/white_logo.svg" alt="white_logo">
                                            <p>
                                                We are a full-service digital agency dedicated to helping businesses achieve their online goals. With a passion for driving success, we empower our clients to thrive in the ever-changing digital landscape.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="image">
                                            <img src="<?php echo get_template_directory_uri()?>/assets/images/reviews/review2.jpg" alt="review2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="object7">
                        <img src="<?php echo get_template_directory_uri()?>/assets/images/objects/object7.png" alt="object7">
                    </div>
                </div>
            <?php
        }
    }
$widgets_manager->register(new axero_reviews_area());