<?php
    namespace lunex_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class lunex_logo_slider extends Widget_Base
    {

        public function get_name()
        {
            return 'lunex_logo_slider';
        }

        public function get_title()
        {
            return __('Logo Slider', 'lunex-toolkit');
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
                        'style2' => esc_html__('Style 2', 'lunex-toolkit'),
                      
                    ],
                ]
            );

            $this->end_controls_section();
        $this->start_controls_section(
            'logo_items_section',
            [
                'label' => esc_html__('Logo Items', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'style_selection' => 'style1',
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'logo_image',
            [
                'label' => esc_html__('Logo Image', 'lunex-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'logo_alt_text',
            [
                'label' => esc_html__('Alt Text', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Client Logo', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'logo_items',
            [
                'label' => esc_html__('Logos', 'lunex-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'logo_alt_text' => esc_html__('Client 1', 'lunex-toolkit'),
                    ],
                    [
                        'logo_alt_text' => esc_html__('Client 2', 'lunex-toolkit'),
                    ],
                    [
                        'logo_alt_text' => esc_html__('Client 3', 'lunex-toolkit'),
                    ],
                    [
                        'logo_alt_text' => esc_html__('Client 4', 'lunex-toolkit'),
                    ],
                    [
                        'logo_alt_text' => esc_html__('Client 5', 'lunex-toolkit'),
                    ],
                ],
                'title_field' => '{{{ logo_alt_text }}}',
            ]
        );

        $this->end_controls_section();
        // style2 slider logo
        $this->start_controls_section(
            'style2_logo_slider',
            [
                'label' => esc_html__('Style 2 Logo Slider', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'style_selection' => 'style2',
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'style2_logo_image',
            [
                'label' => esc_html__('Logo Image', 'lunex-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'style2_logo_alt_text',
            [
                'label' => esc_html__('Alt Text', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Client Logo', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'style2_logo_items',
            [
                'label' => esc_html__('Logos', 'lunex-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'style2_logo_alt_text' => esc_html__('Client 1', 'lunex-toolkit'),
                    ],
                    [
                        'style2_logo_alt_text' => esc_html__('Client 2', 'lunex-toolkit'),
                    ],
                ],
                'title_field' => '{{{ style2_logo_alt_text }}}',
                'condition' => [
                    'style_selection' => 'style2',
                ],
            ]
        );

        $this->end_controls_section();
        // style3 slider logo
        $this->start_controls_section(
            'style3_logo_slider',
            [
            'label' => esc_html__('Style 3 Logo Slider', 'lunex-toolkit'),
            'tab' => Controls_Manager::TAB_CONTENT,
            'condition' => [
                'style_selection' => 'style3',
            ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'style3_logo_image',
            [
            'label' => esc_html__('Logo Image', 'lunex-toolkit'),
            'type' => Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
            ]
        );

        $repeater->add_control(
            'style3_logo_alt_text',
            [
            'label' => esc_html__('Alt Text', 'lunex-toolkit'),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__('Client Logo', 'lunex-toolkit'),
            'label_block' => true,
            ]
        );

        $repeater->add_control(
            'style3_logo_item_class',
            [
            'label' => esc_html__('Item Extra Class', 'lunex-toolkit'),
            'type' => Controls_Manager::TEXT,
            'default' => '',
            'description' => esc_html__('Add extra class for the item (e.g. "two")', 'lunex-toolkit'),
            ]
        );

        $this->add_control(
            'style3_logo_items',
            [
            'label' => esc_html__('Logos', 'lunex-toolkit'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [
                'style3_logo_alt_text' => esc_html__('Client 1', 'lunex-toolkit'),
                ],
                [
                'style3_logo_alt_text' => esc_html__('Client 2', 'lunex-toolkit'),
                ],
            ],
            'title_field' => '{{{ style3_logo_alt_text }}}',
            'condition' => [
                'style_selection' => 'style3',
            ],
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
        $this->start_controls_section(
            'logo_image_style',
            [
                'label' => esc_html__('Logo Image Style', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style1',
                ],
            ]
        );

        $this->add_control(
            'logo_bg_color',
            [
                'label' => esc_html__('Background Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trustedClientsSwiper .item' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'logo_bg_hover_color',
            [
                'label' => esc_html__('Hover Background Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .trustedClientsSwiper .item:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'slider_arrow_style',
            [
                'label' => esc_html__('Slider Arrow Style', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style1',
                ],
            ]
        );

        $this->add_control(
            'arrow_color',
            [
                'label' => esc_html__('Arrow Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .swiper-button-prev, {{WRAPPER}} .swiper-button-next' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_bg_color',
            [
                'label' => esc_html__('Background Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .swiper-button-prev, {{WRAPPER}} .swiper-button-next' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_hover_color',
            [
                'label' => esc_html__('Hover Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .swiper-button-prev:hover, {{WRAPPER}} .swiper-button-next:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_bg_hover_color',
            [
                'label' => esc_html__('Background Hover Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .swiper-button-prev:hover, {{WRAPPER}} .swiper-button-next:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'arrow_size',
            [
                'label' => esc_html__('Size', 'lunex-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .swiper-button-prev, {{WRAPPER}} .swiper-button-next' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        
        $this->start_controls_section(
            'style2_logo_item_style',
            [
                'label' => esc_html__('Style 2 Logo Item', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style2',
                ],
            ]
        );

        $this->add_control(
            'style2_logo_item_border',
            [
                'label' => esc_html__('Border', 'lunex-toolkit'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'none' => esc_html__('None', 'lunex-toolkit'),
                    'solid' => esc_html__('Solid', 'lunex-toolkit'),
                ],
                'default' => 'solid',
                'selectors' => [
                    '{{WRAPPER}} .partner_item' => 'border-style: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'style2_logo_item_border_color',
            [
                'label' => esc_html__('Border Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .partner_item' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'style2_logo_item_border!' => 'none',
                ],
            ]
        );

        $this->add_responsive_control(
            'style2_logo_item_height',
            [
                'label' => esc_html__('Height', 'lunex-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 500,
                    ],
                ],
                'default' => [
                    'size' => 200,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .partner_item' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'style2_logo_item_padding',
            [
                'label' => esc_html__('Padding', 'lunex-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .partner_item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'top' => 0,
                    'right' => 50,
                    'bottom' => 0,
                    'left' => 50,
                    'unit' => 'px',
                    'isLinked' => false,
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                ],
            ]
        );

        $this->add_control(
            'style2_logo_item_alignment',
            [
                'label' => esc_html__('Alignment', 'lunex-toolkit'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => esc_html__('Left', 'lunex-toolkit'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'lunex-toolkit'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'flex-end' => [
                        'title' => esc_html__('Right', 'lunex-toolkit'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .partner_item' => 'display: flex; align-items: center; justify-content: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        }

        protected function render()
        {
            $settings = $this->get_settings_for_display();

            if ($settings['style_selection'] === 'style1') {
            ?>
            <!-- style 1 -->

                 <div class="trusted-clients-area">
           
                <div class="swiper trustedClientsSwiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($settings['logo_items'] as $item): ?>
                        <div class="swiper-slide text-center">
                            <div class="item">
                                <img src="<?php echo esc_url($item['logo_image']['url']); ?>" alt="<?php echo esc_attr($item['logo_alt_text']); ?>">
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
           
        </div>

        <?php
            } elseif ($settings['style_selection'] === 'style2') {
                    ?>
            <!-- style 2 -->
              <div class="partners_area position-relative z-1">
            <div class="container-fluid max_w_1560px">
                <div class="partners_slides owl-carousel owl-theme" data-cue="slideInUp">
                    <?php foreach ($settings['style2_logo_items'] as $logo): ?>
                    <div class="partner_item text-center">
                        <img src="<?php echo esc_url($logo['style2_logo_image']['url']); ?>" alt="<?php echo esc_attr($logo['style2_logo_alt_text']); ?>">
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <?php
            } elseif ($settings['style_selection'] === 'style3') {
                    ?>
            <!-- style 3 -->
           

    <?php
        }
            }
        }

    $widgets_manager->register(new lunex_logo_slider());