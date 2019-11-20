<span style="color: green; font-size: 16px;">
    <?php
    if (isset($_SESSION['success'])) {
        echo $_SESSION['success'];
        unset($_SESSION['success']);
    }
    ?>
</span>

<span style="color: red; font-size: 16px;">
    <?php
    if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
    ?>
</span>