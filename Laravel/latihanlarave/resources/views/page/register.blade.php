<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Buat Account Baru!</h1>
    <h3>Sign Up Form</h3>
    <form action="/send" method="POST">
        @csrf
        <label for="Nama">First Name:</label><br>
        <input type="text"  name="fnama" ><br><br>

        <label for="Nama">Last Name:</label><br>
        <input type="text"  name="lnama" ><br><br>

        <label for="gender">Gender:</label><br>
        <input type="radio">Male <br>
        <input type="radio">Female <br>
        <input type="radio">Other <br><br>

        <label for="negara">Nationality:</label><br>
        <select >
            <option value="Indonesia">Indonesia</option>
            <option value="Indonesia">Cina</option>
            <option value="Indonesia">Jepang</option>
            <option value="Indonesia">Australia</option>

        </select> <br><br>

        <label for="bahasa">Language spoken:</label><br>
        <input type="checkbox">Bahasa Indonesia <br>
        <input type="checkbox">Bahasa inggris <br>
        <input type="checkbox">Other <br><br>

        <label for="bahasa">Bio</label><br>
        <textarea name="message" rows="10" cols="30"></textarea><br><br>
        <input type="submit" value="Signup">






    </form>


</body>
</html>
