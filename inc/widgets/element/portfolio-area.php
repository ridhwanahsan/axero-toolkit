<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_portfolio_area extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_portfolio_area';
        }

        public function get_title()
        {
            return __('Portfolio Area', 'axero-toolkit');
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
                <div class="portfolio_area ptb_150 position-relative z-1">
                    <div class="container-fluid max_w_1560px">
                        <div class="section_title position-relative style_three text_animation">
                            <div class="row align-items-end">
                                <div class="col-lg-7">
                                    <div class="title position-relative d-inline-block">
                                        <h2 class="mb-0 fw-black text-uppercase">
                                            Our Portfolio
                                        </h2>
                                        <img src="<?php echo get_template_directory_uri()?>/assets/images/icons/vector.svg" alt="vector">
                                    </div>
                                    <p>
                                        We believe that the surest measure of success is when a client partners with us more than half our clients stay with us for longer than a single project.
                                    </p>
                                </div>
                                <div class="col-lg-5 text-lg-end">
                                    <a href="portfolio.html" class="btn black_btn style_two with_border">
                                        <span class="d-inline-block position-relative">
                                            View All Works <i class="ti ti-arrow-up-right"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center" data-cues="slideInUp" data-group="portfolio_list">
                            <div class="col-lg-6">
                                <div class="portfolio_image text-center">
                                    <img src="<?php echo get_template_directory_uri()?>/assets/images/portfolio/portfolio1.jpg" alt="portfolio">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="load_more_items_list">
                                    <div class="item position-relative z-1 d-flex align-items-center justify-content-between">
                                        <h3 class="mb-0">
                                            Creative Process
                                        </h3>
                                        <span class="category d-inline-block">
                                            App Design
                                        </span>
                                        <div class="image">
                                            <img src="<?php echo get_template_directory_uri()?>/assets/images/portfolio/portfolio2.jpg" alt="portfolio2">
                                        </div>
                                        <a href="portfolio-details.html" class="position-absolute z-1 start-0 end-0 top-0 bottom-0"></a>
                                    </div>
                                    <div class="item position-relative z-1 d-flex align-items-center justify-content-between">
                                        <h3 class="mb-0">
                                            Growth Story
                                        </h3>
                                        <span class="category d-inline-block">
                                            Web Design
                                        </span>
                                        <div class="image">
                                            <img src="<?php echo get_template_directory_uri()?>/assets/images/portfolio/portfolio3.jpg" alt="portfolio3">
                                        </div>
                                        <a href="portfolio-details.html" class="position-absolute z-1 start-0 end-0 top-0 bottom-0"></a>
                                    </div>
                                    <div class="item position-relative z-1 d-flex align-items-center justify-content-between">
                                        <h3 class="mb-0">
                                            Saas App
                                        </h3>
                                        <span class="category d-inline-block">
                                            App Design
                                        </span>
                                        <div class="image">
                                            <img src="<?php echo get_template_directory_uri()?>/assets/images/portfolio/portfolio4.jpg" alt="portfolio4">
                                        </div>
                                        <a href="portfolio-details.html" class="position-absolute z-1 start-0 end-0 top-0 bottom-0"></a>
                                    </div>
                                    <div class="item position-relative z-1 d-flex align-items-center justify-content-between">
                                        <h3 class="mb-0">
                                            Fintech Web
                                        </h3>
                                        <span class="category d-inline-block">
                                            Web App Design
                                        </span>
                                        <div class="image">
                                            <img src="<?php echo get_template_directory_uri()?>/assets/images/portfolio/portfolio5.jpg" alt="portfolio5">
                                        </div>
                                        <a href="portfolio-details.html" class="position-absolute z-1 start-0 end-0 top-0 bottom-0"></a>
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
$widgets_manager->register(new axero_portfolio_area());