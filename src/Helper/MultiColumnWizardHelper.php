<?php

/**
 * This file is part of menatwork/contao-multicolumnwizard-bundle.
 *
 * (c) 2012-2019 MEN AT WORK.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This project is provided in good faith and hope to be usable by anyone.
 *
 * @package    menatwork/contao-multicolumnwizard-bundle
 * @author     Alexander Menk <alex.menk@gmail.com>
 * @author     Andreas Isaak <info@andreas-isaak.de>
 * @author     Andreas Schempp <andreas.schempp@terminal42.ch>
 * @author     Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @author     David Maack <david.maack@arcor.de>
 * @author     Dominik Tomasi <d.tomasi@upcom.ch>
 * @author     fritzmg <email@spikx.net>
 * @author     Ingolf Steinhardt <info@e-spin.de>
 * @author     Martin Auswöger <martin@auswoeger.com>
 * @author     Stefan Heimes <stefan_heimes@hotmail.com>
 * @author     Sven Baumann <baumann.sv@gmail.com>
 * @author     Sven Meierhans <s.meierhans@gmail.com>
 * @author     Tristan Lins <tristan.lins@bit3.de>
 * @copyright  2011 Andreas Schempp
 * @copyright  2011 certo web & design GmbH
 * @copyright  2013-2019 MEN AT WORK
 * @license    https://github.com/menatwork/contao-multicolumnwizard-bundle/blob/master/LICENSE LGPL-3.0-or-later
 * @filesource
 */

namespace MenAtWork\MultiColumnWizardBundle\Helper;

use Contao\DataContainer;

/**
 * Class MultiColumnWizardHelper
 */
class MultiColumnWizardHelper extends \Contao\System
{
    /**
     * Just here to make the constructor public.
     */
    // @codingStandardsIgnoreStart - not useless, we change the visibility.
    public function __construct()
    {
        parent::__construct();
    }
    // @codingStandardsIgnoreEnd

    /**
     * Generates a filePicker icon.
     *
     * @param DataContainer $container The data container.
     *
     * @return string
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     * @SuppressWarnings(PHPMD.CamelCaseVariableName)
     */
    public function mcwFilePicker(DataContainer $container)
    {
        return ' <a href="contao/file.php?do=' . \Input::get('do') . '&amp;table=' . $container->table . '&amp;field='
               . preg_replace('/_row[0-9]*_/i', '__', $container->field) . '&amp;value=' . $container->value . '" title="'
               . specialchars(str_replace("'", "\\'", $GLOBALS['TL_LANG']['MSC']['filepicker']))
               . '" onclick="Backend.getScrollOffset();Backend.openModalSelector({\'width\':765,\'title\':\''
               . specialchars($GLOBALS['TL_LANG']['MOD']['files'][0]) . '\',\'url\':this.href,\'id\':\'' . $container->field
               . '\',\'tag\':\'ctrl_' . $container->field
               . ((\Input::get('act') == 'editAll') ? '_' . $container->id : '')
               . '\',\'self\':this});return false">'
               . \Image::getHtml(
                   'pickfile.gif',
                   $GLOBALS['TL_LANG']['MSC']['filepicker'],
                   'style="vertical-align:top;cursor:pointer"'
               )
               . '</a>';
    }
}
