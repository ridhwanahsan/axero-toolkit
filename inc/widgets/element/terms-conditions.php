<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class terms_conditions_area extends Widget_Base
    {

        public function get_name()
        {
            return 'terms_conditions_area';
        }

        public function get_title()
        {
            return __('Terms & Conditions', 'axero-toolkit');
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
                <div class="terms_conditions_area pt_150">
                    <div class="container">
                        <div class="terms_conditions_desc mx-auto">
                            <p>
                                <strong>Effective Date:</strong> December 6, 2025
                                <br>
                                <strong>Last Updated:</strong> December 6, 2025
                            </p>
                            <p>
                                Welcome to <strong>Axero</strong>. These terms and conditions outline the rules and regulations for using our website, <a href="#" target="_blank">Axero.com</a>. By accessing or using our website, you accept and agree to be bound by these Terms and Conditions. If you do not agree with these terms, you must not use this website.
                            </p>
                            <div class="h_50"></div>
                            <h3>
                                1. Definitions
                            </h3>
                            <p>
                                a. <strong>"We," "Us," "Our"</strong>: Refers to Axero.
                                <br>
                                b. <strong>"You," "Your"</strong>: Refers to the user or visitor of the website.
                                <br>
                                c. <strong>"Services"</strong>: Refers to the products, content, and functionalities offered on the website.
                            </p>
                            <div class="h_50"></div>
                            <h3>
                                2. Website Use
                            </h3>
                            <p>
                                <strong>a. Eligibility</strong>
                                <br>
                                You must be at least 18 years old or have parental/guardian consent to use this website.
                            </p>
                            <p>
                                <strong>b. Account Responsibility</strong>
                                <br>
                                If you create an account on <strong>Axero</strong>, you are responsible for maintaining its confidentiality and ensuring that all information you provide is accurate and up-to-date.
                                <strong>1.</strong> To operate and maintain our website.
                            </p>
                            <p>
                                <strong>c. Prohibited Activities</strong>
                                <br>
                                You agree not to:
                                <br>
                                - Use the website for unlawful purposes.
                                <br>
                                - Transmit malicious code, viruses, or any disruptive technology.
                                <br>
                                - Copy, modify, or distribute any part of our content without our prior consent.
                            </p>
                            <div class="h_50"></div>
                            <h3>
                                3. Intellectual Property
                            </h3>
                            <p>
                                All content on <strong>Axero</strong>, including text, graphics, logos, images, videos, and software, is the property of <strong>Axero</strong> or its content suppliers. You may not reproduce, distribute, or exploit our content without explicit written permission.
                            </p>
                            <div class="h_50"></div>
                            <h3>
                                4. Third-Party Links
                            </h3>
                            <p>
                                Our website may contain links to third-party websites. <strong>Axero</strong> does not control or take responsibility for the content, policies, or practices of these external websites. Accessing these links is at your own risk.
                            </p>
                            <div class="h_50"></div>
                            <h3>
                                5. Disclaimer of Warranties
                            </h3>
                            <p>
                                We provide our website and services "as is" and "as available," without warranties of any kind, either express or implied. We do not guarantee that the website will be uninterrupted, error-free, or free of harmful components.
                            </p>
                            <div class="h_50"></div>
                            <h3>
                                6. Limitation of Liability
                            </h3>
                            <p>
                                To the fullest extent permitted by law, <strong>Axero</strong> shall not be held liable for any direct, indirect, incidental, or consequential damages arising from your use of the website or services, even if we have been advised of the possibility of such damages.
                            </p>
                            <div class="h_50"></div>
                            <h3>
                                7. Indemnification
                            </h3>
                            <p>
                                You agree to indemnify and hold <strong>Axero</strong> harmless from any claims, damages, or liabilities arising from your use of the website, violation of these Terms, or infringement of any rights of another party.
                            </p>
                            <div class="h_50"></div>
                            <h3>
                                8. Termination
                            </h3>
                            <p>
                                We reserve the right to suspend or terminate your access to the website at any time, without notice, for any reason, including a breach of these Terms and Conditions.
                            </p>
                            <div class="h_50"></div>
                            <h3>
                                9. Governing Law
                            </h3>
                            <p>
                                These Terms and Conditions are governed by the laws of USA, without regard to its conflict of law provisions.
                            </p>
                            <div class="h_50"></div>
                            <h3>
                                10. Changes to These Terms
                            </h3>
                            <p>
                                <strong>Axero</strong> reserves the right to update or modify these Terms and Conditions at any time. Changes will be posted on this page with an updated "Effective Date." Continued use of the website after changes constitutes your acceptance of the revised terms.
                            </p>
                            <div class="h_50"></div>
                            <h3>
                                11. Contact Us
                            </h3>
                            <p>
                                If you have any questions or concerns about this Privacy Policy or your data, you can contact us at: <a href="mailto:axero@gmail.com">axero@gmail.com</a>
                            </p>
                        </div>
                    </div>
                </div>
            <?php
        }
    }
$widgets_manager->register(new terms_conditions_area());