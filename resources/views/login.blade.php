<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Register UI</title>
  <style>
    *{
      margin:0;
      padding:0;
      box-sizing:border-box;
      font-family:Arial, Helvetica, sans-serif;
    }
    body{
      background:#dfe6f1;
      display:flex;
      justify-content:center;
      align-items:center;
      height:100vh;
    }
    .container{
      width:850px;
      height:450px;
      background:white;
      border-radius:8px;
      display:flex;
      overflow:hidden;
      box-shadow:0 10px 25px rgba(0,0,0,0.1);
    }
    .left-panel{
      width:40%;
      background:linear-gradient(to bottom,#2f5fa7,#1d4077);
      color:white;
      padding:50px 30px;
      display:flex;
      flex-direction:column;
      justify-content:center;
      text-align:center;
    }
    .left-panel h2{
      margin-bottom:10px;
      font-size:24px;
    }
    .left-panel p{
      font-size:14px;
      line-height:22px;
      margin-bottom:30px;
    }
    .left-panel button{
      padding:10px 30px;
      border:none;
      background:white;
      color:#1d4077;
      cursor:pointer;
      border-radius:4px;
      font-weight:bold;
    }
    .right-panel{
      width:60%;
      padding:40px;
    }
    .right-panel h2{
      color:#2f5fa7;
      margin-bottom:10px;
    }
    .social-icons{
      margin:10px 0;
    }
    .social-icons a{
      text-decoration:none;
      border:1px solid #888;
      padding:8px 12px;
      border-radius:50%;
      margin:0 5px;
      color:#555;
      font-size:14px;
    }
    .input-box{
      width:100%;
      margin-top:15px;
    }
    .input-box input{
      width:100%;
      padding:10px;
      border:1px solid #aaa;
      border-radius:4px;
    }
    .btn{
      background:#2f5fa7;
      color:white;
      width:100%;
      padding:10px;
      margin-top:20px;
      border:none;
      border-radius:4px;
      cursor:pointer;
      font-weight:bold;
    }
  </style>
</head>
<body>

<div class="container">
  <!-- Left Panel -->
  <div class="left-panel">
    <h2>WELCOME BACK!</h2>
    <p>Already have an account? Click below to continue using the service.</p>
    <button>SIGN IN</button>
  </div>

  <!-- Right Panel -->
  <div class="right-panel">
    <h2>Create Account</h2>
    <div class="social-icons">
      <a href="#">f</a>
      <a href="#">t</a>
      <a href="#">in</a>
    </div>
    <small>or use your email account</small>

    <div class="input-box">
      <input type="text" placeholder="Username">
    </div>
    <div class="input-box">
      <input type="email" placeholder="Email">
    </div>
    <div class="input-box">
      <input type="password" placeholder="Password">
    </div>
    <button class="btn">SIGN UP</button>
  </div>
</div>

</body>
</html>
