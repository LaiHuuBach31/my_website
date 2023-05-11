$('.check_box_wrapper').on('click', function() {
    $(this).parents('.card').find('.check_box_children').prop('checked', $(this).prop('checked'));
  });

  $('.check_all').on('click', function() {
    $(this).parents().find('.check_box_children').prop('checked', $(this).prop('checked'));
    $(this).parents().find('.check_box_wrapper').prop('checked', $(this).prop('checked'));
  });