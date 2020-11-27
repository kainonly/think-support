<?php
declare (strict_types=1);

namespace think\support\middleware;

use Closure;
use think\Config;
use think\Request;
use think\Response;

/**
 * 跨域设置中间件
 * Class Cors
 * @package think\support\middleware
 */
class Cors
{
    /**
     * @var array|null
     */
    private ?array $option;

    /**
     * Cors constructor.
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->option = $config->get('cors');
    }

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
        $header = [];
        if (!empty($this->option['allow_origin']) && is_array($this->option['allow_origin'])) {
            if (in_array('*', $this->option['allow_origin'], true)) {
                $header['Access-Control-Allow-Origin'] = '*';
            }
            if (in_array($request->header('origin'), $this->option['allow_origin'], true)) {
                $header['Access-Control-Allow-Origin'] = $request->header('origin');
            }
        }
        if (!empty($this->option['allow_credentials']) && $this->option['allow_credentials'] === true) {
            $header['Access-Control-Allow-Credentials'] = 'true';
        }
        if (!empty($this->option['expose_headers']) && is_array($this->option['expose_headers'])) {
            $header['Access-Control-Expose-Headers'] = implode(',', $this->option['expose_headers']);
        }
        if (!empty($this->option['allow_headers']) && is_array($this->option['allow_headers'])) {
            $header['Access-Control-Allow-Headers'] = implode(',', $this->option['allow_headers']);
        }
        if (!empty($this->option['max_age']) && is_int($this->option['max_age'])) {
            $header['Access-Control-Max-Age'] = $this->option['max_age'];
        }
        return $response->header($header);
    }
}
