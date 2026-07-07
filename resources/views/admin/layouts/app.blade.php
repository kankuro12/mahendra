<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('title', 'Admin - Mahendra Secondary School')</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/admin.css') }}">
    @stack('styles')
</head>
<body class="bg-gray-50 font-['Inter']">
    <div class="flex h-screen overflow-hidden">
        <aside id="sidebar" class="w-64 bg-[#b1002c] text-white flex-shrink-0 overflow-y-auto transition-all duration-300 max-lg:-translate-x-full max-lg:fixed max-lg:z-50 max-lg:h-full">
            <div class="p-4 border-b border-white/20">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2">
                    <span class="text-xl font-bold">Mahendra MS</span>
                    <span class="text-xs bg-white/20 px-2 py-0.5 rounded">Admin</span>
                </a>
            </div>
            <nav class="p-3 space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-white/10 transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-white/15' : '' }}">
                    <span class="material-symbols-outlined text-[20px]">dashboard</span>
                    <span class="text-sm font-medium">Dashboard</span>
                </a>
                <a href="{{ route('admin.notices.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-white/10 transition-colors {{ request()->routeIs('admin.notices.*') ? 'bg-white/15' : '' }}">
                    <span class="material-symbols-outlined text-[20px]">campaign</span>
                    <span class="text-sm font-medium">Notices</span>
                </a>
                <a href="{{ route('admin.facilities.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-white/10 transition-colors {{ request()->routeIs('admin.facilities.*') ? 'bg-white/15' : '' }}">
                    <span class="material-symbols-outlined text-[20px]">business</span>
                    <span class="text-sm font-medium">Facilities</span>
                </a>
                <a href="{{ route('admin.albums.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-white/10 transition-colors {{ request()->routeIs('admin.albums.*') ? 'bg-white/15' : '' }}">
                    <span class="material-symbols-outlined text-[20px]">photo_album</span>
                    <span class="text-sm font-medium">Gallery</span>
                </a>
                <a href="{{ route('admin.messages.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-white/10 transition-colors {{ request()->routeIs('admin.messages.*') ? 'bg-white/15' : '' }}">
                    <span class="material-symbols-outlined text-[20px]">message</span>
                    <span class="text-sm font-medium">Messages</span>
                </a>
                <a href="{{ route('admin.teachers.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-white/10 transition-colors {{ request()->routeIs('admin.teachers.*') ? 'bg-white/15' : '' }}">
                    <span class="material-symbols-outlined text-[20px]">school</span>
                    <span class="text-sm font-medium">Teachers</span>
                </a>
                <a href="{{ route('admin.events.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-white/10 transition-colors {{ request()->routeIs('admin.events.*') ? 'bg-white/15' : '' }}">
                    <span class="material-symbols-outlined text-[20px]">event</span>
                    <span class="text-sm font-medium">Events</span>
                </a>
                <a href="{{ route('admin.departments.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-white/10 transition-colors {{ request()->routeIs('admin.departments.*') ? 'bg-white/15' : '' }}">
                    <span class="material-symbols-outlined text-[20px]">category</span>
                    <span class="text-sm font-medium">Departments</span>
                </a>
                <hr class="border-white/20 my-3">
                <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-white/10 transition-colors">
                    <span class="material-symbols-outlined text-[20px]">open_in_new</span>
                    <span class="text-sm font-medium">View Site</span>
                </a>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-white/10 transition-colors text-left">
                        <span class="material-symbols-outlined text-[20px]">logout</span>
                        <span class="text-sm font-medium">Logout</span>
                    </button>
                </form>
            </nav>
        </aside>

        <div class="flex-1 flex flex-col min-w-0">
            <header class="bg-white border-b border-gray-200 px-4 lg:px-6 py-3 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <button id="sidebarToggle" class="lg:hidden p-1.5 rounded-lg hover:bg-gray-100">
                        <span class="material-symbols-outlined">menu</span>
                    </button>
                    <h1 class="text-lg font-semibold text-gray-800">@yield('page-title', 'Dashboard')</h1>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-sm text-gray-500">{{ Auth::user()->name }}</span>
                    <div class="w-8 h-8 rounded-full bg-[#b1002c] text-white flex items-center justify-center text-sm font-medium">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto p-4 lg:p-6">
                @if (session('success'))
                    <div class="mb-4 px-4 py-3 bg-green-50 border border-green-200 text-green-700 rounded-lg text-sm">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="mb-4 px-4 py-3 bg-red-50 border border-red-200 text-red-700 rounded-lg text-sm">
                        {{ session('error') }}
                    </div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>

    <div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden max-lg:block"></div>

    <script>
        window.adminCsrfToken = '{{ csrf_token() }}';
        window.adminUploadUrl = '{{ route("admin.upload.image") }}';
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets/admin/js/admin.js') }}"></script>
    @stack('scripts')
</body>
</html>
