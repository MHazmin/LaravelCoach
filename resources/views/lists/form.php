<form method="post" action="/lists">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <input type="submit" value="submit">
</form>