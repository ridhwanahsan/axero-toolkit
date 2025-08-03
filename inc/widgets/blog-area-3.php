<?php
    namespace axero_toolkit\Widgets;
    use Elementor\Controls_Manager;
    use Elementor\Widget_Base;

    if (! defined('ABSPATH')) {
        exit;
    }

    class axero_blog_area_3 extends Widget_Base
    {

        public function get_name()
        {
            return 'axero_blog_area_3';
        }

        public function get_title()
        {
            return __('Blog Area 3', 'axero-toolkit');
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
                <div class="blog_area pt_150 pb_125">
                    <div class="container-fluid max_w_1560px">
                        <div class="section_title style_four position-relative">
                            <h2 class="mb-0 text-white text-uppercase fw-semibold text_animation">
                                Thoughts & insights
                            </h2>
                            <img src="<?echo get_template_directory_uri()?>/assets/images/icons/right_down_arrow.svg" alt="right_down_arrow">
                        </div>
                        <div class="row justify-content-center" data-cues="slideInUp" data-group="blog_list">
                            <div class="col-lg-4 col-sm-6">
                                <div class="single_blog_post">
                                    <div class="image position-relative overflow-hidden">
                                        <img src="<?echo get_template_directory_uri()?>/assets/images/blogs/blog7.jpg" alt="blog7">
                                        <a href="blog-details.html" class="details_link_btn d-flex align-items-center justify-content-center fw-medium rounded-circle">
                                            View
                                        </a>
                                    </div>
                                    <span class="category block text-uppercase fw-medium">
                                        Artificial intelligence
                                    </span>
                                    <h3 class="mb-0">
                                        <a href="blog-details.html">
                                            Optimized Design Sets the Foundation for Growth
                                        </a>
                                    </h3>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="single_blog_post">
                                    <div class="image position-relative overflow-hidden">
                                        <img src="<?echo get_template_directory_uri()?>/assets/images/blogs/blog8.jpg" alt="blog8">
                                        <a href="blog-details.html" class="details_link_btn d-flex align-items-center justify-content-center fw-medium rounded-circle">
                                            View
                                        </a>
                                    </div>
                                    <span class="category block text-uppercase fw-medium">
                                        Marketing
                                    </span>
                                    <h3 class="mb-0">
                                        <a href="blog-details.html">
                                            Intelligent Design Opens Doors to New Opportunities
                                        </a>
                                    </h3>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="single_blog_post">
                                    <div class="image position-relative overflow-hidden">
                                        <img src="<?echo get_template_directory_uri()?>/assets/images/blogs/blog9.jpg" alt="blog9">
                                        <a href="blog-details.html" class="details_link_btn d-flex align-items-center justify-content-center fw-medium rounded-circle">
                                            View
                                        </a>
                                    </div>
                                    <span class="category block text-uppercase fw-medium">
                                        Design
                                    </span>
                                    <h3 class="mb-0">
                                        <a href="blog-details.html">
                                            Transformative Design Drives Growth Potential
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid max_w_1560px">
                    <div class="blog_border_bottom"></div>
                </div>
            <?php
        }
    }
$widgets_manager->register(new axero_blog_area_3());