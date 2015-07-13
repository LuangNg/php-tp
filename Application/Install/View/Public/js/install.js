/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$("#chk-agree").bind("click", function () {
    if ($(this).is(':checked')) {
        $("#btn-agree").bind("click", function () {
            window.location.href = "install.php/Install/step1";
//            $.ajax({
//                url: "install.php/Install/step1",
//                type: "POST",
//                success: function (result) {
//                    alert(result.content);
//                },
//                statusCode:{404: function () {
//                                alert('file not found!');
//                            },
//                            500: function () {
//                                alert('Server Error!');
//                            }
//                }
//            });
        }).attr("disabled", false).addClass("btn-primary");
    } else {
        $("#btn-agree").unbind("click").attr("disabled", true).removeClass("btn-primary");
    }
});

$("#step1-btn-next").bind("click", function () {
    window.location.href = "step2";
//    $.ajax({
//        url: "install.php/Install/step2",
//        type: "POST",
//        success: function (result) {
//            alert(result.content);
//        },
//        statusCode:{404: function () {
//                        alert('file not found!');
//                    },
//                    500: function () {
//                        alert('Server Error!');
//                    }
//        }
//    });
});

$("#step2-btn-next").bind("click", function () {
    window.location.href = "step3";
});

$("#step3-btn-next").bind("click", function () {
    window.location.href = "step4";
});


