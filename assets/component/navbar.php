<nav>
    <ul class="menuItems">
        <li ><a class="<?= $_GET['page'] == 'Home' ? 'active' : '' ?>"  href='?page=Home'><i class="bi bi-house-door"></i> Home</a></li>
        <!-- <li ><a class="<?= $_GET['page'] == 'Home#courses' ? 'active' : '' ?>"  href='#courses'>Course</a></li> -->
        <li ><a class="<?= $_GET['page'] == 'About' ? 'active' : '' ?>"  href='?page=About'><i class="bi bi-person-vcard"></i> About</a></li>
    </ul>
</nav>