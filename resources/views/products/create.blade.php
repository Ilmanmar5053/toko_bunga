<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Item | Florist</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-rose-50 font-sans text-slate-800 antialiased">
    <main class="mx-auto max-w-3xl px-4 py-12 sm:px-6 lg:px-8">
        <header class="mb-8">
            <a href="{{ route('products.index') }}" class="text-sm font-medium text-rose-700 hover:text-rose-900">
                &larr; Kembali ke katalog
            </a>
            <p class="mt-6 text-sm font-semibold uppercase tracking-[0.2em] text-slate-700">FLORIST | Harum Abadi</p>
            <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">Tambah Item</h1>
            <p class="mt-2 text-slate-600">Isi informasi bunga yang ingin ditambahkan ke katalog.</p>
        </header>

        <form action="{{ route('products.store') }}" method="POST" class="grid gap-5 rounded-lg border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
            @csrf

            <div class="grid gap-2">
                <label for="nama_barang" class="text-sm font-medium text-slate-700">Nama barang</label>
                <input
                    id="nama_barang"
                    name="nama_barang"
                    type="text"
                    value="{{ old('nama_barang') }}"
                    maxlength="255"
                    required
                    @error('nama_barang') aria-invalid="true" aria-describedby="nama_barang-error" @enderror
                    class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm shadow-sm outline-none transition placeholder:text-slate-400 focus:border-rose-400 focus:ring-2 focus:ring-rose-200"
                    placeholder="Contoh: Mawar Merah"
                >
                @error('nama_barang')
                    <p id="nama_barang-error" class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid gap-2 sm:grid-cols-2">
                <div class="grid content-start gap-2">
                    <label for="harga" class="text-sm font-medium text-slate-700">Harga (Rp)</label>
                    <input
                        id="harga"
                        name="harga"
                        type="number"
                        value="{{ old('harga') }}"
                        min="0"
                        max="9999999999.99"
                        step="0.01"
                        required
                        @error('harga') aria-invalid="true" aria-describedby="harga-error" @enderror
                        class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm shadow-sm outline-none transition placeholder:text-slate-400 focus:border-rose-400 focus:ring-2 focus:ring-rose-200"
                        placeholder="75000"
                    >
                    @error('harga')
                        <p id="harga-error" class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid content-start gap-2">
                    <label for="stok" class="text-sm font-medium text-slate-700">Stok</label>
                    <input
                        id="stok"
                        name="stok"
                        type="number"
                        value="{{ old('stok', 0) }}"
                        min="0"
                        max="4294967295"
                        step="1"
                        required
                        @error('stok') aria-invalid="true" aria-describedby="stok-error" @enderror
                        class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm shadow-sm outline-none transition placeholder:text-slate-400 focus:border-rose-400 focus:ring-2 focus:ring-rose-200"
                        placeholder="0"
                    >
                    @error('stok')
                        <p id="stok-error" class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid gap-2">
                <label for="deskripsi" class="text-sm font-medium text-slate-700">Deskripsi <span class="font-normal text-slate-500">(opsional)</span></label>
                <textarea
                    id="deskripsi"
                    name="deskripsi"
                    rows="4"
                    @error('deskripsi') aria-invalid="true" aria-describedby="deskripsi-error" @enderror
                    class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm shadow-sm outline-none transition placeholder:text-slate-400 focus:border-rose-400 focus:ring-2 focus:ring-rose-200"
                    placeholder="Tambahkan keterangan singkat tentang item."
                >{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <p id="deskripsi-error" class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col-reverse gap-3 border-t border-slate-200 pt-5 sm:flex-row sm:justify-end">
                <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center rounded-md border border-slate-300 bg-white px-4 py-2 text-sm font-medium text-slate-700 transition hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-slate-300 focus:ring-offset-2">
                    Batal
                </a>
                <button type="submit" class="inline-flex items-center justify-center rounded-md bg-rose-700 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-rose-800 focus:outline-none focus:ring-2 focus:ring-rose-400 focus:ring-offset-2">
                    Simpan Item
                </button>
            </div>
        </form>
    </main>
</body>
</html>
