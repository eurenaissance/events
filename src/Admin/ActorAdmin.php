<?php

namespace App\Admin;

use App\Entity\Actor;
use App\Form\Actor\ActorType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\DoctrineORMAdminBundle\Datagrid\ProxyQuery;
use Sonata\DoctrineORMAdminBundle\Filter\CallbackFilter;
use Sonata\DoctrineORMAdminBundle\Filter\DateRangeFilter;
use Sonata\Form\Type\DateRangePickerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

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
                ->add('birthday', null, [
                    'label' => 'Birth date',
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
        $yearsBirthday = ActorType::getBirthdayYears();
        $rangeRegisteredAt = range(2018, (int) date('Y'));
        $yearsRegisteredAt = array_combine($rangeRegisteredAt, $rangeRegisteredAt);

        $datagridMapper
            ->add('animators', CallbackFilter::class, [
                'virtual_field' => true,
                'label' => 'Animators only',
                'show_filter' => true,
                'field_type' => CheckboxType::class,
                'callback' => [$this, 'applyAnimatorsFilter'],
            ])
            ->add('fullName', CallbackFilter::class, [
                'label' => 'Full name',
                'show_filter' => true,
                'advanced_filter' => false,
                'callback' => [$this, 'applyFullNameFilter'],
            ])
            ->add('emailAddress', null, [
                'label' => 'Email address',
                'show_filter' => true,
            ])
            ->add('birthday', DateRangeFilter::class, [
                'label' => 'Birth date',
                'field_type' => DateRangePickerType::class,
                'field_options' => [
                    'field_options_start' => [
                        'datepicker_use_button' => false,
                        'years' => $yearsBirthday,
                    ],
                    'field_options_end' => [
                        'datepicker_use_button' => false,
                        'years' => $yearsBirthday,
                    ],
                ],
            ])
            ->add('registeredAt', DateRangeFilter::class, [
                'label' => 'Registered at',
                'field_type' => DateRangePickerType::class,
                'field_options' => [
                    'field_options_start' => [
                        'datepicker_use_button' => false,
                        'years' => $yearsRegisteredAt,
                    ],
                    'field_options_end' => [
                        'datepicker_use_button' => false,
                        'years' => $yearsRegisteredAt,
                    ],
                ],
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

    public function applyFullNameFilter(ProxyQuery $query, string $alias, string $field, array $value): bool
    {
        if (!$value['value']) {
            return false;
        }

        $canonicalFullName = mb_strtolower($value['value']);
        $qb = $query->getQueryBuilder();

        // AND WHERE CONCAT(LOWER(a.firstName), CONCAT(' ', LOWER(a.lastName))) LIKE '%:canonicalFullName%'
        $qb->andWhere(
            $qb->expr()->like(
                $qb->expr()->lower(
                    $qb->expr()->concat(
                        "$alias.firstName",
                        $qb->expr()->concat(
                            $qb->expr()->literal(' '),
                            "$alias.lastName"
                        )
                    )
                ),
                $qb->expr()->literal("%$canonicalFullName%")
            )
        );

        return true;
    }

    public function applyAnimatorsFilter(ProxyQuery $query, string $alias, string $field, array $value): bool
    {
        if (!$value['value'] || false === $value['value']) {
            return false;
        }

        $query
            ->getQueryBuilder()
            ->innerJoin("$alias.animatedGroups", 'a')
            ->innerJoin("$alias.coAnimatorMemberships", 'cm')
        ;

        return true;
    }
}
