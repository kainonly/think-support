<?php
declare (strict_types=1);

namespace think\support\middleware;

use Closure;
use think\Request;
use think\Response;

/**
 * 返回 JSON 中间件
 * Class JsonResponse
 * @package think\support\middleware
 */
class JsonResponse
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        /**
         * @var $response Response
         */
        $response = $next($request);
        $data = $response->getData();
        return (is_array($data) || is_object($data)) ? json($data) : $response;
    }
}