<?php
    namespace axero_toolkit\Widgets;

    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_Post_Grid_slider extends Widget_Base
    {

        public function get_name()
        {
            return 'axero-Post-grid';
        }

        public function get_title()
        {
            return __('Awesome Blog', 'axero-toolkit');
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

        protected function register_controls_section() {

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
                    'default'     => esc_html__('Exclusive insight from visual experts on design', 'axero-toolkit'),
                    'label_block' => true,
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
                    'label'   => esc_html__('Trim Words', 'axero-toolkit'),
                    'type'    => Controls_Manager::NUMBER,
                    'default' => 20,
                    'min'     =>10,
                    'max'     => 800,
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

            $this->add_control(
                'read_more_text',
                [
                    'label' => esc_html__('Read More Text', 'axero-toolkit'),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'Read More',
                    'label_block' => true,
                ]
            );
            $this->end_controls_section();

        }

        protected function style_tab_content() {

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
           
        // Style 5 box Style
        $this->start_controls_section(
            'style5_box_style',
            [
                'label' => esc_html__('Box Style', 'axero-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                 
            ]
        );

        $this->add_control(
            'style5_box_background_color',
            [
                'label' => esc_html__('Background Color', 'axero-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awesome_blog_inner' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'style5_box_border_radius',
            [
                'label' => esc_html__('Border Radius', 'axero-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .awesome_blog_inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'style5_box_padding',
            [
                'label' => esc_html__('Padding', 'axero-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .awesome_blog_inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        // Style 5 Category Style
        $this->start_controls_section(
            'style5_category_style',
            [
                'label' => esc_html__('Category Style', 'axero-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                
            ]
        );

        $this->add_control(
            'style5_category_normal_color',
            [
                'label' => esc_html__('Normal Color', 'axero-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awesome_blog_list .item_box .content .info a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'style5_category_normal_border_color',
            [
                'label' => esc_html__('Normal Border Color', 'axero-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awesome_blog_list .item_box .content .info a' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'style5_category_hover_color',
            [
                'label' => esc_html__('Hover Color', 'axero-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awesome_blog_list .item_box .content .info a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'style5_category_hover_bg_color',
            [
                'label' => esc_html__('Hover Background Color', 'axero-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awesome_blog_list .item_box .content .info a:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'style5_category_hover_border_color',
            [
                'label' => esc_html__('Hover Border Color', 'axero-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awesome_blog_list .item_box .content .info a:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style5_category_typography',
                'selector' => '{{WRAPPER}} .awesome_blog_list .item_box .content .info a',
            ]
        );

        $this->add_control(
            'style5_category_padding',
            [
                'label' => esc_html__('Padding', 'axero-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .awesome_blog_list .item_box .content .info a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'style5_category_border_radius',
            [
                'label' => esc_html__('Border Radius', 'axero-toolkit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .awesome_blog_list .item_box .content .info a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        // Reading Time Style
        $this->start_controls_section(
            'style5_reading_time_style',
            [
                'label' => esc_html__('Reading Time Style', 'axero-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                
            ]
        );

        $this->add_control(
            'style5_reading_time_color',
            [
                'label' => esc_html__('Color', 'axero-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awesome_blog_list .item_box .content .info span.read-time' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style5_reading_time_typography',
                'selector' => '{{WRAPPER}} .awesome_blog_list .item_box .content .info span.read-time',
            ]
        );

        $this->end_controls_section();
        // Style 5 Title Style
        $this->start_controls_section(
            'style5_title_style',
            [
                'label' => esc_html__('Title Style', 'axero-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                
            ]
        );

        $this->add_control(
            'style5_title_color',
            [
                'label' => esc_html__('Color', 'axero-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awesome_blog_list .item_box .content h3 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'style5_title_hover_color',
            [
                'label' => esc_html__('Hover Color', 'axero-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awesome_blog_list .item_box .content h3 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style5_title_typography',
                'selector' => '{{WRAPPER}} .awesome_blog_list .item_box .content h3 a',
            ]
        );

        $this->end_controls_section();
        // Style 5 Description Style
        $this->start_controls_section(
            'style5_description_style',
            [
                'label' => esc_html__('Description Style', 'axero-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                
            ]
        );

        $this->add_control(
            'style5_description_color',
            [
                'label' => esc_html__('Color', 'axero-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awesome_blog_list .item_box .text p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style5_description_typography',
                'selector' => '{{WRAPPER}} .awesome_blog_list .item_box .text p',
            ]
        );

        $this->end_controls_section();
        // Style 5 Date Style
        $this->start_controls_section(
            'style5_date_style',
            [
                'label' => esc_html__('Date Style', 'axero-toolkit'),
                'tab' => Controls_Manager::TAB_STYLE,
                
            ]
        );

        $this->add_control(
            'style5_date_color',
            [
                'label' => esc_html__('Color', 'axero-toolkit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awesome_blog_list .item_box .content .date' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'style5_date_typography',
                'selector' => '{{WRAPPER}} .awesome_blog_list .item_box .content .date',
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

            $query = new \WP_Query($query_args); ?>

                <div class="awesome_blog_area ptb_150"> 
                    <div class="container-fluid max_w_1905px">
                        <div class="awesome_blog_inner">
                             <div class="section_title style_five">
                                 <?php if (!empty($settings['section_title'])) : ?>
                                    <h2 class="mb-0 text_animation">
                                        <?php echo wp_kses_post($settings['section_title']); ?>
                                    </h2>
                                 <?php endif; ?>
                              </div>
                            <div class="border_bottom_style"></div>
                            <div class="awesome_blog_list" data-cues="slideInUp" data-group="awesome_blog_list">
                                    <?php if ( isset( $query ) && $query->have_posts() ) :
                                        while ( $query->have_posts() ) : $query->the_post(); 
                                            $categories = get_the_category();
                                            $category_name = !empty($categories) ? esc_html($categories[0]->name) : '';
                                            $permalink = get_permalink();
                                            $excerpt = get_the_excerpt();
                                            // Add trim_words support
                                            $trim_words = !empty($settings['trim_words']) ? intval($settings['trim_words']) : 20;
                                            if ( $trim_words > 0 ) {
                                                $excerpt = wp_trim_words( $excerpt, $trim_words, '...' );
                                            }
                                            $reading_time = ceil(str_word_count(get_the_content()) / 200);  ?>
                                    <div class="item_box position-relative">
                                        <div class="row align-items-center">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="content">
                                                    <div class="info d-flex align-items-center">
                                                        <?php if ( $category_name ) : ?>
                                                            <a href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ); ?>" class="fw-medium text-uppercase">
                                                                <?php echo $category_name; ?>
                                                            </a>
                                                        <?php endif; ?>
                                                        <span class="d-block fw-medium read-time">
                                                            <?php echo esc_html($reading_time . ' min.'); ?>
                                                    </div>
                                                    <h3 class="text-uppercase">
                                                        <a href="<?php echo esc_url( $permalink ); ?>">
                                                            <?php the_title(); ?>
                                                        </a>
                                                    </h3>
                                                    <span class="date d-block fw-medium">
                                                        <?php echo esc_html( get_the_date() ); ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="text">
                                                    <p>
                                                        <?php echo esc_html( $excerpt ); ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="<?php echo esc_url( $permalink ); ?>" class="image d-block">
                                            <?php 
                                            if ( has_post_thumbnail() ) {
                                                the_post_thumbnail( 'full', [ 'alt' => get_the_title() ] );
                                            }
                                            ?>
                                        </a>
                                    </div>
                                <?php endwhile; wp_reset_postdata();  endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            
                

            <?php
            }
                }
           

$widgets_manager->register(new axero_Post_Grid_slider());