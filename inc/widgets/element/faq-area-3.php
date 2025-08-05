<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_faq_area_3 extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_faq_area_3';
        }

        public function get_title()
        {
            return __('FAQ Area 3', 'axero-toolkit');
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
                <div class="faq_area pt_150">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="faq_content">
                                    <div class="accordion style_two mt-0" id="faqAccordion" data-cues="slideInUp" data-group="faq_content">
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
                                        <div class="accordion-item rounded-0 bg-transparent">
                                            <button class="accordion-button d-block text-start p-0 fw-semibold bg-transparent shadow-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                What industries do you specialize in?
                                            </button>
                                            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                                <div class="accordion-body px-0 pb-0">
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidid unt ut labo magna.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item rounded-0 bg-transparent">
                                            <button class="accordion-button d-block text-start p-0 fw-semibold bg-transparent shadow-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                Can you handle both small and large businesses?
                                            </button>
                                            <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                                <div class="accordion-body px-0 pb-0">
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidid unt ut labo magna.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item rounded-0 bg-transparent">
                                            <button class="accordion-button d-block text-start p-0 fw-semibold bg-transparent shadow-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                Do you offer customized marketing strategies for each client?
                                            </button>
                                            <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                                <div class="accordion-body px-0 pb-0">
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidid unt ut labo magna.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item rounded-0 bg-transparent">
                                            <button class="accordion-button d-block text-start p-0 fw-semibold bg-transparent shadow-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                                What kind of keyword research do you perform?
                                            </button>
                                            <div id="collapseSeven" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
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
                                    <img src="<?php echo get_template_directory_uri()?>/assets/images/faq.jpg" alt="faq-image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }
    }
$widgets_manager->register(new axero_faq_area_3());