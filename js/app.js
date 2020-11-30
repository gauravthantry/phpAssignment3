function myImgRemoveFunctionOne() {
    document.getElementById('pic-preview').src = '../../images/default-profile.png';
    document.getElementById('choose-profile-img').value="";
  }

  function showPreviewOne(event){
    console.log(`Enetered showPreviewOne`);
    if(event.target.files.length > 0){
      let src = URL.createObjectURL(event.target.files[0]);
      console.log(`[URL]:${src}`)
      document.getElementById("img-src").value = src;
      console.log(`[profile pic src]: ${document.getElementById("img-src").value}`);
      let preview = document.getElementById("pic-preview");
      preview.src = src;
      preview.style.display = "block";
      
    } 
  }

  function check_pass() {
    setInterval(() => {
        if (document.getElementById('password').value ==
            document.getElementById('confirm-password').value) {
            document.getElementById('message').style.color = 'green';
            document.getElementById('message').innerHTML = 'matching';
            document.getElementById('submit').disabled = false;
            document.getElementById('message').style.display = 'block';
        } else {
            document.getElementById('message').style.color = 'red';
            document.getElementById('message').innerHTML = 'not matching';
            document.getElementById('submit').disabled = true;
            document.getElementById('message').style.display = 'block';
        }
    },200);
  }

  