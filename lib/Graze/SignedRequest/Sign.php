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
 * Sign request parameters in accordance to the API guidelines
 * using your shared secret.
 *
 * @param string $secret
 * @param array $parameters
 * @return string
 */
function sign($secret, array $parameters)
{
    ksort($parameters);

    return sha1($secret . ':' . http_build_query($parameters));
}
