<?php
/*
 * This file is part of Graze Signed Request
 *
 * Copyright (c) 2013 Nature Delivered Ltd. <http://graze.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see  http://github.com/graze/SignedRequest/blob/master/LICENSE
 * @link http://github.com/graze/SignedRequest
 */
namespace Graze\SignedRequest;

/**
 * Validate a given hash against the request parameters
 * and the shared secret.
 *
 * @param string $secret
 * @param array $parameters
 * @param string $key
 * @return boolean
 */
function validate($secret, array $parameters, $key = 'signature')
{
    if (!isset($parameters[$key])) {
        throw new \OutOfRangeException('No signature found in parameters.');
    }

    $sig = $parameters[$key];
    unset($parameters[$key]);

    return sign($secret, $parameters) === $sig;
}
