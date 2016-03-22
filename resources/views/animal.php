<form method="post" action="/foo/bar">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <input type="submit" value="submit">
    
</form>