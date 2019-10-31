<?php

declare (strict_types=1);

namespace think\support\middleware;

use think\facade\Config;
use think\facade\Console;
use think\Request;

/**
 * 跨域设置中间件
 * Class Cors
 * @package think\support\middleware
 */
class Cors
{
    public function handle(Request $request, \Closure $next)
    {
        $options = Config::get('cors');
        $validate = validate([
            'allow_origin' => 'array',
            'allow_credentials' => 'bool',
            'expose_headers' => 'array',
            'allow_headers' => 'array',
            'max_age' => 'integer'
        ], $options);

        if ($validate->check($options)) {
            return json([
                'error' => 1,
                'msg' => 'Cors setting parameter is incorrect'
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

        if (!empty($options['allow_credentials'])) {
            header('Access-Control-Allow-Credentials:' . (string)$options['allow_credentials']);
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
