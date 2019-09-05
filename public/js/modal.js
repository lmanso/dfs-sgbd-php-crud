$('#update').on('show.bs.modal', function(e) {
    var button = $(e.relatedTarget) // Button that triggered the modal
    var recipient = button.data('bookid') // Extract info from data-bookid
    var modal = $(this) 
    modal.find('input[name="bookid"]').val(recipient); // Put value from recipient to the input
}); 