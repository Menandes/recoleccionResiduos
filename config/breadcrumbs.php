<?php

return [
    // Mapa: name de la ruta => función que devuelve [[label, url], ...]
    'routes' => [

        // Ajusta si tu página inicial no es 'home'
        'home' => function () {
            return [
                ['Inicio', route('home')],
            ];
        },

        // =========================
        // Recolectores (resource)
        // =========================
        'recolectores.index' => function () {
            return [
                ['Inicio', route('home')],
                ['Recolectores', null],
            ];
        },

        'recolectores.create' => function () {
            return [
                ['Inicio', route('home')],
                ['Recolectores', route('recolectores.index')],
                ['Nuevo', null],
            ];
        },

        'recolectores.show' => function ($recolector) {
            return [
                ['Inicio', route('home')],
                ['Recolectores', route('recolectores.index')],
                [$recolector->nombre ?? 'Detalle', null],
            ];
        },

        'recolectores.edit' => function ($recolector) {
            return [
                ['Inicio', route('home')],
                ['Recolectores', route('recolectores.index')],
                [$recolector->nombre ?? 'Detalle', route('recolectores.show', $recolector)],
                ['Editar', null],
            ];
        },

        // =========================
        // Empresa Recolectora (resource)
        // =========================
        'empresaRecolectora.index' => function () {
            return [
                ['Inicio', route('home')],
                ['Empresas Recolectoras', null],
            ];
        },

        'empresaRecolectora.create' => function () {
            return [
                ['Inicio', route('home')],
                ['Empresas Recolectoras', route('empresaRecolectora.index')],
                ['Nueva', null],
            ];
        },

        'empresaRecolectora.show' => function ($empresa) {
            return [
                ['Inicio', route('home')],
                ['Empresas Recolectoras', route('empresaRecolectora.index')],
                [$empresa->nombre ?? 'Detalle', null],
            ];
        },

        'empresaRecolectora.edit' => function ($empresa) {
            return [
                ['Inicio', route('home')],
                ['Empresas Recolectoras', route('empresaRecolectora.index')],
                [$empresa->nombre ?? 'Detalle', route('empresaRecolectora.show', $empresa)],
                ['Editar', null],
            ];
        },
    ],
];
