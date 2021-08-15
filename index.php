<?php 
require_once 'app/init.php';
$pollsQuery=$db->query("
    SELECT id, question
    FROM polls
    WHERE DATE(NOW()) BETWEEN starts AND ends");

    while($row=$pollsQuery->fetchObject()){
        $polls[]=$row;
    }

?>


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
    <?php if(!empty($polls)): ?>
        <ul>
            <?php foreach($polls as $poll): ?>
            <li><a href="poll.php?poll=<?php echo $poll->id?>"><?php echo $poll->question;?></a></li>
           <?php endforeach;?>
      </ul>
    <?php else: ?>
        <p> Sorry, no polls availabe right now.</p>
    <?php endif; ?>
    
</body>
</html>