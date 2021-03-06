<meta name='viewport' content='width=device-width, initial-scale=1'>
<title>Mama Mimi</title>
<link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>
<link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
<script type='text/javascript' src=''></script>
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
<script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script>

<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

<title>Hexashop Ecommerce HTML CSS Template</title>


<!-- Additional CSS Files -->
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

<link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

<link rel="stylesheet" href="assets/css/owl-carousel.css">

<link rel="stylesheet" href="assets/css/lightbox.css">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<style>

  @import url('https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Poppins&display=swap');

  * {
      padding: 0;
      margin: 0;
      box-sizing: border-box
  }

  body {
      background-color: #eee;
      height: 100vh;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to top, #fff 10%, rgba(93, 42, 141, 0.4) 90%) no-repeat
  }

  .wrapper {
      max-width: 500px;
      border-radius: 10px;
      margin: 50px auto;
      padding: 30px 40px;
      box-shadow: 20px 20px 80px rgb(206, 206, 206)
  }

  .h2 {
      font-family: 'Kaushan Script', cursive;
      font-size: 3.5rem;
      font-weight: bold;
      color: #ff69b4;
      font-style: italic
  }

  .h4 {
      font-family: 'Poppins', sans-serif
  }

  .input-field {
      border-radius: 5px;
      padding: 5px;
      display: flex;
      align-items: center;
      cursor: pointer;
      border: 1px solid #400485;
      color: #400485
  }

  .input-field:hover {
      color: #7b4ca0;
      border: 1px solid #7b4ca0
  }

  input {
      border: none;
      outline: none;
      box-shadow: none;
      width: 100%;
      padding: 0px 2px;
      font-family: 'Poppins', sans-serif
  }

  .fa-eye-slash.btn {
      border: none;
      outline: none;
      box-shadow: none
  }

  a {
      text-decoration: none;
      color: #400485;
      font-weight: 700
  }

  a:hover {
      text-decoration: none;
      color: #7b4ca0
  }

  .option {
      position: relative;
      padding-left: 30px;
      cursor: pointer
  }

  .option label.text-muted {
      display: block;
      cursor: pointer
  }

  .option input {
      display: none
  }

  .checkmark {
      position: absolute;
      top: 3px;
      left: 0;
      height: 20px;
      width: 20px;
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 50%;
      cursor: pointer
  }

  .option input:checked~.checkmark:after {
      display: block
  }

  .option .checkmark:after {
      content: "";
      width: 13px;
      height: 13px;
      display: block;
      background: #400485;
      position: absolute;
      top: 48%;
      left: 53%;
      border-radius: 50%;
      transform: translate(-50%, -50%) scale(0);
      transition: 300ms ease-in-out 0s
  }

  .option input[type="radio"]:checked~.checkmark {
      background: #fff;
      transition: 300ms ease-in-out 0s;
      border: 1px solid #400485
  }

  .option input[type="radio"]:checked~.checkmark:after {
      transform: translate(-50%, -50%) scale(1)
  }

  .btn.btn-block {
      border-radius: 20px;
      background-color: #400485;
      color: #fff
  }

  .btn.btn-block:hover {
      background-color: #55268be0
  }

  @media(max-width: 575px) {
      .wrapper {
          margin: 10px
      }
  }

  @media(max-width:424px) {
      .wrapper {
          padding: 30px 10px;
          margin: 5px
      }

      .option {
          position: relative;
          padding-left: 22px
      }

      .option label.text-muted {
          font-size: 0.95rem
      }

      .checkmark {
          position: absolute;
          top: 2px
      }

      .option .checkmark:after {
          top: 50%
      }

      #forgot {
          font-size: 0.95rem
      }
  }
</style>

<body oncontextmenu='return false' class='snippet-body'>
    <div class="wrapper bg-white">
      <div class="h2 text-center">Mama Mimi</div>
        <div class="h4 text-muted text-center pt-2">Enter your data</div>
          <form class="pt-3" method="POST" action="proses/action_signup.php">

              <div class="form-group py-2">
                  <div class="input-field"> <span class="far fa-user p-2"></span> <input type="text" placeholder="Nama Lengkap" required class="nama_lengkap" name="nama_lengkap"> </div>
              </div>

              <div class="form-group py-2">
                  <div class="input-field"> <span class="far fa-user p-2"></span> <input type="text" placeholder="Username" required class="username" name="username"> </div>
              </div>

              <div class="form-group py-2">
                  <div class="input-field">&nbsp;<span class="fas fa-envelope"></span>&nbsp;<input type="text" placeholder="Email" required class="" name="email"> </div>
              </div>

                <div class="form-group py-2">
                  <div class="input-field"> &nbsp;<i class="fas fa-phone"></i>&nbsp; <input type="text" placeholder="No Telepon" required class="" name="no_tlp"> </div>
              </div>

              <div class="form-group py-1 pb-2">
                  <div class="input-field"> <span class="fas fa-lock p-2"></span> 
                    <input type="Password" name="password" placeholder="Enter your Password" id="password" required> 
                    <a class="btn bg-white text-muted show-password" onclick="show_password()"> 
                    <span class="icons"></span>
                    </a> 
              </div>
              </div>
              <div class="d-flex align-items-start">
               
                 
              </div> <button class="btn btn-block text-center my-3">Buat Akun</button>
              
          </form>
        </div>
    </div>
</body>

<script type='text/javascript'>
      
      $('.icons').html('<span class="far fa-eye-slash"></span>');
      function show_password()
      {
        var x = document.getElementById("password");

        if(x.type === 'password')
        {
          x.type ="text";
          $('.icons').html('<i class="fas fa-eye"></i>');
        } else 
        {
          x.type ="password";
          $('.icons').html('<i class="fas fa-eye-slash"></i>');
        }
      }


      $('.username').click(function(e) 
      {
          var nama_lengkap = $('.nama_lengkap').val();
          var username      = $('.username').val();

          if(username =='')
          {
              $.ajax({
                  url: "generate_uname.php",
                  type: "POST",   
                  data:  {nama_lengkap : nama_lengkap},       
                  dataType: "JSON",
                  success: function(data) 
                  {
                    $('.username').val(data);
                  }
              });
          }
      });
        
</script>


              