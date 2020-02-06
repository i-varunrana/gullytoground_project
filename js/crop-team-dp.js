$(document).ready(function(){
    
    var image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width:250,
      height:250,
      type:'circle' //circle
    },
    boundary:{
      width:300,
      height:300
    }
    });
    
    
     $('#input-image').on('change', function(){
    var reader = new FileReader();
    reader.onload = function (event) {
      image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');
    });
    
    $('#upload-btn').click(function(event){
    image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
      $.ajax({
        text: console.log(response),  
        url: BASE_URL+"ControlUnit/uploadTeamDp",
        type: "POST",
        data:{"image": response},
        success:function(response)
        {
            console.log(response);
            if(response)
            {
              $('#uploadimageModal').modal('hide');
              $('.upload-dp').attr('src',response);
              $('.user-avatar').attr('src',response);
              $(".upload-dp").load(location.href + " .upload-dp>*","");  
              $(".user-avatar").load(location.href + " .user-avatar>*",""); 
              swal
              ({
                    title: "Successfully Updated",
                    text: "Photo is successfully updated",
                    icon: "success",
                    button: "ok",
              });
            }
            else 
            {
               swal
              ({
                    title: "Something bad happened!!",
                    icon: "error",
                    button: "ok",
              });
            }
        }
      });
    })
    });

});