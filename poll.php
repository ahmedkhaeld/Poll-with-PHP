<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poll</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
   <div class="poll">
       <div class="poll-question">
           This is the poll question  
       </div>
       <form action="vote.php" method="post">
         <div class="poll-options">
                <div class="poll-option">
                    <input type="radio" name="choice" value="1" id="c1">
                    <label for="c1">Choice 1</label>
                </div>
                <div class="poll-option">
                    <input type="radio" name="choice" value="1" id="c1">
                    <label for="c1">Choice 1</label>
                </div>
                <div class="poll-option">
                    <input type="radio" name="choice" value="1" id="c1">
                    <label for="c1">Choice 1</label>
                </div>
         </div>
         <input type="submit" value="Submit Answer">
         <input type="hidden" name="poll" value="1">
       </form>
   </div>
</body>
</html>