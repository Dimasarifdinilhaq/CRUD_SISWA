<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        body{
            *margin: 0;
            padding: 0;
        }
        .container{
            height: 100px;
            width: 100%;
            background-color: lightcyan;
        }

        a button{
            background: red;
            padding: 10px 30px;
            color: white;
            border: none;
            border-radius: 5px;
            margin: 200px 0 0 400px;
        }
    </style>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css">
</head>
<body>
    <div class="container">
        <a href=""><button>Guru</button></a>
        <a href="/admin"><button>Siswa</button></a>
    </div>
</body>
<script>
    $(document).ready(function(){
        loaddata()
        Swal.fire(  
            title: "Good job!",
            text: "You clicked the button!",
            icon: "success"
)
    })
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js"></script>
</html>
