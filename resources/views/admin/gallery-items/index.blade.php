@extends('admin.layouts.app')

@section('page-title', "Gallery Items: $album->title")
@section('title', 'Gallery Items - Admin')

@section('content')
    <div class="mb-4">
        <a href="{{ route('admin.albums.index') }}" class="text-sm text-gray-500 hover:text-[#b1002c]">&larr; Back to Albums</a>
        <h2 class="text-lg font-semibold text-gray-800 mt-1">{{ $album->title }} — Items</h2>
    </div>

    {{-- Inline Add Form --}}
    <div class="bg-white rounded-xl border border-gray-200 p-5 mb-6">
        <h3 class="text-sm font-semibold text-gray-700 mb-4">Add Items</h3>

        <div class="flex items-center gap-4 mb-4">
            <label class="flex items-center gap-2 text-sm">
                <input type="radio" name="addType" value="image" checked onchange="toggleAddType()">
                Images
            </label>
            <label class="flex items-center gap-2 text-sm">
                <input type="radio" name="addType" value="youtube" onchange="toggleAddType()">
                YouTube
            </label>
        </div>

        <div id="addImageSection">
            <div class="space-y-1.5 mb-3">
                <input type="file" id="imageInput" accept="image/*" multiple onchange="previewFiles(this)"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm">
                <p class="text-xs text-gray-400">Images will be converted to WebP. Click remove on any preview to exclude it before uploading.</p>
            </div>

            <div id="previewContainer" class="hidden mb-4">
                <p class="text-xs font-medium text-gray-500 mb-2">Selected files (<span id="previewCount">0</span>)</p>
                <div id="previewGrid" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-2"></div>
            </div>

            <div class="flex items-center gap-3">
                <input type="number" id="imageSortOrder" placeholder="Sort order" value="0"
                    class="w-28 px-3 py-2 border border-gray-300 rounded-lg text-sm">
                <button onclick="uploadImages({{ $album->id }})"
                    class="px-4 py-2 bg-[#b1002c] text-white rounded-lg text-sm font-medium hover:bg-[#920022] transition-colors flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-[18px]">upload</span>
                    Upload Images
                </button>
            </div>
            <div id="imageProgress" class="mt-2 text-xs text-gray-500 hidden"></div>
        </div>

        <div id="addYoutubeSection" class="hidden">
            <div class="flex items-stretch gap-4">
                <div class="flex-1 space-y-3">
                    <input type="url" id="youtubeLink" placeholder="YouTube URL" oninput="previewYoutube(this.value)"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm">
                    <div class="flex items-center gap-3">
                        <input type="number" id="youtubeSortOrder" placeholder="Order" value="0"
                            class="w-28 px-3 py-2 border border-gray-300 rounded-lg text-sm">
                        <button onclick="addYoutube({{ $album->id }})"
                            class="px-4 py-2 bg-[#b1002c] text-white rounded-lg text-sm font-medium hover:bg-[#920022] transition-colors flex items-center gap-1.5">
                            <span class="material-symbols-outlined text-[18px]">add</span>
                            Add
                        </button>
                    </div>
                </div>
                <div id="youtubePreview" class="hidden w-48 flex-shrink-0">
                    <img id="youtubeThumbnail" class="w-full aspect-video rounded-lg object-cover border border-gray-200" src="" alt="YouTube preview">
                </div>
            </div>
        </div>
    </div>

    {{-- Items Grid --}}
    <div class="bg-white rounded-xl border border-gray-200 p-5">
        <div id="itemsGrid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @forelse ($items as $item)
                <div class="item-card relative group bg-white border border-gray-200 rounded-xl overflow-hidden" data-id="{{ $item->id }}">
                    @if ($item->type === 'image' && $item->photopath)
                        <img src="{{ asset('storage/' . $item->photopath) }}" class="w-full h-40 object-cover">
                    @elseif ($item->type === 'youtube' && $item->youtube_link)
                        <div class="w-full h-40 bg-gray-900 relative flex items-center justify-center overflow-hidden">
                            @if ($item->thumbnail())
                                <img src="{{ $item->thumbnail() }}" class="absolute inset-0 w-full h-full object-cover opacity-70">
                            @endif
                            <span class="material-symbols-outlined text-5xl text-white/90 relative z-10">play_circle</span>
                        </div>
                    @else
                        <div class="w-full h-40 bg-gray-100 flex items-center justify-center">
                            <span class="material-symbols-outlined text-3xl text-gray-300">broken_image</span>
                        </div>
                    @endif
                    <div class="p-3">
                        <span class="inline-block px-2 py-0.5 text-xs rounded {{ $item->type === 'image' ? 'bg-blue-50 text-blue-600' : 'bg-red-50 text-red-600' }}">
                            {{ $item->type }}
                        </span>
                        <span class="text-xs text-gray-400 ml-2">Order: {{ $item->sort_order }}</span>
                    </div>
                    <div class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-opacity">
                        <button onclick="deleteItem({{ $album->id }}, {{ $item->id }}, this)"
                            class="w-8 h-8 bg-white rounded-lg shadow flex items-center justify-center text-gray-600 hover:text-red-600">
                            <span class="material-symbols-outlined text-[16px]">delete</span>
                        </button>
                    </div>
                </div>
            @empty
                <div id="emptyState" class="col-span-full text-center py-12 text-gray-400">
                    <span class="material-symbols-outlined text-5xl block mb-3">photo_library</span>
                    <p class="text-sm">No items in this album yet.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.2/axios.min.js"></script>
<script>
    const csrfToken = window.adminCsrfToken;

    function toggleAddType() {
        var type = document.querySelector('input[name="addType"]:checked').value;
        document.getElementById('addImageSection').classList.toggle('hidden', type !== 'image');
        document.getElementById('addYoutubeSection').classList.toggle('hidden', type !== 'youtube');
    }

    var selectedFiles = [];

    function previewFiles(input) {
        selectedFiles = Array.from(input.files);
        renderPreviews();
    }

    function removePreview(index) {
        selectedFiles.splice(index, 1);
        renderPreviews();
        var dt = new DataTransfer();
        selectedFiles.forEach(function (f) { dt.items.add(f); });
        document.getElementById('imageInput').files = dt.files;
    }

    function renderPreviews() {
        var container = document.getElementById('previewContainer');
        var grid = document.getElementById('previewGrid');
        var count = document.getElementById('previewCount');
        count.textContent = selectedFiles.length;

        if (selectedFiles.length === 0) {
            container.classList.add('hidden');
            return;
        }
        container.classList.remove('hidden');
        grid.innerHTML = '';

        selectedFiles.forEach(function (file, i) {
            var url = URL.createObjectURL(file);
            var div = document.createElement('div');
            div.className = 'relative group rounded-lg overflow-hidden border border-gray-200 bg-gray-50';
            div.innerHTML = '<img src="' + url + '" class="w-full h-20 object-cover">' +
                '<button type="button" onclick="removePreview(' + i + ')" class="absolute -top-1.5 -right-1.5 w-5 h-5 bg-red-500 text-white rounded-full flex items-center justify-center text-xs opacity-0 group-hover:opacity-100 transition-opacity hover:bg-red-600">&times;</button>' +
                '<div class="px-1.5 py-1"><p class="text-[10px] text-gray-500 truncate">' + file.name + '</p></div>';
            grid.appendChild(div);
        });
    }

    function toWebP(file) {
        return new Promise(function (resolve) {
            var img = new Image();
            var url = URL.createObjectURL(file);
            img.onload = function () {
                var canvas = document.createElement('canvas');
                canvas.width = img.width;
                canvas.height = img.height;
                var ctx = canvas.getContext('2d');
                ctx.drawImage(img, 0, 0);
                canvas.toBlob(function (blob) {
                    URL.revokeObjectURL(url);
                    var webpFile = new File([blob], file.name.replace(/\.[^.]+$/, '.webp'), { type: 'image/webp' });
                    resolve(webpFile);
                }, 'image/webp', 0.85);
            };
            img.src = url;
        });
    }

    function uploadImages(albumId) {
        if (!selectedFiles.length) { alert('Select images first.'); return; }

        var btn = event.target.closest('button');
        btn.disabled = true;
        btn.innerHTML = '<span class="material-symbols-outlined text-[18px]">hourglass_top</span> Converting...';

        var progress = document.getElementById('imageProgress');
        progress.classList.remove('hidden');
        progress.textContent = 'Converting ' + selectedFiles.length + ' image(s) to WebP...';

        Promise.all(selectedFiles.map(function (f) { return toWebP(f); })).then(function (webpFiles) {
            var formData = new FormData();
            webpFiles.forEach(function (f) { formData.append('images[]', f); });
            formData.append('sort_order', document.getElementById('imageSortOrder').value || '0');
            formData.append('_token', csrfToken);

            progress.textContent = 'Uploading ' + webpFiles.length + ' image(s)...';

            axios.post('/admin/albums/' + albumId + '/items', formData).then(function (res) {
                selectedFiles = [];
                renderPreviews();
                document.getElementById('imageInput').value = '';
                btn.disabled = false;
                btn.innerHTML = '<span class="material-symbols-outlined text-[18px]">upload</span> Upload Images';
                progress.classList.add('hidden');

                var empty = document.getElementById('emptyState');
                if (empty) empty.remove();
                if (res.data.items) {
                    res.data.items.forEach(function (item) { appendItem(item, albumId); });
                }
            }).catch(function () {
                alert('Upload failed.');
                btn.disabled = false;
                btn.innerHTML = '<span class="material-symbols-outlined text-[18px]">upload</span> Upload Images';
                progress.classList.add('hidden');
            });
        });
    }

    function getYoutubeId(url) {
        var m = url.match(/(?:youtube\.com\/(?:watch\?v=|embed\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/);
        return m ? m[1] : null;
    }

    function previewYoutube(url) {
        var id = getYoutubeId(url);
        var container = document.getElementById('youtubePreview');
        var img = document.getElementById('youtubeThumbnail');
        if (id) {
            container.classList.remove('hidden');
            img.src = 'https://img.youtube.com/vi/' + id + '/mqdefault.jpg';
        } else {
            container.classList.add('hidden');
        }
    }

    function addYoutube(albumId) {
        var link = document.getElementById('youtubeLink').value;
        if (!link) { alert('Enter a YouTube URL.'); return; }

        var formData = new FormData();
        formData.append('type', 'youtube');
        formData.append('youtube_link', link);
        formData.append('sort_order', document.getElementById('youtubeSortOrder').value || '0');
        formData.append('_token', csrfToken);

        axios.post('/admin/albums/' + albumId + '/items', formData).then(function (res) {
            document.getElementById('youtubeLink').value = '';
            document.getElementById('youtubePreview').classList.add('hidden');
            var empty = document.getElementById('emptyState');
            if (empty) empty.remove();
            appendItem(res.data.item, albumId);
        }).catch(function () {
            alert('Failed to add YouTube.');
        });
    }

    function appendItem(item, albumId) {
        var grid = document.getElementById('itemsGrid');
        var div = document.createElement('div');
        div.className = 'item-card relative group bg-white border border-gray-200 rounded-xl overflow-hidden';
        div.dataset.id = item.id;

        var inner = '';
        if (item.type === 'image' && item.photopath) {
            inner += '<img src="' + item.photopath + '" class="w-full h-40 object-cover">';
        } else if (item.type === 'youtube') {
            inner += '<div class="w-full h-40 bg-gray-900 flex items-center justify-center"><span class="material-symbols-outlined text-4xl text-white/60">play_circle</span></div>';
        } else {
            inner += '<div class="w-full h-40 bg-gray-100 flex items-center justify-center"><span class="material-symbols-outlined text-3xl text-gray-300">broken_image</span></div>';
        }

        inner += '<div class="p-3">' +
            '<span class="inline-block px-2 py-0.5 text-xs rounded ' + (item.type === 'image' ? 'bg-blue-50 text-blue-600' : 'bg-red-50 text-red-600') + '">' + item.type + '</span>' +
            '<span class="text-xs text-gray-400 ml-2">Order: ' + item.sort_order + '</span>' +
            '</div>' +
            '<div class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-opacity">' +
            '<button onclick="deleteItem(' + albumId + ', ' + item.id + ', this)" class="w-8 h-8 bg-white rounded-lg shadow flex items-center justify-center text-gray-600 hover:text-red-600">' +
            '<span class="material-symbols-outlined text-[16px]">delete</span></button></div>';

        div.innerHTML = inner;
        grid.appendChild(div);
    }

    function deleteItem(albumId, itemId, btn) {
        if (!confirm('Remove this item?')) return;
        var card = btn.closest('.item-card');
        var formData = new FormData();
        formData.append('_token', csrfToken);
        formData.append('_method', 'DELETE');

        axios.post('/admin/albums/' + albumId + '/items/' + itemId, formData).then(function () {
            if (card) {
                card.style.transition = 'opacity 0.3s';
                card.style.opacity = '0';
                setTimeout(function () { card.remove(); }, 300);
            }
        }).catch(function () {
            alert('Delete failed.');
        });
    }
</script>
@endpush
