// function switchTab() {
//     var xhttp = new XMLHttpRequest();
//     xhttp.onreadystatechange = function () {
//         if (this.readyState === 4 && this.status === 200) {
//             document.getElementById("content-container").innerHTML = this.responseText;
//         }
//     };
//     // xhttp.open("GET", "ajax_info.txt", true);
//     xhttp.open("GET","src/info.html",true);
//     xhttp.send();
// }

$(document).ready(function () {
    $('[id^=tab]').click(function () {
        tabLoad($(this).attr('data'));
    });
});

function tabLoad(entryURL) {
    $.ajax({
        type: 'GET',
        url: entryURL,
        context: $('#data'),
        success: function (data) {
            $(this).empty().html(data);
        }
    });
}

$("#leftRighter").click(function(){
//    alert('Hello !');
    if($('#menu').css('display')=='none'){
        $('#leftRighter').css('transform','rotate(0deg)');
//        $('#menu').css('display','flex');
        $('#menu').show();
    }else{
        $('#menu').hide();
        $('#leftRighter').css('transform','rotate(180deg)');
    }
});

// $.ajax({
//     type:"POST",
//     url:"lab6Table_simps.php",
//     data:{
//         x0:x0,
//         x1:x1
//     },
//     success:function(html){
//         $('#table').empty();
//         $('#table').append(html);
//     }
// });