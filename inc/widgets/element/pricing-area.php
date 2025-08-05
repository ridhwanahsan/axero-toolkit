<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_pricing_area extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_pricing_area';
        }

        public function get_title()
        {
            return __('Pricing Area', 'axero-toolkit');
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
                <div class="pricing_area pt_125">
                    <div class="container">
                        <div class="row" data-cues="slideInUp" data-group="pricing_content">
                            <div class="col-sm-6">
                                <div class="pricing_box">
                                    <div class="top">
                                        <div class="title">
                                            <h3>
                                                Basic
                                            </h3>
                                            <p>
                                                Our most popular plan, perfect for small teams.
                                            </p>
                                        </div>
                                        <div class="price lh-1 fw-bold">
                                            $49 <span class="fw-normal">/per month</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <span class="d-block position-relative item">
                                                <i class="ri-arrow-right-s-line"></i>
                                                Core Tools Access
                                            </span>
                                        </div>
                                        <div class="col-xl-6">
                                            <span class="d-block position-relative item">
                                                <i class="ri-arrow-right-s-line"></i>
                                                Standard Support
                                            </span>
                                        </div>
                                        <div class="col-xl-6">
                                            <span class="d-block position-relative item">
                                                <i class="ri-arrow-right-s-line"></i>
                                                1 User Account
                                            </span>
                                        </div>
                                        <div class="col-xl-6">
                                            <span class="d-block position-relative item">
                                                <i class="ri-arrow-right-s-line"></i>
                                                Basic Analytics
                                            </span>
                                        </div>
                                        <div class="col-xl-6">
                                            <span class="d-block position-relative item">
                                                <i class="ri-arrow-right-s-line"></i>
                                                Simple Integration
                                            </span>
                                        </div>
                                        <div class="col-xl-6">
                                            <span class="d-block position-relative item">
                                                <i class="ri-arrow-right-s-line"></i>
                                                Customizable Templates
                                            </span>
                                        </div>
                                        <div class="col-xl-6">
                                            <span class="d-block position-relative item">
                                                <i class="ri-arrow-right-s-line"></i>
                                                Up to 3 Campaigns
                                            </span>
                                        </div>
                                        <div class="col-xl-6">
                                            <span class="d-block position-relative item">
                                                <i class="ri-arrow-right-s-line"></i>
                                                Monthly Reporting
                                            </span>
                                        </div>
                                        <div class="col-xl-6">
                                            <span class="d-block position-relative item">
                                                <i class="ri-arrow-right-s-line"></i>
                                                Custom Dashboard
                                            </span>
                                        </div>
                                        <div class="col-xl-6">
                                            <span class="d-block position-relative item">
                                                <i class="ri-arrow-right-s-line"></i>
                                                Automated Workflows
                                            </span>
                                        </div>
                                        <div class="col-xl-6">
                                            <span class="d-block position-relative item">
                                                <i class="ri-arrow-right-s-line"></i>
                                                Real-Time Data Insights
                                            </span>
                                        </div>
                                        <div class="col-xl-6">
                                            <span class="d-block position-relative item">
                                                <i class="ri-arrow-right-s-line"></i>
                                                Multi-Channel Integration
                                            </span>
                                        </div>
                                        <div class="col-xl-6">
                                            <span class="d-block position-relative item">
                                                <i class="ri-arrow-right-s-line"></i>
                                                A/B Testing
                                            </span>
                                        </div>
                                        <div class="col-xl-6">
                                            <span class="d-block position-relative item">
                                                <i class="ri-arrow-right-s-line"></i>
                                                Custom Permission
                                            </span>
                                        </div>
                                    </div>
                                    <a href="<?php echo esc_url( home_url( 'pricing' ) ); ?>" class="btn secondary_btn d-block w-100">
                                        <span class="d-inline-block position-relative">
                                            Get Started <i class="ti ti-arrow-up-right"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="pricing_box">
                                    <div class="top">
                                        <div class="title">
                                            <h3>
                                                Advanced
                                            </h3>
                                            <p>
                                                Premium Features and Advanced Reporting
                                            </p>
                                        </div>
                                        <div class="price lh-1 fw-bold">
                                            $89 <span class="fw-normal">/per month</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <span class="d-block position-relative item">
                                                <i class="ri-arrow-right-s-line"></i>
                                                Full Tools Access
                                            </span>
                                        </div>
                                        <div class="col-xl-6">
                                            <span class="d-block position-relative item">
                                                <i class="ri-arrow-right-s-line"></i>
                                                Priority Support
                                            </span>
                                        </div>
                                        <div class="col-xl-6">
                                            <span class="d-block position-relative item">
                                                <i class="ri-arrow-right-s-line"></i>
                                                Unlimited User Accounts
                                            </span>
                                        </div>
                                        <div class="col-xl-6">
                                            <span class="d-block position-relative item">
                                                <i class="ri-arrow-right-s-line"></i>
                                                Advanced Analytics
                                            </span>
                                        </div>
                                        <div class="col-xl-6">
                                            <span class="d-block position-relative item">
                                                <i class="ri-arrow-right-s-line"></i>
                                                Advanced Integrations
                                            </span>
                                        </div>
                                        <div class="col-xl-6">
                                            <span class="d-block position-relative item">
                                                <i class="ri-arrow-right-s-line"></i>
                                                Personalized Templates
                                            </span>
                                        </div>
                                        <div class="col-xl-6">
                                            <span class="d-block position-relative item">
                                                <i class="ri-arrow-right-s-line"></i>
                                                Unlimited Campaigns
                                            </span>
                                        </div>
                                        <div class="col-xl-6">
                                            <span class="d-block position-relative item">
                                                <i class="ri-arrow-right-s-line"></i>
                                                Weekly Reporting
                                            </span>
                                        </div>
                                        <div class="col-xl-6">
                                            <span class="d-block position-relative item">
                                                <i class="ri-arrow-right-s-line"></i>
                                                Custom Dashboard
                                            </span>
                                        </div>
                                        <div class="col-xl-6">
                                            <span class="d-block position-relative item">
                                                <i class="ri-arrow-right-s-line"></i>
                                                Automated Workflows
                                            </span>
                                        </div>
                                        <div class="col-xl-6">
                                            <span class="d-block position-relative item">
                                                <i class="ri-arrow-right-s-line"></i>
                                                Real-Time Data Insights
                                            </span>
                                        </div>
                                        <div class="col-xl-6">
                                            <span class="d-block position-relative item">
                                                <i class="ri-arrow-right-s-line"></i>
                                                Multi-Channel Integration
                                            </span>
                                        </div>
                                        <div class="col-xl-6">
                                            <span class="d-block position-relative item">
                                                <i class="ri-arrow-right-s-line"></i>
                                                A/B Testing
                                            </span>
                                        </div>
                                        <div class="col-xl-6">
                                            <span class="d-block position-relative item">
                                                <i class="ri-arrow-right-s-line"></i>
                                                Custom Permission
                                            </span>
                                        </div>
                                    </div>
                                    <a href="<?php echo esc_url( home_url( 'pricing' ) ); ?>" class="btn secondary_btn d-block w-100">
                                        <span class="d-inline-block position-relative">
                                            Get Started <i class="ti ti-arrow-up-right"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }
    }
$widgets_manager->register(new axero_pricing_area());