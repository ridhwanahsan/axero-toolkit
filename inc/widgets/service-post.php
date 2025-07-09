<?php
    namespace lunex_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class Lunex_service_post extends Widget_Base
    {

        public function get_name()
        {
            return 'Lunex-service-post';
        }

        public function get_title()
        {
            return __('Service post', 'lunex-toolkit');
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
        protected function get_post_categories()
        {
            $categories = get_terms([
                'taxonomy' => 'services_category',
                'hide_empty' => false,
                'hierarchical' => true,
                'orderby' => 'name',
                'order' => 'ASC',
            ]);
            $options = [];

            if (!empty($categories) && !is_wp_error($categories)) {
                foreach ($categories as $category) {
                    $options[$category->term_id] = $category->name;
                }
            }

            return $options;
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
                        'style3' => esc_html__('Style 3', 'lunex-toolkit'),
                        'style4' => esc_html__('Style 4', 'lunex-toolkit'),
                        'style5' => esc_html__('Style 5', 'lunex-toolkit'),
                    ],
                ]
            );

            $this->end_controls_section();

            // service Filter Controls
            $this->start_controls_section(
                'post_filter_section',
                [
                    'label' => esc_html__('service Filter', 'lunex-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'posts_per_page',
                [
                    'label'   => esc_html__('services Per Page', 'lunex-toolkit'),
                    'type'    => Controls_Manager::NUMBER,
                    'default' => 6,
                    'min'     => 1,
                    'max'     => 24,
                ]
            );

            $this->add_control(
                'orderby',
                [
                    'label'   => esc_html__('Order By', 'lunex-toolkit'),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'date',
                    'options' => [
                        'date'          => esc_html__('Date', 'lunex-toolkit'),
                        'title'         => esc_html__('Title', 'lunex-toolkit'),
                        'rand'          => esc_html__('Random', 'lunex-toolkit'),
                        'comment_count' => esc_html__('Comment Count', 'lunex-toolkit'),
                    ],
                ]
            );

            $this->add_control(
                'order',
                [
                    'label'   => esc_html__('Order', 'lunex-toolkit'),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'DESC',
                    'options' => [
                        'ASC'  => esc_html__('Ascending', 'lunex-toolkit'),
                        'DESC' => esc_html__('Descending', 'lunex-toolkit'),
                    ],
                ]
            );

            $this->add_control(
                'category_filter',
                [
                    'label'       => esc_html__('Filter by Category', 'lunex-toolkit'),
                    'type'        => Controls_Manager::SELECT2,
                    'options'     => $this->get_post_categories(),
                    'multiple'    => true,
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'exclude_posts',
                [
                    'label'       => esc_html__('Exclude services', 'lunex-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'description' => esc_html__('Enter post IDs separated by commas', 'lunex-toolkit'),
                ]
            );

            $this->end_controls_section();

        }

        protected function style_tab_content()
        {
            // content style controls tab
        $this->start_controls_section(
            'content_style',
            [
                'label' => esc_html__('Content Style', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                 'condition' => [
                'style_selection' => 'style1',
                 ],
            ],
           
            
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services-list-style-two h3 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_hover_color',
            [
                'label' => esc_html__('Title Hover Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services-list-style-two h3 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .services-list-style-two h3',
            ]
        );

        $this->add_control(
            'excerpt_color',
            [
                'label' => esc_html__('Excerpt Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services-list-style-two p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'excerpt_typography',
                'selector' => '{{WRAPPER}} .services-list-style-two p',
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'button_style',
            [
                'label' => esc_html__('Button Style', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                  'condition' => [
                'style_selection' => 'style1',
                 ],
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => esc_html__('Background Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services-list-style-two .item .link-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_bg_color',
            [
                'label' => esc_html__('Hover Background Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services-list-style-two .item:hover.link-btn' => 'background-color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__('Icon Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services-list-style-two .item .link-btn i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_hover_color',
            [
                'label' => esc_html__('Icon Hover Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .item .services-list-style-two .item .link-btn:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
        // Style 4 Controls
        $this->start_controls_section(
            'style4_content_style',
            [
                'label' => esc_html__('Style 4 Content', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style4',
                ],
            ]
        );

        // Title Style
        $this->add_control(
            'style4_title_heading',
            [
                'label' => esc_html__('Title', 'lunex-toolkit'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'style4_title_color',
            [
                'label' => esc_html__('Title Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} a.post-title' => 'color: {{VALUE}};', 
                ],
            ]
        );

        $this->add_control(
            'style4_title_hover_color',
            [
                'label' => esc_html__('Title Hover Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} a.post-title:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style4_title_typography',
                'selector' => '{{WRAPPER}} a.post-title',
            ]
        );

        // Description Style
        $this->add_control(
            'style4_description_heading',
            [
                'label' => esc_html__('Description', 'lunex-toolkit'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'style4_description_color',
            [
                'label' => esc_html__('Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awesome_services_list .item_box .content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style4_description_typography',
                'selector' => '{{WRAPPER}} .awesome_services_list .item_box .content p',
            ]
        );

        // Icon Style
        $this->add_control(
            'style4_icon_heading',
            [
                'label' => esc_html__('Icon', 'lunex-toolkit'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        ); 

        $this->add_control(
            'style4_details_link_btn_color',
            [
                'label' => esc_html__('Details Link Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awesome_services_list .item_box .content .details_link_btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'style4_details_link_btn_hover_color',
            [
                'label' => esc_html__('Details Link Hover Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awesome_services_list .item_box .content .details_link_btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'style4_details_link_btn_bg_color',
            [
                'label' => esc_html__('Details Link Background', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awesome_services_list .item_box .content .details_link_btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'style4_details_link_btn_hover_bg_color',
            [
                'label' => esc_html__('Details Link Hover Background', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awesome_services_list .item_box .content .details_link_btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'style5_service_style',
            [
                'label' => esc_html__('Style 5 Service Style', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => ['style5'],
                ],
            ]
        );

        // Start Tabs
        $this->start_controls_tabs('style5_service_tabs');

        // Normal Tab
        $this->start_controls_tab(
            'style5_normal_tab',
            [
                'label' => esc_html__('Normal', 'lunex-toolkit'),
            ]
        );
        // Margin Control
        $this->add_responsive_control(
            'style5_service_margin',
            [
                'label' => esc_html__('Margin', 'lunex-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .service_item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Padding Control
        $this->add_responsive_control(
            'style5_service_padding',
            [
                'label' => esc_html__('Padding', 'lunex-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .service_item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Background Color
        $this->add_control(
            'style5_service_bg_color',
            [
                'label' => esc_html__('Background Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service_item' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Border Color
        $this->add_control(
            'style5_service_border_color',
            [
                'label' => esc_html__('Border Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service_item' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        // Title Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style5_title_typography',
                'label' => esc_html__('Title Typography', 'lunex-toolkit'),
                'selector' => '{{WRAPPER}} .service_item h3',
            ]
        );

        // Title Color
        $this->add_control(
            'style5_title_color',
            [
                'label' => esc_html__('Title Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service_item h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Content Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style5_content_typography',
                'label' => esc_html__('Content Typography', 'lunex-toolkit'),
                'selector' => '{{WRAPPER}} .service_item .content p',
            ]
        );

        // Content Color
        $this->add_control(
            'style5_content_color',
            [
                'label' => esc_html__('Content Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service_item .content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        // Hover Tab
        $this->start_controls_tab(
            'style5_hover_tab',
            [
                'label' => esc_html__('Hover', 'lunex-toolkit'),
            ]
        );

        // Hover Background Color
        $this->add_control(
            'style5_service_hover_bg_color',
            [
                'label' => esc_html__('Background Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service_item:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Title Hover Color
        $this->add_control(
            'style5_title_hover_color',
            [
                'label' => esc_html__('Title Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service_item:hover h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        // Button Tab
        $this->start_controls_tab(
            'style5_button_tab',
            [
                'label' => esc_html__('Button', 'lunex-toolkit'),
            ]
        );

        // Button Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style5_button_typography',
                'label' => esc_html__('Button Typography', 'lunex-toolkit'),
                'selector' => '{{WRAPPER}} .service_item .content .details_link_btn',
            ]
        );

        // Button Color
        $this->add_control(
            'style5_button_color',
            [
                'label' => esc_html__('Text Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service_item .content .details_link_btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Button Background Color
        $this->add_control(
            'style5_button_bg_color',
            [
                'label' => esc_html__('Background', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service_item .content .details_link_btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Active/Hover Button Styles
        $this->add_control(
            'style5_button_active_hover',
            [
                'label' => esc_html__('Active/Hover Styles', 'lunex-toolkit'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'style5_button_active_hover_color',
            [
                'label' => esc_html__('Text Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service_item.active .content .details_link_btn, {{WRAPPER}} .service_item:hover .content .details_link_btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'style5_button_active_hover_bg_color',
            [
                'label' => esc_html__('Background', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service_item.active .content .details_link_btn, {{WRAPPER}} .service_item:hover .content .details_link_btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'style5_button_active_hover_border_color',
            [
                'label' => esc_html__('Border Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service_item.active .content .details_link_btn, {{WRAPPER}} .service_item:hover .content .details_link_btn' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        // Image Style Section
        $this->start_controls_section(
            'style_image_section',
            [
                'label' => esc_html__('Image Style', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => ['style5'],
                ],
            ]
        );

        // Normal State Tab
        $this->start_controls_tabs('image_style_tabs');

        $this->start_controls_tab(
            'image_normal_tab',
            [
                'label' => esc_html__('Normal', 'lunex-toolkit'),
            ]
        );

        // Image Width Control
        $this->add_responsive_control(
            'image_width',
            [
                'label' => esc_html__('Width', 'lunex-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .service_item .image img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Image Height Control
        $this->add_responsive_control(
            'image_height',
            [
                'label' => esc_html__('Height', 'lunex-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .service_item .image img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Image Border Control
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'image_border',
                'selector' => '{{WRAPPER}} .service_item .image img',
            ]
        );

        // Image Border Radius Control
        $this->add_responsive_control(
            'image_border_radius',
            [
                'label' => esc_html__('Border Radius', 'lunex-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .service_item .image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        // Hover State Tab
        $this->start_controls_tab(
            'image_hover_tab',
            [
                'label' => esc_html__('Hover', 'lunex-toolkit'),
            ]
        );

        // Hover Image Width Control
        $this->add_responsive_control(
            'image_hover_width',
            [
                'label' => esc_html__('Width', 'lunex-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .service_item:hover .image img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Hover Image Height Control
        $this->add_responsive_control(
            'image_hover_height',
            [
                'label' => esc_html__('Height', 'lunex-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .service_item:hover .image img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Hover Image Border Control
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'image_hover_border',
                'selector' => '{{WRAPPER}} .service_item:hover .image img',
            ]
        );

        // Hover Image Border Radius Control
        $this->add_responsive_control(
            'image_hover_border_radius',
            [
                'label' => esc_html__('Border Radius', 'lunex-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .service_item:hover .image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        // Style 2 Number Controls
        $this->start_controls_section(
            'style2_number_style',
            [
                'label' => esc_html__('Style 2 Number Style', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style2',
                ],
            ]
        );

        // Number Color
        $this->add_control(
            'style2_number_color',
            [
                'label' => esc_html__('Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services-list .item .number' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Number Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style2_number_typography',
                'selector' => '{{WRAPPER}} .services-list .item .number',
            ]
        );

        // Number Border Color
        $this->add_control(
            'style2_number_border_color',
            [
                'label' => esc_html__('Border Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services-list .item .number' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style 2 Title Controls
        $this->start_controls_section(
            'style2_title_style',
            [
                'label' => esc_html__('Style 2 Title Style', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style2',
                ],
            ]
        );

        // Title Color
        $this->add_control(
            'style2_title_color',
            [
                'label' => esc_html__('Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services-list .item h3 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Title Hover Color
        $this->add_control(
            'style2_title_hover_color',
            [
                'label' => esc_html__('Hover Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services-list .item h3 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Title Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style2_title_typography',
                'selector' => '{{WRAPPER}} .services-list .item h3 a',
            ]
        );

        $this->end_controls_section();

        // Style 2 Line Background Controls
        $this->start_controls_section(
            'style2_line_background_style',
            [
                'label' => esc_html__('Style 2 Line Background', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style2',
                ],
            ]
        );

        // Line Background Color
        $this->add_control(
            'style2_line_background_color',
            [
                'label' => esc_html__('Background Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services-list .item::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
        // Style 3 Item Background Controls
        $this->start_controls_section(
            'style3_item_background_style',
            [
                'label' => esc_html__('Style 3 Item Background', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style3',
                ],
            ]
        );

        // Background Color
        $this->add_control(
            'style3_item_background_color',
            [
                'label' => esc_html__('Background Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service-item' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Border Color
        $this->add_control(
            'style3_item_border_color',
            [
                'label' => esc_html__('Border Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service-item' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        // Border Radius
        $this->add_control(
            'style3_item_border_radius',
            [
                'label' => esc_html__('Border Radius', 'lunex-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .single-service-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style 3 Link Button Controls
        $this->start_controls_section(
            'style3_link_button_style',
            [
                'label' => esc_html__('Style 3 Link Button', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style3',
                ],
            ]
        );

        // Button Color
        $this->add_control(
            'style3_link_button_color',
            [
                'label' => esc_html__('Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service-item .link-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Button Background Color
        $this->add_control(
            'style3_link_button_bg_color',
            [
                'label' => esc_html__('Background Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service-item .link-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Button Hover Color
        $this->add_control(
            'style3_link_button_hover_color',
            [
                'label' => esc_html__('Hover Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service-item:hover .link-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Button Hover Background Color
        $this->add_control(
            'style3_link_button_hover_bg_color',
            [
                'label' => esc_html__('Hover Background Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service-item:hover .link-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style 3 Title Controls
        $this->start_controls_section(
            'style3_title_style',
            [
                'label' => esc_html__('Style 3 Title', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style3',
                ],
            ]
        );

        // Title Color
        $this->add_control(
            'style3_title_color',
            [
                'label' => esc_html__('Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service-item h3 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Title Hover Color
        $this->add_control(
            'style3_title_hover_color',
            [
                'label' => esc_html__('Hover Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service-item h3 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Title Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style3_title_typography',
                'selector' => '{{WRAPPER}} .single-service-item h3 a',
            ]
        );

        $this->end_controls_section();

        // Style 3 Description Controls
        $this->start_controls_section(
            'style3_description_style',
            [
                'label' => esc_html__('Style 3 Description', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style3',
                ],
            ]
        );

        // Description Color
        $this->add_control(
            'style3_description_color',
            [
                'label' => esc_html__('Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service-item p:last-child' => 'color: {{VALUE}};',
                ],
            ]
        );
        // Description Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style3_description_typography',
                'selector' => '{{WRAPPER}} .single-service-item p:last-child',
            ]
        );

        $this->end_controls_section();

        // Style 3 Line Background Controls
        $this->start_controls_section(
            'style3_line_background_style',
            [
                'label' => esc_html__('Style 3 Line Background', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style3',
                ],
            ]
        );

        // Line Background Color
        $this->add_control(
            'style3_line_background_color',
            [
                'label' => esc_html__('Background Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service-item::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
        }

        protected function render()
        {
            $settings   = $this->get_settings_for_display();
            $query_args = [
                'post_type'      => 'services',
                'posts_per_page' => $settings['posts_per_page'] ? $settings['posts_per_page'] : 3,
                'orderby'        => $settings['orderby'] ? $settings['orderby'] : 'date',
                'order'          => $settings['order'] ? $settings['order'] : 'DESC',
                'post_status'    => 'publish', // Ensure only published posts are queried
            ];

            // Add category filter if set
            if (! empty($settings['category_filter'])) {
                $query_args['category__in'] = $settings['category_filter'];
            }

            // Add post exclusion if set
            if (! empty($settings['exclude_posts'])) {
                $query_args['post__not_in'] = array_map('intval', explode(',', $settings['exclude_posts']));
            }

            $query    = new \WP_Query($query_args);
            $open_job = get_field('open_job') ?: '2 open roles';

            if ($settings['style_selection'] === 'style1') {
            ?>
<!-- style 1 -->
 <div class="services-area ">
       <div class="services-list-style-two">
            <?php if ($query->have_posts()): 
                while ($query->have_posts()): $query->the_post(); ?>
                    <div class="item position-relative">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-5">
                                <h3>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                            </div>
                            <div class="col-lg-4 col-md-5">
                                <p>
                                    <?php echo get_the_excerpt(); ?>
                                </p>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <div class="text-md-end">
                                    <a href="<?php the_permalink(); ?>" class="link-btn d-inline-block position-relative text-center rounded-circle">
                                        <i class="ri-arrow-right-up-line"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php if (has_post_thumbnail()): ?>
                        <a href="<?php the_permalink(); ?>" class="image d-block">
                            <?php the_post_thumbnail('full', ['alt' => get_the_title()]); ?>
                        </a>
                        <?php endif; ?>
                    </div>
                <?php endwhile; 
                wp_reset_postdata();
            else: ?>
                <p><?php esc_html_e('No services found.', 'lunex-toolkit'); ?></p>
            <?php endif; ?>
          </div>
        </div>
    <?php
        } elseif ($settings['style_selection'] === 'style2') {
                ?>
<!-- style 2 -->
        <div class="services-area pb-150">
            <div class="container">
                <div class="services-list" data-cues="slideInUp">
                    <?php if ($query->have_posts()): 
                        $count = 1;
                        while ($query->have_posts()): $query->the_post(); ?>
                            <div class="item position-relative">
                                <div class="number d-inline-block rounded-circle">
                                    <?php echo str_pad($count++, 2, '0', STR_PAD_LEFT); ?>
                                </div>
                                <h3 class="mb-0 fw-normal">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                                <a href="<?php the_permalink(); ?>" class="link-btn d-inline-block lh-1">
                                    <i class="ri-arrow-right-up-line"></i>
                                </a>
                                <?php if (has_post_thumbnail()): ?>
                                <a href="<?php the_permalink(); ?>" class="image d-block">
                                    <?php the_post_thumbnail('full', ['alt' => get_the_title()]); ?>
                                </a>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; 
                        wp_reset_postdata();
                    else: ?>
                        <p><?php esc_html_e('No services found.', 'lunex-toolkit'); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>


<?php
    } elseif ($settings['style_selection'] === 'style3') {
            ?>
<!-- style 3 -->
   <div class="services-area position-relative z-1">
       <div class="container">
           <div class="row">
               <div class="row" data-cues="slideInUp">
                   <?php if ($query->have_posts()): 
                       while ($query->have_posts()): $query->the_post(); ?>
                           <div class="col-lg-6 col-sm-6">
                               <div class="single-service-item">
                                   <a href="<?php the_permalink(); ?>" class="link-btn d-inline-block rounded-circle text-center">
                                       <i class="ri-arrow-right-up-line"></i>
                                   </a>
                                   <h3 class="fw-normal">
                                       <a href="<?php the_permalink(); ?>">
                                           <?php the_title(); ?>
                                       </a>
                                   </h3>
                                   <p>
                                       <?php echo get_the_excerpt(); ?>
                                   </p>
                               </div>
                           </div>
                       <?php endwhile; 
                       wp_reset_postdata();
                   else: ?>
                       <p><?php esc_html_e('No services found.', 'lunex-toolkit'); ?></p>
                   <?php endif; ?>
               </div>
           </div>
       </div>
   </div>


<?php  } elseif ($settings['style_selection'] === 'style4') { 
    
    ?>
    <!-- style 4 -->
    
    <div class="awesome_services_area ">
        <div class="row">
            <div class="col-lg-5">
                <div class="awesome_services_image text-center position-sticky">
                    <?php 
                            // Get a random post thumbnail (image) from the same post type
                            $args = [
                                'post_type' => 'services', // Replace with your actual post type
                                'posts_per_page' => 1,
   
                                'orderby' => 'rand',
                                'post__not_in' => [get_the_ID()], // Exclude the current post
                            ];
                            $random_post_query = new \WP_Query($args); // Ensure proper namespace for WP_Query

                            if ($random_post_query->have_posts()) {
                                while ($random_post_query->have_posts()) {
                                    $random_post_query->the_post();
                                    if (has_post_thumbnail()) {
                                        echo get_the_post_thumbnail(get_the_ID(), 'full', ['alt' => esc_attr(get_the_title())]); // Use esc_attr for the alt attribute
                                    } else {
                                        // Fallback image if no post thumbnail is set
                                        echo '<img src="' . esc_url(get_template_directory_uri() . '/assets/images/default-service.png') . '" alt="' . esc_attr__('Default Service Image', 'lunex-toolkit') . '">';
                                    }
                                }
                                wp_reset_postdata();
                            } else {
                                // Fallback image if no random post found
                                echo '<img src="' . esc_url(get_template_directory_uri() . '/assets/images/default-service.png') . '" alt="' . esc_attr__('Default Service Image', 'lunex-toolkit') . '">';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="awesome_services_list" data-cues="slideInUp" data-group="awesome_services_list">
                             <?php if ($query->have_posts()): 
                       while ($query->have_posts()): $query->the_post(); ?>
                            <div class="item_box">
                                <div class="row">
                                    <div class="col-xl-3">
                                        <div class="text d-flex align-items-center">
                                            <div class="dot rounded-circle"></div>
                                            <div class="number fw-medium">
                                                <?php echo esc_html(get_post_field('post_number', get_the_ID())); // Assuming a custom field for numbering ?>
                                            </div>
                                            <span class="d-block sub_title fw-medium">
                                                <?php echo esc_html(get_post_meta(get_the_ID(), 'service_category', true)); // Assuming a custom field for category ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-xl-9">
                                        <div class="content position-relative">
                                            <h3 class="text-uppercase">
                                                <a href="<?php the_permalink(); ?>" class="post-title">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h3>
                                            <p>
                                                <?php echo esc_html(get_the_excerpt()); ?>
                                            </p>
                                            <a href="<?php the_permalink(); ?>" class="details_link_btn d-flex align-items-center justify-content-center">
                                                <i class="ri-arrow-right-up-line"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <?php endwhile; 
                       wp_reset_postdata();
                   else: ?>
                       <p><?php esc_html_e('No services found.', 'lunex-toolkit'); ?></p>
                   <?php endif; ?>
                        </div>
                    </div>
                </div>
         </div>

    <?php } elseif ($settings['style_selection'] === 'style5') { 
    ?> 
        <!-- style 5 -->
        <div class="services_area position-relative z-1">
            <div class="container-fluid px-0 max-w-full" data-cues="slideInUp" data-group="services_list">
                <?php if ($query->have_posts()): 
                    while ($query->have_posts()): $query->the_post(); ?>
                        <div class="service_item position-relative">
                            <div class="container-fluid max_w_1560px position-relative">
                                <div class="row align-items-center mx-0">
                                    <div class="col-lg-5 order-2 order-lg-1 px-0">
                                        <h3 class="mb-0">
                                            <?php the_title(); ?>
                                        </h3>
                                    </div>
                                    <div class="col-lg-2 order-1 order-lg-2 px-0">
                                        <div class="number lh-1 fw-bold">
                                            <?php echo esc_html(get_post_field('post_number', get_the_ID())); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 order-3 order-lg-3 px-0">
                                        <div class="content position-relative">
                                            <p class="mb-0">
                                                <?php echo esc_html(get_the_excerpt()); ?>
                                            </p>
                                            <a href="<?php the_permalink(); ?>" class="details_link_btn">
                                                <i class="ri-arrow-right-up-line"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="image">
                                    <?php if (has_post_thumbnail()): ?>
                                        <?php the_post_thumbnail(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="position-absolute z-1 start-0 end-0 top-0 bottom-0"></a>
                        </div>
                    <?php endwhile; 
                    wp_reset_postdata();
                else: ?>
                    <p><?php esc_html_e('No services found.', 'lunex-toolkit'); ?></p>
                <?php endif; ?>
            </div>
        </div>
    <?php
    }
        }
    }

$widgets_manager->register(new Lunex_service_post());