<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_case_studies extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_case_studies';
        }

        public function get_title()
        {
            return __('Case Studies', 'axero-toolkit');
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
                <div class="case_studies_area pb_150">
                    <div class="container">
                        <div class="section_title style_two text_animation">
                            <div class="sub_title d-inline-block">
                                <span class="d-flex align-items-center text-uppercase">
                                    Our Case Study
                                    <img src="<?php echo get_template_directory_uri();?>/assets/images/icons/arrow_long_right.svg" alt="arrow_long_right">
                                </span>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-lg-7">
                                    <h2 class="mb-0">
                                        Highlights from Our Most Recent Projects
                                    </h2>
                                </div>
                                <div class="col-lg-5">
                                    <p>
                                        Our agency powers growth and success in the fast-paced digital marketing space. Let’s turn your vision into reality.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid px-0">
                        <div class="case_studies_slides owl-carousel owl-theme" data-cue="slideInUp">
                            <div class="case_study_box">
                                <div class="image overflow-hidden position-relative">
                                    <img src="<?php echo get_template_directory_uri();?>/assets/images/case_studies/case_study1.jpg" alt="case-study">
                                    <a href="portfolio-details.html" class="details_link_btn">
                                        <i class="ti ti-arrow-up-right"></i>
                                    </a>
                                </div>
                                <div class="content">
                                    <span class="sub_title d-inline-block">
                                        Social
                                    </span>
                                    <h3 class="mb-0">
                                        <a href="portfolio-details.html">
                                            Social Media Solutions Tailored for Axero
                                        </a>
                                    </h3>
                                </div>
                            </div>
                            <div class="case_study_box">
                                <div class="image overflow-hidden position-relative">
                                    <img src="<?php echo get_template_directory_uri();?>/assets/images/case_studies/case_study2.jpg" alt="case-study">
                                    <a href="portfolio-details.html" class="details_link_btn">
                                        <i class="ti ti-arrow-up-right"></i>
                                    </a>
                                </div>
                                <div class="content">
                                    <span class="sub_title d-inline-block">
                                        Axero
                                    </span>
                                    <h3 class="mb-0">
                                        <a href="portfolio-details.html">
                                            How We Boosted Online Sales by 150% with Axero
                                        </a>
                                    </h3>
                                </div>
                            </div>
                            <div class="case_study_box">
                                <div class="image overflow-hidden position-relative">
                                    <img src="<?php echo get_template_directory_uri();?>/assets/images/case_studies/case_study3.jpg" alt="case-study">
                                    <a href="portfolio-details.html" class="details_link_btn">
                                        <i class="ti ti-arrow-up-right"></i>
                                    </a>
                                </div>
                                <div class="content">
                                    <span class="sub_title d-inline-block">
                                        Marketing
                                    </span>
                                    <h3 class="mb-0">
                                        <a href="portfolio-details.html">
                                            Email Marketing Strategies for eCommerce Success
                                        </a>
                                    </h3>
                                </div>
                            </div>
                            <div class="case_study_box">
                                <div class="image overflow-hidden position-relative">
                                    <img src="<?php echo get_template_directory_uri();?>/assets/images/case_studies/case_study4.jpg" alt="case-study">
                                    <a href="portfolio-details.html" class="details_link_btn">
                                        <i class="ti ti-arrow-up-right"></i>
                                    </a>
                                </div>
                                <div class="content">
                                    <span class="sub_title d-inline-block">
                                        SaaS
                                    </span>
                                    <h3 class="mb-0">
                                        <a href="portfolio-details.html">
                                            Global Fintech SaaS Ads Campaign Strategy
                                        </a>
                                    </h3>
                                </div>
                            </div>
                            <div class="case_study_box">
                                <div class="image overflow-hidden position-relative">
                                    <img src="<?php echo get_template_directory_uri();?>/assets/images/case_studies/case_study5.jpg" alt="case-study">
                                    <a href="portfolio-details.html" class="details_link_btn">
                                        <i class="ti ti-arrow-up-right"></i>
                                    </a>
                                </div>
                                <div class="content">
                                    <span class="sub_title d-inline-block">
                                        Marketing
                                    </span>
                                    <h3 class="mb-0">
                                        <a href="portfolio-details.html">
                                            Fueling Growth Through Marketing for Axero
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }
    }
$widgets_manager->register(new axero_case_studies());