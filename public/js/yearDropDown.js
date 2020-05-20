$('#dropdownYear').each(function() {

    var year = (new Date()).getFullYear();
    var current = year;
    year -= 125;
    for (var i = 0; i < 126; i++) {
      if ((year+i) == current)
        $(this).append('<option selected value="' + (year + i) + '">' + (year + i) + '</option>');
      else
        $(this).append('<option value="' + (year + i) + '">' + (year + i) + '</option>');
    }

  })
