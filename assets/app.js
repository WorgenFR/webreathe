import './styles/app.css';
import $ from 'jquery';

require('bootstrap')

$('#add-module').on('click', function(){
    console.log('add')
    $('#add-bloc').removeClass('d-none')
    $('#add-module').addClass('d-none')
})

$('#valid-add').on('click', function (){
    let name = $('#input-name').val()

    if(name !== ''){
        $.ajax({
            type: 'POST',
            data: {'name': name},
            url: '/add_module',
            success: function(data){
                console.log(data)
            }
        });
    }
})

$('.valid-delete').on('click', function (){
    let id = $(this).data('id');
    console.log(id)
    if(id !== undefined){
        $.ajax({
            type: 'POST',
            data: {'id': id},
            url: '/delete_module',
            success: function(data){
                console.log('delete')
            }
        });
    }

})

$('#valid-cancel').on('click', function (){
    $('#add-module').removeClass('d-none')
    $('#add-bloc').addClass('d-none')

})

