<?php require_once('api/db.php'); ?>
<?php require_once('api/login_check.php'); ?>
<?php require_once('api/api.php'); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Me Separei</title>
    <link rel="stylesheet" href="css/solicitacoes.css">
    <link rel="stylesheet" href="css/header.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,600,900" rel="stylesheet">
    <script src="./jquery.min.js"></script>
    <script src="sidemenu/sidemenu.js"></script>
    <link rel="stylesheet" href="sidemenu/sidemenu.css">


</head>
<body>
<?php include 'menulat.php'; ?>
<?php include 'header.php'; ?>
    <div class="data">
        <div class="title">Pessoas que têm interesse no encontro:</div>

        <div class="people__list">
        <?php do { ?>
        <?php
        $user_noti= $notifications['int_id'];
        $user_noti2= $notifications['creator_id'];
         //    
        @$y1 = "select * from user where id ='$user_noti' ";
        $z1 = $conn->query($y1);
        $x1 = $z1->fetch_assoc();
        //
        @$y4 = "select * from user where id ='$user_noti2' ";
        $z4 = $conn->query($y4);
        $x4 = $z4->fetch_assoc();
        //
         @$y2 = "select * from photos where userid ='$user_noti'  ORDER BY `id` DESC ";
         $z2 = $conn->query($y2);
         $x2 = $z2->fetch_assoc();
         //
        @$y3 = "select * from photos where userid ='$user_noti2' ORDER BY `id` DESC ";
        $z3 = $conn->query($y3);
        $x3 = $z3->fetch_assoc();
        //
        $react=0;
        $aviso=0;
        if ($notifications['creator_id'] == $userid and $notifications['status'] == 0)  
        {$aviso= "<b>".$x1['user']."</b> tem interesse em você";
        $avatar_not= $x2['name'];
        $xid = $x1['id'];
        $react=1;}
        if ($notifications['int_id'] == $userid and $notifications['status'] == 1)  
        {$aviso= "<b>".$x4['user']."</b> aceitou seu pedido, entre em contato <b>".$x4['contact']."</b>";
        $avatar_not= $x3['name'];
        $xid = $x4['id'];}
        if ($notifications['creator_id'] == $userid and $notifications['status'] == 1)  
        {$aviso="Você tem um novo encontro com "."<b>".$x1['user']."</b> entre em contato <b>".$x1['contact']."</b>";
        $avatar_not= $x2['name'];
        $xid = $x1['id'];}
        ?>  

        <?php if (!empty($aviso)) { ?>       
            <div class="person__item">
                <img src="photos/<?php echo $avatar_not; ?>" alt="" class="avatar_">
                <div class="person__name">
                <a href="profile.php?xid=<?php echo $xid; ?>" ><?php echo $aviso; ?></a>
                </div>
               <?php if (!empty($react)) { ?>
                <form action="add/ilike.php" id="" class=""  method="post" enctype="multipart/form-data">
                <div class="person__actions">
                    <input type="hidden" id="date" name="dateid" value="<?php echo $notifications['id']; ?>">
                    <input type="image" name="action" src="img/accept.png" alt="Submit" value="accept" style="max-width: 40px; margin-right: 10px;" />
                    <input type="image" name="action" src="img/deny.png" alt="Submit" value="deny" style="max-width: 40px;" />
                </div>
                </form>
               <?php }?>
            </div>
               
            <?php }?>
         <?php } while($notifications = $result9->fetch_assoc()); ?>
    </div>
    <script src="solicitacoes.js"></script>
</body>
</html>