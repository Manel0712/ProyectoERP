<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

<script>
const SUPABASE_URL = 'https://uhaswgfpijyrlpxmaygo.supabase.co/';
const SUPABASE_ANON_KEY = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InVoYXN3Z2ZwaWp5cmxweG1heWdvIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NDQwMzg2MDQsImV4cCI6MjA1OTYxNDYwNH0.3iPKrdInDNtywOF8yUe0PV0G-Uekxpc0ySjl5c0kCIA'; // Truncado por seguridad

// Crear cliente de Supabase con la ANON_KEY (clave pública)
const supabaseClient = supabase.createClient(SUPABASE_URL, SUPABASE_ANON_KEY);

const form = document.getElementById('signup-form');
const message = document.getElementById('message');

form.addEventListener('submit', async (e) => {
    e.preventDefault();

    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm-password').value;

    // Validación de contraseñas
    if (password !== confirmPassword) {
        message.textContent = 'Las contraseñas no coinciden.';
        message.style.color = 'red';
        return;
    }

    // Registrar usuario en Supabase
    const { data, error } = await supabaseClient.auth.signUp({
        email,
        password,
    });

    if (error) {
        message.textContent = 'Error: ' + error.message;
        message.style.color = 'red';
    } else {
        // Si el registro en Supabase fue exitoso, registrar también en Laravel
        fetch('/register-supabase', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ email, password })
        })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                message.textContent = 'Cuenta creada correctamente en ambos sistemas. Por favor, revisa tu correo para confirmar tu cuenta.';
                message.style.color = 'lightgreen';
                form.reset();
            } else {
                message.textContent = 'Error al registrar en Laravel: ' + (result.message || 'Error desconocido');
                message.style.color = 'red';
            }
        })
        .catch(err => {
            message.textContent = 'Error al registrar en Laravel: ' + err.message;
            message.style.color = 'red';
        });
    }
});
</script>
