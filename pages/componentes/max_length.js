$('textarea#message_area').on('keyup',function() 
{
  var maxlen = $(this).attr('maxlength');
  
  var length = $(this).val().length;
  if(length > (maxlen-1) ){
    $('#textarea_message').text('Se completaron los '+maxlen+' Caracteres maximos!')
  }
  else
    {
      $('#textarea_message').text('');
    }
});