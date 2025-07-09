<?php
    namespace lunex_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class lunex_heading_title extends Widget_Base
    {

        public function get_name()
        {
            return 'Header-heading-title';
        }

        public function get_title()
        {
            return __('Heading Title', 'lunex-toolkit');
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
                        'style3' => esc_html__('Style 3', 'lunex-toolkit'),
                        'style4' => esc_html__('Style 4', 'lunex-toolkit'),
                        'style5' => esc_html__('Style 5', 'lunex-toolkit'),
                        'style6' => esc_html__('Style 6', 'lunex-toolkit'),
                    ],
                ]
            );

            $this->end_controls_section();
            
        $this->start_controls_section(
            'title_section',
            [
                'label' => esc_html__('Title', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'style_selection' => 'style1',
                ],
            ]
        );

        $this->add_control(
            'main_title',
            [
                'label'       => esc_html__('Main Title', 'lunex-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__('Our innovative', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label'       => esc_html__('2nd Title', 'lunex-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__('creative solutions', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'style2_content',
            [
                'label' => esc_html__('Style 2 Content', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'style_selection' => 'style2',
                ],
            ]
        );

        $this->add_control(
            'text_one',
            [
                'label'       => esc_html__('Text One', 'lunex-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__('Create', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'text_two',
            [
                'label'       => esc_html__('Text Two', 'lunex-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__('transform', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'text_three',
            [
                'label'       => esc_html__('Text Three', 'lunex-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__('& code', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'shape_image_one',
            [
                'label' => esc_html__('Shape Image One', 'lunex-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/shapes/border1.svg',
                ],
            ]
        );

        $this->add_control(
            'shape_image_two',
            [
                'label' => esc_html__('Shape Image Two', 'lunex-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/shapes/border2.svg',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style3_content_tab',
            [
                'label' => esc_html__('Style 3 Content', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'style_selection' => 'style3',
                ],
            ]
        );

        $this->add_control(
            'style3_main_title',
            [
                'label'       => esc_html__('Main Title', 'lunex-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__('Welcome to Style 3', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'style3_sub_title',
            [
                'label'       => esc_html__('Sub Title', 'lunex-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__('Experience the difference', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

         

        $this->add_control(
            'style3_background_image',
            [
                'label' => esc_html__('Background Image', 'lunex-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/videos/video3.jpg
',
                ],
            ]
        );

        $this->end_controls_section();


        // Style 4 Content Tab
        $this->start_controls_section(
            'style4_content_tab',
            [
                'label' => esc_html__('Style 4 + 5 Content', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'style_selection' => ['style4', 'style5'],
                ],
            ]
        );

       $this->add_control(
            'style4_main_title',
            [
                'label'       => esc_html__('Main Title', 'lunex-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__('We', 'lunex-toolkit'),
                'label_block' => true,
            ] 
        );

        $this->add_control(
            'style4_image',
            [
                'label'   => esc_html__('Inline Image', 'lunex-toolkit'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/banners/circle2.png',
                ],
            ]
        );

        $this->add_control(
            'style4_sub_title',
            [
                'label'       => esc_html__('Sub Title', 'lunex-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__('Design Creative Ideas', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();


        // Style 6 Content Tab
        $this->start_controls_section(
            'style6_content_tab',
            [
                'label' => esc_html__('Style 6 Content', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'style_selection' => 'style6',
                ],
            ]
        );

        // Title Part 1
        $this->add_control(
            'style6_title1',
            [
                'label'       => esc_html__('Title Part 1', 'lunex-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__('Collaborate with', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        // Title Image
        $this->add_control(
            'style6_image',
            [
                'label'   => esc_html__('Title Image', 'lunex-toolkit'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/users/user1.jpg',
                ],
            ]
        );

        // Title Part 2
        $this->add_control(
            'style6_title2',
            [
                'label'       => esc_html__('Title Part 2', 'lunex-toolkit'),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__('us', 'lunex-toolkit'),
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
        // Main Title Style
        $this->start_controls_section(
            'main_title_style',
            [
                'label' => esc_html__('Main Title', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style1',
                ],
            ]
        );
        $this->add_responsive_control(
            'main_title_alignment',
            [
                'label' => esc_html__('Alignment', 'lunex-toolkit'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'lunex-toolkit'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'lunex-toolkit'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'lunex-toolkit'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .text-animation' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'main_title_color',
            [
                'label'     => esc_html__('Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .text-animation > div' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'main_title_typography',
                'selector' => '{{WRAPPER}} .text-animation > div',
            ]
        );

        $this->end_controls_section();

        // Sub Title Style
        $this->start_controls_section(
            'sub_title_style',
            [
                'label' => esc_html__('Sub Title', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style1',
                ],
            ]
        );
        $this->add_control(
            'sub_title_alignment',
            [
                'label' => esc_html__('Alignment', 'lunex-toolkit'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'lunex-toolkit'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'lunex-toolkit'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'lunex-toolkit'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .text-animation span' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sub_title_color',
            [
                'label'     => esc_html__('Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .text-animation span' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'sub_title_typography',
                'selector' => '{{WRAPPER}} .text-animation span',
            ]
        );

        $this->end_controls_section();

        // Style 2 Text One Style
        $this->start_controls_section(
            'style2_text_one_style',
            [
                'label' => esc_html__('Text One Style', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style2',
                ],
            ]
        );
        $this->add_control(
            'text_one_line_color',
            [
                'label'     => esc_html__('Line Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dev-agency-banner-content .h1 div.two::before' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'text_one_line_visibility',
            [
                'label' => esc_html__('Line Visibility', 'lunex-toolkit'),
                'type' => Controls_Manager::SELECT,
                'default' => 'visible',
                'options' => [
                    'visible' => esc_html__('Visible', 'lunex-toolkit'),
                    'hidden' => esc_html__('Hidden', 'lunex-toolkit'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .dev-agency-banner-content .h1 div.two::before' => 'visibility: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'text_one_color',
            [
                'label'     => esc_html__('Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dev-agency-banner-content .one span' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'text_one_typography',
                'selector' => '{{WRAPPER}} .dev-agency-banner-content .one span',
            ]
        );

        $this->end_controls_section();

        // Style 2 Text Two Style
        $this->start_controls_section(
            'style2_text_two_style',
            [
                'label' => esc_html__('Text Two Style', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style2',
                ],
            ]
        );

        $this->add_control(
            'text_two_color',
            [
                'label'     => esc_html__('Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dev-agency-banner-content .two span' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'text_two_typography',
                'selector' => '{{WRAPPER}} .dev-agency-banner-content .two span',
            ]
        );

        $this->end_controls_section();

        // Style 2 Text Three Style
        $this->start_controls_section(
            'style2_text_three_style',
            [
                'label' => esc_html__('Text Three Style', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style2',
                ],
            ]
        );

        $this->add_control(
            'text_three_color',
            [
                'label'     => esc_html__('Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dev-agency-banner-content .three span' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'text_three_typography',
                'selector' => '{{WRAPPER}} .dev-agency-banner-content .three span',
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'style3_text_color_style',
            [
                'label' => esc_html__('Text Color Style', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style3',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'style3_main_title_typography',
                'label'    => esc_html__('Main Title Typography', 'lunex-toolkit'),
                'selector' => '{{WRAPPER}} .video-content h2',
                'condition' => [
                    'style_selection' => 'style3',
                ],
            ]
        );
        $this->add_control(
            'style3_text_color',
            [
                'label'     => esc_html__('Text Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .video-content h2' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .video-content h2 span' => 'color: {{VALUE}}',
                ],
            ]
        );

        
      

         
        
        $this->end_controls_section();

        // Style 4 Main Title Style
        $this->start_controls_section(
            'style4_main_title_style',
            [
                'label' => esc_html__('Style 4 Main Title', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style4',
                ],
            ]
        );

        $this->add_control(
            'style4_main_title_color',
            [
                'label'     => esc_html__('Text Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .main_home_banner_content h1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'style4_main_title_typography',
                'label'    => esc_html__('Typography', 'lunex-toolkit'),
                'selector' => '{{WRAPPER}} .main_home_banner_content h1',
            ]
        );

        $this->end_controls_section();
        // Style 5 Main Title Style
        $this->start_controls_section(
            'style5_main_title_style',
            [
                'label' => esc_html__('Style 5 Main Title', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style5',
                ],
            ]
        );
        $this->add_responsive_control(
            'style5_text_align',
            [
                'label' => esc_html__('Text Alignment', 'lunex-toolkit'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'lunex-toolkit'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'lunex-toolkit'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'lunex-toolkit'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .hero_banner_content h1' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'style5_main_title_color',
            [
                'label'     => esc_html__('Text Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero_banner_content h1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'style5_main_title_typography',
                'label'    => esc_html__('Typography', 'lunex-toolkit'),
                'selector' => '{{WRAPPER}} .hero_banner_content h1',
            ]
        );

        $this->add_control(
            'style5_image_size',
            [
                'label'      => esc_html__('Image Size', 'lunex-toolkit'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem'],
                'range'      => [
                    'px' => [
                        'min'  => 10,
                        'max'  => 500,
                        'step' => 1,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .hero_banner_content h1 img' => 'width: {{SIZE}}{{UNIT}}; height: auto;',
                ],
            ]
        );

        $this->add_control(
            'style5_image_radius',
            [
                'label'      => esc_html__('Image Border Radius', 'lunex-toolkit'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .hero_banner_content h1 img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'style5_image_border',
                'label' => esc_html__('Image Border', 'lunex-toolkit'),
                'selector' => '{{WRAPPER}} .hero_banner_content h1 img',
            ]
        );
        $this->add_control(
            'style5_image_alignment',
            [
                'label'   => esc_html__('Image Alignment', 'lunex-toolkit'),
                'type'    => Controls_Manager::CHOOSE,
                'options' => [
                    'baseline' => [
                        'title' => esc_html__('Baseline', 'lunex-toolkit'),
                        'icon'  => 'eicon-v-align-bottom',
                    ],
                    'middle' => [
                        'title' => esc_html__('Middle', 'lunex-toolkit'),
                        'icon'  => 'eicon-v-align-middle',
                    ],
                    'top' => [
                        'title' => esc_html__('Top', 'lunex-toolkit'),
                        'icon'  => 'eicon-v-align-top',
                    ],
                ],
                'default'   => 'baseline',
                'selectors' => [
                    '{{WRAPPER}} .hero_banner_content h1 img' => 'vertical-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style6_section',
            [
                'label' => esc_html__('Style 6', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style6'
                ],
            ]
        );

        // Title Part 1 Styling
        $this->add_control(
            'style6_title1_heading',
            [
                'label' => esc_html__('Title Part 1', 'lunex-toolkit'),
                'type'  => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'style6_title1_color',
            [
                'label'     => esc_html__('Text Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .creative-agency-footer-area .footer-left-side h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'style6_title1_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .creative-agency-footer-area .footer-left-side h2:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'style6_title1_typography',
                'selector' => '{{WRAPPER}} .creative-agency-footer-area .footer-left-side h2',
            ]
        );

        // Title Image Styling
        $this->add_control(
            'style6_image_heading',
            [
                'label' => esc_html__('Title Image', 'lunex-toolkit'),
                'type'  => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'style6_image_width',
            [
                'label' => esc_html__('Width', 'lunex-toolkit'),
                'type'  => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .creative-agency-footer-area .footer-left-side h2 img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'style6_image_height',
            [
                'label' => esc_html__('Height', 'lunex-toolkit'),
                'type'  => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .creative-agency-footer-area .footer-left-side h2 img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'style6_image_border_radius',
            [
                'label'      => esc_html__('Border Radius', 'lunex-toolkit'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .creative-agency-footer-area .footer-left-side h2 img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Title Part 2 Styling
        $this->add_control(
            'style6_title2_heading',
            [
                'label' => esc_html__('Title Part 2', 'lunex-toolkit'),
                'type'  => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'style6_title2_color',
            [
                'label'     => esc_html__('Text Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .creative-agency-footer-area .footer-left-side h2 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'style6_title2_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .creative-agency-footer-area .footer-left-side h2:hover span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'style6_title2_typography',
                'selector' => '{{WRAPPER}} .creative-agency-footer-area .footer-left-side h2 span',
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
             <div class="services-area">
            <div class="creative-agency-section-title text-white">
                <div class="row align-items-center">
                   
                        <div class="left-side">
                            <h2 class="text-animation">
                                <?php echo wp_kses_post($settings['main_title']); ?> <span><?php echo wp_kses_post($settings['sub_title']); ?></span>
                            </h2>
                        </div>
                </div>
            </div>
    </div>



        <?php
            } elseif ($settings['style_selection'] === 'style2') {
                    ?>
            <!-- style 2 -->
            <div class="dev-agency-banner-area position-relative z-1">
                <div class="container">
                    <div class="dev-agency-banner-content">
                        <div class="h1 fw-normal">
                            <div class="one">
                                <span class="d-block gsap-target">
                                    <?php echo esc_html($settings['text_one']); ?>
                                </span>
                            </div>
                            <div class="two position-relative">
                                <span class="d-block gsap-target">
                                    <?php echo esc_html($settings['text_two']); ?>
                                </span>
                            </div>
                            <div class="three">
                                <span class="d-block gsap-target">
                                    <?php echo esc_html($settings['text_three']); ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                
                <?php if (!empty($settings['shape_image_one']['url'])) : ?>
                <div class="border1">
                    <img src="<?php echo esc_url($settings['shape_image_one']['url']); ?>" alt="border1">
                </div>
                <?php endif; ?>


                <?php if (!empty($settings['shape_image_two']['url'])) : ?>
                <div class="border2">
                    <img src="<?php echo esc_url($settings['shape_image_two']['url']); ?>" alt="border2">
                </div>
                <?php endif; ?>
                
            </div>

        <?php
            } elseif ($settings['style_selection'] === 'style3') {
                    ?>
            <!-- style 3 -->
    <div class="video-area">
        <div class="container">
            <div class="video-content position-relative z-1 text-center" data-cues="slideInUp">

        <?php if (!empty($settings['style3_main_title'])) : ?>    
            <h2 >
                    <?php echo esc_html($settings['style3_main_title']); ?>
                    <?php endif;?>

         <?php if (!empty($settings['style3_background_image'])) : ?> 
             <img src="<?php echo esc_url($settings['style3_background_image']['url']); ?>">   
              <span>
                                <?php endif;?>
                                
                                <?php if (!empty($settings['style3_sub_title'])) : ?> 
                                <?php echo esc_html($settings['style3_sub_title']); ?></span>
                                <?php endif;?>

                            </h2>
                        </div>
                    </div>
                </div>

    <?php } elseif ($settings['style_selection'] === 'style4') 
    { 
        $main_title = ! empty($settings['style4_main_title']) ? esc_html($settings['style4_main_title']) : '';
        $image_url  = ! empty($settings['style4_image']['url']) ? esc_url($settings['style4_image']['url']) : '';
        $sub_title  = ! empty($settings['style4_sub_title']) ? esc_html($settings['style4_sub_title']) : '';

        ?>
         <!-- style 4 -->
          
            <div class="main_home_banner_content" data-cues="slideInUp" data-group="main_home_banner_content">
                <h1>
                    <?php
  
                    if ( $main_title ) {
                        echo $main_title . ' ';
                    }

                    if ( $image_url ) {
                        ?>
                        <img src="<?php echo $image_url; ?>" alt="<?php echo esc_attr__('circle', 'lunex-toolkit'); ?>">
                        <?php
                    }

                    if ( $sub_title ) {
                        echo ' ' . $sub_title;
                    }
                    ?>
                </h1>
            </div>
 
          <?php } elseif ($settings['style_selection'] === 'style5') 
    {  
        $main_title = ! empty($settings['style4_main_title']) ? esc_html($settings['style4_main_title']) : '';
        $image_url  = ! empty($settings['style4_image']['url']) ? esc_url($settings['style4_image']['url']) : '';
        $sub_title  = ! empty($settings['style4_sub_title']) ? esc_html($settings['style4_sub_title']) : '';

        ?>
    <!-- style 5 -->
       <div class="hero_banner_content text-center mx-auto position-relative z-1" data-cues="slideInUp" data-group="hero_banner_content">
            <h1 class="fw-bold">
                <?php
               
                
                if ($main_title) {
                    echo $main_title . ' ';
                }
                
                if ($image_url) {
                    echo '<img src="' . $image_url . '" alt="' . esc_attr__('inline-image', 'lunex-toolkit') . '"> ';
                }
                
                if ($sub_title) {
                    echo $sub_title;
                }
                ?>
            </h1>
        </div>
    <?php } elseif ($settings['style_selection'] === 'style6') 
    {  ?>
    <!-- style 6 -->
  <footer class="creative-agency-footer-area">
        <div class="footer-left-side position-relative">
            <h2 class="mb-0">
                <?php
                if (!empty($settings['style6_title1'])) {
                    echo esc_html($settings['style6_title1']) . ' ';
                }
                if (!empty($settings['style6_image']['url'])) {
                    echo '<img src="' . esc_url($settings['style6_image']['url']) . '" class="rounded-circle" alt="' . esc_attr__('user-image', 'lunex-toolkit') . '"> ';
                }
                if (!empty($settings['style6_title2'])) {
                    echo '<span>' . esc_html($settings['style6_title2']) . '</span>';
                }
                ?>
            </h2>
        </div>
    </footer>

    <?php

        }
            }
        }

    $widgets_manager->register(new lunex_heading_title());
