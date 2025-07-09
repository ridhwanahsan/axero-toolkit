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

                    ],
                ]
            );

            $this->end_controls_section();
            $this->start_controls_section(
                'price_ction',
                [
                    'label'     => esc_html__('Price Table', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],

                ]
            );
            // book controls
            $this->add_control(
                'book_button_text',
                [
                    'label'   => esc_html__('Button Text', 'axero-toolkit'),
                    'type'    => Controls_Manager::TEXT,
                    'default' => 'Book a call',
                ]
            );

            $this->add_control(
                'book_button_url',
                [
                    'label'   => esc_html__('Button URL', 'axero-toolkit'),
                    'type'    => Controls_Manager::URL,
                    'default' => [
                        'url' => '#',
                    ],
                ]
            );

            $this->add_control(
                'book_user_image',
                [
                    'label'   => esc_html__('User Image', 'axero-toolkit'),
                    'type'    => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => 'assets/images/users/user6.jpg',
                    ],
                ]
            );

            // Add repeater for pricing columns (plans)
            $repeater = new Repeater();

            $repeater->add_control(
                'plan_title',
                [
                    'label'   => esc_html__('Plan Title', 'axero-toolkit'),
                    'type'    => Controls_Manager::TEXT,
                    'default' => 'Starter',
                ]
            );

            $repeater->add_control(
                'plan_price',
                [
                    'label'   => esc_html__('Price', 'axero-toolkit'),
                    'type'    => Controls_Manager::TEXT,
                    'default' => '$999',
                ]
            );

            $repeater->add_control(
                'plan_price_suffix',
                [
                    'label'   => esc_html__('Price Suffix', 'axero-toolkit'),
                    'type'    => Controls_Manager::TEXT,
                    'default' => '/month',
                ]
            );

            $repeater->add_control(
                'plan_button_text',
                [
                    'label'   => esc_html__('Button Text', 'axero-toolkit'),
                    'type'    => Controls_Manager::TEXT,
                    'default' => 'Choose plan',
                ]
            );

            $repeater->add_control(
                'plan_button_url',
                [
                    'label'   => esc_html__('Button URL', 'axero-toolkit'),
                    'type'    => Controls_Manager::URL,
                    'default' => [
                        'url' => '#',
                    ],
                ]
            );

            $this->add_control(
                'plans',
                [
                    'label'       => esc_html__('Plans', 'axero-toolkit'),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'default'     => [
                        [
                            'plan_title'        => 'Starter',
                            'plan_price'        => '$999',
                            'plan_price_suffix' => '/month',
                            'plan_button_text'  => 'Choose plan',
                            'plan_button_url'   => ['url' => '#'],
                        ],
                        [
                            'plan_title'        => 'Standard',
                            'plan_price'        => '$1,299',
                            'plan_price_suffix' => '/month',
                            'plan_button_text'  => 'Choose plan',
                            'plan_button_url'   => ['url' => '#'],
                        ],
                        [
                            'plan_title'        => 'Pro',
                            'plan_price'        => '$2,599',
                            'plan_price_suffix' => '/month',
                            'plan_button_text'  => 'Choose plan',
                            'plan_button_url'   => ['url' => '#'],
                        ],
                        [
                            'plan_title'        => 'Ultimate',
                            'plan_price'        => '$4,799',
                            'plan_price_suffix' => '/month',
                            'plan_button_text'  => 'Choose plan',
                            'plan_button_url'   => ['url' => '#'],
                        ],
                    ],
                    'title_field' => '{{{ plan_title }}}',
                ]
            );

            // Add repeater for features/rows
            $feature_repeater = new Repeater();

            $feature_repeater->add_control(
                'feature_title',
                [
                    'label'   => esc_html__('Feature Title', 'axero-toolkit'),
                    'type'    => Controls_Manager::TEXT,
                    'default' => 'Digital strategy & consulting',
                ]
            );

            $feature_repeater->add_control(
                'feature_values',
                [
                    'label'       => esc_html__('Feature Values (per plan)', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXTAREA,
                    'description' => esc_html__('Comma separated values for each plan (e.g. check,check,close,check)', 'axero-toolkit'),
                    'default'     => 'check,check,check,check',
                ]
            );

            $this->add_control(
                'features',
                [
                    'label'       => esc_html__('Features', 'axero-toolkit'),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $feature_repeater->get_controls(),
                    'default'     => [
                        [
                            'feature_title'  => 'Digital strategy & consulting',
                            'feature_values' => 'check,check,check,check',
                        ],
                        [
                            'feature_title'  => 'Branding & identity design',
                            'feature_values' => 'check,check,check,check',
                        ],
                        [
                            'feature_title'  => 'Web development & design',
                            'feature_values' => 'check,check,check,close',
                        ],
                        [
                            'feature_title'  => 'Social media management',
                            'feature_values' => 'check,close,check,check',
                        ],
                        [
                            'feature_title'  => 'Work schedule: 5 days/week | monthly hours',
                            'feature_values' => '80 hrs,120 hrs,150 hrs,240 hrs',
                        ],
                    ],
                    'title_field' => '{{{ feature_title }}}',
                ]
            );
            $this->end_controls_section();

            // Style 2 Content Controls
            $this->start_controls_section(
                'price_table_style2_section',
                [
                    'label'     => esc_html__('Price Table (Style 2)', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'style_selection' => 'style2',
                    ],
                ]
            );

            // Discount Text
            $this->add_control(
                'style2_discount_text',
                [
                    'label'       => esc_html__('Discount Text', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'label_block' => true,
                    'default'     => 'Enjoy a <span>17%</span> discount with an annual subscription',
                ]
            );

            // Monthly Plans Repeater
            $monthly_plan_repeater = new Repeater();

            $monthly_plan_repeater->add_control(
                'monthly_plan_title',
                [
                    'label'   => esc_html__('Plan Title', 'axero-toolkit'),
                    'type'    => Controls_Manager::TEXT,
                    'default' => 'Starter',
                ]
            );

            $monthly_plan_repeater->add_control(
                'monthly_plan_price',
                [
                    'label'   => esc_html__('Price', 'axero-toolkit'),
                    'type'    => Controls_Manager::TEXT,
                    'default' => '$19',
                ]
            );

            $monthly_plan_repeater->add_control(
                'monthly_plan_description',
                [
                    'label'   => esc_html__('Description', 'axero-toolkit'),
                    'type'    => Controls_Manager::TEXTAREA,
                    'default' => 'Select the ideal plan that best suits your business needs.',
                ]
            );

            $monthly_plan_repeater->add_control(
                'monthly_plan_features',
                [
                    'label'       => esc_html__('Features', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXTAREA,
                    'description' => esc_html__('One feature per line', 'axero-toolkit'),
                    'default'     => "1 website\nBasic support\nAccess to essential features\nLimited customization options",
                ]
            );

            $monthly_plan_repeater->add_control(
                'monthly_plan_button_text',
                [
                    'label'   => esc_html__('Button Text', 'axero-toolkit'),
                    'type'    => Controls_Manager::TEXT,
                    'default' => 'Get Started',
                ]
            );

            $monthly_plan_repeater->add_control(
                'monthly_plan_button_url',
                [
                    'label'   => esc_html__('Button URL', 'axero-toolkit'),
                    'type'    => Controls_Manager::URL,
                    'default' => [
                        'url' => '#',
                    ],
                ]
            );

            $this->add_control(
                'style2_monthly_plans',
                [
                    'label'       => esc_html__('Monthly Plans', 'axero-toolkit'),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $monthly_plan_repeater->get_controls(),
                    'default'     => [
                        [
                            'monthly_plan_title'       => 'Starter',
                            'monthly_plan_price'       => '$19',
                            'monthly_plan_description' => 'Select the ideal plan that best suits your business needs.',
                            'monthly_plan_features'    => "1 website\nBasic support\nAccess to essential features\nLimited customization options",
                            'monthly_plan_button_text' => 'Get Started',
                            'monthly_plan_button_url'  => ['url' => '#'],
                        ],
                        [
                            'monthly_plan_title'       => 'Standard',
                            'monthly_plan_price'       => '$39',
                            'monthly_plan_description' => 'Select the ideal plan that best suits your business needs.',
                            'monthly_plan_features'    => "3 websites\nPriority support\nAdvanced analytics\nBasic SEO tools",
                            'monthly_plan_button_text' => 'Get Started',
                            'monthly_plan_button_url'  => ['url' => '#'],
                        ],
                        [
                            'monthly_plan_title'       => 'Pro',
                            'monthly_plan_price'       => '$69',
                            'monthly_plan_description' => 'Select the ideal plan that best suits your business needs.',
                            'monthly_plan_features'    => "10 websites\n24/7 support\nCustom integrations\nFull reporting & insights",
                            'monthly_plan_button_text' => 'Get Started',
                            'monthly_plan_button_url'  => ['url' => '#'],
                        ],
                    ],
                    'title_field' => '{{{ monthly_plan_title }}}',
                ]
            );

            // Yearly Plans Repeater
            $yearly_plan_repeater = new Repeater();

            $yearly_plan_repeater->add_control(
                'yearly_plan_title',
                [
                    'label'   => esc_html__('Plan Title', 'axero-toolkit'),
                    'type'    => Controls_Manager::TEXT,
                    'default' => 'Starter',
                ]
            );

            $yearly_plan_repeater->add_control(
                'yearly_plan_price',
                [
                    'label'   => esc_html__('Price', 'axero-toolkit'),
                    'type'    => Controls_Manager::TEXT,
                    'default' => '$199',
                ]
            );

            $yearly_plan_repeater->add_control(
                'yearly_plan_description',
                [
                    'label'   => esc_html__('Description', 'axero-toolkit'),
                    'type'    => Controls_Manager::TEXTAREA,
                    'default' => 'Select the ideal plan that best suits your business needs.',
                ]
            );

            $yearly_plan_repeater->add_control(
                'yearly_plan_features',
                [
                    'label'       => esc_html__('Features', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXTAREA,
                    'description' => esc_html__('One feature per line', 'axero-toolkit'),
                    'default'     => "1 website\nBasic support\nAccess to essential features\nLimited customization options",
                ]
            );

            $yearly_plan_repeater->add_control(
                'yearly_plan_button_text',
                [
                    'label'   => esc_html__('Button Text', 'axero-toolkit'),
                    'type'    => Controls_Manager::TEXT,
                    'default' => 'Get Started',
                ]
            );

            $yearly_plan_repeater->add_control(
                'yearly_plan_button_url',
                [
                    'label'   => esc_html__('Button URL', 'axero-toolkit'),
                    'type'    => Controls_Manager::URL,
                    'default' => [
                        'url' => '#',
                    ],
                ]
            );

            $this->add_control(
                'style2_yearly_plans',
                [
                    'label'       => esc_html__('Yearly Plans', 'axero-toolkit'),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $yearly_plan_repeater->get_controls(),
                    'default'     => [
                        [
                            'yearly_plan_title'       => 'Starter',
                            'yearly_plan_price'       => '$199',
                            'yearly_plan_description' => 'Select the ideal plan that best suits your business needs.',
                            'yearly_plan_features'    => "1 website\nBasic support\nAccess to essential features\nLimited customization options",
                            'yearly_plan_button_text' => 'Get Started',
                            'yearly_plan_button_url'  => ['url' => '#'],
                        ],
                        [
                            'yearly_plan_title'       => 'Standard',
                            'yearly_plan_price'       => '$399',
                            'yearly_plan_description' => 'Select the ideal plan that best suits your business needs.',
                            'yearly_plan_features'    => "3 websites\nPriority support\nAdvanced analytics\nBasic SEO tools",
                            'yearly_plan_button_text' => 'Get Started',
                            'yearly_plan_button_url'  => ['url' => '#'],
                        ],
                        [
                            'yearly_plan_title'       => 'Pro',
                            'yearly_plan_price'       => '$699',
                            'yearly_plan_description' => 'Select the ideal plan that best suits your business needs.',
                            'yearly_plan_features'    => "10 websites\n24/7 support\nCustom integrations\nFull reporting & insights",
                            'yearly_plan_button_text' => 'Get Started',
                            'yearly_plan_button_url'  => ['url' => '#'],
                        ],
                    ],
                    'title_field' => '{{{ yearly_plan_title }}}',
                ]
            );

            // Features Table Repeater (for both monthly/yearly)
            $features_table_repeater = new Repeater();

            $features_table_repeater->add_control(
                'feature_row_title',
                [
                    'label'   => esc_html__('Feature Title', 'axero-toolkit'),
                    'type'    => Controls_Manager::TEXT,
                    'default' => 'Customizable dashboard',
                ]
            );

            $features_table_repeater->add_control(
                'feature_row_values',
                [
                    'label'       => esc_html__('Feature Values (per plan)', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'label_block' => true,
                    'description' => esc_html__('Comma separated values for each plan (e.g. check,check,close)', 'axero-toolkit'),
                    'default'     => 'check,check,check',
                ]
            );

            $this->add_control(
                'style2_features_table',
                [
                    'label'       => esc_html__('Features Table', 'axero-toolkit'),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $features_table_repeater->get_controls(),
                    'default'     => [
                        [
                            'feature_row_title'  => 'Customizable dashboard',
                            'feature_row_values' => 'check,check,check',
                        ],
                        [
                            'feature_row_title'  => 'Advanced analytics tools',
                            'feature_row_values' => 'check,check,check',
                        ],
                        [
                            'feature_row_title'  => 'Exclusive beta access',
                            'feature_row_values' => 'close,check,check',
                        ],
                        [
                            'feature_row_title'  => 'Priority feature requests',
                            'feature_row_values' => 'close,check,check',
                        ],
                        [
                            'feature_row_title'  => 'Dedicated onboarding assistance',
                            'feature_row_values' => 'close,close,check',
                        ],
                        [
                            'feature_row_title'  => 'Collaborative tools',
                            'feature_row_values' => 'close,close,check',
                        ],
                    ],
                    'title_field' => '{{{ feature_row_title }}}',
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
                'book_button_style',
                [
                    'label'     => esc_html__('Book Button Style', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            $this->add_control(
                'book_button_bg_color',
                [
                    'label'     => esc_html__('Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing-table table thead tr th .user' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'book_button_border_color',
                [
                    'label'     => esc_html__('Border Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing-table table thead tr th .user' => 'border-color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'book_button_text_color',
                [
                    'label'     => esc_html__('Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing-table table thead tr th .user span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'book_button_typography',
                    'selector' => '{{WRAPPER}} .pricing-table table thead tr th .user span',
                ]
            );

            $this->add_control(
                'book_button_hover_color',
                [
                    'label'     => esc_html__('Hover Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing-table table thead tr th .user:hover span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_section();

            // Price Table Style Tab
            $this->start_controls_section(
                'price_table_style_section',
                [
                    'label'     => esc_html__('Price Table Style', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            // Table Border
            $this->add_control(
                'table_border_color',
                [
                    'label'     => esc_html__('Table Border Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing-table table, {{WRAPPER}} .pricing-table table th, {{WRAPPER}} .pricing-table table td' => 'border-color: {{VALUE}};',
                    ],
                ]
            );

            // Table Header Background
            $this->add_control(
                'table_head_bg_color',
                [
                    'label'     => esc_html__('Header Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing-table table thead tr th' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            // Table Header Text Color
            $this->add_control(
                'table_head_text_color',
                [
                    'label'     => esc_html__('Header Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing-table table thead tr th, {{WRAPPER}} .pricing-table table thead tr th span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Plan Price Color
            $this->add_control(
                'plan_price_color',
                [
                    'label'     => esc_html__('Plan Price Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing-table .price' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Plan Price Suffix Color
            $this->add_control(
                'plan_price_suffix_color',
                [
                    'label'     => esc_html__('Plan Price Suffix Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing-table .price span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Plan Button Style
            $this->add_control(
                'plan_button_heading',
                [
                    'label'     => esc_html__('Plan Button', 'axero-toolkit'),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'plan_button_bg_color',
                [
                    'label'     => esc_html__('Button Background', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing-table .default-btn.style-two' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'plan_button_text_color',
                [
                    'label'     => esc_html__('Button Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing-table .default-btn.style-two' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'plan_button_border_radius',
                [
                    'label'      => esc_html__('Button Border Radius', 'axero-toolkit'),
                    'type'       => Controls_Manager::SLIDER,
                    'size_units' => ['px', '%'],
                    'range'      => [
                        'px' => [
                            'min' => 0,
                            'max' => 50,
                        ],
                        '%'  => [
                            'min' => 0,
                            'max' => 50,
                        ],
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} .pricing-table .default-btn.style-two' => 'border-radius: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'plan_button_typography',
                    'selector' => '{{WRAPPER}} .pricing-table .default-btn.style-two',
                ]
            );

            // Feature Row Style
            $this->add_control(
                'feature_row_heading',
                [
                    'label'     => esc_html__('Feature Row', 'axero-toolkit'),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'feature_row_bg_color',
                [
                    'label'     => esc_html__('Row Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing-table table tbody tr' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'feature_row_text_color',
                [
                    'label'     => esc_html__('Row Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing-table table tbody tr td' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'feature_row_typography',
                    'selector' => '{{WRAPPER}} .pricing-table table tbody tr td',
                ]
            );

            // Icon Colors
            $this->add_control(
                'icon_check_color',
                [
                    'label'     => esc_html__('Check Icon Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing-table table tbody tr td i.ri-check-line' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'icon_close_color',
                [
                    'label'     => esc_html__('Close Icon Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing-table table tbody tr td i.ri-close-line' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_section();
            // Tab Switcher Style
            $this->start_controls_section(
                'style2_tab_switcher_style',
                [
                    'label'     => esc_html__('Tab Switcher Style', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style2',
                    ],
                ]
            );

            // Tab Background Color
            $this->add_control(
                'style2_tab_background_color',
                [
                    'label'     => esc_html__('Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing-tabs .nav-tabs .nav-item' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            // Tab Padding
            $this->add_control(
                'style2_tab_padding',
                [
                    'label'      => esc_html__('Padding', 'axero-toolkit'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pricing-tabs .nav-tabs .nav-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            // Active/Hover Tab Style
            $this->add_control(
                'style2_active_tab_style',
                [
                    'label'     => esc_html__('Active/Hover Tab Style', 'axero-toolkit'),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'style2_active_tab_background_color',
                [
                    'label'     => esc_html__('Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing-tabs .nav-tabs .nav-item:first-child .nav-link.active' => 'background-color: {{VALUE}};',
                        '{{WRAPPER}} .pricing-tabs .nav-tabs .nav-item .nav-link.active'             => 'background-color: {{VALUE}};',
                        '{{WRAPPER}} .pricing-tabs .nav-tabs .nav-item .nav-link:hover'              => 'background-color: {{VALUE}};',
                        '{{WRAPPER}} .pricing-tabs .nav-tabs .nav-item:last-child .nav-link.active'  => 'background-color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'style2_tab_text_color',
                [
                    'label'     => esc_html__('Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing-tabs .nav-tabs .nav-item .nav-link' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style2_tab_hover_text_color',
                [
                    'label'     => esc_html__('Hover Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing-tabs .nav-tabs .nav-item .nav-link:hover'  => 'color: {{VALUE}};',
                        '{{WRAPPER}} .pricing-tabs .nav-tabs .nav-item .nav-link.active' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style2_tab_typography',
                    'selector' => '{{WRAPPER}} .pricing-tabs .nav-tabs .nav-item .nav-link',
                ]
            );
            $this->end_controls_section();
            $this->start_controls_section(
                'style2_price_box_title_style',
                [
                    'label'     => esc_html__('Box Title Style', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style2',
                    ],
                ]
            );

            // Price Header Title
            $this->add_control(
                'style2_price_header_title_color',
                [
                    'label'     => esc_html__('Title Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-pricing-box .pricing-header span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style2_price_header_title_hover_color',
                [
                    'label'     => esc_html__('Title Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-pricing-box:hover .pricing-header span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style2_price_header_background_color',
                [
                    'label'     => esc_html__('Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-pricing-box .pricing-header span' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style2_price_header_hover_background_color',
                [
                    'label'     => esc_html__('Hover Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-pricing-box:hover .pricing-header span' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style2_price_header_typography',
                    'selector' => '{{WRAPPER}} .single-pricing-box .pricing-header span',
                ]
            );

            $this->end_controls_section();
            // Price Description Style
            $this->start_controls_section(
                'style2_price_description_style',
                [
                    'label'     => esc_html__('Price Description Style', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style2',
                    ],
                ]
            );

            $this->add_control(
                'style2_price_description_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-pricing-box .pricing-header p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style2_price_description_hover_color',
                [
                    'label'     => esc_html__('Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-pricing-box:hover .pricing-header p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style2_price_description_typography',
                    'selector' => '{{WRAPPER}} .single-pricing-box .pricing-header p',
                ]
            );

            $this->end_controls_section();
            // Price Style
            $this->start_controls_section(
                'style2_price_style',
                [
                    'label'     => esc_html__('Price Style', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style2',
                    ],
                ]
            );

            $this->add_control(
                'style2_price_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-pricing-box .price' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style2_price_hover_color',
                [
                    'label'     => esc_html__('Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-pricing-box:hover .price' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style2_price_typography',
                    'selector' => '{{WRAPPER}} .single-pricing-box .price',
                ]
            );

            $this->end_controls_section();

            // Features List Style
            $this->start_controls_section(
                'style2_features_list_style',
                [
                    'label'     => esc_html__('Features List Style', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style2',
                    ],
                ]
            );

            // Dot Background Color
            $this->add_control(
                'style2_dot_background_color',
                [
                    'label'     => esc_html__('Dot Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-pricing-box .pricing-features li::before' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            // Text Color
            $this->add_control(
                'style2_features_text_color',
                [
                    'label'     => esc_html__('Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-pricing-box .pricing-features li' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style2_features_typography',
                    'selector' => '{{WRAPPER}} .single-pricing-box .pricing-features li',
                ]
            );

            $this->end_controls_section();
            // Price Button Style
            $this->start_controls_section(
                'style2_price_button_style',
                [
                    'label'     => esc_html__('Price Button Style', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style2',
                    ],
                ]
            );

            // Normal State
            $this->add_control(
                'style2_button_normal_heading',
                [
                    'label' => esc_html__('Normal State', 'axero-toolkit'),
                    'type'  => Controls_Manager::HEADING,
                ]
            );

            $this->add_control(
                'style2_button_bg_color',
                [
                    'label'     => esc_html__('Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-pricing-box .default-btn' => 'background-color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style2_button_typography',
                    'selector' => '{{WRAPPER}} .single-pricing-box .default-btn',
                ]
            );
            $this->add_control(
                'style2_button_text_color',
                [
                    'label'     => esc_html__('Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-pricing-box .default-btn' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name'     => 'style2_button_border',
                    'selector' => '{{WRAPPER}} .single-pricing-box .default-btn',
                ]
            );
            $this->add_control(
                'style2_button_border_radius',
                [
                    'label'      => esc_html__('Border Radius', 'axero-toolkit'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .single-pricing-box .default-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            // Hover State
            $this->add_control(
                'style2_button_hover_heading',
                [
                    'label'     => esc_html__('Hover State', 'axero-toolkit'),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'style2_button_hover_bg_color',
                [
                    'label'     => esc_html__('Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-pricing-box:hover .default-btn' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style2_button_hover_text_color',
                [
                    'label'     => esc_html__('Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-pricing-box:hover .default-btn' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style2_button_hover_border_radius',
                [
                    'label'      => esc_html__('Border Radius', 'axero-toolkit'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .single-pricing-box:hover .default-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->end_controls_section();

            // Table Style
            $this->start_controls_section(
                'style2_table_style',
                [
                    'label'     => esc_html__('Table Style', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style2',
                    ],
                ]
            );

            // Table Header Style
            $this->add_control(
                'style2_table_header_style',
                [
                    'label' => esc_html__('Table Header', 'axero-toolkit'),
                    'type'  => Controls_Manager::HEADING,
                ]
            );

            $this->add_control(
                'style2_table_header_text_color',
                [
                    'label'     => esc_html__('Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing-features-table table thead th' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'style2_table_background_color',
                [
                    'label'     => esc_html__('Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing-features-table' => 'background-color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style2_table_row_typography',
                    'selector' => '{{WRAPPER}} .pricing-features-table table tbody tr',
                ]
            );
            $this->add_control(
                'style2_table_icon_color',
                [
                    'label'     => esc_html__('Icon Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing-features-table .table > :not(caption) > * > * i' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style2_table_icon_background_color',
                [
                    'label'     => esc_html__('Icon Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing-features-table .table > :not(caption) > * > * i' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style2_table_hover_icon_color',
                [
                    'label'     => esc_html__('Hover Icon Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing-features-table .table > tbody > tr:hover td i' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style2_table_hover_icon_background_color',
                [
                    'label'     => esc_html__('Hover Icon Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing-features-table .table > tbody > tr:hover td i' => 'background-color: {{VALUE}};',
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
<div class="pricing-area ">
    <div class="container">
        <div class="pricing-table table-responsive" data-cue="slideInUp">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th scope="col" class="fw-normal">
                            <a href="<?php echo esc_url($settings['book_button_url']['url']); ?>" class="user d-inline-block">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo esc_url($settings['book_user_image']['url']); ?>" class="rounded-circle" alt="user-image">
                                    <span class="d-block fw-medium">
                                        <?php echo esc_html($settings['book_button_text']); ?>
                                    </span>
                                </div>
                            </a>
                        </th>
                        <?php foreach ($settings['plans'] as $plan): ?>
                            <th scope="col" class="fw-normal">
                                <span class="d-block">
                                    <?php echo esc_html($plan['plan_title']); ?>
                                </span>
                                <div class="price lh-1 fw-medium">
                                    <?php echo esc_html($plan['plan_price']); ?>
                                    <span><?php echo esc_html($plan['plan_price_suffix']); ?></span>
                                </div>
                                <?php
                                    $button_url  = isset($plan['plan_button_url']['url']) ? $plan['plan_button_url']['url'] : '#';
                                                $is_external = ! empty($plan['plan_button_url']['is_external']) ? ' target="_blank"' : '';
                                                $nofollow    = ! empty($plan['plan_button_url']['nofollow']) ? ' rel="nofollow"' : '';
                                            ?>
                                <a href="<?php echo esc_url($button_url); ?>" class="default-btn style-two"<?php echo $is_external . $nofollow; ?>>
                                    <?php echo esc_html($plan['plan_button_text']); ?>
                                </a>
                            </th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($settings['features'] as $feature): ?>
                        <tr>
                            <td>
                                <?php echo esc_html($feature['feature_title']); ?>
                            </td>
                            <?php
                                $values = array_map('trim', explode(',', $feature['feature_values']));
                                            foreach ($values as $i => $value):
                                                // If the value is 'check' or 'close', show icon, else show as text
                                                if (strtolower($value) === 'check') {
                                                    echo '<td><i class="ri-check-line"></i></td>';
                                                } elseif (strtolower($value) === 'close') {
                                                echo '<td><i class="ri-close-line"></i></td>';
                                            } else {
                                                echo '<td class="fw-medium">' . esc_html($value) . '</td>';
                                            }
                                            endforeach;
                                        ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

        <?php
            } elseif ($settings['style_selection'] === 'style2') {
                    ?>
        <!-- style 2 -->
        <div class="pricing-area pt-80 pb-150">
            <div class="container">
            <div class="pricing-tabs" data-cue="slideInUp">
                <ul class="nav nav-tabs d-block text-center border-0" id="myTab" role="tablist">
                <li class="nav-item d-inline-block" role="presentation">
                    <button class="nav-link d-block border-0 active" id="monthly-tab" data-bs-toggle="tab" data-bs-target="#monthly-tab-pane" type="button" role="tab" aria-controls="monthly-tab-pane" aria-selected="true">
                    <?php echo esc_html__('Monthly', 'axero-toolkit'); ?>
                    </button>
                </li>
                <li class="nav-item d-inline-block" role="presentation">
                    <button class="nav-link d-block border-0" id="yearly-tab" data-bs-toggle="tab" data-bs-target="#yearly-tab-pane" type="button" role="tab" aria-controls="yearly-tab-pane" aria-selected="false">
                    <?php echo esc_html__('Yearly', 'axero-toolkit'); ?>
                    </button>
                </li>
                </ul>
                <span class="discount d-block text-center">
                <?php
                    // Allow span for styling
                                echo wp_kses($settings['style2_discount_text'], ['span' => []]);
                            ?>
                </span>
                <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="monthly-tab-pane" role="tabpanel" tabindex="0">
                    <div class="row justify-content-center">
                    <?php foreach ($settings['style2_monthly_plans'] as $plan): ?>
                        <div class="col-lg-4 col-md-6">
                        <div class="single-pricing-box">
                            <div class="pricing-header">
                            <span class="d-inline-block fw-semibold">
                                <?php echo esc_html($plan['monthly_plan_title']); ?>
                            </span>
                            <p>
                                <?php echo esc_html($plan['monthly_plan_description']); ?>
                            </p>
                            </div>
                            <div class="price fw-medium lh-1">
                            <?php echo esc_html($plan['monthly_plan_price']); ?>
                            </div>
                            <ul class="pricing-features ps-0 list-unstyled mb-0">
                            <?php
                                $features = preg_split('/\r\n|\r|\n/', $plan['monthly_plan_features']);
                                            foreach ($features as $feature):
                                                if (trim($feature) !== ''):
                                            ?>
			                                <li class="position-relative">
			                                <?php echo esc_html($feature); ?>
			                                </li>
			                            <?php
                                            endif;
                                                        endforeach;
                                                    ?>
                            </ul>
                            <?php
                                $button_url  = isset($plan['monthly_plan_button_url']['url']) ? $plan['monthly_plan_button_url']['url'] : '#';
                                            $is_external = ! empty($plan['monthly_plan_button_url']['is_external']) ? ' target="_blank"' : '';
                                            $nofollow    = ! empty($plan['monthly_plan_button_url']['nofollow']) ? ' rel="nofollow"' : '';
                                        ?>
                            <a href="<?php echo esc_url($button_url); ?>" class="default-btn style-two d-block w-100 text-center"<?php echo $is_external . $nofollow; ?>>
                            <?php echo esc_html($plan['monthly_plan_button_text']); ?>
                            </a>
                        </div>
                        </div>
                    <?php endforeach; ?>
                    </div>
                    <div class="pricing-features-table table-responsive">
                    <table class="table mb-0">
                        <thead>
                        <tr>
                            <th scope="col"></th>
                            <?php foreach ($settings['style2_monthly_plans'] as $plan): ?>
                            <th scope="col">
                                <?php echo esc_html($plan['monthly_plan_title']); ?>
                            </th>
                            <?php endforeach; ?>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($settings['style2_features_table'] as $feature): ?>
                            <tr>
                            <th scope="row">
                                <?php echo esc_html($feature['feature_row_title']); ?>
                            </th>
                            <?php
                                $values = array_map('trim', explode(',', $feature['feature_row_values']));
                                            foreach ($values as $value):
                                                if (strtolower($value) === 'check') {
                                                    echo '<td><i class="ri-check-line"></i></td>';
                                                } elseif (strtolower($value) === 'close') {
                                                echo '<td><i class="ri-close-line"></i></td>';
                                            } else {
                                                echo '<td class="fw-medium">' . esc_html($value) . '</td>';
                                            }
                                            endforeach;
                                        ?>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="yearly-tab-pane" role="tabpanel" tabindex="0">
                    <div class="row justify-content-center">
                    <?php foreach ($settings['style2_yearly_plans'] as $plan): ?>
                        <div class="col-lg-4 col-md-6">
                        <div class="single-pricing-box">
                            <div class="pricing-header">
                            <span class="d-inline-block fw-semibold">
                                <?php echo esc_html($plan['yearly_plan_title']); ?>
                            </span>
                            <p>
                                <?php echo esc_html($plan['yearly_plan_description']); ?>
                            </p>
                            </div>
                            <div class="price fw-medium lh-1">
                            <?php echo esc_html($plan['yearly_plan_price']); ?>
                            </div>
                            <ul class="pricing-features ps-0 list-unstyled mb-0">
                            <?php
                                $features = preg_split('/\r\n|\r|\n/', $plan['yearly_plan_features']);
                                            foreach ($features as $feature):
                                                if (trim($feature) !== ''):
                                            ?>
			                                <li class="position-relative">
			                                <?php echo esc_html($feature); ?>
			                                </li>
			                            <?php
                                            endif;
                                                        endforeach;
                                                    ?>
                            </ul>
                            <?php
                                $button_url  = isset($plan['yearly_plan_button_url']['url']) ? $plan['yearly_plan_button_url']['url'] : '#';
                                            $is_external = ! empty($plan['yearly_plan_button_url']['is_external']) ? ' target="_blank"' : '';
                                            $nofollow    = ! empty($plan['yearly_plan_button_url']['nofollow']) ? ' rel="nofollow"' : '';
                                        ?>
                            <a href="<?php echo esc_url($button_url); ?>" class="default-btn style-two d-block w-100 text-center"<?php echo $is_external . $nofollow; ?>>
                            <?php echo esc_html($plan['yearly_plan_button_text']); ?>
                            </a>
                        </div>
                        </div>
                    <?php endforeach; ?>
                    </div>
                    <div class="pricing-features-table table-responsive">
                    <table class="table mb-0">
                        <thead>
                        <tr>
                            <th scope="col"></th>
                            <?php foreach ($settings['style2_yearly_plans'] as $plan): ?>
                            <th scope="col">
                                <?php echo esc_html($plan['yearly_plan_title']); ?>
                            </th>
                            <?php endforeach; ?>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($settings['style2_features_table'] as $feature): ?>
                            <tr>
                            <th scope="row">
                                <?php echo esc_html($feature['feature_row_title']); ?>
                            </th>
                            <?php
                                $values = array_map('trim', explode(',', $feature['feature_row_values']));
                                            foreach ($values as $value):
                                                if (strtolower($value) === 'check') {
                                                    echo '<td><i class="ri-check-line"></i></td>';
                                                } elseif (strtolower($value) === 'close') {
                                                echo '<td><i class="ri-close-line"></i></td>';
                                            } else {
                                                echo '<td class="fw-medium">' . esc_html($value) . '</td>';
                                            }
                                            endforeach;
                                        ?>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
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

    $widgets_manager->register(new axero_price_table());