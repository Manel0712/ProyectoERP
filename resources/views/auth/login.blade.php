<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

<script>
    const SUPABASE_URL = 'https://uhaswgfpijyrlpxmaygo.supabase.co/';
    const SUPABASE_ANON_KEY = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InVoYXN3Z2ZwaWp5cmxweG1heWdvIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NDQwMzg2MDQsImV4cCI6MjA1OTYxNDYwNH0.3iPKrdInDNtywOF8yUe0PV0G-Uekxpc0ySjl5c0kCIA';
    const supabase = supabase.createClient(SUPABASE_URL, SUPABASE_ANON_KEY);

    const form = document.getElementById('login-form');
    const message = document.getElementById('message');
    const signupButton = document.getElementById('signup-button');

    form.addEventListener('submit', async (e) => {
      e.preventDefault();

      const email = document.getElementById('email').value;
      const password = document.getElementById('password').value;

      const { data, error } = await supabase.auth.signInWithPassword({
        email,
        password,
      });

      if (error) {
  message.textContent = 'Error: ' + error.message;
  message.style.color = '#f08080';
} else {
  message.textContent = 'Login exitoso. Redirigiendo...';
  message.style.color = '#90ee90';
  localStorage.setItem('access_token', data.session.access_token);
  window.location.href = '/dashboard'; // Redirección al dashboard
}

    });

    signupButton.addEventListener('click', () => {
      window.location.href = '/signup'; // Reemplaza '/signup' con la URL de tu página de registro
    });
  </script>
