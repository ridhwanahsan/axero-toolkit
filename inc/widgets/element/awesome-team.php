<?php
    namespace lunex_toolkit\Widgets;
    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class lunex_team_slider extends Widget_Base
    {

        public function get_name()
        {
            return 'lunex_team_slider';
        }

        public function get_title()
        {
            return __('awesome Team', 'lunex-toolkit');
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
                'taxonomy' => 'teams_category',
                'hide_empty' => false,
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

            // team Filter Controls
            $this->start_controls_section(
                'post_filter_section',
                [
                    'label' => esc_html__('Team Filter', 'lunex-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'posts_per_page',
                [
                    'label'   => esc_html__('Team Per Page', 'lunex-toolkit'),
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
                    'options'     => $this->get_post_categories('teams_category'),
                    'multiple'    => true,
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'exclude_posts',
                [
                    'label'       => esc_html__('Exclude Team', 'lunex-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'description' => esc_html__('Enter post IDs separated by commas', 'lunex-toolkit'),
                ]
            ); 
            $this->end_controls_section();
            
                // Title & Description
                $this->start_controls_section(
                    'title_description_section',
                    [
                        'label' => esc_html__('Title', 'axero-toolkit'),
                        'tab'   => Controls_Manager::TAB_CONTENT,
                    ]
                );

                $this->add_control(
                    'section_title',
                    [
                        'label'       => esc_html__('Title', 'axero-toolkit'),
                        'type'        => Controls_Manager::TEXT,
                        'default'     => esc_html__('Meet our dedicated team of marketing experts', 'axero-toolkit'),
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
        
                //  Section Title Tab
                $this->start_controls_section(
                    'style5_section_title_tab',
                    [
                        'label' => esc_html__('Section Title', 'axero-toolkit'),
                        'tab'   => Controls_Manager::TAB_STYLE,
                    ]
                );

                // Section Title Color Control
                $this->add_control(
                    'style5_section_title_color',
                [
                    'label'     => esc_html__('Section Title Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .section_title.style_five h2' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Section Title Typography Control
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'style5_section_title_typography',
                    'label'    => esc_html__('Section Title Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .section_title.style_five h2',
                ]
            );

            // Section Border Line Color Control
            $this->add_control(
                'style5_section_border_color',
                [
                    'label'     => esc_html__('Section Border Line Color', 'axero-toolkit'),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .border_bottom_style' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->end_controls_section();

            // Name Style
            $this->start_controls_section(
                'name_style_section',
                [
                    'label' => esc_html__('Name Style', 'lunex-toolkit'),
                    'tab' => Controls_Manager::TAB_STYLE,
                    
                ]
            );

            $this->add_control(
                'name_color',
                [
                    'label' => esc_html__('Color', 'lunex-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single_awesome_team_member .image h3' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'name_typography',
                    'selector' => '{{WRAPPER}} .single_awesome_team_member .image h3',
                ]
            );

            $this->end_controls_section();

            // Position Style
            $this->start_controls_section(
                'position_style_section',
                [
                    'label' => esc_html__('Position Style', 'lunex-toolkit'),
                    'tab' => Controls_Manager::TAB_STYLE,
                    
                ]
            );

            $this->add_control(
                'position_color',
                [
                    'label' => esc_html__('Color', 'lunex-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single_awesome_team_member .content h4' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'position_typography',
                    'selector' => '{{WRAPPER}} .single_awesome_team_member .content h4',
                ]
            );

            $this->end_controls_section();

            // Description Style
            $this->start_controls_section(
                'description_style_section',
                [
                    'label' => esc_html__('Description Style', 'lunex-toolkit'),
                    'tab' => Controls_Manager::TAB_STYLE,
                    
                ]
            );

            $this->add_control(
                'description_color',
                [
                    'label' => esc_html__('Color', 'lunex-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single_awesome_team_member .content p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'description_typography',
                    'selector' => '{{WRAPPER}} .single_awesome_team_member .content p',
                ]
            );

            $this->end_controls_section();

            // Team Button Style Tab
            $this->start_controls_section(
                'team_button_style_section',
                [
                    'label' => esc_html__('Button Style', 'lunex-toolkit'),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
            );

            // Button Color
            $this->add_control(
                'team_button_color',
                [
                    'label' => esc_html__('Button Color', 'lunex-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single_awesome_team_member .content .details_link_btn' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Button Hover Color
            $this->add_control(
                'team_button_hover_color',
                [
                    'label' => esc_html__('Button Hover Color', 'lunex-toolkit'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single_awesome_team_member .content .details_link_btn:hover' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Button Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'team_button_typography',
                    'selector' => '{{WRAPPER}} .single_awesome_team_member .content .details_link_btn',
                ]
            );

            $this->end_controls_section();
  
        }

        protected function render()
        {
            $settings = $this->get_settings_for_display();  
            $query_args = [
                'post_type'      => 'teams',
                'posts_per_page' => $settings['posts_per_page'] ? $settings['posts_per_page'] : 3,
                'orderby'        => $settings['orderby'] ? $settings['orderby'] : 'date',
                'order'          => $settings['order'] ? $settings['order'] : 'DESC',
                'post_status'    => 'publish', // Ensure only published posts are queried
            ];

            // Add category filter if set
            if (! empty($settings['category_filter'])) {
                $query_args['tax_query'] = [
                    [
                        'taxonomy' => 'teams_category',
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
            ?>
                <div class="awesome_team_area ptb_150">
                    <div class="container-fluid max_w_1905px">
                        <div class="section_title style_five">
                            <?php if (!empty($settings['section_title'])) : ?>
                                <h2 class="mb-0 text_animation">
                                    <?php echo wp_kses_post($settings['section_title']); ?>
                                </h2>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="border_bottom_style"></div>
                    <div class="container-fluid style_two max_w_1905px">
                        <div class="awesome_team_slides owl-carousel owl-theme" data-cue="slideInUp">
                            <?php if ( $query->have_posts() ) : 
                                $post_count = 0;
                                while ( $query->have_posts() ) : $query->the_post();
                                $post_count++;
                                // Get team member meta
                                $categories = get_the_terms(get_the_ID(), 'teams_category');
                                $position  = !empty($categories) ? esc_html($categories[0]->name) : '';
                                $description = get_the_excerpt();
                                $link_url = get_post_meta(get_the_ID(), 'link_url', true) ?: get_permalink();
                                $link_text = get_post_meta(get_the_ID(), 'link_text', true) ?: __('Learn more', 'lunex-toolkit');
                                $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                                if (!$image_url) {
                                    $image_url = get_template_directory_uri() . '/assets/images/team/team' . $post_count . '.jpg';
                                }
                            ?>
                                <div class="single_awesome_team_member">
                                    <div class="image position-relative">
                                        <?php if ( $image_url ) : ?>
                                            <img src="<?php echo esc_url( $image_url ); ?>"
                                                alt="<?php the_title_attribute(); ?>"
                                                class="team-member-image"
                                                loading="lazy">
                                        <?php endif; ?>
                                        <h3 class="mb-0">
                                            <?php the_title(); ?>
                                        </h3>
                                    </div>
                                    <div class="content">
                                        <?php if ( $position ) : ?>
                                            <h4><?php echo esc_html( $position ); ?></h4>
                                        <?php endif; ?>
                                        <?php if ( $description ) : ?>
                                            <p><?php echo esc_html( $description ); ?></p>
                                        <?php endif; ?>
                                        <div class="border_bottom"></div>
                                        <a href="<?php echo esc_url( $link_url ); ?>" class="details_link_btn d-inline-block position-relative text-uppercase fw-semibold">
                                            <i class="ti ti-arrow-up-right"></i>
                                            <?php echo esc_html( $link_text ); ?>
                                        </a>
                                    </div>
                                </div>
                            <?php endwhile; 
                            wp_reset_postdata();
                            endif; ?>
                        </div>
                    </div>
                </div>
            <?php
        }
    }
$widgets_manager->register(new lunex_team_slider());