<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_funfacts_area extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_funfacts_area';
        }

        public function get_title()
        {
            return __('Funfacts Area', 'axero-toolkit');
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
                <div class="funfacts_area_two pb_125">
                    <div class="container-fluid max_w_1560px">
                        <div class="row" data-cues="slideInUp" data-group="funfacts_list">
                            <div class="col-sm-6">
                                <div class="funfact_item">
                                    <div class="number lh-1 fw-black">
                                        <span class="counter_number">50</span>+
                                    </div>
                                    <div class="title text-lg-end text-uppercase fw-semibold">
                                        Projects Completed
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="funfact_item">
                                    <div class="number lh-1 fw-black">
                                        <span class="counter_number">90</span>+
                                    </div>
                                    <div class="title text-lg-end text-uppercase fw-semibold">
                                        CREATIVE MINDS
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="funfact_item">
                                    <div class="number lh-1 fw-black">
                                        <span class="counter_number">20</span>+
                                    </div>
                                    <div class="title text-lg-end text-uppercase fw-semibold">
                                        YEARS OF EXPERIENCE
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="funfact_item">
                                    <div class="number lh-1 fw-black">
                                        <span class="counter_number">30</span>+
                                    </div>
                                    <div class="title text-lg-end text-uppercase fw-semibold">
                                        AWWARDS & RECOGNITION
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
                }
           

    $widgets_manager->register(new axero_funfacts_area());