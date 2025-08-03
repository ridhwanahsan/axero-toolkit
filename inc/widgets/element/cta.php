<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_call_to_action extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_call_to_action';
        }

        public function get_title()
        {
            return __('CTA', 'axero-toolkit');
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
                <div class="lets_talk_area position-relative z-1 pt_150">
            <div class="container-fluid max_w_1560px">
                <div class="lets_talk_content text-center">
                    <h2 class="text-white text_animation">
                        Let’s Talk
                    </h2>
                    <a href="contact.html" class="details_link_btn menu_link" data-cue="slideInUp">
                        <span class="d-block">
                            <i class="ti ti-arrow-up-right"></i>
                            <span class="menu_link_text d-block fw-medium">
                                Let’s Chat
                            </span>
                        </span>
                    </a>
                </div>
                <div class="lets_talk_newsletter_form mx-auto text-center">
                    <h3 class="text-white text_animation">
                        Newsletter for updates
                    </h3>
                    <form data-cue="slideInUp">
                        <input type="text" class="form-control" placeholder="Enter your email">
                        <button type="button" class="btn secondary_btn style_three">
                            <span class="d-inline-block position-relative">
                                Subscribe <i class="ti ti-arrow-up-right"></i>
                            </span>
                        </button>
                    </form>
                </div>
            </div>
            <div class="object8">
                <img src="<?php echo get_template_directory_uri()?>/assets/images/objects/object8.png" alt="object8">
            </div>
            <div class="object9">
                <img src="<?php echo get_template_directory_uri()?>/assets/images/objects/object9.png" alt="object9">
            </div>
        </div>
            <?php
        }
    }
$widgets_manager->register(new axero_call_to_action());