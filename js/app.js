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

  function check_resetpass() {
    setInterval(() => {
        if (document.getElementById('newpassword').value ==
            document.getElementById('confirm-password').value) {
            document.getElementById('message').style.color = 'green';
            document.getElementById('message').innerHTML = 'matching';
            document.getElementById('submit').disabled = false;
            document.getElementById('message').style.display = 'block';
        } else {
            document.getElementById('message').style.color = 'red';
            document.getElementById('message').innerHTML = 'not matching';
            document.getElementById('submit').disabled = true;
            document.getElementById('message_reset').style.display = 'block';
        }
    },200);
  }