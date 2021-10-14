<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
	<base href="<?php echo base_url() ?>">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<style type="text/css">
		body {
            background: #fff !important;
        }
        .card {
            border: 1px solid #28a745;
        }
        .card-login {
            margin-top: 130px;
            padding: 18px;
            max-width: 30rem;
        }

        .card-header {
            color: #fff;
            /*background: #ff0000;*/
            font-family: sans-serif;
            font-size: 20px;
            font-weight: 600 !important;
            margin-top: 10px;
            border-bottom: 0;
        }

        .input-group-prepend span{
            width: 50px;
            background-color: #ff0000;
            color: #fff;
            border:0 !important;
        }

        input:focus{
            outline: 0 0 0 0  !important;
            box-shadow: 0 0 0 0 !important;
        }

        .login_btn{
            width: 130px;
        }

        .login_btn:hover{
            color: #fff;
            background-color: #ff0000;
        }

        .btn-outline-danger {
            color: #fff;
            font-size: 18px;
            background-color: #28a745;
            background-image: none;
            border-color: #28a745;
        }

        .form-control {
            display: block;
            width: 100%;
            height: calc(2.25rem + 2px);
            padding: 0.375rem 0.75rem;
            font-size: 1.2rem;
            line-height: 1.6;
            color: #28a745;
            background-color: transparent;
            background-clip: padding-box;
            border: 1px solid #28a745;
            border-radius: 0;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .input-group-text {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding: 0.375rem 0.75rem;
            margin-bottom: 0;
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1.6;
            color: #495057;
            text-align: center;
            white-space: nowrap;
            background-color: #e9ecef;
            border: 1px solid #ced4da;
            border-radius: 0;
        }
	</style>
</head>
<body>


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
<div class="container">
    <div class="card card-login mx-auto text-center">
        <div class="card-header mx-auto" style="background-color: #fff">
            <span> <img src="image/logo.png" class="w-50" alt="Logo"> </span><br/>
		<span class="logo_title mt-5" style="color: black;"> Register</span>

        </div>
        <div class="card-body">
            <form action="login/aksi_daftar" method="post">
                <div class="form-group">
                    <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" class="form-control">
                </div>

                <div class="form-group">
                    <input type="email" name="email" placeholder="Email" class="form-control">
                </div>

                <div class="form-group">
                    <input type="text" name="jabatan" placeholder="Jabatan" class="form-control">
                </div>

                <div class="form-group">
                    <textarea class="form-control" name="alamat" placeholder="Alamat"></textarea>
                </div>

                <div class="form-group">
                    <input type="text" name="username" placeholder="Username" class="form-control">
                </div>

                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" class="form-control">
                </div>

                <div class="form-group">
                    <button class="btn btn-success btn-block" type="submit">Register</button>
                </div>

            </form>
        </div>
    </div>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script type="text/javascript"><?php echo $this->session->userdata('message') ?></script>
</body>
</html>