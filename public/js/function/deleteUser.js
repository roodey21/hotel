$('body').on('click','.delete-btn', function(e){
    e.preventDefault();
    let url = window.location.href
    console.log(url);

    let id = $(this).data('id');
    // console.log(id);
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          deleteUser(id, url);
        }
    });
})

function deleteUser(id, url){
    const token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url:`users/${id}/delete`,
        type:'DELETE',
        data:{
            'id':id,
            '_token': token
        },
        success:function(response){
            console.log(response)
            Swal.fire(
                'Deleted!',
                'User has been deleted.',
                'success'
            )
        },
        error:function(err){
            console.log(err)
        }
    }).then(function(){
        getUsers(url);
        // $.ajax({
        //     url:url
        // }).done(function(data){
        //     $('.page-body').html(data);
        // });
    });
}
