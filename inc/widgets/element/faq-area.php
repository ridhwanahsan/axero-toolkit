<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_faq_area extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_faq_area';
        }

        public function get_title()
        {
            return __('FAQ Area', 'axero-toolkit');
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
                <div class="faq_area bg_image">
                    <div class="white_top_rectangle"></div>
                    <div class="container ptb_150">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="faq_content">
                                     <div class="sub_title d-inline-block text-white">
                                    <span class="d-flex align-items-center text-uppercase">
                                        FAQ
                                        <img src="<?php echo get_template_directory_uri();?>/assets/images/icons/white_arrow_long_right.svg" alt="white_arrow_long_right">
                                    </span>
                                    </div>
                                    <h2 class="text-white text_animation">
                                        Have Questions? We’ve got Answers
                                    </h2>
                                    <div class="accordion" id="faqAccordion" data-cues="slideInUp" data-group="faq_content">
                                        <div class="accordion-item rounded-0 bg-transparent">
                                            <button class="accordion-button d-block text-start p-0 fw-semibold bg-transparent shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                What is the difference between SEO and PPC?
                                            </button>
                                            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                                <div class="accordion-body px-0 pb-0">
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidid unt ut labo magna.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item rounded-0 bg-transparent">
                                            <button class="accordion-button d-block text-start p-0 fw-semibold bg-transparent shadow-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                What is included in your SEO services?
                                            </button>
                                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                                <div class="accordion-body px-0 pb-0">
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidid unt ut labo magna.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item rounded-0 bg-transparent">
                                            <button class="accordion-button d-block text-start p-0 fw-semibold bg-transparent shadow-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                Do you provide support after the campaign ends?
                                            </button>
                                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                                <div class="accordion-body px-0 pb-0">
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidid unt ut labo magna.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="faq_image position-relative z-1" data-cue="slideInUp">
                                    <img src="<?php echo get_template_directory_uri();?>/assets/images/faq.jpg" alt="faq-image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="white_bottom_rectangle"></div>
                </div>
            <?php
        }
    }
$widgets_manager->register(new axero_faq_area());