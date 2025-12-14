<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Film</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">
    <div class="max-w-lg mx-auto bg-white p-6 shadow-lg rounded-lg">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Edit Film</h1>
        <form action="{{ route('films.update', $film['id']) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <input class="w-full border rounded p-2" type="text" name="nama" value="{{ $film['nama'] }}" required>
            <textarea class="w-full border rounded p-2" name="deskripsi" required>{{ $film['deskripsi'] }}</textarea>
            <input class="w-full border rounded p-2" type="date" name="tanggal_rilis" value="{{ $film['tanggal_rilis'] }}" required>
            <input class="w-full border rounded p-2" type="number" name="rating" value="{{ $film['rating'] }}" step="0.1" required>
            <div class="flex gap-2">
                <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">Update</button>
                <a href="{{ route('films.index') }}" class="ml-auto text-gray-700 hover:underline">← Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>
