<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Queue System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

    <style>
        /* Custom color variables para sa dalawang brand colors */
        :root {
            --blue:   #004aad;
            --yellow: #ffd047;
        }

        /* Left panel background */
        .bg-brand-blue   { background-color: var(--blue); }
        .text-brand-blue { color: var(--blue); }
        .bg-brand-yellow { background-color: var(--yellow); }
        .text-brand-yellow { color: var(--yellow); }
        .border-brand-yellow { border-color: var(--yellow); }

        /* Decorative circles sa left panel */
        .circle {
            position: absolute;
            border-radius: 9999px;
            background-color: rgba(255, 208, 71, 0.10);
        }

        /* Focus ring ng inputs — override sa blue natin */
        input:focus {
            outline: none;
            border-color: var(--blue) !important;
            box-shadow: 0 0 0 3px rgba(0, 74, 173, 0.15);
        }

        /* Submit button hover */
        .btn-primary {
            background-color: var(--blue);
            transition: background-color 0.2s, transform 0.1s;
        }
        .btn-primary:hover {
            background-color: #003a8c;
        }
        .btn-primary:active {
            transform: scale(0.98);
        }

        /* Yellow accent underline ng heading */
        .yellow-underline {
            display: inline-block;
            border-bottom: 3px solid var(--yellow);
            padding-bottom: 2px;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-4" style="background-color: #f0f4f8;">

    {{-- ===================== CARD WRAPPER ===================== --}}
    <div class="w-full max-w-4xl grid grid-cols-1 lg:grid-cols-2 rounded-2xl overflow-hidden shadow-2xl">

        {{-- ===== LEFT PANEL ===== --}}
        <div class="bg-brand-blue p-10 flex flex-col justify-between text-white hidden lg:flex relative overflow-hidden">

            {{-- Decorative background circles --}}
            <div class="circle w-64 h-64 -top-16 -right-16"></div>
            <div class="circle w-40 h-40 bottom-20 -left-10"></div>
            <div class="circle w-24 h-24 bottom-40 right-10"></div>

            {{-- Top content --}}
            <div class="relative z-10">

                {{-- Logo --}}
                <div class="flex items-center gap-3 mb-10">
                    {{-- Yellow icon box --}}
                    <div class="w-11 h-11 rounded-xl flex items-center justify-center" style="background-color: #ffd047;">
                        <i class="fa-solid fa-ticket text-lg" style="color: #004aad;"></i>
                    </div>
                    <div>
                        <p class="font-bold text-base leading-tight">Queue System</p>
                        <p class="text-xs" style="color: rgba(255,255,255,0.6);">OLPSC Marikina</p>
                    </div>
                </div>

                {{-- Headline --}}
                <h2 class="text-3xl font-bold leading-snug mb-4">
                    Manage your<br>
                    <span class="yellow-underline text-brand-yellow">queue smarter.</span>
                </h2>

                <p class="text-sm leading-relaxed" style="color: rgba(255,255,255,0.65);">
                    Digital queueing system for the<br>
                    Registrar and Accounting departments.
                </p>

                {{-- Feature highlights --}}
                <div class="mt-8 space-y-3">
                    <div class="flex items-center gap-3">
                        <div class="w-7 h-7 rounded-full flex items-center justify-center flex-shrink-0" style="background-color: rgba(255,208,71,0.2);">
                            <i class="fa-solid fa-check text-xs text-brand-yellow"></i>
                        </div>
                        <p class="text-sm" style="color: rgba(255,255,255,0.75);">Self-service kiosk for students</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-7 h-7 rounded-full flex items-center justify-center flex-shrink-0" style="background-color: rgba(255,208,71,0.2);">
                            <i class="fa-solid fa-check text-xs text-brand-yellow"></i>
                        </div>
                        <p class="text-sm" style="color: rgba(255,255,255,0.75);">Real-time "Now Serving" display</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-7 h-7 rounded-full flex items-center justify-center flex-shrink-0" style="background-color: rgba(255,208,71,0.2);">
                            <i class="fa-solid fa-check text-xs text-brand-yellow"></i>
                        </div>
                        <p class="text-sm" style="color: rgba(255,255,255,0.75);">Staff dashboard with queue logs</p>
                    </div>
                </div>

            </div>

            {{-- Bottom --}}
            <p class="text-xs relative z-10" style="color: rgba(255,255,255,0.4);">
                © 2026 Our Lady of Perpetual Succor College Marikina
            </p>

        </div>
        {{-- ===== END LEFT PANEL ===== --}}

        {{-- ===== RIGHT PANEL (form) ===== --}}
        <div class="bg-white p-8 lg:p-10 flex flex-col justify-center">

            {{-- Mobile logo (hidden sa desktop) --}}
            <div class="flex items-center gap-2 mb-6 lg:hidden">
                <div class="w-8 h-8 rounded-lg flex items-center justify-center" style="background-color: #004aad;">
                    <i class="fa-solid fa-ticket text-white text-sm"></i>
                </div>
                <span class="font-bold text-gray-800">Queue System</span>
            </div>

            {{-- Heading --}}
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-800">Welcome back! 👋</h1>
                <p class="text-gray-400 text-sm mt-1">Sign in to your staff account to continue</p>
            </div>

            {{-- Error alert --}}
            @if(session('error'))
            <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-lg mb-6 flex items-start gap-3">
                <i class="fa-solid fa-circle-exclamation text-red-500 mt-0.5 text-sm"></i>
                <p class="text-red-700 text-sm">{{ session('error') }}</p>
            </div>
            @endif

            {{-- FORM --}}
            <form action="{{ route('login') }}" method="POST" class="space-y-5">
                @csrf

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">
                        Email address
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa-solid fa-envelope text-gray-300 text-sm"></i>
                        </div>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="you@olpsc.edu.ph"
                            class="w-full pl-10 pr-4 py-2.5 border border-gray-200 rounded-lg text-sm text-gray-700 placeholder-gray-300 transition @error('email') border-red-400 bg-red-50 @enderror"
                            required
                            autofocus
                        />
                    </div>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1.5 flex items-center gap-1">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label for="password" class="block text-sm font-medium text-gray-700">
                            Password
                        </label>
                        <a href="{{ route('password.request') }}"
                           class="text-xs font-medium transition"
                           style="color: #004aad;"
                           onmouseover="this.style.color='#003a8c'"
                           onmouseout="this.style.color='#004aad'">
                            Forgot password?
                        </a>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa-solid fa-lock text-gray-300 text-sm"></i>
                        </div>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="••••••••"
                            class="w-full pl-10 pr-10 py-2.5 border border-gray-200 rounded-lg text-sm text-gray-700 placeholder-gray-300 transition @error('password') border-red-400 bg-red-50 @enderror"
                            required
                        />
                        <button
                            type="button"
                            onclick="togglePassword()"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-300 hover:text-gray-500 transition"
                        >
                            <i id="eyeIcon" class="fa-solid fa-eye text-sm"></i>
                        </button>
                    </div>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1.5 flex items-center gap-1">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Remember me --}}
                <div class="flex items-center gap-2">
                    <input
                        type="checkbox"
                        id="remember"
                        name="remember"
                        class="w-4 h-4 rounded border-gray-300"
                        style="accent-color: #004aad;"
                    />
                    <label for="remember" class="text-sm text-gray-500 select-none cursor-pointer">
                        Remember me for 30 days
                    </label>
                </div>

                {{-- Submit --}}
                <button type="submit" class="btn-primary w-full text-white font-semibold py-2.5 rounded-lg flex items-center justify-center gap-2 mt-1">
                    <i class="fa-solid fa-right-to-bracket"></i>
                    Sign in
                </button>

                {{-- Yellow accent divider --}}
                <div class="flex items-center gap-3 my-1">
                    <div class="flex-1 h-px bg-gray-100"></div>
                    <span class="text-xs text-gray-300">Staff access only</span>
                    <div class="flex-1 h-px bg-gray-100"></div>
                </div>

                {{-- Info note --}}
                <p class="text-center text-xs text-gray-400">
                    <i class="fa-solid fa-shield-halved mr-1" style="color: #ffd047;"></i>
                    Having trouble? Contact your system administrator.
                </p>

            </form>
            {{-- END FORM --}}

        </div>
        {{-- ===== END RIGHT PANEL ===== --}}

    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const icon  = document.getElementById('eyeIcon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }
    </script>

</body>
</html> 