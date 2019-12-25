<?php
declare (strict_types=1);

namespace think\support\middleware;

use Closure;
use think\Request;
use think\Response;

/**
 * 仅允许 POST 请求
 * Class FilterPostRequest
 * @package think\support\middleware
 */
class FilterPostRequest
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->isOptions()) {
            return json([], 200);
        }

        return $request->isPost() ? $next($request) : json([
            'error' => 1,
            'msg' => 'this method is not supported'
        ]);
    }
}
