<?php
/**
 * CRJudge online judge
 * @file Settings_model.php
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * This model deals with global settings
 */

class Settings_model extends CI_Model
{


	public function __construct()
	{
		parent::__construct();
	}


	// ------------------------------------------------------------------------


	public function get_setting($key)
	{
		return $this->db->select('crj_value')->get_where('settings', array('crj_key'=>$key))->row()->crj_value;
	}


	// ------------------------------------------------------------------------


	public function set_setting($key, $value)
	{
		$this->db->where('crj_key', $key)->update('settings', array('crj_value'=>$value));
	}


	// ------------------------------------------------------------------------


	public function get_all_settings()
	{
		$result = $this->db->get('settings')->result_array();
		$settings = array();
		foreach($result as $item)
		{
			$settings[$item['crj_key']] = $item['crj_value'];
		}
		return $settings;
	}


	// ------------------------------------------------------------------------


	public function set_settings($settings)
	{
		foreach ($settings as $key => $value)
		{
			$this->set_setting($key, $value);
		}
	}



}