const ShowPost = function () {
    let showpost = () => {
        let formPost = $("#postForm")

        let rules = {
            title: {
                'required': true
            },
            description: {
                'required': true
            },
            content: {
                'required': true
            }
        }

        let messages = {
            title: {
                'required': 'Campo Obrigatório!'
            },
            description: {
                'required': 'Campo Obrigatório!'
            },
            content: {
                'required': 'Campo Obrigatório!'
            }
        }

        formPost.validate({
            ignore: '',
            rules: rules,
            messages: messages,
            errorElement: "div",
            errorClass: 'invalid-feedback',
            errorPlacement: function (error, element) {
                error.insertAfter(element);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).addClass("is-valid").removeClass("is-invalid");
            },
            submitHandler: async function (form, e) {
                e.preventDefault();

                $.blockUI({
                    css: {
                        border: 'none',
                        padding: '15px',
                        backgroundColor: '#000',
                        '-webkit-border-radius': '10px',
                        '-moz-border-radius': '10px',
                        opacity: .5,
                        color: '#ffffff'
                    },
                    message: 'Validando Formulário!'
                });

                setTimeout($.unblockUI, 2000);

                const create = await requisicao(formPost.attr('action'), formPost.serialize(), 'POST');
                console.log(create)
                if (create.status === 200) {
                    setTimeout($.unblockUI, 2000);
                    exibirMsg('Ótimo!', create.data.message, 'success')
                    setTimeout(function () {
                        window.location.href = "/posts"
                    }, 2000)
                } else if (create.status === 400) {
                    exibirMsg('Atenção!', create.data.message, 'error')
                } else {
                    setTimeout($.unblockUI, 2000);
                    exibirMsg('Atenção!', 'Houve um error!', 'error')
                }
            }
        })
    }

    return {
        init: () => {
            showpost()
        }
    }
}()

$(document).ready(() => {
    ShowPost.init()
})
