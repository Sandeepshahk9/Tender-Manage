var values = [15000, 18000, 22000, 27000, 30000, 50000, 75000, 125000, 150000, 270000, 350000, 600000, 750000];
var slider = $('#price-slider').slider({
      range: true,
      steps: values,
      create: function(e, ui){
      $('#price-slider').slider('values', 1, values.length - 1);
      $('#min_price').val(values[0]);
      $('#max_price').val(values[values.length - 1]);
      },
     slide: function(event, ui){
       $('#min_price').val(ui.stepValue[0]);
       $('#max_price').val(ui.stepValue[1]);
     }
  });