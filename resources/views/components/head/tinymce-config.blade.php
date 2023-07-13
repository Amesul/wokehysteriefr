<script src="https://cdn.tiny.cloud/1/lsweoy8eu0ew1sj0395vf321so78joq9ozljo1zbe3njdda4/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea#biography',
        resize: false,
        placeholder: 'Présente-toi en quelques phrases... (1200 caractères max)',
        plugins: 'wordcount code link',
        link_default_target: '_blank',
        menubar: false,
        toolbar: 'undo redo | bold italic | link code | wordcount',
    });

    tinymce.init({
        selector: 'textarea#excerpt',
        resize: false,
        height: 150,
        placeholder: 'Résume ton post en un paragraphe (250 caractères max)',
        menubar: false,
        toolbar: false,
    });

    tinymce.init({
        selector: 'textarea#body',
        resize: false,
        height: 600,
        plugins: 'wordcount code link',
        link_default_target: '_blank',
        menubar: false,
        toolbar: 'undo redo | bold italic | link code | wordcount',
    });
</script>
