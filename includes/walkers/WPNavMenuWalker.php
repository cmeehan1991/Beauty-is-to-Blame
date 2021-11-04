<?php
class WP_Nav_Menu_Walker extends Walker_Nav_Menu{
	
	public function start_lvl(&$output, $depth = 0, $args = array()){
		
		
		$indent = str_repeat("\t", $depth);
		$output .="\n$indent<div class='dropdown-menu' aria-labelledby='navbarDropdown'>\n";
	}
	
	public function end_lvl(&$output, $depth = 0, $args = array()){
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent</div>";
	}
	
	public function start_el(&$output, $object, $depth = 0, $args = array(), $current_object_id = 0){
		
		// Set an indent based ont he depth of the item. 
		$indent = ($depth) ? str_repeat('\t', $depth) : '';
		
		// check if the item has children
		$is_dropdown = $args->walker->has_children;
		
		// Set the class name based on if the item has children or not
		$class_name = $is_dropdown ? ' class="nav-item dropdown"' : ' class="nav-item"';
		
		if($depth === 0){
			$output .= $indent . '<li' . $class_name . '>';
		}
		
		$atts = array();
		
		$atts['href'] = !empty($object->url) ? $object->url : '#';
		$atts['title'] = !empty($object->title) ? $object->title : '';
		
		
		if($depth == 0){
			$atts['class'] = 'nav-link';
		}
		
		if($depth == 0 && $is_dropdown){
			$atts['class'] .= ' dropdown-toggle';
			$atts['id'] = 'navbarDropdown';
			$atts['role'] = 'button';
			$atts['data-toggle'] ='dropdown';
			$atts['aria-haspopup'] = 'true';
			$atts['aria-expanded'] = 'false';
		}
		
		if($depth > 0){
			$atts['class'] = 'dropdown-item';
		}
		
		$attributes = '';
		foreach($atts as $attr => $value){
			if(!empty($value)){
				$value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}
		
		$item_output = $args->before;
		
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . apply_filters('the_title', $object->title, $object->ID) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;
		
		$output .= apply_filters('walker_nav-menu_start_el', $item_output, $object, $depth, $args);
	}
}
