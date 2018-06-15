// function readURL(input) {
//
//     if (input.files && input.files[0]) {
//         var reader = new FileReader();
//
//         reader.onload = function(e) {
//             $('#imgPreview').attr('src', e.target.result);
//         }
//
//         reader.readAsDataURL(input.files[0]);
//     }
// }
//
// $("#imgInput").change(function() {
//     readURL(this);
// });

var loadFile = function(event) {
    var output = document.getElementById('imgPreview');
    output.src = URL.createObjectURL(event.target.files[0]);
};