$(document).ready(function(){
    
    var image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width:370,
      height:127,
      type:'square' //circle
    },
    boundary:{
      width:400,
      height:155
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
        url: BASE_URL+"ControlUnit/uploadBanner",
        type: "POST",
        data:{"image": response},
        success:function(response)
        {
            console.log(response);
            if(response)
            {
              $('#uploadimageModal').modal('hide');
              $('#add-banner-img').addClass('bnr');
              $('.add-tournament-bg').css('background-color','white');
              $('#add-banner-img').attr('src',BASE_URL+response);
              $('.register-tournament-btn').attr('data-img',BASE_URL+response);
              $(".add-banner-img").load(location.href + " .upload-dp>*","");
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