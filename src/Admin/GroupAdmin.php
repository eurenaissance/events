<?php

namespace App\Admin;

use App\Entity\Group;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\DoctrineORMAdminBundle\Filter\DateRangeFilter;
use Sonata\Form\Type\DateRangeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class GroupAdmin extends AbstractAdmin
{
    /**
     * @param Group|null $object
     */
    public function configureActionButtons($action, $object = null)
    {
        $list = parent::configureActionButtons($action, $object);

        if ($object) {
            if (!$object->isApproved()) {
                $list['approve'] = ['template' => 'admin/group/_action_approve.html.twig'];
            }

            if (!$object->isRefused()) {
                $list['refuse'] = ['template' => 'admin/group/_action_refuse.html.twig'];
            }
        }

        return $list;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', TextType::class, [
                'label' => 'Name',
            ])
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $range = range(2018, (int) date('Y'));
        $years = array_combine($range, $range);

        $datagridMapper
            ->add('name', null, [
                'label' => 'Name',
                'show_filter' => true,
            ])
            ->add('createdAt', DateRangeFilter::class, [
                'label' => 'Created at',
                'field_type' => DateRangeType::class,
                'field_options' => [
                    'field_options_start' => ['years' => $years],
                    'field_options_end' => ['years' => $years],
                ],
            ])
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name', null, [
                'label' => 'Name',
            ])
            ->add('city', null, [
                'label' => 'City',
            ])
            ->add('animator', null, [
                'label' => 'Animator',
            ])
            ->add('createdAt', null, [
                'label' => 'Created at',
            ])
            ->add('status', null, [
                'label' => 'Status',
                'template' => 'admin/group/_list_status.html.twig',
            ])
        ;
    }
}
