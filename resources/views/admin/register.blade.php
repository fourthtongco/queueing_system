<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Staff — Queue System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

    <style>
        :root {
            --blue:   #004aad;
            --yellow: #ffd047;
        }

        .bg-brand-blue    { background-color: var(--blue); }
        .text-brand-blue  { color: var(--blue); }
        .text-brand-yellow { color: var(--yellow); }

        .circle {
            position: absolute;
            border-radius: 9999px;
            background-color: rgba(255, 208, 71, 0.10);
        }

        input:focus, select:focus {
            outline: none;
            border-color: var(--blue) !important;
            box-shadow: 0 0 0 3px rgba(0, 74, 173, 0.15);
        }

        .btn-primary {
            background-color: var(--blue);
            transition: background-color 0.2s, transform 0.1s;
        }
        .btn-primary:hover  { background-color: #003a8c; }
        .btn-primary:active { transform: scale(0.98); }

        .yellow-underline {
            display: inline-block;
            border-bottom: 3px solid var(--yellow);
            padding-bottom: 2px;
        }

        /* Department field — nakatago by default, lalabas kapag Staff ang role */
        #department-wrapper {
            transition: opacity 0.2s, max-height 0.3s;
            overflow: hidden;
            max-height: 0;
            opacity: 0;
        }
        #department-wrapper.visible {
            max-height: 120px;
            opacity: 1;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-4" style="background-color: #f0f4f8;">

    <div class="w-full max-w-4xl grid grid-cols-1 lg:grid-cols-2 rounded-2xl overflow-hidden shadow-2xl">

        {{-- ===== LEFT PANEL ===== --}}
        <div class="bg-brand-blue p-10 flex-col justify-between text-white hidden lg:flex relative overflow-hidden">

            {{-- Decorative circles --}}
            <div class="circle w-64 h-64 -top-16 -right-16"></div>
            <div class="circle w-40 h-40 bottom-20 -left-10"></div>
            <div class="circle w-24 h-24 bottom-40 right-10"></div>

            <div class="relative z-10">

                {{-- Logo --}}
                <div class="flex items-center gap-3 mb-10">
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
                    Add a new<br>
                    <span class="yellow-underline text-brand-yellow">staff account.</span>
                </h2>

                <p class="text-sm leading-relaxed mb-8" style="color: rgba(255,255,255,0.65);">
                    Create staff accounts for Registrar and
                    Accounting department personnel.
                </p>

                {{-- Role info cards --}}
                <div class="space-y-3">

                    <div class="rounded-xl p-4" style="background-color: rgba(255,255,255,0.08);">
                        <div class="flex items-center gap-2 mb-1">
                            <i class="fa-solid fa-shield-halved text-brand-yellow text-sm"></i>
                            <p class="text-sm font-semibold">Admin</p>
                        </div>
                        <p class="text-xs" style="color: rgba(255,255,255,0.55);">
                            Full system access. Not tied to any specific department.
                        </p>
                    </div>

                    <div class="rounded-xl p-4" style="background-color: rgba(255,255,255,0.08);">
                        <div class="flex items-center gap-2 mb-1">
                            <i class="fa-solid fa-user text-brand-yellow text-sm"></i>
                            <p class="text-sm font-semibold">Staff</p>
                        </div>
                        <p class="text-xs" style="color: rgba(255,255,255,0.55);">
                            Assigned to a department. Can call, serve, and complete tickets.
                        </p>
                    </div>

                </div>

            </div>

            <p class="text-xs relative z-10" style="color: rgba(255,255,255,0.4);">
                © 2026 Our Lady of Perpetual Succor College Marikina
            </p>

        </div>
        {{-- ===== END LEFT PANEL ===== --}}

        {{-- ===== RIGHT PANEL ===== --}}
        <div class="bg-white p-8 lg:p-10 flex flex-col justify-center">

            {{-- Mobile logo --}}
            <div class="flex items-center gap-2 mb-6 lg:hidden">
                <div class="w-8 h-8 rounded-lg flex items-center justify-center" style="background-color: #004aad;">
                    <i class="fa-solid fa-ticket text-white text-sm"></i>
                </div>
                <span class="font-bold text-gray-800">Queue System</span>
            </div>

            {{-- Heading --}}
            <div class="mb-7">
                <h1 class="text-2xl font-bold text-gray-800">Create staff account</h1>
                <p class="text-gray-400 text-sm mt-1">Fill in the details below to register a new user</p>
            </div>

            {{-- Success alert --}}
            @if(session('success'))
            <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-lg mb-5 flex items-start gap-3">
                <i class="fa-solid fa-circle-check text-green-500 mt-0.5 text-sm"></i>
                <p class="text-green-700 text-sm">{{ session('success') }}</p>
            </div>
            @endif

            {{-- Error alert --}}
            @if(session('error'))
            <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-lg mb-5 flex items-start gap-3">
                <i class="fa-solid fa-circle-exclamation text-red-500 mt-0.5 text-sm"></i>
                <p class="text-red-700 text-sm">{{ session('error') }}</p>
            </div>
            @endif

            {{-- FORM --}}
            <form action="{{ route('register.post') }}" method="POST" class="space-y-4">
                @csrf

                {{-- Name --}}
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1.5">
                        Full name
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa-solid fa-user text-gray-300 text-sm"></i>
                        </div>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="e.g. Juan Santos"
                            class="w-full pl-10 pr-4 py-2.5 border border-gray-200 rounded-lg text-sm text-gray-700 placeholder-gray-300 transition @error('name') border-red-400 bg-red-50 @enderror"
                            required
                            autofocus
                        />
                    </div>
                    @error('name')
                        <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                            <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                        </p>
                    @enderror
                </div>

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
                        />
                    </div>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                            <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Role + Department (side by side) --}}
                <div class="grid grid-cols-2 gap-4">

                    {{-- Role --}}
                    <div>
                        <label for="role" class="block text-sm font-medium text-gray-700 mb-1.5">
                            Role
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa-solid fa-shield-halved text-gray-300 text-sm"></i>
                            </div>
                            {{-- 
                                onchange="toggleDepartment(this.value)"
                                → kapag nagbago ang role, titignan kung Staff
                                  para ipakita/itago ang department dropdown
                            --}}
                            <select
                                id="role"
                                name="role"
                                onchange="toggleDepartment(this.value)"
                                class="w-full pl-10 pr-4 py-2.5 border border-gray-200 rounded-lg text-sm text-gray-700 transition appearance-none @error('role') border-red-400 bg-red-50 @enderror"
                                required
                            >
                                <option value="" disabled {{ old('role') ? '' : 'selected' }}>Select role</option>
                                <option value="Admin"  {{ old('role') === 'Admin'  ? 'selected' : '' }}>Admin</option>
                                <option value="Staff"  {{ old('role') === 'Staff'  ? 'selected' : '' }}>Staff</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fa-solid fa-chevron-down text-gray-300 text-xs"></i>
                            </div>
                        </div>
                        @error('role')
                            <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                                <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Department (visible only when role = Staff) --}}
                    <div>
                        <label for="department_id" class="block text-sm font-medium text-gray-700 mb-1.5">
                            Department
                            <span class="text-gray-400 font-normal">(Staff only)</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa-solid fa-building-columns text-gray-300 text-sm"></i>
                            </div>
                            {{-- 
                                $departments → ipapadala ng controller:
                                return view('auth.register', compact('departments'));
                            --}}
                            <select
                                id="department_id"
                                name="department_id"
                                class="w-full pl-10 pr-4 py-2.5 border border-gray-200 rounded-lg text-sm text-gray-700 transition appearance-none @error('department_id') border-red-400 bg-red-50 @enderror"
                            >
                                <option value="">None</option>
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}"
                                        {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                        {{ $department->department_name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fa-solid fa-chevron-down text-gray-300 text-xs"></i>
                            </div>
                        </div>
                        @error('department_id')
                            <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                                <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>

                </div>

                {{-- Password --}}
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1.5">
                        Password
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa-solid fa-lock text-gray-300 text-sm"></i>
                        </div>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Min. 8 characters"
                            class="w-full pl-10 pr-10 py-2.5 border border-gray-200 rounded-lg text-sm text-gray-700 placeholder-gray-300 transition @error('password') border-red-400 bg-red-50 @enderror"
                            required
                        />
                        <button type="button" onclick="togglePass('password', 'eyeIcon1')"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-300 hover:text-gray-500 transition">
                            <i id="eyeIcon1" class="fa-solid fa-eye text-sm"></i>
                        </button>
                    </div>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                            <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1.5">
                        Confirm password
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa-solid fa-lock text-gray-300 text-sm"></i>
                        </div>
                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            placeholder="Re-enter password"
                            class="w-full pl-10 pr-10 py-2.5 border border-gray-200 rounded-lg text-sm text-gray-700 placeholder-gray-300 transition"
                            required
                        />
                        <button type="button" onclick="togglePass('password_confirmation', 'eyeIcon2')"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-300 hover:text-gray-500 transition">
                            <i id="eyeIcon2" class="fa-solid fa-eye text-sm"></i>
                        </button>
                    </div>
                </div>

                {{-- Submit --}}
                <button type="submit" class="btn-primary w-full text-white font-semibold py-2.5 rounded-lg flex items-center justify-center gap-2 mt-1">
                    <i class="fa-solid fa-user-plus"></i>
                    Create account
                </button>

                {{-- Back to login --}}
                <p class="text-center text-xs text-gray-400 pt-1">
                    Already have an account?
                    <a href="{{ route('login') }}"
                       class="font-medium text-brand-blue hover:underline"
                       style="color: #004aad;">
                        Sign in here
                    </a>
                </p>

            </form>
            {{-- END FORM --}}

        </div>
        {{-- ===== END RIGHT PANEL ===== --}}

    </div>

    <script>
        // Show/hide password toggle
        function togglePass(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon  = document.getElementById(iconId);
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }

        // Show department dropdown only when Staff is selected
        // Admin = walang department (nullable ang department_id)
        function toggleDepartment(role) {
            const wrapper = document.getElementById('department-wrapper');
            const select  = document.getElementById('department_id');
            if (role === 'Staff') {
                wrapper.classList.add('visible');
                select.required = true;
            } else {
                wrapper.classList.remove('visible');
                select.required = false;
                select.value = '';
            }
        }

        // On page load — kung may old('role') na Staff, ipakita agad ang department
        document.addEventListener('DOMContentLoaded', function () {
            const role = document.getElementById('role').value;
            if (role === 'Staff') toggleDepartment('Staff');
        });
    </script>

</body>
</html>