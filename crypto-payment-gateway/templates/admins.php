<?php
//Admin Form...Let's go!!
//
?>
<div class='jumbotron'>
    <h1> Form Admin Settings </h1>
    <form method='post' action='options.php'>
    <?php
    settings_fields('formSettings');
    do_settings_sections('formSettings');
    ?>
        <div class='form-group'>
            <label for='walletAddress'>Ethereum Wallet Address</label>
            <input type='text' name='walletId' value='<?php echo get_option('walletId');?>' class='form-control' id='walletAddress' placeholder='0x18b37Ac542f37054F90a49B535D4f35A80E28D44' required/>
        </div>
        <br/>
        <button type='submit' class='btn button-primary'>Submit Address</button>
    </form>
</div>
<br/>
<br/>
<?php
{?>
<hr style="height:2px;border-width:0;color:gray;background-color:gray">
<br/>
<h1> Payment Shortcode </h1>
<p>Upon Submission of the form above, Copy the shortcode below and paste it into your post, page, or text widget content:</p>
<h2><code style="color:blue;font-size:20px;">[payment-button]</code></h2>

<?php }
?>