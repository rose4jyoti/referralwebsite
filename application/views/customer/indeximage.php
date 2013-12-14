<html>
    <head>
        <title>Upload Avatar</title>
    </head>
    <body>
        <h1>Upload your avatar</h1>
        <form id="upload-form" action="<?php echo URL::site('avatar/upload') ?>" method="post" enctype="multipart/form-data">
            <p>Choose file:</p>
            <p><input type="file" name="avatar" id="avatar" /></p>
            <p><input type="submit" name="submit" id="submit" value="Upload" /></p>
        </form>
    </body>
</html>