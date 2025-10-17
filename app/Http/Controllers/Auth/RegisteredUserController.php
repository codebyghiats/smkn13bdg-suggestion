<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\LoginActivity;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        Log::info('Register: incoming request', [
            'email' => $request->input('email'),
            'role' => $request->input('role'),
        ]);
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'role' => ['required', 'in:guru,satpam'],
            // Only validate NIP when role is guru; ignore otherwise
            'nip' => ['exclude_unless:role,guru', 'required', 'string', 'max:20', 'unique:users,nip'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if ($validator->fails()) {
            Log::warning('Register: validation failed', [
                'errors' => $validator->errors()->toArray(),
            ]);
            return back()->withErrors($validator)->withInput();
        }

        Log::info('Register: validation passed', [
            'email' => $request->input('email'),
            'role' => $request->input('role'),
        ]);

        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ];

        // Only add NIP if role is guru
        if ($request->role === 'guru') {
            $userData['nip'] = $request->nip;
        }

        $user = User::create($userData);
        Log::info('Register: user created', ['user_id' => $user->id]);

        event(new Registered($user));

        Auth::login($user);
        Log::info('Register: user logged in', ['user_id' => $user->id]);

        // Simpan informasi register activity
        LoginActivity::create([
            'user_id' => $user->id,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'action' => 'register',
            'login_at' => now(),
        ]);

		// Selalu arahkan ke dashboard setelah registrasi
        Log::info('Register: redirecting to /dashboard', ['user_id' => $user->id]);
        return redirect('/dashboard');
    }
}
