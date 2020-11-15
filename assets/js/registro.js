const fotoSource = document.getElementById('fotoImagen');
const file = document.getElementById('foto');


function filePreview(input){  

    console.log(input.files[0].name);

    if(input.files && input.files[0])
    {
        var reader =    new FileReader();
        reader.onload = function(e){
            $('#imagePreview').html(" <img src='"+e.name+"' />");
        }

    //   console.log('Hola '+e.target.value);
      reader.readAsDataURL(input.files[0]);

    }
  }
    // console.log(fotoSource);
    // console.log(file.value);
    // fotoSource.setAttribute('srcset',file.value);
