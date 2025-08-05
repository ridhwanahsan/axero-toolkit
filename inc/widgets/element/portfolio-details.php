<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_portfolio_details extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_portfolio_details';
        }

        public function get_title()
        {
            return __('Portfolio Details', 'axero-toolkit');
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
                    <div class="portfolio_details_area pt_150">
                        <div class="container">
                            <div class="portfolio_details_image text-center">
                                <img src="<?php echo get_template_directory_uri()?>/assets/images/portfolio/portfolio_details1.jpg" alt="portfolio_details1">
                            </div>
                            <div class="portfolio_details_info mx-auto">
                                <div class="row">
                                    <div class="col-md-3 col-sm-6">
                                        <div class="box">
                                            <h4>
                                                Platforms
                                            </h4>
                                            <span class="d-block">
                                                ScenarioZoom
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="box">
                                            <h4>
                                                Service
                                            </h4>
                                            <span class="d-block">
                                                Affiliate Marketing
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="box">
                                            <h4>
                                                Project Timeline
                                            </h4>
                                            <span class="d-block">
                                                2024-2025
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="box">
                                            <h4>
                                                Increased in ROI Revenue
                                            </h4>
                                            <span class="d-block">
                                                78%
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio_details_desc mx-auto">
                                <h2>
                                    Project brief
                                </h2>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem ipsum has been the industry's standard dummy 1500s, when an unknown printer took a galley make a type specimen book.
                                </p>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of letraset sheets ipsum passages, and more recently with desktop publishing software like.
                                </p>
                                <div class="h_50"></div>
                                <h2>
                                    Challenging part
                                </h2>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s.
                                </p>
                                <ul class="custom_list list-unstyled p-0 mb-0">
                                    <li class="position-relative">
                                        <i class="ri-arrow-right-s-line"></i>
                                        Monitor the performance of each piece of content
                                    </li>
                                    <li class="position-relative">
                                        <i class="ri-arrow-right-s-line"></i>
                                        Generate content targeting different funnel stages, from initial awareness to active consideration
                                    </li>
                                    <li class="position-relative">
                                        <i class="ri-arrow-right-s-line"></i>
                                        Provide feedback, suggestions, and more via our project management system
                                    </li>
                                    <li class="position-relative">
                                        <i class="ri-arrow-right-s-line"></i>
                                        Communicate feedback, insights, and additional details through our project management tool
                                    </li>
                                </ul>
                            </div>
                            <div class="portfolio_details_image text-center">
                                <img src="<?php echo get_template_directory_uri()?>/assets/images/portfolio/portfolio_details2.jpg" alt="portfolio_details2">
                            </div>
                            <div class="portfolio_details_desc mx-auto">
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of letraset sheets ipsum passages, and more recently with desktop publishing software like.
                                </p>
                                <div class="h_50"></div>
                                <h2>
                                    Result overview
                                </h2>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem ipsum has been the industry's standard dummy 1500s, when an unknown printer took a galley make a type specimen book.
                                </p>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of letraset sheets ipsum passages, and more recently with desktop publishing software like.
                                </p>
                            </div>
                        </div>
                    </div>
            <?php
        }
    }
$widgets_manager->register(new axero_portfolio_details());