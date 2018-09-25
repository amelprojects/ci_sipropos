<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Date Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/helpers/date_helper.html
 */

// ------------------------------------------------------------------------

if ( ! function_exists('lower_extensi'))
{
	function lower_extensi($file)
	{
		if ($file != "") {
			$pecah = explode(".",$file);
			$nama_file = $pecah[0];
			$ext_file = strtolower($pecah[1]);
			return $nama_file.'.'.$ext_file;
		} else {
			return "";
		}
	}
}


/* End of file date_helper.php */
/* Location: ./system/helpers/date_helper.php */