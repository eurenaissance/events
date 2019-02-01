<?php

namespace App\Entity\Group;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="follower_memberships", uniqueConstraints={
 *     @ORM\UniqueConstraint(name="follower_memberships_group_actor_unique", columns={"group_id", "actor_id"}),
 * })
 * @ORM\Entity(repositoryClass="App\Repository\Group\FollowerMembershipRepository")
 *
 * @ORM\AssociationOverrides({
 *      @ORM\AssociationOverride(name="actor", inversedBy="followerMemberships"),
 *      @ORM\AssociationOverride(name="group", inversedBy="followerMemberships"),
 * })
 */
class FollowerMembership extends AbstractMembership
{
}
