const addForm = document.getElementById('add-user-form')
const updateForm = document.getElementById('edit-user-form')
const showAlert = document.getElementById('showAlert')
const addUserBtn = document.getElementById('add-user-btn')
const updateUserBtn = document.getElementById('edit-user-btn')
const tbody = document.querySelector('tbody')

// add new user fetch request
addForm.addEventListener('submit', async e => {
    e.preventDefault()
    const formData = new FormData(addForm)

    formData.append('add', 1)
    if (addForm.checkValidity() === false) {
        e.preventDefault()
        e.stopPropagation()
        addForm.classList.add('was-validated')
        return false
    } else {
        addUserBtn.value = 'please wait...'
        const data = await fetch('action.php', {
            method: 'POST',
            body: formData
        })
        const res = await data.text()
        // reset form, hide modal,
        showAlert.innerHTML = res
        addUserBtn.value = 'Add user'
        addForm.reset()
        addForm.classList.remove('was-validated')
        fetchAllUsers()
        document.getElementById('modal1').click()
    }
})

// fetch all users fetch request
const fetchAllUsers = async () => {
    const data = await fetch('action.php?read=1', {
        method: 'GET'
    })
    const res = await data.text();
    tbody.innerHTML = res
}
fetchAllUsers()

// edit user fetch

tbody.addEventListener('click', e => {
    if (e.target && e.target.matches('button.editLink')) {
        e.preventDefault()
        let id = e.target.id
        editUser(id)
    }
})

const editUser = async id => {
    const data = await fetch(`action.php?edit=1&id=${id}`, {
        method: 'GET'
    })
    const res = await data.json()

    document.getElementById('id').value = res.id
    document.getElementById('fname').value = res.first_name
    document.getElementById('lname').value = res.last_name
    document.getElementById('email').value = res.email
    document.getElementById('phone').value = res.phone
}

// update user fetch request
updateForm.addEventListener('submit', async e => {
    e.preventDefault()
    const formData = new FormData(updateForm)
    formData.append('update', 1)
    if (updateForm.checkValidity() === false) {
        e.preventDefault()
        e.stopPropagation()
        updateForm.classList.add('was-validated')
        return false
    } else {
        updateUserBtn.value = 'please wait...'
        const data = await fetch('action.php', {
            method: 'POST',
            body: formData
        })
        const res = await data.text()
        // reset form, hide modal,
        showAlert.innerHTML = res
        updateUserBtn.value = 'Edit user'
        updateForm.classList.remove('was-validated')
        fetchAllUsers()
        document.getElementById('modal2').click()
    }
})

// delete user fetch request
tbody.addEventListener('click', e => {
    if (e.target && e.target.matches('button.deleteLink')) {
        e.preventDefault()
        let id = e.target.id
        deleteUser(id)
        fetchAllUsers()
    }
})

const deleteUser = async (id) => {
    const data = await fetch(`action.php?delete=1&id=${id}`,{
        method: 'GET'
    })
    const res = await data.text();
    showAlert.innerHTML = res
}