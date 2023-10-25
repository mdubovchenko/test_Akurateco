<!DOCTYPE html>
<html>
<head>
    <title>Payment api</title>
    <meta charset="utf-8" />
</head>
<body>
<h2>Payment data</h2>
<form action="action.php" method="POST">
    <p>Email:<br>
        <input type="email" name="payer_email" placeholder="test@gmail.com"/></p>
    <p>First name:<br>
        <input type="text" name="payer_first_name" /></p>
    <p>Last name:<br>
        <input type="text" name="payer_last_name" /></p>
    <p>Country:<br>
        <input type="text" name="payer_country" /></p>
    <p>City:<br>
        <input type="text" name="payer_city" /></p>
    <p>Address:<br>
        <input type="text" name="payer_address" /></p>
    <p>ZIP:<br>
        <input type="text" name="payer_zip" /></p>
    <p>Phone number:<br>
        <input type="tel" name="payer_phone" inputmode="numeric" /></p>
    <p>Card number:<br>
        <input type="tel" name="card_number" placeholder="1234 1234 1234 1234" inputmode="numeric" maxlength="16" /></p>
    <p>Card exp month:<br>
        <input type="tel" name="card_exp_month" placeholder="MM" inputmode="numeric" maxlength="2" /></p>
    <p>Card exp year:<br>
        <input type="tel" name="card_exp_year" placeholder="YYYY" inputmode="numeric" maxlength="4" /></p>
    <p>Card CVV:<br>
        <input type="tel" name="card_cvv2" inputmode="numeric" maxlength="4"  /></p>
    <input type="submit" value="Submit">
</form>
</body>
</html>
