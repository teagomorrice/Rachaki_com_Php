'use strict'

const openModal = () => {
    clearFields()
    document.getElementById('modal').classList.add('active')
    }

const openModalEdit = (id) => 
    document.getElementById('modalEdit').classList.add('active')

window.addEventListener('openModalEdit', event=> {
    document.getElementById('modalEdit').classList.add('active')
})

window.addEventListener('closeModal', event=> {
    clearFields()
    document.getElementById('modal').classList.remove('active')
})

const closeModal = () => {
    clearFields()
    document.getElementById('modal').classList.remove('active')
}

const closeModalEdit = () => {
    document.getElementById('modalEdit').classList.remove('active')
}

const closeModalDelete = () => {
    document.getElementById('modalDelete').classList.remove('active')
}

window.addEventListener('closeModalEdit', event=> {
    document.getElementById('modalEdit').classList.remove('active')
})

window.addEventListener('openModalDelete', event=> {
    document.getElementById('modalDelete').classList.add('active')
})

window.addEventListener('closeModalDelete', event=> {
    document.getElementById('modalDelete').classList.remove('active')
})

const isValidFields = () => {
    return document.getElementById('form').reportValidity()
}

//Interação com o layout

const clearFields = () => {
    const fields = document.querySelectorAll('.modal-field')
    fields.forEach(field => field.value = "")
    document.getElementById('nome').dataset.index = 'new'
}

const saveClient = () => {
    debugger
    if (isValidFields()) {
        
        const index = document.getElementById('nome').dataset.index
        if (index == 'new') {
            createClient(client)
            updateTable()
            closeModal()
        } else {
            updateClient(index, client)
            updateTable()
            closeModal()
        }
    }
}

const createRow = (client, index) => {
    const newRow = document.createElement('tr')
    newRow.innerHTML = `
        <td>${client.nome}</td>
        <td>${client.esporte}</td>
        <td>${client.quant}</td>
        <td>${client.data}</td>
        <td>${client.local}</td>
        <td>${client.hora}</td>
        <td>
            <button type="button" class="button blue" onclick="location.href='${client.link}';" target="_blank">Entrar</button>
            <button type="button" class="button green" id="edit-${index}">Editar</button>
            <button type="button" class="button red" id="delete-${index}" >Excluir</button>
        </td>
    `
    document.querySelector('#tableClient>tbody').appendChild(newRow)
}

const clearTable = () => {
    const rows = document.querySelectorAll('#tableClient>tbody tr')
    rows.forEach(row => row.parentNode.removeChild(row))
}

const updateTable = () => {
    const dbClient = readClient()
    clearTable()
    dbClient.forEach(createRow)
}

function fillFields(client) {
    document.getElementById('nome').value = client.nome
    document.getElementById('esporte').value = client.esporte
    document.getElementById('quant').value = client.quant
    document.getElementById('data').value = client.data
    document.getElementById('local').value = client.local
    document.getElementById('hora').value = client.hora
    document.getElementById('link').value = client.link
    document.getElementById('nome').dataset.index = client.index
}

const editClient = (index) => {
    const client = readClient()[index]
    client.index = index
    fillFields(client)
    openModal()
}

const editDelete = (event) => {
    if (event.target.type == 'button') {

        const [action, index] = event.target.id.split('-')

        if (action == 'edit') {
            editClient(index)
        } else {
            const client = readClient()[index]
            const response = confirm(`Deseja realmente excluir a partida? ${client.nome}`)
            if (response) {
                deleteClient(index)
                updateTable()
            }
        }
        
    }
}



// Eventos
document.getElementById('cadastrarCliente')
    .addEventListener('click', openModal)

document.getElementById('modalClose')
    .addEventListener('click', closeModal)

document.getElementById('salvar')
    .addEventListener('click', saveClient)

document.querySelector('#tableClient>tbody')
    .addEventListener('click', editDelete)

document.getElementById('cancelar')
    .addEventListener('click', closeModal)