/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {
    $('.btVote').click(function(){
        
        $.ajax({
            'url': $(this).attr('data-url'),
            'dataType': 'json',
            'success': function(data) {
                if(data.result == 1){
                    $('#vote' + data.id).html( data.vote)
                }
            },
            'error': function(){
                alert('Probleme lors de la validation');
            }
        });
    });
});

