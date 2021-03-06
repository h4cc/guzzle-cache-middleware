<?php

namespace Kevinrob\GuzzleCache;


use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

interface CacheStorageInterface
{

    /**
     * Return a CacheEntry or null if no cache.
     *
     * @param RequestInterface $request
     * @return CacheEntry|null
     */
    function fetch(RequestInterface $request);

    /**
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @return bool true if success
     */
    function cache(RequestInterface $request, ResponseInterface $response);

}
