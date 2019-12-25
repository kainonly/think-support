<?php
declare (strict_types=1);

namespace think\support\middleware;

use Closure;
use think\Request;
use think\facade\Config;
use think\Response;

/**
 * 跨域设置中间件
 * Class Cors
 * @package think\support\middleware
 */
class Cors
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $options = Config::get('cors');
        $validate = validate([
            'allow_origin' => 'array',
            'allow_credentials' => 'bool',
            'expose_headers' => 'array',
            'allow_headers' => 'array',
            'max_age' => 'integer'
        ]);

        if (!$validate->check($options)) {
            return json([
                'error' => 1,
                'msg' => $validate->getError()
            ]);
        }

        if (!empty($options['allow_origin'])) {
            if (in_array('*', $options['allow_origin'])) {
                header('Access-Control-Allow-Origin:*');
            }
            if (in_array($request->header('origin'), $options['allow_origin'])) {
                header('Access-Control-Allow-Origin:' .
                    $request->header('origin')
                );
            }
        }

        if (!empty($options['allow_credentials']) && $options['allow_credentials'] == true) {
            header('Access-Control-Allow-Credentials:true');
        }

        if (!empty($options['expose_headers'])) {
            header('Access-Control-Expose-Headers:' .
                implode(',', $options['expose_headers'])
            );
        }

        if (!empty($options['allow_headers'])) {
            header('Access-Control-Allow-Headers:' .
                implode(',', $options['allow_headers'])
            );
        }

        if (!empty($options['allow_headers'])) {
            header('Access-Control-Allow-Headers:' .
                implode(',', $options['allow_headers'])
            );
        }

        if (!empty($options['max_age'])) {
            header('Access-Control-Max-Age:' . $options['max_age']);
        }

        return $next($request);
    }
}
