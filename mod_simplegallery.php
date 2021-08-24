<?php

/**

 * I Love Joomla!!!

 * 

 * @package    My Modules

 * @subpackage Modules

 * @license    GNU/GPL, see LICENSE.php

 * @link       

 */



// No direct access

defined('_JEXEC') or die;

// Include the syndicate functions only once

require_once dirname(__FILE__) . '/helper.php';



$gallery = modSimpleGalleryHelper::getGallery($params);

require JModuleHelper::getLayoutPath('mod_simplegallery');



//$document = JFactory::getDocument(); 