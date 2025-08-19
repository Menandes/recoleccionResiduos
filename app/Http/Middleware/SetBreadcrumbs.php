<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\View;

class SetBreadcrumbs
{
    public function handle(Request $request, Closure $next)
    {
        $exclude = [
            'recolectorSolicitud.*',
        ];

        // Si la ruta actual está excluida, no generes breadcrumbs
        if (in_array($request->route()->getName(), $exclude)) {
            View::share('breadcrumbsItems', []);
            return $next($request);
        }

        // Código normal de breadcrumbs...
        $items = [];
        $route = $request->route();
        if ($route) {
            $name = $route->getName();
            $params = $route->parameters();
            $map = config('breadcrumbs.routes', []);

            if (isset($map[$name]) && is_callable($map[$name])) {
                $orderedParams = [];
                foreach ($route->parameterNames() as $p) {
                    $orderedParams[] = Arr::get($params, $p);
                }
                $items = call_user_func_array($map[$name], $orderedParams);
            } else {
                $segments = collect($request->segments());
                if ($segments->isNotEmpty()) {
                    $url = url('/');
                    $items[] = ['Inicio', $url];
                    foreach ($segments as $i => $seg) {
                        $url .= '/' . $seg;
                        $label = ucfirst(str_replace(['-', '_'], ' ', $seg));
                        $items[] = [$label, $i === $segments->count() - 1 ? null : $url];
                    }
                }
            }
        }

        View::share('breadcrumbsItems', $items);

        return $next($request);
    }
}
