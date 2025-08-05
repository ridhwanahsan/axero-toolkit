<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class privacy_policy_area extends Widget_Base
    {

        public function get_name()
        {
            return 'privacy_policy_area';
        }

        public function get_title()
        {
            return __('Privacy Policy', 'axero-toolkit');
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
                <div class="privacy_policy_area pt_150">
                    <div class="container">
                        <div class="privacy_policy_desc mx-auto">
                            <p>
                                <strong>Effective Date:</strong> December 6, 2025
                                <br>
                                <strong>Last Updated:</strong> December 6, 2025
                            </p>
                            <p>
                                <strong>Axero</strong> ("we," "our," or "us") is committed to protecting your privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website, <a href="#" target="_blank">Axero.com</a>. Please read this policy carefully to understand our views and practices regarding your personal data.
                            </p>
                            <div class="h_50"></div>
                            <h3>
                                1. Information We Collect
                            </h3>
                            <p>
                                We may collect and process the following types of information:
                            </p>
                            <p>
                                <strong>a. Personal Information You Provide</strong>
                                <br>
                                Name, email address, phone number, and any other details you submit via contact forms or account registrations.
                            </p>
                            <p>
                                <strong>b. Automatically Collected Information</strong>
                                <br>
                                IP address, browser type, operating system, and browsing behavior through cookies or other tracking technologies.
                            </p>
                            <p>
                                <strong>c. Third-Party Information</strong>
                                <br>
                                If you connect through a third-party service (e.g., Google, Facebook), we may receive additional information as per their privacy settings.
                            </p>
                            <div class="h_50"></div>
                            <h3>
                                2. How We Use Your Information
                            </h3>
                            <p>
                                We may use the information collected for the following purposes:
                                <br>
                                <strong>1.</strong> To operate and maintain our website.
                                <br>
                                <strong>2.</strong> To respond to inquiries and support requests.
                                <br>
                                <strong>3.</strong> To send promotional and marketing communications (only if consented).
                                <br>
                                <strong>4.</strong> To improve website functionality and user experience.
                                <br>
                                <strong>5.</strong> To comply with legal obligations.
                            </p>
                            <div class="h_50"></div>
                            <h3>
                                3. Cookies and Tracking Technologies
                            </h3>
                            <p>
                                Our website uses cookies to enhance user experience and gather insights about website traffic and usage. 
                            </p>
                            <p>
                                You can manage cookie preferences through your browser settings. <strong>Types of cookies:</strong>
                            </p>
                            <p>
                                1. <strong>Essential Cookies:</strong> Required for website functionality.
                                <br>
                                2. <strong>Analytics Cookies:</strong> Help us understand user behavior on our website.
                                <br>
                                3. <strong>Advertising Cookies:</strong> Used for targeted advertisements.
                            </p>
                            <div class="h_50"></div>
                            <h3>
                                4. How We Share Your Information
                            </h3>
                            <p>
                                We do not sell or rent your personal data. However, we may share your information in the following situations:
                            </p>
                            <p>
                                1. <strong>Service Providers:</strong> With trusted third-party vendors who assist in operating our website.
                                <br>
                                2. <strong>Legal Requirements:</strong> When required by law or to protect our rights.
                            </p>
                            <div class="h_50"></div>
                            <h3>
                                5. Data Security
                            </h3>
                            <p>
                                We implement appropriate technical and organizational measures to protect your data from unauthorized access, loss, or misuse. However, no data transmission over the internet is 100% secure, and we cannot guarantee absolute security.
                            </p>
                            <div class="h_50"></div>
                            <h3>
                                6. Your Rights
                            </h3>
                            <p>
                                Depending on your location, you may have the following rights:
                            </p>
                            <p>
                                1. <strong>Access:</strong> Request access to the personal data we hold about you
                                <br>
                                2. <strong>Correction:</strong> Request correction of inaccurate or incomplete information.
                                <br>
                                3. <strong>Deletion:</strong> Request deletion of your personal data.
                                <br>
                                4. <strong>Opt-Out:</strong> Opt-out of marketing communications by following the "unsubscribe" link in emails.
                                <br>
                            </p>
                            <p>
                                For any privacy-related requests, please contact us at <a href="mailto:axero@gmail.com">axero@gmail.com</a>.
                            </p>
                            <div class="h_50"></div>
                            <h3>
                                7. Third-Party Links
                            </h3>
                            <p>
                                Our website may contain links to external websites. We are not responsible for the privacy practices of these third-party websites. Please review their privacy policies before providing any personal information.
                            </p>
                            <div class="h_50"></div>
                            <h3>
                                8. Children's Privacy
                            </h3>
                            <p>
                                Our website is not intended for individuals under the age of 13, and we do not knowingly collect data from children.
                            </p>
                            <div class="h_50"></div>
                            <h3>
                                9. Changes to This Privacy Policy
                            </h3>
                            <p>
                                We reserve the right to update this Privacy Policy from time to time. Changes will be posted on this page, and the "Last Updated" date will be modified accordingly.
                            </p>
                            <div class="h_50"></div>
                            <h3>
                                10. Contact Us
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
$widgets_manager->register(new privacy_policy_area());