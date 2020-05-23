const FuncoesGlobais = function () {
    formataData = (data) => {
        return moment(data).format("DD/MM/YYYY");
    }

    requisicao = (url, dados = null, type) => axios({
        method: type,
        url: url,
        data: dados,
        dataType: 'JSON',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    exibirMsg = (title, text = null, type, html = null, timer = false) => {
        swal({
            title: title,
            html: html,
            text: text,
            icon: type,
            confirmButtonText: 'OK',
            timer: timer
        })
    }

    confirmMsg = (title, text = null, type, html = null, confirmText, cancelText) =>
        swal({
            title: title,
            icon: type,
            text: text,
            html: html,
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonText: confirmText,
            cancelButtonText: cancelText,
        })

    configDataTable = (ClassTable) => {
        $('.'+ClassTable).DataTable({
            "order": [],
            "destroy": true,
            "processing": true,
            "serverSide": false,
            "responsive": true,
            "oLanguage": {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "_MENU_ por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            },
        })
    }
}();
