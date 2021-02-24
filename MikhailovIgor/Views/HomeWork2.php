<div class = "menu">
    <?php foreach($this->menu as $name => $url){ ?>
    <a href="<?php echo $url ?>"><?php echo $name ?></a>
    <?php } ?>
</div>
<div class="circle">
    <h3>Круг</h3>
    <span>Периметр: <?php echo $circlePerimetr ?></span><br>
    <span>Площадь: <?php echo $circleSpace ?></span><br>
</div>
<div class="triangle">
    <h3>Треугольник</h3>
    <span>Периметр: <?php echo $trianglePerimetr ?></span><br>
    <span>Площадь: <?php echo $triangleSpace ?></span><br>
</div>
<div class="rectangle">
    <h3>Прямоугольник</h3>
    <span>Периметр: <?php echo $rectanglePerimetr ?></span><br>
    <span>Площадь: <?php echo $rectangleSpace ?></span><br>
</div>

