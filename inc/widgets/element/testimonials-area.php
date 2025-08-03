<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_testimonials_area extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_testimonials_area';
        }

        public function get_title()
        {
            return __('Testimonials Area', 'axero-toolkit');
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
                <div class="testimonials_area pt_150 position-relative z-1">
                    <div class="container-fluid max_w_1560px">
                        <div class="section_title position-relative style_three text_animation">
                            <div class="row align-items-end">
                                <div class="col-lg-7">
                                    <div class="title position-relative d-inline-block">
                                        <h2 class="mb-0 fw-black text-uppercase">
                                            Testimonials
                                        </h2>
                                        <img src="<?php echo get_template_directory_uri()?>/assets/images/icons/vector.svg" alt="vector">
                                    </div>
                                    <p>
                                        We believe that the surest measure of success is when a client partners with us more than half our clients stay with us for longer than a single project.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid px-0">
                        <div class="testimonials_slides owl-carousel owl-theme" data-cue="slideInUp">
                            <div class="testimonial_item">
                                <div class="ratings d-flex align-items-center">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                </div>
                                <p>
                                    “Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas.”
                                </p>
                                <div class="reviewer d-flex align-items-center">
                                    <img src="<?php echo get_template_directory_uri()?>/assets/images/users/user1.jpg" alt="user">
                                    <div>
                                        <h4>
                                            Mason Logan
                                        </h4>
                                        <span class="d-block">
                                            Manager at Business
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial_item">
                                <div class="ratings d-flex align-items-center">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                </div>
                                <p>
                                    “Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas.”
                                </p>
                                <div class="reviewer d-flex align-items-center">
                                    <img src="<?php echo get_template_directory_uri()?>/assets/images/users/user2.jpg" alt="user">
                                    <div>
                                        <h4>
                                            Aelira Evangelle
                                        </h4>
                                        <span class="d-block">
                                            Developer at Marketing
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial_item">
                                <div class="ratings d-flex align-items-center">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                </div>
                                <p>
                                    “Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas.”
                                </p>
                                <div class="reviewer d-flex align-items-center">
                                    <img src="<?php echo get_template_directory_uri()?>/assets/images/users/user1.jpg" alt="user">
                                    <div>
                                        <h4>
                                            Mason Logan
                                        </h4>
                                        <span class="d-block">
                                            Manager at Business
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial_item">
                                <div class="ratings d-flex align-items-center">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                </div>
                                <p>
                                    “Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas.”
                                </p>
                                <div class="reviewer d-flex align-items-center">
                                    <img src="<?php echo get_template_directory_uri()?>/assets/images/users/user2.jpg" alt="user">
                                    <div>
                                        <h4>
                                            Aelira Evangelle
                                        </h4>
                                        <span class="d-block">
                                            Developer at Marketing
                                        </span>
                                    </div>
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
$widgets_manager->register(new axero_testimonials_area());