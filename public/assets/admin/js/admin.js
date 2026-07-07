document.addEventListener('DOMContentLoaded', function () {
    // Sidebar toggle
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('sidebarToggle');
    const overlay = document.getElementById('sidebarOverlay');

    if (toggleBtn && sidebar) {
        toggleBtn.addEventListener('click', function () {
            sidebar.classList.toggle('max-lg:-translate-x-full');
        });
    }

    if (overlay && sidebar) {
        overlay.addEventListener('click', function () {
            sidebar.classList.add('max-lg:-translate-x-full');
        });
    }

    // Dropify
    if (typeof $.fn !== 'undefined' && $.fn.dropify) {
        $('.dropify').dropify({
            messages: {
                'default': 'Drag & drop or click to upload',
                'replace': 'Drag & drop or click to replace',
                'remove': 'Remove',
                'error': 'Sorry, an error occurred'
            }
        });
    }

    // Summernote
    if (typeof $.fn !== 'undefined' && $.fn.summernote) {
        $('.summernote').summernote({
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'strikethrough', 'clear']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            callbacks: {
                onImageUpload: function (files) {
                    if (!window.adminUploadUrl) return;
                    var editor = this;
                    var formData = new FormData();
                    formData.append('image', files[0]);
                    formData.append('_token', window.adminCsrfToken);

                    $.ajax({
                        url: window.adminUploadUrl,
                        method: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (res) {
                            $(editor).summernote('insertImage', res.url);
                        },
                        error: function () {
                            alert('Image upload failed.');
                        }
                    });
                }
            }
        });
    }

    // DataTables
    if (typeof $.fn !== 'undefined' && $.fn.DataTable) {
        $('.data-table').each(function () {
            if (!$.fn.dataTable.isDataTable(this)) {
                $(this).DataTable({
                    pageLength: 25,
                    lengthMenu: [[10, 25, 50, -1], [10, 25, 50, 'All']],
                    language: {
                        search: 'Search:',
                        lengthMenu: 'Show _MENU_ entries',
                        info: 'Showing _START_ to _END_ of _TOTAL_ entries',
                        infoEmpty: 'Showing 0 entries',
                        infoFiltered: '(filtered from _MAX_ total entries)',
                        paginate: {
                            first: 'First',
                            last: 'Last',
                            next: '&rarr;',
                            previous: '&larr;'
                        }
                    }
                });
            }
        });
    }

    // View toggle (table/card)
    const tableToggle = document.getElementById('viewTable');
    const cardToggle = document.getElementById('viewCard');
    const tableView = document.getElementById('tableView');
    const cardView = document.getElementById('cardView');

    function setView(view) {
        if (view === 'table') {
            tableView?.classList.add('active');
            cardView?.classList.remove('active');
            tableToggle?.classList.add('active');
            cardToggle?.classList.remove('active');
            localStorage.setItem('adminView', 'table');
        } else {
            tableView?.classList.remove('active');
            cardView?.classList.add('active');
            tableToggle?.classList.remove('active');
            cardToggle?.classList.add('active');
            localStorage.setItem('adminView', 'card');
        }
    }

    if (tableToggle && cardToggle) {
        const savedView = localStorage.getItem('adminView') || 'table';
        setView(savedView);

        tableToggle.addEventListener('click', function () { setView('table'); });
        cardToggle.addEventListener('click', function () { setView('card'); });
    }

    // Confirm delete
    document.querySelectorAll('[data-confirm]').forEach(function (el) {
        el.addEventListener('click', function (e) {
            if (!confirm(this.dataset.confirm || 'Are you sure?')) {
                e.preventDefault();
            }
        });
    });
});
