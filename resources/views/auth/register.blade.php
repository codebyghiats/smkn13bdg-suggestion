<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Role Selection -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('Role')" />
            <select id="role" name="role" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required onchange="toggleNipField()">
                <option value="">Pilih Role</option>
                <option value="guru" {{ old('role') == 'guru' ? 'selected' : '' }}>Guru</option>
                <option value="satpam" {{ old('role') == 'satpam' ? 'selected' : '' }}>Satpam</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- NIP Field (only for guru) -->
        <div class="mt-4" id="nip-field" style="display: none;">
            <x-input-label for="nip" :value="__('NIP')" />
            <x-text-input id="nip" class="block mt-1 w-full" type="text" name="nip" :value="old('nip')" autocomplete="nip" />
            <x-input-error :messages="$errors->get('nip')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Sudah punya akun?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
    <script>
        function toggleNipField() {
            var role = document.getElementById('role').value;
            var nipField = document.getElementById('nip-field');
            if (role === 'guru') {
                nipField.style.display = 'block';
            }
            else if ('satpam') {
                nipField.style.display = 'block';
            }else {
                nipField.style.display = 'none'
            }
        }
        document.getElementById('role').addEventListener('change', toggleNipField);
        window.addEventListener('DOMContentLoaded', function() {
            toggleNipField();
        });
    </script>

    <!-- Login Link -->
    <div class="mt-6 text-center">
        <p class="text-sm text-gray-600">
            {{ __('Sudah punya akun?') }}
            <a class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150" href="{{ route('login') }}">
                {{ __('Masuk di sini') }}
            </a>
        </p>
    </div>

    <script>
        function toggleNipField() {
            const roleSelect = document.getElementById('role');
            const nipField = document.getElementById('nip-field');
            const nipInput = document.getElementById('nip');
            
            if (roleSelect.value === 'guru') {
                nipField.style.display = 'block';
                nipInput.required = true;
            } else {
                nipField.style.display = 'none';
                nipInput.required = false;
                nipInput.value = '';
            }
        }
        
        // Check on page load if role is already selected
        document.addEventListener('DOMContentLoaded', function() {
            toggleNipField();
        });
    </script>
</x-guest-layout>
