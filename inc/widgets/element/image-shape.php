<?php
    namespace lunex_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class lunex_image_shape  extends Widget_Base
    {

        public function get_name()
        {
            return 'lunex_image_shape ';
        }

        public function get_title()
        {
            return __('Image Shape', 'lunex-toolkit');
        }

        public function get_icon()
        {
            return 'eicon-elementor';
        }

        public function get_categories()
        {
            return ['Lunex'];
        }

        protected function register_controls()
        {
            $this->register_controls_section();
            $this->style_tab_content();
        }

        protected function register_controls_section()
        {
            // Section Selection
            $this->start_controls_section(
                'section_selection',
                [
                    'label' => esc_html__('Section Selection', 'lunex-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'style_selection',
                [
                    'label'   => esc_html__('Select Section', 'lunex-toolkit'),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'style1',
                    'options' => [
                        'style1' => esc_html__('Style 1', 'lunex-toolkit'),
                        
                    ],
                ]
            );

            $this->end_controls_section();
        // Image Control
        $this->start_controls_section(
            'image_section',
            [
                'label' => esc_html__('Image', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__('Choose Image', 'lunex-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/banners/banner2.jpg',
                ],
            ]
        );

        $this->add_control(
            'image_alt',
            [
                'label' => esc_html__('Alt Text', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Banner Image', 'lunex-toolkit'),
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
            // content style controls tab

        }

        protected function render()
        {
            $settings = $this->get_settings_for_display();

            if ($settings['style_selection'] === 'style1') {
            ?>
            <!-- style 1 -->

        <div class="digital-agency-banner-area">
            <div class="digital-agency-banner-image position-relative" data-cues="slideInUp" data-group="digitalAgencyBannerImage">
                <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="<?php echo esc_attr($settings['image_alt']); ?>">
            </div>
        </div>

        <?php
            } elseif ($settings['style_selection'] === 'style2') {
                    ?>
            <!-- style 2 -->

        <?php
            } elseif ($settings['style_selection'] === 'style3') {
                    ?>
            <!-- style 3 -->

    <?php
        }
            }
        }

    $widgets_manager->register(new lunex_image_shape ());