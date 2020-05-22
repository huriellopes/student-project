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

                let criado = moment(response.created_at)

                lista.row.add([
                    response.id, response.title, criado
                ])
            })

            lista.draw()
        }
    }


    return {
        init: () => {
            configDataTable()
            initConfigs()
            listaPosts()
        }
    }

}()

$(document).ready(() => {
    PostList.init()
})
