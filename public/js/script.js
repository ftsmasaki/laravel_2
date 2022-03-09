$(document).on('ontouched click', '.autocomplete', function(){
    var text = $(this).data('autocomplete');
    var target = $(this).data('target');
    $('input[name="' + target + '"]').val(text);
});