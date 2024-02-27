$(document).ready(function () {


    $('.contas_receber').select2({
        placeholder: "CPF ... Nome...",
        allowClear: true,
        "language": {
            "noResults": function () {
                return '<span class="text-danger">Cliente não encontrado</span> <a href="' + BASE_URL + 'clientes/add" target="_blank" class="btn btn-primary btn-sm btn-block">Cadastrar</a>';
            }
        },
        escapeMarkup: function (markup) {
            return markup;
        }
    });

    $('.forma-pagamento').select2({
        placeholder: "Forma de pagamento",
        allowClear: true,
        "language": {
            "noResults": function () {
                return '<span class="text-danger">Forma não encontrada</span> <a href="' + BASE_URL + 'modulo/add" target="_blank" class="btn btn-primary btn-sm btn-block">Cadastrar</a>';
            }
        },
        escapeMarkup: function (markup) {
            return markup;
        }
    });

    $('.vendedor').select2({
        placeholder: "Nome ou código",
        allowClear: true,
        "language": {
            "noResults": function () {
                return '<span class="text-danger">Vendedor não encontrado</span> <a href="' + BASE_URL + 'vendedores/add" target="_blank" class="btn btn-primary btn-sm btn-block">Cadastrar</a>';
            }
        },
        escapeMarkup: function (markup) {
            return markup;
        }
    });

    $('.contas_pagar').select2({
        placeholder: "CPF... CNPJ... Nome",
        allowClear: true,
        "language": {
            "noResults": function () {
                return '<span class="text-danger">Parceiro não encontrado</span> <a href="' + BASE_URL + 'parceiros/add" target="_blank" class="btn btn-primary btn-sm btn-block">Cadastrar</a>';
            }
        },
        escapeMarkup: function (markup) {
            return markup;
        }
    });

    $('.cli_fran').select2({
        placeholder: "Cliente",
        allowClear: true,
        "language": {
            "noResults": function () {
                return '<span class="text-danger">Cliente não encontrado</span> <a href="' + BASE_URL + 'franquias/clientes/add" target="_blank" class="btn btn-primary btn-sm btn-block">Cadastrar</a>';
            }
        },
        escapeMarkup: function (markup) {
            return markup;
        }
    });

});

