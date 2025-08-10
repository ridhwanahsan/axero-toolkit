<?php
class Axero_Nav_Walker extends Walker_Nav_Menu
{
    public $tree_type = ['post_type', 'taxonomy', 'custom'];
    public $db_fields = [
        'parent' => 'menu_item_parent',
        'id'     => 'db_id',
    ];

    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n{$indent}<ul class=\"dropdown-menu border-0 d-block text-start rounded-0\">\n";
    }

    public function end_lvl(&$output, $depth = 0, $args = null)
    {
        $indent = str_repeat("\t", $depth);
        $output .= "{$indent}</ul>\n";
    }

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $indent  = ($depth) ? str_repeat("\t", $depth) : '';
        $classes = empty($item->classes) ? [] : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        $classes[] = 'nav-item position-relative';

        $has_children = in_array('menu-item-has-children', $classes);
        if ($has_children) {
            $classes[] = 'dropdown';
        }

        $class_names = implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth);

        // Add 'dropdown-parent-clickable' class for parent items
        $li_extra = $has_children ? ' dropdown-parent-clickable' : '';

        $output .= $indent . '<li class="' . esc_attr($class_names . $li_extra) . '">';

        $link_classes = 'nav-link position-relative fw-medium';
        if ($item->current) {
            $link_classes .= ' active';
        }
        // Add .dropdown-toggle class to <a> if has sub menu
        if ($has_children) {
            $link_classes .= ' dropdown-toggle';
        }

        $attributes_arr = [
            'title'  => !empty($item->attr_title) ? $item->attr_title : '',
            'target' => !empty($item->target) ? $item->target : '',
            'rel'    => !empty($item->xfn) ? $item->xfn : '',
            'class'  => $link_classes,
        ];

        // Always use the item's URL, even for parents with children
        $attributes_arr['href'] = !empty($item->url) ? $item->url : 'javascript:void(0)';

        if ($has_children) {
            $attributes_arr['role'] = 'button';
            $attributes_arr['data-bs-toggle'] = 'dropdown';
            $attributes_arr['aria-expanded'] = 'false';
        }

        $attributes = '';
        foreach ($attributes_arr as $attr => $value) {
            if (!empty($value)) {
                $attributes .= ' ' . $attr . '="' . esc_attr($value) . '"';
            }
        }

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    public function end_el(&$output, $item, $depth = 0, $args = null)
    {
        $output .= "</li>\n";
    }
}
class Mobile_Nav_Walker extends Walker_Nav_Menu {
    public function start_lvl(&$output, $depth = 0, $args = null) {
        $accordionId = $depth === 0 ? 'navbarAccordion' : 'navbarAccordion' . $depth;
        $output .= "<div class='accordion-body'><div class='accordion' id='{$accordionId}'>";
    }

    public function end_lvl(&$output, $depth = 0, $args = null) {
        $output .= "</div></div>";
    }

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $has_children = in_array('menu-item-has-children', $classes);
        $has_link = !empty($item->url) && $item->url !== '#';

        $output .= "<div class='accordion-item border-0 rounded-0 bg-transparent'>";

        if ($has_children) {
            $parent = $depth === 0 ? '#navbarAccordion' : '#navbarAccordion' . ($depth - 1);

            if ($has_link) {
                // If has link, clicking link goes to page, button toggles submenu
                $output .= sprintf(
                    '<a href="%s" class="accordion-link fw-semibold text-decoration-none%s">%s</a>',
                    esc_url($item->url),
                    $item->current ? ' active' : '',
                    esc_html($item->title)
                );
                $output .= sprintf(
                    '<button class="accordion-button d-block w-100 shadow-none position-relative text-decoration-none bg-transparent fw-semibold collapsed submenu-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-%d" aria-expanded="false" aria-label="Toggle Submenu"></button>',
                    $item->ID
                );
            } else {
                // No link: clicking button toggles submenu, label is the title
                $output .= sprintf(
                    '<button class="accordion-button d-block w-100 shadow-none position-relative text-decoration-none bg-transparent fw-semibold collapsed submenu-toggle%s" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-%d" aria-expanded="false" aria-label="Toggle Submenu">%s</button>',
                    $item->current ? ' active' : '',
                    $item->ID,
                    esc_html($item->title)
                );
            }

            $output .= sprintf(
                '<div id="collapse-%d" class="accordion-collapse collapse" data-bs-parent="%s">',
                $item->ID,
                $parent
            );
        } else {
            // No children, just a link
            $output .= sprintf(
                '<a href="%s" class="accordion-link fw-semibold text-decoration-none%s">%s</a>',
                esc_url($item->url),
                $item->current ? ' active' : '',
                esc_html($item->title)
            );
        }
    }

    public function end_el(&$output, $item, $depth = 0, $args = null) {
        if (in_array('menu-item-has-children', (array) $item->classes)) {
            $output .= "</div>";
        }
        $output .= "</div>";
    }
}

class header_four_nav_walker extends Walker_Nav_Menu {
    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'fw-medium';
    
        $has_children = in_array('menu-item-has-children', $classes);
        if ($has_children) {
            $classes[] = 'has-submenu'; // for targeting
        }
    
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $output .= $indent . '<li class="' . esc_attr($class_names) . '">';
    
        $atts = array();
        $atts['href'] = !empty($item->url) ? $item->url : '#'; // make non-clickable if needed
        $atts['class'] = '';
        
        if ($has_children) {
            $atts['data-toggle'] = 'submenu'; // this will help us target it in JS
        }
    
        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( !empty( $value ) ) {
                $attributes .= ' ' . $attr . '="' . esc_attr( $value ) . '"';
            }
        }
    
        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;
    
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
    
} 