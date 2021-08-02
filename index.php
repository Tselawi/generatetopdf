<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Generate the mPDF</title>
</head>
<body>

    <div class="container mt-5">

        <form class="offset-md-3 col-md-6" method="post" action="https://vgeneratepdf.herokuapp.com/pdfapp/makepdf.php">

        <h1>Create your volonteer passport</h1>
            <p>Fill out the details below and the PDF will download.</p>
            <div class="row mb-2">
                <div class="col-md-6">
                    <input type="text" name="fname" placeholder="First Name" class="form-control">
                </div>
                <div class="col-md-6">
                    <input type="text" name="lname" placeholder="Last name" class="form-control">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6">
                        <input type="text" name="gender" placeholder="Sex" class="form-control">
                </div>
                <div class=col-md-6>
                    <input type="text" name="member" placeholder="membership number" class="form-control">
                </div>
            </div>
            <div class="mb-2">
                <input type="date" name="date" placeholder="Birth date" class="form-control">
            </div>
            <div class="mb-2">
                <input type="text" name="nationality" placeholder="Nationality" class="form-control">
            </div>
            <div class="mb-2">
                <input type="text" name="adress" placeholder="Current address" class="form-control">
            </div>
            <div class="row mb-2">
                <div class="col-md-6">
                    <input type="text" name="city" placeholder="City" class="form-control">
                </div>
                <div class="col-md-6">
                    <input type="text" name="country" placeholder="Country" class="form-control">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6">
                    <input type="phone" name="phone" placeholder="Mobile phone" class="form-control">
                </div>
                <div class="col-md-6">
                    <input type="text" name="emergency" placeholder="Emergency number" class="form-control">
                </div>
            </div>

            <button type="submit" class="btn btn-success btn-lg form-control">Create PDF</button>


        </form>
    </div>
    
</body>
</html>