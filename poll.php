<?php 
require_once 'app/init.php';
if(! isset($_GET['poll'])){
    header('Location: init.php');
}else {
    $id = (int) $_GET['poll'];
    // Get general poll information
    $pollQuery=$db->prepare("
    SELECT id, question
    FROM polls
    WHERE id= :poll
    AND DATE(NOW()) BETWEEN starts AND ends");
    $pollQuery->execute([
        'poll' => $id
    ]); 

    $poll=$pollQuery->fetchObject();
   
    // get poll choices
    $choicesQuery=$db->prepare("
    SELECT polls.id, polls_choices.id AS choice_id, polls_choices.name
    FROM polls 
    JOIN polls_choices 
    ON polls.id=polls_choices.poll 
    WHERE polls.id= :poll 
    AND DATE(NOW()) BETWEEN polls.starts AND polls.ends 
    ");
    
    $choicesQuery->execute([
        'poll' => $id
    ]); 

    while($row=$choicesQuery->fetchObject()){
        $choices[]=$row;
    }
   
  
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
    <?php if(! $poll): ?>
        <p>That poll is not available</p>
    <?php else: ?>
   <div class="poll">
       <div class="poll-question">
            <?php echo $poll->question ?>
       </div>
       <?php if(! empty($choices)): ?>
       <form action="vote.php" method="post">
         <div class="poll-options">
         <?php foreach($choices as $index => $choice): ?>
                <div class="poll-option">
                    <input type="radio" name="choice" value="<?php echo $choice->choice_id?>" id="c<?php echo $index;?>">
                    <label for="c<?php echo $index;?>"><?php echo $choice->name?></label>
             </div>
         <?php endforeach; ?>
         </div>
         <input type="submit" value="Submit Answer">
         <input type="hidden" name="poll" value="<?php echo $id ?>">
       </form>
       <?php else: ?>
        <p>There are no choices.</p>
       <?php endif; ?>
   </div>
   <?php endif; ?>
</body>
</html>