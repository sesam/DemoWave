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
<?php
 header("Content-Type: text/xml; charset=UTF-8");
 header("Content-Disposition: attachment; filename=\"{$category_path}.law.xml\"");
?>
<?php echo "<?xml version='1.0' encoding='UTF-8' ?>\n"; ?>
<!DOCTYPE law PUBLIC "DemoWave//law//0.1.0" "/home/redhog/Projects/DemoWave/DTD/law/0.1.0.dtd">
<law>
 <?php
  function drawLawXML($level, $node) { 
   if ($level > 0) {
    $delete = "";
    if ($node['add'] == 'f')
     $delete = " delete='true'";

    $id = explode('.', $node['path']);
    $id = $id[count($id) - 1];
    $id_attr = '';
    if (strstr($node['path'], ':') === false)
     $id_attr = " id='$id'";
    printf("<p changed_at='{$node['changed']}' changed_in='{$node['referendum']}' {$id_attr}{$delete}>\n");

    if ($node['add'] == 't')
     printf("<h>%s</h>\n%s\n",
	    $node['title'],
	    $node['text']);
   }

   foreach ($node['sub'] as $key => $subNode)
    if ($key != '0')
     drawLawXML($level + 1, $subNode);

   if ($level > 0)
    echo "</p>\n";
  }

  drawLawXML(0, $laws);
 ?>
</law>
