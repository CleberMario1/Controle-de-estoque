$(document).ready(function () {
    $('#gerente').DataTable({
        retrieve: true,
    paging: true,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json',
        },
    });
});