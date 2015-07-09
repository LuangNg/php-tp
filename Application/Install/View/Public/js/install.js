/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
alert('hehe');

$('step1-btn-next').bind('click', function () {
    $.ajax({
        url: 'Install/step2',
        success: function () {
        },
        statusCode: {404: function () {
            alert('page not found');
        }}
    });
});


