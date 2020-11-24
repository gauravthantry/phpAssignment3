function myImgRemoveFunctionOne() {
    document.getElementById('pic-preview').src = '../../images/default-profile.png';
    document.getElementById('choose-profile-img').value="";
  }

  function showPreviewOne(event){
    console.log(`Enetered showPreviewOne`);
    if(event.target.files.length > 0){
      let src = URL.createObjectURL(event.target.files[0]);
      console.log(`[URL]:${src}`)
      let preview = document.getElementById("pic-preview");
      preview.src = src;
      preview.style.display = "block";
    } 
  }