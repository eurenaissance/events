<?php

namespace App\Admin;

use App\Entity\Actor;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\DoctrineORMAdminBundle\Datagrid\ProxyQuery;
use Sonata\DoctrineORMAdminBundle\Filter\CallbackFilter;

class ActorAdmin extends AbstractAdmin
{
    public function configureActionButtons($action, $object = null)
    {
        $list = parent::configureActionButtons($action, $object);

        if (!$object instanceof Actor) {
            return $list;
        }

        if ($this->isGranted('ROLE_ALLOWED_TO_SWITCH')) {
            $list['switch_user'] = ['template' => 'admin/actor/_action_switch_user.html.twig'];
        }

        return $list;
    }

    protected function configureShowFields(ShowMapper $show)
    {
        $show
            ->with('General informations', ['class' => 'col-md-8'])
                ->add('emailAddress', null, [
                    'label' => 'Email address',
                ])
                ->add('firstName', null, [
                    'label' => 'First name',
                ])
                ->add('lastName', null, [
                    'label' => 'Last name',
                ])
                ->add('gender', 'choice', [
                    'catalogue' => 'messages',
                    'choices' => $this->getGenders(),
                ])
                ->add('address', null, [
                    'template' => 'admin/address/_show.html.twig',
                ])
            ->end()
            ->with('System informations', ['class' => 'col-md-4'])
                ->add('registeredAt', null, [
                    'label' => 'Registered at',
                ])
                ->add('confirmedAt', null, [
                    'label' => 'Confirmed at',
                ])
            ->end()
            ->with('Animated groups')
                ->add('animatedGroups', null, [
                    'template' => 'admin/actor/_show_animated_groups.html.twig',
                ])
            ->end()
            ->with('Group memberships')
                ->add('memberships', null, [
                    'virtual_field' => true,
                    'template' => 'admin/actor/_show_memberships.html.twig',
                ])
            ->end()
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('emailAddress', null, [
                'label' => 'Email address',
                'show_filter' => true,
            ])
            ->add('fullName', CallbackFilter::class, [
                'label' => 'Full name',
                'show_filter' => true,
                'advanced_filter' => false,
                'callback' => [$this, 'applyFullNameFilter'],
            ])
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('emailAddress', null, [
                'label' => 'Email address',
            ])
            ->add('firstName', null, [
                'label' => 'First name',
            ])
            ->add('lastName', null, [
                'label' => 'Last name',
            ])
            ->add('address', null, [
                'label' => 'Address',
                'sortable' => false,
                'template' => 'admin/address/_list.html.twig',
            ])
            ->add('registeredAt', null, [
                'label' => 'Registered at',
            ])
            ->add('isConfirmed', 'boolean', [
                'label' => 'Is confirmed',
            ])
            ->add('_action', null, [
                'virtual_field' => true,
                'actions' => [
                    'switch_user' => [
                        'template' => 'admin/actor/_list_switch_user.html.twig',
                    ],
                    'show' => [],
                ],
            ])
        ;
    }

    private function getGenders(): array
    {
        $genders = [];
        foreach (Actor::GENDERS as $gender) {
            $genders[$gender] = "common.gender.$gender";
        }

        return $genders;
    }

    /**
     * @param ProxyQuery|\Doctrine\ORM\QueryBuilder $queryBuilder
     */
    public function applyFullNameFilter(ProxyQuery $queryBuilder, string $alias, string $field, array $value): bool
    {
        if (!$value['value']) {
            return false;
        }

        $canonicalFullName = mb_strtolower($value['value']);

        // AND WHERE CONCAT(LOWER(a.firstName), CONCAT(' ', LOWER(a.lastName))) LIKE '%:canonicalFullName%'
        $queryBuilder->andWhere(
            $queryBuilder->expr()->like(
                $queryBuilder->expr()->concat(
                    $queryBuilder->expr()->lower("$alias.firstName"),
                    $queryBuilder->expr()->concat(
                        $queryBuilder->expr()->literal(' '),
                        $queryBuilder->expr()->lower("$alias.lastName")
                    )
                ),
                $queryBuilder->expr()->literal("%$canonicalFullName%")
            )
        );

        return true;
    }
}
