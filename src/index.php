<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Oscar Awards</title>
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Oscar Awards Overview</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="maleFile" class="form-label">Upload Male CSV</label>
            <input class="form-control" type="file" id="maleFile" name="maleFile" required>
        </div>
        <div class="mb-3">
            <label for="femaleFile" class="form-label">Upload Female CSV</label>
            <input class="form-control" type="file" id="femaleFile" name="femaleFile" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload Files</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
