<?php

App::uses('PaginatorHelper', 'View/Helper');

/**
 * This class extends the CakePHP PaginatorHelper and modifies it,
 * to use the basic UIKit styling for pagination.
 *
 * @author Nicolai Stäger
 * @version:2014-07-03
 */
class UIKitPaginatorHelper extends PaginatorHelper
{
	
	/**
	 * Returns a full list of buttons for the Page-Navigation
	 * Included in this list are buttons for:
	 * 		- First
	 * 		- Previous
	 * 		- Numbers
	 * 		- Next
	 * 		- Last
	 */
	public function getFullPageNavigation() {
		$returner = '';
		$returner .= '<ul class="uk-pagination">';
		$returner .=  $this->first();
		$returner .=  $this->prev();
		$returner .=  $this->numbers();
		$returner .=  $this->next();
		$returner .=  $this->last();
		$returner .= '</ul>';
		
		return $returner;
	}
	
	/**
	 * Adding some default Options
	 * 			- Setting a default formatting for the counter-text
	 * 			- Wrapping counter-text into a <p>-Tag
	 */
	public function counter($options = array()) {
		$new_options = Set::merge(array(
			'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
		), $options);
		
		return '<p>' . parent::counter($new_options) . '</p>';
	}
	
	
	/**
	 * Adding some default options
	 * 		- tag => li
	 * 		- escape => false
	 * 
	 * @param $first
	 * 			String, optional
	 * 			The content of the first-button
	 * 			Default-Value: <i class="uk-icon-angle-double-left"></i>
	 * 			Takes precedence
	 * @param $options
	 * 			Array, optional
	 * 			Additional options
	 * 			Takes precedence
	 */
	public function first($first = '<i class="uk-icon-angle-double-left"></i>', $options = array()) {
		$new_options = Set::merge(array(
			'tag' => 'li',
			'escape' => false
		), $options);
		
		return parent::first($first, $new_options);
	}
	
	
	/**
	 * Adding some default options
	 * 		- tag => li
	 * 		- escape => false
	 * 
	 * Adding some default disabled options
	 * 		- tag => li
	 * 		- escape => false
	 * 		- disabledTag => span
	 * 		- class => uk-disabled
	 * 
	 * @param $title
	 * 			String, optional
	 * 			The content of the prev-button
	 * 			Default-Value: <i class="uk-icon-angle-left"></i>
	 * 			Takes precedence
	 * @param $options
	 * 			Array, optional
	 * 			Additional options
	 * 			Takes precedence
	 * @param $disabledTitle
	 * 			String, optional
	 * 			The content of the disabled prev-button
	 * 			Takes precedence
	 * @param $disabledOptions
	 * 			Array, optional
	 * 			Additional options for disabled prev-button
	 * 			Takes precedence
	 */
	public function prev($title = '<i class="uk-icon-angle-left"></i>', $options = array(), $disabledTitle = null, $disabledOptions = array()) {
		$new_options = Set::merge(array(
			'tag' => 'li',
			'escape' => false
		), $options);
		
		$new_disabledOptions = Set::merge(array(
			'tag' => 'li',
			'escape' => false,
			'disabledTag' => 'span',
			'class' => 'uk-disabled'
		), $disabledOptions);
		
		return parent::prev($title, $new_options, $disabledTitle, $new_disabledOptions);
	}
	
	
	/**
	 * Adding some default options
	 * 		- before => ''
	 * 		- after => ''
	 * 		- separator => ''
	 * 		- tag => li
	 * 		- currentClass => uk-active
	 * 		- currentTag => span
	 * 
	 * @param $options
	 * 			Array, optional
	 * 			Additional options for numbers
	 * 			Takes precedence
	 */
	public function numbers($options = array()) {
		$new_options = Set::merge(array(
			'before' => '',
			'after' => '',
			'separator' => '',
			'tag' => 'li',
			'currentClass' => 'uk-active',
			'currentTag' => 'span'
		), $options);
		
		return parent::numbers($new_options);
	}
	
	
	/**
	 * Adding some default options
	 * 		- tag => li
	 * 		- escape => false
	 * 
	 * Adding some default disabled options
	 * 		- tag => li
	 * 		- escape => false
	 * 		- disabledTag => span
	 * 		- class => uk-disabled
	 * 
	 * @param $title
	 * 			String, optional
	 * 			The content of the prev-button
	 * 			Default-Value: <i class="uk-icon-angle-right"></i>
	 * 			Takes precedence
	 * @param $options
	 * 			Array, optional
	 * 			Additional options
	 * 			Takes precedence
	 * @param $disabledTitle
	 * 			String, optional
	 * 			The content of the disabled prev-button
	 * 			Takes precedence
	 * @param $disabledOptions
	 * 			Array, optional
	 * 			Additional options for disabled prev-button
	 * 			Takes precedence
	 * 
	 */
	public function next($title = '<i class="uk-icon-angle-right"></i>', $options = array(), $disabledTitle = null, $disabledOptions = array()) {
		$new_options = Set::merge(array(
			'tag' => 'li',
			'escape' => false
		), $options);
		
		$new_disabledOptions = Set::merge(array(
			'tag' => 'li',
			'escape' => false,
			'disabledTag' => 'span',
			'class' => 'uk-disabled'
		), $disabledOptions);
		
		return parent::next($title, $new_options, $disabledTitle, $new_disabledOptions);
	}
	
	
	/**
	 * Adding some default options
	 * 		- tag => li
	 * 		- escape => false
	 * 
	 * @param $first
	 * 			String, optional
	 * 			The content of the first-button
	 * 			Default-Value: <i class="uk-icon-angle-double-right"></i>
	 * 			Takes precedence
	 * @param $options
	 * 			Array, optional
	 * 			Additional options
	 * 			Takes precedence
	 */
	public function last($first = '<i class="uk-icon-angle-double-right"></i>', $options = array()) {
		$new_options = Set::merge(array(
			'tag' => 'li',
			'escape' => false
		), $options);
		
		return parent::last($first, $new_options);
	}
}
