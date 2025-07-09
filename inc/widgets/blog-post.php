<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class Axero_Post_Grid_slider extends Widget_Base
    {

        public function get_name()
        {
            return 'Axero-Post-grid';
        }

        public function get_title()
        {
            return __('Blog Grid', 'axero-toolkit');
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
            $categories = get_categories();
            $options    = [];

            if (! empty($categories)) {
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
                    ],
                ]
            );

            $this->end_controls_section();

            // Post Filter Controls
            $this->start_controls_section(
                'post_filter_section',
                [
                    'label' => esc_html__('Post Filter', 'axero-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_control(
                'trim_words',
                [
                    'label'       => esc_html__('Trim Words', 'axero-toolkit'),
                    'type'        => Controls_Manager::NUMBER,
                    'default'     => 20,
                    'min'         => 10,
                    'max'         => 800,
                    'description' => esc_html__('Number of words to trim from the post excerpt.', 'axero-toolkit'),
                ]
            );

            $this->add_control(
                'posts_per_page',
                [
                    'label'   => esc_html__('Posts Per Page', 'axero-toolkit'),
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
                    'options'     => $this->get_post_categories(),
                    'multiple'    => true,
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'exclude_posts',
                [
                    'label'       => esc_html__('Exclude Posts', 'axero-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'description' => esc_html__('Enter post IDs separated by commas', 'axero-toolkit'),
                ]
            );

            $this->end_controls_section();

        }

        protected function style_tab_content()
        {
            // content style controls tab
            // Date Style
            $this->start_controls_section(
                'style1_date_style',
                [
                    'label'     => esc_html__('Date Style', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => ['style1', 'style2', 'style6'],
                    ],
                ]
            );

            $this->add_control(
                'style1_date_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-blog-post .content .date'                     => 'color: {{VALUE}};',
                        // style 2
                        '{{WRAPPER}} .blogs-list .item .content .date'                     => 'color: {{VALUE}};',
                        // style 6
                        '{{WRAPPER}} .blog_articles_posts .blog_article_post .inner .date' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_control(
                'style1_date_hover_color',
                [
                    'label'     => esc_html__('Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .blog_articles_posts .blog_article_post .inner:hover .date' => 'color: {{VALUE}};',
                    ],
                    'condition' => [
                        'style_selection' => 'style6',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style1_date_typography',
                    'selector' => '{{WRAPPER}} .single-blog-post .content .date',
                    // style 2
                    'selector' => '{{WRAPPER}} .blogs-list .item .content .date',
                    // style 6
                    'selector' => '{{WRAPPER}} .blog_articles_posts .blog_article_post .inner .date',
                ]
            );

            $this->end_controls_section();
            // Category Style
            $this->start_controls_section(
                'style4_category_style',
                [
                    'label'     => esc_html__('Category Style', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style4',
                    ],
                ]
            );

            $this->add_control(
                'style4_category_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-blog-item .content .sub-title' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style4_category_typography',
                    'selector' => '{{WRAPPER}} .single-blog-item .content .sub-title',
                ]
            );

            $this->end_controls_section();

            // Title Style
            $this->start_controls_section(
                'style1_title_style',
                [
                    'label'     => esc_html__('Title Style', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => ['style1', 'style2', 'style4', 'style6'],
                    ],
                ]
            );

            $this->add_control(
                'style1_title_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-blog-post .content h3 a'                       => 'color: {{VALUE}};',
                        // style 2
                        '{{WRAPPER}} .blogs-list .item .content h3 a'                       => 'color: {{VALUE}};',
                        // style4
                        '{{WRAPPER}} .single-blog-item .content h3 a'                       => 'color: {{VALUE}};',
                        // style6
                        '{{WRAPPER}} .blog_articles_posts .blog_article_post .inner .title' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style1_title_hover_color',
                [
                    'label'     => esc_html__('Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-blog-post .content h3 a:hover'                       => 'color: {{VALUE}};',
                        // style2
                        '{{WRAPPER}} .blogs-list .item .content h3 a:hover'                       => 'color: {{VALUE}};',
                        // style4
                        '{{WRAPPER}} .single-blog-item .content h3 a:hover'                       => 'color: {{VALUE}};',
                        // style6
                        '{{WRAPPER}} .blog_articles_posts .blog_article_post .inner:hover .title' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style1_title_typography',
                    'selector' => '{{WRAPPER}} .single-blog-post .content h3 a',
                    // style 2
                    'selector' => '{{WRAPPER}} .blogs-list .item .content h3 a',
                    // style 4
                    'selector' => '{{WRAPPER}} .single-blog-item .content h3 a',
                    // style 6
                    'selector' => '{{WRAPPER}} .blog_articles_posts .blog_article_post .inner .title',
                ]
            );

            $this->add_control(
                'style1_title_line_color',
                [
                    'label'     => esc_html__('Line Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-blog-post .content h3::before' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_section();

            // Style 6 Author Style
            $this->start_controls_section(
                'style6_author_style',
                [
                    'label'     => esc_html__('Author Style', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style6',
                    ],
                ]
            );

            $this->add_control(
                'style6_author_normal_color',
                [
                    'label'     => esc_html__('Normal Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .blog_articles_posts .blog_article_post .inner .author'   => 'color: {{VALUE}};',

                        '{{WRAPPER}} .blog_articles_posts .blog_article_post .inner .author a' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style6_author_hover_color',
                [
                    'label'     => esc_html__('Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .blog_articles_posts .blog_article_post .inner:hover .author'   => 'color: {{VALUE}};',
                        '{{WRAPPER}} .blog_articles_posts .blog_article_post .inner:hover .author a' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style6_author_typography',
                    'selector' => '{{WRAPPER}} .blog_articles_posts .blog_article_post .inner .author',
                    'selector' => '{{WRAPPER}} .blog_articles_posts .blog_article_post .inner .author a',
                ]
            );

            $this->end_controls_section();
            // Description Style
            $this->start_controls_section(
                'style1_description_style',
                [
                    'label'     => esc_html__('Description Style', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => ['style0', 'style2'],
                    ],
                ]
            );

            $this->add_control(
                'style1_description_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .blogs-list .item .content p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style1_description_typography',
                    'selector' => '{{WRAPPER}} .blogs-list .item .content p',
                ]
            );

            $this->end_controls_section();

            // Link Button Style
            $this->start_controls_section(
                'style1_link_button_style',
                [
                    'label'     => esc_html__('Link Button Style', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => ['style1', 'style2', 'style6'],
                    ],
                ]
            );

            $this->add_control(
                'style1_link_button_text_color',
                [
                    'label'     => esc_html__('Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-blog-post .content .link-btn'                             => 'color: {{VALUE}};',
                        '{{WRAPPER}} .blog_articles_posts .blog_article_post .inner .details_link_btn' => 'color: {{VALUE}};',
                    ],
                    'condition' => [
                        'style_selection' => ['style1', 'style6'],
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'      => 'style1_link_button_typography',
                    'selector'  => '{{WRAPPER}} .single-blog-post .content .link-btn',
                    'selector'  => '{{WRAPPER}} .blog_articles_posts .blog_article_post .inner .details_link_btn',
                    'condition' => [
                        'style_selection' => ['style1', 'style6'],
                    ],
                ]
            );

            $this->add_control(
                'style1_link_button_icon_color',
                [
                    'label'     => esc_html__('Icon Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-blog-post .content .link-btn i' => 'color: {{VALUE}};',
                    ],
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            $this->add_control(
                'style1_link_button_icon_bg_color',
                [
                    'label'     => esc_html__('Icon Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-blog-post .content .link-btn i' => 'background-color: {{VALUE}};',
                        '{{WRAPPER}} .blogs-list .item .content .link-btn'   => 'background-color: {{VALUE}};',
                    ],
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            $this->add_control(
                'style1_link_button_icon_hover_color',
                [
                    'label'     => esc_html__('Icon Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-blog-post:hover .content .link-btn i'                           => 'color: {{VALUE}};',
                        '{{WRAPPER}} .blog_articles_posts .blog_article_post .inner:hover .details_link_btn' => 'color: {{VALUE}};',
                    ],
                    'condition' => [
                        'style_selection' => ['style1', 'style6'],
                    ],
                ]
            );

            $this->add_control(
                'style1_link_button_icon_hover_bg_color',
                [
                    'label'     => esc_html__('Icon Hover Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-blog-post:hover .content .link-btn i' => 'background-color: {{VALUE}};',
                        '{{WRAPPER}} .blogs-list .item:hover .content .link-btn'   => 'background-color: {{VALUE}};',
                    ],
                    'condition' => [
                        'style_selection' => 'style1',
                    ],
                ]
            );

            $this->end_controls_section();

            // Style 3 Meta Text Controls
            $this->start_controls_section(
                'style3_meta_text_style',
                [
                    'label'     => esc_html__('Style 3 Meta Text', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style3',
                    ],
                ]
            );

            $this->add_control(
                'style3_meta_text_color',
                [
                    'label'     => esc_html__('Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .dev-blogs-list .blog-item .content .meta' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style3_meta_typography',
                    'selector' => '{{WRAPPER}} .dev-blogs-list .blog-item .content .meta',
                ]
            );

            $this->end_controls_section();

            // Style 3 Title Text Controls
            $this->start_controls_section(
                'style3_title_text_style',
                [
                    'label'     => esc_html__('Style 3 Title Text', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style3',
                    ],
                ]
            );

            $this->add_control(
                'style3_title_text_color',
                [
                    'label'     => esc_html__('Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .dev-blogs-list .blog-item .content h3' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style3_title_hover_color',
                [
                    'label'     => esc_html__('Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .dev-blogs-list .blog-item .content h3:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style3_title_typography',
                    'selector' => '{{WRAPPER}} .dev-blogs-list .blog-item .content h3',
                ]
            );

            $this->end_controls_section();

            // Style 3 Description Text Controls
            $this->start_controls_section(
                'style3_description_text_style',
                [
                    'label'     => esc_html__('Style 3 Description Text', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style3',
                    ],
                ]
            );

            $this->add_control(
                'style3_description_text_color',
                [
                    'label'     => esc_html__('Text Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .dev-blogs-list .blog-item .content p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style3_description_typography',
                    'selector' => '{{WRAPPER}} .dev-blogs-list .blog-item .content p',
                ]
            );

            $this->end_controls_section();

            // Style 3 Line Background Controls
            $this->start_controls_section(
                'style3_line_background_style',
                [
                    'label'     => esc_html__('Style 3 Line Background', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style3',
                    ],
                ]
            );

            $this->add_control(
                'style3_line_background_color',
                [
                    'label'     => esc_html__('Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .dev-blogs-list .blog-item::before' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_section();
            // Style 5 box Style
            $this->start_controls_section(
                'style5_box_style',
                [
                    'label'     => esc_html__('Box Style', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style5',
                    ],
                ]
            );

            $this->add_control(
                'style5_box_background_color',
                [
                    'label'     => esc_html__('Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awesome_blog_inner' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style5_box_border_radius',
                [
                    'label'      => esc_html__('Border Radius', 'axero-toolkit'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .awesome_blog_inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'style5_box_padding',
                [
                    'label'      => esc_html__('Padding', 'axero-toolkit'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .awesome_blog_inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->end_controls_section();
            // Style 5 Category Style
            $this->start_controls_section(
                'style5_category_style',
                [
                    'label'     => esc_html__('Category Style', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style5',
                    ],
                ]
            );

            $this->add_control(
                'style5_category_normal_color',
                [
                    'label'     => esc_html__('Normal Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awesome_blog_list .item_box .content .info a' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style5_category_normal_border_color',
                [
                    'label'     => esc_html__('Normal Border Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awesome_blog_list .item_box .content .info a' => 'border-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style5_category_hover_color',
                [
                    'label'     => esc_html__('Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awesome_blog_list .item_box .content .info a:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style5_category_hover_bg_color',
                [
                    'label'     => esc_html__('Hover Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awesome_blog_list .item_box .content .info a:hover' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style5_category_hover_border_color',
                [
                    'label'     => esc_html__('Hover Border Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awesome_blog_list .item_box .content .info a:hover' => 'border-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style5_category_typography',
                    'selector' => '{{WRAPPER}} .awesome_blog_list .item_box .content .info a',
                ]
            );

            $this->add_control(
                'style5_category_padding',
                [
                    'label'      => esc_html__('Padding', 'axero-toolkit'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .awesome_blog_list .item_box .content .info a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'style5_category_border_radius',
                [
                    'label'      => esc_html__('Border Radius', 'axero-toolkit'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .awesome_blog_list .item_box .content .info a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->end_controls_section();
            // Reading Time Style
            $this->start_controls_section(
                'style5_reading_time_style',
                [
                    'label'     => esc_html__('Reading Time Style', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style5',
                    ],
                ]
            );

            $this->add_control(
                'style5_reading_time_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awesome_blog_list .item_box .content .info span.read-time' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style5_reading_time_typography',
                    'selector' => '{{WRAPPER}} .awesome_blog_list .item_box .content .info span.read-time',
                ]
            );

            $this->end_controls_section();
            // Style 5 Title Style
            $this->start_controls_section(
                'style5_title_style',
                [
                    'label'     => esc_html__('Title Style', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style5',
                    ],
                ]
            );

            $this->add_control(
                'style5_title_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awesome_blog_list .item_box .content h3 a' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style5_title_hover_color',
                [
                    'label'     => esc_html__('Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awesome_blog_list .item_box .content h3 a:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style5_title_typography',
                    'selector' => '{{WRAPPER}} .awesome_blog_list .item_box .content h3 a',
                ]
            );

            $this->end_controls_section();
            // Style 5 Description Style
            $this->start_controls_section(
                'style5_description_style',
                [
                    'label'     => esc_html__('Description Style', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style5',
                    ],
                ]
            );

            $this->add_control(
                'style5_description_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awesome_blog_list .item_box .text p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style5_description_typography',
                    'selector' => '{{WRAPPER}} .awesome_blog_list .item_box .text p',
                ]
            );

            $this->end_controls_section();
            // Style 5 Date Style
            $this->start_controls_section(
                'style5_date_style',
                [
                    'label'     => esc_html__('Date Style', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style5',
                    ],
                ]
            );

            $this->add_control(
                'style5_date_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .awesome_blog_list .item_box .content .date' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style5_date_typography',
                    'selector' => '{{WRAPPER}} .awesome_blog_list .item_box .content .date',
                ]
            );

            $this->end_controls_section();
            // Style 7 Category Style
            $this->start_controls_section(
                'style7_category_style',
                [
                    'label'     => esc_html__('Category Style', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style7',
                    ],
                ]
            );

            $this->add_control(
                'style7_category_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .blog_single_article_post .image .category' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style7_category_hover_color',
                [
                    'label'     => esc_html__('Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .blog_single_article_post .image .category:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style7_category_bg_color',
                [
                    'label'     => esc_html__('Background Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .blog_single_article_post .image .category' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style7_category_bg_hover_color',
                [
                    'label'     => esc_html__('Background Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .blog_single_article_post .image .category:hover' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style7_category_typography',
                    'selector' => '{{WRAPPER}} .blog_single_article_post .image .category',
                ]
            );

            $this->add_control(
                'style7_category_border_radius',
                [
                    'label'      => esc_html__('Border Radius', 'axero-toolkit'),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .blog_single_article_post .image .category' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->end_controls_section();

            // Style 7 Date Style
            $this->start_controls_section(
                'style7_date_style',
                [
                    'label'     => esc_html__('Date Style', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style7',
                    ],
                ]
            );

            $this->add_control(
                'style7_date_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .blog_single_article_post .content .date' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style7_date_typography',
                    'selector' => '{{WRAPPER}} .blog_single_article_post .content .date',
                ]
            );

            $this->end_controls_section();

            // Style 7 Title Style
            $this->start_controls_section(
                'style7_title_style',
                [
                    'label'     => esc_html__('Title Style', 'axero-toolkit'),
                    'tab'       => Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'style_selection' => 'style7',
                    ],
                ]
            );

            $this->add_control(
                'style7_title_color',
                [
                    'label'     => esc_html__('Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .blog_single_article_post .content h3 a' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'style7_title_hover_color',
                [
                    'label'     => esc_html__('Hover Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .blog_single_article_post .content h3 a:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style7_title_typography',
                    'selector' => '{{WRAPPER}} .blog_single_article_post .content h3 a',
                ]
            );

            $this->end_controls_section();

        }

        protected function render()
        {
            $settings   = $this->get_settings_for_display();
            $query_args = [
                'post_type'      => 'post',
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

            $query = new \WP_Query($query_args);

            if ($settings['style_selection'] === 'style1') {
            ?>
<!-- style 1 -->
 <div class="blog-area">
        <div class="container">
           <div class="row justify-content-center" data-cues="slideInUp">
            <?php while ($query->have_posts()): $query->the_post(); ?>
			                <div class="col-lg-4 col-md-6">
			                    <div class="single-blog-post">
			                        <a href="<?php the_permalink(); ?>" class="d-block image">
			                            <?php if (has_post_thumbnail()): ?>
<?php the_post_thumbnail('full', ['alt' => get_the_title()]); ?>
<?php endif; ?>
                        </a>
                        <div class="content">
                            <span class="date d-block">
                                <?php echo get_the_date(); ?>
                            </span>
                            <h3 class="position-relative">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                            <a href="<?php the_permalink(); ?>" class="link-btn d-flex align-items-center position-relative">
                                <?php echo esc_html__('Read More', 'axero-toolkit'); ?>
                                <i class="ri-arrow-right-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endwhile;
                        wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
    <?php
        } elseif ($settings['style_selection'] === 'style2') {
                ?>
<!-- style 2 -->
  <div class="blog-area">
            <div class="container">
                <div class="blogs-list" data-cues="slideInUp">
                    <?php while ($query->have_posts()): $query->the_post(); ?>
			                    <div class="item">
			                        <div class="row align-items-center">
			                            <div class="col-lg-8 col-md-7">
			                                <div class="content position-relative">
			                                    <span class="date d-block">
			                                        <?php echo get_the_date(); ?>
			                                    </span>
			                                    <h3>
			                                        <a href="<?php the_permalink(); ?>">
			                                            <?php the_title(); ?>
			                                        </a>
			                                    </h3>
			                                    <p>
			                                        <?php echo get_the_excerpt(); ?>
			                                    </p>
			                                    <a href="<?php the_permalink(); ?>" class="link-btn d-inline-block rounded-circle text-center">
			                                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icons/big-right-top-arrow2.svg" alt="big-right-top-arrow">
			                                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icons/white-right-top-arrow3.svg" alt="big-right-top-arrow">
			                                    </a>
			                                </div>
			                            </div>
			                            <div class="col-lg-4 col-md-5">
			                                <a href="<?php the_permalink(); ?>" class="image d-block">
			                                    <?php if (has_post_thumbnail()): ?>
<?php the_post_thumbnail('full', ['alt' => get_the_title()]); ?>
<?php endif; ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile;
                                wp_reset_postdata(); ?>
                </div>
            </div>
        </div>


<?php
    } elseif ($settings['style_selection'] === 'style3') {
            ?>
<!-- style 3 -->
  <div class="blog-area  ">
            <div class="container">

                <div class="dev-blogs-list" data-cues="slideInUp">
                    <?php
                    while ($query->have_posts()): $query->the_post(); ?>
			                    <div class="blog-item position-relative">
			                        <div class="content position-relative">
			                            <ul class="meta ps-0 list-unstyled">
			                                <li class="d-inline-block position-relative">
			                                    <?php echo get_the_date(); ?>
			                                </li>
			                                <li class="d-inline-block position-relative">
			                                    <?php echo get_the_time(); ?>
			                                </li>
			                            </ul>
			                            <h3>
			                                <a href="<?php the_permalink(); ?>">
			                                    <?php the_title(); ?>
			                                </a>
			                            </h3>
			                            <p class="excerpt">
			                                <?php echo wp_trim_words(get_the_excerpt(), $settings['trim_words'], '...'); ?>
			                            </p>
			                        </div>
			                        <a href="<?php the_permalink(); ?>" class="image d-block">
			                            <?php if (has_post_thumbnail()): ?>
<?php the_post_thumbnail('full', ['alt' => get_the_title()]); ?>
<?php endif; ?>
                        </a>
                    </div>
                    <?php endwhile;
                                wp_reset_postdata(); ?>
                </div>
            </div>
        </div>

<?php
    } elseif ($settings['style_selection'] === 'style4') {
            ?>
<!-- style 4 -->
  <div class="blog-area">
      <div class="container">
          <div class="row justify-content-center" data-cues="slideInUp">
              <?php
                  if (isset($query) && $query->have_posts()):
                                  while ($query->have_posts()): $query->the_post();
                                      $categories    = get_the_category();
                                      $category_name = ! empty($categories) ? esc_html($categories[0]->name) : '';
                                      $permalink     = get_permalink();
                                  ?>
						                  <div class="col-lg-4 col-sm-6">
						                      <div class="single-blog-item">
						                          <a href="<?php echo esc_url($permalink); ?>" class="image d-block">
						                              <?php
                                                                  if (has_post_thumbnail()) {
                                                                                  the_post_thumbnail('full', ['alt' => get_the_title()]);
                                                                              }
                                                                          ?>
						                          </a>
						                          <div class="content">
						                              <?php if ($category_name): ?>
						                                  <span class="sub-title d-block">
						                                      <?php echo $category_name; ?>
						                                  </span>
						                              <?php endif; ?>
			                              <h3>
			                                  <a href="<?php echo esc_url($permalink); ?>">
			                                      <?php the_title(); ?>
			                                  </a>
			                              </h3>
			                              <a href="<?php echo esc_url($permalink); ?>" class="link-btn d-flex align-items-center justify-content-between">
			                                  <?php esc_html_e('Read More', 'axero-toolkit'); ?> <i class="ri-arrow-right-line"></i>
			                              </a>
			                          </div>
			                      </div>
			                  </div>
			              <?php
                              endwhile;
                                          wp_reset_postdata();
                                          endif;
                                      ?>
          </div>
      </div>
  </div>

<?php } elseif ($settings['style_selection'] === 'style5') {
            ?>
    <!-- style 5 -->

  <div class="awesome_blog_area ">
     <div class="awesome_blog_inner">
            <div class="awesome_blog_list" data-cues="slideInUp" data-group="awesome_blog_list">
                <?php
                    if (isset($query) && $query->have_posts()):
                                    while ($query->have_posts()): $query->the_post();
                                        $categories    = get_the_category();
                                        $category_name = ! empty($categories) ? esc_html($categories[0]->name) : '';
                                        $permalink     = get_permalink();
                                        $excerpt       = get_the_excerpt();
                                        $reading_time  = ceil(str_word_count(get_the_content()) / 200); // Average reading speed
                                    ?>
						                    <div class="item_box position-relative">
						                        <div class="row align-items-center">
						                            <div class="col-lg-6 col-md-12">
						                                <div class="content">
						                                    <div class="info d-flex align-items-center">
						                                        <?php if ($category_name): ?>
						                                            <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>" class="fw-medium text-uppercase">
						                                                <?php echo $category_name; ?>
						                                            </a>
						                                        <?php endif; ?>
			                                        <span class="d-block fw-medium read-time">
			                                            <?php echo esc_html($reading_time . ' min.'); ?>
			                                    </div>
			                                    <h3 class="text-uppercase">
			                                        <a href="<?php echo esc_url($permalink); ?>">
			                                            <?php the_title(); ?>
			                                        </a>
			                                    </h3>
			                                    <span class="date d-block fw-medium">
			                                        <?php echo esc_html(get_the_date()); ?>
			                                    </span>
			                                </div>
			                            </div>
			                            <div class="col-lg-6 col-md-12">
			                                <div class="text">
			                                    <p>
			                                        <?php echo esc_html($excerpt); ?>
			                                    </p>
			                                </div>
			                            </div>
			                        </div>
			                        <a href="<?php echo esc_url($permalink); ?>" class="image d-block">
			                            <?php
                                                if (has_post_thumbnail()) {
                                                                the_post_thumbnail('full', ['alt' => get_the_title()]);
                                                            }
                                                        ?>
			                        </a>
			                    </div>
			                <?php
                                endwhile;
                                            wp_reset_postdata();
                                            endif;
                                        ?>
            </div>
        </div>
     </div>

 <?php } elseif ($settings['style_selection'] === 'style6') {
             ?>
    <!--  style 6 -->
       <div class="blog_area">
            <div class="container">
                <div class="blog_articles_posts" data-cues="slideInUp" data-group="blog_articles_posts">
                    <?php
                        $args = [
                                        'post_type'      => 'post',
                                        'posts_per_page' => $settings['posts_per_page'],
                                        'orderby'        => $settings['orderby'],
                                        'order'          => $settings['order'],
                                    ];
                                    $query = new \WP_Query($args);

                                    if ($query->have_posts()):
                                        while ($query->have_posts()): $query->the_post();
                                            $permalink        = get_permalink();
                                            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                                        ?>
						                    <div class="blog_article_post">
						                        <div class="inner position-relative z-1" style="background-image: url(<?php echo esc_url($featured_img_url); ?>);">
						                            <div class="row align-items-center">
						                                <div class="col-lg-3">
						                                    <div class="fw-medium date">
						                                        <?php echo esc_html(get_the_date()); ?>
						                                    </div>
						                                </div>
						                                <div class="col-lg-3">
						                                    <a href="<?php echo esc_url($permalink); ?>" class="title fw-semibold d-inline-block">
						                                        <?php the_title(); ?>
						                                    </a>
						                                </div>
						                                <div class="col-lg-3 text-lg-end">
						                                    <span class="author fw-medium">
						                                        <?php echo esc_html__('By', 'axero-toolkit'); ?> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
						                                            <?php the_author(); ?>
						                                        </a>
						                                    </span>
						                                </div>
						                                <div class="col-lg-3 text-lg-end">
						                                    <a href="<?php echo esc_url($permalink); ?>" class="details_link_btn d-inline-block position-relative">
						                                        <span class="d-inline-block position-relative">
						                                            <?php echo esc_html__('Read More', 'axero-toolkit'); ?>
						                                        </span>
						                                        <i class="ri-arrow-right-up-line"></i>
						                                    </a>
						                                </div>
						                            </div>
						                        </div>
						                    </div>
						                    <?php
                                                    endwhile;
                                                                wp_reset_postdata();
                                                            endif;
                                                        ?>
                </div>
            </div>
        </div>

    <?php } elseif ($settings['style_selection'] === 'style7') {
                ?>
    <!--  style 7 -->
      <div class="blog_area position-relative z-1 ">
            <div class="container-fluid max_w_1560px">

                <div class="row justify-content-center" data-cues="slideInUp" data-group="blog_list">
                    <?php

                                    if ($query->have_posts()):
                                        while ($query->have_posts()): $query->the_post();
                                            $permalink        = get_permalink();
                                            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                                            $categories       = get_the_category();
                                            $category         = ! empty($categories) ? $categories[0]->name : '';
                                        ?>
						                    <div class="col-lg-4 col-sm-6">
						                        <div class="blog_single_article_post">
						                            <div class="image position-relative">
						                                <a href="<?php echo esc_url($permalink); ?>" class="d-block overflow-hidden">
						                                    <?php if ($featured_img_url): ?>
						                                        <img src="<?php echo esc_url($featured_img_url); ?>" alt="<?php the_title_attribute(); ?>">
						                                    <?php endif; ?>
			                                </a>
			                                <?php if ($category): ?>
			                                    <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>" class="category d-inline-block">
			                                        <?php echo esc_html($category); ?>
			                                    </a>
			                                <?php endif; ?>
                            </div>
                            <div class="content">
                                <span class="date d-block">
                                    <?php echo esc_html(get_the_date()); ?>
                                </span>
                                <h3 class="mb-0">
                                    <a href="<?php echo esc_url($permalink); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <?php
                        endwhile;
                                    wp_reset_postdata();
                                    endif;
                                ?>
                </div>
            </div>

        </div>

      <?php
          }
              }
          }

      $widgets_manager->register(new Axero_Post_Grid_slider());