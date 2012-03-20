<?php
/**
 * Axis
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
 * @category    Axis
 * @package     Example_Videoreview
 * @subpackage  Example_Videoreview_Box
 * @copyright   Copyright 2008-2012 Axis
 * @license     GNU Public License V3.0
 */

/**
 *
 * @category    Example
 * @package     Example_Videoreview
 * @subpackage  Example_Videoreview_Box
 * @author      Axis Core Team <core@axiscommerce.com>
 */
class Example_Videoreview_Box_Review extends Axis_Core_Box_Template
{
    protected $_title          = 'Video Review';
    protected $_class          = 'box-product-videoreview';
    protected $_tabContainer   = 'product-info';
    protected $_disableWrapper = false;

    protected function _construct()
    {
        $this->setData('cache_tags', array('catalog', 'catalog_product'));
    }

    protected function _beforeRender()
    {
        // use the product from view instead of registry
        if (!$product = $this->getView()->product) {
            return false;
        }

        foreach ($product['properties'] as $property) {
            if ('videoreview' === $property['code']) {
                $this->review = $property['value'];
                break;
            }
        }

        if (empty($this->review)) {
            return false;
        }
    }

    protected function _getCacheKeyParams()
    {
        $productId = null;
        if ($product = $this->getView()->product) {
            $productId = $product['id'];
        }
        return array(
            $productId
        );
    }
}
