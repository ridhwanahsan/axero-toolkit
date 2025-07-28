<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_logo_slider extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_logo_slider';
        }

        public function get_title()
        {
            return __('Brands Area', 'axero-toolkit');
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

        protected function register_controls_section() {
              
        $this->start_controls_section(
            'style6_logo_items_section',
            [
                'label' => esc_html__('Brand Logo Items', 'axero-toolkit'),
                'tab' => Controls_Manager::TAB_CONTENT,
                
            ]
        );

        $this->add_control(
            'style6_section_title',
            [
                'label' => esc_html__('Section Title', 'axero-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__("We're happy to work with largest brands", 'axero-toolkit'),
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'style6_logo_image',
            [
                'label' => esc_html__('Logo Image', 'axero-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'style6_logo_alt_text',
            [
                'label' => esc_html__('Alt Text', 'axero-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Brand Logo', 'axero-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'style6_logo_items',
            [
                'label' => esc_html__('Logo Items', 'axero-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'style6_logo_alt_text' => esc_html__('Brand 1', 'axero-toolkit'),
                    ],
                    [
                        'style6_logo_alt_text' => esc_html__('Brand 2', 'axero-toolkit'),
                    ],
                    [
                        'style6_logo_alt_text' => esc_html__('Brand 3', 'axero-toolkit'),
                    ],
                    [
                        'style6_logo_alt_text' => esc_html__('Brand 4', 'axero-toolkit'),
                    ],
                    [
                        'style6_logo_alt_text' => esc_html__('Brand 5', 'axero-toolkit'),
                    ],
                    [
                        'style6_logo_alt_text' => esc_html__('Brand 6', 'axero-toolkit'),
                    ],
                ],
                'title_field' => '{{{ style6_logo_alt_text }}}',
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
            

        // brand Title Styling
        $this->start_controls_section(
            'style6_title_style',
            [
                'label' => esc_html__('Title Style', 'axero-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                
            ]
        );

        $this->add_control(
            'style6_title_color',
            [
                'label' => esc_html__('Color', 'axero-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .brands_area .section_title.style_five h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style6_title_typography',
                'selector' => '{{WRAPPER}} .brands_area .section_title.style_five h2',
            ]
        );

        $this->end_controls_section();

        // brand Logo Border Styling
        $this->start_controls_section(
            'style6_logo_border_style',
            [
                'label' => esc_html__('Logo Border Style', 'axero-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                 
            ]
        );

        $this->add_control(
            'style6_logo_outline_border',
            [
                'label' => esc_html__('Outline Border', 'axero-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .brands_inner_box' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'style6_logo_outline_border_color',
            [
                'label' => esc_html__('Outline Border Color', 'axero-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .brands_inner_box' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'style6_logo_inner_border',
            [
                'label' => esc_html__('Inner Border', 'axero-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .brands_inner_box .grid .brand_item' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'style6_logo_inner_border_color',
            [
                'label' => esc_html__('Inner Border Color', 'axero-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .brands_inner_box .grid .brand_item' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
 

        }

        protected function render()
        {
            $settings = $this->get_settings_for_display(); ?>
          
             <div class="brands_area ptb_150">
                <div class="container-fluid max_w_1905px">
                    <?php if (!empty($settings['style6_section_title'])) : ?>
                    <div class="section_title style_five">
                        <h2 class="mb-0 text_animation">
                            <?php echo wp_kses_post($settings['style6_section_title']); ?>
                        </h2>
                    </div>
                    <?php endif; ?>
                    <div class="brands_inner_box" data-cue="slideInUp">
                        <div class="grid">
                            <?php foreach ($settings['style6_logo_items'] as $logo): ?>
                                <?php
                                    $img_url = !empty($logo['style6_logo_image']['url']) ? $logo['style6_logo_image']['url'] : '';
                                    $alt_text = !empty($logo['style6_logo_alt_text']) ? $logo['style6_logo_alt_text'] : esc_html__('Brand Logo', 'axero-toolkit');
                                ?>
                                <div class="brand_item text-center">
                                    <?php if ($img_url): ?>
                                        <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($alt_text); ?>">
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            
             
        <?php
            }
                }
           

    $widgets_manager->register(new axero_logo_slider());