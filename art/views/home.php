<div class="row">
    <h1>Home</h1>
    <span>Результат вычисления: <?php echo $result; ?></span>
</div>
<ul>
    <?php foreach($users as $user){ ?>
        <li><span><?php echo $user["firstname"];?></span></li>
    <?php } ?>
</ul>