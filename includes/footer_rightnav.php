<nav>
    <ul class="unord-list-container">

        <!-- funktion för att presentera användare från DB -->
        <?php
        $userList = new User();

        $userListArray = $userList->getUsers();

        foreach ($userListArray as $user) {

            echo '<li> <a href="all_posts.php?username=' . $user['username'] . '"  >' . $user['fullname'] . ' (' . $user['username'] . ') </a>  </li>  ';
        }

        ?>


    </ul>

</nav>



</div>



<footer>

    <div class="footer-container">
        <h4>Aous Josef</h4>
        <h4>DT093G - Webbutveckling II</h4>
        <h4>Projektuppgift</h4>
    </div>
</footer>

</div>


<script>
    // js för att visa/dölja meny för mobile view
    const menuBtn = document.getElementById('menu-btn');
    const topNav = document.querySelector('.top-nav');

    menuBtn.addEventListener('click', function() {

        topNav.classList.toggle('show');

    });
</script>
</body>

</html>