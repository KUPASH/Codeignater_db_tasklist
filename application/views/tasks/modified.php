<?
foreach ($tasks as $file) { ?>
<form action="save">
    <input type="text" name="modified" value="<?=$file[1]?>">
    <input type="hidden" name="id" value="<?=$file[0]?>">
    <button type="submit">Save</button>
</form>
<? } ?>