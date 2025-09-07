<nav>
    <ul class="menuItems">
        <li ><a class="<?= $_GET['page'] == 'Home' ? 'active' : '' ?>"  href='?page=Home'>Home</a></li>
        <!-- <li ><a class="<?= $_GET['page'] == 'Home#courses' ? 'active' : '' ?>"  href='#courses'>Course</a></li> -->
        <li ><a class="<?= $_GET['page'] == 'About' ? 'active' : '' ?>"  href='?page=About'>About</a></li>
    </ul>
</nav>