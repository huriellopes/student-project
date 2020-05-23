const PostList = function () {

    let initConfigs = () => {
        configDataTable('datatable')
    }

    let listaPosts = async () => {
        url = '/posts/api/lista'

        const posts = await requisicao(url, null, 'GET')

        if (posts.data.length === 0) console.log('Não há posts!')

        if (posts.status === 200 && posts.data.length > 0) {
            let lista = $('.datatable').DataTable()

            lista.clear()

            posts.data.map(response => {

                let criado = formataData(response.created_at)

                let ativo
                if (parseInt(response.active) === 0) {
                    ativo = `<a href='/posts/api/ativa/${response.id}' class='btn btn-outline-success btn-sm' id='ativa'><i class='far fa-check-circle fa-1x'></i></a>`
                } else {
                    ativo = `<a href='/posts/api/inativa/${response.id}' class='btn btn-outline-danger btn-sm' id='inativa'><i class='fas fa-ban fa-1x'></i></a>`
                }

                let status = parseInt(response.active) === 0 ? '<span class="badge badge-warning">Inativo</span>' : '<span class="badge badge-success">Ativo</span>'

                lista.row.add([
                    response.id, response.title, response.description, response.author.name, status, criado,
                    `<a href='/posts/show/${response.id}' class='btn btn-outline-primary btn-sm'><i class='far fa-eye fa-1x'></i></a>
                    ${ativo}`

                ])
            })

            lista.draw()

            $("#loading").hide()
            $("#tabela").show()
        }
    }

    let ativaPost = () => {
        $('body').on('click', '#ativa', function(e) {
            e.preventDefault()

            confirmMsg('Atenção', 'Deseja Ativar o Post?','warning', '','Confirmar', 'Cancelar')
                .then(async value => {
                    if (value) {
                        let url = '/posts/api/ativa'

                        const ativa = await requisicao($(this).attr('href'), null, 'POST')

                        if (ativa.status === 200) {
                            exibirMsg('Ótimo!', ativa.data.message, 'success')

                            setTimeout(function () {
                                window.location.reload()
                            }, 1500)
                        }
                    }
                })
        })
    }

    let inativaPost = () => {
        $('body').on('click', '#inativa', function(e) {
            e.preventDefault()

            confirmMsg('Atenção', 'Deseja Inativar o Post?','warning', '','Confirmar', 'Cancelar')
                .then(async value => {
                    if (value) {
                        const inativa = await requisicao($(this).attr('href'), null, 'POST')

                        if (inativa.status === 200) {
                            exibirMsg('Ótimo!', inativa.data.message, 'success')

                            setTimeout(function () {
                                window.location.reload()
                            }, 1500)
                        }
                    }
                })
        })
    }

    return {
        init: () => {
            initConfigs()
            listaPosts()
            ativaPost()
            inativaPost()
        }
    }

}()

$(document).ready(() => {
    PostList.init()
})
