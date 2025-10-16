<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * Global HTTP middleware stack.
     * Middleware ini dijalankan di setiap request yang masuk ke aplikasi.
     */
    protected $middleware = [
        // Menangani trust proxy (misal dari nginx)
        \App\Http\Middleware\TrustProxies::class,

        // Menangani CORS (Cross-Origin Resource Sharing)
        \Illuminate\Http\Middleware\HandleCors::class,

        // Menangani pengecualian maintenance
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,

        // Validasi ukuran POST request
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,

        // Trim input dari form agar tidak ada spasi berlebih
        \App\Http\Middleware\TrimStrings::class,

        // Ubah input kosong jadi null
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * Route middleware groups.
     * Middleware ini dikelompokkan untuk route web dan API.
     */
    protected $middlewareGroups = [
        'web' => [
            // Middleware standar web Laravel
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,

            // Middleware session & autentikasi CSRF
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,

            // Middleware untuk routing web
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            // Middleware standar API Laravel
            \Illuminate\Routing\Middleware\ThrottleRequests::class . ':api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * Route middleware.
     * Middleware ini bisa dipanggil secara spesifik pada route tertentu.
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,

        // 🔥 Tambahan custom middleware (bisa kamu pakai nanti)
        'isGuru' => \App\Http\Middleware\IsGuru::class,
        'isSatpam' => \App\Http\Middleware\IsSatpam::class,
        'role.guru' => \App\Http\Middleware\RoleGuru::class,
    ];
}
