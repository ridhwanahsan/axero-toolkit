<?php
    namespace axero_toolkit\Widgets;
    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_team_area extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_team_area';
        }

        public function get_title()
        {
            return __('Team Area', 'axero-toolkit');
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
        }

        /**
         * Style Tab Content Section
         * ------------------------
         */

        protected function style_tab_content()
        {
         
            $this->start_controls_section(
                'section_team_area_style',
                [
                    'label' => esc_html__('Container Style', 'axero-toolkit'),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            // Position Color & Typography for .team_member .content span
            $this->add_control(
                'team_member_position_heading',
                [
                    'label' => esc_html__('Position', 'axero-toolkit'),
                    'type'  => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'team_member_position_color',
                [
                    'label'     => esc_html__('Position Color', 'axero-toolkit'),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .team_member .content span' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'     => 'team_member_position_typography',
                    'label'    => esc_html__('Position Typography', 'axero-toolkit'),
                    'selector' => '{{WRAPPER}} .team_member .content span',
                ]
            );
            $this->add_responsive_control(
                'team_area_padding',
                [
                    'label'      => esc_html__('Section Padding', 'axero-toolkit'),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'devices'    => ['desktop', 'tablet', 'mobile'],
                    'default'    => [
                        'top' => '150',
                        'right' => '0',
                        'bottom' => '150',
                        'left' => '0',
                        'unit' => 'px',
                        'isLinked' => false,
                    ],
                    'tablet_default' => [
                        'top' => '100',
                        'right' => '0',
                        'bottom' => '100',
                        'left' => '0',
                        'unit' => 'px',
                        'isLinked' => false,
                    ],
                    'mobile_default' => [
                        'top' => '80',
                        'right' => '0',
                        'bottom' => '80',
                        'left' => '0',
                        'unit' => 'px',
                        'isLinked' => false,
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} .team_area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
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
                <div class="team_area">
                    <div class="container">
                        <div class="section_title text-center mx-auto text_animation">
                            <div class="sub_title d-inline-block">
                                <span class="d-flex align-items-center text-uppercase">
                                    Marketing Agency People
                                    <img src="<?php echo get_template_directory_uri();?>/assets/images/icons/arrow_long_right.svg" alt="arrow_long_right">
                                </span>
                            </div>
                            <h2 class="mb-0">
                                Leading Digital Minds Working for Your Success
                            </h2>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row align-items-center justify-content-center" data-cues="slideInUp" data-group="team_list">
                            <?php if ( $query->have_posts() ) :
                                $post_count = 0;
                                $first_col = true;
                                $second_col = true;
                                $third_col = true;
                                while ( $query->have_posts() ) : $query->the_post();
                                    $post_count++;
                                    // Get category (position)
                                    $terms = get_the_terms(get_the_ID(), 'teams_category');
                                    $position = '';
                                    if ( ! is_wp_error($terms) && ! empty($terms) ) {
                                        // Use the first category as position
                                        $position = $terms[0]->name;
                                    }
                                    $facebook = get_post_meta(get_the_ID(), 'facebook', true);
                                    $instagram = get_post_meta(get_the_ID(), 'instagram', true);
                                    $x = get_post_meta(get_the_ID(), 'twitter_x', true);
                                    $linkedin = get_post_meta(get_the_ID(), 'linkdin', true);
                                    $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                                    if (!$image_url) {
                                        $image_url = get_template_directory_uri() . '/assets/images/team/team' . $post_count . '.jpg';
                                    }
                                    // Open columns as per original layout
                                    if ($post_count == 1) { ?>
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="team_member position-relative">
                                                <img src="<?php echo esc_url($image_url); ?>" alt="team">
                                                <div class="content">
                                                    <span class="d-block  ">
                                                        <?php echo esc_html($position ? $position : ''); ?>
                                                    </span>
                                                    <h3 class="mb-0 text-white">
                                                        <a href="<?php the_permalink(); ?>">
                                                            <?php the_title(); ?>
                                                        </a>
                                                    </h3>
                                                </div>
                                                <div class="socials lh-1 d-flex align-items-center">
                                                    <?php if ($facebook): ?>
                                                        <a href="<?php echo esc_url($facebook); ?>" target="_blank">
                                                            <i class="ti ti-brand-facebook"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php if ($instagram): ?>
                                                        <a href="<?php echo esc_url($instagram); ?>" target="_blank">
                                                            <i class="ti ti-brand-instagram"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php if ($x): ?>
                                                        <a href="<?php echo esc_url($x); ?>" target="_blank">
                                                            <i class="ti ti-brand-x"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php if ($linkedin): ?>
                                                        <a href="<?php echo esc_url($linkedin); ?>" target="_blank">
                                                            <i class="ti ti-brand-linkedin"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="row">
                                            <?php } if ($post_count == 2) { ?>
                                                <div class="col-lg-6 col-sm-6">
                                                    <div class="row">
                                                    <?php } if ($post_count == 2 || $post_count == 3) { ?>
                                                        <div class="col-lg-12">
                                                            <div class="team_member position-relative">
                                                                <img src="<?php echo esc_url($image_url); ?>" alt="team">
                                                                <div class="content">
                                                                    <span class="d-block text-white">
                                                                        <?php echo esc_html($position ? $position : ''); ?>
                                                                    </span>
                                                                    <h3 class="mb-0 text-white">
                                                                        <a href="<?php the_permalink(); ?>">
                                                                            <?php the_title(); ?>
                                                                        </a>
                                                                    </h3>
                                                                </div>
                                                                <div class="socials lh-1 d-flex align-items-center">
                                                                    <?php if ($facebook): ?>
                                                                        <a href="<?php echo esc_url($facebook); ?>" target="_blank">
                                                                            <i class="ti ti-brand-facebook"></i>
                                                                        </a>
                                                                    <?php endif; ?>
                                                                    <?php if ($instagram): ?>
                                                                        <a href="<?php echo esc_url($instagram); ?>" target="_blank">
                                                                            <i class="ti ti-brand-instagram"></i>
                                                                        </a>
                                                                    <?php endif; ?>
                                                                    <?php if ($x): ?>
                                                                        <a href="<?php echo esc_url($x); ?>" target="_blank">
                                                                            <i class="ti ti-brand-x"></i>
                                                                        </a>
                                                                    <?php endif; ?>
                                                                    <?php if ($linkedin): ?>
                                                                        <a href="<?php echo esc_url($linkedin); ?>" target="_blank">
                                                                            <i class="ti ti-brand-linkedin"></i>
                                                                        </a>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } if ($post_count == 3) { ?>
                                                    </div>
                                                </div>
                                                <?php } if ($post_count == 4) { ?>
                                                <div class="col-lg-6 col-sm-6">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="team_member position-relative">
                                                                <img src="<?php echo esc_url($image_url); ?>" alt="team">
                                                                <div class="content">
                                                                    <span class="d-block text-white">
                                                                        <?php echo esc_html($position ? $position : ''); ?>
                                                                    </span>
                                                                    <h3 class="mb-0 text-white">
                                                                        <a href="<?php the_permalink(); ?>">
                                                                            <?php the_title(); ?>
                                                                        </a>
                                                                    </h3>
                                                                </div>
                                                                <div class="socials lh-1 d-flex align-items-center">
                                                                    <?php if ($facebook): ?>
                                                                        <a href="<?php echo esc_url($facebook); ?>" target="_blank">
                                                                            <i class="ti ti-brand-facebook"></i>
                                                                        </a>
                                                                    <?php endif; ?>
                                                                    <?php if ($instagram): ?>
                                                                        <a href="<?php echo esc_url($instagram); ?>" target="_blank">
                                                                            <i class="ti ti-brand-instagram"></i>
                                                                        </a>
                                                                    <?php endif; ?>
                                                                    <?php if ($x): ?>
                                                                        <a href="<?php echo esc_url($x); ?>" target="_blank">
                                                                            <i class="ti ti-brand-x"></i>
                                                                        </a>
                                                                    <?php endif; ?>
                                                                    <?php if ($linkedin): ?>
                                                                        <a href="<?php echo esc_url($linkedin); ?>" target="_blank">
                                                                            <i class="ti ti-brand-linkedin"></i>
                                                                        </a>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } if ($post_count == 5) { ?>
                                                        <div class="col-lg-12">
                                                            <div class="team_member position-relative">
                                                                <img src="<?php echo esc_url($image_url); ?>" alt="team">
                                                                <div class="content">
                                                                    <span class="d-block text-white">
                                                                        <?php echo esc_html($position ? $position : ''); ?>
                                                                    </span>
                                                                    <h3 class="mb-0 text-white">
                                                                        <a href="<?php the_permalink(); ?>">
                                                                            <?php the_title(); ?>
                                                                        </a>
                                                                    </h3>
                                                                </div>
                                                                <div class="socials lh-1 d-flex align-items-center">
                                                                    <?php if ($facebook): ?>
                                                                        <a href="<?php echo esc_url($facebook); ?>" target="_blank">
                                                                            <i class="ti ti-brand-facebook"></i>
                                                                        </a>
                                                                    <?php endif; ?>
                                                                    <?php if ($instagram): ?>
                                                                        <a href="<?php echo esc_url($instagram); ?>" target="_blank">
                                                                            <i class="ti ti-brand-instagram"></i>
                                                                        </a>
                                                                    <?php endif; ?>
                                                                    <?php if ($x): ?>
                                                                        <a href="<?php echo esc_url($x); ?>" target="_blank">
                                                                            <i class="ti ti-brand-x"></i>
                                                                        </a>
                                                                    <?php endif; ?>
                                                                    <?php if ($linkedin): ?>
                                                                        <a href="<?php echo esc_url($linkedin); ?>" target="_blank">
                                                                            <i class="ti ti-brand-linkedin"></i>
                                                                        </a>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                    <?php }  endwhile; // Close opened divs
                                if ($post_count >= 1) {
                                    echo '</div></div></div>';
                                }
                                wp_reset_postdata();
                            endif; ?>
                        </div>
                    </div>
                </div>
            <?php
        }
    }
$widgets_manager->register(new axero_team_area());