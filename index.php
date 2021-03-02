<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>WEBTE2_z1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/theme.default.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/jquery.tablesorter.js"></script>


<body>
<div id="title_container">
    <h1 style="text-align: center; margin-bottom: 0;font-size: 3rem; text-decoration: underline;">ZADANIE 1.</h1>
</div>
<div id="main_container" class="container-fluid">
    <div id="table_container" style="width: 700px">

    </div>

    <div id="form_container">
        <form method="POST" action="upload.php" id="form" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group filename_container">
                    <label for="filename" style="color: black">Filename</label>
                    <input name="filename" type="text" id="filename" class="form-control" placeholder="File name">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group filename_container">
                    <label for="upfile" style="color: black">Upload file</label>
                    <input name="upfile" type="file" class="form-control" id="upfile">
                </div>
            </div>
            <div class="form-group" id="button_container">
                <button type="button" id="submit" class="btn btn-outline-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
<div id="ftr">
    Adam Trebichalský, 98014
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="js/script.js"></script>
</body>
</html>

