<?php

/**
 * @package Module Tdmenu for Joomla! 5.x
 * @version $Id: mod_Tdmenu.php 1.2.1 2025-01-01 23:26:33Z $
 * @author KWProductions Co.
 * @copyright (C) 2025- KWProductions Co.
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 
 This file is part of Tdmenu.
    Tdmenu is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.
    Tdmenu is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    You should have received a copy of the GNU General Public License
    along with Tdmenu.  If not, see <http://www.gnu.org/licenses/>. 
**/ 

namespace Joomla\Module\Tdmenu\Site\Dispatcher;

use Joomla\CMS\Dispatcher\AbstractModuleDispatcher;
use Joomla\CMS\HTML\HTMLHelper;

\defined('_JEXEC') or die;

// phpcs:disable PSR1.Files.SideEffects
// phpcs:enable PSR1.Files.SideEffects

class Dispatcher extends AbstractModuleDispatcher
{
   
    protected function getLayoutData()
    {
        $data = parent::getLayoutData();

      //  if (($data['params'])->get('prepare_content', 1)) {
            ($data['module'])->content = HTMLHelper::_('content.prepare', ($data['module'])->content, '', 'mod_tdmenu.content');
      //  }

        return $data;
    }
}
