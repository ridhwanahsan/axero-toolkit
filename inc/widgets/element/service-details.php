<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_service_details extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_service_details';
        }

        public function get_title()
        {
            return __('Service Details', 'axero-toolkit');
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
                    <div class="service_details_area pt_150">
                        <div class="container">
                            <div class="service_details_desc mx-auto">
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem ipsum has been the industry's standard dummy 1500s, when an unknown printer took a galley make a type specimen book.
                                </p>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of letraset sheets ipsum passages, and more recently with desktop publishing software like.
                                </p>
                            </div>
                            <div class="service_details_image text-center">
                                <img src="<?php echo get_template_directory_uri()?>/assets/images/services/service_details.jpg" alt="service_details">
                            </div>
                            <div class="service_details_desc mx-auto">
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s.
                                </p>
                                <div class="h_50"></div>
                                <h2>
                                    How our social media marketing works
                                </h2>
                                <h3>
                                    Social media marketing analysis
                                </h3>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy 1500s, when an unknown printer took a galley make a type specimen book.
                                </p>
                                <ul class="custom_list list-unstyled p-0">
                                    <li class="position-relative">
                                        <i class="ri-arrow-right-s-line"></i>
                                        Your websites analytics data via google analytics
                                    </li>
                                    <li class="position-relative">
                                        <i class="ri-arrow-right-s-line"></i>
                                        Google search console data
                                    </li>
                                    <li class="position-relative">
                                        <i class="ri-arrow-right-s-line"></i>
                                        Your competitors
                                    </li>
                                </ul>
                                <div class="h_50"></div>
                                <h3>
                                    Analysis of social media marketing
                                </h3>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets Ipsum passages, and more recently with desktop publishing software like.
                                </p>
                                <ul class="custom_list list-unstyled p-0">
                                    <li class="position-relative">
                                        <i class="ri-arrow-right-s-line"></i>
                                        Company-wide objectives
                                    </li>
                                    <li class="position-relative">
                                        <i class="ri-arrow-right-s-line"></i>
                                        Market changes in your industry and in social media marketing
                                    </li>
                                    <li class="position-relative">
                                        <i class="ri-arrow-right-s-line"></i>
                                        Additional marketing efforts, like PPC, social media marketing, and content marketing
                                    </li>
                                </ul>
                                <div class="h_50"></div>
                                <h3>
                                    Social media marketing performance analysis
                                </h3>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy 1500s, when an unknown printer took a galley  make a type specimen book.
                                </p>
                                <ul class="custom_list list-unstyled p-0">
                                    <li class="position-relative">
                                        <i class="ri-arrow-right-s-line"></i>
                                        Track each piece of content’s ROI
                                    </li>
                                    <li class="position-relative">
                                        <i class="ri-arrow-right-s-line"></i>
                                        Produce content for different funnel stages, from awareness to consideration
                                    </li>
                                    <li class="position-relative">
                                        <i class="ri-arrow-right-s-line"></i>
                                        Provide feedback, suggestions, and more via our project management system
                                    </li>
                                </ul>
                                <div class="h_50"></div>
                                <h2>
                                    What we have offer
                                </h2>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy 1500s, when an unknown printer took a galley  make a type specimen book.
                                </p>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets Ipsum passages, and more recently with desktop publishing software like.
                                </p>
                            </div>
                            <div class="service_details_quote text-center">
                                <i class="ri-double-quotes-l"></i>
                                <p>
                                    Axero has not only simplified our accounting operations but also offered valuable insights into our finances. The intuitive design and comprehensive reporting features have made a big impact on how we make business decisions. Their outstanding customer service is a major plus. I strongly suggest Axero for businesses in need of a robust accounting platform!
                                </p>
                            </div>
                            <div class="service_details_desc mx-auto">
                                <h3>
                                    Refining social media marketing with dedicated support
                                </h3>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets Ipsum passages, and more recently with desktop publishing software like.
                                </p>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy 1500s, when an unknown printer took a galley  make a type specimen book.
                                </p>
                            </div>
                        </div>
                    </div>
            <?php
        }
    }
$widgets_manager->register(new axero_service_details());