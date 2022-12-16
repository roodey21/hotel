var createModal = new bootstrap.Modal($('#modal-create-user'));

$('#submit-user-create').on('click', function(e) {
    let form = $('#form-user-create');
    let formData = new FormData(form[0]);
    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

    console.log(...formData);
    $.ajax({
        url: 'users/create',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
            createModal.hide();
            Toast.fire({
                icon: 'success',
                title: data.message
            })
            getUsers();
        },
        error: function(err) {
            Toast.fire({
                icon: 'error',
                title: err.responseText
            });
            console.log(err);
        }
    });
});
