<ul class="list-group">
    <?php $result = getCategory(); while($item = mysqli_fetch_assoc($result)): ?>
        <a href="#" class="list-group-item"><?php echo $item["name"] ?></a>
    <?php endwhile; ?>
</ul>