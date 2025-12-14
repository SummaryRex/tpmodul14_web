<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Film Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">
    <div class="max-w-5xl mx-auto">
        <!-- Judul -->
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Manajemen Film</h1>

        <!-- CARD FORM TAMBAH -->
        <div class="bg-white shadow-md rounded-lg p-6 mb-8">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Tambah Film Baru</h2>
            <form action="{{ route('films.store') }}" method="POST" class="space-y-4">
                @csrf
                <input class="w-full border rounded p-2" type="text" name="nama" placeholder="Nama Film" required>
                <textarea class="w-full border rounded p-2" name="deskripsi" placeholder="Deskripsi Film" required></textarea>
                <div class="flex gap-4">
                    <input class="w-1/2 border rounded p-2" type="date" name="tanggal_rilis" required>
                    <input class="w-1/2 border rounded p-2" type="number" name="rating" placeholder="Rating" step="0.1" required>
                </div>
                <button class="bg-gray-700 hover:bg-gray-800 text-white px-4 py-2 rounded shadow">➕ Tambah</button>
            </form>
        </div>

        <!-- TABLE LIST FILM -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Daftar Film</h2>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-200 text-left">
                            <th class="p-3">ID</th>
                            <th class="p-3">Nama</th>
                            <th class="p-3">Deskripsi</th>
                            <th class="p-3">Tanggal Rilis</th>
                            <th class="p-3">Rating</th>
                            <th class="p-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($films as $film)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="p-3">{{ $film['id'] ?? '' }}</td>
                            <td class="p-3">{{ $film['nama'] ?? '' }}</td>
                            <td class="p-3">{{ $film['deskripsi'] ?? '' }}</td>
                            <td class="p-3">{{ \Carbon\Carbon::parse($film['tanggal_rilis'])->translatedFormat('d F Y') }}</td>
                            <td class="p-3">{{ $film['rating'] ?? '' }}</td>
                            <td class="p-3 flex gap-2">
                                <!-- Tombol Edit -->
                                <a href="{{ route('films.edit', $film['id']) }}" class="bg-yellow-400 hover:bg-yellow-500 text-black px-3 py-1 rounded">Edit</a>
                                <!-- Tombol Delete -->
                                <form action="{{ route('films.destroy', $film['id']) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
