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
         * @var Response $response
         */
        $response = $next($request);
        $data = $response->getData();
        if (is_array($data) || is_object($data)) {
            return json($data);
        }
        return $response;
    }
}