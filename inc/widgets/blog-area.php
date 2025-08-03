<?php
    namespace axero_toolkit\Widgets;
    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_blog_area extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_blog_area';
        }

        public function get_title()
        {
            return __('Blog Area', 'axero-toolkit');
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
             // Post Filter Controls
            $this->start_controls_section(
                'post_filter_section',
                [
                    'label' => esc_html__('Post Filter', 'lunex-toolkit'),
                    'tab'   => Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'style7_title_text',
                [
                    'label'       => esc_html__('Title Text', 'lunex-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'default'     => esc_html__('Discover Our Newest Articles', 'lunex-toolkit'),
                    'label_block' => true,
                    'condition'   => [
                        'style_selection' => 'style7',
                    ],
                ]
            );

            $this->add_control(
                'trim_words',
                [
                    'label'   => esc_html__('Trim Words', 'lunex-toolkit'),
                    'type'    => Controls_Manager::NUMBER,
                    'default' => 20,
                    'min'     =>10,
                    'max'     => 800,
                    'description' => esc_html__('Number of words to trim from the post excerpt.', 'lunex-toolkit'),
                ]
            );

            $this->add_control(
                'posts_per_page',
                [
                    'label'   => esc_html__('Posts Per Page', 'lunex-toolkit'),
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
                    'options'     => $this->get_post_categories(),
                    'multiple'    => true,
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'exclude_posts',
                [
                    'label'       => esc_html__('Exclude Posts', 'lunex-toolkit'),
                    'type'        => Controls_Manager::TEXT,
                    'description' => esc_html__('Enter post IDs separated by commas', 'lunex-toolkit'),
                ]
            );

            $this->add_control(
                'read_more_text',
                [
                    'label' => esc_html__('Read More Text', 'lunex-toolkit'),
                    'type' => Controls_Manager::TEXT,
                    'default' => 'Read More',
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
            $settings = $this->get_settings_for_display(); ?>
                <div class="blog_area pt_150">
                    <div class="container">
                        <div class="section_title style_two text_animation">
                            <div class="sub_title d-inline-block">
                                <span class="d-flex align-items-center text-uppercase">
                                    Read Articles
                                    <img src="<?php echo  get_template_directory_uri()?>/assets/images/icons/arrow_long_right.svg" alt="arrow_long_right">
                                </span>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-lg-7">
                                    <h2 class="mb-0">
                                        Dive Into Our Marketing & Growth Articles
                                    </h2>
                                </div>
                                <div class="col-lg-5">
                                    <p>
                                        Our agency powers growth and success in the fast-paced digital marketing space. Let’s turn your vision into reality.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="blog_articles_posts" data-cues="slideInUp" data-group="blog_articles_posts">
                                <?php $args = array(
                                    'post_type' => 'post',
                                    'posts_per_page' => $settings['posts_per_page'],
                                    'orderby' => $settings['orderby'],
                                    'order' => $settings['order']
                                );
                                $query = new \WP_Query($args);
                                
                                if ($query->have_posts()) : 
                                    while ($query->have_posts()) : $query->the_post();
                                        $permalink = get_permalink();
                                        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                                ?>
                            <div class="blog_article_post">
                                <div class="inner position-relative z-1" style="background-image: url(<?php  echo esc_url($featured_img_url); ?>);">
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
                                                <?php echo esc_html__('By', 'lunex-toolkit'); ?> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                                    <?php the_author(); ?>
                                                </a>
                                            </span>
                                        </div>
                                        <div class="col-lg-3 text-lg-end">
                                            <a href="<?php echo esc_url($permalink); ?>" class="details_link_btn d-inline-block position-relative">
                                                <span class="d-inline-block position-relative">
                                                    <?php echo esc_html($settings['read_more_text']); ?>
                                                </span>
                                                <i class="ri-arrow-right-up-line"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; wp_reset_postdata(); endif; ?>
                        </div>
                    </div>
                </div>
            <?php
        }
    }
$widgets_manager->register(new axero_blog_area());