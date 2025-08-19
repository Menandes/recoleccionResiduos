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
        $items = [];
        $route = $request->route();

        if ($route) {
            $name = $route->getName();        // ej: recolectores.show
            $params = $route->parameters();   // ej: ['recolector' => Model]

            $map = config('breadcrumbs.routes', []);

            if (isset($map[$name]) && is_callable($map[$name])) {
                // Mantener el orden de parámetros definido en la ruta
                $orderedParams = [];
                foreach ($route->parameterNames() as $p) {
                    $orderedParams[] = Arr::get($params, $p);
                }
                $items = call_user_func_array($map[$name], $orderedParams);
            } else {
                // Fallback por segmentos (si olvidaste mapear una ruta)
                $segments = collect($request->segments());
                if ($segments->isNotEmpty()) {
                    $url = url('/');
                    $items[] = ['Inicio', $url];
                    foreach ($segments as $i => $seg) {
                        $url .= '/'.$seg;
                        $label = ucfirst(str_replace(['-', '_'], ' ', $seg));
                        $items[] = [$label, $i === $segments->count()-1 ? null : $url];
                    }
                }
            }
        }

        // Compartimos con todas las vistas
        View::share('breadcrumbsItems', $items);

        return $next($request);
    }
}
