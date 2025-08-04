<?php
    namespace axero_toolkit\Widgets;
    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_case_studies extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_case_studies';
        }

        public function get_title()
        {
            return __('Case Studies', 'axero-toolkit');
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
                'taxonomy' => 'works_category',
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
            // work Filter Controls
            $this->start_controls_section(
                'post_filter_section',
                [
                    'label' => esc_html__('Work Filter', 'lunex-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'posts_per_page',
                [
                    'label'   => esc_html__('works Per Page', 'lunex-toolkit'),
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
                    'options'     => $this->get_post_categories('works_category'),
                    'multiple'    => true,
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'exclude_posts',
                [
                    'label'       => esc_html__('Exclude works', 'lunex-toolkit'),
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
                'post_type'      => 'Projects',
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
            ?>
                <div class="case_studies_area pb_150">
                    <div class="container">
                        <div class="section_title style_two text_animation">
                            <div class="sub_title d-inline-block">
                                <span class="d-flex align-items-center text-uppercase">
                                    Our Case Study
                                    <img src="<?php echo get_template_directory_uri();?>/assets/images/icons/arrow_long_right.svg" alt="arrow_long_right">
                                </span>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-lg-7">
                                    <h2 class="mb-0">
                                        Highlights from Our Most Recent Projects
                                    </h2>
                                </div>
                                <div class="col-lg-5">
                                    <p>
                                        Our agency powers growth and success in the fast-paced digital marketing space. Let’s turn your vision into reality.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
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
                            <?php endwhile; wp_reset_postdata(); else: ?>
                                <p><?php esc_html_e('No works found.', 'lunex-toolkit'); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php
        }
    }
$widgets_manager->register(new axero_case_studies());