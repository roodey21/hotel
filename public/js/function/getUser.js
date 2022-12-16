function getUser(id){
    $.ajax({
        url: `users/${id}/edit`,
        type: 'GET',
        data: {
            id:id
        },
        success: function(res){
            console.log(res)
        },
        error: function(err){
            console.log(err)
        }
    });

}

function getUsers(url = '/users') {
    $.ajax({
        url: url
    }).done(function(data) {
        $('.page-body').html(data);
    }).fail(function() {
        console.log('Users data cannot be loaded');
    });
}
