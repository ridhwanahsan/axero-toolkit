<?php
    namespace axero_toolkit\Widgets;
    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_team_area_4 extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_team_area_4';
        }

        public function get_title()
        {
            return __('Team Area 4', 'axero-toolkit');
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
                <div class="team_area pt_150">
                    <div class="container">
                        <div class="row align-items-center justify-content-center" id="team_load_more_items">
                            <?php while ($query->have_posts()) : $query->the_post(); 
                                $team_categories = get_the_terms(get_the_ID(), 'teams_category');
                                $facebook = get_field('facebook');
                                $instagram = get_field('instagram');
                                $twitter_x = get_field('twitter_x');
                                $linkedin = get_field('linkdin');
                            ?>
                            <div class="col-lg-4 col-sm-6">
                                <div class="team_member mb_25 position-relative">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('full', ['alt' => get_the_title()]); ?>
                                    <?php endif; ?>
                                    <div class="content">
                                        <?php if (!empty($team_categories) && !is_wp_error($team_categories)) : ?>
                                            <span class="d-block text-white">
                                                <?php echo esc_html($team_categories[0]->name); ?>
                                            </span>
                                        <?php endif; ?>
                                        <h3 class="mb-0 text-white">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </h3>
                                    </div>
                                    <div class="socials lh-1 d-flex align-items-center">
                                        <?php if ($facebook) : ?>
                                            <a href="<?php echo esc_url($facebook); ?>" target="_blank">
                                                <i class="ti ti-brand-facebook"></i>
                                            </a>
                                        <?php endif; ?>
                                        <?php if ($instagram) : ?>
                                            <a href="<?php echo esc_url($instagram); ?>" target="_blank">
                                                <i class="ti ti-brand-instagram"></i>
                                            </a>
                                        <?php endif; ?>
                                        <?php if ($twitter_x) : ?>
                                            <a href="<?php echo esc_url($twitter_x); ?>" target="_blank">
                                                <i class="ti ti-brand-x"></i>
                                            </a>
                                        <?php endif; ?>
                                        <?php if ($linkedin) : ?>
                                            <a href="<?php echo esc_url($linkedin); ?>" target="_blank">
                                                <i class="ti ti-brand-linkedin">link</i>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>
            <?php
        }
    }
$widgets_manager->register(new axero_team_area_4());