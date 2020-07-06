$('#address_customer_type').on('change', function(){
    let custType = $(this).val();
    if(custType === 'Magánszemély') {
      $('#address_tax_number').removeAttr('required');
      $('label[for="address_tax_number"]').removeClass('required');
    }else{
      $('#address_tax_number').attr('required', 'required');
      $('label[for="address_tax_number"]').addClass('required');
    }
  });