$(function(){
    let edit = false;
    fetchTasks();
/*Cuando tipee una letra en nuestro input de busqueda*/
   $('#search').keyup(function (e) {
       $("#task-result").css("display", "none");

       if($('#search').val()){
          /*Obtenemos el valor del input*/
          let search = $('#search').val();
          /*Enviando al servidor*/
          $.ajax({
              url:'taskSearch.php', //pa' donde?
              type: 'POST',  //Como post o get
              data: {search:search}, //que envias?
              success: function (response) {
                  /*Arreglo si funciona*/
                  let tasks = JSON.parse(response);
                  let template = '';
                  tasks.forEach(task => {
                      template += `<li>
                        ${task.name}
                    </li>`;
              });

              /*La mostramos en nuestra pagina*/
              $("#container").html(template);
              $("#task-result").css("display", "block");

              }
          })
      }
   })

    /*Agregando task*/
    $('#task-form').submit(function (e) {
        const postData = {
            name: $('#name').val(),
            description: $('#description').val(),
            id: $('#taskId').val()
        };
        let url = edit === false ? 'taskAdd.php' : 'taskEdit.php';
        /*cuando enviemos*/
        console.log(url);
        $.post(url, postData, function (response) {
            console.log(response);
            fetchTasks();
            $('#task-form').trigger('reset');
        })
        e.preventDefault();
    })

    /*Llenando lista*/

    function fetchTasks() {
        $.ajax({
            url: 'taskList.php',
            type: 'GET',
            success: function (response) {
                let template = '';
                let tasks = JSON.parse(response);
                tasks.forEach(task => {
                    template += `
                    <tr taskId="${task.id}">
                        <td>${task.id}</td>
                        <td><a href="#" class="task-item">${task.name}</a></td>
                        <td>${task.description}</td>
                        <td><button class='btn btn-danger task-delete'>Eliminar</button></td>
                    </tr>
                `;
            });
                $('#tasks').html(template);
            }
        });
    }

    $(document).on('click', '.task-delete', function () {
        if(confirm('Estas seguro de querer eliminarlo?')){
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('taskId');
            $.post('taskDelete.php', {id}, function (response) {
                fetchTasks();
            });
        }
    })
    
    $(document).on('click','.task-item',function () {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('taskId');
        $.post('taskSingle.php', {id}, function (response) {
            const task = JSON.parse(response);
            $('#name').val(task.name);
            $('#description').val(task.description);
            $('#taskId').val(task.id);
            edit = true;
        })
    })
});