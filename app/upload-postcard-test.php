<!DOCTYPE html>
<meta charset="utf-8" /> 
<html>
<head>
    <title>Page Title</title>
</head>

<body>
    
    <form action="upload-postcard.php" method="post" enctype="multipart/form-data">
        user id: <input type="text" name="uuid"> <br>
        postcard greetings: <input type="text" name="postcardGreetings"> <br>
        house number: <input type="text" name="houseNumber"> <br>
        street number: <input type="text" name="streetNumber"> <br>
        city: <input type="text" name="city"> <br>
        county: <input type="text" name="county"> <br>
        postcode: <input type="text" name="postcode"> <br>
        country: <input type="text" name="country"> <br>
        postcard location: <input type="text" name="postcardLocation"> <br>
        postcard head <input type="file" name="postcardFront"> <br>
        postcard back <input type="file" name="postcardBack"> <br>
	<input type="submit">

    </form>


</body>
</html>
