// Delete row with swal
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

// Tinymce
tinymce.init({
  selector: 'textarea#editor1',
  height: 200,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor textcolor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table paste code help wordcount'
  ],
  toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tiny.cloud/css/codepen.min.css'
  ]
});

// dataTable
$('#example1').DataTable()

// magnificPopup
$(document).ready(function() {
  $('.image-link').magnificPopup({type:'image'});
});