<!DOCTYPE html>
<meta charset="utf-8" /> 
<html>
<head>
    <title>Page Title</title>
</head>

<body>

    <form action="get-price.php" method="post">
        <hr>
            Original country:
            <select name="originalCountry">
                <option value="IE">Ireland</option>
                <option value="CN">China</option>
                <option value="GB">England</option>
                <option value="XX">Other country</option>
            </select>
            Destination country:
            <select name="destinationCountry">
                <option value="IE">Ireland</option>
                <option value="CN">China</option>
                <option value="GB">England</option>
                <option value="XX">Other country</option>
            </select>
	    Payment type: <input type="text" name="paymentType">
	    <input type="submit">
        <hr>
    </form>

</body>
</html>
