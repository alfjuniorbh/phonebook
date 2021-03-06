$(document).ready(function(){
  var maxField = 20;
  var addButton = $('.add_button');
  var wrapper = $('.field_wrapper');
  var x = 1;
  var i = 2;
  
  //Add button is clicked limit max field
  $(addButton).click(function(){
      if(x < maxField){ 
          x++;
          $(wrapper).append('<div class="input-group input-group mb-3">\
            <select class="custom-select mr-3 mr-3 border-radius" id="inputGroupSelect01" name="phone['+ i +'][type]" required>\
                <option value="1">Phone</option>\
                <option value="2">WhatsApp</option>\
            </select>\
            <input type="text" class="form-control no-border-radius-right" name="phone['+ i +'][phone]" placeholder="Phone number" required>\
            <div class="input-group-prepend">\
                 <span class="input-group-text remove_button button-group">[X]</span>\
            </div>\
            </div>'
          );
      }
      i++;
  });
  
  //Remove button is clicked
  $(wrapper).on('click', '.remove_button', function(e){
      e.preventDefault();
      $(this).closest('.input-group').remove();
      x--;
  });
});