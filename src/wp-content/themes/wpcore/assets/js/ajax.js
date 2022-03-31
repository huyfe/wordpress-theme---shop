// jQuery(document).ready(function ($) {
//     $.ajax({
//         type: "post",
//         dataType: "json",
//         url: ajax_var.url,
//         data: {
//             action: "loadNewPost",
//         },
//         context: this,
//         beforeSend: function () {
//             // $('.animate-loader').css('visibility', "visible");
//         },
//         success: function (response) {
//             if (response.success) {
//             }
//             else {
//                 console.log('Error');
//             }
//         },
//         complete: function () {
//         },
//         error: function (_jqXHR, textStatus, errorThrown) {
//             console.log('The following error occured: ' + textStatus, errorThrown);
//         }
//     });
// });