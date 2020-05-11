<aside class="menu">
  <p class="menu-label">
    Menu <?= $_SESSION['role']; ?>
  </p>
  <ul class="menu-list">

    <li><a href="admin.php"><i class="fas fa-home"></i> Home</a></li>
    <?php if ($_SESSION['role'] === 'admin') : ?>
      <li><a href="admin.php?site=alat-musik-sampah"><i class="fas fa-trash"></i> Tempat Sampah</a></li>
    <?php endif; ?>
  </ul>
</aside>