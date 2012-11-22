
<?php if (validation_errors()) : ?>
<div class="alert alert-block alert-error fade in ">
  <a class="close" data-dismiss="alert">&times;</a>
  <h4 class="alert-heading">Please fix the following errors :</h4>
 <?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs
if( isset($collections) ) {
    $collections = (array)$collections;
}
$id = isset($collections['id']) ? $collections['id'] : '';
?>
<div class="admin-box">
    <h3>Collections</h3>
<?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
    <fieldset>
        <div class="control-group <?php echo form_error('collections_user_id') ? 'error' : ''; ?>">
            <?php echo form_label('User'. lang('bf_form_label_required'), 'collections_user_id', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="collections_user_id" type="text" name="collections_user_id" maxlength="255" value="<?php echo set_value('collections_user_id', isset($collections['collections_user_id']) ? $collections['collections_user_id'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('collections_user_id'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('collections_coin_id') ? 'error' : ''; ?>">
            <?php echo form_label('Coin'. lang('bf_form_label_required'), 'collections_coin_id', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="collections_coin_id" type="text" name="collections_coin_id" maxlength="255" value="<?php echo set_value('collections_coin_id', isset($collections['collections_coin_id']) ? $collections['collections_coin_id'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('collections_coin_id'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('collections_have') ? 'error' : ''; ?>">
            <?php echo form_label('Have'. lang('bf_form_label_required'), 'collections_have', array('class' => "control-label") ); ?>
            <div class='controls'>
            <label class="checkbox" for="collections_have">
            <input type="checkbox" id="collections_have" name="collections_have" value="1" <?php echo (isset($collections['collections_have']) && $collections['collections_have'] == 1) ? 'checked="checked"' : set_checkbox('collections_have', 1); ?>>
            <span class="help-inline"><?php echo form_error('collections_have'); ?></span>
            </label>

        </div>

        </div>
        <div class="control-group <?php echo form_error('collections_wish') ? 'error' : ''; ?>">
            <?php echo form_label('Wish'. lang('bf_form_label_required'), 'collections_wish', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="collections_wish" type="text" name="collections_wish" maxlength="2" value="<?php echo set_value('collections_wish', isset($collections['collections_wish']) ? $collections['collections_wish'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('collections_wish'); ?></span>
        </div>


        </div>
        <div class="control-group <?php echo form_error('collections_options') ? 'error' : ''; ?>">
            <?php echo form_label('Options', 'collections_options', array('class' => "control-label") ); ?>
            <div class='controls'>
        <input id="collections_options" type="text" name="collections_options" maxlength="4" value="<?php echo set_value('collections_options', isset($collections['collections_options']) ? $collections['collections_options'] : ''); ?>"  />
        <span class="help-inline"><?php echo form_error('collections_options'); ?></span>
        </div>


        </div>



        <div class="form-actions">
            <br/>
            <input type="submit" name="save" class="btn btn-primary" value="Create Collections" />
            or <?php echo anchor(SITE_AREA .'/content/collections', lang('collections_cancel'), 'class="btn btn-warning"'); ?>
            
        </div>
    </fieldset>
    <?php echo form_close(); ?>


</div>
