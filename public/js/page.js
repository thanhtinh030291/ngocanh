$(document).ready(function() {

    setTimeout(
      function(){$('.alert-tb').slideUp()},3000
      );


    $("#nn-select-sort").on('change', function() {
        alert( this.value );
    });
    $("#nnavatar").click(function(){
        $("#nnavatarfile").click();
    }); 
    $("#nnicon").click(function(){
        $("#nniconfile").click();
    });
    
    $(".nn-basic-single").select2({
      placeholder: "Chọn khách hàng",
      allowClear: true
    });
    $("#nn-select-provice").select2({
      placeholder: "Chọn tỉnh thành",
      allowClear: true
    });
    $('#dataTables-example').DataTable({
        responsive: true
    });
    $('#dataTables-product-add').DataTable({
        responsive: true
    });
    $('#dataTables-customer').DataTable({
        responsive: true
    });

    $('#dataTables-product').DataTable({
        responsive: true
    });



    $(".nnedit").click(function(){
        
    });


});
function showimg(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#nnavatar')
        .attr('src', e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
function showicon(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#nnicon')
        .attr('src', e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
