const inpFile = document.getElementById("inpuFile");
const previewContainer = document.getElementById("imagePreview");
console.log(previewContainer);
const previewImage = previewContainer.querySelector(".image--preview__image");
const previewDefaultText = previewContainer.querySelector(".Image-preview__default-text");

inpFile.addEventListener("change", function () {
    const file = this.files[0];
    console.log(file);
    
});


function sendForm() {
    var valido = false; //DEBERIAS REALIZAR LAS VALIDACIONES
    alert("ENTRO SEND");
    alert("valido: " + valido);
    if (valido) {
      document.getElementById("myForm").submit();
    } else {
      alert("VALIDA LOS CAMPOS");
      return false;
    }
  }
