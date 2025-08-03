<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_banner_1 extends Widget_Base
    {

        public function get_name()
        {
            return 'axero-banner-1';
        }

        public function get_title()
        {
            return __('Banner 1', 'axero-toolkit');
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

            // INSERT_YOUR_CODE

            // Style 1 Content Controls
            $this->start_controls_section(
                'style1_content_section',
                [
                    'label' => esc_html__('Style 1 Content', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            // Main Title (text before image)
            $this->add_control(
                'style1_main_title_before_img',
                [
                    'label'       => esc_html__('Main Title (Before Image)', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('We', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            // Main Title Image
            $this->add_control(
                'style1_main_title_img',
                [
                    'label' => esc_html__('Main Title Image', 'axero-toolkit'),
                    'type'  => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => plugins_url('../../assets/images/banners/circle2.png', __FILE__),
                    ],
                ]
            );

            // Main Title (text after image)
            $this->add_control(
                'style1_main_title_after_img',
                [
                    'label'       => esc_html__('Main Title (After Image)', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Design Creative Ideas', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            // Button Text
            $this->add_control(
                'style1_button_text',
                [
                    'label'       => esc_html__('Button Text', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Start a Project', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            // Button Link
            $this->add_control(
                'style1_button_link',
                [
                    'label'       => esc_html__('Button Link', 'axero-toolkit'),
                    'type'        => Controls_Manager::URL,
                    'placeholder' => esc_html__('https://your-link.com', 'axero-toolkit'),
                    'default'     => [
                        'url' => 'contact.html',
                        'is_external' => false,
                        'nofollow' => false,
                    ],
                    'show_external' => true,
                ]
            );

            // Button Icon
            $this->add_control(
                'style1_button_icon',
                [
                    'label' => esc_html__('Button Icon', 'axero-toolkit'),
                    'type'  => \Elementor\Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'ri-arrow-right-long-line',
                        'library' => 'remixicon',
                    ],
                ]
            );

            // Sub Title (under button)
            $this->add_control(
                'style1_sub_title',
                [
                    'label'       => esc_html__('Sub Title', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('No stress, no long commitments', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            // Right Side Title
            $this->add_control(
                'style1_right_title',
                [
                    'label'       => esc_html__('Right Side Title', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('axero', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            // Right Side Text
            $this->add_control(
                'style1_right_text',
                [
                    'label'       => esc_html__('Right Side Text', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXTAREA,
                    'default'     => esc_html__('Our conviction was that design wasn’t just about visuals—it was a powerful force for business transformation.', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            // Scroll Down Text
            $this->add_control(
                'style1_scroll_text',
                [
                    'label'       => esc_html__('Scroll Down Text', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Scroll down', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->end_controls_section();
            
            // Style 2 Content Tab
            $this->start_controls_section(
                'style2_content_tab',
                [
                    'label'     => esc_html__('Style 2 Content', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'style_selection' => 'style2',
                    ],
                ]
            );

            // Main Title Before Image
            $this->add_control(
                'style2_main_title_before_img',
                [
                    'label'       => esc_html__('Main Title Before Image', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Comprehensive Branding Agency for Your Business', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            // Main Title Image
            $this->add_control(
                'style2_main_title_img',
                [
                    'label'   => esc_html__('Title Image', 'axero-toolkit'),
                    'type'    => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => get_template_directory_uri() . '/assets/images/banners/girls_with_laptop.jpg',
                    ],
                ]
            );

            // Main Title After Image
            $this->add_control(
                'style2_main_title_after_img',
                [
                    'label'       => esc_html__('Main Title After Image', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Needs', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            // Button Text
            $this->add_control(
                'style2_button_text',
                [
                    'label'       => esc_html__('Button Text', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Get a Free SEO Audit', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            // Button Icon
            $this->add_control(
                'style2_button_icon',
                [
                    'label' => esc_html__('Button Icon', 'axero-toolkit'),
                    'type'  => \Elementor\Controls_Manager::ICONS,
                    'default' => [
                        'value'   => 'ri-arrow-right-up-line',
                        'library' => 'remixicon',
                    ],
                ]
            );

            // Button Link
            $this->add_control(
                'style2_button_link',
                [
                    'label'         => esc_html__('Button Link', 'axero-toolkit'),
                    'type'          => Controls_Manager::URL,
                    'placeholder'   => esc_html__('https://your-link.com', 'axero-toolkit'),
                    'show_external' => true,
                    'default'       => [
                        'url'         => '#',
                        'is_external' => false,
                        'nofollow'    => false,
                    ],
                ]
            );

            // Left Image
            $this->add_control(
                'style2_left_image',
                [
                    'label'   => esc_html__('Left Image', 'axero-toolkit'),
                    'type'    => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => get_template_directory_uri() . '/assets/images/banners/visitors.jpg',
                    ],
                ]
            );

            // Center Image
            $this->add_control(
                'style2_center_image',
                [
                    'label'   => esc_html__('Center Image', 'axero-toolkit'),
                    'type'    => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => get_template_directory_uri() . '/assets/images/banners/hero_banner1.png',
                    ],
                ]
            );

            // Right Image
            $this->add_control(
                'style2_right_image',
                [
                    'label'   => esc_html__('Right Image', 'axero-toolkit'),
                    'type'    => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => get_template_directory_uri() . '/assets/images/banners/audiences.jpg',
                    ],
                ]
            );

            // Object2 Image
            $this->add_control(
                'style2_object2_image',
                [
                    'label'   => esc_html__('Object2 Image', 'axero-toolkit'),
                    'type'    => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => get_template_directory_uri() . '/assets/images/objects/object2.svg',
                    ],
                ]
            );

            $this->end_controls_section();

            // Style 2 Slider Text List
            $this->start_controls_section(
                'style2_content_section',
                [
                    'label'     => esc_html__('Slider Text List', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'style_selection' => 'style2',
                    ],
                ]
            );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control(
                'style2_slide_text',
                [
                    'label'       => esc_html__('Slide Text', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Creative Design Agency', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $repeater->add_control(
                'style2_slide_image',
                [
                    'label'   => esc_html__('Image', 'axero-toolkit'),
                    'type'    => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => get_template_directory_uri() . '/assets/images/placeholder.jpg',
                    ],
                ]
            );

            $this->add_control(
                'style2_slides',
                [
                    'label'       => esc_html__('Slides', 'axero-toolkit'),
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'default'     => [
                        [
                            'style2_slide_text'  => esc_html__('Creative Design Agency', 'axero-toolkit'),
                            'style2_slide_image' => [
                                'url' => get_template_directory_uri() . '/assets/images/placeholder.jpg',
                            ],
                        ],
                        [
                            'style2_slide_text'  => esc_html__('Innovative Solutions', 'axero-toolkit'),
                            'style2_slide_image' => [
                            'url' => get_template_directory_uri() . '/assets/images/placeholder.jpg',
                            ],
                        ],
                        [
                            'style2_slide_text'  => esc_html__('Digital Experiences', 'axero-toolkit'),
                            'style2_slide_image' => [
                                'url' => get_template_directory_uri() . '/assets/images/placeholder.jpg',
                            ],
                        ],
                    ],
                    'title_field' => '{{{ style2_slide_text }}}',
                ]
            );

            $this->end_controls_section();

            // Style 3 Content Controls
            $this->start_controls_section(
                'style3_content_section',
                [
                    'label' => esc_html__('Style 3 Content', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'style_selection' => 'style3',
                    ],
                ]
            );

            // Main Title (before image)
            $this->add_control(
                'style3_main_title_before',
                [
                    'label'       => esc_html__('Main Title (Before Image)', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('We Think-&', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            // Middle Title Image
            $this->add_control(
                'style3_main_title_image',
                [
                    'label'   => esc_html__('Main Title Middle Image', 'axero-toolkit'),
                    'type'    => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => get_template_directory_uri() . '/assets/images/placeholder.jpg',
                    ],
                    'description' => esc_html__('Image to display in the middle of the main title.', 'axero-toolkit'),
                ]
            );

            // Main Title (after image)
            $this->add_control(
                'style3_main_title_after',
                [
                    'label'       => esc_html__('Main Title (After Image)', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Solve', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'banner3_style3_right_image',
                [
                    'label'   => esc_html__('Right Side Image', 'axero-toolkit'),
                    'type'    => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => get_template_directory_uri() . '/assets/images/banners/star.svg',
                    ],
                    'description' => esc_html__('Image to display on the right side of the banner.', 'axero-toolkit'),
                ]
            );

            $this->add_control(
                'style3_scroll_text',
                [
                    'label'       => esc_html__('Scroll Down Text', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Scroll Down', 'axero-toolkit'),
                    'label_block' => true,
                    'description' => esc_html__('Text for the scroll down indicator', 'axero-toolkit'),
                ]
            );

            $this->add_control(
                'style3_button_text',
                [
                    'label'       => esc_html__('Button Text', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Get a Free SEO Audit', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'style3_button_link',
                [
                    'label'       => esc_html__('Button Link', 'axero-toolkit'),
                    'type'        => Controls_Manager::URL,
                    'placeholder' => esc_html__('https://your-link.com', 'axero-toolkit'),
                    'default'     => [
                        'url' => '#',
                    ],
                ]
            );

            $this->add_control(
                'style3_button_icon',
                [
                    'label' => esc_html__('Button Icon', 'axero-toolkit'),
                    'type'  => Controls_Manager::ICONS,
                    'default' => [
                        'value'   => 'ri-arrow-right-up-line',
                        'library' => 'remixicon',
                    ],
                ]
            );

            $this->add_control(
                'style3_left_images',
                [
                    'label'       => esc_html__('Left Images', 'axero-toolkit'),
                    'type'        => Controls_Manager::GALLERY,
                    'default'     => [],
                    'description' => esc_html__('Add images for the left side (2 images recommended).', 'axero-toolkit'),
                ]
            );

            $this->add_control(
                'style3_quote_text',
                [
                    'label'       => esc_html__('Quote Text', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXTAREA,
                    'default'     => esc_html__('"I was blown away by the web solutions from axero! They perfectly captured my startup\'s vision and created a stunning website. Their professionalism is unparalleled!"', 'axero-toolkit'),
                    'rows'        => 4,
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'style3_author_image',
                [
                    'label'   => esc_html__('Author Image', 'axero-toolkit'),
                    'type'    => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => get_template_directory_uri() . '/assets/images/placeholder.jpg',
                    ],
                ]
            );

            $this->add_control(
                'style3_author_name',
                [
                    'label'   => esc_html__('Author Name', 'axero-toolkit'),
                    'type'    => Controls_Manager::TEXT,
                    'default' => esc_html__('John Carter', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'style3_author_position',
                [
                    'label'   => esc_html__('Author Position', 'axero-toolkit'),
                    'type'    => Controls_Manager::TEXT,
                    'default' => esc_html__('Manager at Business', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'style3_right_image',
                [
                    'label'   => esc_html__('Right Image', 'axero-toolkit'),
                    'type'    => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => get_template_directory_uri() . '/assets/images/placeholder.jpg',
                    ],
                ]
            );

            $this->add_control(
                'style3_satisfied_customers_text',
                [
                    'label'   => esc_html__('Satisfied Customers Text', 'axero-toolkit'),
                    'type'    => Controls_Manager::TEXT,
                    'default' => esc_html__('Over 17K+ Satisfied Customers', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'style3_satisfied_customers_icon',
                [
                    'label' => esc_html__('Satisfied Customers Icon', 'axero-toolkit'),
                    'type'  => Controls_Manager::ICONS,
                    'default' => [
                        'value'   => 'ri-star-fill',
                        'library' => 'remixicon',
                    ],
                ]
            );

            $this->end_controls_section();

            // Style 4 Content Tab
            $this->start_controls_section(
                'section_style4_content',
                [
                    'label' => esc_html__('Style 4 Content', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'style_selection' => 'style4',
                    ],
                ]
            );

            $this->add_control(
                'style4_subtitle',
                [
                    'label'   => esc_html__('Subtitle', 'axero-toolkit'),
                    'type'    => Controls_Manager::TEXT,
                    'default' => esc_html__('Explore opportunities', 'axero-toolkit'),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'style4_main_title',
                [
                    'label'   => esc_html__('Main Title', 'axero-toolkit'),
                    'type'    => Controls_Manager::TEXT,
                    'default' => esc_html__('Become part of <span>our team</span>', 'axero-toolkit'),
                    'label_block' => true,
                    'description' => esc_html__('You can use <span> tags for highlighting.', 'axero-toolkit'),
                ]
            );

            $repeater4 = new \Elementor\Repeater();

            $repeater4->add_control(
                'style4_number',
                [
                    'label' => esc_html__('Number', 'axero-toolkit'),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => '128+',
                ]
            );

            $repeater4->add_control(
                'style4_title',
                [
                    'label' => esc_html__('Title', 'axero-toolkit'),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => 'Creative professionals',
                ]
            );

            $this->add_control(
                'style4_items',
                [
                    'label'       => esc_html__('Funfacts', 'axero-toolkit'),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater4->get_controls(),
                    'default'     => [
                        [
                            'style4_number' => '128+',
                            'style4_title'  => 'Creative professionals',
                        ],
                    ],
                    'title_field' => '{{{ style4_title }}}',
                ]
            );

            $this->add_control(
                'style4_content',
                [
                    'label'   => esc_html__('Description', 'axero-toolkit'),
                    'type'    => \Elementor\Controls_Manager::TEXTAREA,
                    'default' => esc_html__('Join our dynamic team of creative professionals & contribute to groundbreaking projects that make an impact. Together, let’s achieve excellence & drive success!', 'axero-toolkit'),
                ]
            );

            $this->add_control(
                'style4_image',
                [
                    'label'   => esc_html__('Right Image', 'axero-toolkit'),
                    'type'    => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => 'assets/images/careers.jpg',
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
            //content style controls tab
            $this->start_controls_section(
                'style1_content_style',
                [
                    'label' => esc_html__('Style 1 Content', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            // Main Title Style
            $this->add_control(
                'style1_main_title_heading',
                [
                    'label' => esc_html__('Main Title', 'axero-toolkit'),
                    'type'  => Controls_Manager::HEADING,
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style1_main_title_typography',
                    'selector' => '{{WRAPPER}} .main_home_banner_content h1',
                ]
            );
            $this->add_control(
                'style1_main_title_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .main_home_banner_content h1' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Button Style
            $this->add_control(
                'style1_button_heading',
                [
                    'label'     => esc_html__('Button', 'axero-toolkit'),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style1_button_typography',
                    'selector' => '{{WRAPPER}} .main_home_banner_area .btn.primary_btn span, {{WRAPPER}} .main_home_banner_area .btn.primary_btn i',
                ]
            );
            $this->start_controls_tabs('style1_button_tabs');
            $this->start_controls_tab(
                'style1_button_normal',
                [
                    'label' => esc_html__('Normal', 'axero-toolkit'),
                ]
            );
            $this->add_control(
                'style1_button_color',
                [
                    'label'     => esc_html__('Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .main_home_banner_area .btn.primary_btn span' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'style1_button_bg_color',
                [
                    'label'     => esc_html__('Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .main_home_banner_area .btn.primary_btn' => 'background-color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'style1_button_icon_color',
                [
                    'label'     => esc_html__('Icon Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .main_home_banner_area .btn.primary_btn i' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .main_home_banner_area .btn.primary_btn svg' => 'fill: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'style1_button_icon_size',
                [
                    'label'     => esc_html__('Icon Size', 'axero-toolkit'),
                    'type'      => Controls_Manager::SLIDER,
                    'size_units' => ['px', 'em'],
                    'default' => [
                        'unit' => 'px',
                        'size' => 26,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .btn.primary_btn i' => 'font-size: {{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .btn.primary_btn svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'style1_button_padding',
                [
                    'label' => esc_html__('Padding', 'axero-toolkit'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', 'em', '%'],
                    'selectors' => [
                        '{{WRAPPER}} .main_home_banner_area .btn.primary_btn span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab();
            $this->start_controls_tab(
                'style1_button_hover',
                [
                    'label' => esc_html__('Hover', 'axero-toolkit'),
                ]
            );
            $this->add_control(
                'style1_button_hover_color',
                [
                    'label'     => esc_html__('Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .main_home_banner_area .btn.primary_btn:hover span' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'style1_button_hover_bg_color',
                [
                    'label'     => esc_html__('Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .main_home_banner_area .btn.primary_btn:hover' => 'background-color: {{VALUE}} !important;',
                    ],
                ]
            );
            $this->add_control(
                'style1_button_hover_icon_color',
                [
                    'label'     => esc_html__('Icon Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn.primary_btn:hover i' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .btn.primary_btn:hover svg' => 'fill: {{VALUE}};',
                    ],
                ]
            );
            $this->end_controls_tab();
            
            $this->end_controls_tabs();

            // Sub Title Style
            $this->add_control(
                'style1_sub_title_heading',
                [
                    'label'     => esc_html__('Sub Title', 'axero-toolkit'),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style1_sub_title_typography',
                    'selector' => '{{WRAPPER}} .main_home_banner_content .sub_title',
                ]
            );
            $this->add_control(
                'style1_sub_title_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .main_home_banner_content .sub_title' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Scroll Text Style
            $this->add_control(
                'style1_scroll_text_heading',
                [
                    'label'     => esc_html__('Scroll Text', 'axero-toolkit'),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style1_scroll_text_typography',
                    'selector' => '{{WRAPPER}} .scroll_down_text span, {{WRAPPER}} .scroll_down_text .dot',
                ]
            );
            $this->add_control(
                'style1_scroll_text_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .scroll_down_text span, {{WRAPPER}} .scroll_down_text .dot' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'style1_scroll_dot_icon_bg_color',
                [
                    'label'     => esc_html__('Dot Icon Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .scroll_down_text .dot::before' => 'background-color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'style1_scroll_border_color',
                [
                    'label'     => esc_html__('Dot Border Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .scroll_down_text .dot' => 'border-color: {{VALUE}};',
                    ],
                ]
            );

            // Right Side Styles
            $this->add_control(
                'style1_right_side_heading',
                [
                    'label'     => esc_html__('Right Side', 'axero-toolkit'),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'style1_right_border_color',
                [
                    'label'     => esc_html__('Border Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .main_home_banner_area::before' => 'background: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'style1_right_sub_title_heading',
                [
                    'label'     => esc_html__('Sub Title', 'axero-toolkit'),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style1_right_sub_title_typography',
                    'selector' => '{{WRAPPER}} .main_home_banner_text .sub_title',
                ]
            );
            $this->add_control(
                'style1_right_sub_title_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .main_home_banner_text .sub_title' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'style1_right_desc_heading',
                [
                    'label'     => esc_html__('Description', 'axero-toolkit'),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style1_right_desc_typography',
                    'selector' => '{{WRAPPER}} .main_home_banner_text p',
                ]
            );
            $this->add_control(
                'style1_right_desc_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .main_home_banner_text p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_section();

            $this->start_controls_section(
                'style2_title_style',
                [
                    'label' => esc_html__('Title', 'axero-toolkit'),
                    'tab' => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style2',
                    ],
                ]
            );
            $this->add_control(
                'style2_title_color',
                [
                    'label' => esc_html__('Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .hero_banner_content h1' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'style2_title_typography',
                    'selector' => '{{WRAPPER}} .hero_banner_content h1',
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'style2_button_style',
                [
                    'label' => esc_html__('Button', 'axero-toolkit'),
                    'tab' => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style2',
                    ],
                ]
            );
            $this->add_control(
                'style2_button_text_color',
                [
                    'label' => esc_html__('Text Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn.primary_btn' => 'color: {{VALUE}} !important;',
                    ],
                ]
            );
            $this->add_control(
                'style2_button_text_hover_color',
                [
                    'label' => esc_html__('Text Hover Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn.primary_btn:hover' => 'color: {{VALUE}} !important;',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'style2_button_typography',
                    'selector' => '{{WRAPPER}} .btn.primary_btn',
                ]
            );
            $this->add_control(
                'style2_button_bg_color',
                [
                    'label' => esc_html__('Background Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn.primary_btn' => 'background-color: {{VALUE}} !important;',
                    ],
                ]
            );
            $this->add_control(
                'style2_button_bg_hover_color',
                [
                    'label' => esc_html__('Background Hover Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn.primary_btn:hover' => 'background-color: {{VALUE}} !important;',
                    ],
                ]
            );

            $this->add_control(
                'style2_button_icon_color',
                [
                    'label' => esc_html__('Button Icon Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn.primary_btn i, {{WRAPPER}} .btn.primary_btn svg' => 'color: {{VALUE}}; fill: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'style2_button_icon_hover_color',
                [
                    'label' => esc_html__('Button Icon Hover Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn.primary_btn:hover i, {{WRAPPER}} .btn.primary_btn:hover svg' => 'color: {{VALUE}}; fill: {{VALUE}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'style2_button_icon_size',
                [
                    'label' => esc_html__('Button Icon Size', 'axero-toolkit'),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => ['px', 'em', 'rem'],
                    'range' => [
                        'px' => [
                            'min' => 10,
                            'max' => 100,
                            'step' => 1,
                        ],
                        'em' => [
                            'min' => 0.5,
                            'max' => 5,
                            'step' => 0.01,
                        ],
                        'rem' => [
                            'min' => 0.5,
                            'max' => 5,
                            'step' => 0.01,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 26,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .btn.primary_btn i, {{WRAPPER}} .btn.primary_btn svg' => 'font-size: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'style2_button_text_padding',
                [
                    'label' => esc_html__('Button Text Padding', 'axero-toolkit'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', 'em', '%'],
                    'default' => [
                        'right' => 45,
                        'unit' => 'px',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .btn.primary_btn span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->end_controls_section();

            $this->start_controls_section(
                'style2_text_style',
                [
                    'label' => esc_html__('Text Slider', 'axero-toolkit'),
                    'tab' => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style2',
                    ],
                ]
            );
            $this->add_responsive_control(
                'style2_margin',
                [
                    'label' => esc_html__('Margin', 'axero-toolkit'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .scroll_text_area' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'style2_padding',
                [
                    'label' => esc_html__('Padding', 'axero-toolkit'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .scroll_text_area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'style2_overflow',
                [
                    'label' => esc_html__('Overflow', 'axero-toolkit'),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'hidden',
                    'options' => [
                        'visible' => esc_html__('Visible', 'axero-toolkit'),
                        'hidden' => esc_html__('Hidden', 'axero-toolkit'),
                        'scroll' => esc_html__('Scroll', 'axero-toolkit'),
                        'auto' => esc_html__('Auto', 'axero-toolkit'),
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .scroll_text_area' => 'overflow: {{VALUE}};',
                    ],
                ]
            );
            // Background Color Control
            $this->add_control(
                'style2_background_color',
                [
                    'label' => esc_html__('Background Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .scroll_text_area' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            // Text Color Control
            $this->add_control(
                'style2_text_color',
                [
                    'label' => esc_html__('Text Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .scroll_text_marquee h3.mb-0.text-uppercase.fw-semibold.lh-1' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Typography Control
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'style2_text_typography',
                    'selector' => '{{WRAPPER}} .scroll_text_marquee h3.mb-0.text-uppercase.fw-semibold.lh-1',
                ]
            );

            $this->end_controls_section();

            // Style 3 Banner Top Section
            $this->start_controls_section(
                'style3_banner_top_style',
                [
                    'label' => esc_html__('Style 3 Banner Top', 'axero-toolkit'),
                    'tab' => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style3',
                    ],
                ]
            );

            // Main Title Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'style3_main_title_typography',
                    'selector' => '{{WRAPPER}} .banner_wrapper_content h1',
                ]
            );

            // Main Title Color
            $this->add_control(
                'style3_main_title_color',
                [
                    'label' => esc_html__('Main Title Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .banner_wrapper_content h1' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Title Image Size
            $this->add_control(
                'style3_title_image_size',
                [
                    'label' => esc_html__('Title Image Size', 'axero-toolkit'),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => ['px', '%'],
                    'range' => [
                        'px' => [
                            'min' => 10,
                            'max' => 500,
                        ],
                        '%' => [
                            'min' => 1,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .banner_wrapper_content h1 img' => 'width: {{SIZE}}{{UNIT}}; height: auto;',
                    ],
                ]
            );

            // Title Image Border
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'style3_title_image_border',
                    'selector' => '{{WRAPPER}} .banner_wrapper_content h1 img',
                ]
            );

            // Title Image Border Radius
            $this->add_control(
                'style3_title_image_border_radius',
                [
                    'label' => esc_html__('Border Radius', 'axero-toolkit'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors' => [
                        '{{WRAPPER}} .banner_wrapper_content h1 img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            // Button Style
            $this->add_control(
                'style3_button_heading',
                [
                    'label' => esc_html__('Button', 'axero-toolkit'),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'style3_button_typography',
                    'selector' => '{{WRAPPER}} .banner_wrapper_content .btn',
                ]
            );

            $this->add_control(
                'style3_button_padding',
                [
                    'label' => esc_html__('Padding', 'axero-toolkit'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors' => [
                        '{{WRAPPER}} .banner_wrapper_content .btn span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; padding-right: 45px !important;',
                    ],
                ]
            );

            $this->add_control(
                'style3_icon_size',
                [
                    'label' => esc_html__('Icon Size', 'axero-toolkit'),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range' => [
                        'px' => [
                            'min' => 10,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 26,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .banner_wrapper_content .btn i' => 'font-size: {{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .banner_wrapper_content .btn svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->start_controls_tabs('style3_button_tabs');

            // Normal State
            $this->start_controls_tab(
                'style3_button_normal',
                [
                    'label' => esc_html__('Normal', 'axero-toolkit'),
                ]
            );

            $this->add_control(
                'style3_button_text_color',
                [
                    'label' => esc_html__('Text Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .banner_wrapper_content .btn' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style3_button_bg_color',
                [
                    'label' => esc_html__('Background Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .banner_wrapper_content .btn' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_tab();

            // Hover State
            $this->start_controls_tab(
                'style3_button_hover',
                [
                    'label' => esc_html__('Hover', 'axero-toolkit'),
                ]
            );

            $this->add_control(
                'style3_button_hover_text_color',
                [
                    'label' => esc_html__('Text Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .banner_wrapper_content .primary_btn:hover' => 'color: {{VALUE}} !important;',
                    ],
                ]
            );

            $this->add_control(
                'style3_button_hover_bg_color',
                [
                    'label' => esc_html__('Background Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .banner_wrapper_content .primary_btn:hover' => 'background-color: {{VALUE}} !important;',
                    ],
                ]
            );

            $this->end_controls_tab();
            $this->end_controls_tabs();

            // Scroll Text Style
            $this->add_control(
                'style3_scroll_text_heading',
                [
                    'label' => esc_html__('Scroll Text', 'axero-toolkit'),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'style3_scroll_text_typography',
                    'selector' => '{{WRAPPER}} .scroll_down span',
                ]
            );

            $this->add_control(
                'style3_scroll_text_color',
                [
                    'label' => esc_html__('Text Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .scroll_down span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style3_scroll_icon_color',
                [
                    'label' => esc_html__('Icon Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .scroll_down i' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_section();

            // Style 3 Middle Section
            $this->start_controls_section(
                'style3_middle_style',
                [
                    'label' => esc_html__('Style 3 Middle Section', 'axero-toolkit'),
                    'tab' => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style3',
                    ],
                ]
            );

            // Quote Box Background
            $this->add_control(
                'style3_quote_box_bg',
                [
                    'label' => esc_html__('Quote Box Background', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .quote_box' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            // Author Name Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'style3_author_name_typography',
                    'selector' => '{{WRAPPER}} .quote_box .author h4',
                ]
            );

            // Author Name Color
            $this->add_control(
                'style3_author_name_color',
                [
                    'label' => esc_html__('Author Name Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .quote_box .author h4' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Author Position Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'style3_author_position_typography',
                    'selector' => '{{WRAPPER}} .quote_box .author span',
                ]
            );

            // Author Position Color
            $this->add_control(
                'style3_author_position_color',
                [
                    'label' => esc_html__('Author Position Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .quote_box .author span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Quote Text Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'style3_quote_text_typography',
                    'selector' => '{{WRAPPER}} .quote_box p',
                ]
            );

            // Quote Text Color
            $this->add_control(
                'style3_quote_text_color',
                [
                    'label' => esc_html__('Quote Text Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .quote_box p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_section();

            // Style 3 Satisfied Customers
            $this->start_controls_section(
                'style3_satisfied_customers_style',
                [
                    'label' => esc_html__('Satisfied Customers', 'axero-toolkit'),
                    'tab' => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style3',
                    ],
                ]
            );

            // Text Color
            $this->add_control(
                'style3_customers_text_color',
                [
                    'label' => esc_html__('Text Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .satisfied_customers span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Text Background Color
            $this->add_control(
                'style3_customers_text_bg',
                [
                    'label' => esc_html__('Text Background', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .satisfied_customers span' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            // Text Border
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'style3_customers_text_border',
                    'selector' => '{{WRAPPER}} .satisfied_customers span',
                ]
            );

            // Text Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'style3_customers_text_typography',
                    'selector' => '{{WRAPPER}} .satisfied_customers span',
                ]
            );

            // Icon Color
            $this->add_control(
                'style3_customers_icon_color',
                [
                    'label' => esc_html__('Icon Color', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .satisfied_customers .icon' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .satisfied_customers .icon svg' => 'fill: {{VALUE}};',
                    ],
                ]
            );

            // Icon Size
            $this->add_control(
                'style3_customers_icon_size',
                [
                    'label' => esc_html__('Icon Size', 'axero-toolkit'),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range' => [
                        'px' => [
                            'min' => 10,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 26,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .satisfied_customers .icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .satisfied_customers .icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            // Icon Background
            $this->add_control(
                'style3_customers_icon_bg',
                [
                    'label' => esc_html__('Icon Background', 'axero-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .satisfied_customers .icon' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_section();


            // Style 4 Content Styling Controls
            $this->start_controls_section(
                'style4_content_style',
                [
                    'label' => esc_html__('Style 4 Content', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style4',
                    ],
                ]
            );

            // Sub Title
            $this->add_control(
                'style4_subtitle_heading',
                [
                    'label' => esc_html__('Sub Title', 'axero-toolkit'),
                    'type'  => Controls_Manager::HEADING,
                ]
            );
            $this->add_control(
                'style4_subtitle_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .career-page-banner-area .content .sub-title' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style4_subtitle_typography',
                    'selector' => '{{WRAPPER}} .career-page-banner-area .content .sub-title',
                ]
            );

            // Title One (h1)
            $this->add_control(
                'style4_title_one_heading',
                [
                    'label' => esc_html__('Main Title', 'axero-toolkit'),
                    'type'  => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'style4_title_one_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .career-page-banner-area .content h1' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style4_title_one_typography',
                    'selector' => '{{WRAPPER}} .career-page-banner-area .content h1',
                ]
            );

            // Title Two (h1 span)
            $this->add_control(
                'style4_title_two_heading',
                [
                    'label' => esc_html__('Main Title Highlight', 'axero-toolkit'),
                    'type'  => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'style4_title_two_color',
                [
                    'label'     => esc_html__('Highlight Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .career-page-banner-area .content h1 span' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style4_title_two_typography',
                    'selector' => '{{WRAPPER}} .career-page-banner-area .content h1 span',
                ]
            );

            // Counter Number
            $this->add_control(
                'style4_counter_number_heading',
                [
                    'label' => esc_html__('Counter Number', 'axero-toolkit'),
                    'type'  => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'style4_counter_number_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .career-page-banner-area .content .funfacts .funfact .number' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style4_counter_number_typography',
                    'selector' => '{{WRAPPER}} .career-page-banner-area .content .funfacts .funfact .number',
                ]
            );

            // Counter Text
            $this->add_control(
                'style4_counter_text_heading',
                [
                    'label' => esc_html__('Counter Text', 'axero-toolkit'),
                    'type'  => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'style4_counter_text_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .career-page-banner-area .content .funfacts .funfact span' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style4_counter_text_typography',
                    'selector' => '{{WRAPPER}} .career-page-banner-area .content .funfacts .funfact span',
                ]
            );

            // Counter Line Background
            $this->add_control(
                'style4_counter_line_bg_heading',
                [
                    'label' => esc_html__('Counter Line', 'axero-toolkit'),
                    'type'  => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'style4_counter_line_bg_color',
                [
                    'label'     => esc_html__('Line Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .career-page-banner-area .content .funfacts .funfact::before' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            // Description
            $this->add_control(
                'style4_desc_heading',
                [
                    'label' => esc_html__('Description', 'axero-toolkit'),
                    'type'  => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'style4_desc_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .career-page-banner-area .content .funfacts p' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style4_desc_typography',
                    'selector' => '{{WRAPPER}} .career-page-banner-area .content .funfacts p',
                ]
            );
            $this->end_controls_section();
        }

        protected function render()
        {
            $settings = $this->get_settings_for_display();
            if ($settings['style_selection'] === 'style1') { ?>
                <!-- style 1 -->
                <div class="main_home_banner_area position-relative z-1">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-8 col-md-12">
                                <div class="main_home_banner_content" data-cues="slideInUp" data-group="main_home_banner_content">
                                    <h1 class="text-uppercase">
                                        <?php echo wp_kses_post($settings['style1_main_title_before_img']); ?>
                                        <?php if (!empty($settings['style1_main_title_img']['url'])) : ?>
                                            <img src="<?php echo esc_url($settings['style1_main_title_img']['url']); ?>" alt="<?php echo esc_attr__('circle', 'axero-toolkit'); ?>">
                                        <?php endif; ?>
                                        <?php echo wp_kses_post($settings['style1_main_title_after_img']); ?>
                                    </h1>
                                    <?php if (!empty($settings['style1_button_text'])) : 
                                        $button_url = !empty($settings['style1_button_link']['url']) ? $settings['style1_button_link']['url'] : '#';
                                        $is_external = !empty($settings['style1_button_link']['is_external']) ? ' target="_blank"' : '';
                                        $nofollow = !empty($settings['style1_button_link']['nofollow']) ? ' rel="nofollow"' : '';
                                    ?>
                                        <a href="<?php echo esc_url($button_url); ?>" class="btn primary_btn"<?php echo $is_external . $nofollow; ?>>
                                            <span class="d-inline-block position-relative">
                                                <?php echo wp_kses_post($settings['style1_button_text']); ?>
                                                <?php if (!empty($settings['style1_button_icon']['value'])) : ?>
                                                    <?php \Elementor\Icons_Manager::render_icon( $settings['style1_button_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                                <?php endif; ?>
                                            </span>
                                        </a>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['style1_sub_title'])) : ?>
                                        <span class="d-block sub_title fw-medium text-uppercase">
                                            <?php echo wp_kses_post($settings['style1_sub_title']); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="main_home_banner_text position-relative">
                                    <?php if (!empty($settings['style1_right_title'])) : ?>
                                        <span class="sub_title d-block fw-bold">
                                            <?php echo wp_kses_post($settings['style1_right_title']); ?>
                                        </span>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['style1_right_text'])) : ?>
                                        <p class="fw-medium text_animation">
                                            <?php echo wp_kses_post($settings['style1_right_text']); ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="scroll_down_text">
                        <div class="dot"></div>
                        <?php if (!empty($settings['style1_scroll_text'])) : ?>
                            <span class="d-block fw-medium text-uppercase">
                                <?php echo wp_kses_post($settings['style1_scroll_text']); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
        
            <?php } elseif ($settings['style_selection'] === 'style2') { ?>
                <!-- style 2 -->
                <div class="hero_banner_area position-relative z-1 overflow-hidden">
                    <div class="container-fluid">
                        <div class="hero_banner_content text-center mx-auto position-relative z-1" data-cues="slideInUp" data-group="hero_banner_content">
                            <h1 class="fw-bold">
                                <?php if (!empty($settings['style2_main_title_before_img'])) : ?>
                                    <?php echo esc_html($settings['style2_main_title_before_img']); ?>
                                <?php endif; ?>
                                <?php if (!empty($settings['style2_main_title_img']['url'])) : ?>
                                    <img src="<?php echo esc_url($settings['style2_main_title_img']['url']); ?>" alt="<?php echo esc_attr(basename($settings['style2_main_title_img']['url'], '.' . pathinfo($settings['style2_main_title_img']['url']))); ?>">
                                <?php endif; ?>
                                <?php if (!empty($settings['style2_main_title_after_img'])) : ?>
                                    <?php echo esc_html($settings['style2_main_title_after_img']); ?>
                                <?php endif; ?>
                            </h1>
                            <?php if (!empty($settings['style2_button_text'])) : 
                                $button_url = !empty($settings['style2_button_link']['url']) ? $settings['style2_button_link']['url'] : '#';
                                $is_external = !empty($settings['style2_button_link']['is_external']) ? ' target="_blank"' : '';
                                $nofollow = !empty($settings['style2_button_link']['nofollow']) ? ' rel="nofollow"' : '';
                            ?>
                                <a href="<?php echo esc_url($button_url); ?>" class="btn primary_btn"<?php echo $is_external . $nofollow; ?>>
                                    <span class="d-inline-block position-relative">
                                        <?php echo esc_html($settings['style2_button_text']); ?>
                                        <?php if (!empty($settings['style2_button_icon']['value'])) : ?>
                                            <?php \Elementor\Icons_Manager::render_icon( $settings['style2_button_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                        <?php endif; ?>
                                    </span>
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="hero_banner_image position-relative z-1">
                            <div class="row" data-cues="slideInUp" data-group="hero_banner_image">
                                <div class="col-lg-4 col-md-6 order-1 order-lg-1">
                                    <div class="left_image">
                                        <?php if (!empty($settings['style2_left_image']['url'])) : ?>
                                            <img src="<?php echo esc_url($settings['style2_left_image']['url']); ?>" alt="visitors">
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-lg-4 order-3 order-lg-2">
                                    <div class="center_image text-center position-relative">
                                        <?php if (!empty($settings['style2_center_image']['url'])) : ?>
                                            <img src="<?php echo esc_url($settings['style2_center_image']['url']); ?>" alt="hero_banner1">
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 order-2 order-lg-3">
                                    <div class="right_image">
                                        <?php if (!empty($settings['style2_right_image']['url'])) : ?>
                                            <img src="<?php echo esc_url($settings['style2_right_image']['url']); ?>" alt="audiences">
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="object2">
                                <?php if (!empty($settings['style2_object2_image']['url'])) : ?>
                                    <img src="<?php echo esc_url($settings['style2_object2_image']['url']); ?>" alt="object2">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="scroll_text_area overflow-hidden position-relative z-1">
                        <div class="container-fluid px-0">
                        <div class="scroll_text_marquee d-flex align-items-center justify-content-center">
                                <?php foreach ($settings['style2_slides'] as $slide): ?>
                                    <h3 class="mb-0 text-uppercase fw-semibold lh-1">
                                        <?php echo esc_html($slide['style2_slide_text']); ?>
                                    </h3>
                                    <img src="<?php echo esc_url($slide['style2_slide_image']['url']); ?>" 
                                        class="w-auto d-inline-block" 
                                        alt="<?php echo esc_attr($slide['style2_slide_text']); ?>">
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            
            <?php } elseif ($settings['style_selection'] === 'style3') { ?>
                <!-- style 3 -->
                <div class="banner_wrapper_area pb_150 position-relative z-1 overflow-hidden">
                    <div class="container-fluid max_w_1560px">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <div class="banner_wrapper_content">
                                    <h1 class="text-uppercase fw-black text_animation">
                                        <?php echo wp_kses_post($settings['style3_main_title_before']); ?>
                                        <?php if (!empty($settings['style3_main_title_image']['url'])) : ?>
                                            <img src="<?php echo esc_url($settings['style3_main_title_image']['url']); ?>" alt="<?php echo esc_attr($settings['style3_main_title_after']); ?>">
                                        <?php endif; ?>
                                        <?php echo wp_kses_post($settings['style3_main_title_after']); ?>
                                    </h1>
                                    <?php if (!empty($settings['style3_button_text'])) : ?>
                                        <?php
                                            $button_url = !empty($settings['style3_button_link']['url']) ? $settings['style3_button_link']['url'] : '#';
                                            $is_external = !empty($settings['style3_button_link']['is_external']) ? ' target="_blank"' : '';
                                            $nofollow = !empty($settings['style3_button_link']['nofollow']) ? ' rel="nofollow"' : '';
                                        ?>
                                        <a href="<?php echo esc_url($button_url); ?>" class="btn primary_btn style_two" data-cue="slideInUp"<?php echo $is_external . $nofollow; ?>>
                                            <span class="d-inline-block position-relative">
                                                <?php echo esc_html($settings['style3_button_text']); ?>
                                                <?php if (!empty($settings['style3_button_icon']['value'])) : ?>
                                                    <?php \Elementor\Icons_Manager::render_icon($settings['style3_button_icon'], ['aria-hidden' => 'true']); ?>
                                                <?php endif; ?>
                                            </span>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="banner_wrapper_image position-relative">
                                    <?php if (!empty($settings['banner3_style3_right_image']['url'])) : ?>
                                        <img src="<?php echo esc_url($settings['banner3_style3_right_image']['url']); ?>" alt="<?php echo esc_attr($settings['style3_main_title_after']); ?>">
                                    <?php endif; ?>
                                    <div class="scroll_down">
                                        <span class="d-inline-block fw-medium position-relative">
                                            <?php echo wp_kses_post($settings['style3_scroll_text']); ?> <i class="ri-arrow-down-line"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="banner_wrapper_bottom text-center" data-cue="slideInUp">
                            <div class="row align-items-center">
                                <div class="col-lg-8">
                                    <div class="left_side">
                                        <div class="row">
                                            <?php
                                            if (!empty($settings['style3_left_images']) && is_array($settings['style3_left_images'])) :
                                                foreach (array_slice($settings['style3_left_images'], 0, 2) as $left_img) : ?>
                                                    <div class="col-6">
                                                        <img src="<?php echo esc_url($left_img['url']); ?>" alt="<?php echo esc_attr(basename($left_img['url'])); ?>">
                                                    </div>
                                                <?php endforeach;
                                            endif;
                                            ?>
                                        </div>
                                        <div class="quote_box text-start">
                                            <div class="row align-items-center">
                                                <div class="col-lg-5">
                                                    <div class="author d-flex align-items-center">
                                                        <?php if (!empty($settings['style3_author_image']['url'])) : ?>
                                                            <img src="<?php echo esc_url($settings['style3_author_image']['url']); ?>" alt="<?php echo esc_attr($settings['style3_author_name']); ?>">
                                                        <?php endif; ?>
                                                        <div>
                                                            <h4>
                                                                <?php echo wp_kses_post($settings['style3_author_name']); ?>
                                                            </h4>
                                                            <span class="d-block">
                                                                <?php echo wp_kses_post($settings['style3_author_position']); ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <p>
                                                        <?php echo wp_kses_post($settings['style3_quote_text']); ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="right_side">
                                        <?php if (!empty($settings['style3_right_image']['url'])) : ?>
                                            <img src="<?php echo esc_url($settings['style3_right_image']['url']); ?>" alt="<?php echo esc_attr(basename($settings['style3_right_image']['url'])); ?>">
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="satisfied_customers mx-auto d-flex align-items-center justify-content-center">
                                <div class="icon rounded-circle text-center">
                                    <?php if (!empty($settings['style3_satisfied_customers_icon']['value'])) : ?>
                                        <?php \Elementor\Icons_Manager::render_icon( $settings['style3_satisfied_customers_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                    <?php endif; ?>
                                </div>
                                <span class="d-inline-block">
                                    <?php echo wp_kses_post($settings['style3_satisfied_customers_text']); ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="border_lines">
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                    </div>
                </div>  
            <?php
            }
        }
    }

$widgets_manager->register(new axero_banner_1());
