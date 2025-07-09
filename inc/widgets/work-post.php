<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class Axero_work_post extends Widget_Base
    {

        public function get_name()
        {
            return 'Axero-work-post';
        }

        public function get_title()
        {
            return __('Work post', 'axero-toolkit');
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
        protected function get_post_categories()
        {
            $categories = get_terms([
                'taxonomy'   => 'works_category',
                'hide_empty' => false,
            ]);
            $options = [];

            if (! empty($categories) && ! is_wp_error($categories)) {
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
                        'style4' => esc_html__('Style 4', 'axero-toolkit'),
                        'style5' => esc_html__('Style 5', 'axero-toolkit'),
                        'style6' => esc_html__('Style 6', 'axero-toolkit'),
                        'style7' => esc_html__('Style 7', 'axero-toolkit'),
                        'style8' => esc_html__('Style 8', 'axero-toolkit'),
                    ],
                ]
            );

            $this->end_controls_section();

            // Style 5 Vector Image Controls
            $this->start_controls_section(
                'style5_vector_image_section',
                [
                    'label'     => esc_html__('Style 5 Vector Image', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'style_selection' => 'style5',
                    ],
                ]
            );

            $this->add_control(
                'style5_vector_image',
                [
                    'label'       => esc_html__('Vector Image', 'axero-toolkit'),
                    'type'        => Controls_Manager::MEDIA,
                    'default'     => [
                        'url' => get_template_directory_uri() . '/assets/images/icons/vector2.svg',
                    ],
                    'description' => esc_html__('Upload or select a vector image to display in the style 5 layout', 'axero-toolkit'),
                ]
            );

            $this->end_controls_section();

            // work Filter Controls
            $this->start_controls_section(
                'post_filter_section',
                [
                    'label' => esc_html__('work Filter', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'posts_per_page',
                [
                    'label'   => esc_html__('works Per Page', 'axero-toolkit'),
                    'type'    => Controls_Manager::NUMBER,
                    'default' => 6,
                    'min'     => 1,
                    'max'     => 24,
                ]
            );

            $this->add_control(
                'orderby',
                [
                    'label'   => esc_html__('Order By', 'axero-toolkit'),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'date',
                    'options' => [
                        'date'          => esc_html__('Date', 'axero-toolkit'),
                        'title'         => esc_html__('Title', 'axero-toolkit'),
                        'rand'          => esc_html__('Random', 'axero-toolkit'),
                        'comment_count' => esc_html__('Comment Count', 'axero-toolkit'),
                    ],
                ]
            );

            $this->add_control(
                'order',
                [
                    'label'   => esc_html__('Order', 'axero-toolkit'),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'DESC',
                    'options' => [
                        'ASC'  => esc_html__('Ascending', 'axero-toolkit'),
                        'DESC' => esc_html__('Descending', 'axero-toolkit'),
                    ],
                ]
            );

            $this->add_control(
                'category_filter',
                [
                    'label'       => esc_html__('Filter by Category', 'axero-toolkit'),
                    'type'        => Controls_Manager::SELECT2,
                    'options'     => $this->get_post_categories('works_category'),
                    'multiple'    => true,
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'exclude_posts',
                [
                    'label'       => esc_html__('Exclude works', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'description' => esc_html__('Enter post IDs separated by commas', 'axero-toolkit'),
                ]
            );

            $this->end_controls_section();

        }

        protected function style_tab_content()
        {
            // content style controls tab
            $this->start_controls_section(
                'style_tab_1',
                [
                    'label'     => esc_html__('Style Tab 1', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            $this->add_control(
                'title_color',
                [
                    'label'     => esc_html__('Title Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .case-studies-lines .item .content h3'   => 'color: {{VALUE}};',
                        '{{WRAPPER}} .case-studies-lines .item .content h3 a' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'title_hover_color',
                [
                    'label'     => esc_html__('Title Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .case-studies-lines .item .content h3 a:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'title_typography',
                    'label'    => esc_html__('Title Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .case-studies-lines h3',
                ]
            );
            $this->add_control(
                'text_color',
                [
                    'label'     => esc_html__('Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .case-studies-lines .content p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'text_hover_color',
                [
                    'label'     => esc_html__('Text Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .case-studies-lines .content:hover p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'text_typography',
                    'label'    => esc_html__('Text Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .case-studies-lines .content p',
                ]
            );
            $this->add_control(
                'link_icon_color',
                [
                    'label'     => esc_html__('Link Icon Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .case-studies-lines .content .link-btn i' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'link_icon_bg_color',
                [
                    'label'     => esc_html__('Link Icon Background', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .case-studies-lines .content .link-btn i' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'link_icon_hover_color',
                [
                    'label'     => esc_html__('Link Icon Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .case-studies-lines .item:hover .content .link-btn i' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'link_icon_hover_bg_color',
                [
                    'label'     => esc_html__('Link Icon Hover Background', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .case-studies-lines .item:hover .content .link-btn i' => 'background-color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'number_color',
                [
                    'label'     => esc_html__('Number Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .case-studies-lines .content .number' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'number_bg_color',
                [
                    'label'     => esc_html__('Number Background', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .case-studies-lines .content .number' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'number_hover_color',
                [
                    'label'     => esc_html__('Number Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .case-studies-lines .item:hover .content .number' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'number_hover_bg_color',
                [
                    'label'     => esc_html__('Number Hover Background', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .case-studies-lines .item:hover .content .number' => 'background-color: {{VALUE}};',
                    ],
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'style3_content',
                [
                    'label'     => esc_html__('Style 3 Content', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style3',
                    ],
                ]
            );

            // Number Color Typography
            $this->add_control(
                'style3_number_color',
                [
                    'label'     => esc_html__('Number Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .projects-list .project-item .number' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style3_number_typography',
                    'selector' => '{{WRAPPER}} .projects-list .project-item .number',
                ]
            );

            // Title Text Color Typography
            $this->add_control(
                'style3_title_text_color',
                [
                    'label'     => esc_html__('Title Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .projects-list .project-item .title span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style3_title_text_typography',
                    'selector' => '{{WRAPPER}} .projects-list .project-item .title span',
                ]
            );

            // Link Button Color and Background Color
            $this->add_control(
                'style3_link_btn_color',
                [
                    'label'     => esc_html__('Link Button Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .projects-list .project-item .details .content .link-btn' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style3_link_btn_bg_color',
                [
                    'label'     => esc_html__('Link Button Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .projects-list .project-item .details .content .link-btn' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            // H3 Color and Typography
            $this->add_control(
                'style3_h3_color',
                [
                    'label'     => esc_html__('H3 Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .projects-list .project-item .details .content h3 a.style3work' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style3_h3_hover_color',
                [
                    'label'     => esc_html__('H3 Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .projects-list .project-item .details .content h3 a.style3work:hover' => 'color: {{VALUE}} !important;',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style3_h3_typography',
                    'selector' => '{{WRAPPER}} .projects-list .project-item .details .content h3 a.style3work',
                ]
            );

            // Paragraph Color Typography
            $this->add_control(
                'style3_paragraph_color',
                [
                    'label'     => esc_html__('Paragraph Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .projects-list .project-item .details .content p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style3_paragraph_typography',
                    'selector' => '{{WRAPPER}} .projects-list .project-item .details .content p',
                ]
            );

            $this->end_controls_section();

            $this->start_controls_section(
                'style4_controls',
                [
                    'label'     => esc_html__('Style 4 Controls', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style4',
                    ],
                ]
            );

            // H3 Color Control
            $this->add_control(
                'style4_h3_color',
                [
                    'label'     => esc_html__('H3 Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-case-study-item .content h3 a' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // H3 Hover Color Control
            $this->add_control(
                'style4_h3_hover_color',
                [
                    'label'     => esc_html__('H3 Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-case-study-item .content h3 a:hover' => 'color: {{VALUE}} !important;',
                    ],
                ]
            );

            // H3 Typography Control
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style4_h3_typography',
                    'selector' => '{{WRAPPER}} .single-case-study-item .content h3 a',
                ]
            );

            // Paragraph Color Control
            $this->add_control(
                'style4_paragraph_color',
                [
                    'label'     => esc_html__('Paragraph Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-case-study-item .content p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Paragraph Typography Control
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style4_paragraph_typography',
                    'selector' => '{{WRAPPER}} .single-case-study-item .content p',
                ]
            );

            // Read More Button Color Control
            $this->add_control(
                'style4_readmore_color',
                [
                    'label'     => esc_html__('Read More Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-case-study-item .link-btn' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Read More Button Hover Color Control
            $this->add_control(
                'style4_readmore_hover_color',
                [
                    'label'     => esc_html__('Read More Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-case-study-item .link-btn:hover' => 'color: {{VALUE}} !important;',
                    ],
                ]
            );

            // Read More Button Icon Color Control
            $this->add_control(
                'style4_readmore_icon_color',
                [
                    'label'     => esc_html__('Read More Icon Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-case-study-item .link-btn i' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'style4_readmore_icon_hover_bg_color',
                [
                    'label'     => esc_html__('Read More Icon Hover Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-case-study-item .link-btn i:hover' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_section();
            // Style5 Background Tab
            $this->start_controls_section(
                'style5_background_tab',
                [
                    'label'     => esc_html__('Style 5 Background', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style5',
                    ],
                ]
            );

            // Background Color Control
            $this->add_control(
                'style5_background_color',
                [
                    'label'     => esc_html__('Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awesome_works_list .item_box::before' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            // Background Opacity Control
            $this->add_control(
                'style5_background_opacity',
                [
                    'label'      => esc_html__('Background Opacity', 'axero-toolkit'),
                    'type'       => Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range'      => [
                        'px' => [
                            'min'  => 0,
                            'max'  => 1,
                            'step' => 0.1,
                        ],
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} .awesome_works_list .item_box::before' => 'opacity: {{SIZE}};',
                    ],
                ]
            );

            // Background Blend Mode Control
            $this->add_control(
                'style5_background_blend_mode',
                [
                    'label'     => esc_html__('Blend Mode', 'axero-toolkit'),
                    'type'      => Controls_Manager::SELECT,
                    'default'   => 'normal',
                    'options'   => [
                        'normal'   => esc_html__('Normal', 'axero-toolkit'),
                        'multiply' => esc_html__('Multiply', 'axero-toolkit'),
                        'screen'   => esc_html__('Screen', 'axero-toolkit'),
                        'overlay'  => esc_html__('Overlay', 'axero-toolkit'),
                        'darken'   => esc_html__('Darken', 'axero-toolkit'),
                        'lighten'  => esc_html__('Lighten', 'axero-toolkit'),
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .awesome_works_list .item_box::before' => 'mix-blend-mode: {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_section();
            // Style 5 Number and Title Controls
            $this->start_controls_section(
                'style5_number_title_section',
                [
                    'label'     => esc_html__('Style 5 Number & Title', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style5',
                    ],
                ]
            );

            // Number Color Control
            $this->add_control(
                'style5_number_color',
                [
                    'label'     => esc_html__('Number Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awesome_works_list .item_box .title .number' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Number Typography Control
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style5_number_typography',
                    'label'    => esc_html__('Number Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .awesome_works_list .item_box .title .number',
                ]
            );

            // Title Color Control
            $this->add_control(
                'style5_title_color',
                [
                    'label'     => esc_html__('Title Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awesome_works_list .item_box .title h3' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Title Typography Control
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style5_title_typography',
                    'label'    => esc_html__('Title Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .awesome_works_list .item_box .title h3',
                ]
            );

            // Title Hover Color Control
            $this->add_control(
                'style5_title_hover_color',
                [
                    'label'     => esc_html__('Title Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awesome_works_list .item_box:hover .title h3' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Number Hover Color Control
            $this->add_control(
                'style5_number_hover_color',
                [
                    'label'     => esc_html__('Number Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awesome_works_list .item_box:hover .title .number' => 'color: {{VALUE}};',
                    ],
                ]
            );
            // Description Color Control
            $this->add_control(
                'style5_description_color',
                [
                    'label'     => esc_html__('Description Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awesome_works_list .item_box .content p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Description Typography Control
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style5_description_typography',
                    'label'    => esc_html__('Description Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .awesome_works_list .item_box .content p',
                ]
            );

            $this->end_controls_section();
            $this->start_controls_section(
                'style6_controls',
                [
                    'label'     => esc_html__('Style 6 Controls', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style6',
                    ],
                ]
            );

            // Details Link Button Color
            $this->add_control(
                'style6_details_btn_color',
                [
                    'label'     => esc_html__('Details Button Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .case_study_box .image .details_link_btn' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Details Link Button Background Color
            $this->add_control(
                'style6_details_btn_bg_color',
                [
                    'label'     => esc_html__('Details Button Background', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .case_study_box .image .details_link_btn' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            // Details Link Button Hover Color
            $this->add_control(
                'style6_details_btn_hover_color',
                [
                    'label'     => esc_html__('Details Button Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .case_study_box .image .details_link_btn:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Details Link Button Hover Background Color
            $this->add_control(
                'style6_details_btn_hover_bg_color',
                [
                    'label'     => esc_html__('Details Button Hover Background', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .case_study_box .image .details_link_btn:hover' => 'background-color: {{VALUE}};',
                    ],
                ]
            );
            // Title Color Control
            $this->add_control(
                'style6_title_color',
                [
                    'label'     => esc_html__('Title Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .case_study_box .content h3 a' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Title Hover Color Control
            $this->add_control(
                'style6_title_hover_color',
                [
                    'label'     => esc_html__('Title Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .case_study_box .content h3 a:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Title Typography Control
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style6_title_typography',
                    'label'    => esc_html__('Title Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .case_study_box .content h3 a',
                ]
            );
            // Sub Title Color Control
            $this->add_control(
                'style6_sub_title_color',
                [
                    'label'     => esc_html__('Sub Title Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .case_study_box .content .sub_title' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Sub Title Typography Control
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style6_sub_title_typography',
                    'label'    => esc_html__('Sub Title Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .case_study_box .content .sub_title',
                ]
            );

            // Sub Title Border Control
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name'     => 'style6_sub_title_border',
                    'label'    => esc_html__('Sub Title Border', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .case_study_box .content .sub_title',
                ]
            );
            $this->end_controls_section();
            // Style 7 Controls
            $this->start_controls_section(
                'style7_section',
                [
                    'label'     => esc_html__('Style 7', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style7',
                    ],
                ]
            );

            // Item Style
            $this->add_control(
                'style7_item_heading',
                [
                    'label' => esc_html__('Item Style', 'axero-toolkit'),
                    'type'  => Controls_Manager::HEADING,
                ]
            );

            $this->start_controls_tabs('style7_item_tabs');

            // Normal Tab
            $this->start_controls_tab(
                'style7_item_normal',
                [
                    'label' => esc_html__('Normal', 'axero-toolkit'),
                ]
            );

            $this->add_control(
                'style7_item_bg_color',
                [
                    'label'     => esc_html__('Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .load_more_items_list .item' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style7_title_color',
                [
                    'label'     => esc_html__('Title Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .load_more_items_list .item h3 a' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_tab();

            // Hover Tab
            $this->start_controls_tab(
                'style7_item_hover',
                [
                    'label' => esc_html__('Hover', 'axero-toolkit'),
                ]
            );

            $this->add_control(
                'style7_item_hover_bg_color',
                [
                    'label'     => esc_html__('Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .load_more_items_list .item:hover' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style7_title_hover_color',
                [
                    'label'     => esc_html__('Title Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .load_more_items_list .item:hover h3 a' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_tab();
            $this->end_controls_tabs();

            // Title Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style7_title_typography',
                    'label'    => esc_html__('Title Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .load_more_items_list .item h3 a',
                ]
            );

            // Category Style
            $this->add_control(
                'style7_category_heading',
                [
                    'label'     => esc_html__('Category Style', 'axero-toolkit'),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'     => 'style7_category_bg',
                    'label'    => esc_html__('Background', 'axero-toolkit'),
                    'types'    => ['classic', 'gradient'],
                    'selector' => '{{WRAPPER}} .load_more_items_list .item .category',
                ]
            );

            $this->add_control(
                'style7_category_text_color',
                [
                    'label'     => esc_html__('Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .load_more_items_list .item .category' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style7_category_padding',
                [
                    'label'      => esc_html__('Padding', 'axero-toolkit'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .load_more_items_list .item .category' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'default'    => [
                        'top'      => '7',
                        'right'    => '21',
                        'bottom'   => '7',
                        'left'     => '21',
                        'unit'     => 'px',
                        'isLinked' => false,
                    ],
                ]
            );

            $this->add_control(
                'style7_category_border_radius',
                [
                    'label'      => esc_html__('Border Radius', 'axero-toolkit'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .load_more_items_list .item .category' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'default'    => [
                        'top'      => '20',
                        'right'    => '20',
                        'bottom'   => '20',
                        'left'     => '20',
                        'unit'     => 'px',
                        'isLinked' => true,
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name'           => 'style7_category_border',
                    'label'          => esc_html__('Border', 'axero-toolkit'),
                    'selector'       => '{{WRAPPER}} .load_more_items_list .item .category',
                    'fields_options' => [
                        'border' => [
                            'default' => 'solid',
                        ],
                        'width'  => [
                            'default' => [
                                'top'      => '1',
                                'right'    => '1',
                                'bottom'   => '1',
                                'left'     => '1',
                                'isLinked' => true,
                            ],
                        ],
                        'color'  => [
                            'default' => '#000000',
                        ],
                    ],
                ]
            );

            $this->end_controls_section();
            // Style 7 Image Controls
            $this->start_controls_section(
                'style7_image_style',
                [
                    'label'     => esc_html__('Image Style (Style 7)', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style7',
                    ],
                ]
            );

            // Image Width Control
            $this->add_responsive_control(
                'style7_image_width',
                [
                    'label'      => esc_html__('Width', 'axero-toolkit'),
                    'type'       => Controls_Manager::SLIDER,
                    'size_units' => ['px', '%'],
                    'range'      => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                        ],
                        '%'  => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} .load_more_items_list .item .image img' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            // Image Height Control
            $this->add_responsive_control(
                'style7_image_height',
                [
                    'label'      => esc_html__('Height', 'axero-toolkit'),
                    'type'       => Controls_Manager::SLIDER,
                    'size_units' => ['px', '%'],
                    'range'      => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                        ],
                        '%'  => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} .load_more_items_list .item .image img' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            // Image Border Control
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name'     => 'style7_image_border',
                    'label'    => esc_html__('Border', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .load_more_items_list .item .image img',
                ]
            );

            // Image Border Radius Control
            $this->add_control(
                'style7_image_border_radius',
                [
                    'label'      => esc_html__('Border Radius', 'axero-toolkit'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .load_more_items_list .item .image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->end_controls_section();
            $this->start_controls_section(
                'style8_image_section',
                [
                    'label'     => esc_html__('Style 8 Image', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style8',
                    ],
                ]
            );

            $this->add_responsive_control(
                'style8_image_width',
                [
                    'label'      => esc_html__('Image Width', 'axero-toolkit'),
                    'type'       => Controls_Manager::SLIDER,
                    'size_units' => ['px', '%'],
                    'range'      => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                        ],
                        '%'  => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} .projects-circle-list .images .image img' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'style8_image_height',
                [
                    'label'      => esc_html__('Image Height', 'axero-toolkit'),
                    'type'       => Controls_Manager::SLIDER,
                    'size_units' => ['px', '%'],
                    'range'      => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                        ],
                        '%'  => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} .projects-circle-list .images .image img' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name'     => 'style8_image_border',
                    'label'    => esc_html__('Image Border', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .projects-circle-list .images .image img',
                ]
            );

            $this->add_control(
                'style8_image_border_radius',
                [
                    'label'      => esc_html__('Image Border Radius', 'axero-toolkit'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .projects-circle-list .images .image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->end_controls_section();

            $this->start_controls_section(
                'style8_title_section',
                [
                    'label'     => esc_html__('Style 8 Title', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style8',
                    ],
                ]
            );

            $this->add_control(
                'style8_title_color',
                [
                    'label'     => esc_html__('Title Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .projects-circle-list .contents .item h3 a' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style8_title_hover_color',
                [
                    'label'     => esc_html__('Title Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .projects-circle-list .contents .item h3 a:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style8_title_typography',
                    'selector' => '{{WRAPPER}} .projects-circle-list .contents .item h3 a',
                ]
            );

            $this->end_controls_section();

            $this->start_controls_section(
                'style8_description_section',
                [
                    'label'     => esc_html__('Style 8 Description', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style8',
                    ],
                ]
            );

            $this->add_control(
                'style8_description_color',
                [
                    'label'     => esc_html__('Description Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .projects-circle-list .contents .item p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style8_description_typography',
                    'selector' => '{{WRAPPER}} .projects-circle-list .contents .item p',
                ]
            );

            $this->end_controls_section();

            $this->start_controls_section(
                'style8_link_btn_section',
                [
                    'label'     => esc_html__('Style 8 Link Button', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style8',
                    ],
                ]
            );

            $this->add_control(
                'style8_link_btn_color',
                [
                    'label'     => esc_html__('Link Button Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .projects-circle-list .contents .item .link-btn' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style8_link_btn_hover_color',
                [
                    'label'     => esc_html__('Link Button Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .projects-circle-list .contents .item .link-btn:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_section();
            // Style 2 Title Style
            $this->start_controls_section(
                'style2_title_style',
                [
                    'label'     => esc_html__('Style 2 Title Style', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style2',
                    ],
                ]
            );

            $this->add_control(
                'style2_title_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .case-studies-list .item h3 a' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style2_title_hover_color',
                [
                    'label'     => esc_html__('Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .case-studies-list .item h3 a:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style2_title_typography',
                    'selector' => '{{WRAPPER}} .case-studies-list .item h3 a',
                ]
            );

            $this->end_controls_section();

            // Style 2 Date Style
            $this->start_controls_section(
                'style2_date_style',
                [
                    'label'     => esc_html__('Style 2 Date Style', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style2',
                    ],
                ]
            );

            $this->add_control(
                'style2_date_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .case-studies-list .item .date' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style2_date_typography',
                    'selector' => '{{WRAPPER}} .case-studies-list .item .date',
                ]
            );

            $this->end_controls_section();

            // Style 2 Link Button Style
            $this->start_controls_section(
                'style2_link_btn_style',
                [
                    'label'     => esc_html__('Style 2 Link Button Style', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style2',
                    ],
                ]
            );

            $this->add_control(
                'style2_link_btn_bg_color',
                [
                    'label'     => esc_html__('Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .case-studies-list .item .link-btn' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style2_link_btn_hover_bg_color',
                [
                    'label'     => esc_html__('Hover Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .case-studies-list .item:hover .link-btn' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_section();

        }

        protected function render()
        {
            $settings   = $this->get_settings_for_display();
            $query_args = [
                'post_type'      => 'works',
                'posts_per_page' => $settings['posts_per_page'] ? $settings['posts_per_page'] : 3,
                'orderby'        => $settings['orderby'] ? $settings['orderby'] : 'date',
                'order'          => $settings['order'] ? $settings['order'] : 'DESC',
                'post_status'    => 'publish', // Ensure only published posts are queried
            ];

            // Add category filter if set
            if (! empty($settings['category_filter'])) {
                $query_args['tax_query'] = [
                    [
                        'taxonomy' => 'works_category',
                        'field'    => 'term_id',
                        'terms'    => $settings['category_filter'],
                    ],
                ];
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
  <div class="case-studies-area">
    <div class="container">
        <div class="case-studies-lines">
            <?php if ($query->have_posts()):
                                $count = 1;
                            while ($query->have_posts()): $query->the_post(); ?>
								                    <div class="item">
								                        <div class="row">
								                            <div class="col-lg-5 col-md-12">
								                                <?php if (has_post_thumbnail()): ?>
								                                    <a href="<?php the_permalink(); ?>" class="image d-block">
								                                        <?php the_post_thumbnail('full', ['alt' => get_the_title()]); ?>
								                                    </a>
								                                <?php endif; ?>
				                            </div>
				                            <div class="col-lg-7 col-md-12">
				                                <div class="content position-relative">
				                                    <div class="number d-flex align-items-center justify-content-center text-center rounded-circle">
				                                        <?php echo str_pad($count, 2, '0', STR_PAD_LEFT); ?>
				                                    </div>
				                                    <h3 class="fw-normal">
				                                        <a href="<?php the_permalink(); ?>">
				                                            <?php the_title(); ?>
				                                        </a>
				                                    </h3>
				                                    <p class="fw-medium">
				                                        <?php echo get_the_excerpt(); ?>
				                                    </p>
				                                    <a href="<?php the_permalink(); ?>" class="link-btn d-flex align-items-center fw-medium">
				                                        <?php esc_html_e('Read More', 'axero-toolkit'); ?> <i class="ri-arrow-right-up-line"></i>
				                                    </a>
				                                </div>
				                            </div>
				                        </div>
				                    </div>
				                    <?php $count++; ?>
<?php endwhile;
                wp_reset_postdata();
            else: ?>
                <p><?php esc_html_e('No works found.', 'axero-toolkit'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>
    <?php
        } elseif ($settings['style_selection'] === 'style2') {
                ?>
<!-- style 2 -->
       <div class="case-studies-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-12">
                        <div class="case-studies-list" data-cues="slideInUp">
                            <?php if ($query->have_posts()):
                                            while ($query->have_posts()): $query->the_post(); ?>
								                                    <div class="item position-relative">
								                                        <h3>
								                                            <a href="<?php the_permalink(); ?>">
								                                                <?php the_title(); ?>
								                                            </a>
								                                        </h3>
								                                        <span class="d-block date">
								                                            <?php echo get_the_date('d M Y'); ?>
								                                        </span>
								                                        <a href="<?php the_permalink(); ?>" class="link-btn d-inline-block rounded-circle text-center">
								                                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icons/big-right-top-arrow2.svg" alt="big-right-top-arrow">
								                                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icons/white-right-top-arrow3.svg" alt="big-right-top-arrow">
								                                        </a>
								                                    </div>
								                                <?php endwhile;
                                                                                    wp_reset_postdata();
                                                                            else: ?>
                                <p><?php esc_html_e('No works found.', 'axero-toolkit'); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12">
                        <div class="case-studies-image" data-cue="slideInUp">
                            <div class="images position-relative">
                                <?php
                                    if ($query->have_posts()):
                                                while ($query->have_posts()): $query->the_post(); ?>
								                                        <div class="image">
								                                            <?php if (has_post_thumbnail()): ?>
								                                                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
								                                            <?php endif; ?>
				                                            <p>
				                                                <?php echo get_the_excerpt(); ?>
				                                            </p>
				                                        </div>
				                                    <?php endwhile;
                                                                    wp_reset_postdata();
                                                                    endif;
                                                                ?>
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
        <div class="projects-area">
            <div class="container">

                <div class="projects-list" data-cue="slideInUp">
                    <?php
                        if ($query->have_posts()):
                                        $count = 1;
                                        while ($query->have_posts()): $query->the_post();
                                            $active_class = ($count === 1) ? ' active' : '';
                                        ?>
						                        <div class="project-item<?php echo esc_attr($active_class); ?>">
						                            <div class="title">
						                                <div class="number">
						                                    <?php echo str_pad($count, 2, '0', STR_PAD_LEFT); ?>
						                                </div>
						                                <span>
						                                    <?php the_title(); ?>
						                                </span>
						                            </div>
						                            <div class="details">
						                                <div class="row align-items-center">
						                                    <div class="col-xl-7 col-lg-6 col-md-7">
						                                        <div class="image text-center">
						                                            <?php if (has_post_thumbnail()): ?>
						                                                <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
						                                            <?php endif; ?>
			                                        </div>
			                                    </div>
			                                    <div class="col-xl-5 col-lg-6 col-md-5">
			                                        <div class="content">
			                                            <div class="number">
			                                                <?php echo str_pad($count, 2, '0', STR_PAD_LEFT); ?>
			                                            </div>
			                                            <h3>
			                                                <a href="<?php the_permalink(); ?>" class="style3work">
			                                                    <?php the_title(); ?>
			                                                </a>
			                                            </h3>
			                                            <p>
			                                                <?php echo get_the_excerpt(); ?>
			                                            </p>
			                                            <a href="<?php the_permalink(); ?>" class="link-btn text-center d-inline-block rounded-circle position-relative">
			                                                <i class="ri-arrow-right-line"></i>
			                                            </a>
			                                        </div>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>
			                    <?php
                                        $count++;
                                                endwhile;
                                                wp_reset_postdata();
                                            else: ?>
                        <p><?php esc_html_e('No works found.', 'axero-toolkit'); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>


<?php
    } elseif ($settings['style_selection'] === 'style4') {
            ?>
        <!-- style 4 -->
     <div class="case-studies-area">
         <div class="container">
             <div class="row" data-cues="slideInUp">
                 <?php
                     $args = [
                                     'post_type'      => 'post', // Change this to your custom post type if needed
                                     'posts_per_page' => -1,     // Adjust the number of posts to display
                                 ];

                                 if ($query->have_posts()):
                                 while ($query->have_posts()): $query->the_post(); ?>
								                         <div class="col-lg-6 col-md-6">
								                             <div class="single-case-study-item">
								                                 <a href="<?php the_permalink(); ?>" class="image d-block">
								                                     <?php if (has_post_thumbnail()): ?>
								                                         <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
								                                     <?php endif; ?>
				                                 </a>
				                                 <div class="content">
				                                     <span class="sub-title d-block">
				                                         <?php echo get_the_category_list(', '); // Display categories ?>
				                                     </span>
				                                     <h3>
				                                         <a href="<?php the_permalink(); ?>">
				                                             <?php the_title(); ?>
				                                         </a>
				                                     </h3>
				                                     <p>
				                                         <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); // Display excerpt with 20 words ?>
				                                     </p>
				                                     <a href="<?php echo esc_url(get_permalink()); ?>" class="link-btn d-inline-block position-relative">
				                                         <?php esc_html_e('Read more', 'axero-toolkit'); ?> <i class="ri-arrow-right-line"></i>
				                                     </a>
				                                 </div>
				                             </div>
				                         </div>
				                     <?php endwhile;
                                                     wp_reset_postdata();
                                                 else: ?>
                     <p><?php esc_html_e('No works found.', 'axero-toolkit'); ?></p>
                 <?php endif; ?>
             </div>
         </div>
     </div>

<?php
} elseif ($settings['style_selection'] === 'style5') {?>
 <!-- style 5 -->
    <div class="awesome_works_area">
        <div class="awesome_works_list" data-cues="slideInUp" data-group="awesome_works_list">
            <?php
                // Get vector image from Elementor controls, fallback to default if not set
                            $vector_image = ! empty($settings['style5_vector_image']['url']) ? esc_url($settings['style5_vector_image']['url']) : get_template_directory_uri() . '/assets/images/icons/vector2.svg';
                            if ($query->have_posts()):
                                $post_number = 1;
                                while ($query->have_posts()): $query->the_post();
                                    $background_image = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : get_template_directory_uri() . '/assets/images/works/work6.jpg';
                                ?>
								                    <div class="item_box position-relative z-1"
								                        style="background-image: url('<?php echo esc_url($background_image); ?>');">
								                        <div class="row">
								                            <div class="col-lg-5">
								                                <div class="title">
								                                    <div class="number lh-1 fw-semibold">
								                                        (<?php echo str_pad($post_number, 2, '0', STR_PAD_LEFT); ?>)
								                                    </div>
								                                    <h3 class="mb-0">
								                                        <?php the_title(); ?>
								                                    </h3>
								                                </div>
								                            </div>
								                            <div class="col-lg-7">
								                                <div class="content">
								                                    <img src="<?php echo $vector_image; ?>" alt="vector">
								                                    <p>
								                                        <?php echo wp_trim_words(get_the_excerpt(), 25, '...'); ?>
								                                    </p>
								                                </div>
								                            </div>
								                        </div>
								                        <a href="<?php the_permalink(); ?>" class="details_btn d-block position-absolute start-0 end-0 top-0 bottom-0 z-1"></a>
								                    </div>
								                    <?php
                                                                $post_number++;
                                                                        endwhile;
                                                                        wp_reset_postdata();
                                                                    else:
                                                                ?>
                <p><?php esc_html_e('No works found.', 'axero-toolkit'); ?></p>
            <?php endif; ?>
        </div>
    </div>
    <?php } elseif ($settings['style_selection'] === 'style6') {?>
 <!-- style 6 -->
 <div class="case_studies_area ">
    <div class="container-fluid px-0">
        <div class="case_studies_slides owl-carousel owl-theme" data-cue="slideInUp">
            <?php if ($query->have_posts()):
                                while ($query->have_posts()): $query->the_post();
                                    $categories    = get_the_terms(get_the_ID(), 'works_category');
                                    $category_name = ! empty($categories) ? esc_html($categories[0]->name) : '';
                                ?>
								                <div class="case_study_box">
								                    <div class="image overflow-hidden position-relative">
								                        <?php if (has_post_thumbnail()): ?>
								                            <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
								                        <?php endif; ?>
				                        <a href="<?php the_permalink(); ?>" class="details_link_btn">
				                            <i class="ri-arrow-right-up-line"></i>
				                        </a>
				                    </div>
				                    <div class="content">
				                        <?php if ($category_name): ?>
				                            <span class="sub_title d-inline-block">
				                                <?php echo $category_name; ?>
				                            </span>
				                        <?php endif; ?>
                        <h3 class="mb-0 fw-semibold">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h3>
                    </div>
                </div>
            <?php
                endwhile;
                            wp_reset_postdata();
                        else: ?>
                <p><?php esc_html_e('No works found.', 'axero-toolkit'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>
 <?php } elseif ($settings['style_selection'] === 'style7') {?>
 <!-- style 7 -->
<div class="portfolio_area position-relative z-1">
    <div class="row align-items-center" data-cues="slideInUp" data-group="portfolio_list">
        <div class="load_more_items_list">
            <?php if ($query->have_posts()):
                                while ($query->have_posts()): $query->the_post();
                                    $categories    = get_the_terms(get_the_ID(), 'works_category');
                                    $category_name = ! empty($categories) ? esc_html($categories[0]->name) : '';
                                ?>
								                <div class="item position-relative z-1 d-flex align-items-center justify-content-between">
								                    <h3 class="mb-0">
								                        <a href="<?php the_permalink(); ?>">
								                            <?php the_title(); ?>
								                        </a>
								                    </h3>
								                    <?php if ($category_name): ?>
								                        <span class="category d-inline-block">
								                            <?php echo $category_name; ?>
								                        </span>
								                    <?php endif; ?>
				                    <div class="image">
				                        <?php if (has_post_thumbnail()): ?>
				                            <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
				                        <?php endif; ?>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="position-absolute z-1 start-0 end-0 top-0 bottom-0"></a>
                </div>
            <?php
                endwhile;
                            wp_reset_postdata();
                        else: ?>
                <p><?php esc_html_e('No works found.', 'axero-toolkit'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>
 <?php } elseif ($settings['style_selection'] === 'style8') {
             ?>
<div class="projects-area">
    <div class="container">
        <div class="projects-circle-list text-center position-relative">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/shapes/circle.svg" class="d-none d-lg-inline-block" alt="border-image">

            <?php
                // Reset post data before starting first loop
                            wp_reset_postdata();
                        ?>

            <div class="images text-start">
                <?php
                    if ($query->have_posts()):
                                    while ($query->have_posts()): $query->the_post();
                                        $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'full');
                                    ?>
						                    <div class="image">
						                        <?php if ($thumbnail): ?>
						                            <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
						                        <?php endif; ?>
			                        <div class="text">
			                            <h3>
			                                <a href="<?php the_permalink(); ?>">
			                                    <?php the_title(); ?>
			                                </a>
			                            </h3>
			                            <p>
			                                <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
			                            </p>
			                            <a href="<?php the_permalink(); ?>" class="link-btn d-flex align-items-center position-relative">
			                                <?php esc_html_e('View Project', 'axero-toolkit'); ?>
			                                <i class="ri-arrow-right-line"></i>
			                            </a>
			                        </div>
			                        <a href="<?php the_permalink(); ?>" class="position-absolute z-1 start-0 end-0 top-0 bottom-0"></a>
			                    </div>
			                <?php
                                endwhile;
                                            endif;
                                            wp_reset_postdata();
                                        ?>
            </div>

            <div class="contents text-start">
                <?php
                    if ($query->have_posts()):
                                    while ($query->have_posts()): $query->the_post();
                                    ?>
						                    <div class="item">
						                        <h3>
						                            <a href="<?php the_permalink(); ?>">
						                                <?php the_title(); ?>
						                            </a>
						                        </h3>
						                        <p>
						                            <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
						                        </p>
						                        <a href="<?php the_permalink(); ?>" class="link-btn d-flex align-items-center position-relative">
						                            <?php esc_html_e('View Project', 'axero-toolkit'); ?>
						                            <i class="ri-arrow-right-line"></i>
						                        </a>
						                    </div>
						                <?php
                                                endwhile;
                                                        endif;
                                                        wp_reset_postdata();
                                                    ?>
            </div>
        </div>
    </div>
</div>
<?php
    }
        }
    }

$widgets_manager->register(new Axero_work_post());