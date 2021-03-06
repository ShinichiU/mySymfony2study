<?php

namespace Symfony\Component\Security\Acl\Model;

use Symfony\Component\Security\Authentication\Token\TokenInterface;

/**
 * Interface for retrieving security identities from tokens
 *
 * @author Johannes M. Schmitt <schmittjoh@gmail.com>
 */
interface SecurityIdentityRetrievalStrategyInterface
{
    /**
     * Retrieves the available security identities for the given token
     *
     * The order in which the security identities are returned is significant.
     * Typically, security identities should be ordered from most specific to
     * least specific.
     *
     * @param TokenInterface $token
     * @return array of SecurityIdentityInterface implementations
     */
    function getSecurityIdentities(TokenInterface $token);
}