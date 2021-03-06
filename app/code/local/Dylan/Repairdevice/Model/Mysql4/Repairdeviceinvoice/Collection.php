<?php
/**
 * IDEALIAGroup srl
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@idealiagroup.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this module to newer
 * versions in the future.
 *
 * @category   IG
 * @package    IG_LightBox
 * @copyright  Copyright (c) 2010-2011 IDEALIAGroup srl (http://www.idealiagroup.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @author     Riccardo Tempesta <tempesta@idealiagroup.com>
*/
 
class Dylan_Repairdevice_Model_Mysql4_Repairdeviceinvoice_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
 	public function _construct()
    {
        parent::_construct();
        $this->_init('repairdevice/repairdeviceinvoice');
	}
	
	public function addAttributeToFilter($key , $value , $method = 'and')
    {
        switch($method) {
            case "in":
                if (is_array($value)) {
                    $_str = "";
                    foreach ($value as $val) {
                        $_str .= $val . ",";
                    }
                    $_str = trim($_str , ',');
                    $this->getSelect()->where($key . " IN($_str)");
                }
                break;

            case "like" :
                $this->getSelect()->orWhere($key . " LIKE ?", "%" .$value . "%");
                break;

            default:
                if (is_array($value)) {
                    foreach ($value as $val) {
                        $this->_select = $method == "and" ? $this->getSelect()->where($key . '=?' , $val) : $this->getSelect()->orwhere($key . '=?' , $val);
                    }
                }else{
                    $this->_select = $this->getSelect()->where($key . '=?' , $value);
                }
        }
        return $this;
    }
	
}
