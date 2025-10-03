const idByType = {
  [CENTER_TYPE]: '#centerConvocationsTable',
  [DEPARTMENT_TYPE]: '#deparmentConvocationsTable',
};

function showSeats(type) {
  if (type == CENTER_TYPE) {
    $('#centerSeatsContainer').show();
    $('#deptSeatsContainer').hide();
  } else if (type == DEPARTMENT_TYPE) {
    $('#centerSeatsContainer').hide();
    $('#deptSeatsContainer').show();
  } else if (!type) {
    $('#centerSeatsContainer').hide();
    $('#deptSeatsContainer').hide();
  }
}

$(function () {
  $('#type').on('change', function () {
    showSeats($(this).val());
  });
});
