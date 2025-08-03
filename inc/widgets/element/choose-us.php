<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_choose_us extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_choose_us';
        }

        public function get_title()
        {
            return __('Choose Us', 'axero-toolkit');
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
                <div class="funfacts_why_choose_us_area">
                    <div class="white_top_rectangle"></div>
                    <!-- Funfacts -->
                    <div class="funfacts_area pt_150 pb_125">
                        <div class="container">
                            <div class="row" data-cues="slideInUp" data-group="funfacts_list">
                                <div class="col-sm-6">
                                    <div class="funfact_box">
                                        <div class="number lh-1 fw-bold text-white">
                                            <span class="counter_number">25</span>+
                                        </div>
                                        <div class="quote text-white fw-medium lh-1">
                                            //
                                        </div>
                                        <div class="title text-lg-end text-uppercase text-white fw-medium">
                                            Awards & Recognitions
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="funfact_box">
                                        <div class="number lh-1 fw-bold text-white">
                                            <span class="counter_number">98</span>%
                                        </div>
                                        <div class="quote text-white fw-medium lh-1">
                                            //
                                        </div>
                                        <div class="title text-lg-end text-uppercase text-white fw-medium">
                                            Clients Satisfaction
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="funfact_box">
                                        <div class="number lh-1 fw-bold text-white">
                                            <span class="counter_number">15</span>+
                                        </div>
                                        <div class="quote text-white fw-medium lh-1">
                                            //
                                        </div>
                                        <div class="title text-lg-end text-uppercase text-white fw-medium">
                                            Years of experience in particular field
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="funfact_box">
                                        <div class="number lh-1 fw-bold text-white">
                                            <span class="counter_number">12</span>K
                                        </div>
                                        <div class="quote text-white fw-medium lh-1">
                                            //
                                        </div>
                                        <div class="title text-lg-end text-uppercase text-white fw-medium">
                                            Cases overseen
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Funfacts -->
                    
                    <!-- Why Choose Us Area -->
                    <div class="why_choose_us_area pb_150">
                        <div class="container">
                            <div class="section_title white_color style_two text_animation">
                                <div class="sub_title d-inline-block">
                                    <span class="d-flex align-items-center text-uppercase">
                                        Why Choose Us
                                        <img src="<?php echo get_template_directory_uri();?>/assets/images/icons/white_arrow_long_right.svg" alt="white_arrow_long_right">
                                    </span>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-lg-7">
                                        <h2 class="mb-0">
                                            Effective Marketing at a Price You Can Afford
                                        </h2>
                                    </div>
                                    <div class="col-lg-5">
                                        <p>
                                            Our agency powers growth and success in the fast-paced digital marketing space. Let’s turn your vision into reality.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="why_choose_us_content">
                                        <div class="accordion" id="whyChooseUsAccordion" data-cues="slideInUp" data-group="why_choose_us_content">
                                            <div class="accordion-item rounded-0 bg-transparent">
                                                <button class="accordion-button d-block text-start p-0 fw-bold bg-transparent shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#wCUCollapseOne" aria-expanded="true" aria-controls="wCUCollapseOne">
                                                    <span>01</span> Expertise Teams
                                                </button>
                                                <div id="wCUCollapseOne" class="accordion-collapse collapse show" data-bs-parent="#whyChooseUsAccordion">
                                                    <div class="accordion-body pb-0">
                                                        <p>
                                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidid unt ut labo magna.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item rounded-0 bg-transparent">
                                                <button class="accordion-button d-block text-start p-0 fw-bold bg-transparent shadow-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#wCUCollapseTwo" aria-expanded="false" aria-controls="wCUCollapseTwo">
                                                    <span>02</span> Tailored Solutions
                                                </button>
                                                <div id="wCUCollapseTwo" class="accordion-collapse collapse" data-bs-parent="#whyChooseUsAccordion">
                                                    <div class="accordion-body pb-0">
                                                        <p>
                                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidid unt ut labo magna.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item rounded-0 bg-transparent">
                                                <button class="accordion-button d-block text-start p-0 fw-bold bg-transparent shadow-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#wCUCollapseThree" aria-expanded="false" aria-controls="wCUCollapseThree">
                                                    <span>03</span> Client Centric Approach
                                                </button>
                                                <div id="wCUCollapseThree" class="accordion-collapse collapse" data-bs-parent="#whyChooseUsAccordion">
                                                    <div class="accordion-body pb-0">
                                                        <p>
                                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidid unt ut labo magna.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item rounded-0 bg-transparent">
                                                <button class="accordion-button d-block text-start p-0 fw-bold bg-transparent shadow-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#wCUCollapseFour" aria-expanded="false" aria-controls="wCUCollapseFour">
                                                    <span>04</span> 24/7 Customer  Support
                                                </button>
                                                <div id="wCUCollapseFour" class="accordion-collapse collapse" data-bs-parent="#whyChooseUsAccordion">
                                                    <div class="accordion-body pb-0">
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
                                    <div class="why_choose_us_image text-center" data-cue="slideInUp">
                                        <img src="<?php echo get_template_directory_uri();?>/assets/images/why_choose_us.jpg" alt="why-choose-us">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Why Choose Us Area -->

                    <div class="white_bottom_rectangle"></div>
                </div>
            <?php
        }
    }
$widgets_manager->register(new axero_choose_us());