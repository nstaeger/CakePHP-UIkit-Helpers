<?php

App::uses('FormHelper', 'View/Helper');

/**
 * This class extends the CakePHP FormHelper and modifies it,
 * to use the basic UIKit styling for forms.
 *
 * @author Nicolai Stäger
 * @version 2014-07-01
 */
class UIKitFormHelper extends FormHelper
{
	/**
	 * This function adds some additional options to the defaul create-method.
	 * It ensures that the classes for the form are set to
	 * 		uk-form
	 * 		uk-form-horizontal
	 *
	 * @param $model
	 * 			the Model the Form shold be created for
	 * @param $options
	 * 			an Array of options for the Form (takes precedence)
	 *
	 */
	public function create($model = null, $options = array()) {
		$new_options = Set::merge(array(
			'class' => 'uk-form uk-form-horizontal'
		), $options);
		
		return parent::create($model, $new_options);
	}
	
	/**
	 * This function adds some additional options to the defaul create-method.
	 * It ensures that the classes for the form are set to
	 * 		uk-form
	 * 		uk-form-stacked
	 *
	 * @param $model
	 * 			the Model the Form shold be created for
	 * @param $options
	 * 			an Array of options for the Form (takes precedence)
	 *
	 */
	public function createStacked($model = null, $options = array()) {
		$new_options = Set::merge(array(
			'class' => 'uk-form uk-form-stacked'
		), $options);
		
		return $this->create($model, $new_options);
	}
	
	
	
	/**
	 * This function adds some additional options to the defaul input-method.
	 *
	 * @param $fieldName
	 * 			the name of the field
	 * @param $label
	 * 			a String to be used as label and placeholder
	 * @param $options
	 * 			an Array of options for the Form (takes precedence)
	 *
	 */
	public function input($fieldName, $label = null, $options = array()) {
		$new_options = Set::merge(array(
			'div' => array(
				'class' => 'uk-form-row'
			),
			'class' => 'uk-width-1-1',
			'label' => array(
				'text' => $label,
				'class' => 'uk-form-label'
			),
			'between' => '<div class="uk-form-controls">',
			'after' => '</div>',
			'placeholder' => $label,
			'error' => array(
				'attributes' => array(
					'wrap' => 'p',
					'class' => array('uk-form-help-block', 'uk-form-danger')
				)
			)
		), $options);
		
		return parent::input($fieldName, $new_options);
	}
	
	/**
	 * This function adds some additional options to the defaul input-method.
	 * The Input-Field will be shown in big, spanning the whole width.
	 *
	 * @param $fieldName
	 * 			the name of the field
	 * @param $label
	 * 			a String to be used as label and placeholder
	 * @param $options
	 * 			an Array of options for the Form (takes precedence)
	 */
	public function inputBig($fieldName, $label = null, $options = array()) {
		$new_options = Set::merge(array(
			'class' => 'uk-width-1-1 uk-form-large',
			'label' => false,
			'between' => false,
			'after' => false
		), $options);
		
		return $this->input($fieldName, $label, $new_options);
	}
	
	/**
	 * Creates a hidden Input
	 *
	 * @param $fieldName
	 * 			the name of the field
	 * @param $value
	 * 			the value the field should contain
	 * @param $options
	 * 			an Array of options for the Form (takes precedence)
	 */
	public function hiddenField($fieldName, $value = null, $options = array()) {
		$new_options = Set::merge(array(
			'value' => $value
		), $options);
		
		return parent::hidden($fieldName, $new_options);
	}
	
	
	
	/**
	 * This function adds some additional options to the defaul input-method.
	 * It also loads UIKits addon-files for the datepicker.
	 *
	 * @param $model
	 * 			the Model the Form shold be created for
	 * @param $label
	 * 			a String to be used as label and placeholder
	 * @param $options
	 * 			an Array of options for the Form (takes precedence)
	 *
	 */
	public function dateInput($fieldName, $label = null, $options = array()) {
		
		$this->Html->script(array('addons/datepicker.min'), array('inline' => false));
		$this->Html->css(array('addons/uikit.almost-flat.addons.min'), array('inline' => false));
		
		$new_options = Set::merge(array(
			'type' => 'text',
			'data-uk-datepicker' => '{format:\'YYYY-MM-DD\'}',
			'default' => date('Y-m-d'),
			'between' => '<div class="uk-form-controls"><div class="uk-form-icon"><i class="uk-icon-calendar"></i>',
			'after' => '</div></div>',
		), $options);
		
		return $this->input($fieldName, $label, $new_options);
	}
	
	
	
	/**
	 * This function adds some additional options to the defaul end-method.
	 *
	 * @param $label
	 * 			for the submit-button
	 * @param $options
	 * 			an Array of options for the Form (takes precedence)
	 *
	 */
	public function end($label = null, $options = null) {
		$new_options = Set::merge(array(
			'label' => $label,
			'div' => array(
				'class' => 'uk-form-row'
			),
			'class' => 'uk-button',
			'before' => '<div class="uk-form-controls">',
			'after' => '</div>'
		), $options);
		
		return parent::end($new_options);
	}
	
	
	
	
	/**
	 * This function automatically adds a class "uk-form-danger", if a class is error.
	 */
	public function addClass($options = array(), $class = null, $key = 'class') {
		// Auto-Adding of ' uk-form-danger' class, if class is 'error'
		if ($class === 'error')
		{
			$class .= ' uk-form-danger';
		}
		return parent::addClass($options, $class, $key);
	}
	
}
