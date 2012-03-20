<?php
/**
 * Axis
 *
 * @copyright Copyright 2008-2012 Axis
 * @license GNU Public License V3.0
 *
 * This file is part of Axis.
 *
 * Axis is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Axis is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Axis.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @category    Example
 * @package     Example_Videoreview
 * @copyright   Copyright 2008-2012 Axis
 * @license     GNU Public License V3.0
 */

class Example_Videoreview_Upgrade_1_0_0 extends Axis_Core_Model_Migration_Abstract
{
    protected $_version = '1.0.0';
    protected $_info = 'install';

    public function up()
    {
        $row = Axis::model('catalog/product_option')->save(array(
            'visible'    => 0,
            'code'       => 'videoreview',
            'input_type' => Axis_Catalog_Model_Product_Option::TYPE_STRING
        ));

        $mText = Axis::model('catalog/product_option_text');
        foreach (array_keys(Axis_Collect_Language::collect()) as $languageId) {
            $rowText = $mText->getRow($row->id, $languageId);
            $rowText->name = 'Video Review';
            $rowText->save();
        }
    }

    public function down()
    {
        $row = Axis::model('catalog/product_option')->select()
            ->where('code = ?', 'videoreview')
            ->fetchRow();

        if (!$row) {
            return;
        }

        $row->delete();
        // descriptions will be deleted by zend db table relationship feature
        // see Axis_Catalog_Model_Product_Option_Text::$_referenceMap
    }
}
