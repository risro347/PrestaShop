<?php
/**
 * 2007-2018 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/OSL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2018 PrestaShop SA
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */

namespace PrestaShop\PrestaShop\Core\Grid\Factory\GridDefinition;

use PrestaShop\PrestaShop\Core\Grid\Action\Column;
use PrestaShop\PrestaShop\Core\Grid\Definition\Definition;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Translation\TranslatorInterface;

/**
 * Class LogGridDefinitionFactory is responsible for creating new instance of Log grid definition
 */
final class LogGridDefinitionFactory implements GridDefinitionFactoryInterface
{
    /**
     * @var TranslatorInterface
     */
    private $translator;

    /**
     * @param TranslatorInterface $translator
     */
    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    /**
     * {@inheritdoc}
     */
    public function createNew()
    {
        $definition = new Definition(
            'logs_table',
            $this->translator->trans('Logs', [], 'Admin.Advparameters.Feature'),
            'id_log',
            'desc'
        );

        $this->addDefaultColumns($definition);

        return $definition;
    }

    /**
     * Add default columns to grid definition
     *
     * @param Definition $definition
     */
    private function addDefaultColumns(Definition $definition)
    {
        $columns = [
            (new Column('id_log', $this->translator->trans('ID', [], 'Admin.Global')))
                ->setFilterFormType(TextType::class),
            (new Column('id_employee', $this->translator->trans('Employee', [], 'Admin.Global')))
                ->setFilterFormType(TextType::class),
            (new Column('severity', $this->translator->trans('Severity (1-4)', [], 'Admin.Advparameters.Feature')))
                ->setFilterFormType(TextType::class),
            (new Column('message', $this->translator->trans('Message', [], 'Admin.Global')))
                ->setFilterFormType(TextType::class),
            (new Column('object_type', $this->translator->trans('Object type', [], 'Admin.Advparameters.Feature')))
                ->setFilterFormType(TextType::class),
            (new Column('object_id', $this->translator->trans('Object ID', [], 'Admin.Advparameters.Feature')))
                ->setFilterFormType(TextType::class),
            (new Column('error_code', $this->translator->trans('Error code', [], 'Admin.Advparameters.Feature')))
                ->setFilterFormType(TextType::class),
            (new Column('date_add', $this->translator->trans('Date', [], 'Admin.Global')))
                ->setFilterFormType(TextType::class),
        ];

        foreach ($columns as $column) {
            $definition->addColumn($column);
        }
    }
}
