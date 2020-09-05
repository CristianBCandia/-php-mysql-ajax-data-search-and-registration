window.onload = function () {

    
    const btn_iniciar = document.getElementById('iniciar-pesquisa')
    const formulario_pesquisa = document.getElementById('formulario-pesquisa')
    const sucesso = document.getElementById('sucesso')

    const btn_lista = document.getElementById('lista')
    //------------------------------------------------
    const div_container = document.getElementById('container')

    btn_iniciar.style.display = 'block'
    btn_iniciar.innerText = 'Iniciar'




    btn_lista.onclick = function () {

        sucesso.style.display = 'none'
        formulario_pesquisa.innerHTML = ''

        fetch('ajax/pesquisaLista.php', { method: 'GET' })

            .then((response) => {

                return response.json()
            
            })
            .then((response) => {

               

                const lista = response

                let table = `
                            <div class='container'>
                            <h1>Relatório Pesquisa</h1>
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Pergunta</th>
                                        <th scope="col">Resposta</th>
                                    </tr>
                                </thead> 
                                <tbody>`

                //--------------------------------------------------
                let nome = ''
                let bgColor = 'bg-dark'
                let txtColor = 'text-white'

                for(let i = 0; i < lista.length -1; i++){
                                       
                    if(lista[i]['nome_cliente'] != nome){

                        bgColor = bgColor === 'bg-dark'? '' : 'bg-dark'
                        txtColor = txtColor === 'text-dark' ? 'text-white' : 'text-dark'
                    }
                    if(lista[i]['nome_cliente'] != ''){

                       
                        table += `<tr class="${bgColor} ${txtColor}"><td>${lista[i]['nome_cliente']}</td><td>${lista[i]['descricao_pergunta']}
                        </td><td>${lista[i]['descricao_opcao']}</td></tr>`
                    }

                     nome = lista[i]['nome_cliente'] 
                }

                table += `  </tbody>
                          </table>  
                          </div>
                        `
                div_container.innerHTML = table
        
            })



    }

    formulario_pesquisa.onsubmit = function (event) {

        event.preventDefault()

        let formulario = new FormData(formulario_pesquisa)

        fetch('ajax/inserir.php', { method: 'POST',type: 'text', body: formulario })

            .then(function (response) {
                
                return response.text()
            })
            
            .then(() => {
               
                formulario_pesquisa.innerHTML = ''
                btn_iniciar.style.display = 'block'
                btn_iniciar.innerText = 'Nova Pesquisa'
                sucesso.classList.add('alert', 'alert-dark')
                sucesso.style.display = 'block'
                sucesso.innerHTML = 'Salvo com sucesso!'

            })

    }

    
   btn_iniciar.onclick = function () {
        
        div_container.innerHTML = ''
        
        sucesso.style.display = 'none'
  
        
        fetch('ajax/questionario.php', { method: 'GET' })

            .then(function (response) {

                return response.json()

            })

            .then(function (resposta) {

                let perguntas_e_opcoes = ''
                let questionario = resposta
                let perguntas = []

                questionario.forEach(function (linha) {

                    if (perguntas.indexOf(linha.nome_questionario) == -1) {



                        perguntas_e_opcoes += `<h1 class="text-dark mt-2">Bem Promotora Pesquisa</h1><br>

                                                <label class="text-dark"> Seu nome: </label><br>

                                                <input type='text' placeholder='Seu nome' name='nome' id="nome"><br>
                                               `

                    }

                    if (perguntas.indexOf(linha.descricao_pergunta) == -1) {



                        if (perguntas.length > 0) {

                            perguntas_e_opcoes += '</select><br>'
                        }




                        perguntas_e_opcoes += `<label class="text-dark px-2"for=${linha.id_pergunta}>${linha.descricao_pergunta}</label><br>

                                                <select  class="text-dark"name=${linha.id_pergunta} id=${linha.id_pergunta}>`

                    }



                    if (perguntas.indexOf(linha.descricao_opcao) == -1) {

                        perguntas_e_opcoes += `<option name='opcao' value=${linha.id_opcao}>${linha.descricao_opcao}</option>`

                    }

                    perguntas.push(linha.descricao_pergunta)
                    perguntas.push(linha.descricao_opcao)
                    perguntas.push(linha.nome_questionario)


                })

                formulario_pesquisa.innerHTML = perguntas_e_opcoes + '<br>'

                let btn = document.createElement('button')
                btn.innerText = 'Enviar'
                btn.classList.add('btn-formulario', 'btn', 'btn-dark', 'mt-4')
                formulario_pesquisa.appendChild(btn)

            })



    }

    


 

}
