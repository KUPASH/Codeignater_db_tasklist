<?
foreach ($tasks as $file) { ?>
<form action="save">
    <input type="text" name="modified" value="<?=$file->text?>">
    <input type="hidden" name="id" value="<?=$file->id?>">
    <button type="submit">Save</button>
</form>
<? } ?>