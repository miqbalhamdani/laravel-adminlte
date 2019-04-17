function deleteRow(link, id) {
  Swal({
    title: 'Are you sure?',
    text: 'You will not be able to recover this imaginary file!',
    type: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, delete it!',
    cancelButtonText: 'No, keep it'
  }).then((result) => {
    if (result.value) {
      $.ajax({
        type: "GET",
        url: `${link}/delete/${id}`,
        success: function() {
          swal({
            title: 'Deleted',
            text: 'Your data was successfully deleted!',
            type: 'success'
          }).then(function () {
            window.location.reload();
          });
        },
        failure: function() {
          swal(
            'Oops',
            'We couldnt connect to the server!',
            'error'
          );
        }
      })
    } else if (result.dismiss === Swal.DismissReason.cancel) {
      Swal(
        'Cancelled',
        'Your data is safe :)',
        'error'
      )
    }
  })
}