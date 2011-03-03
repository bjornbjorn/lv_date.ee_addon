<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bjorn_date extends Low_variables_type {

	var $info = array(
		'name'		=> 'Date (by:bjorn)',
		'version'	=> '1.0'
	);

	var $default_settings = array(
		'multiple'	=> 'n',
		'options'	=> '',
		'separator'	=> 'newline'
	);

	// --------------------------------------------------------------------

	/**
	* Display settings sub-form for this variable type
	*
	* @param	mixed	$var_id			The id of the variable: 'new' or numeric
	* @param	array	$var_settings	The settings of the variable
	* @return	array	
	*/
	function display_settings($var_id, $var_settings)
	{
		return array();
	}

	// --------------------------------------------------------------------

	/**
	* Display date input field
	*
	* @param	int		$var_id			The id of the variable
	* @param	string	$var_data		The value of the variable
	* @param	array	$var_settings	The settings of the variable
	* @return	string
	*/
	function display_input($var_id, $var_data, $var_settings)
	{
		$this->EE->cp->add_js_script(array('ui' => 'datepicker'));
		$input_id = 'bjorn_date_'.$var_id;		
		if($var_data == '')
		{
			$default_date = gmdate('c', $this->EE->localize->now);
		}
		else
		{
			$default_date = $var_data;
		}
		
		$this->EE->javascript->output('						
			$("#'.$input_id.'").datepicker({dateFormat: $.datepicker.W3C, defaultDate: new Date("'.$default_date.'")});
		');
		
		return form_input(array(
			'name' => "var[{$var_id}]",
			'value' => $var_data,
			'id' => $input_id,
		));		
	}

	// --------------------------------------------------------------------

	/**
	* Prep variable data for saving
	*
	* @param	int		$var_id			The id of the variable
	* @param	mixed	$var_data		The value of the variable, array or string
	* @param	array	$var_settings	The settings of the variable
	* @return	string
	*/
	function save_input($var_id, $var_data, $var_settings)
	{
		return $var_data;	// just save it as is
	}

}