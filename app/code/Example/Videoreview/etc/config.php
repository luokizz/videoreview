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

$config = array(
    'Example_Videoreview' => array(
        'package'   => 'Example_Videoreview',
        'name'      => 'Videoreview',
        'version'   => '1.0.0',
        'depends'   => array(
            'Axis_Catalog' => '0.2.3' // we add the attribute to the catalog_product_option table in installer
        ),
        'required'  => 0
    )
);
