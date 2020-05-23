const UsersList = function () {

    let initConfigs = () => {
        configDataTable('datatable')
    }

    let listaUsers = async () => {
        url = '/users/api/lista'

        const users = await requisicao(url, null, 'GET')

        if (users.data.length === 0) console.log('Não há posts!')

        if (users.status === 200 && users.data.length > 0) {
            let lista = $('.datatable').DataTable()

            lista.clear()

            users.data.map(response => {

                let criado = formataData(response.created_at)

                lista.row.add([
                    response.id, response.name, response.email, criado,
                    ``
                ])
            })

            lista.draw()

            $("#loading").hide()
            $("#tabela").show()
        }
    }

    return {
        init: () => {
            initConfigs()
            listaUsers()
        }
    }

}()

$(document).ready(() => {
    UsersList.init()
})
