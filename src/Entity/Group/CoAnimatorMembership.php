<?php

namespace App\Entity\Group;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="co_animator_memberships", uniqueConstraints={
 *     @ORM\UniqueConstraint(name="co_animator_memberships_group_actor_unique", columns={"group_id", "actor_id"}),
 * })
 * @ORM\Entity(repositoryClass="App\Repository\Group\CoAnimatorMembershipRepository")
 *
 * @ORM\AssociationOverrides({
 *      @ORM\AssociationOverride(name="actor", inversedBy="coAnimatorMemberships"),
 *      @ORM\AssociationOverride(name="group", inversedBy="coAnimatorMemberships"),
 * })
 */
class CoAnimatorMembership extends AbstractMembership
{
}
