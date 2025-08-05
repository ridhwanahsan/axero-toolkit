<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_contact_area extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_contact_area';
        }

        public function get_title()
        {
            return __('Contact Area', 'axero-toolkit');
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
        $this->start_controls_section(
            'contact_form_section',
            [
                'label' => __('Contact Form', 'axero-toolkit'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'contact_form_shortcode',
            [
                'label' => __('Contact Form Shortcode', 'axero-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
                'placeholder' => '[contact-form-7 id="123" title="Contact form"]',
                'description' => __('Enter your Contact Form 7 shortcode', 'axero-toolkit'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();
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
                <div class="contact_area ptb_150">
                    <div class="container">
                        <div class="row gx-0" data-cue="slideInUp">
                            <div class="col-lg-6 order-2 order-lg-1">
                                <div
                                    class="contact_image position-relative"
                                    style="background-image: url(<?php echo get_template_directory_uri()?>/assets/images/girl_with_laptop.jpg);"
                                >
                                    <img src="<?php echo get_template_directory_uri()?>/assets/images/girl_with_laptop.jpg" alt="girl_with_laptop">
                                    <div class="text_box">
                                        <p class="text-white fw-medium">
                                            “ Simplifying website development, this software makes managing your online presence hassle-free. “
                                        </p>
                                        <h3 class="text-white fw-semibold">
                                            Apollo Maddox
                                        </h3>
                                        <span class="d-block text-white">
                                            Founder & CEO
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 order-1 order-lg-2">
                                <div class="contact_form">
                                    <p>
                                        Have questions or feedback? Drop us a message below, and we’ll get back to you quickly.
                                    </p>

                                    <?php if (!empty($settings['contact_form_shortcode'])) : ?>
                                        <div class="contact-form-shortcode">
                                            <?php echo do_shortcode($settings['contact_form_shortcode']); ?>
                                        </div>
                                    <?php endif; ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }
    }
$widgets_manager->register(new axero_contact_area());