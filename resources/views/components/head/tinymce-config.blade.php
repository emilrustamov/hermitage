<script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
 tinymce.init({
  selector: 'textarea',  // change this value according to your HTML
  menu: {
    edit: { title: 'Edit', items: 'undo, redo, selectall' }
  }
});
</script>
