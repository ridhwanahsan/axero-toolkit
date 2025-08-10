<?php
    namespace axero_toolkit\Widgets;
    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_team_area_2 extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_team_area_2';
        }

        public function get_title()
        {
            return __('Team Area 2', 'axero-toolkit');
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
                <div class="team_area_two pb_150 position-relative z-1">
                    <div class="container-fluid max_w_1560px">
                        <div class="section_title position-relative style_three right_side text_animation">
                            <div class="row align-items-end">
                                <div class="col-lg-7 order-1 order-lg-2 text-md-end">
                                    <div class="title position-relative d-inline-block">
                                        <h2 class="mb-0 fw-black text-uppercase">
                                            Our Team
                                        </h2>
                                        <img src="<?php echo get_template_directory_uri()?>/assets/images/icons/vector.svg" alt="vector">
                                    </div>
                                    <p>
                                        We believe that the surest measure of success is when a client partners with us more than half our clients stay with us for longer than a single project.
                                    </p>
                                </div>
                                <div class="col-lg-5 order-2 order-lg-1 text-md-end text-lg-start">
                                    <a href="<?php echo esc_url( home_url( '/team/' ) ); ?>" class="btn black_btn style_two with_border">
                                        <span class="d-inline-block position-relative">
                                            View All Team Member <i class="ti ti-arrow-up-right"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="team_tabs_slides overflow-hidden d-md-flex" data-cues="slideInUp" data-group="team_list">
                            <?php if ($query->have_posts()): ?>
                                <?php while ($query->have_posts()): $query->the_post(); ?>
                                    <?php
                                    $categories = get_the_terms(get_the_ID(), 'teams_category');
                                    $category_name = !empty($categories) ? esc_html($categories[0]->name) : '';
                                    ?>
                                    <div class="slide d-flex align-items-end" style="background-image: url(<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>);">
                                        <div class="team_content">
                                            <h3>
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h3>
                                            <?php if ($category_name): ?>
                                                <span class="d-block">
                                                    <?php echo $category_name; ?>
                                                </span>
                                            <?php endif; ?>
                                            <p>
                                                <?php echo get_the_excerpt(); ?>
                                            </p>
                                            <div class="socials lh-1 d-flex align-items-center">
                                                <a href="#" target="_blank">
                                                    <i class="ti ti-brand-facebook"></i>
                                                </a>
                                                <a href="#" target="_blank">
                                                    <i class="ti ti-brand-instagram"></i>
                                                </a>
                                                <a href="#" target="_blank">
                                                    <i class="ti ti-brand-x"></i>
                                                </a>
                                                <a href="#" target="_blank">
                                                    <i class="ti ti-brand-linkedin"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; wp_reset_postdata(); ?>
                            <?php endif; ?>
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
$widgets_manager->register(new axero_team_area_2());