<div class="row">
    <?php
    include 'connect.php';
    $query = "SELECT * FROM blogs ORDER BY created_at DESC";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="col-md-6">';
        echo '<div class="service-item">';
        echo '<a href="blog-details.php?id=' . $row['id'] . '" class="services-item-image">';
        echo '<img src="assets/images/blog-placeholder.jpg" class="img-fluid" alt="Blog">';
        echo '</a>';
        echo '<div class="down-content">';
        echo '<h4><a href="blog-details.php?id=' . $row['id'] . '">' . $row['title'] . '</a></h4>';
        echo '<p>' . $row['author'] . ' | ' . date("d/m/Y", strtotime($row['created_at'])) . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    ?>
</div>
