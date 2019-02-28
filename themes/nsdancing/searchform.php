<form action="<?= home_url( '/' ); ?>">
    <div class="search-input">
        <input type="text" class="control-form" placeholder="Search" name="s" value="<?= $_GET['s'] ?? '' ?>">
        <button type="submit" class="btn-search"><? the_icon( 'search' ) ?></button>
    </div>
</form>