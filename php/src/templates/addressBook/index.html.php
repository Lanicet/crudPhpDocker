<h1>Contacts</h1>
<button type="button" class="btn btn-primary" ><a href="/create.php" style="color:#fff;text-decoration:none">New contact</a></button>
<ul class="list-group">
<li class="list-group-item d-flex justify-content-between align-items-center">
    <span >FirstName</span>
    <span >LastName</span>
    <span >email</span>
    <span >Phone</span>
    <span >Birthday</span>
    <span >Street, number</span>
    <span >City</span>
    <span >Zip</span>
    <span >Country</span>
    <span >Delete</span>
    <span >Update</span>
  </li>
<?php foreach ($contacts as $contact) : ?>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    <span > <?php echo $contact["firstName"]; ?></span>
    <span ><?php echo $contact["lastName"]; ?></span>
    <span ><?php echo $contact["email"]; ?></span>
    <span ><?php echo $contact["phone"]; ?></span>
    <span ><?php echo $contact["birthday"]; ?></span>
    <span ><?php echo $contact["street"].", ".$contact["number"];  ?></span>
    <span ><?php echo $contact["city"]?></span>
    <span ><?php echo $contact["zip"]?></span>
    <span ><?php echo $contact["country"]?></span>
    <a href='/delete.php?id=<?=$contact['id']?>'><button type="button" class="btn btn-danger">Delete</button></a>
    <a href='/create.php?id=<?=$contact['id']?>'><button type="button" class="btn btn-primary" >Update</button></a>
  </li>
  <?php endforeach ?>
</ul>