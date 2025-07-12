<?php
    namespace lunex_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_logo_grid extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_logo_grid';
        }

        public function get_title()
        {
            return __('Logo Grid', 'axero-toolkit');
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
            // Section Selection
            $this->start_controls_section(
                'section_selection',
                [
                    'label' => esc_html__('Section Selection', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'style_selection',
                [
                    'label'   => esc_html__('Select Section', 'axero-toolkit'),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'style1',
                    'options' => [
                        'style1' => esc_html__('Style 1', 'axero-toolkit'),
                        'style2' => esc_html__('Style 2', 'axero-toolkit'),
                        'style3' => esc_html__('Style 3', 'axero-toolkit'),
                    ],
                ]
            );

            $this->end_controls_section();

        // Logo Grid Repeater Control
        $this->start_controls_section(
            'logo_grid_section',
            [
                'label' => esc_html__('Logo Grid', 'axero-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'style_selection' => 'style1',
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'logo_image',
            [
                'label' => esc_html__('Logo Image', 'axero-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'logo_alt_text',
            [
                'label' => esc_html__('Alt Text', 'axero-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Brand Logo', 'axero-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'logo_grid_items',
            [
                'label' => esc_html__('Logo Items', 'axero-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'logo_alt_text' => esc_html__('Brand Logo 1', 'axero-toolkit'),
                    ],
                    [
                        'logo_alt_text' => esc_html__('Brand Logo 2', 'axero-toolkit'),
                    ],
                ],
                'title_field' => '{{{ logo_alt_text }}}',
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
        <div class="brands_area">
            <div class="container-fluid max_w_1905px">
                <div class="brands_inner_box" data-cue="slideInUp">
                    <div class="grid">
                        <?php foreach ($settings['logo_grid_items'] as $item) : ?>
                            <div class="brand_item text-center">
                                <img src="<?php echo esc_url($item['logo_image']['url']); ?>" alt="<?php echo esc_attr($item['logo_alt_text']); ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
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

    $widgets_manager->register(new axero_logo_grid());