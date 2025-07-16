<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Repeater;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_price_table extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_price_table';
        }

        public function get_title()
        {
            return __('Price Table', 'axero-toolkit');
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

        // Price Content Prefix Controls for Style 1
        $this->start_controls_section(
            'style1_price_content_section',
            [
                'label' => esc_html__('Price Content', 'axero-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'style_selection' => 'style1',
                ],
            ]
        );

        // Title
        $this->add_control(
            'style1_title',
            [
                'label' => esc_html__('Title', 'axero-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Basic', 'axero-toolkit'),
                'label_block' => true,
            ]
        );

        // Description
        $this->add_control(
            'style1_description',
            [
                'label' => esc_html__('Description', 'axero-toolkit'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Our most popular plan, perfect for small teams.', 'axero-toolkit'),
                'rows' => 2,
            ]
        );

        // Price
        $this->add_control(
            'style1_price',
            [
                'label' => esc_html__('Price', 'axero-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('$49', 'axero-toolkit'),
            ]
        );

        // Price Suffix (e.g., /per month)
        $this->add_control(
            'style1_price_suffix',
            [
                'label' => esc_html__('Price Suffix', 'axero-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('/per month', 'axero-toolkit'),
            ]
        );

        // Features Repeater
        $this->add_control(
            'style1_features',
            [
                'label' => esc_html__('Features', 'axero-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'feature_text',
                        'label' => esc_html__('Feature', 'axero-toolkit'),
                        'type' => Controls_Manager::TEXT,
                        'default' => esc_html__('Core Tools Access', 'axero-toolkit'),
                        'label_block' => true,
                    ],
                ],
                'default' => [
                    [ 'feature_text' => esc_html__('Core Tools Access', 'axero-toolkit') ],
                    [ 'feature_text' => esc_html__('Standard Support', 'axero-toolkit') ],
                    [ 'feature_text' => esc_html__('1 User Account', 'axero-toolkit') ],
                    [ 'feature_text' => esc_html__('Basic Analytics', 'axero-toolkit') ],
                    [ 'feature_text' => esc_html__('Simple Integration', 'axero-toolkit') ],
                    [ 'feature_text' => esc_html__('Customizable Templates', 'axero-toolkit') ],
                    [ 'feature_text' => esc_html__('Up to 3 Campaigns', 'axero-toolkit') ],
                    [ 'feature_text' => esc_html__('Monthly Reporting', 'axero-toolkit') ],
                    [ 'feature_text' => esc_html__('Custom Dashboard', 'axero-toolkit') ],
                    [ 'feature_text' => esc_html__('Automated Workflows', 'axero-toolkit') ],
                    [ 'feature_text' => esc_html__('Real-Time Data Insights', 'axero-toolkit') ],
                    [ 'feature_text' => esc_html__('Multi-Channel Integration', 'axero-toolkit') ],
                    [ 'feature_text' => esc_html__('A/B Testing', 'axero-toolkit') ],
                    [ 'feature_text' => esc_html__('Custom Permission', 'axero-toolkit') ],
                ],
                'title_field' => '{{{ feature_text }}}',
            ]
        );

        // Button Text
        $this->add_control(
            'style1_button_text',
            [
                'label' => esc_html__('Button Text', 'axero-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Get Started', 'axero-toolkit'),
            ]
        );

        // Button URL
        $this->add_control(
            'style1_button_url',
            [
                'label' => esc_html__('Button URL', 'axero-toolkit'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_url('https://your-link.com'),
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
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
                'price_table_style',
                [
                    'label'     => esc_html__('Price Table Style', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            // Title Color
            $this->add_control(
                'style1_title_color',
                [
                    'label' => esc_html__('Title Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing_box .title h3' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Title Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'style1_title_typography',
                    'selector' => '{{WRAPPER}} .pricing_box .title h3',
                ]
            );

            // Description Color
            $this->add_control(
                'style1_description_color',
                [
                    'label' => esc_html__('Description Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing_box .title p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Description Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'style1_description_typography',
                    'selector' => '{{WRAPPER}} .pricing_box .title p',
                ]
            );

            // Price Color
            $this->add_control(
                'style1_price_color',
                [
                    'label' => esc_html__('Price Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing_box .price' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Price Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'style1_price_typography',
                    'selector' => '{{WRAPPER}} .pricing_box .price',
                ]
            );

            // Price Suffix Color
            $this->add_control(
                'style1_price_suffix_color',
                [
                    'label' => esc_html__('Price Suffix Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing_box .price span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Features Color
            $this->add_control(
                'style1_features_color',
                [
                    'label' => esc_html__('Features Text Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing_box .item' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Features Icon Color
            $this->add_control(
                'style1_features_icon_color',
                [
                    'label' => esc_html__('Features Icon Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing_box .item i' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Button Text Color
            $this->add_control(
                'style1_button_text_color',
                [
                    'label' => esc_html__('Button Text Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing_box .btn' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Button Background Color
            $this->add_control(
                'style1_button_bg_color',
                [
                    'label' => esc_html__('Button Background Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing_box .btn' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            // Button Hover Text Color
            $this->add_control(
                'style1_button_text_color_hover',
                [
                    'label' => esc_html__('Button Text Color (Hover)', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing_box .btn:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Button Hover Background Color
            $this->add_control(
                'style1_button_bg_color_hover',
                [
                    'label' => esc_html__('Button Background Color (Hover)', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing_box .btn:hover' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            // Pricing Box Background
            $this->add_control(
                'style1_box_bg_color',
                [
                    'label' => esc_html__('Box Background Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing_box' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            // Pricing Box Border Radius
            $this->add_responsive_control(
                'style1_box_border_radius',
                [
                    'label' => esc_html__('Box Border Radius', 'axero-toolkit'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .pricing_box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            // Pricing Box Box Shadow
            $this->add_group_control(
                \Elementor\Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'style1_box_shadow',
                    'selector' => '{{WRAPPER}} .pricing_box',
                ]
            );

            // Pricing Box Padding
            $this->add_responsive_control(
                'style1_box_padding',
                [
                    'label' => esc_html__('Box Padding', 'axero-toolkit'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .pricing_box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            // Pricing Box Margin
            $this->add_responsive_control(
                'style1_box_margin',
                [
                    'label' => esc_html__('Box Margin', 'axero-toolkit'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .pricing_box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                
                <div class="pricing_area">
                    <div class="row" data-cues="slideInUp" data-group="pricing_content">
                        <div class="pricing_box">
                            <div class="top">
                                <div class="title">
                                    <h3>
                                        <?php echo wp_kses_post( $settings['style1_title'] ); ?>
                                    </h3>
                                    <?php if ( ! empty( $settings['style1_description'] ) ) : ?>
                                        <p>
                                            <?php echo wp_kses_post( $settings['style1_description'] ); ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                                <div class="price lh-1 fw-bold">
                                    <?php echo wp_kses_post( $settings['style1_price'] ); ?>
                                    <?php if ( ! empty( $settings['style1_price_suffix'] ) ) : ?>
                                        <span class="fw-normal"><?php echo wp_kses_post( $settings['style1_price_suffix'] ); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php if ( ! empty( $settings['style1_features'] ) && is_array( $settings['style1_features'] ) ) : ?>
                                <div class="row">
                                    <?php
                                    $feature_count = 0;
                                    foreach ( $settings['style1_features'] as $feature ) :
                                        $feature_text = isset( $feature['feature_text'] ) ? $feature['feature_text'] : '';
                                        if ( empty( $feature_text ) ) {
                                            continue;
                                        }
                                        $feature_count++;
                                    ?>
                                        <div class="col-xl-6">
                                            <span class="d-block position-relative item">
                                                <i class="ri-arrow-right-s-line" aria-hidden="true"></i>
                                                <?php echo wp_kses_post( $feature_text ); ?>
                                            </span>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            <?php
                            $button_url = isset( $settings['style1_button_url']['url'] ) ? $settings['style1_button_url']['url'] : '#';
                            $is_external = ! empty( $settings['style1_button_url']['is_external'] ) ? ' target="_blank"' : '';
                            $nofollow = ! empty( $settings['style1_button_url']['nofollow'] ) ? ' rel="nofollow"' : '';
                            $button_text = ! empty( $settings['style1_button_text'] ) ? $settings['style1_button_text'] : esc_html__( 'Get Started', 'axero-toolkit' );
                            ?>
                            <a href="<?php echo esc_url( $button_url ); ?>" class="btn secondary_btn d-block w-100"<?php echo $is_external . $nofollow; ?>>
                                <span class="d-inline-block position-relative">
                                    <?php echo esc_html( $button_text ); ?> <i class="ti ti-arrow-up-right" aria-hidden="true"></i>
                                </span>
                            </a>
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

    $widgets_manager->register(new axero_price_table());