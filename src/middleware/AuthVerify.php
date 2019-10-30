<?php

declare (strict_types=1);

namespace think\support\middleware;

use think\Request;

/**
 * 授权认证验证中间件
 * Class JsonResponse
 * @package think\bit\middleware
 */
abstract class AuthVerify
{
    /**
     * 场景
     * @var string
     */
    protected $scene;

    /**
     * @param Request $request
     * @param \Closure $next
     * @return mixed|\think\response\Json
     */
    public function handle(Request $request, \Closure $next)
    {
    }
}