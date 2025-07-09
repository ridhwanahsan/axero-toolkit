<?php
/**
 * ACF
 */

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_642f22b10d504',
        'title' => esc_html__( 'Social Links', 'lunex-toolkit'),
        'fields' => array(
            array(
                'key' => 'field_642f22b23248c',
                'label' => esc_html__( 'Social Links', 'lunex-toolkit'),
                'name' => 'social_links',
                'aria-label' => '',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'layout' => 'table',
                'pagination' => 0,
                'min' => 0,
                'max' => 0,
                'collapsed' => '',
                'button_label' => esc_html__( 'Add Row', 'lunex-toolkit'),
                'rows_per_page' => 20,
                'sub_fields' => array(
                    array(
                        'key' => 'field_642f2347e73f7',
                        'label' => esc_html__( 'Social Icon Class', 'lunex-toolkit'),
                        'name' => 'social_icon_class',
                        'aria-label' => '',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => 'flaticon-facebook-app-symbol facebook',
                        'maxlength' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'parent_repeater' => 'field_642f22b23248c',
                    ),
                    array(
                        'key' => 'field_642f236938e5d',
                        'label' => esc_html__( 'Social Title', 'lunex-toolkit'),
                        'name' => 'social_title',
                        'aria-label' => '',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => esc_html__( 'Facebook', 'lunex-toolkit'),
                        'maxlength' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'parent_repeater' => 'field_642f22b23248c',
                    ),
                    array(
                        'key' => 'field_642f238a38e5e',
                        'label' => esc_html__( 'Social Link', 'lunex-toolkit'),
                        'name' => 'social_link',
                        'aria-label' => '',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '#',
                        'maxlength' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'parent_repeater' => 'field_642f22b23248c',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'widget',
                    'operator' => '==',
                    'value' => 'social_widget',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'acf_after_title',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'field',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
    ));

    acf_add_local_field_group(array(
        'key' => 'group_6438587be638a',
        'title' => 'Post Options',
        'fields' => array(
            array(
                'key' => 'field_5e0c685e71sde2',
                'label' => esc_html__('Post Without Sidebar?', 'lunex-toolkit'),
                'name' => 'post_without_sidebar',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'default_value' => 0,
                'ui' => 0,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'left',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));
endif;