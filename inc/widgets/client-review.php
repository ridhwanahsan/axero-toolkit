<?php
    namespace lunex_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class lunex_client_review extends Widget_Base
    {

        public function get_name()
        {
            return 'lunex_client_review';
        }

        public function get_title()
        {
            return __('Testimonial', 'lunex-toolkit');
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
                        'style7' => esc_html__('Style 7', 'lunex-toolkit'),
                    ],
                ]
            );

            $this->end_controls_section();
            
        $this->start_controls_section(
            'testimonial_section',
            [
                'label' => esc_html__('Testimonials', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'style_selection' => 'style1',
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'testimonial_content',
            [
                'label' => esc_html__('Content', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('"The team\'s creative strategy transformed our brand\'s presence..."', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'client_name',
            [
                'label' => esc_html__('Name', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Sarah Thompson', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'client_position',
            [
                'label' => esc_html__('Position', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('CEO, InnovateTech Solutions', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'testimonials_list',
            [
                'label' => esc_html__('Testimonials', 'lunex-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'testimonial_content' => esc_html__('"The team\'s creative strategy transformed our brand\'s presence..."', 'lunex-toolkit'),
                        'client_name' => esc_html__('Sarah Thompson', 'lunex-toolkit'),
                        'client_position' => esc_html__('CEO, InnovateTech Solutions', 'lunex-toolkit'),
                    ],
                    [
                        'testimonial_content' => esc_html__('"From initial concepts to final execution, the team delivered beyond our expectations..."', 'lunex-toolkit'),
                        'client_name' => esc_html__('John Harrison', 'lunex-toolkit'),
                        'client_position' => esc_html__('Marketing Director, Elite Enterprises', 'lunex-toolkit'),
                    ],
                ],
                'title_field' => '{{{ client_name }}}',
            ]
        );
        $this->add_control(
            'show_navigation',
            [
                'label' => esc_html__('Show Navigation', 'lunex-toolkit'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'lunex-toolkit'),
                'label_off' => esc_html__('Hide', 'lunex-toolkit'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

          $this->add_control(
            'navigation_prev_icon',
            [
                'label' => esc_html__('Previous Icon', 'lunex-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/icons/white-left-arrow.svg',
                ],
                'condition' => [
                    'show_navigation' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'navigation_next_icon',
            [
                'label' => esc_html__('Next Icon', 'lunex-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/icons/white-right-arrow.svg',
                ],
                'condition' => [
                    'show_navigation' => 'yes',
                ],
            ]
        );
        $this->end_controls_section();
        // Content 2 Tab
        $this->start_controls_section(
            'featured_reviews_tab',
            [
                'label' => esc_html__('Featured Reviews', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'style_selection' => 'style2',
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'company',
            [
                'label' => esc_html__('Company Name', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Flexport', 'lunex-toolkit'),
            ]
        );

        $repeater->add_control(
            'rating',
            [
                'label' => esc_html__('Star Rating', 'lunex-toolkit'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                ],
                'default' => '5',
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label' => esc_html__('Review Title', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('A game changer for our brand', 'lunex-toolkit'),
            ]
        );

        $repeater->add_control(
            'content',
            [
                'label' => esc_html__('Review Content', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__("The team’s creative strategy transformed our brand's presence. With a fresh and engaging design, we gained a new identity that resonates deeply with our audience, positioning us as a standout in a competitive market. Our brand recognition has skyrocketed since the launch.", 'lunex-toolkit'),
            ]
        );

        $repeater->add_control(
            'user_img',
            [
                'label' => esc_html__('User Image', 'lunex-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/users/user6.jpg',
                ],
            ]
        );

        $repeater->add_control(
            'user_name',
            [
                'label' => esc_html__('User Name', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Sarah Thompson', 'lunex-toolkit'),
            ]
        );

        $repeater->add_control(
            'user_position',
            [
                'label' => esc_html__('User Position', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('CEO, InnovateTech Solutions', 'lunex-toolkit'),
            ]
        );

        $repeater->add_control(
            'star_icon',
            [
                'label' => esc_html__('Star Icon', 'lunex-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => esc_url(get_template_directory_uri() . '/assets/images/icons/star.svg'),
                ],
            ]
        );

        $this->add_control(
            'featured_reviews_list',
            [
                'label' => esc_html__('Featured Reviews', 'lunex-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'company' => esc_html__('Flexport', 'lunex-toolkit'),
                        'rating' => '5',
                        'title' => esc_html__('A game changer for our brand', 'lunex-toolkit'),
                        'content' => esc_html__("The team’s creative strategy transformed our brand's presence. With a fresh and engaging design, we gained a new identity that resonates deeply with our audience, positioning us as a standout in a competitive market. Our brand recognition has skyrocketed since the launch.", 'lunex-toolkit'),
                        'user_img' => [
                            'url' => get_template_directory_uri() . '/assets/images/users/user6.jpg',
                        ],
                        'user_name' => esc_html__('Sarah Thompson', 'lunex-toolkit'),
                        'user_position' => esc_html__('CEO, InnovateTech Solutions', 'lunex-toolkit'),
                        'star_icon' => [
                            'url' => get_template_directory_uri() . '/assets/images/icons/star.svg',
                        ],
                    ],
                    [
                        'company' => esc_html__('SupplyHog', 'lunex-toolkit'),
                        'rating' => '4',
                        'title' => esc_html__('Innovative and impactful', 'lunex-toolkit'),
                        'content' => esc_html__("The agency’s creative approach was exactly what our business needed. Their work made us stand out in an already crowded market. We’ve seen an impressive increase in website traffic and customer inquiries, all thanks to their fresh ideas and strategic thinking.", 'lunex-toolkit'),
                        'user_img' => [
                            'url' => get_template_directory_uri() . '/assets/images/users/user1.jpg',
                        ],
                        'user_name' => esc_html__('Emily Roberts', 'lunex-toolkit'),
                        'user_position' => esc_html__('Founder, Urban Innovators', 'lunex-toolkit'),
                        'star_icon' => [
                            'url' => get_template_directory_uri() . '/assets/images/icons/star.svg',
                        ],
                    ],
                ],
                'title_field' => '{{{ user_name }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style3_featured_reviews_tab',
            [
                'label'     => esc_html__('Featured Reviews', 'lunex-toolkit'),
                'tab'       => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'style_selection' => 'style3',
                ],
            ]
        );

        $this->add_control(
            'style3_featured_reviews_list',
            [
                'label' => esc_html__('Style 3 Featured Reviews', 'lunex-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'content',
                        'label' => esc_html__('Content', 'lunex-toolkit'),
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => esc_html__("The service provided by TechCorp was exceptional. Their attention to detail and commitment to quality made a significant difference in our project.", 'lunex-toolkit'),
                    ],
                    [
                        'name' => 'user_img',
                        'label' => esc_html__('User Image', 'lunex-toolkit'),
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => get_template_directory_uri() . '/assets/images/users/user2.jpg',
                        ],
                    ],
                    [
                        'name' => 'user_name',
                        'label' => esc_html__('User Name', 'lunex-toolkit'),
                        'type' => Controls_Manager::TEXT,
                        'default' => esc_html__('John Doe', 'lunex-toolkit'),
                    ],
                    [
                        'name' => 'user_position',
                        'label' => esc_html__('User Position', 'lunex-toolkit'),
                        'type' => Controls_Manager::TEXT,
                        'default' => esc_html__('CTO, TechCorp', 'lunex-toolkit'),
                    ],
                ],
                'default' => [
                    [
                        'company' => esc_html__('TechCorp', 'lunex-toolkit'),
                        'title' => esc_html__('Exceptional Service', 'lunex-toolkit'),
                        'content' => esc_html__("The service provided by TechCorp was exceptional. Their attention to detail and commitment to quality made a significant difference in our project.", 'lunex-toolkit'),
                        'user_img' => [
                            'url' => get_template_directory_uri() . '/assets/images/users/user2.jpg',
                        ],
                        'user_name' => esc_html__('John Doe', 'lunex-toolkit'),
                        'user_position' => esc_html__('CTO, TechCorp', 'lunex-toolkit'),
                        'star_icon' => [
                            'url' => get_template_directory_uri() . '/assets/images/icons/star.svg',
                        ],
                    ],
                    [
                        'company' => esc_html__('DesignPro', 'lunex-toolkit'),
                        'rating' => '4',
                        'title' => esc_html__('Creative and Professional', 'lunex-toolkit'),
                        'content' => esc_html__("DesignPro delivered a creative solution that exceeded our expectations. Their professionalism and expertise were evident throughout the process.", 'lunex-toolkit'),
                        'user_img' => [
                            'url' => get_template_directory_uri() . '/assets/images/users/user3.jpg',
                        ],
                        'user_name' => esc_html__('Jane Smith', 'lunex-toolkit'),
                        'user_position' => esc_html__('Marketing Director, DesignPro', 'lunex-toolkit'),
                        'star_icon' => [
                            'url' => get_template_directory_uri() . '/assets/images/icons/star.svg',
                        ],
                    ],
                ],
                'title_field' => '{{{ user_name }}}',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'style4_testimonial_section',
            [
                'label' => esc_html__('Style 4 Testimonials', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'style_selection' => 'style4',
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'style4_content',
            [
                'label' => esc_html__('Content', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('"The teams creative strategy transformed our brand\'s presence..."', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'style4_client_name',
            [
                'label' => esc_html__('Name', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Sarah Thompson', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'style4_client_position',
            [
                'label' => esc_html__('Position', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('CEO, InnovateTech Solutions', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'style4_user_img',
            [
                'label' => esc_html__('User Image', 'lunex-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_stylesheet_directory_uri() . '/assets/images/users/user1.jpg',
                ],
            ]
        );

        $this->add_control(
            'style4_featured_reviews_list',
            [
                'label' => esc_html__('Testimonials List', 'lunex-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'style4_client_name' => esc_html__('Sarah Thompson', 'lunex-toolkit'),
                        'style4_client_position' => esc_html__('CEO, InnovateTech Solutions', 'lunex-toolkit'),
                        'style4_content' => esc_html__('The teams creative strategy transformed our brand\'s presence...', 'lunex-toolkit'),
                        'style4_user_img' => [
                            'url' => get_template_directory_uri() . '/assets/images/users/user1.jpg',
                        ],
                    ],
                ],
                'title_field' => '{{{ style4_client_name }}}',
            ]
        );

        $this->end_controls_section();

        // Style 5 Content Tab
        $this->start_controls_section(
            'style5_content_section',
            [
                'label' => esc_html__('Style 5 Content', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'style_selection' => 'style5',
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'style5_content',
            [
                'label' => esc_html__('Testimonial Content', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Working with Lunex was an absolute pleasure...', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'style5_client_name',
            [
                'label' => esc_html__('Client Name', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('David Korren', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'style5_client_position',
            [
                'label' => esc_html__('Client Position', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Product Manager', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'style5_client_image',
            [
                'label' => esc_html__('Client Image', 'lunex-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/kintsugi.svg',
                ],
            ]
        );

        $this->add_control(
            'style5_testimonials_list',
            [
                'label' => esc_html__('Testimonials', 'lunex-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'style5_content' => esc_html__('Working with Lunex was an absolute pleasure...', 'lunex-toolkit'),
                        'style5_client_name' => esc_html__('David Korren', 'lunex-toolkit'),
                        'style5_client_position' => esc_html__('Product Manager', 'lunex-toolkit'),
                        'style5_client_image' => [
                            'url' => get_template_directory_uri() . '/assets/images/kintsugi.svg',
                        ],
                    ],
                ],
                'title_field' => '{{{ style5_client_name }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style7_testimonial_section',
            [
                'label' => esc_html__('Testimonials', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'style_selection' => 'style7',
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'style7_rating',
            [
                'label' => esc_html__('Rating', 'lunex-toolkit'),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 5,
                'step' => 0.5,
                'default' => 5,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'style7_content',
            [
                'label' => esc_html__('Content', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('"The team\'s creative strategy transformed our brand\'s presence..."', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'style7_client_name',
            [
                'label' => esc_html__('Client Name', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Mason Logan', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'style7_client_position',
            [
                'label' => esc_html__('Client Position', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Manager at Business', 'lunex-toolkit'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'style7_client_image',
            [
                'label' => esc_html__('Client Image', 'lunex-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/users/user1.jpg',
                ],
            ]
        );

        $this->add_control(
            'style7_testimonials_list',
            [
                'label' => esc_html__('Testimonials', 'lunex-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'style7_rating' => 5,
                        'style7_content' => esc_html__('"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium..."', 'lunex-toolkit'),
                        'style7_client_name' => esc_html__('Mason Logan', 'lunex-toolkit'),
                        'style7_client_position' => esc_html__('Manager at Business', 'lunex-toolkit'),
                        'style7_client_image' => [
                            'url' => get_template_directory_uri() . '/assets/images/users/user1.jpg',
                        ],
                    ],
                ],
                'title_field' => '{{{ style7_client_name }}}',
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
            // content style controls 
            
$this->start_controls_section(
    'feedback_item_style',
    [
        'label'     => esc_html__('Feedback Item Style', 'lunex-toolkit'),
        'tab'       => Controls_Manager::TAB_STYLE,
        'condition' => [
            'style_selection' => 'style2',
        ],
    ]
);

// Ratings Span Style
$this->add_control(
    'ratings_span_color',
    [
        'label'     => esc_html__('Ratings Span Color', 'lunex-toolkit'),
        'type'      => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .feedback-item .ratings span' => 'color: {{VALUE}};',
        ],
    ]
);

$this->add_control(
    'ratings_span_bg_color',
    [
        'label'     => esc_html__('Ratings Span Background', 'lunex-toolkit'),
        'type'      => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .feedback-item .ratings span' => 'background-color: {{VALUE}};',
        ],
    ]
);

// Title Style
$this->add_control(
    'feedback_title_color',
    [
        'label'     => esc_html__('Title Color', 'lunex-toolkit'),
        'type'      => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .feedback-item h3' => 'color: {{VALUE}};',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name'     => 'feedback_title_typography',
        'selector' => '{{WRAPPER}} .feedback-item h3',
    ]
);

// Content Style
$this->add_control(
    'feedback_content_color',
    [
        'label'     => esc_html__('Content Color', 'lunex-toolkit'),
        'type'      => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .feedback-item p' => 'color: {{VALUE}};',
        ],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name'     => 'feedback_content_typography',
        'selector' => '{{WRAPPER}} .feedback-item p',
    ]
);

// Name & Position Style
$this->add_control(
    'feedback_name_color',
    [
        'label'     => esc_html__('Name Color', 'lunex-toolkit'),
        'type'      => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .feedback-item .info h4' => 'color: {{VALUE}};',
        ],
    ]
);

$this->add_control(
    'feedback_position_color',
    [
        'label'     => esc_html__('Position Color', 'lunex-toolkit'),
        'type'      => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .feedback-item .info span' => 'color: {{VALUE}};',
        ],
    ]
);

$this->end_controls_section();

        // Testimonial Content Style
        $this->start_controls_section(
            'testimonial_content_style',
            [
                'label' => esc_html__('Testimonial Content', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style1',
                ],
            ]
        );

        $this->add_control(
            'content_color',
            [
                'label'     => esc_html__('Text Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-item p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'content_typography',
                'selector' => '{{WRAPPER}} .testimonial-item p',
            ]
        );

        $this->end_controls_section();

        // Client Name Style
        $this->start_controls_section(
            'client_name_style',
            [
                'label' => esc_html__('Client Name', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style1',
                ],
            ]
        );

        $this->add_control(
            'name_color',
            [
                'label'     => esc_html__('Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-item h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'name_typography',
                'selector' => '{{WRAPPER}} .testimonial-item h3',
            ]
        );

        $this->end_controls_section();

        // Client Position Style
        $this->start_controls_section(
            'client_position_style',
            [
                'label' => esc_html__('Client Position', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style1',
                ],
            ]
        );

        $this->add_control(
            'position_color',
            [
                'label'     => esc_html__('Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-item span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'position_typography',
                'selector' => '{{WRAPPER}} .testimonial-item span',
            ]
        );

        $this->end_controls_section();

        // Navigation Button Style
        $this->start_controls_section(
            'navigation_button_style',
            [
                'label' => esc_html__('Navigation Buttons', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_navigation' => 'yes',
                    'style_selection' => 'style1',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .swiper-button-prev, {{WRAPPER}} .swiper-button-next' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .swiper-button-prev:hover, {{WRAPPER}} .swiper-button-next:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
    $this->end_controls_section();
        $this->start_controls_section(
            'style3_content_style',
            [
                'label' => esc_html__('Style 3 Content', 'lunex-toolkit'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style3',
                ],
            ]
        );

        // Content Color Typography
        $this->add_control(
            'style3_content_color',
            [
                'label'     => esc_html__('Content Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feedback-box p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'style3_content_typography',
                'selector' => '{{WRAPPER}} .feedback-box p',
            ]
        );

        // Name Color Typography
        $this->add_control(
            'style3_name_color',
            [
                'label'     => esc_html__('Name Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feedback-box h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'style3_name_typography',
                'selector' => '{{WRAPPER}} .feedback-box h3',
            ]
        );

        // Position Color Typography
        $this->add_control(
            'style3_position_color',
            [
                'label'     => esc_html__('Position Color', 'lunex-toolkit'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feedback-box span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'style3_position_typography',
                'selector' => '{{WRAPPER}} .feedback-box span',
            ]
        );

        $this->end_controls_section();
        
        $this->start_controls_section(
            'style3_pagination_tab',
            [
                'label' => esc_html__('Pagination Style', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style3',
                ],
            ]
        );
 
        // Pagination Previous Button Color
        $this->add_control(
            'style3_feedback_swiper_prev_color',
            [
                'label' => esc_html__('Previous Button Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feedbackSwiperStyleTwo .btn-box .swiper-navigation .swiper-button-prev' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Pagination Previous Button Background Color
        $this->add_control(
            'style3_feedback_swiper_prev_background_color',
            [
                'label' => esc_html__('Previous Button Background Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feedbackSwiperStyleTwo .btn-box .swiper-navigation .swiper-button-prev' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Pagination Previous Button Hover Color
        $this->add_control(
            'style3_feedback_swiper_prev_hover_color',
            [
                'label' => esc_html__('Previous Button Hover Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feedbackSwiperStyleTwo .btn-box .swiper-navigation .swiper-button-prev:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Pagination Previous Button Background Hover Color
        $this->add_control(
            'style3_feedback_swiper_prev_background_hover_color',
            [
                'label' => esc_html__('Previous Button Background Hover Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feedbackSwiperStyleTwo .btn-box .swiper-navigation .swiper-button-prev:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'style3_feedback_swiper_next_color',
            [
                'label' => esc_html__('Next Button Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feedbackSwiperStyleTwo .btn-box .swiper-navigation .swiper-button-next' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'style3_feedback_swiper_next_background_color',
            [
                'label' => esc_html__('Next Button Background Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feedbackSwiperStyleTwo .btn-box .swiper-navigation .swiper-button-next' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'style3_feedback_swiper_next_hover_color',
            [
                'label' => esc_html__('Next Button Hover Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feedbackSwiperStyleTwo .btn-box .swiper-navigation .swiper-button-next:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'style3_feedback_swiper_next_background_hover_color',
            [
                'label' => esc_html__('Next Button Background Hover Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feedbackSwiperStyleTwo .btn-box .swiper-navigation .swiper-button-next:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Pagination Active Color
        $this->add_control(
            'style3_pagination_active_color',
            [
                'label' => esc_html__('Pagination Active Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feedbackSwiperStyleTwo .btn-box .swiper-navigation .swiper-button-next.swiper-pagination-bullet-active' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
        
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
        $this->add_control(
            'style4_testimonial_box_border_color',
            [
                'label' => esc_html__('Testimonial Box Border Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-box' => 'border-color: {{VALUE}};',
                ],
                'description' => esc_html__('Set the border color for the testimonial box.', 'lunex-toolkit'),
            ]
        );

        $this->add_control(
            'style4_testimonial_box_border_width',
            [
                'label' => esc_html__('Testimonial Box Border Width', 'lunex-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem'],
                'default' => [
                    'size' => 1,
                    'unit' => 'px',
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .testimonial-box' => 'border-width: {{SIZE}}{{UNIT}};',
                ],
                'description' => esc_html__('Set the border width for the testimonial box.', 'lunex-toolkit'),
            ]
        );

        $this->add_control(
            'style4_testimonial_box_border_style',
            [
                'label' => esc_html__('Testimonial Box Border Style', 'lunex-toolkit'),
                'type' => Controls_Manager::SELECT,
                'default' => 'solid',
                'options' => [
                    'none' => esc_html__('None', 'lunex-toolkit'),
                    'solid' => esc_html__('Solid', 'lunex-toolkit'),
                    'dashed' => esc_html__('Dashed', 'lunex-toolkit'),
                    'dotted' => esc_html__('Dotted', 'lunex-toolkit'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .testimonial-box' => 'border-style: {{VALUE}};',
                ],
                'description' => esc_html__('Choose the border style for the testimonial box.', 'lunex-toolkit'),
            ]
        );

        // Line Background Color
        $this->add_control(
            'style4_line_background_color',
            [
                'label' => esc_html__('Line Background Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonialsSwiperStyleTwo .testimonial-box::before' => 'background-color: {{VALUE}};',
                ],
                'render_type' => 'ui',
                'separator' => 'before',
                'description' => esc_html__('Set the background color for the line above the testimonial box.', 'lunex-toolkit'),
            ]
        );

        // Description Color Typography
         $this->add_control(
            'style4_description_color',
            [
                'label' => esc_html__('Description Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-box p' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'style4_description_typography',
                'selector' => '{{WRAPPER}} .testimonial-box p',
            ]
        );

        // Name Color Typography
        $this->add_control(
            'style4_name_color',
            [
                'label' => esc_html__('Name Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-box h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'style4_name_typography',
                'selector' => '{{WRAPPER}} .testimonial-box h3',
            ]
        );

        // Designation Color Typography
        $this->add_control(
            'style4_designation_color',
            [
                'label' => esc_html__('Designation Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-box .designation' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'style4_designation_typography',
                'selector' => '{{WRAPPER}} .testimonial-box .designation',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style5_testimonial_style',
            [
                'label' => esc_html__('Style 5 Testimonial', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style5',
                ],
            ]
        );
        // Content Background Color Control
$this->add_control(
    'style6_content_bg_color',
    [
        'label'     => esc_html__('Background Color', 'lunex-toolkit'),
        'type'      => Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .awesome_testimonials_inner' => 'background-color: {{VALUE}};',
        ],
    ]
);
// Content Border Radius Control
$this->add_control(
    'style6_content_border_radius',
    [
        'label'      => esc_html__('Border Radius', 'lunex-toolkit'),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%'],
        'selectors'  => [
            '{{WRAPPER}} .awesome_testimonials_inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ]
);

// Content Border Control
$this->add_group_control(
    \Elementor\Group_Control_Border::get_type(),
    [
        'name'     => 'style6_content_border',
        'label'    => esc_html__('Border', 'lunex-toolkit'),
        'selector' => '{{WRAPPER}} .awesome_testimonials_inner',
    ]
);

        // Testimonial Description Style
        $this->add_control(
            'style5_description_color',
            [
                'label' => esc_html__('Description Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awesome_testimonials_inner .box_inner .single_awesome_testimonial_item p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style5_description_typography',
                'selector' => '{{WRAPPER}} .awesome_testimonials_inner .box_inner .single_awesome_testimonial_item p',
            ]
        );

        // Client Name Style
        $this->add_control(
            'style5_client_name_color',
            [
                'label' => esc_html__('Client Name Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awesome_testimonials_inner .box_inner .single_awesome_testimonial_item .client_info .title h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style5_client_name_typography',
                'selector' => '{{WRAPPER}} .awesome_testimonials_inner .box_inner .single_awesome_testimonial_item .client_info .title h3',
            ]
        );

        // Client Position Style
        $this->add_control(
            'style5_client_position_color',
            [
                'label' => esc_html__('Client Position Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awesome_testimonials_inner .box_inner .single_awesome_testimonial_item .client_info .title .sub_title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style5_client_position_typography',
                'selector' => '{{WRAPPER}} .awesome_testimonials_inner .box_inner .single_awesome_testimonial_item .client_info .title .sub_title',
            ]
        );

        $this->end_controls_section();
        // Style 6 Content Tab
        $this->start_controls_section(
            'style6_content_section',
            [
                'label' => esc_html__('Style 6 Content', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'style_selection' => 'style6',
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'style6_content',
            [
                'label' => esc_html__('Testimonial Content', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam, eaqu psa quae ab illo inventore veritatis et quasi architecto beatae vitae.', 'lunex-toolkit'),
            ]
        );

        $repeater->add_control(
            'style6_client_name',
            [
                'label' => esc_html__('Client Name', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Mason Logan', 'lunex-toolkit'),
            ]
        );

        $repeater->add_control(
            'style6_client_position',
            [
                'label' => esc_html__('Client Position', 'lunex-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Manager at Business', 'lunex-toolkit'),
            ]
        );

        $repeater->add_control(
            'style6_client_image',
            [
                'label' => esc_html__('Client Image', 'lunex-toolkit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/users/user1.jpg',
                ],
            ]
        );

        $this->add_control(
            'style6_testimonials_list',
            [
                'label' => esc_html__('Testimonials List', 'lunex-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'style6_content' => esc_html__('Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam, eaqu psa quae ab illo inventore veritatis et quasi architecto beatae vitae.', 'lunex-toolkit'),
                        'style6_client_name' => esc_html__('Mason Logan', 'lunex-toolkit'),
                        'style6_client_position' => esc_html__('Manager at Business', 'lunex-toolkit'),
                    ],
                ],
                'title_field' => '{{{ style6_client_name }}}',
            ]
        );

        $this->end_controls_section();


        // Style 6 Testimonial Style Tab //
        $this->start_controls_section(
            'style6_testimonial_style',
            [
                'label' => esc_html__('Style 6 Testimonial', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style6',
                ],
            ]
        );

        // Feedback Item Before Background Color //
        $this->add_control(
            'style6_feedback_before_bg',
            [
                'label' => esc_html__('Quote Background Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feedback_item::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Feedback Item Before Border
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'style6_feedback_before_border',
                'label' => esc_html__('Quote Border', 'lunex-toolkit'),
                'selector' => '{{WRAPPER}} .feedback_item::before',
            ]
        );

        $this->end_controls_section();
        // Style 6 Content Style Tab
        $this->start_controls_section(
            'style6_content_style',
            [
                'label' => esc_html__('Content', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style6',
                ],
            ]
        );
       
        // Content Color Control
        $this->add_control(
            'style6_content_color',
            [
                'label' => esc_html__('Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feedback_item p' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Content Typography Control
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style6_content_typography',
                'label' => esc_html__('Typography', 'lunex-toolkit'),
                'selector' => '{{WRAPPER}} .feedback_item p',
            ]
        );

        $this->end_controls_section();

        // Style 6 Reviewer Style Tab
        $this->start_controls_section(
            'style6_reviewer_style',
            [
                'label' => esc_html__('Reviewer', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style6',
                ],
            ]
        );

        // Name Color Control
        $this->add_control(
            'style6_name_color',
            [
                'label' => esc_html__('Name Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feedback_item .reviewer h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Name Typography Control
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style6_name_typography',
                'label' => esc_html__('Name Typography', 'lunex-toolkit'),
                'selector' => '{{WRAPPER}} .feedback_item .reviewer h4',
            ]
        );

        // Position Color Control
        $this->add_control(
            'style6_position_color',
            [
                'label' => esc_html__('Position Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feedback_item .reviewer span' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Position Typography Control
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style6_position_typography',
                'label' => esc_html__('Position Typography', 'lunex-toolkit'),
                'selector' => '{{WRAPPER}} .feedback_item .reviewer span',
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'style7_testimonial_style',
            [
                'label' => esc_html__('Style 7 Testimonial', 'lunex-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_selection' => 'style7',
                ],
            ]
        );

        // Testimonial Item Background Color
        $this->add_control(
            'style7_testimonial_bg_color',
            [
                'label' => esc_html__('Background Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial_item' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // Testimonial Item Border Radius
        $this->add_control(
            'style7_testimonial_border_radius',
            [
                'label' => esc_html__('Border Radius', 'lunex-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .testimonial_item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Ratings Style
        $this->add_control(
            'style7_ratings_style',
            [
                'label' => esc_html__('Ratings Style', 'lunex-toolkit'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'style7_ratings_color',
            [
                'label' => esc_html__('Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ff0000',
                'selectors' => [
                    '{{WRAPPER}} .testimonial_item .ratings' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'style7_ratings_font_size',
            [
                'label' => esc_html__('Font Size', 'lunex-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'size' => 25,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .testimonial_item .ratings' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'style7_ratings_gap',
            [
                'label' => esc_html__('Gap', 'lunex-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'size' => 10,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .testimonial_item .ratings' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Description Style
        $this->add_control(
            'style7_description_style',
            [
                'label' => esc_html__('Description Style', 'lunex-toolkit'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'style7_description_color',
            [
                'label' => esc_html__('Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial_item p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style7_description_typography',
                'label' => esc_html__('Typography', 'lunex-toolkit'),
                'selector' => '{{WRAPPER}} .testimonial_item p',
            ]
        );

        // Name Style
        $this->add_control(
            'style7_name_style',
            [
                'label' => esc_html__('Name Style', 'lunex-toolkit'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'style7_name_color',
            [
                'label' => esc_html__('Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial_item .reviewer h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style7_name_typography',
                'label' => esc_html__('Typography', 'lunex-toolkit'),
                'selector' => '{{WRAPPER}} .testimonial_item .reviewer h4',
            ]
        );

        // Position Style
        $this->add_control(
            'style7_position_style',
            [
                'label' => esc_html__('Position Style', 'lunex-toolkit'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'style7_position_color',
            [
                'label' => esc_html__('Color', 'lunex-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial_item .reviewer span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style7_position_typography',
                'label' => esc_html__('Typography', 'lunex-toolkit'),
                'selector' => '{{WRAPPER}} .testimonial_item .reviewer span',
            ]
        );

        // Image Style
        $this->add_control(
            'style7_image_style',
            [
                'label' => esc_html__('Image Style', 'lunex-toolkit'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'style7_image_width',
            [
                'label' => esc_html__('Width', 'lunex-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 200,
                    ],
                ],
                'default' => [
                    'size' => 100,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .testimonial_item .reviewer img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'style7_image_height',
            [
                'label' => esc_html__('Height', 'lunex-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 200,
                    ],
                ],
                'default' => [
                    'size' => 100,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .testimonial_item .reviewer img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'style7_image_object_fit',
            [
                'label' => esc_html__('Object Fit', 'lunex-toolkit'),
                'type' => Controls_Manager::SELECT,
                'default' => 'cover',
                'options' => [
                    'cover' => esc_html__('Cover', 'lunex-toolkit'),
                    'contain' => esc_html__('Contain', 'lunex-toolkit'),
                    'fill' => esc_html__('Fill', 'lunex-toolkit'),
                    'none' => esc_html__('None', 'lunex-toolkit'),
                    'scale-down' => esc_html__('Scale Down', 'lunex-toolkit'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .testimonial_item .reviewer img' => 'object-fit: {{VALUE}};',
                ],
                'description' => esc_html__('Control how the image fits within its container.', 'lunex-toolkit'),
            ]
        );
        $this->add_control(
            'style7_image_border_radius',
            [
                'label' => esc_html__('Border Radius', 'lunex-toolkit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'size' => 50,
                    'unit' => '%',
                ],
                'selectors' => [
                    '{{WRAPPER}} .testimonial_item .reviewer img' => 'border-radius: {{SIZE}}{{UNIT}};',
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

             <div class="testimonials-area">
                   <div class="swiper testimonialsSwiper" data-cue="slideInUp">
                <div class="swiper-wrapper">
                    <?php foreach ($settings['testimonials_list'] as $testimonial): ?>
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <?php echo esc_html($testimonial['testimonial_content']); ?>
                            </p>
                            <h3 class="fw-normal">
                                <?php echo esc_html($testimonial['client_name']); ?>
                            </h3>
                            <span class="d-block">
                                <?php echo esc_html($testimonial['client_position']); ?>
                            </span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                
                <?php if ($settings['show_navigation'] === 'yes') : ?>
                <div class="swiper-navigation d-flex align-items-center justify-content-end">
                    <div class="swiper-button-prev">
                        <img src="<?php echo esc_url($settings['navigation_prev_icon']['url']); ?>" alt="white-left-arrow">
                    </div>
                    <div class="swiper-button-next">
                        <img src="<?php echo esc_url($settings['navigation_next_icon']['url']); ?>" alt="white-right-arrow">
                    </div>
                </div>
                <?php endif; ?>
            </div>
    </div>

        <?php
            } elseif ($settings['style_selection'] === 'style2') {
                    ?>
            <!-- style 2 -->
              <div class="feedback-area pb-150">
                <div class="container">
                  <div class="feedbackSwiper position-relative" data-cue="slideInUp">
                    <div class="swiper">
                      <div class="swiper-wrapper">
                        <?php
                        // Use the repeater for featured reviews (see controls in file_context_0)
                        $featured_reviews = !empty($settings['featured_reviews_list']) ? $settings['featured_reviews_list'] : [];
                        foreach ($featured_reviews as $review) :
                        ?>
                        <div class="swiper-slide">
                          <div class="feedback-item">
                            <div class="ratings d-flex align-items-center">
                              <span class="fw-medium d-inline-block">
                                <?php echo esc_html($review['company']); ?>
                              </span>
                              <?php
                              $star_count = intval($review['rating']);
                              $star_icon = !empty($review['star_icon']['url']) ? $review['star_icon']['url'] : (get_template_directory_uri() . '/assets/images/icons/star.svg');
                              for ($i = 0; $i < $star_count; $i++) :
                              ?>
                                <img src="<?php echo esc_url($star_icon); ?>" alt="star">
                              <?php endfor; ?>
                            </div>
                            <h3>
                              <?php echo esc_html($review['title']); ?>
                            </h3>
                            <p>
                              <?php echo esc_html($review['content']); ?>
                            </p>
                            <div class="info d-flex align-items-center">
                              <img src="<?php echo esc_url(!empty($review['user_img']['url']) ? $review['user_img']['url'] : (get_template_directory_uri() . '/assets/images/users/user6.jpg')); ?>" class="rounded-circle" alt="user">
                              <div>
                                <h4 class="fw-normal">
                                  <?php echo esc_html($review['user_name']); ?>
                                </h4>
                                <span class="d-block">
                                  <?php echo esc_html($review['user_position']); ?>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php endforeach; ?>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>

        <?php
            } elseif ($settings['style_selection'] === 'style3') {
                    ?>
            <!-- style 3 -->
      <div class="feedback-area">
            <div class="container-fluid" data-cue="slideInUp">
                <div class="feedbackSwiperStyleTwo position-relative">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($settings['style3_featured_reviews_list'] as $review) : ?>
                            <div class="swiper-slide">
                                <div class="feedback-box position-relative z-1">
                                    <img src="<?php echo esc_url(!empty($review['user_img']['url']) ? $review['user_img']['url'] : (get_template_directory_uri() . '/assets/images/users/user7.jpg')); ?>" class="user rounded-circle" alt="user-image">
                                    <p>
                                        <?php echo esc_html($review['content']); ?>
                                    </p>
                                    <h3>
                                        <?php echo esc_html($review['user_name']); ?>
                                    </h3>
                                    <span class="d-block">
                                        <?php echo esc_html($review['user_position']); ?>
                                    </span>
                                    <div class="shape3">
                                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/shapes/shape3.svg'); ?>" alt="shape3">
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="btn-box d-flex align-items-center justify-content-between">
                        <div class="swiper-pagination"></div>
                        <div class="swiper-navigation">
                            <div class="swiper-button-prev">
                                <i class="ri-arrow-left-line"></i>
                            </div>
                            <div class="swiper-button-next">
                                <i class="ri-arrow-right-line"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php  
    } elseif ($settings['style_selection'] === 'style4') {
        ?> 
        <!-- style 04 -->
      
            <div  data-cue="slideInUp">
                <div class="testimonialsSwiperStyleTwo position-relative">
                     <div class="swiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($settings['style4_featured_reviews_list'] as $review) : ?>
                            <div class="swiper-slide">
                                <div class="testimonial-box position-relative">
                                    <img src="<?php echo esc_url(!empty($review['style4_user_img']['url']) ? $review['style4_user_img']['url'] : (get_template_directory_uri() . '/assets/images/users/default.jpg')); ?>" class="client" alt="<?php echo esc_attr($review['style4_client_name']); ?>">
                                    <p>
                                        <?php echo wp_kses_post($review['style4_content']); ?>
                                    </p>
                                    <h3 class="fw-normal">
                                        <?php echo esc_html($review['style4_client_name']); ?>
                                    </h3>
                                    <span class="designation d-block">
                                        <?php echo esc_html($review['style4_client_position']); ?>
                                    </span>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                         <div class="swiper-button-prev">
                             <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/icons/left-arrow.svg'); ?>" alt="<?php esc_attr_e('Previous', 'lunex-toolkit'); ?>">
                         </div>
                         <div class="swiper-button-next">
                             <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/icons/right-arrow.svg'); ?>" alt="<?php esc_attr_e('Next', 'lunex-toolkit'); ?>">
                         </div>
                    </div>
                </div>
            </div>
         
           
        <?php 
         } elseif ($settings['style_selection'] === 'style5') {
            ?>
                <!-- style 05 -->
            
       
                <div class="awesome_testimonials_inner" data-cue="slideInUp">
                    <div class="box_inner">
                        <div class="awesome_testimonials_slides owl-carousel owl-theme">
                            <?php foreach ($settings['style5_testimonials_list'] as $review) : ?>
                            <div class="single_awesome_testimonial_item">
                                <p>
                                    <?php echo wp_kses_post($review['style5_content']); ?>
                                </p>
                                <div class="client_info d-md-flex align-items-center justify-content-between">
                                    <div class="title">
                                        <h3 class="fw-medium">
                                            <?php echo esc_html($review['style5_client_name']); ?>
                                        </h3>
                                        <span class="sub_title fw-medium">
                                            <?php echo esc_html($review['style5_client_position']); ?>
                                        </span>
                                    </div>
                                    <img src="<?php echo esc_url(!empty($review['style5_client_image']['url']) ? $review['style5_client_image']['url'] : (get_template_directory_uri() . '/assets/images/kintsugi.svg')); ?>" alt="<?php echo esc_attr($review['style5_client_name']); ?>">
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

            <?php
         } elseif ($settings['style_selection'] === 'style6') {
            ?>
                <!-- style 06 -->
             <div class="feedback_area ">
            <div class="container">
            <div class="feedback_slides owl-carousel owl-theme mx-auto" data-cue="slideInUp">
                <?php foreach ($settings['style6_testimonials_list'] as $review) : ?>
                    <div class="feedback_item position-relative z-1">
                        <p>
                            <?php echo wp_kses_post($review['style6_content']); ?>
                        </p>
                        <div class="reviewer d-flex align-items-center">
                            <img src="<?php echo esc_url(!empty($review['style6_client_image']['url']) ? $review['style6_client_image']['url'] : (get_template_directory_uri() . '/assets/images/users/user1.jpg')); ?>" alt="<?php echo esc_attr($review['style6_client_name']); ?>">
                            <div>
                                <h4 class="fw-semibold">
                                    <?php echo esc_html($review['style6_client_name']); ?>
                                </h4>
                                <span class="d-block">
                                    <?php echo esc_html($review['style6_client_position']); ?>
                                </span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            </div>
        </div>
        
 
            <?php  } elseif ($settings['style_selection'] === 'style7') {
            ?>
                <!-- style 07 --> 
              <div class="testimonials_area position-relative z-1">
            <div class="container-fluid px-0">
                
                <div class="testimonials_slides owl-carousel owl-theme" data-cue="slideInUp">

                    <?php foreach ($settings['style7_testimonials_list'] as $review) : ?>
                        <div class="testimonial_item">
                            <div class="ratings d-flex align-items-center">
                                <?php
                                $rating = floatval($review['style7_rating']);
                                $full_stars = floor($rating);
                                $half_star = ($rating - $full_stars) >= 0.5;
                                
                                for ($i = 0; $i < $full_stars; $i++) {
                                    echo '<i class="ri-star-fill"></i>';
                                }
                                if ($half_star) {
                                    echo '<i class="ri-star-half-fill"></i>';
                                }
                                ?>
                            </div>
                            <p>
                                <?php echo wp_kses_post($review['style7_content']); ?>
                            </p>
                            <div class="reviewer d-flex align-items-center">
                                <img src="<?php echo esc_url(!empty($review['style7_client_image']['url']) ? $review['style7_client_image']['url'] : (get_template_directory_uri() . '/assets/images/users/user1.jpg')); ?>" alt="<?php echo esc_attr($review['style7_client_name']); ?>">
                                <div>
                                    <h4>
                                        <?php echo esc_html($review['style7_client_name']); ?>
                                    </h4>
                                    <span class="d-block">
                                        <?php echo esc_html($review['style7_client_position']); ?>
                                    </span>
                                </div>
                            </div>

                        </div>
                        
                    <?php endforeach; ?>
                      
                </div>
            </div>
        </div>
                 <?php
        }
            }
        }

    $widgets_manager->register(new lunex_client_review());