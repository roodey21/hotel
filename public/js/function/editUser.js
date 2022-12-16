var editModal = new bootstrap.Modal($('#modal-edit-user'));

$('body').on('click','.edit-btn',function(e){
    e.preventDefault();
    let id = $(this).data('id');

    $.ajax({
        url: `users/${id}/edit`,
        type: 'GET',
        data: {
            id:id
        },
        success: function(res){
            console.log(res);
            var roles = res.data.roles;
            editModal.toggle();
            $('#user_id').val(res.data.id);
            $('#user_name').val(res.data.name);
            $('#user_email').val(res.data.email);
            if(Array.isArray(roles) && roles.length !== 0){
                $('#user_role').val(res.data.roles[0].id)
            }
        },
        error: function(err){
            Swal.fire(
                'Error!',
                err.textJSON,
                'error'
            )
            console.log(err)
        }
    });
});

$('#submit-user-edit').on('click',function(e){
    e.preventDefault();
    let formEdit = $('#form-user-edit')[0];
    let formData = new FormData(formEdit);
    formData.append('_method','PATCH');
    let url = window.location.href

    let id = $('#user_id').val();
    $.ajax({
        url: `users/${id}/update`,
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(res){
            console.log(res);
            editModal.toggle();
            Toast.fire({
                icon: 'success',
                title: res.message
            });
        },
        error: function(err){
            Toast.fire({
                icon: 'error',
                title: err.responseText
            });
            console.log(err);
        }
    }).then(()=>getUsers(url));
});
