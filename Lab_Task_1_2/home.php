<html>

<body>

    <form method="post" action="outcome.php">
        <!-- Nmae -->
        Name: <input type="text" name="fname"><br><br>
        <!-- Gender -->
        Gender: <br>
        <input type="radio" id="male" name="gender" value="male">
        <label for="male">Male</label><br>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label><br>
        <input type="radio" id="other" name="gender" value="other">
        <label for="other">Other</label><br><br>
        <!-- Subject -->
        Subject : <br>
        <input type="checkbox" id="subject" name="subject1" value="Bangla">
        <label for="subject"> I Take Bangla </label><br>
        <input type="checkbox" id="subject" name="subject2" value="English">
        <label for="subject"> I Take English</label><br>
        <input type="checkbox" id="subject" name="subject3" value="Math">
        <label for="subject"> I Take Math</label><br><br>
        <!-- Education -->
        Education: <br>
        <select name="education" id="education">
            <option value="" selected disabled>Please select an option...</option>
            <option value="SSC">SSC</option>
            <option value="HSC">HSC</option>
            <select><br><br>
                <!-- Comment -->
                Comments: <br>
                <textarea name="message" rows="10" cols="30" placeholder="Share Your thoughts Here"></textarea><br><br>
                <input type="submit">
    </form>

</body>

</html>