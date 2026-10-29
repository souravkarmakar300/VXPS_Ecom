<style>
    /* Admin body uses light text; force readable CKEditor content (dark text on white). */
    .ck.ck-editor {
        color: #0f172a;
    }
    .ck.ck-editor__main > .ck-editor__editable {
        color: #0f172a !important;
        background-color: #ffffff !important;
        min-height: 160px;
        border-radius: 0 0 0.75rem 0.75rem;
    }
    .ck.ck-editor__main > .ck-editor__editable p,
    .ck.ck-editor__main > .ck-editor__editable h1,
    .ck.ck-editor__main > .ck-editor__editable h2,
    .ck.ck-editor__main > .ck-editor__editable h3,
    .ck.ck-editor__main > .ck-editor__editable li,
    .ck.ck-editor__main > .ck-editor__editable blockquote {
        color: #0f172a !important;
    }
    .ck.ck-toolbar {
        background: #f8fafc !important;
        border-radius: 0.75rem 0.75rem 0 0 !important;
    }
    .ck.ck-editor__main > .ck-editor__editable.ck-focused {
        border-color: #6366f1 !important;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
    }
</style>
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
    document.querySelectorAll('.ckeditor-field').forEach(function (el) {
        ClassicEditor.create(el, {
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|', 'undo', 'redo']
        }).catch(function (error) {
            console.error(error);
        });
    });
</script>
