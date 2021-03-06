<?php /*
DemoWave
Copyright (C) 2006 RedHog (Egil Möller) <redhog@redhog.org>

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or (at
your option) any later version.

This program is distributed in the hope that it will be useful, but
WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307
USA
*/ ?>
<?php if (in_array('propose', $_SESSION['privs']) && $is_category) { ?>
 <form class="newreferendum" method="post" enctype="multipart/form-data">
  <h2><?php E_("Add new referendum"); ?></h2>
  <table>
   <?php
    echo drawInputRow(T_("Referendum title"), "<input name='new_referendum_title' value='{$_POST["new_referendum_title"]}'>");
    echo drawInputRow(T_("Text"),
		       "<textarea name='new_referendum_text'></textarea>");
    echo drawInputRow('', "<input name='new_referendum' type='submit' value='" . T_("Create") . "'>");
   ?>
  </table>
 </form>

<?php } ?>
