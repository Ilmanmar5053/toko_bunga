<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Katalog Bunga | Florist</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-rose-50 font-sans text-slate-800 antialiased">
    <main class="mx-auto max-w-6xl px-4 py-12 sm:px-6 lg:px-8">
        <header class="mb-8 flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-slate-700">FLORIST | Harum Abadi</p>
                <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">Katalog Bunga</h1>
                <p class="mt-2 text-slate-600">Pilihan bunga segar untuk setiap momen istimewa.</p>
            </div>
            <p class="inline-flex w-fit items-center rounded-full bg-white px-4 py-2 text-sm font-medium text-slate-700 shadow-sm ring-1 ring-slate-200">
                {{ $products->count() }} produk tersedia
            </p>
        </header>

        <div class="mb-5 flex justify-start">
            <a href="{{ route('products.create') }}" class="inline-flex items-center rounded-md border border-slate-300 bg-white px-4 py-2 text-sm font-medium text-slate-700 shadow-sm transition hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-slate-300 focus:ring-offset-2">
                Tambah Item
            </a>
        </div>

        @if (session('success'))
            <p role="status" class="mb-5 rounded-md border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">
                {{ session('success') }}
            </p>
        @endif

        <section class="overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm" aria-label="Daftar produk bunga">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[760px] border-separate border-spacing-0 text-left text-sm">
                    <thead class="bg-slate-100 text-xs uppercase tracking-wide text-slate-700">
                        <tr>
                            <th scope="col" class="border-b border-slate-200 px-5 py-4 font-semibold">ID</th>
                            <th scope="col" class="border-b border-slate-200 px-5 py-4 font-semibold">Nama Barang</th>
                            <th scope="col" class="border-b border-slate-200 px-5 py-4 font-semibold">Harga</th>
                            <th scope="col" class="border-b border-slate-200 px-5 py-4 font-semibold">Stok</th>
                            <th scope="col" class="border-b border-slate-200 px-5 py-4 font-semibold">Deskripsi</th>
                            <th scope="col" class="border-b border-slate-200 px-5 py-4 font-semibold">Ditambahkan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200">
                        @forelse ($products as $product)
                            <tr class="transition hover:bg-slate-50">
                                <td class="whitespace-nowrap border-b border-slate-200 px-5 py-4 text-slate-500">{{ $product->id }}</td>
                                <th scope="row" class="whitespace-nowrap border-b border-slate-200 px-5 py-4 font-semibold text-slate-900">
                                    {{ $product->nama_barang }}
                                </th>
                                <td class="whitespace-nowrap border-b border-slate-200 px-5 py-4 font-medium text-slate-700">
                                    Rp {{ number_format((float) $product->harga, 0, ',', '.') }}
                                </td>
                                <td class="whitespace-nowrap border-b border-slate-200 px-5 py-4">
                                    <span class="rounded-md border border-slate-200 bg-slate-50 px-2.5 py-1 text-xs font-medium text-slate-700">
                                        {{ $product->stok }}
                                    </span>
                                </td>
                                <td class="max-w-sm border-b border-slate-200 px-5 py-4 leading-relaxed text-slate-600">
                                    {{ $product->deskripsi }}
                                </td>
                                <td class="whitespace-nowrap border-b border-slate-200 px-5 py-4 text-slate-500">
                                    {{ $product->created_at->format('d-m-Y | H:i:s') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-5 py-12 text-center text-slate-500">
                                    Belum ada produk bunga yang tersedia.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

        <p class="mt-5 text-center text-xs text-slate-500">Harga dapat berubah sesuai ketersediaan bunga.</p>
    </main>
</body>
</html>
