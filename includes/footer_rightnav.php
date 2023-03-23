<nav>
    <ul class="unord-list-container">


        <?php
        $userList = new User();

        $userListArray = $userList->getUsers();

        foreach ($userListArray as $user) {

            echo '<li> <a href=""  >' . $user['fullname'] . ' (' . $user['username'] . ') </a>  </li>  ';
        }

        ?>

        <li><a href="">User1</a></li>

    </ul>

</nav>



</div>



<footer>


    FOOOOTER

</footer>

</div>
</body>

</html>