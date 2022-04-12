var FreelancingService = {
  init: function(){
    $('#addFreelancingForm').validate({
      submitHandler: function(form) {
        var freelancing = Object.fromEntries((new FormData(form)).entries());
        FreelancingService.add(freelancing);
      }
    });
    FreelancingService.list();
  },

  list: function(){
    $.get("rest/freelancingapps", function(data) {

      $("#freelancing-list").html("");

      var html = "";
      for (let i = 0; i < data.length; i++) {
        html += `
        <div class="col-lg-4">
          <h2>`+ data[i].created +`</h2>
          <p>`+ data[i].description +`</p>
          <p>
            <div class="btn-group" role="group">
              <button type="button" class="btn btn-primary freelancing-button" onclick="FreelancingService.get(`+data[i].id+`)">Edit</button>
              <button type="button" class="btn btn-danger freelancing-button" onclick="FreelancingService.delete(`+data[i].id+`)">Delete</button>
            </div>
          </p>
        </div> `;
      }
      $("#freelancing-list").html(html);
    });
  },

  get: function(id){
    $('.freelancing-button').attr('disabled', true);
    $.get('rest/freelancingapps/'+id, function(data){
      $("#description").val(data.description);
      $("#id").val(data.id);
      $("#created").val(data.created);
      $("#exampleModal").modal("show");
      $('.freelancing-button').attr('disabled', false);
    })
  },

  add: function(freelancing){
    $.ajax({
      url: 'rest/freelancingapps/',
      type: 'POST',
      data: JSON.stringify(freelancing),
      contentType: "application/json",
      dataType: "json",
      success: function(result) {
        $("freelancing-list").html('<div class="spinning-border" role="status"> <span class="sr-only"> </span> </div>');
        FreelancingService.list(); // performance optimization
        console.log(result);
        $("#addFreelancingModal").modal("hide");
      }
    });
  },

  update: function(){
    $('.save-freelancing-button').attr('disabled', true);
    var freelancing = {};
    freelancing.description = $('#description').val();
    freelancing.created = $('#created').val();

    $.ajax({
      url: 'rest/freelancingapps/'+$('#id').val(),
      type: 'PUT',
      data: JSON.stringify(freelancing),
      contentType: "application/json",
      dataType: "json",
      success: function(result) {
        $("#exampleModal").modal("hide");
        $('.save-freelancing-button').attr('disabled', false);
        $("freelancing-list").html('<div class="spinning-border" role="status"> <span class="sr-only"> </span> </div>');
        FreelancingService.list(); // performance optimization
      }
    });
  },

  delete: function(id){
    $('.freelancing-button').attr('disabled', true);
    $.ajax({
      url: 'rest/freelancingapps/'+id,
      type: 'DELETE',
      success: function(result) {
        $("freelancing-list").html('<div class="spinning-border" role="status"> <span class="sr-only"> </span> </div>');
        FreelancingService.list();
      }
    });
  },
}
