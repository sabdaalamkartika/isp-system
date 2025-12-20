<!DOCTYPE html>
<html>
<head>
    <title>Ini Web Bohongan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- NAVBAR -->
    <nav class="bg-white border-b shadow px-4 py-3 flex justify-between items-center">
        <div class="text-xl font-bold">
            WEB APA Niech!
        </div>

        <div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-gray-800 font-semibold">Logout</button>
            </form>
        </div>
    </nav>

    <div class="flex">

        <!-- SIDEBAR -->
        <aside class="w-64 bg-gray-800 text-white min-h-screen p-4">

            <h2 class="text-lg mb-4 font-bold">Menu A Bersamamu</h2>

            <ul class="space-y-3">

                <li>
                    <a href="{{ route('dashboard') }}" class="block p-2 rounded hover:bg-gray-700"> Dashboard</a>
                </li>

                {{-- 1. CLIENT (hanya admin) --}}
                @if(auth()->user()->role === 'admin')
                <li>
                    <a href="{{ route('clients.index') }}" class="block p-2 rounded hover:bg-gray-700">
                        Client
                    </a>
                </li>
                @endif

                @if(auth()->user()->role === 'admin')
                <li>
                    <a href="{{ route('paket.index') }}" class="block p-2 rounded hover:bg-gray-700">
                        Paket
                    </a>
                </li>
                @endif

                {{-- 2. PEMBAYARAN (admin & staff) --}}
                @if(auth()->user()->role === 'admin' || auth()->user()->role === 'staff')
                <li>
                    <a href="{{ route('payments.index') }}" class="block p-2 rounded hover:bg-gray-700">
                        Pembayaran
                    </a>
                </li>
                @endif

                {{-- 3. PENGELUARAN (hanya admin) --}}
                @if(auth()->user()->role === 'admin')
                <li>
                    <a href="{{ route('pengeluaran.index') }}" class="block p-2 rounded hover:bg-gray-700">
                        Pengeluaran
                    </a>
                </li>
                @endif

                {{-- 4. FINANCE (hanya admin) --}}
                @if(auth()->user()->role === 'admin')
                <li>
                    <a href="/finance" class="block p-2 rounded hover:bg-gray-700">
                        Finance
                    </a>
                </li>
                @endif

            </ul>

        </aside>


        <!-- CONTENT -->
         <div class="p-4 w-full">
            {{-- ALERT SUCCESS --}}
            @if (session('success'))
                <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            {{-- ALERT ERROR --}}
            @if (session('error'))
                <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            {{-- VALIDASI --}}
            @if ($errors->any())
                <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
                    <strong>Terjadi kesalahan:</strong>
                    <ul class="list-disc ml-6">
                        @foreach ($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <main class="flex-1 p-6">
                @yield('content')
            </main>
        </div>

    </div>

</body>
</html>
